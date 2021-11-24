# stopInstance


## 描述

停止云主机实例。

详细操作说明请参考帮助文档：[停止实例](https://docs.jdcloud.com/cn/virtual-machines/stop-instance)

## 接口说明
- 实例状态必须为运行 `running` 状态，同时实例没有正在进行中的任务时才可停止。
- 如果云主机实例属性 `chargeOnStopped` 的值为 `stopCharging`，实例关机之后，实例部分将停止计费，且释放实例自身包含的资源（CPU/内存/GPU/本地数据盘）。需要使用者注意的是，实例一旦释放自身资源，再次启动时有可能因为库存资源不足而导致无法启动。
- `chargeOnStopped` 该参数仅对按配置计费且系统盘为云硬盘的实例生效，并且不是专有宿主机中的实例。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:stopInstance

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**chargeOnStopped**|String|否|keepCharging|停机不计费模式。<br>该参数仅对按配置计费且系统盘为云硬盘的实例生效，并且不是专有宿主机中的实例。<br>配置停机不计费且停机后，实例部分将停止计费，且释放实例自身包含的资源（CPU/内存/GPU/本地数据盘）。<br>可选值：<br>`keepCharging`：停机后保持计费，不释放资源。<br>`stopCharging`：停机后停止计费，释放实例资源。默认值为空。<br>|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
POST

```
/v1/regions/cn-north-1/instances/i-eumm****d6:stopInstance
{
    "chargeOnStopped": ""
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
|**400**|FAILED_PRECONDITION|keepCharging or stopCharging does not applied to dedicated host|专有宿主机中的实例不支持指定停机模式。|
|**400**|FAILED_PRECONDITION|stopCharging only applied to cloud system disk|停机停止计费模式只支持云盘系统盘的云主机。|
|**400**|FAILED_PRECONDITION|stopCharging only applied to postpaid by duration|停机停止计费模式只支持按配置计费的云主机。|
|**400**|FAILED_PRECONDITION|order not found|停机停止计费模式校验云主机计费单失败。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
