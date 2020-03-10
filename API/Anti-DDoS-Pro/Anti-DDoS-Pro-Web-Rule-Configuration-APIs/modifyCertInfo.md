# modifyCertInfo


## 描述
编辑网站规则证书信息

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/webRules/{webRuleId}:modifyCertInfo

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|
|**webRuleId**|String|True| |网站规则 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**certInfoModifySpec**|[CertInfoModifySpec](modifycertinfo#certinfomodifyspec)|True| |编辑网站规则证书信息请求参数|

### <div id="certinfomodifyspec">CertInfoModifySpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**certId**|String|False| |证书 Id<br>- 如果传 certId, 请确认已经上传了相应的证书<br>- certId 缺省时网站规则将使用 httpsCertContent, httpsRsaKey 对应的证书|
|**httpsCertContent**|String|False| |证书内容|
|**httpsRsaKey**|String|False| |私钥|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](modifycertinfo#result)| |
|**requestId**|String| |
|**error**|[Error](modifycertinfo#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](modifycertinfo#err)| |
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
|**code**|Integer|上传 SSL 证书结果, 0: 删除证书失败, 1: 删除证书成功|
|**message**|String|上传成功时为证书 Id, 失败时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
