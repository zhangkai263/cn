# copyImages


## 描述

镜像跨地域复制。

详细操作说明请参考帮助文档：[镜像复制](https://docs.jdcloud.com/cn/virtual-machines/copy-image)

## 接口说明
- 调用该接口将私有镜像复制到其它地域下,目标地域仅可选择除当前镜像所在地域外的其他地域，且单次仅可选择一个地域。
- 仅镜像类型为“云硬盘系统盘”且状态为"可用"的私有镜像支持复制操作。
- 由于复制操作会占用目标地域下私有镜像和云硬盘快照的配额，因此请在操作前确保目标地域下相应的配额充足。
- 不支持复制带有加密快照的镜像。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images:copyImages

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**sourceImageIds**|String[]|是|\[&quot;img-m5s0****29&quot;,&quot;img-m5s0****30&quot;]|要复制的私有镜像ID列表，最多支持10个。|
|**destinationRegion**|String|是|cn-east-2|目标地域。|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](copyImages#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**copyImages**|[CopyImage[]](copyImages#copyimage)| |源镜像与目标镜像映射关系。|
### <div id="CopyImage">CopyImage</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**destinationImageId**|String|img-m5s0****29|跨区复制产生的目标镜像ID。|
|**sourceImageId**|String|img-m5s0****29|源镜像ID。|


## 请求示例
POST

```
/v1/regions/cn-north-1/images:copyImages
{
    "sourceImageIds" : ["img-m5s0****29"],
    "destinationRegion" : "cn-east-2"
}
```



## 返回示例
```
{
    "requestId": "24237da676d9e815f78a476ff8269ab0", 
    "result": {
        "copyImages": [
            {
                "destinationImageId": "img-m5s0****30", 
                "sourceImageId": "img-m5s0****29"
            }
        ]
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|INVALID_ARGUMENT|Invalid region 'xx'|地域参数错误。|
|**400**|FAILED_PRECONDITION|Only support cloudDisk image|只支持云盘系统盘类型的镜像。|
|**400**|FAILED_PRECONDITION|Invalid image status 'xx'|镜像状态错误。|
|**400**|FAILED_PRECONDITION|Can't use this image|不能操作非私有镜像。|
|**400**|FAILED_PRECONDITION|Conflict with underlay image task 'xx'|镜像正在处理其它任务，请稍后再试。|
|**400**|FAILED_PRECONDITION|The image 'xx' is busy|镜像正在跨区复制或转换中，请稍后再试。|
|**400**|FAILED_PRECONDITION|Copy encrypted snapshot 'xx' is not support.|不支持带有加密快照的镜像。|
|**429**|QUOTA_EXCEEDED|Image quota limit exceeded|镜像配额不足。|
|**429**|QUOTA_EXCEEDED|Snapshot quota limit exceeded|快照配额不足。|
|**404**|NOT_FOUND|Image 'xx' not found|镜像不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
