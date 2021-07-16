# describeCustomPages


## 描述
查询自定义页面列表

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/customPages

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |实例 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**status**|String|False| |自定义页面状态, 可取值approving: 审批中, refused: 审批不通过, approved: 审批通过, 为空时查询全部|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describecustompages#result)| |
|**requestId**|String| |
|**error**|[Error](describecustompages#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](describecustompages#err)| |
### <div id="err">Err</div>
|名称|类型|描述|
|---|---|---|
|**code**|Long|同http code|
|**details**|Object| |
|**message**|String| |
|**status**|String|具体错误|
### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[CustomPage[]](describecustompages#custompage)| |
### <div id="custompage">CustomPage</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|自定义页面Id|
|**name**|String|自定义页面名称|
|**content**|String|自定义页面内容|
|**updateTime**|String|更新时间|
|**status**|String|approving: 审批中, refused: 审批不通过, approved: 审批通过|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
