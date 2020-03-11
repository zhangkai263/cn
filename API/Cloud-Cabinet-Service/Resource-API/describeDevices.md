# describeDevices


## 描述
查询设备列表

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/idcs/{idc}/devices

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**idc**|String|True| |IDC机房ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1|
|**pageSize**|Integer|False|20|分页大小，默认为20|
|**cabinetId**|String|False| |机柜ID|
|**filters**|[Filter[]](describedevices#filter)|False| |deviceId - 设备实例ID，精确匹配，支持多个<br>snNo - 设备SN号，精确匹配，支持多个<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describedevices#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**devices**|[DescribeDevice[]](describedevices#describedevice)|设备列表|
|**pageNumber**|Integer|页码|
|**pageSize**|Integer|分页大小|
|**totalCount**|Integer|总数量|
### <div id="describedevice">DescribeDevice</div>
|名称|类型|描述|
|---|---|---|
|**idc**|String|机房英文标识|
|**idcName**|String|机房名称|
|**deviceId**|String|设备Id|
|**snNo**|String|设备SN号|
|**cabinetNo**|String|机柜编码|
|**rackUIndex**|String|所在U位|
|**uNum**|Integer|U数（U）|
|**brand**|String|品牌|
|**model**|String|型号|
|**deviceType**|String|设备类型 server:服务器 network:网络设备 storage:存储设备 other:其他设备|
|**assetBelong**|String|资产归属 own:自备 lease:租赁|
|**assetStatus**|String|资产状态 launched:已上架 opened:已开通 canceling:退订中 operating:操作中 modifing:变更中|
|**deviceOpenTime**|String|开通时间，遵循ISO8601标准，使用UTC时间，格式为：yyyy-MM-ddTHH:mm:ssZ|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
