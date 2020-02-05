# describeQualityDetectionBinding


## 描述
查询质量检测模板绑定


## 请求方式
GET

## 请求地址
https://live.jdcloud-api.com/v1/qualityDetectionTemplates/{template}:binding

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**template**|String|True| |质量检测模板|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String|requestId|

### <a name="Result">Result</a>
|名称|类型|描述|
|---|---|---|
|**bindingList**|[TemplateBinding[]](#TemplateBinding)|质量检测模板模板绑定集合|
### <a name="TemplateBinding">TemplateBinding</a>
|名称|类型|描述|
|---|---|---|
|**publishDomain**|String|推流域名|
|**appName**|String|应用名称|
|**streamName**|String|流名称|
|**template**|String|模板|

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

GET
```
https://live.jdcloud-api.com/v1/qualityDetectionTemplates/template:binding
```

## 返回示例
```
{
    "code": 200, 
    "requestId": "xxxxx", 
    "result": {
        "bindingList": [
            {
                "publishDomain": "push.yourdmain.com", 
                "template": "QualityDetection-test1"
            }, 
            {
                "appName": "live", 
                "publishDomain": "push.yourdmain.com", 
                "template": "QualityDetection-test2"
            }, 
            {
                "appName": "live", 
                "publishDomain": "push.yourdmain.com", 
                "streamName": "streamName", 
                "template": "QualityDetection-test3"
            }
        ]
    }
}
```
