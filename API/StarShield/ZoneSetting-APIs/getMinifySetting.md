# getMinifySetting


## 描述
获取你的网站自动最小化资产的配置

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$minify

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
|**data**|[Auto_MinifyAssets](#auto_minifyassets)| |
### <div id="Auto_MinifyAssets">Auto_MinifyAssets</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|[Value_0_0](#value_0_0)| |
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|
### <div id="Value_0_0">Value_0_0</div>
|名称|类型|描述|
|---|---|---|
|**css**|String|为你的网站自动最小化所有的CSS|
|**html**|String|为你的网站自动最小化所有的HTML|
|**js**|String|为你的网站自动最小化所有的JavaScript|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
