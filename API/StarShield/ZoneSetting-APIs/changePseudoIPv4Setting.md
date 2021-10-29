# changePseudoIPv4Setting


## 描述
设置Pseudo IPv4(IPv6到IPv4的转换服务)

## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$pseudo_ipv4

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
|**result**|[Result](changePseudoIPv4Setting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[PseudoIPv4Value](changePseudoIPv4Setting#pseudoipv4value)| |
### <div id="pseudoipv4value">PseudoIPv4Value</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|String|该设置的有效值|
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
