# modifyInstanceDiskAttribute


## 描述

修改一台云主机中的云硬盘属性。

详细操作说明请参考帮助文档：[配置云硬盘删除属性](https://docs.jdcloud.com/cn/virtual-machines/configurate-delete-attributes)

## 接口说明
- 该接口当前只能修改实例中的云硬盘随实例删除属性。
- 仅按配置计费、并且非共享型的云硬盘支持修改。
- 包年包月计费的云硬盘该属性不生效，实例删除时云硬盘将保留。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:modifyInstanceDiskAttribute

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**dataDisks**|[InstanceDiskAttribute[]](modifyInstanceDiskAttribute#user-content-instancediskattribute)|否| |云硬盘列表。|

### <div id="user-content-instancediskattribute">InstanceDiskAttribute</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**diskId**|String|否|vol-u8r2****c1|云硬盘ID。|
|**autoDelete**|Boolean|否| |是否随实例一起删除，即删除实例时是否自动删除此磁盘。此参数仅对按配置计费的非多点挂载云硬盘生效。<br>`true`：随实例删除。<br>`false`（默认值）：不随实例删除。|

## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
POST

```
/v1/regions/cn-north-1/instances/i-eumm****d6:modifyInstanceDiskAttribute
{
  "dataDisks":[
    {
      "diskId" : "vol-u8r2****c1", "autoDelete" : true
    },
    {
      "diskId" : "vol-7u8a****23", "autoDelete" : false
    }
  ]
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
|**400**|FAILED_PRECONDITION|disk 'xx' not mounted on instance|云硬盘没有挂载在当前实例中。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
