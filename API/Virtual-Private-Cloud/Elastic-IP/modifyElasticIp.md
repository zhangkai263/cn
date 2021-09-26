# modifyElasticIp


## 描述
修改弹性公网IP，当弹性公网IP加入共享带宽包后，此公网IP限速需要调用共享带宽包的接口（修改共享带宽包内公网IP带宽上限）

## 请求方式
PATCH

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/elasticIps/{elasticIpId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**elasticIpId**|String|True| |ElasticIp ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**bandwidthMbps**|Integer|True| |弹性公网IP的限速（单位：Mbps），取值范围为[1-200]|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Invalid param 'xxx'|
|**404**|Resource not found|

## 请求示例
PATCH
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 修改id为fip-xcgb8fva97的弹性公网ip
  https://vpc.jdcloud-api.com/v1/regions/{regionId}/elasticIps/fip-xcgb8fva97
  body:{
           "bandwidthMbps" :"2"
       }

```

## 返回示例
```
{
    "requestId": "a5097e38-8ed6-40b2-903b-780cd0fea263"
}
```
