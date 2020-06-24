# describeCabinets


## 描述
查询机柜列表

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/idcs/{idc}/cabinets

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**idc**|String|True| |IDC机房ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1|
|**pageSize**|Integer|False|20|分页大小，默认为20|
|**filters**|[Filter[]](describecabinets#filter)|False| |roomNo - 房间号，精确匹配，支持多个<br>cabinetId - 机柜ID，精确匹配，支持多个<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describecabinets#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**cabinets**|[DescribeCabinet[]](describecabinets#describecabinet)|机柜列表|
|**pageNumber**|Integer|页码|
|**pageSize**|Integer|分页大小|
|**totalCount**|Integer|总数量|
### <div id="describecabinet">DescribeCabinet</div>
|名称|类型|描述|
|---|---|---|
|**idc**|String|机房英文标识|
|**idcName**|String|机房名称|
|**cabinetId**|String|机柜Id|
|**cabinetNo**|String|机柜编码|
|**roomNo**|String|房间号|
|**cabinetSpace**|Integer|机柜空间(U)|
|**cabinetPower**|Integer|额定电流(A)|
|**cabinetType**|String|机柜类型 formal:正式机柜 reserved:预留机柜|
|**cabinetOpenStatus**|String|机柜开通状态 disabled:未开通 enabling:开通中 enabled:已开通 disabling:关电中|
|**cabinetOpenTime**|String|开通时间，遵循ISO8601标准，使用UTC时间，格式为：yyyy-MM-ddTHH:mm:ssZ|
|**expireTime**|String|到期时间，遵循ISO8601标准，使用UTC时间，格式为：yyyy-MM-ddTHH:mm:ssZ|
|**reserveStartTime**|String|预留开始时间，遵循ISO8601标准，使用UTC时间，格式为：yyyy-MM-ddTHH:mm:ssZ|
|**reserveEndTime**|String|预留结束时间，遵循ISO8601标准，使用UTC时间，格式为：yyyy-MM-ddTHH:mm:ssZ|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
