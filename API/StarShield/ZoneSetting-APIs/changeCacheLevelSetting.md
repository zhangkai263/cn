# changeCacheLevelSetting


## 描述
缓存级别的功能是基于设置的级别。
basic设置将缓存大多数静态资源（即css、图片和JavaScript）。
simplified设置将在提供缓存的资源时忽略查询字符串。
aggressive设置将缓存所有的静态资源，包括有查询字符串的资源。


## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$cache_level

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|String|False|aggressive|该设置的有效值|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](changeCacheLevelSetting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[CloudflareCacheLevel](changeCacheLevelSetting#cloudflarecachelevel)| |
### <div id="cloudflarecachelevel">CloudflareCacheLevel</div>
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
