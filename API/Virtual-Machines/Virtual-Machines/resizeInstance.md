# resizeInstance


## 描述

变更云主机实例配置。

详细操作说明请参考帮助文档：[调整配置](https://docs.jdcloud.com/cn/virtual-machines/resize-instance)

## 接口说明
  - 云主机的状态必须为 `stopped` 状态。
  - 16年创建的云硬盘做系统盘的云主机，实例规格不允许跨代调配。
  - 若当前实例系统盘为本地盘，则不允许跨代调配，例如第一代云主机不允许与第二代云主机互相调配，且不允许调整至第一代存储优化大数据型 `s.d1` 及第二代存储优化大数据型 `s.d2`。
  - 若当前实例在高可用组内，则不允许调配至除GPU类型外的第一代云主机，受限于高可用组支持的规格情况。
  - 若当前实例已挂载加密云盘，则不允许调配至第一代云主机，受限于支持加密盘的规格情况。
  - 裸金属实例规格主机暂不支持调配，即不支持从其他规格调整为裸金属规格或从裸金属规格调整为其他规格。
  - 对于按配置计费实例，调整配置后将按照新规格计费，调整前规格会立即出账结算（即对上次整点结算时间至当前时间产生的费用进行结算）。
  - 若当前实例带有本地数据盘，需清除本地盘内数据才可调整配置，还请谨慎操作。
  - 对于包年包月计费云主机：
	- 若调配后规格价格低于调配前规格价格，则将延长云主机到期时间；
	- 若调配后规格价格高于调配前规格价格，需要支付到期前的差价。
  - 如果当前主机中的弹性网卡数量，超过了目标实例规格允许的弹性网卡数量，会返回错误。可查询 [DescribeInstanceTypes](https://docs.jdcloud.com/virtual-machines/api/describeinstancetypes) 接口获得实例规格允许的弹性网卡数量。
  - 如果当前主机中的云硬盘数据，超过了目标实例规格允许的云硬盘数量，会返回错误。可查询 [DescribeInstanceTypes](https://docs.jdcloud.com/virtual-machines/api/describeinstancetypes) 接口获得实例规格允许的云硬盘数量。
  - 当前主机所使用的镜像，需要支持目标实例规格，否则返回错误。可查询 [DescribeImageConstraints](docs.jdcloud.com/virtual-machines/api/describeimageconstraints) 接口获得指定镜像的实例规格限制信息。
  - 云主机欠费或到期时，无法更改实例规格。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:resizeInstance

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**instanceType**|String|是|g.n2.8xlarge|实例规格，可查询 [DescribeInstanceTypes](https://docs.jdcloud.com/virtual-machines/api/describeinstancetypes) 接口获得指定地域或可用区的规格信息。|
|**force**|Boolean|否| |是否强制调配，默认为 `false`。如果指定为 `true`, 将会清除本地数据盘。|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
POST

```
/v1/regions/cn-north-1/instances/i-eumm****d6:resizeInstance
{
    "instanceType": "g.n2.medium"
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
|**400**|FAILED_PRECONDITION|Conflict with underlay task 'xx'|云主机实例正在执行其它任务，请稍后再试。|
|**400**|FAILED_PRECONDITION|Invalid instance status 'xx'|错误的云主机状态。|
|**404**|NOT_FOUND|System disk not found|云主机没有挂载系统盘。|
|**400**|FAILED_PRECONDITION|Invalid system disk mount state|云主机系统盘挂载状态异常。|
|**400**|FAILED_PRECONDITION|Local_data disk instance xx can't resize, resize need to apoint force parameter as true|带有本地数据盘的云主机，必须指定force强制变配。|
|**400**|FAILED_PRECONDITION|Please stop the instance first.|需要将云主机实例关机再操作。|
|**400**|FAILED_PRECONDITION|Charge order not found|云主机计费状态异常。|
|**400**|FAILED_PRECONDITION|DedicatedHost 'xx' is not available.|专有宿主机资源不满足。|
|**400**|FAILED_PRECONDITION|Resource is not enough|专有宿主机资源不满足。|
|**400**|FAILED_PRECONDITION|InstanceType 'xx' is out of stock|实例规格库存不足。|
|**400**|FAILED_PRECONDITION|InstanceType constraints. NetworkInterface limit exceeded|当前实例中的弹性网卡数量，已超过目标实例规格的限制。|
|**400**|FAILED_PRECONDITION|InstanceType constraints. CloudDisk limit exceeded|当前实例中的云硬盘数量，已超过目标实例规格的限制。|
|**400**|FAILED_PRECONDITION|Image constraints. Doesn't support instanceType 'xx'|当前实例使用的镜像不支持目标实例规格。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**404**|NOT_FOUND|InstanceType 'xx' not found|实例规格未找到。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
