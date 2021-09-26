# describeElasticIp


## 描述
ElasticIp资源信息详情

## 请求方式
GET

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/elasticIps/{elasticIpId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**elasticIpId**|String|True| |ElasticIp ID|

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
|**elasticIp**|[ElasticIp](#elasticip)|elasticIp资源信息|
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
GET
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 查询id为fip-xcgb8fva97的弹性公网ip详情
  https://vpc.jdcloud-api.com/v1/regions/{regionId}/elasticIps/fip-xcgb8fva97

```

## 返回示例
```
{
    "requestId": "d44e8d10-780e-4f16-986b-8c242470b89d", 
    "result": {
        "elasticIp": {
            "az": "", 
            "bandwidthMbps": 1, 
            "bandwidthPackageId": "", 
            "charge": {
                "chargeExpiredTime": "", 
                "chargeMode": "postpaid_by_duration", 
                "chargeRetireTime": "", 
                "chargeStartTime": "2021-08-08 23:31:13", 
                "chargeStatus": "normal"
            }, 
            "createdTime": "2021-08-08T15:31:02Z", 
            "elasticIpAddress": "100.77.73.xx", 
            "elasticIpId": "fip-xcgb8fva97", 
            "instanceId": "", 
            "instanceType": "", 
            "ipType": "standard", 
            "networkInterfaceId": "", 
            "privateIpAddress": "", 
            "provider": "bgp", 
            "tags": []
        }
    }
}
```
