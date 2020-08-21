# deleteListenerCertificates


## 描述
listener批量删除扩展证书

## 请求方式
POST

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/listeners/{listenerId}:deleteListenerCertificates

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**listenerId**|String|True| |监听器ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**certificateBindIds**|String[]|True| |【alb Https和Tls协议】扩展证书绑定Id|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Request parameter error|
|**500**|Internal server error|
