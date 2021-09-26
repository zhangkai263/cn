# removeRouteTableRules


## 描述
移除路由表规则

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/routeTables/{routeTableId}:removeRouteTableRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**routeTableId**|String|True| |RouteTable ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ruleIds**|String[]|True| |路由表规则Id列表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Request field x.y.z is missing.|
|**404**|Target 'xxx' not found; TargetGroup 'xxx' not found.|
|**500**|internal server error|

## 请求示例
POST
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 将id为rtb-olajkrx4xr的路由表中目的地址为10.0.0.0/8,下一跳为边界网关的路由删除
  https://vpc.jdcloud-api.com/v1/regions/{regionId}/routeTables/rtb-olajkrx4xr:removeRouteTableRules
  body:{
           "ruleIds":["rt-pjv7eex4tp"]
       }

```

## 返回示例
```
{
    "requestId": "c45pbafcwj6tmo1c3w6rv1i9n78kucup"
}
```
