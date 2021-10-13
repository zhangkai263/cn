# unassignSecondaryIps


## 描述
给网卡删除secondaryIp

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkInterfaces/{networkInterfaceId}:unassignSecondaryIps

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**networkInterfaceId**|String|True| |networkInterface ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**secondaryIps**|String[]|False| |指定删除的secondaryIp地址|
|**secondaryCidrs**|String[]|False| |指定删除的secondaryIp网段|


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
- 请求示例: 给ID为port-xyaoj5k08j的弹性网卡删除secondaryIp


/v1/regions/cn-north-1/networkInterfaces/port-xyaoj5k08j:assignSecondaryIps
{
    "secondaryIps": [
        "10.0.0.5"
    ]
}

```

## 返回示例
```
{
    "requestId": "afcb2f9c-6d50-4112-a8ec-5b066169e7be"
}
```
