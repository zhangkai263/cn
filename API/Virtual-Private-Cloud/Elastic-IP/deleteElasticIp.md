# deleteElasticIp


## 描述
删除弹性公网IP，已加入共享带宽包的公网IP不能删除，需要先从共享带宽包移出

## 请求方式
DELETE

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/elasticIps/{elasticIpId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**elasticIpId**|String|True| |ElasticIp ID|

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
|**400**|Invalid param 'xxx'|
|**404**|elasticIp 'xxx' not found|
|**500**|Unknown server error|
|**503**|Service unavailable|

## 请求示例

调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。

- 请求示例: 删除id为fip-xcgb8fva97的弹性公网ip

DELETE
```
  https://vpc.jdcloud-api.com/v1/regions/{regionId}/elasticIps/fip-xcgb8fva97

```

## 返回示例
```
{
    "requestId": "ca095087-322b-4471-8646-7efc661cefe7"
}
```
