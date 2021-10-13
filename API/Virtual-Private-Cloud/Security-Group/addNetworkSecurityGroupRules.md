# addNetworkSecurityGroupRules


## 描述
添加安全组规则

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkSecurityGroups/{networkSecurityGroupId}:addNetworkSecurityGroupRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**networkSecurityGroupId**|String|True| |NetworkSecurityGroup ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**networkSecurityGroupRuleSpecs**|[AddSecurityGroupRules[]](#addsecuritygrouprules)|True| |安全组规则信息|

### <div id="AddSecurityGroupRules">AddSecurityGroupRules</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**protocol**|Number|True| |规则限定协议。300:All; 6:TCP; 17:UDP; 1:ICMP|
|**direction**|Number|True| |安全组规则方向。0：入规则; 1：出规则|
|**addressPrefix**|String|True| |匹配地址前缀|
|**fromPort**|Number|False| |规则限定起始传输层端口, 取值范围:1-65535, 若protocol为传输层协议，默认值为1，若protocol不是传输层协议，恒为0。如果规则只限定一个端口号，fromPort和toPort填写同一个值|
|**toPort**|Number|False| |规则限定终止传输层端口, 取值范围:1-65535, 若protocol为传输层协议，默认值为65535，若protocol不是传输层协议，恒为0。如果规则只限定一个端口号，fromPort和toPort填写同一个值|
|**description**|String|False| |描述,​ 允许输入UTF-8编码下的全部字符，不超过256字符|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Request parameter x.y.z is 'xxx', expected one of [yyy,zzz]|
|**404**|Resource not found|
|**409**|SecurityGroup rules not in the same vpc|
|**500**|Internal server error|

## 请求示例
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例：在安全组 sg-yjdd312xqk 下添加安全组规则

POST
```
/v1/regions/cn-north-1/networkSecurityGroups/sg-yjdd312xqk:addNetworkSecurityGroupRules
{
    "networkSecurityGroupRuleSpecs":[
        {
            "fromPort":22,
            "toPort":22,
            "protocol":6,
            "addressPrefix":"0.0.0.0/0",
            "ipVersion":4,
            "direction":0,
            "description":""
        }
    ]
}

```

## 返回示例
```
{
    "requestId": "c45psof0obqq042o4ticwwu4t0g0oc09"
}
```
