# modifyInstanceNetworkAttribute


## 描述

修改云主机弹性网卡属性。

详细操作说明请参考帮助文档：[配置弹性网卡删除属性](https://docs.jdcloud.com/cn/virtual-machines/configurate-eni-delete-attributes)

## 接口说明
- 当前只支持修改随云主机实例删除的属性。
- 不支持修改主网卡。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:modifyInstanceNetworkAttribute

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**networks**|[InstanceNetworkAttribute[]](#instancenetworkattribute)|是| |弹性网卡列表。|

### <div id="InstanceNetworkAttribute">InstanceNetworkAttribute</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**networkInterfaceId**|String|是|port-n2h7****se|弹性网卡ID。|
|**autoDelete**|Boolean|否| |是否随实例一起删除。<br>`true`：随实例删除。<br>`false`（默认值）：不随实例删除。|

## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
POST

```
/v1/regions/cn-north-1/instances/i-eumm****d6:modifyInstanceNetworkAttribute
{
  "networks":[
    {"networkInterfaceId" : "port-n2h7****se", "autoDelete" : true},
    {"networkInterfaceId" : "port-4s8k****2x", "autoDelete" : true},
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
|**400**|FAILED_PRECONDITION|NetworkInterface 'xx' not mounted on instance|弹性网卡没有绑定该云主机实例。|
|**400**|FAILED_PRECONDITION|Can't modify primaryNetworkInterface|不能修改主网卡。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
