# deleteVpc


## 描述
删除私有网络

## 请求方式
DELETE

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/vpcs/{vpcId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**vpcId**|String|True| |Vpc ID|

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
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**409**|Parameter conflict|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。

DELETE
```

  /v1/regions/cn-north-1/vpcs/vpc-s5e3eqf9pk

```

## 返回示例
```
{
    "requestId": "45e96de4-6a3b-41e1-9e3d-53f86d846f8f"
}
```
