# createVqdTemplate


## 描述
创建视频质检模板

## 请求方式
POST

## 请求地址
https://vqd.jdcloud-api.com/v1/vqdTemplates


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**templateName**|String|True| |模板名称。长度不超过128个字符。UTF-8编码。<br>|
|**threshold**|Double|False| |缺陷判定时间阈值，非必须，默认值为 3.0|
|**detections**|String[]|True| |检测项列表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createvqdtemplate#result)|创建视频质检模板结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**templateId**|String|模板ID|
|**templateName**|String|模板名称。长度不超过128个字符。UTF-8编码。<br>|
|**threshold**|Double|缺陷判定时间阈值|
|**detections**|String[]|检测项列表|
|**createTime**|String|创建时间|
|**updateTime**|String|修改时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
POST
```
https://vqd.jdcloud-api.com/v1/vqdTemplates

```
```
{
    "detections": [
        "BlackScreen", 
        "PureColor"
    ], 
    "templateName": "模板-10000", 
    "threshold": "3.000"
}
```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "createTime": "2019-04-16T15:51:32Z", 
        "detections": [
            "BlackScreen", 
            "ColorCast"
        ], 
        "templateId": "10000", 
        "templateName": "模板-10000", 
        "threshold": "3.000", 
        "updateTime": "2019-04-16T15:51:32Z"
    }
}
```
