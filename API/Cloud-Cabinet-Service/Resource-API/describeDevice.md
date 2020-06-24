# describeDevice


## 描述
查询设备详情

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/idcs/{idc}/devices/{deviceId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**idc**|String|True| |IDC机房ID|
|**deviceId**|String|True| |设备实例ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describedevice#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**device**|[Device](describedevice#device)| |
### <div id="device">Device</div>
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
|**sysIp**|String|系统IP|
|**manageIp**|String|管理IP|
|**deviceType**|String|设备类型 server:服务器 network:网络设备 storage:存储设备 other:其他设备|
|**assetBelong**|String|资产归属 own:自备 lease:租赁|
|**assetStatus**|String|资产状态 launched:已上架 opened:已开通 canceling:退订中 operating:操作中 modifing:变更中|
|**deviceOpenTime**|String|开通时间，遵循ISO8601标准，使用UTC时间，格式为：yyyy-MM-ddTHH:mm:ssZ|
|**cpuCore**|String|CPU|
|**memory**|String|内存|
|**disk**|String|磁盘|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
