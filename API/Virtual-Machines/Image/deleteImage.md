# deleteImage


## 描述

删除一个私有镜像。

详细操作说明请参考帮助文档：[删除私有镜像](https://docs.jdcloud.com/cn/virtual-machines/delete-private-image)

## 接口说明
- 已共享的私有镜像在取消共享关系前不可以删除，如私有镜像已共享给其他用户，请取消共享后再进行删除。
- 本地系统盘镜像在有基于其创建的云主机时，将无法删除。
- 只能操作私有镜像。
- 私有镜像没有正在处理中的任务时才可以删除。


## 请求方式
DELETE

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images/{imageId}

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**imageId**|String|是|i-eumm****d6|镜像ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**deleteSnapshot**|Boolean|否| |删除镜像时是否删除关联的快照。默认为 `false`；如果指定为 `true`, 将会删除镜像关联的快照。<br>|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
DELETE

```
/v1/regions/cn-north-1/images/img-m5s0****29
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
|**400**|FAILED_PRECONDITION|Can't delete protected image|不允许删除受保护的镜像。|
|**400**|FAILED_PRECONDITION|Can't delete this image|不允许删除非本用户下的私有镜像。|
|**400**|FAILED_PRECONDITION|Can't delete community image|不允许删除社区镜像。|
|**400**|FAILED_PRECONDITION|Can't delete shared image|不允许删除共享出去的镜像。|
|**400**|FAILED_PRECONDITION|Conflict with underlay image task 'xx'|镜像正在处理其它任务，请稍后再试。|
|**400**|FAILED_PRECONDITION|The image 'xx' is busy|镜像正在跨区复制或转换中，不允许删除。|
|**400**|FAILED_PRECONDITION|Local-System-Disk image cannot be deleted if it has been used to create instances|本地系统盘镜像还有云主机占用中，不允许删除。|
|**404**|NOT_FOUND|Image 'xx' not found|镜像不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
