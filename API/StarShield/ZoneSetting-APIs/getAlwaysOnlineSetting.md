# getAlwaysOnlineSetting


## 描述
获取当前Always Online的配置。当Always Online开启时，在你的源站离线期间，星盾会提供已缓存过的页面。

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$always_online

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
|**data**|[AlwaysOnlineMode](#alwaysonlinemode)| |
### <div id="AlwaysOnlineMode">AlwaysOnlineMode</div>
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
