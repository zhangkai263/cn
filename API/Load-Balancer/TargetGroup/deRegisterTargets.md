# deRegisterTargets


## 描述
从TargetGroup中移除一个或多个Target，失败则全部回滚。 成功移除的target将不会再接收来自loadbalancer新建连接的流量

## 请求方式
POST

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/targetGroups/{targetGroupId}:deregisterTargets

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**targetGroupId**|String|True| |TargetGroup Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**targetIds**|String[]|True| |Target Id列表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Request field x.y.z is missing.|
|**404**|Target 'xxx' not found; TargetGroup 'xxx' not found.|
|**500**|internal server error|
