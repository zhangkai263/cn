# describeCabinet


## 描述
查询机柜详情

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/idcs/{idc}/cabinets/{cabinetId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**idc**|String|True| |IDC机房ID|
|**cabinetId**|String|True| |机柜实例ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describecabinet#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**cabinet**|[Cabinet](describecabinet#cabinet)| |
### <div id="cabinet">Cabinet</div>
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
|**deviceNum**|Integer|设备数量|
|**rackUOccupy**|Integer|占用U数(U)|
|**rackUFree**|Integer|空闲U数(U)|
|**billingType**|Integer|计费类型 1:按配置 2:按用量 3:包年包月 4:一次性（目前仅支持包年包月）|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
