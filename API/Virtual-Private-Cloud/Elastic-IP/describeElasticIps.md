# describeElasticIps


## 描述
查询弹性公网IP列表

## 请求方式
GET

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/elasticIps/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1, 取值范围：[1,∞), 页码超过总页数时, 显示最后一页|
|**pageSize**|Integer|False|20|分页大小，默认为20，取值范围：[10,100]|
|**filters**|[Filter[]](#filter)|False| |elasticIpIds - elasticip id数组条件，支持多个<br>elasticIpAddress - eip的IP地址，支持单个<br>chargeStatus	- eip的费用支付状态,normal(正常状态) or overdue(预付费已到期) or arrear(欠费状态)，支持单个<br>ipType - eip类型，取值：all(所有类型)、standard(标准弹性IP)、edge(边缘弹性IP)，默认standard，支持单个<br>azs - eip可用区，支持多个<br>bandwidthPackageId - 共享带宽包ID，支持单个<br>|
|**tags**|[TagFilter[]](#tagfilter)|False| |Tag筛选条件|

### <div id="TagFilter">TagFilter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|False| |Tag键|
|**values**|String[]|False| |Tag值|
### <div id="Filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**elasticIps**|[ElasticIp[]](#elasticip)|elasticIp资源信息列表|
|**totalCount**|Integer|总数量|
### <div id="ElasticIp">ElasticIp</div>
|名称|类型|描述|
|---|---|---|
|**elasticIpId**|String|弹性公网IP的Id|
|**elasticIpAddress**|String|弹性公网IP的地址|
|**bandwidthMbps**|Integer|弹性公网IP的限速（单位：Mbps)|
|**provider**|String|弹性公网IP的线路，标准公网IP的线路、取值为bgp或no_bgp；边缘公网IP的线路、可通过describeEdgeIpProviders接口获取|
|**privateIpAddress**|String|私有IP的IPV4地址|
|**networkInterfaceId**|String|配置弹性网卡Id|
|**instanceId**|String|实例Id|
|**instanceType**|String|实例类型,取值为：compute、lb、container、pod|
|**charge**|[Charge](#charge)|计费配置|
|**createdTime**|String|弹性公网IP的创建时间|
|**az**|String|弹性公网IP的可用区属性，如果为空，表示全可用区|
|**tags**|[Tag[]](#tag)|Tag信息|
|**ipType**|String|弹性公网IP的IP类型，取值：standard(标准弹性IP)、edge(边缘弹性IP)|
|**bandwidthPackageId**|String|加入的共享带宽包ID，如果没有加入共享带宽包该值为空|
### <div id="Tag">Tag</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|Tag键|
|**value**|String|Tag值|
### <div id="Charge">Charge</div>
|名称|类型|描述|
|---|---|---|
|**chargeMode**|String|支付模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration|
|**chargeStatus**|String|费用支付状态，取值为：normal、overdue、arrear，normal表示正常，overdue表示已到期，arrear表示欠费|
|**chargeStartTime**|String|计费开始时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**chargeExpiredTime**|String|过期时间，预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ，后付费资源此字段内容为空|
|**chargeRetireTime**|String|预期释放时间，资源的预期释放时间，预付费/后付费资源均有此值，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|invalid parameter|
|**401**|Authentication failed|

## 请求示例

调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。

- 请求示例：公网IP列表

GET
```

/v1/regions/cn-north-1/elasticIps/

```

## 返回示例
```
{
    "requestId": "32471045-74a7-4530-a767-7a3909ec6f32", 
    "result": {
        "elasticIps": [
            {
                "az": "", 
                "bandwidthMbps": 1, 
                "bandwidthPackageId": "", 
                "charge": {
                    "chargeExpiredTime": "", 
                    "chargeMode": "postpaid_by_duration", 
                    "chargeRetireTime": "", 
                    "chargeStartTime": "2021-08-08 23:20:06", 
                    "chargeStatus": "normal"
                }, 
                "createdTime": "2021-08-08T15:19:56Z", 
                "elasticIpAddress": "100.77.20.xx", 
                "elasticIpId": "fip-88rxsstxr5", 
                "instanceId": "", 
                "instanceType": "", 
                "ipType": "standard", 
                "networkInterfaceId": "", 
                "privateIpAddress": "", 
                "provider": "bgp", 
                "tags": []
            }, 
            {
                "az": "", 
                "bandwidthMbps": 1, 
                "bandwidthPackageId": "", 
                "charge": {
                    "chargeExpiredTime": "", 
                    "chargeMode": "postpaid_by_duration", 
                    "chargeRetireTime": "", 
                    "chargeStartTime": "2021-04-19 11:51:56", 
                    "chargeStatus": "normal"
                }, 
                "createdTime": "2021-04-19T03:51:54Z", 
                "elasticIpAddress": "100.77.73.xx", 
                "elasticIpId": "fip-3tcvj6xxpw", 
                "instanceId": "netlb-d2nuo6d0t6", 
                "instanceType": "lb", 
                "ipType": "standard", 
                "networkInterfaceId": "port-v65pebn853", 
                "privateIpAddress": "10.0.0.21", 
                "provider": "bgp", 
                "tags": []
            }, 
            {
                "az": "", 
                "bandwidthMbps": 1, 
                "bandwidthPackageId": "", 
                "charge": {
                    "chargeExpiredTime": "", 
                    "chargeMode": "postpaid_by_duration", 
                    "chargeRetireTime": "", 
                    "chargeStartTime": "2021-04-15 10:59:01", 
                    "chargeStatus": "normal"
                }, 
                "createdTime": "2021-04-15T02:58:58Z", 
                "elasticIpAddress": "100.77.73.xx", 
                "elasticIpId": "fip-pq4ak3a406", 
                "instanceId": "netlb-xgn7zrui6l", 
                "instanceType": "lb", 
                "ipType": "standard", 
                "networkInterfaceId": "port-xponq9d9yg", 
                "privateIpAddress": "10.0.0.15", 
                "provider": "bgp", 
                "tags": []
            }, 
            {
                "az": "", 
                "bandwidthMbps": 1, 
                "bandwidthPackageId": "", 
                "charge": {
                    "chargeExpiredTime": "", 
                    "chargeMode": "postpaid_by_duration", 
                    "chargeRetireTime": "", 
                    "chargeStartTime": "2021-01-11 21:02:07", 
                    "chargeStatus": "normal"
                }, 
                "createdTime": "2021-01-11T13:02:07Z", 
                "elasticIpAddress": "100.77.20.xx", 
                "elasticIpId": "fip-5pdg3bbfbd", 
                "instanceId": "", 
                "instanceType": "", 
                "ipType": "standard", 
                "networkInterfaceId": "port-s9pheupbjf", 
                "privateIpAddress": "10.0.0.222", 
                "provider": "bgp", 
                "tags": []
            }
        ], 
        "totalCount": 4
    }
}
```
