# assignSecondaryIps


## 描述
给网卡分配secondaryIp

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkInterfaces/{networkInterfaceId}:assignSecondaryIps

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**networkInterfaceId**|String|True| |networkInterface ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**force**|Boolean|False| |secondary ip被其他接口占用时，是否抢占。false：非抢占重分配，true：抢占重分配；按网段分配时，默认非抢占重分配，指定IP或者个数时，默认抢占重分配。|
|**secondaryIps**|String[]|False| |指定分配的secondaryIp地址|
|**secondaryIpCount**|Number|False| |指定自动分配的secondaryIp个数|
|**secondaryIpMaskLen**|Integer|False| |指定分配的网段掩码长度, 支持24-28位掩码长度，不能与secondaryIpCount或secondaryIps同时指定，不支持抢占重分配|
|**secondaryIpAddress**|String|False| |指定分配的网段中第一个secondaryIp地址，不能与secondaryIpCount或secondaryIps同时指定，secondaryIpAddress与secondaryIpMaskLen需要保持一致，否则无法创建|


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
- 请求示例: 给ID为port-xyaoj5k08j的弹性网卡分配secondaryIp
networkInterfaces/port-xyaoj5k08j:assignSecondaryIps
{
    "force": false,
    "secondaryIps": ["10.0.0.5"]
}

```

## 返回示例
```
{
    "requestId": "a07c68b7-1222-47f9-9d09-b0b3aab33d92"
}
```
