# updateLoadBalancer


## 描述
更新负载均衡信息

## 请求方式
PATCH

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/loadBalancers/{loadBalancerId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**loadBalancerId**|String|True| |LB ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**loadBalancerName**|String|False| |LoadBalancer的名称,只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符|
|**action**|String|False| |启用或停止LoadBalancer，取值为Start(启用)或Stop(停止)|
|**description**|String|False| |LoadBalancer的描述信息,允许输入UTF-8编码下的全部字符，不超过256字符|
|**deleteProtection**|Boolean|False| |删除保护，取值为True(开启)或False(关闭)，默认为False|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**404**|Not found|
|**500**|Internal server error|
