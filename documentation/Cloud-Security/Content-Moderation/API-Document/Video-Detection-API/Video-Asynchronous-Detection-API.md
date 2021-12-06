## 		视频异步检测接口

本文提供了调用视频风险违规内容审核的接口和参数说明，旨在帮助您编写程序构建HTTP调用请求，有效地检测视频中的多维度风险内容。关于如何构造HTTP请求，请参见请求结构。

### 描述

异步检测视频文件中是否包含违规内容。

支持检测的场景包括：视频智能鉴黄、视频暴恐涉政识别、视频图文违规识别。

 异步检测结果需要通过调用查询视频审核检测结果接口进行查询或者通过callback的方式进行接收，检测结果最多保留2个小时。 

关于scene与label参数

在提交检测任务时，您需要指定scenes

**说明**  该接口为收费接口。同时检测多个场景的情况下，将按照“每个场景的检测视频截帧数量×每个场景的单价”进行累加计费。如果您同时检测视频中的语音违规内容，则还将增加“视频时长×语音违规功能的单价”的费用，具体请参见计费说明 。 

在视频审核中，scene与label的对应关系如下：

| 场景             | 描述                             | scenes    | label                                                        |
| :--------------- | :------------------------------- | :-------- | :----------------------------------------------------------- |
| 视频智能鉴黄     | 识别视频中的色情内容             | porn      | normal：正常图片<br />porn：色情图片<br />vulgar：低俗图片<br />sexy：性感图片<br />other |
| 视频暴恐涉政识别 | 识别视频中的暴恐涉政内容         | terrorism | normal: 正常图片<br />bloody：血腥<br />riot：暴乱<br />explosion：火焰爆炸<br />terrorist：涉恐人物<br />flag：旗帜<br />politics：涉政人物<br />weapon：武器 |
| 视频图文违规识别 | 识别视频中的广告以及文字违规信息 | ad        | normal： 正常图片 <br />politics：图片中文本含有涉政内容<br /> porn：图片中文本含有涉黄内容<br /> terrorism：图片中文本含有暴恐内容 <br />qrcode：图片包含二维码 <br />barcode：图片包含条形码<br /> contacts：图片中文本存在的联系方式（手机、座机、邮箱、网站、sns） |

关于audioScenes与label参数

在提交检测任务时且通过视频URL方式传入视频时，可以同时对视频中的语音内容进行违规检测。您需要指定audioScenes语音检测场景参数；而在检测返回结果中，则包含您指定的场景对应的label结果分类参数。

在视频语音检测中，audioScenes与label的对应关系如下：

| 场景       | 描述             | scene    | label                                                        |
| :--------- | :--------------- | :------- | :----------------------------------------------------------- |
| 语义反垃圾 | 语音垃圾内容检测 | antispam | normal：正常文本 <br />politics：涉政<br />terrorism：暴恐<br />porn：鉴黄 |

**视频限制**

- 视频文件链接支持以下协议：HTTP和HTTPS。
- 视频文件支持以下格式：  .mp4、.m4v、.mkv、.webm、.mov、.avi、.wmv、.mpg、.flv、.3gp 。
- 视频大小限制：单个视频大小不超过200MB。如果您有特殊需求（大视频），可以提工单进行调整。
- 视频检测的时间依赖于视频的下载时间。请保证被检测的视频文件所在的存储服务稳定可靠，建议您使用京东云OSS存储服务存储视频文件。

## 请求方式
POST

## 请求地址

https://censor.jdcloud-api.com/v1/video:asyncscan


## 请求参数

| 名称            | 类型      | 是否必需 | 默认值 | 描述                                                         |
| --------------- | --------- | -------- | ------ | ------------------------------------------------------------ |
| **bizType**     | String    | False    |        | 机审策略，eg: default                                        |
| **live**        | Boolean   | False    |        | 是否直播。默认为false，表示为普通视频检测；若是直播检测，该值必须传入true。 |
| **scenes**      | String    | True     |        | 指定检测场景                                                 |
| **audioScenes** | String    | False    |        | 视频中语音的检测场景                                         |
| **tasks**       | VideoTask | True     |        | 检测任务列表，包含一个或多个元素。每个元素是个结构体，最多可添加10个元素，每个元素的具体结构描述见videoTask。 |
| **callback**    | String    | False    |        | 异步检测结果回调通知您的URL，支持HTTP/HTTPS。该字段为空时，您必须定时检索检测结果。 |
| **seed**        | String    | False    |        | 随机字符串，该值用于回调通知请求中的签名。当使用callback时，该字段必须提供。 |

### <div id="videotask">VideoTask</div>

| 名称          | 类型    | 是否必需 | 默认值 | 描述                                                         |
| ------------- | ------- | -------- | ------ | ------------------------------------------------------------ |
| **dataId**    | String  | False    |        | 数据Id。需要保证在一次请求中所有的Id不重复                   |
| **url**       | String  | True     |        | 待检测视频的URL，最大200M                                    |
| **interval**  | Integer | False    |        | 视频截帧间隔，单位为秒，取值范围为1~60。默认值为1秒          |
| **maxFrames** | Integer | False    |        | 本视频截帧的张数上限，取值范围为5~3600，默认为200张，该参数仅在文件检测中生效(live=false) 如果是视频流(live=true)该参数无效。 |

