# changeWebApplicationFirewallWAFSetting


## 描述
WAF检查对您网站的HTTP请求。它检查GET和POST请求，并应用规则来帮助从合法的网站访问者中过滤出非法流量。星盾 WAF 检查网站地址或 URL 以检测任何不正常的东西。
如果星盾 WAF确定了可疑的用户行为。那么 WAF 将用一个页面 "挑战 "网络访客，要求他们成功提交验证码以继续其行动。
如果挑战失败，行动将被停止。这意味着 星盾 的 WAF 将在任何被识别为非法的流量到达您的源网络服务器之前将其阻止。


## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$waf

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|String|False| |on - 开启；off - 关闭|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[WebApplicationFirewall](#webapplicationfirewall)| |
### <div id="WebApplicationFirewall">WebApplicationFirewall</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|String|on - 开启；off - 关闭|
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
