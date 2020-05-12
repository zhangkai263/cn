# describeRooms


## 描述
查询机房房间号列表

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/idcs/{idc}/rooms

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**idc**|String|True| |IDC机房ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1|
|**pageSize**|Integer|False|20|分页大小，默认为20|
|**filters**|[Filter[]](describerooms#filter)|False| |roomNo - 房间号，精确匹配，支持多个<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describerooms#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**rooms**|[Room[]](describerooms#room)|房间号列表|
|**pageNumber**|Integer|页码|
|**pageSize**|Integer|分页大小|
|**totalCount**|Integer|总数量|
### <div id="room">Room</div>
|名称|类型|描述|
|---|---|---|
|**idc**|String|机房英文标识|
|**idcName**|String|机房名称|
|**roomNo**|String|房间号|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
