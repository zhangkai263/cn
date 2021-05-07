## 返回结果

### 正确返回结果

以内容安全图片异步检测的接口为例，若调用成功，其可能的返回如下：

```
{
  "requestId": "bqfmguuo6d68mmbca0kw7cqeni8wmqqo",
  "result": {
    "data": [
      {
        "code": 200,
        "msg": "OK",
        "taskId": "imgd169fa6b-191c-45f6-a344-6dba8f4972ad",
        "results": [
          {
            "scene": "porn",
            "label": "normal",
            "score": 100,
            "suggestion": "pass"
          }
        ]
      }
    ]
  }
}
```

返回结果的参数见下表，公共返回参数表。

### 公共返回参数

所有请求均返回JSON格式数据，有如下公共字段：

| 名称          | 类型                 | 是否必需 | 描述                                                         |
| :------------ | :------------------- | :------- | :----------------------------------------------------------- |
| **code**      | 整型                 | 是       | 错误码，和HTTP状态码一致（但有扩展）。2xx 表示成功。4xx 表示请求有误。5xx 表示后端有误。 |
| **msg**       | 字符串               | 是       | 错误的进一步描述。                                           |
| **requestId** | 字符串               | 是       | 唯一标识该请求的ID，可用于定位问题。                         |
| **result**    | 是                   | JSON对象 | API请求成功或者部分成功时返回数据。                          |
| **data**      | 整型/字符串/JSON对象 | 否       | API（业务）相关的返回数据。出错情况下，该字段可能为空。一般来说，该字段为一个JSON结构体或数组。 |
| **error**     | 是                   | JSON对象 | 调用服务的相应接口产生错误时，返回的信息中应有具体的错误数据，error对象中的code, message 和 status定义见错误码定义 |



### 错误码

| Code | Status                        | 描述                                                     |
| :--- | :---------------------------- | :------------------------------------------------------- |
| 208  | CENSOR_PROCESSING             | 任务正在执行中，建议您等待一段时间（比如5s）后再查询结果 |
| 400  | CENSOR_INVALID_SCENE          | 不支持的检测场景                                         |
| 400  | CENSOR_INVALID_PIN            | 无效的用户pin                                            |
| 400  | CENSOR_INVALID_REQUEST_BODY   | 无效的请求体，请检查                                     |
| 400  | CENSOR_INVALID_TASKLEN        | 无效的task长度, 应在1-10之间                             |
| 400  | CENSOR_INVALID_CONTENTLEN     | 无效的content长度, 应在1-1000之间                        |
| 400  | CENSOR_INVALID_ARGUMENT       | 参数param存在错误                                        |
| 400  | CENSOR_DOWNLOAD_FAILED        | 文件下载失败                                             |
| 400  | CENSOR_DOWNLOAD_TIMEOUT       | 文件下载超时                                             |
| 400  | CENSOR_LARGE_IMAGE            | 图片过大，不能超过5M                                     |
| 400  | CENSOR_LARGE_AUDIO            | 音频文件过大，不能超过100M                               |
| 400  | CENSOR_LARGE_VIDEO            | 视频文件过大，不能超过200M                               |
| 400  | CENSOR_INVALID_IMAGE          | 图片格式不支持，仅支持jpg、png、jpeg、bmp                |
| 400  | CENSOR_INVALID_AUDIO          | 音频格式不支持                                           |
| 400  | CENSOR_INVALID_VIDEO          | 视频格式不支持                                           |
| 400  | CENSOR_ARGUMENT_NOTFOUND      | 参数param是必填参数                                      |
| 400  | CENSOR_INVALID_ARGUMENT       | 参数param取值不合法                                      |
| 400  | CENSOR_REQUEST_LIMITEXCEEDED  | 请求的次数超过了频率限制                                 |
| 500  | CENSOR_SERVICE_INTERNAL_ERROR | 服务器内部错误                                           |