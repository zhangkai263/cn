# associateRouteTable


## 描述
路由表绑定子网接口

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/routeTables/{routeTableId}:associateRouteTable

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**routeTableId**|String|True| |RouteTable ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**subnetIds**|String[]|True| |路由表要绑定的子网ID列表, subnet已被其他路由表绑定时，自动解绑。路由表绑定的子网属性要相同，或者都是标准子网，或者都是相同边缘可用区的边缘子网。|


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
POST
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 将id为rtb-olajkrx4xr的路由表关联到id为subnet-5lymzx3989的子网


  /v1/regions/cn-north-1/routeTables/rtb-olajkrx4xr:associateRouteTable
       {
           "subnetIds":["subnet-5lymzx3989"]
       }

```

## 返回示例
```
{
    "requestId": "c45pbafcwj6tmo1c3w6rv1i9n78kucup"
}
```
