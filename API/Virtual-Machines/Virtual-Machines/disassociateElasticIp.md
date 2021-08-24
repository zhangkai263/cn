# disassociateElasticIp


## 描述

为云主机解绑弹性公网IP。

详细操作说明请参考帮助文档：[解绑弹性公网IP](https://docs.jdcloud.com/cn/virtual-machines/disassociate-elastic-ip)

## 接口说明
- 该接口只支持解绑实例的主网卡的主内网IP上的弹性公网IP。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:disassociateElasticIp

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**elasticIpId**|String|是|fip-z1z1****ja|弹性公网IP的ID。|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
POST

```
/v1/regions/cn-north-1/instances/i-eumm****d6:disassociateElasticIp
{
  "elasticIpId" : "fip-z1z1****ja"
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
|**400**|FAILED_PRECONDITION|Elastic ip isn't associated to this instance's primary network interface|弹性公网IP没有绑定在实例的主网卡的主内网IP上。|
|**404**|NOT_FOUND|ElasticIpId xxx not found|弹性公网IP不存在。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
