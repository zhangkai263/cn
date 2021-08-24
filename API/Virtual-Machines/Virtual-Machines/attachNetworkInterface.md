# attachNetworkInterface


## 描述

为云主机绑定弹性网卡。

详细操作说明请参考帮助文档：[绑定弹性网卡](https://docs.jdcloud.com/cn/virtual-machines/attach-eni)

## 接口说明
- 实例状态必须为 `running` 或 `stopped` 状态，同时实例没有正在进行中的任务时才可以操作。
- 实例中的主网卡是不可以解绑和绑定的，绑定弹性网卡只支持绑定辅助网卡。
- 目标弹性网卡上如果绑定了弹性公网IP，那么其所在的可用区需要与云主机的可用区保持一致，或者弹性公网IP是全可用区类型的，才允许绑定该弹性网卡。
- 弹性网卡与云主机必须在相同vpc下。
- 对于受管网卡，授权中不能含有 `instance-attach` 用户才可以挂载。
- 对于授信网卡，授权中必须含有 `instance-attach` 用户才可以挂载。
- 实例挂载弹性网卡的数量，不能超过实例规格的限制。可查询 [DescribeInstanceTypes](https://docs.jdcloud.com/virtual-machines/api/describeinstancetypes) 接口获得指定规格可挂载弹性网卡的数量上限。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:attachNetworkInterface

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**networkInterfaceId**|String|是|port-n2h7****se|弹性网卡ID。|
|**autoDelete**|Boolean|否| |随云主机实例自动删除，默认为False。<br>受管网卡或授信网卡默认为False并且不支持修改。<br>|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
POST

```
/v1/regions/cn-north-1/instances/i-eumm****d6:attachNetworkInterface
{
  "networkInterfaceId" : "port-n2h7****se",
  "autoDelete": false
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
|**400**|FAILED_PRECONDITION|Flavor constraints. NetworkInterface limit exceeded|实例可绑定的弹性网卡已达到实例规格支持的上限。|
|**400**|FAILED_PRECONDITION|NetworkInterface has been attached on other device|该弹性网卡已经绑定了其它实例。|
|**400**|FAILED_PRECONDITION|No NetworkInterface permissions.|没有权限绑定该弹性网卡。|
|**400**|FAILED_PRECONDITION|ElasticIp 'xx' and instance are not in the same az|弹性网卡绑定的弹性公网IP与云主机实例不在同一个可用区中。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
