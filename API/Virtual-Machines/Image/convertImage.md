# convertImage


## 描述

镜像类型转换。

详细操作说明请参考帮助文档：[镜像类型转换](https://docs.jdcloud.com/cn/virtual-machines/convert-image)

## 接口说明
- 转换操作会创建一个与原镜像数据内容完全一致，仅镜像类型不同的新镜像，原镜像仍会保留，可以继续用来创建本地盘系统盘的实例。
- 由于转换操作会占用镜像配额和云硬盘快照配额，因此请在操作前确保镜像所在地域下私有镜像和云硬盘快照配额充足。
- 转换规则只允许从 `localDisk` 转换为 `cloudDisk`，即从本地系统盘镜像转换为云盘系统盘镜像，无法反向操作；且镜像状态需为“可用”。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images/{imageId}:convertImage

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**imageId**|String|是|i-eumm****d6|镜像ID。|

## 请求参数
无


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**imageId**|String|img-m5s0****29|转换后新镜像的ID。|


## 请求示例
POST

```
/v1/regions/cn-north-1/images/img-m5s0****29:convertImage
```



## 返回示例
```
{
    "requestId": "24237da676d9e815f78a476ff8269ab0", 
    "result": {
        "imageId": "img-m5s0****29"
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|FAILED_PRECONDITION|Can't use this image|不能操作非私有镜像。|
|**400**|FAILED_PRECONDITION|Conflict with underlay image task 'xx'|镜像正在处理其它任务，请稍后再试。|
|**400**|FAILED_PRECONDITION|Only support localDisk image|只支持本地系统盘类型的镜像。|
|**400**|FAILED_PRECONDITION|Invalid image status 'xx'|镜像状态错误。|
|**400**|FAILED_PRECONDITION|The image 'xx' is busy|镜像正在跨区复制或转换中，请稍后再试。|
|**429**|QUOTA_EXCEEDED|Image quota limit exceeded|镜像配额不足。|
|**429**|QUOTA_EXCEEDED|Snapshot quota limit exceeded|快照配额不足。|
|**404**|NOT_FOUND|Image 'xx' not found|镜像不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
