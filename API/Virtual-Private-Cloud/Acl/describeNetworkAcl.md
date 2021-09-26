# describeNetworkAcl


## 描述
查询networkAcl资源详情

## 请求方式
GET

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
|**result**|[Result](#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**networkAcl**|[NetworkAcl](#networkacl)|networkAcl资源信息|
### <div id="NetworkAcl">NetworkAcl</div>
|名称|类型|描述|
|---|---|---|
|**networkAclId**|String|networkAcl ID|
|**networkAclName**|String|networkAcl名称|
|**vpcId**|String|私有网络 ID|
|**networkAclRules**|[NetworkAclRule[]](#networkaclrule)|networkAcl规则列表|
|**subnetIds**|String[]|networkAcl绑定的子网列表|
|**description**|String|描述,允许输入UTF-8编码下的全部字符，不超过256字符|
|**createdTime**|String|networkAcl创建时间|
### <div id="NetworkAclRule">NetworkAclRule</div>
|名称|类型|描述|
|---|---|---|
|**ruleId**|String|networkAcl规则ID|
|**protocol**|String|规则限定协议。取值范围：All,TCP,UDP,ICMP|
|**fromPort**|Integer|规则限定起始传输层端口, 取值范围:1-65535, 若protocol为传输层协议，默认值为1，若protocol不是传输层协议，设置无效，恒为0。如果规则只限定一个端口号，fromPort和toPort填写同一个值|
|**toPort**|Integer|规则限定终止传输层端口, 取值范围:1-65535, 若protocol为传输层协议，默认值为65535，若protocol不是传输层协议，设置无效，恒为0。如果规则只限定一个端口号，fromPort和toPort填写同一个值|
|**direction**|String|networkAcl规则方向。ingress：入规则; egress：出规则|
|**addressPrefix**|String|匹配地址前缀|
|**ruleAction**|String|访问控制策略：allow:允许，deny：拒绝|
|**priority**|Integer|规则匹配优先级，取值范围为[1,32768]，优先级数字越小优先级越高|
|**description**|String|描述,允许输入UTF-8编码下的全部字符，不超过256字符|
|**createdTime**|String|networkAclRule创建时间|
|**ruleType**|String|规则类型，default：默认规则，custom：自定义规则|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal error|

## 请求示例
GET
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 查询networkAcl ID为acl-1lt77tthz5的networkAcl资源详情
networkAcls/acl-1lt77tthz5:addNetworkAclRules

```

## 返回示例
```
{
    "requestId": "9ff55148-49a0-4bf3-b0b9-56e2afa57bb4", 
    "result": {
        "networkAcl": {
            "createdTime": "2021-04-19T07:42:06Z", 
            "description": "", 
            "networkAclId": "acl-1lt77tthz5", 
            "networkAclName": "dddd", 
            "networkAclRules": [
                {
                    "addressPrefix": "0.0.0.0/32", 
                    "createdTime": "2021-08-05T06:11:32Z", 
                    "description": "", 
                    "direction": "ingress", 
                    "fromPort": 1, 
                    "ipVersion": 4, 
                    "priority": 10, 
                    "protocol": "TCP", 
                    "ruleAction": "allow", 
                    "ruleId": "aclr-f4cuqo0utk", 
                    "ruleType": "custom", 
                    "toPort": 10
                }, 
                {
                    "addressPrefix": "0.0.0.0/0", 
                    "createdTime": "2021-04-19T07:42:06Z", 
                    "description": "", 
                    "direction": "ingress", 
                    "fromPort": 1, 
                    "ipVersion": 4, 
                    "priority": 60000, 
                    "protocol": "ALL", 
                    "ruleAction": "deny", 
                    "ruleId": "aclr-9id1i3cxl6", 
                    "ruleType": "default", 
                    "toPort": 65535
                }, 
                {
                    "addressPrefix": "0.0.0.0/0", 
                    "createdTime": "2021-04-19T07:42:06Z", 
                    "description": "", 
                    "direction": "egress", 
                    "fromPort": 1, 
                    "ipVersion": 4, 
                    "priority": 60000, 
                    "protocol": "ALL", 
                    "ruleAction": "deny", 
                    "ruleId": "aclr-fyjdmc0x71", 
                    "ruleType": "default", 
                    "toPort": 65535
                }
            ], 
            "subnetIds": null, 
            "vpcId": "vpc-six71yb530"
        }
    }
}
```
