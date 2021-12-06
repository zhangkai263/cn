# disassociateElasticIp


## 描述
给网卡解绑弹性IP接口

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkInterfaces/{networkInterfaceId}:disassociateElasticIp

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**networkInterfaceId**|String|True| |networkInterface ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**elasticIpId**|String|False| |指定解绑的弹性Ip Id|
|**elasticIpAddress**|String|False| |指定解绑的弹性Ip地址|


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
- 请求示例: 给ID为port-xyaoj5k08j的弹性网卡解绑弹性IP



POST
```
 /v1/regions/cn-north-1/networkInterfaces/port-xyaoj5k08j:associateElasticIp
  {
      "elasticIpId": "fip-agqacodoa3",
      "elasticIpAddress": "114.67.200.50"
  }

```

## 返回示例
```
{
    "requestId": "ce502104-21d2-405e-9dba-b08875c393ab"
}
```
