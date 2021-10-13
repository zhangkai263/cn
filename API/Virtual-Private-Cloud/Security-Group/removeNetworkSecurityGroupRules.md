# removeNetworkSecurityGroupRules


## 描述
移除安全组规则

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkSecurityGroups/{networkSecurityGroupId}:removeNetworkSecurityGroupRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**networkSecurityGroupId**|String|True| |NetworkSecurityGroup ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ruleIds**|String[]|True| |安全组规则Id列表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Request field x.y.z is missing.|
|**404**|Target 'xxx' not found; TargetGroup 'xxx' not found.|
|**500**|internal server error|

## 请求示例
POST
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 在安全组 sg-yjdd312xqk 下删除安全组规则


/v1/regions/cn-north-1/networkSecurityGroups/sg-yjdd312xqk:removeNetworkSecurityGroupRules
{
    "ruleIds":[
        "sgr-88sfhkskac"
    ]
}

```

## 返回示例
```
{
    "requestId": "c45pvff687kkj1r7phgnhsbe1nv00i9k"
}
```
