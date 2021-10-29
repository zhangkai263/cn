# changeSSLSetting


## 描述
SSL对访问者的连接进行加密，并保护信用卡号码和其他进出网站的个人数据。
SSL最多需要5分钟才能完全激活。需要在星盾激活你的根域或www域。
Off，访客和星盾之间没有SSL，星盾和你的Web服务器之间也没有SSL（所有HTTP流量）。
Flexible, 访客和星盾之间的 SSL -- 访客在你的网站上看到 HTTPS，但星盾和你的 Web 服务器之间没有 SSL。您不需要在您的 Web 服务器上安装 SSL 证书，但您的访客仍会看到启用 HTTPS 的网站。
Full, 访客和星盾之间的 SSL -- 访客在你的网站上看到 HTTPS，以及星盾和你的 Web 服务器之间的 SSL。您至少需要有自己的 SSL 证书或自签名的证书。
Full (Strict), 访客和星盾之间的 SSL -- 访客在您的网站上看到 HTTPS，以及星盾和您的 Web 服务器之间的 SSL。你需要在你的网络服务器上安装一个有效的SSL证书。
这个证书必须由一个证书机构签署，有一个在未来的到期日，并为请求的域名（主机名）作出回应。


## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$ssl

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|String|False| |该设置的有效值|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[SSL](#ssl)| |
### <div id="SSL">SSL</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|String|该配置的有效值|
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
