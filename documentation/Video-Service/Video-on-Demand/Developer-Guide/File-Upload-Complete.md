# 文件上传回调

## 事件类型

视频文件上传到媒资空间后，会触发 FileUploadComplete 事件。

## 回调内容

|字段名称|字段类型|字段描述|
|---|---|---|
|eventType|String|事件类型，特定值为 FileUploadComplete|
|eventTime|String|事件时间，为 UTC 时间的字符串表示，格式为 yyyy-MM-ddTHH:mm:ssZ|
|videoId|String|视频ID|
|fileUrl|String|文件地址|
|size|Long|文件大小，单位为 Byte|
|md5|String|文件内容摘要|

## 内容示例

> 说明：<br>
> 当前仅视频点播仅支持 HTTP 回调，故回调内容即为 HTTP POST Request Body

```json
{
    "eventTime": "2020-07-28T09:58:27.707Z",
    "eventType": "FileUploadComplete",
    "fileUrl": "https://s3.cn-north-1.jcloudcs.com/vod-storage-272769/source/2020/20200728/422/317bd090-c4cb-4a3e-b2da-2881bf541295.mp4",
    "size": 5874985,
    "videoId": "38b0eca4-ac76-4de6-b5bc-467e4cd09cbd",
    "md5": "8eb8a1253670cd928967fc4e84c9a5cc"
}
```




