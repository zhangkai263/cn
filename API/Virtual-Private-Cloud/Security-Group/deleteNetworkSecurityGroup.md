# deleteNetworkSecurityGroup


## 描述
删除安全组

## 请求方式
DELETE

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkSecurityGroups/{networkSecurityGroupId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**networkSecurityGroupId**|String|True| |NetworkSecurityGroup ID|

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
|**400**|invalid parameter|
|**404**|Resource not found|
|**500**|Internal server error|

## 请求示例
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例：删除安全组ID为 sg-yjdd312xqk 的安全组
DELETE
```
/v1/regions/cn-north-1/networkSecurityGroups/sg-yjdd312xqk

```

## 返回示例
```
{
    "requestId": "c45q2jd5rgdh22d9dovd59bacpabp165"
}
```
