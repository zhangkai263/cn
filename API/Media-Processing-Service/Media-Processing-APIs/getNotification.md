# getNotification


## 描述
获取媒体处理通知

## 请求方式
GET

## 请求地址
https://mps.jdcloud-api.com/v1/regions/{regionId}/notification

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |region id|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](user-content-getnotification#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**notification**|[Notification](user-content-getnotification#notification)| |
### <div id="notification">Notification</div>
|名称|类型|描述|
|---|---|---|
|**enabled**|Boolean|是否启用通知|
|**endpoint**|String|通知endpoint, 当前支持http://和https://|
|**events**|String[]|触发通知的事件集合 (mpsTranscodeComplete, mpsThumbnailComplete)|
|**notifyStrategy**|String|重试策略, BACKOFF_RETRY: 退避重试策略, 重试 3 次, 每次重试的间隔时间是 10秒 到 20秒 之间的随机值; EXPONENTIAL_DECAY_RETRY: 指数衰减重试, 重试 176 次, 每次重试的间隔时间指数递增至 512秒, 总计重试时间为1天; 每次重试的具体间隔为: 1, 2, 4, 8, 16, 32, 64, 128, 256, 512, 512 ... 512 秒(共167个512)|
|**notifyContentFormat**|String|描述了向 Endpoint 推送的消息格式, JSON: 包含消息正文和消息属性, SIMPLIFIED: 消息体即用户发布的消息, 不包含任何属性信息|

## 返回码
|返回码|描述|
|---|---|
|**200**|成功|
