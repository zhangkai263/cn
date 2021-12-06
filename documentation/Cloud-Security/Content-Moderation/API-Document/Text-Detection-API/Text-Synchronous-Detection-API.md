# 文本同步检测接口

本文提供了调用文本垃圾检测任务的具体内容，旨在帮助您编写程序构建HTTP调用请求。

- 关于如何构造HTTP请求，请参见OpenAPI的请求结构。

### 描述

检测文本中是否包含违规信息。

关于scene与label参数

在提交检测任务时，您需要指定scenes场景参数；而在检测返回结果中，则包含了您指定的场景对应的label分类参数。

在文本反垃圾中，scene与label的对应关系如下：

| 功能         | 描述                                                         | scene    | label                                                        |
| :----------- | :----------------------------------------------------------- | :------- | :----------------------------------------------------------- |
| 垃圾文本检测 | 结合行为、内容，采用多维度、多模型、多检测手段，识别文本中的垃圾内容，规避色情、广告、灌水、渉政、辱骂等内容风险。 | antispam | normal：正常文本<br /> politic：涉政<br/>terrorism：暴恐<br/>porn：鉴黄<br/>abuse：辱骂<br/>illegal：违法<br/>unuse：灌水<br/>ad：广告<br/>other：其他 |

## 请求方式
POST

## 请求地址
https://censor.jdcloud-api.com/v1/text:scan


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**bizType**|String|False| |机审策略，eg: default|
|**scenes**|String|True| |指定检测场景，固定值：antispam|
|**tasks**|TextTask|True| |检测任务列表，包含一个或多个元素。每个元素是个结构体，最多可添加10个元素，即最多对10段文本进行检测。每个元素的具体结构描述见TextTask。|

### <div id="TextTask">TextTask</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dataId**|String|False| |数据Id。需要保证在一次请求中所有的Id不重复|
|**content**|String|True| |待检测文本，最长1000个字符|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|TextResult| |
### <div id="TextResult">TextResult</div>
|名称|类型|描述|
|---|---|---|
|**code**|Integer|错误码，和HTTP的status code一致|
|**msg**|String|错误描述信息|
|**dataId**|String|对应请求的dataId|
|**taskId**|String|该检测任务的ID|
|**content**|String|对应请求的内容|
|**filteredContent**|String|如果检测文本命中您自定义关键词词库中的词，该字段会返回，并将命中的关键词替换为"*"|
|**results**|TextResultDetail|返回结果。调用成功时（code=200），返回结果中包含一个或多个元素。每个元素是个结构体，具体结构描述见TextResultDetail|
### <div id="TextResultDetail">TextResultDetail</div>
|名称|类型|描述|
|---|---|---|
|**scene**|String|检测场景，和调用请求中的场景对应|
|**label**|String|检测结果的分类，与具体的scene对应。取值范围参考scene 和 label说明|
|**score**|Float|结果为该分类的概率，取值范围为0.00-100.00。值越高，表示越有可能属于该分类subLabel|
|**suggestion**|String|建议用户执行的操作，取值范围pass：文本正常，无需进行其余操作，或者未识别出目标对象review：检测结果不确定，需要进行人工审核，或识别出目标对象block：图片违规，建议执行进一步操作（如直接删除或做限制处理）|
|**hintWordsInfos**|HintWordsInfo|命中该风险的上下文信息。具体结构描述见hintWordsInfo|
### <div id="HintWordsInfo">HintWordsInfo</div>
|名称|类型|描述|
|---|---|---|
|**context**|String|检测文本命中的风险内容上下文内容。如果命中了您自定义的风险文本库，则会返回命中的文本内容（关键词或相似文本）|
|**libName**|String|命中自定义词库时，才有本字段。取值为创建词库时填写的词库名称|
|**libCode**|String|命中您自定义文本库时，才会返回该字段，取值为创建风险文本库后系统返回的文本库code|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**500**|Internal Server Error|
|**400**|Bad Request|

#### 请求示例

```
{
  "tasks": [
    {
      "dataId": "dataId-1",
      "content": "法论大法好"
    }
  ],
  "scenes": [
    "antispam"
  ]
}
```

#### 返回示例

```
{
  "requestId": "bqfmguuo6d68mmbca0kw7cqeni8wmqqo",
  "result": {
    "data": [
      {
        "code": 200,
        "msg": "OK",
        "dataId": "dataId-1",
        "taskId": "txte80d769d-9088-46c0-90c0-d8a408eabb3c",
        "content": "法论大法好",
        "filteredContent": "法论大法好",
        "results": [
          {
            "scene": "antispam",
            "label": "politics",
            "score": 100,
            "suggestion": "block",
            "hintWordsInfos": [
              {
                "context": "法论大法"
              }
            ]
          }
        ]
      }
    ]
  }
}
```