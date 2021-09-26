# addRouteTableRules


## 描述
添加路由表规则

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/routeTables/{routeTableId}:addRouteTableRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**routeTableId**|String|True| |RouteTable ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**routeTableRuleSpecs**|[AddRouteTableRules[]](#addroutetablerules)|True| |路由表规则信息|

### <div id="AddRouteTableRules">AddRouteTableRules</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**nextHopType**|String|True| |下一跳类型, 取值范围:instance:云主机, internet:公网, vpc_peering:vpc对等连接, bgw:边界网关, natgw:NAT网关|
|**nextHopId**|String|True| |下一跳id|
|**addressPrefix**|String|True| |匹配地址前缀, internet类型路由跟其他类型的路由，addressPrefix不允许重复|
|**priority**|Number|False| |规则匹配优先级，取值范围[1,255]，默认为100。当路由规则子网掩码不同时，路由最长匹配优先；当路由规则子网掩码相同时, 按照优先级匹配转发, 优先级数字越小优先级越高，路由规则子网掩码相同、优先级相同、下一跳不同时，形成等价路由，不同下一跳负载均担。|
|**description**|String|False| |描述,允许输入UTF-8编码下的全部字符，不超过256字符|

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
|**409**|RouteTable rules not in the same vpc|
|**500**|Internal server error|

## 请求示例
POST
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 将id为rtb-olajkrx4xr的路由表添加目的地址为10.0.0.0/8,下一跳为边界网关的路由
  https://vpc.jdcloud-api.com/v1/regions/{regionId}/routeTables/rtb-olajkrx4xr:addRouteTableRules
  body:{
           "routeTableRuleSpecs":[
               {
                   "nextHopType":"bgw",
                   "addressPrefix":"10.0.0.0/8",
                   "nextHopId":"bgw-socgtm8lu7",
                   "description":""
               }
           ]
       }

```

## 返回示例
```
{
    "requestId": "c45pbafcwj6tmo1c3w6rv1i9n78kucup"
}
```
