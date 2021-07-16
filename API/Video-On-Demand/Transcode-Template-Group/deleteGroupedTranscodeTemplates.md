# deleteGroupedTranscodeTemplates


## 描述
删除转码模板组中的模板。


## 请求方式
POST

## 请求地址
https://vod.jdcloud-api.com/v1/transcodeTemplateGroups:deleteGroupedTranscodeTemplates


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**groupId**|String|False| |模板组ID|
|**templateIds**|Long|False| |待删除的模板ID列表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](deletegroupedtranscodetemplates#result)|删除操作结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**groupId**|Long|模板组ID|
|**okTemplateIds**|Long[]|删除成功的模板ID列表|
|**notExistTemplateIds**|Long[]|不存在的模板ID列表|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**500**|Internal server error|
|**503**|Service unavailable|
