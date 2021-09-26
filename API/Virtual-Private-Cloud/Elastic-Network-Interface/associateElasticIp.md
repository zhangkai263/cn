# associateElasticIp


## 描述
给网卡绑定弹性Ip接口

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkInterfaces/{networkInterfaceId}:associateElasticIp

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**networkInterfaceId**|String|True| |networkInterface ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**elasticIpId**|String|False| |绑定的弹性Ip Id|
|**privateIpAddress**|String|False| |绑定弹性Ip到指定的privateIp|
|**elasticIpAddress**|String|False| |绑定的弹性Ip地址|


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
- 请求示例: 给ID为port-xyaoj5k08j的弹性网卡绑定弹性Ip
networkInterfaces/port-xyaoj5k08j:associateElasticIp
{
    "elasticIpId": "fip-agqacodoa3",
    "privateIpAddress": "10.0.0.4",
    "elasticIpAddress": "114.67.200.50"
}

```

## 返回示例
```
{
    "requestId": "23a5a8f2-7b94-40b8-85c0-8656140c3af4"
}
```
