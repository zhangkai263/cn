# attachDisk


## 描述

为一台云主机实例挂载云硬盘。

详细操作说明请参考帮助文档：[挂载云硬盘](https://docs.jdcloud.com/cn/virtual-machines/attach-cloud-disk)

## 接口说明
- 云主机和云硬盘都没有正在进行中的的任务时才可以操作。
- 云主机状态必须是 `running` 或 `stopped` 状态。操作系统盘时必须先停止实例。
- 实例挂载云硬盘的数量，不能超过实例规格的限制。可查询  [DescribeInstanceTypes](https://docs.jdcloud.com/virtual-machines/api/describeinstancetypes)  接口获得指定规格可挂载云硬盘的数量上限。
- 云硬盘作为系统盘挂载时，容量不能小于40GB，并且不能超过500GB。
- 待挂载的云硬盘与云主机实例必须在同一个可用区下。
- 共享型云硬盘最多可挂载至16个云主机实例，并且只能用作数据盘，不能用于系统盘。非共享型云盘最多只能挂载至一个云主机实例。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:attachDisk

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**diskId**|String|是|vol-u8r2****c1|云硬盘ID。|
|**deviceName**|String|否|vdb|磁盘逻辑挂载点。<br>**系统盘**：必须指定并且只能是vda。<br>**数据盘**：取值范围：`[vdb~vdbm]`。<br>|
|**autoDelete**|Boolean|否| |是否随实例一起删除，即删除实例时是否自动删除此磁盘。此参数仅对按配置计费的非多点挂载云硬盘生效。<br>可选值：<br>`true`：随实例删除。<br>`false`（默认值）：不随实例删除。<br>|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
POST

```
/v1/regions/cn-north-1/instances/i-eumm****d6:attachDisk
{
    "diskId" : "vol-u8r2****c1",
    "deviceName" : "vdb",
    "autoDelete" : true
}
```



## 返回示例
```
{
    "requestId": "a0633f72670e59f8c6db36b1ee257011"
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|FAILED_PRECONDITION|Conflict with underlay task xx|云主机实例正在执行其它任务，请稍后再试。|
|**400**|FAILED_PRECONDITION|Invalid instance status xx|错误的云主机状态。|
|**400**|FAILED_PRECONDITION|Duplicated system disk|云主机实例中已存在系统盘。|
|**400**|FAILED_PRECONDITION|DataDisks out of range|云主机实例挂载的云硬盘已达到实例规格的限制上限。|
|**400**|FAILED_PRECONDITION|DeviceName 'xx' has been used|指定的盘符在云主机实例中已经存在。|
|**400**|FAILED_PRECONDITION|Disk 'xx' already attached|云硬盘已经挂载在当前实例中。|
|**400**|FAILED_PRECONDITION|Disk busy in 'xx'|云硬盘正在执行其它任务，请稍后再试。|
|**400**|FAILED_PRECONDITION|The system disk does not support shared disk|系统盘不支持使用共享型云硬盘。|
|**400**|FAILED_PRECONDITION|Disk attachment limit exceeded|共享型云硬盘、或非共享型云盘已经达到可挂载实例的上限。|
|**400**|FAILED_PRECONDITION|Invalid disk status 'xx'|云硬盘状态错误。|
|**400**|FAILED_PRECONDITION|The instance and disk are not in the same az|云硬盘与云主机不在同一可用区中。|
|**400**|FAILED_PRECONDITION|System disk size constraints|云硬盘作为系统盘超过规定大小。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**404**|NOT_FOUND|Disk 'xx' not found.|云硬盘不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
