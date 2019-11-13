# addCustomLiveStreamQualityDetectionTemplate


## 描述
添加直播质量检测模板

## 请求方式
POST

## 请求地址
https://live.jdcloud-api.com/v1/qualityDetectionCustoms:template


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**template**|String|True| |模板名称。长度不超过128个字符。UTF-8编码<br>|
|**modules**|String[]|True| |检测项列表。取值范围：<br>  BlackScreen - 黑屏<br>  PureColor - 纯色<br>  ColorCast - 偏色<br>  FrozenFrame - 静帧<br>  Brightness - 亮度<br>  Contrast - 对比度<br>|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|requestId|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
POST
```
https://live.jdcloud-api.com/v1/qualityDetectionCustoms:template
```

```
{
    "modules": [
        "blackScreen", 
        "contrast"
    ], 
    "template": "my qd template"
}
```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41"
}
```
