# importImage


## 描述

导入私有镜像。

详细操作说明请参考帮助文档：[导入私有镜像](https://docs.jdcloud.com/cn/virtual-machines/import-private-image)

## 接口说明
- 当前仅支持导入系统盘镜像。
- 导入后的镜像将以 `云硬盘系统盘镜像` 格式作为私有镜像使用，同时会自动生成一个与导入镜像关联的快照。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images:import

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**architecture**|String|是|x86_64|镜像架构。取值范围：`x86_64、i386`。|
|**osType**|String|是|linux|镜像的操作系统类型。取值范围：`windows、linux`。|
|**platform**|String|是|CentOS|镜像的操作系统平台名称。<br>取值范围：`Ubuntu、CentOS、Windows Server、Other Linux、Other Windows`。<br>|
|**diskFormat**|String|是|qcow2|磁盘格式，取值范围：`qcow2、vhd、vmdk、raw`。|
|**systemDiskSizeGB**|Integer|是|40|以此镜像需要制作的系统盘的默认大小，单位GB。最小值40，最大值500，要求值是10的整数倍。|
|**imageUrl**|String|是|https://test.s3-internal.cn-north-1.jdcloud-oss.com/linux/system_img.raw|要导入镜像的对象存储外链地址。|
|**osVersion**|String|否|8.2|镜像的操作系统版本。|
|**imageName**|String|是|image-test |导入镜像的自定义名称。参考 [公共参数规范](https://docs.jdcloud.com/virtual-machines/api/general_parameters)。|
|**description**|String|否| |导入镜像的描述信息。参考 [公共参数规范](https://docs.jdcloud.com/virtual-machines/api/general_parameters)。|
|**forceImport**|Boolean|否|false |是否强制导入。强制导入会忽略镜像的合规性检测。默认为false。|
|**clientToken**|String|否|jd71-13hb-12dk-p123|用户导出镜像的幂等性保证。每次导出请传入不同的值，如果传值与某次的clientToken相同，则返还同一个请求结果，不能超过64个字符。|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](importImage#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**imageId**|String| |镜像id。|
|**importTaskId**|Integer| |导入任务id。|


## 请求示例
POST

```
/v1/regions/cn-north-1/images:import
{
    "architecture":"x86_64",
    "osType":"linux",
    "platform":"CentOS",
    "diskFormat":"raw",
    "systemDiskSizeGB":50,
    "imageUrl":"https://test.s3-internal.cn-north-1.jdcloud-oss.com/linux/system_img.raw",
    "osVersion":"7.3",
    "imageName":"testImport",
    "description":"testImport",
    "forceImport":false
}
```



## 返回示例
```
{
    "imageId": "img-m5s0****29", 
    "importTaskId": 541
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|CONFLICT|OssRegion 'xx' not match current region 'xx'|对象存储外链地址不正确。|
|**400**|OUT_OF_RANGE|SystemDiskSizeGB must be multiple of 10|系统盘大小步长错误，需要10的倍数。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
