# setAutoUpgrade


## 描述
设置自动升级

## 请求方式
POST

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/clusters/{clusterId}:setAutoUpgrade

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|
|**clusterId**|String|True| |集群 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**autoUpgrade**|Boolean|True| |开启或者关闭集群自动升级，开启时必须指定 maintenancePolicy|
|**maintenanceWindow**|MaintenanceWindowSpec|False| |开启集群自动升级, 必须配置集群维护策略|

### MaintenanceWindowSpec
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**periodType**|String|False| |daily, weekly, monthly， 默认 weekly|
|**startDay**|Integer|False| |维护操作开始具体日期, 仅对 periodType 取值为 weekly 或 monthly 时有效, periodType 为 weekly 时可以取 1-7, periodType 为 monthly 时可取 1-28<br>|
|**startTime**|String|True| |维护操作开始具体时间. 时间格式符合RFC3339，并使用 UTC 时间，精确到分钟，例如 23:27|
|**timeZone**|String|False| |时区，使用 IANA 数据格式，例如："Asia/Shanghai" 或 "America/Los_Angeles"，默认 "UTC"|
|**duration**|Integer|False| |维护运行时长: 4-24 小时，步长 1 小时， 默认为： 4小时|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**429**|Quota exceeded|
|**500**|Internal server error|
|**503**|Service unavailable|
