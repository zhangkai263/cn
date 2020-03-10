# deleteIpSet


## 描述
删除实例的 IP 黑白名单. 支持批量操作, 批量操作时 ipSetId 传多个, 以 ',' 分隔. IP 黑白名单规则被引用时不允许删除

## 请求方式
DELETE

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/ipSets/{ipSetId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|
|**ipSetId**|String|True| |IP 黑白名单 Id|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](deleteipset#result)| |
|**requestId**|String| |
|**error**|[Error](deleteipset#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](deleteipset#err)| |
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
|**data**|[BatchResultDetail](deleteipset#batchresultdetail)| |
### <div id="batchresultdetail">BatchResultDetail</div>
|名称|类型|描述|
|---|---|---|
|**successCount**|Integer|操作成功的资源个数|
|**failed**|[ErrorItem[]](deleteipset#erroritem)|操作失败的资源及原因|
### <div id="erroritem">ErrorItem</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|出错资源ID|
|**code**|Long|错误码，同标准code|
|**details**|Object| |
|**message**|String| |
|**status**|String|具体错误，同标准status|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
