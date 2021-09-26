# associateNetworkAcl


## 描述
给子网绑定networkAcl接口

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkAcls/{networkAclId}:associateNetworkAcl

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**networkAclId**|String|True| |networkAclId ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**subnetIds**|String[]|True| |networkAcl要绑定的子网ID列表, subnet已被其他networkAcl绑定时，自动解绑|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Invalid parameter|
|**404**|Not found|
|**500**|Internal error|

## 请求示例
POST
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 将id为acl-axne0jaf0z的acl绑定到id为subnet-axbe0jaf0a的子网
  https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkAcls/acl-axne0jaf0z:associateNetworkAcl
  body:{
          "subnetIds":["subnet-axbe0jaf0a"]
      }

```

## 返回示例
```
{
    "requestId": "c45prpfm8evoi69tqtc9nf6o1p2knsmw"
}
```