## 返回参数

| 名称       | 类型   | 描述 |
| ---------- | ------ | ---- |
| **result** | Result |      |

### <div id="result">Result</div>

| 名称     | 类型     | 描述 |
| -------- | -------- | ---- |
| **data** | TaskData |      |

### <div id="taskdata">TaskData</div>

| 名称       | 类型    | 描述                            |
| ---------- | ------- | ------------------------------- |
| **code**   | Integer | 错误码，和HTTP的status code一致 |
| **msg**    | String  | 错误描述信息                    |
| **dataId** | String  | 对应请求的dataId                |
| **taskId** | String  | 该检测任务的ID                  |
| **url**    | String  | 对应请求中的url                 |

## 返回码

| 返回码  | 描述                  |
| ------- | --------------------- |
| **200** | OK                    |
| **500** | Internal Server Error |
| **400** | Bad Request           |

### 视频审核-异步检测通知回调

**callback说明**

如果您在请求参数中指定了回调通知参数callback、被回调callback值，即一个http(s)协议接口的URL，则需要支持POST方法，传输数据编码采用utf-8，并且支持两个表单参数checksum和content。系统将按以下描述的生成规则和格式设置checksum和content的值，调用您的callback接口返回检测内容。

您服务端接收到我们推送的结果后，返回的HTTP状态码为200时，表示推送成功，其他的HTTP状态码均视为您接收失败，我们将最多重复推送16次。

#### 请求参数体

| 参数名称 | 类型   | 描述                                                         |
| :------- | :----- | :----------------------------------------------------------- |
| checksum | 字符串 | 由用户uid + seed + content拼成字符串，通过SHA256算法生产。用户UID即账号ID，您可在京东智联云控制台上查询。为防篡改，您可以在获取到推送结果时，按此算法生成字符串，与checksum做一次校验。 |
| content  | String | JSON字符串格式，请自行解析反转成JSON对象。content结果格式参见下文 |

##### content格式说明

| 参数名称 | 类型     | 描述                   |
| :------: | :------- | :--------------------- |
|  result  | JSON对象 | 视频异步检测机审结果。 |

#### 响应参数体

##### data

| 参数名称 | 是否必须 | 类型   | 描述                                                         |
| :------- | :------- | :----- | :----------------------------------------------------------- |
| code     | 否       | 整型   | 错误码，和HTTP的status code一致。                            |
| msg      | 是       | 布尔型 | 是否为直播流。默认为false，表示为普通语音文件检测；若需要检测语音流，该值必须传入true。 |
| dataId   | 否       | 字符串 | 对应请求中的dataId。                                         |
| taskId   | 是       | 字符串 | 该检测任务的ID。                                             |

#### 请求示例

```
{
  "scenes": [
    "terrorism"
  ],
  "audioScenes": [
    "antispam"
  ],
  "tasks": [
    {
      "dataId": "aaaabbbbbccccc",
      "url": "http://vd2.bdstatic.com/mda-jiqm0j4h7cd6uyh6/sc/mda-jiqm0j4h7cd6uyh6.mp4"
    }
  ],
  "callback": "http://xxx.xxx.xxx/callback",
  "seed": "xxx"
}
```

#### 返回示例

```
{
  "requestId": "5de03980-5a99-4668-b398-4cd3f472ece9",
  "result": {
    "data": [
      {
        "code": 200,
        "msg": "OK",
        "dataId": "aaaabbbbbccccc",
        "taskId": "vid52a6141e-74ed-43fd-b7fe-7b661b0c64b4"
      }
    ]
  }
}
```

### 查询视频异步检测结果

## 请求方式

POST

## 请求地址

https://censor.jdcloud-api.com/v1/video:results


## 请求参数

| 名称        | 类型   | 是否必需 | 默认值 | 描述 |
| ----------- | ------ | -------- | ------ | ---- |
| **taskIds** | String | True     |        |      |


## 返回参数

| 名称       | 类型   | 描述 |
| ---------- | ------ | ---- |
| **result** | Result |      |

### <div id="result">Result</div>

| 名称     | 类型        | 描述 |
| -------- | ----------- | ---- |
| **data** | VideoResult |      |

### <div id="videoresult">VideoResult</div>

| 名称             | 类型              | 描述                                                         |
| ---------------- | ----------------- | ------------------------------------------------------------ |
| **code**         | Integer           | 错误码，和HTTP的status code一致                              |
| **msg**          | String            | 错误描述信息                                                 |
| **dataId**       | String            | 对应请求的dataId                                             |
| **taskId**       | String            | 该检测任务的ID                                               |
| **url**          | String            | 对应请求中的url                                              |
| **results**      | VideoResultDetail | 返回结果。调用成功时（code=200），返回结果中包含一个或多个元素。每个元素是个结构体，具体结构描述见VideoResultDetail |
| **audioResults** | AudioResultDetail | 视频语音检测结果。具体结构描述见audioScanResult。            |

