# editZoneSettingsInfo


## 描述
批量更新域的设置

## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**items**|[Item[]](editZoneSettingsInfo#item)|False| |一或多个域配置对象。必须包含ID和值。|

### <div id="item">Item</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**id**|String|False| | |
|**value**|String|False| | |

## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
