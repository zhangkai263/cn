# exportImage


## 描述

导出私有镜像。

将您在京东云环境下制作的私有镜像，导出至同地域下的京东云对象存储空间中。

详细操作说明请参考帮助文档：[导出私有镜像](https://docs.jdcloud.com/cn/virtual-machines/export-private-image)

## 接口说明
- 由于导出镜像需要对您的对象存储空间进行操作，因此需要您创建服务角色并授予系统相应的访问权限，请参照[导出私有镜像](https://docs.jdcloud.com/cn/virtual-machines/export-private-image)中创建服务角色的说明进行创建。
- 镜像必须为“可用”状态，其他状态镜像无法导出。
- 仅支持系统盘镜像导出，即使镜像有关联的数据盘快照，也仅会导出系统盘镜像文件。
- 镜像必须为您的私有镜像，官方镜像、云市场镜像或其他人共享给您的镜像，即使有使用权限也无法直接导出原镜像。
- `Windows Server` 操作系统的镜像不支持导出（若镜像来源为导入镜像，则无此限制）。
- 镜像必须为 `云硬盘系统盘` 镜像，如您的镜像是 `本地盘系统盘` 镜像，可以通过镜像类型转换功能转换为云盘系统盘镜像后再导出。
- 导出的镜像文件格式为QCOW2。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images/{imageId}:exportImage

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**imageId**|String|是|i-eumm****d6|镜像ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**roleName**|String|是|exportRole |用户创建的服务角色名称。|
|**ossUrl**|String|是|https://test.s3-internal.cn-north-1.jdcloud-oss.com|存储导出镜像文件的 `oss bucket` 的域名，请填写以 https:// 开头的完整url。|
|**ossPrefix**|String|否|testExport|导出镜像文件名前缀，仅支持英文字母和数字，不能超过32个字符。|
|**clientToken**|String|否|jd71-13hb-12dk-p123|用户导出镜像的幂等性保证。每次导出请传入不同的值，如果传值与某次的clientToken相同，则返还同一个请求结果，不能超过64个字符。|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](exportImage#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**taskId**|String| |导出任务id。|


## 请求示例
POST

```
/v1/regions/cn-north-1/images/img-m5s0****29:exportImage
{
    "roleName"  : "image-export-test",
    "ossUrl"    : "https://lijietest.s3-internal.cn-north-1.jdcloud-oss.com",
    "ossPrefix" : "testExport"
}
```



## 返回示例
```
{
    "requestId": "24237da676d9e815f78a476ff8269ab0", 
    "result": {
        "exportTaskId": "8023"
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|CONFLICT|OssRegion 'xx' not match current region 'xx'|对象存储外链地址不正确。|
|**400**|FAILED_PRECONDITION|Can't use this image|不可以导出非私有镜像。|
|**400**|FAILED_PRECONDITION|Invalid image status 'xx'|镜像状态错误。|
|**400**|FAILED_PRECONDITION|Invalid image type 'xx'|只支持云盘系统盘的镜像。|
|**400**|FAILED_PRECONDITION|Windows image can't export|不能导出windows镜像。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
