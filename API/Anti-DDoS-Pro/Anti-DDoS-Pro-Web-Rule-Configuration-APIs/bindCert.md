# bindCert


## 描述
网站类规则绑定 SSL 证书

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/webRules/{webRuleId}:bindCert

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|
|**webRuleId**|String|True| |网站规则 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**certId**|String|True| |证书 Id. 使用 <a href='https://docs.jdcloud.com/cn/ssl-certificate/api/describecerts'>describeCerts</a> 接口, 按照域名检索可绑定的证书, 域名不匹配将导致证书配置失败|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](bindcert#result)| |
|**requestId**|String| |
|**error**|[Error](bindcert#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](bindcert#err)| |
### <div id="err">Err</div>
|名称|类型|描述|
|---|---|---|
|**code**|Long|同http code|
|**details**|Object| |
|**message**|String| |
|**status**|String|具体错误|
### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**code**|Integer|0: 绑定失败, 1: 绑定成功|
|**message**|String|绑定失败时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
