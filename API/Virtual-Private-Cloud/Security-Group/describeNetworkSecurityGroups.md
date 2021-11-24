# describeNetworkSecurityGroups


## 描述
查询安全组列表

## 请求方式
GET

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkSecurityGroups/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1, 取值范围：[1,∞)，页码超过总页数时, 显示最后一页|
|**pageSize**|Integer|False|20|分页大小，默认为20，取值范围：[10,100]|
|**filters**|[Filter[]](describeNetworkSecurityGroups#user-content-filter)|False| |networkSecurityGroupIds - 安全组ID列表，支持多个<br>networkSecurityGroupNames - 安全组名称列表，支持多个<br>vpcId	- 安全组所属vpc Id，支持单个<br>|

### <div id="user-content-filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeNetworkSecurityGroups#user-content-result)|返回结果|
|**requestId**|String|请求ID|

### <div id="user-content-result">Result</div>
|名称|类型|描述|
|---|---|---|
|**networkSecurityGroups**|[NetworkSecurityGroup[]](describeNetworkSecurityGroups#user-content-networksecuritygroup)|安全组资源信息列表|
|**totalCount**|Number|总数量|
### <div id="user-content-networksecuritygroup">NetworkSecurityGroup</div>
|名称|类型|描述|
|---|---|---|
|**networkSecurityGroupId**|String|安全组ID|
|**networkSecurityGroupName**|String|安全组名称|
|**description**|String|安全组描述信息|
|**vpcId**|String|安全组所在vpc的Id|
|**securityGroupRules**|[SecurityGroupRule[]](describeNetworkSecurityGroups#user-content-securitygrouprule)|安全组规则信息|
|**createdTime**|String|安全组创建时间|
|**networkSecurityGroupType**|String|安全组类型，default：默认安全组，custom：自定义安全组|
|**networkInterfaceIds**|String[]|安全组绑定的弹性网卡列表|
### <div id="user-content-securitygrouprule">SecurityGroupRule</div>
|名称|类型|描述|
|---|---|---|
|**ruleId**|String|安全组规则ID|
|**direction**|Number|安全组规则方向。0：入规则；1：出规则|
|**protocol**|Number|规则限定协议。300:All；6:TCP；17:UDP；1:ICMP|
|**addressPrefix**|String|匹配地址前缀|
|**ipVersion**|Number|匹配地址协议版本。4：IPv4|
|**fromPort**|Number|规则限定起始传输层端口，默认1，若protocal不是传输层协议，恒为0|
|**toPort**|Number|规则限定终止传输层端口，默认1，若protocal不是传输层协议，恒为0|
|**createdTime**|String|安全组规则创建时间|
|**description**|String|描述，允许输入UTF-8编码下的全部字符，不超过256字符|
|**ruleType**|String|安全组规则类型，default：默认安全组规则，custom：自定义安全组规则|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|invalid parameter|
|**401**|Authentication failed|

## 请求示例
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例：在账号下查询安全组列表，且ID为 sg-yjdd312xqk 的安全组

GET
```

/v1/regions/cn-north-1/networkSecurityGroups?pageNumber=1&pageSize=10&filters.1.name=networkSecurityGroupIds&filters.1.values.1=sg-yjdd312xqk

```

## 返回示例
```
{
    "requestId": "c45n2ng1452j918dhbmsakq8e42p4kb1", 
    "result": {
        "networkSecurityGroups": [
            {
                "createdTime": "2021-08-05T03:48:43Z", 
                "description": "安全组测试", 
                "networkInterfaceIds": [], 
                "networkSecurityGroupId": "sg-yjdd312xqk", 
                "networkSecurityGroupName": "自定义安全组", 
                "securityGroupRules": [], 
                "securityGroupType": "custom", 
                "vpcId": "vpc-1gnm8i9qi3"
            }
        ], 
        "totalCount": 1
    }
}
```
