# associateSecurityGroup


## 描述
负载均衡绑定安全组

## 请求方式
POST

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/loadBalancers/{loadBalancerId}:associateSecurityGroup

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**loadBalancerId**|String|True| |LB ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**securityGroupIds**|String[]|True| |安全组 ID列表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter.|
|**404**|'xxx' not found.|
|**500**|Internal server error|
