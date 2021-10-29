# changeEnableQueryStringSortSetting


## 描述
星盾将把具有相同查询字符串的文件视为缓存中的同一个文件，而不管查询字符串的顺序如何。这只限于企业级域。


## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$sort_query_string_for_cache

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
|**result**|[Result](changeEnableQueryStringSortSetting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[ZoneSetting](changeEnableQueryStringSortSetting#zonesetting)| |
### <div id="zonesetting">ZoneSetting</div>
|名称|类型|描述|
|---|---|---|
|**id**|String| |
|**modified_on**|String| |
|**editable**|Boolean| |
|**value**|Object| |

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
