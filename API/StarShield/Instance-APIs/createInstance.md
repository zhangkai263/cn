# createInstance


## 描述
创建套餐实例

## 请求方式
POST

## 请求地址
https://starshield.jdcloud-api.com/v1/regions/{regionId}/instances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**chargeMode**|String|True| |计费模式（CONFIG、FLOW、MONTHLY、ONCE）|
|**packType**|String|True| |套餐类型（FREE、BASIC、PROFESSIONAL、ENTERPRISE、ULTIMATE、SMB_BASIC、SMB_BUSINESS）|
|**zonePackNum**|Integer|False| |域名增量包数量|
|**duration**|Integer|False| |计费时长|
|**durationUnit**|String|False| |计费时长单位（MONTH、YEAR）|
|**autoRenewStatus**|String|False|CLOSE|自动续费状态(OPEN->开通自动续费 CLOSE->关闭自动续费)|
|**instanceName**|String|True| |实例名称|
|**memo**|String|False| |备注|
|**returnUrl**|String|False| |支付成功返回路径|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createInstance#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**buyId**|String|购买ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
