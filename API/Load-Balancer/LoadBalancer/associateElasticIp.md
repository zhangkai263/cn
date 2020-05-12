# associateElasticIp


## 描述
负载均衡绑定弹性公网IP

## 请求方式
POST

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/loadBalancers/{loadBalancerId}:associateElasticIp

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**loadBalancerId**|String|True| |LB ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**elasticIpId**|String|True| |弹性公网IP ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter.|
|**403**|'xxx' forbidden.|
|**404**|'xxx' not found.|
|**500**|Internal server error|

