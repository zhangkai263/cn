## 		音频异步检测接口

本文提供了调用音频检测任务的具体内容，旨在帮助您编写程序构建HTTP调用请求。

- 关于如何构造HTTP请求，请参见请求结构。

### 描述

提交异步检测语音检测任务。支持对语音文件进行检测，判断其中是否包含违规内容。

**说明** 语音异步检测默认使用中文语音检测引擎。

检测任务提交成功后，可以通过调用查询异步语音检测任务接口获取检测结果，您也可以通过callback方式设置回调接口来获取检测结果。

**语音文件限制说明**

- 支持的语音文件大小 < 100 M
- 支持的音频文件格式：.mp1、.mp2、.mp3、.aac、.wma、.m4a、
- 支持的视频文件格式：.avi、.flv、.mp4、.mpg、.wmv、.webm、.mpg、.3gp、.mkv。

关于scene与label参数

在提交检测任务时，您需要指定**scenes**场景参数；而在检测返回结果中，则包含了您指定的场景对应的**label**分类参数。

在语音反垃圾中，scene与label的对应关系如下：

| 场景           | 描述                                           | scene    | label                                                        |
| :------------- | :--------------------------------------------- | :------- | :----------------------------------------------------------- |
| 语音反垃圾检测 | 识别语音中的违规内容。<br />（默认语音是中文） | antispam | normal：正常文本 <br />politics：涉政<br />terrorism：暴恐<br />porn：鉴黄 |

## 请求方式
POST

## 请求地址

https://censor.jdcloud-api.com/v1/audio:asyncscan


## 请求参数

| 名称         | 类型      | 是否必需 | 默认值 | 描述                                                         |
| ------------ | --------- | -------- | ------ | ------------------------------------------------------------ |
| **bizType**  | String    | False    |        | 机审策略，eg: default                                        |
| **scenes**   | String    | True     |        | 指定检测场景                                                 |
| **tasks**    | AudioTask | True     |        | 检测任务列表，包含一个或多个元素。每个元素是个结构体，最多可添加10个元素，每个元素的具体结构描述见audioTask。 |
| **callback** | String    | False    |        | 异步检测结果回调通知您的URL，支持HTTP/HTTPS。该字段为空时，您必须定时检索检测结果。 |
| **seed**     | String    | False    |        | 随机字符串，该值用于回调通知请求中的签名。当使用callback时，该字段必须提供。 |

### <div id="audiotask">AudioTask</div>

| 名称       | 类型   | 是否必需 | 默认值 | 描述                                       |
| ---------- | ------ | -------- | ------ | ------------------------------------------ |
| **dataId** | String | False    |        | 数据Id。需要保证在一次请求中所有的Id不重复 |
| **url**    | String | True     |        | 待检测音频的URL，最大100M                  |

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

### 音频审核-异步检测通知回调

##### callback说明

如果您在请求参数中指定了回调通知参数callback，被回调callback值，即一个HTTP(S)协议接口的URL，则需要支持POST方法，传输数据编码采用utf-8，并且支持两个表单参数checksum和content。系统将按以下描述的生成规则和格式设置checksum和content的值，调用您的callback接口返回检测内容。

您服务端接收到我们推送的结果后，返回的HTTP状态码为200时，表示推送成功，其他的HTTP状态码均视为您接收失败，我们将最多重复推送16次。

callback表

| 参数名称 | 类型   | 描述                                                         |
| -------- | ------ | ------------------------------------------------------------ |
| checksum | 字符串 | 由用户uid + seed + content拼成字符串，通过SHA256算法生产。用户UID即账号ID，您可在京东智联云控制台上查询。为防篡改，您可以在获取到推送结果时，按此算法生成字符串，与checksum做一次校验。 |
| content  | String | JSON字符串格式，请自行解析反转成JSON对象。content结果格式参见下文 |

##### content格式说明

| 参数名称 | 类型     | 描述                   |
| -------- | -------- | ---------------------- |
| result   | JSON对象 | 音频异步检测机审结果。 |

### 返回参数

##### data

| 参数名称 | 是否必须 | 类型   | 描述                                                         |
| -------- | -------- | ------ | ------------------------------------------------------------ |
| code     | 否       | 整型   | 错误码，和HTTP的status code一致。                            |
| msg      | 是       | 布尔型 | 是否为直播流。默认为false，表示为普通语音文件检测；若需要检测语音流，该值必须传入true。 |
| dataId   | 否       | 字符串 | 对应请求中的dataId。                                         |
| taskId   | 是       | 字符串 | 该检测任务的ID。                                             |

#### 请求示例

```
{
  "tasks": [
    {
      "url": "http://xxx.xxx.xxx/audio.mp3"
    }
  ],
  "scenes": [
    "antispam"
  ],
  "seed": "xxx",
  "callback":"http://xxx.xxx.xxx/callback"
}
```

#### 返回示例

```
{
  "requestId": "br5w3p5vwudiegg1cngfw9w72kg2bpbg",
  "result": {
    "data": [
      {
        "code": 200,
        "msg": "OK",
        "taskId": "audb260d327-4f87-48d7-9913-9f5dbb6e8263"
      }
    ]
  }
}
```

## 查询音频异步检测结果

### 描述

如果您在提交音频异步检测任务时未设置callback地址，则需要调用本接口轮询检测结果。

- 对于语音文件检测任务，每次查询或者通过callback方式都会返回已检测完的语音检测结果（仅返回已检测完成的任务检测结果）。建议您将查询间隔设置为30秒，检测结果保留2个小时，并及时查询并保存结果。
- 对于语音流检测任务，每次轮询会返回最近10段检测到的语音内容检测结果，建议您将查询间隔设置为30秒；如果通过callback的方式获取语音流检测结果，系统每次检测出语音内容后都会发送回调通知。

## 请求方式

POST

## 请求地址

https://censor.jdcloud-api.com/v1/audio:results


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
| **data** | AudioResult |      |

### <div id="audioresult">AudioResult</div>

| 名称        | 类型              | 描述                                                         |
| ----------- | ----------------- | ------------------------------------------------------------ |
| **code**    | Integer           | 错误码，和HTTP的status code一致                              |
| **msg**     | String            | 错误描述信息                                                 |
| **dataId**  | String            | 对应请求的dataId                                             |
| **taskId**  | String            | 该检测任务的ID                                               |
| **url**     | String            | 对应请求中的url                                              |
| **results** | AudioResultDetail | 返回结果。调用成功时（code=200），返回结果中包含一个或多个元素。每个元素是个结构体，具体结构描述见AudioResultDetail |

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

## 返回码

| 返回码  | 描述                  |
| ------- | --------------------- |
| **200** | OK                    |
| **500** | Internal Server Error |
| **400** | Bad Request           |

#### 请求示例

```
{
  "taskIds": [
    "audb260d327-4f87-48d7-9913-9f5dbb6e8263"
  ]
}
```

#### 响应示例

```
{
	"requestId": "br5w2d3smv3m446aq9hqu41qbrca7kks",
	"result": {
		"data": [{
			"code": 200,
			"msg": "OK",
			"taskId": "audb260d327-4f87-48d7-9913-9f5dbb6e8263",
			"results": [{
				"scene": "antispam",
				"label": "normal",
				"score": 99.99,
				"suggestion": "pass",
				"details": [{
					"startTime": 1,
					"endTime": 10,
					"text": "音频翻译成文字结果",
					"label": "normal"
				}]
			}]
		}]
	}
}
```