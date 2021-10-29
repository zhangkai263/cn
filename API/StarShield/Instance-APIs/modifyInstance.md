# modifyInstance


## 描述
升级套餐实例

## 请求方式
PUT

## 请求地址
https://starshield.jdcloud-api.com/v1/regions/{regionId}/instance/{instanceId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**instanceId**|String|True| |实例ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**packType**|String|True| |套餐类型|
|**zonePackNum**|Integer|False| |域名增量包数量|
|**returnUrl**|String|False| |支付成功后返回到该路径|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String|此次请求的ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**buyId**|String|购买ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
