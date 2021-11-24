# modifyRouteTableRules


## 描述
修改路由表规则

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/routeTables/{routeTableId}:modifyRouteTableRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**routeTableId**|String|True| |RouteTable ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**modifyRouteTableRuleSpecs**|[ModifyRouteTableRules[]](#modifyroutetablerules)|True| |路由表规则信息|

### <div id="ModifyRouteTableRules">ModifyRouteTableRules</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ruleId**|String|True| |路由表规则的ID|
|**priority**|Number|False| |规则匹配优先级，取值范围[1,255]。当路由规则子网掩码不同时，路由最长匹配优先；当路由规则子网掩码相同时, 按照优先级匹配转发, 优先级数字越小优先级越高，路由规则子网掩码相同、优先级相同、下一跳不同时，形成等价路由，不同下一跳负载均担。|
|**nextHopType**|String|False| |下一跳类型, 取值范围:instance:云主机, internet:公网, vpc_peering:vpc对等连接, bgw:边界网关, natgw:NAT网关|
|**nextHopId**|String|False| |下一跳id|
|**addressPrefix**|String|False| |路由表规则前缀, internet类型路由跟其他类型的路由，addressPrefix不允许重复|
|**description**|String|False| |描述,允许输入UTF-8编码下的全部字符，不超过256字符|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|invalid parameter|
|**404**|RouteTable or RouteTableRule not found|
|**500**|Internal server error|

## 请求示例
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 将id为rtb-olajkrx4xr的路由表中目的地址为10.0.0.0/8,下一跳改为internet

POST
```
  /v1/regions/cn-north-1/routeTables/rtb-olajkrx4xr:modifyRouteTableRules
    {
           "modifyRouteTableRulesSpec":{
             "nextHopType":"internet",
             "ruleId":"rt-lcvm7xqeza",
             "addressPrefix":"10.0.0.0/8",
             "nextHopId":"internet",
             "description":""
           }
      }

```

## 返回示例
```
{
    "requestId": "c45pbafcwj6tmo1c3w6rv1i9n78kucup"
}
```
