# unShareImage


## 描述

取消共享私有镜像。

详细操作说明请参考帮助文档：[取消共享私有镜像](https://docs.jdcloud.com/cn/virtual-machines/cancel-share-image)

## 接口说明
- 只允许操作用户的私有镜像。
- 原被共享用户将无法再使用该镜像创建云主机实例，同时使用该镜像创建的云主机实例也无法重置为原始系统状态。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images/{imageId}:unshare

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**imageId**|String|是|i-eumm****d6|镜像ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**pins**|String[]|是| |需要取消的京东云帐户列表。|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
POST

```
/v1/regions/cn-north-1/images/img-m5s0****29:unshare
{
  "pins" : ["pin1","pin2"]
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
|**400**|FAILED_PRECONDITION|Can't use this image|不可以共享非私有镜像。|
|**400**|FAILED_PRECONDITION|Conflict with underlay image task 'xx'|镜像正在处理其它任务，请稍后再试。|
|**400**|FAILED_PRECONDITION|Invalid pin 'xx'|用户pin不正确。|
|**400**|FAILED_PRECONDITION|Pin 'xx' not found|用户pin不存在。|
|**404**|NOT_FOUND|Image 'xx' not found|镜像不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
