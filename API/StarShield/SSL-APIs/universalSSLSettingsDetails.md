# universalSSLSettingsDetails


## 描述
获取域的通用SSL证书设置

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/ssl$$universal$$settings

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[UniversalSSLSetting](#universalsslsetting)| |
### <div id="UniversalSSLSetting">UniversalSSLSetting</div>
|名称|类型|描述|
|---|---|---|
|**enabled**|Boolean|禁用通用SSL将从边缘上删除域的所有当前激活的通用SSL证书并且防止将来订购任何通用SSL证书。如果没有为域上载专用证书或自定义证书，访问者将无法通过HTTPS访问域。<br>通过禁用通用SSL，您知道以下星盾设置和首选项将导致访问者无法访问您的域，除非您上载了自定义证书或购买了专用证书。<br>  * HSTS<br>  * Always Use HTTPS<br>  * Opportunistic Encryption<br>  * Onion Routing<br>  * Any Page Rules redirecting traffic to HTTPS<br>类似地，在启用星盾代理时，在源站将任何HTTP重定向到HTTPS将导致用户在星盾的边缘没有有效证书的情况下无法访问您的站点。<br>如果您在星盾的边缘没有有效的自定义或专用证书，并且不确定是否启用了上述任何星盾设置，或者如果您的源站存在任何HTTP重定向，我们建议您的域保持启用通用SSL。|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
