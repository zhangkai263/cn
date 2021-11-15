# describeNetworkAcls


## 描述
查询Acl列表

## 请求方式
GET

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkAcls/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1, 取值范围：[1,∞), 页码超过总页数时, 显示最后一页|
|**pageSize**|Integer|False|20|分页大小，默认为20，取值范围：[10,100]|
|**filters**|[Filter[]](#user-content-filter)|False| | |

### <div id="user-content-filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#user-content-result)|返回结果|
|**requestId**|String|请求ID|

### <div id="user-content-result">Result</div>
|名称|类型|描述|
|---|---|---|
|**networkAcls**|[NetworkAcl[]](#user-content-networkacl)|networkAcl资源信息列表|
|**totalCount**|Number|总数量|
### <div id="user-content-networkacl">NetworkAcl</div>
|名称|类型|描述|
|---|---|---|
|**networkAclId**|String|networkAcl ID|
|**networkAclName**|String|networkAcl名称|
|**vpcId**|String|私有网络 ID|
|**networkAclRules**|[NetworkAclRule[]](#user-content-networkaclrule)|networkAcl规则列表|
|**subnetIds**|String[]|networkAcl绑定的子网列表|
|**description**|String|描述,允许输入UTF-8编码下的全部字符，不超过256字符|
|**createdTime**|String|networkAcl创建时间|
### <div id="user-content-networkaclrule">NetworkAclRule</div>
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
|**429**|Quota exceeded|
|**500**|Internal error|

## 请求示例

调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。

- 请求示例: 查询vpcId为vpc-six71yb530的networkAcl列表


GET
```
/v1/regions/cn-north-1/networkAcls?filters.1.name=vpcIds&filters.1.values.1=vpc-six71yb530

```

## 返回示例
```
{
    "requestId": "fd846351-6862-4c9e-9e1c-f67b1db022af", 
    "result": {
        "NetworkAcls": [
            {
                "createdTime": "2021-04-19T07:42:06Z", 
                "description": "", 
                "networkAclId": "acl-1lt77tthz5", 
                "networkAclName": "dddd", 
                "networkAclRules": [
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
        ], 
        "totalCount": 1
    }
}
```
