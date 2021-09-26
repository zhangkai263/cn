# deleteNetworkAcl


## 描述
删除networkAcl接口

## 请求方式
DELETE

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkAcls/{networkAclId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**networkAclId**|String|True| |networkAclId ID|

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
|**500**|Internal error|

## 请求示例
DELETE
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 删除id为acl-axne0jaf0z的acl
  https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkAcls/acl-axne0jaf0z

```

## 返回示例
```
{
    "requestId": "c45prpfm8evoi69tqtc9nf6o1p2knsmw"
}
```
