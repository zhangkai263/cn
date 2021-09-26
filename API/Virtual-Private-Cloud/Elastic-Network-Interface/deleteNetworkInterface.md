# deleteNetworkInterface


## 描述
删除弹性网卡

## 请求方式
DELETE

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkInterfaces/{networkInterfaceId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**networkInterfaceId**|String|True| |networkInterface ID|

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

## 请求示例
DELETE
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 删除ID为port-xyaoj5k08j的弹性网卡
networkInterfaces/port-xyaoj5k08j

```

## 返回示例
```
{
    "requestId": "209ea551-ab64-4242-8606-5d0c763ceedc"
}
```
