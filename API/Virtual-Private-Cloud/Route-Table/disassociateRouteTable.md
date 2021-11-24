# disassociateRouteTable


## 描述
给路由表解绑子网接口

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/routeTables/{routeTableId}:disassociateRouteTable

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**routeTableId**|String|True| |RouteTable ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**subnetId**|String|True| |路由表要解绑的子网ID，解绑后子网绑定默认路由表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Request parameter x.y.z is 'xxx', expected one of [yyy,zzz]|
|**404**|Resource not found|

## 请求示例
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 将id为rtb-olajkrx4xr的路由表解绑

POST
```

  /v1/regions/cn-north-1/routeTables/rtb-olajkrx4xr:disassociateRouteTable
       {
           "subnetId":["subnet-5lymzx3989"]
       }

```

## 返回示例
```
{
    "requestId": "c45pbafcwj6tmo1c3w6rv1i9n78kucup"
}
```
