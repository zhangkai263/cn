# modifyRouteTable


## 描述
修改路由表属性

## 请求方式
PATCH

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/routeTables/{routeTableId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**routeTableId**|String|True| |RouteTable ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**routeTableName**|String|False| |路由表的名字。名称取值范围：1-32个中文、英文大小写的字母、数字和下划线分隔符|
|**description**|String|False| |路由表的描述，取值范围：0-256个UTF-8编码下的全部字符|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Request parameter x.y.z is 'xxx', expected one of [yyy,zzz]|
|**404**|Resource not found|

## 请求示例

调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 将id为rtb-olajkrx4xr的路由表名称改为”自建路由表1“

PATCH
```
  /v1/regions/cn-north-1/routeTables/rtb-olajkrx4xr
  {
    "routeTableName":"自建路由表1"
  }

```

## 返回示例
```
{
    "requestId": "c45pbafcwj6tmo1c3w6rv1i9n78kucup"
}
```
