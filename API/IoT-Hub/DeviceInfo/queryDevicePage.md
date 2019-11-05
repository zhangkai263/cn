# queryDevicePage


## 描述
分页查询设备信息,支持一个或多个条件

## 请求方式
GET

## 请求地址
https://iothub.jdcloud-api.com/v2/regions/{regionId}/devices:queryPage

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |设备归属的实例所在区域|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**deviceName**|String|False| |设备名称，模糊匹配|
|**status**|Integer|False| |设备状态 0-未激活，1-激活离线，2-激活在线|
|**productKey**|String|False| |设备所归属的产品Key|
|**deviceType**|Integer|False| |设备类型，同产品类型，0-设备，1-网关|
|**nowPage**|Integer|False| |当前页数|
|**pageSize**|Integer|False| |每页的数据条数|
|**order**|String|False| |排序关键字--name,type,productKey,status--最多支持一个字段|
|**direction**|String|False| |顺序，升序降序--asc,desc|
|**parentId**|String|False| |父设备Id|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String| |

### Result
|名称|类型|描述|
|---|---|---|
|**pageSize**|Integer| |
|**nowPage**|Integer| |
|**totalSize**|Integer| |
|**totalPage**|Integer| |
|**data**|DeviceVO[]| |
### DeviceVO
|名称|类型|描述|
|---|---|---|
|**deviceId**|String|设备ID|
|**deviceName**|String|设备名称|
|**parentId**|String|父级设备Id|
|**deviceType**|String|设备类型，同产品类型，0-普通设备，1-网关，2-Edge|
|**status**|Integer|设备状态，0-未激活，1-激活离线，2-激活在线|
|**productKey**|String|产品Key|
|**identifier**|String|设备标识符|
|**secret**|String|设备秘钥|
|**description**|String|设备描述|
|**activatedTime**|Long|激活时间|
|**lastConnectedTime**|Long|最后连接时间|
|**createdTime**|Long|注册时间|
|**updatedTime**|Long|修改时间|
|**productSecret**|String|产品秘钥|
|**productName**|String|产品名称|
|**model**|String|设备型号|
|**manufacturer**|String|设备厂商|
|**dynamicRegister**|Integer|是否开启动态注册,0:关闭,1:开启，开启动态注册的设备认证类型为一型一密，否则为一机一密|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
