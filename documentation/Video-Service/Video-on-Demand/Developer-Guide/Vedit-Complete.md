# 视频剪辑完成回调

## 事件类型

视频剪辑完成后，会触发 VeditComplete 事件。

## 回调内容
**NotifyBody** 结构

|字段名称|字段类型|字段描述|
|---|---|---|
|eventType|String|事件类型，特定值为 VeditComplete|
|eventTime|String|事件时间，为 UTC 时间的字符串表示，格式为 yyyy-MM-ddTHH:mm:ssZ|
|jobId|Long|作业ID|
|projectId|String|文件地址|
|status|string|结果状态，成功 succeeded，失败 failed|
|resultCode|String|结果状态码，RC00为成功，其他为失败|
|resultPhrase|String|结果状态短语|
|veditResult|**VeditResult**|剪辑结果，当status为succeeded时，此结果不为空|

**VeditResult** 结构

|字段名称|字段类型|字段描述|
|---|---|---|
|videoId|String|视频ID|


## 内容示例

> 说明：<br>
> 当前仅视频点播仅支持 HTTP 回调，故回调内容即为 HTTP POST Request Body

```json
{
  "eventTime": "2021-07-15T20:45:51.465Z",
  "eventType": "VeditComplete",
  "jobId": 1004,
  "resultCode": "RC00",
  "resultPhrase": "OK",
  "projectId": 1004,
  "veditResult": {
    "videoId": "ef86c120-e1aa-4285-950d-2ccca8c2555f"
  },
  "status": "succeeded"
}
```




