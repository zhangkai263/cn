# getIPv6Setting


## 描述
在所有启用星盾的子域上启用 IPv6。

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$ipv6

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
|**data**|[IPv6](#ipv6)| |
### <div id="IPv6">IPv6</div>
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
