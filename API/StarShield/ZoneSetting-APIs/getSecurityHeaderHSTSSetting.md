# getSecurityHeaderHSTSSetting


## 描述
星盾域的安全标头。

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$security_header

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
|**data**|[SecurityHeader](#securityheader)| |
### <div id="SecurityHeader">SecurityHeader</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|[Value](#value)| |
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|
### <div id="Value">Value</div>
|名称|类型|描述|
|---|---|---|
|**strict_transport_security**|[Strict_transport_security](#strict_transport_security)| |
### <div id="Strict_transport_security">Strict_transport_security</div>
|名称|类型|描述|
|---|---|---|
|**enabled**|Boolean|是否启用了严格传输安全|
|**max_age**|Number|严格传输安全的最大时间（秒）。|
|**include_subdomains**|Boolean|包括所有子域，以保证严格传输安全|
|**nosniff**|Boolean|是否包含'X-Content-Type-Options.. nosniff'头|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
