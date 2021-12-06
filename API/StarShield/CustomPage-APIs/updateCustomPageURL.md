# updateCustomPageURL


## 描述
更新自定义页面URL

## 请求方式
PUT

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/custom_pages/{identifier}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |
|**identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**url**|String|False| |与自定义页面关联的URL。|
|**state**|String|False| |自定义页面状态|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](updateCustomPageURL#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[CustomPage](updateCustomPageURL#custompage)| |
### <div id="custompage">CustomPage</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|自定义页面类型的名称|
|**created_on**|String|创建自定义页面时间|
|**modified_on**|String|上次修改自定义页面的时间|
|**url**|String|与自定义页面关联的URL。|
|**state**|String|自定义页面状态|
|**required_tokens**|String[]|自定义HTML页面中必须存在的字符串标记|
|**preview_target**|String|预览自定义页面时，需要将“target”作为查询字符串的一部分|
|**description**|String|自定义页面的简短描述。|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
