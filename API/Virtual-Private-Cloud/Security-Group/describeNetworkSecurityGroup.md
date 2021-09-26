# describeNetworkSecurityGroup


## 描述
查询安全组信息详情

## 请求方式
GET

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
|**result**|[Result](#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**networkSecurityGroup**|[NetworkSecurityGroup](#networksecuritygroup)|安全组资源信息|
### <div id="NetworkSecurityGroup">NetworkSecurityGroup</div>
|名称|类型|描述|
|---|---|---|
|**networkSecurityGroupId**|String|安全组ID|
|**networkSecurityGroupName**|String|安全组名称|
|**description**|String|安全组描述信息|
|**vpcId**|String|安全组所在vpc的Id|
|**securityGroupRules**|[SecurityGroupRule[]](#securitygrouprule)|安全组规则信息|
|**createdTime**|String|安全组创建时间|
|**networkSecurityGroupType**|String|安全组类型, default：默认安全组，custom：自定义安全组|
|**networkInterfaceIds**|String[]|安全组绑定的弹性网卡列表|
### <div id="SecurityGroupRule">SecurityGroupRule</div>
|名称|类型|描述|
|---|---|---|
|**ruleId**|String|安全组规则ID|
|**direction**|Number|安全组规则方向。0：入规则; 1：出规则|
|**protocol**|Number|规则限定协议。300:All; 6:TCP; 17:UDP; 1:ICMP|
|**addressPrefix**|String|匹配地址前缀|
|**ipVersion**|Number|匹配地址协议版本。4：IPv4|
|**fromPort**|Number|规则限定起始传输层端口, 默认1 ，若protocal不是传输层协议，恒为0|
|**toPort**|Number|规则限定终止传输层端口, 默认1 ，若protocal不是传输层协议，恒为0|
|**createdTime**|String|安全组规则创建时间|
|**description**|String|描述,​ 允许输入UTF-8编码下的全部字符，不超过256字符|
|**ruleType**|String|安全组规则类型, default：默认安全组规则，custom：自定义安全组规则|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|invalid parameter|
|**401**|Authentication failed|

## 请求示例
GET
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 在账号下查询安全组ID为 sg-yjdd312xqk 的安全组
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkSecurityGroups/sg-yjdd312xqk

```

## 返回示例
```
{
    "requestId": "c45pr8u8rjit0pq70na46pk5h6n911cc", 
    "result": {
        "networkSecurityGroup": {
            "createdTime": "2021-08-05T03:48:43Z", 
            "description": "安全组测试", 
            "networkInterfaceIds": [], 
            "networkSecurityGroupId": "sg-yjdd312xqk", 
            "networkSecurityGroupName": "自定义安全组", 
            "securityGroupRules": [], 
            "securityGroupType": "custom", 
            "vpcId": "vpc-1gnm8i9qi3"
        }
    }
}
```
