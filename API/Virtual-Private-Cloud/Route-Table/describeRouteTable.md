# describeRouteTable


## 描述
查询路由表信息详情

## 请求方式
GET

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/routeTables/{routeTableId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**routeTableId**|String|True| |RouteTable ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#user-content-result)|返回结果|
|**requestId**|String|请求ID|

### <div id="user-content-esult">Result</div>
|名称|类型|描述|
|---|---|---|
|**routeTable**|[RouteTable](#user-content-routetable)|路由表资源信息|
### <div id="user-content-routetable">RouteTable</div>
|名称|类型|描述|
|---|---|---|
|**routeTableId**|String|路由表ID|
|**routeTableName**|String|路由表名称，只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符。|
|**routeTableType**|String|路由表类型，default：默认路由表，custom：自定义路由表|
|**description**|String|路由表描述信息，允许输入UTF-8编码下的全部字符，不超过256字符。|
|**vpcId**|String|私有网络ID|
|**routeTableRules**|[RouteTableRule[]](#user-content-routetablerule)|路由表规则信息|
|**routePropagations**|[RoutePropagation[]](#user-content-routepropagation)|路由传播列表|
|**subnetIds**|String[]|路由表绑定的子网列表|
|**createdTime**|String|路由表创建时间|
### <div id="user-content-routepropagation">RoutePropagation</div>
|名称|类型|描述|
|---|---|---|
|**propagationId**|String|路由传播Id|
|**bgwId**|String|边界网关Id|
|**propagationCidrs**|String|路由传播范围，指定路由传播网段，CIDR格式，多个CIDR之间以英文逗号“,”分隔，0.0.0.0/0表示接受所有传播路由，设置特定网段就只能接收该网段范围内或子网段的路由传播|
### <div id="user-content-routetablerule">RouteTableRule</div>
|名称|类型|描述|
|---|---|---|
|**ruleId**|String|路由表规则ID|
|**priority**|Number|规则匹配优先级，取值范围[1,255]，默认为100。当路由规则子网掩码不同时，路由最长匹配优先；当路由规则子网掩码相同时, 按照优先级匹配转发, 优先级数字越小优先级越高，路由规则子网掩码相同、优先级相同、下一跳不同时，形成等价路由，不同下一跳负载均担。|
|**nextHopType**|String|下一跳类型, 取值范围:local:本地, instance:云主机, internet:公网, vpc_peering:vpc对等连接, bgw:边界网关, natgw:NAT网关|
|**nextHopId**|String|下一跳id|
|**addressPrefix**|String|匹配地址前缀, internet类型路由跟其他类型的路由，addressPrefix不允许重复|
|**origin**|String|路由类型，propagated:传播、static:静态|
|**description**|String|路由描述，允许输入UTF-8编码下的全部字符，不超过256字符。|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|invalid parameter|
|**401**|Authentication failed|

## 请求示例
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 查询id为rtb-olajkrx4xr的路由表详情

GET
```
  /v1/regions/cn-north-1/routeTables/rtb-olajkrx4xr

```

## 返回示例
```
{
    "requestId": "c45pbafcwj6tmo1c3w6rv1i9n78kucup", 
    "result": {
        "routeTables": [
            {
                "cidr": "", 
                "createdAt": "2021-07-30T06:38:08Z", 
                "createdTime": "2021-07-30T06:38:08Z", 
                "desc": "路由表测试", 
                "description": "路由表测试", 
                "id": "rtb-olajkrx4xr", 
                "name": "自建路由表", 
                "routePropagations": null, 
                "routeTableId": "rtb-olajkrx4xr", 
                "routeTableName": "自建路由表", 
                "routeTableRules": [
                    {
                        "addressPrefix": "local", 
                        "description": "", 
                        "ipVersion": 4, 
                        "nextHopId": "local", 
                        "nextHopType": "local", 
                        "origin": "static", 
                        "priority": 1, 
                        "ruleId": "rt-sg73xd72d2"
                    }, 
                    {
                        "addressPrefix": "0.0.0.0/0", 
                        "description": "", 
                        "ipVersion": 4, 
                        "nextHopId": "bgw-socgtm8lu7", 
                        "nextHopType": "bgw", 
                        "origin": "static", 
                        "priority": 100, 
                        "ruleId": "rt-ghf3dw7ieo"
                    }
                ], 
                "routeTableType": "custom", 
                "subnetCount": 0, 
                "subnetIds": null, 
                "type": "custom", 
                "updateAt": "", 
                "vpcId": "vpc-2wzrfdesf", 
                "vpcName": "sdn-test"
            }
        ], 
        "totalCount": 1
    }
}
```
