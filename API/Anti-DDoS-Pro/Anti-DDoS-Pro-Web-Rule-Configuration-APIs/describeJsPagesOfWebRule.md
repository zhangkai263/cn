# describeJsPagesOfWebRule


## 描述
查询网站类规则允许插入JS指纹的页面

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/webRules/{webRuleId}/jsPages

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|
|**webRuleId**|String|True| |网站规则 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |页码, 默认为1|
|**pageSize**|Integer|False| |分页大小, 默认为10, 取值范围[10, 100]|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describejspagesofwebrule#result)| |
|**requestId**|String| |
|**error**|[Error](describejspagesofwebrule#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](describejspagesofwebrule#err)| |
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
|**dataList**|[JsPage[]](describejspagesofwebrule#jspage)| |
|**currentCount**|Long|当前页数量|
|**totalCount**|Long|总数|
|**totalPage**|Long|总页数|
### <div id="jspage">JsPage</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|允许插入JS指纹的页面 ID|
|**uri**|String|允许插入JS指纹的页面 URI|
|**createTime**|String|页面添加时间|
|**updateTime**|String|页面更新时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
