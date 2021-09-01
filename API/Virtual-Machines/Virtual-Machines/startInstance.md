# startInstance


## 描述

启动云主机实例。

详细操作说明请参考帮助文档：[启动实例](https://docs.jdcloud.com/cn/virtual-machines/start-instance)

## 接口说明
- 实例状态必须为停止 `stopped` 状态，同时实例没有正在进行中的任务时才可以启动。
- 如果实例为停机不计费模式，启动时有可能因为库存资源不足而导致无法启动。
- 如果云主机实例已欠费或已到期，则无法启动。
- 如果实例系统盘是云硬盘，启动之前请确保系统盘处于正常挂载状态。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:startInstance

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
无


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
POST

```
/v1/regions/cn-north-1/instances/i-eumm****d6:startInstance
{}
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
|**400**|FAILED_PRECONDITION|Invalid charge state|云主机计费状态异常。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**404**|NOT_FOUND|System disk not found|云主机没有挂载系统盘。|
|**404**|NOT_FOUND|Invalid system disk mount state|云主机系统盘挂载状态异常。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
