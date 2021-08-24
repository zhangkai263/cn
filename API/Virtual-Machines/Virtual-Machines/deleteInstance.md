# deleteInstance


## 描述

删除一台云主机实例。

详细操作说明请参考帮助文档：[删除实例](https://docs.jdcloud.com/cn/virtual-machines/delete-instance)

## 接口说明
- 不可以删除包年包月未到期的云主机。如果云主机为包年包月已到期的，并且用户处于白名单中，也不允许删除。
- 不可以删除没有计费信息的云主机，该情况只限于创建过程中出现了异常。
- 云主机状态必须为运行 `running`、停止 `stopped`、错误 `error`、状态，同时云主机没有正在进行中的任务才可以删除。
- 如果云主机中挂载的数据盘为按配置计费的云硬盘且 `AutoDelete` 属性为 `true`，那么数据盘会随云主机一起删除。
- 云主机中绑定的弹性公网IP不会随云主机一起删除，如果不需要保留，需要单独进行删除，需要使用者注意。
- 如出现不能删除的情况请 [提交工单](https://ticket.jdcloud.com/applyorder/submit) 或联系京东云客服。
<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>

## 请求方式
DELETE

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}

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
DELETE

```
/v1/regions/cn-north-1/instances/i-eumm****d6
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
|**400**|FAILED_PRECONDITION|Invalid instance status 'xx'|错误的云主机状态。|
|**400**|FAILED_PRECONDITION|Conflict with underlay image task 'xx'|云主机正在制作镜像，请稍后再试。|
|**400**|FAILED_PRECONDITION|Can't delete 'prepaid_by_duration' instance which isn't overdue|不能删除包年包月未到期的云主机。|
|**403**|PERMISSION_DENIED|Can't delete no charged resource|不能删除没有计费信息的云主机实例。|
|**403**|PERMISSION_DENIED|Can't delete 'prepaid_by_duration' instance in white list|不能删除白名单用户的包年包月。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
