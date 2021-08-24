# modifyImageAttribute


## 描述

修改镜像属性。

详细操作说明请参考帮助文档：[镜像概述](https://docs.jdcloud.com/cn/virtual-machines/image-overview)

## 接口说明
- 只支持修改镜像名称或描述。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images/{imageId}:modifyImageAttribute

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**imageId**|String|是|i-eumm****d6|镜像ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**name**|String|否| |镜像名称。参考 [公共参数规范](https://docs.jdcloud.com/virtual-machines/api/general_parameters)。|
|**description**|String|否| |镜像描述。参考 [公共参数规范](https://docs.jdcloud.com/virtual-machines/api/general_parameters)。|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
POST

```
/v1/regions/cn-north-1/images/img-m5s0****29:modifyImageAttribute
{
    "name" : "test",
    "description" : "test"
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
|**400**|INVALID_ARGUMENT|Parameter name、description missing|未指定任何可修改的属性。|
|**400**|FAILED_PRECONDITION|Can't use this image|不可以修改非私有镜像。|
|**400**|FAILED_PRECONDITION|Conflict with underlay image task 'xx'|镜像正在处理其它任务，请稍后再试。|
|**404**|NOT_FOUND|Image 'xx' not found|镜像不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