### <div id="audioresultdetail">AudioResultDetail</div>

| 名称           | 类型                  | 描述                                                         |
| -------------- | --------------------- | ------------------------------------------------------------ |
| **scene**      | String                | 检测场景，和调用请求中的场景对应                             |
| **label**      | String                | 检测结果的分类，与具体的scene对应。取值范围参考scene和label说明 |
| **score**      | Float                 | 结果为该分类的概率，取值范围为0.00-100.00。值越高，表示越有可能属于改该子分类 |
| **suggestion** | String                | 建议用户执行的操作，取值范围pass：图片正常，无需进行其余操作，或者未识别出目标对象review：检测结果不确定，需要进行人工审核，或识别出目标对象block：图片违规，建议执行进一步操作（如直接删除或做限制处理） |
| **details**    | AudioScanResultDetail | 语音对应的文本详情（每一句文本对应一个元素），包含一个或者多个元素，具体结构描述见detail。 |

### <div id="audioscanresultdetail">AudioScanResultDetail</div>

| 名称               | 类型          | 描述                                                         |
| ------------------ | ------------- | ------------------------------------------------------------ |
| **startTime**      | Integer       | 句子开始的时间，单位是秒。                                   |
| **endTime**        | Integer       | 句子结束的时间，单位是秒。                                   |
| **text**           | String        | 语音转换成文本的结果。                                       |
| **label**          | String        | 该句语言的检测结果的分类，取值参见audioScenes与label参数说明。 |
| **hintWordsInfos** | HintWordsInfo | 命中该风险的上下文信息。具体结构描述见hintWordsInfo          |

### <div id="hintwordsinfo">HintWordsInfo</div>

| 名称        | 类型   | 描述                                                         |
| ----------- | ------ | ------------------------------------------------------------ |
| **context** | String | 检测文本命中的风险内容上下文内容。如果命中了您自定义的风险文本库，则会返回命中的文本内容（关键词或相似文本） |
| **libName** | String | 命中自定义词库时，才有本字段。取值为创建词库时填写的词库名称 |
| **libCode** | String | 命中您自定义文本库时，才会返回该字段，取值为创建风险文本库后系统返回的文本库code |

### <div id="videoresultdetail">VideoResultDetail</div>

| 名称           | 类型      | 描述                                                         |
| -------------- | --------- | ------------------------------------------------------------ |
| **scene**      | String    | 检测场景，和调用请求中的场景对应                             |
| **label**      | String    | 检测结果的分类，与具体的scene对应。取值范围参考scene和label说明 |
| **score**      | Float     | 结果为该分类的概率，取值范围为0.00-100.00。值越高，表示越有可能属于改该子分类 |
| **suggestion** | String    | 建议用户执行的操作，取值范围pass：图片正常，无需进行其余操作，或者未识别出目标对象review：检测结果不确定，需要进行人工审核，或识别出目标对象block：图片违规，建议执行进一步操作（如直接删除或做限制处理） |
| **sfaceData**  | SFaceData | 视频中包含暴恐识涉政内容时，返回识别出来的暴恐涉政信息，具体结构描述见sfaceData |

### <div id="sfacedata">SFaceData</div>

| 名称      | 类型   | 描述                                            |
| --------- | ------ | ----------------------------------------------- |
| **x**     | Number | 以图片左上角为坐标原点，logo区域左上角到y轴距离 |
| **y**     | Number | 以图片左上角为坐标原点，logo区域左上角到x轴距离 |
| **w**     | Number | logo区域宽度                                    |
| **h**     | Number | logo区域高度                                    |
| **faces** | Face   | 识别出的人脸信息，具体结构描述见face            |

### <div id="face">Face</div>

| 名称     | 类型   | 描述         |
| -------- | ------ | ------------ |
| **name** | String | 相似人物名称 |
| **rate** | Float  | 相似概率     |

## 返回码

| 返回码  | 描述                  |
| ------- | --------------------- |
| **200** | OK                    |
| **500** | Internal Server Error |
| **400** | Bad Request           |

```
{
  "taskIds": [
    "ee4d109b-8e3f-4654-afcb-3e821ff3eb34"
  ]
}
```

#### 响应示例

```
{
  "requestId": "br5w0fjagbtrgb08ob6vvfwemo7no02q",
  "result": {
    "data": [
      {
        "code": 200,
        "msg": "OK",
        "dataId": "aaaabbbbbccccc",
        "taskId": "vid52a6141e-74ed-43fd-b7fe-7b661b0c64b4",
        "results": [
          {
            "scene": "terrorism",
            "label": "normal",
            "score": 95.01,
            "suggestion": "pass"
          }
        ],
        "audioResults": [
          {
            "scene": "antispam",
            "label": "normal",
            "score": 99.99,
            "suggestion": "pass",
            "details": [
              {
                "startTime": 1,
                "endTime": 10,
                "text": "音频翻译成文字结果",
                "label": "normal"
              }
            ]
          }
        ]
      }
    ]
  }
}
```