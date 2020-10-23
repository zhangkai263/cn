# deleteLoadBalancer


## 描述
删除负载均衡，负载均衡下的监听器，转发规则组(仅alb支持)，后端服务，服务器组会一起删除

## 请求方式
DELETE

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/loadBalancers/{loadBalancerId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**loadBalancerId**|String|True| |LB ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
