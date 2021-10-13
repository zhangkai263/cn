# removeNetworkAclRules


## 描述
移除networkAcl规则

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkAcls/{networkAclId}:removeNetworkAclRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**networkAclId**|String|True| |networkAclId ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ruleIds**|String[]|True| |networkAcl规则ID列表|


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

调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。

- 请求示例：移除networkAclRule ID为aclr-f4cuqo0utk的rule

POST
```
networkAcls/acl-1lt77tthz5:removeNetworkAclRules
{
    "ruleIds": ["aclr-f4cuqo0utk"]
}

```

## 返回示例
```
{
    "requestId": "84e9bf55-7b90-4482-9455-7a694ba05590"
}
```
