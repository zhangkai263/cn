# describeDedicatedHosts


## 描述
查询一台或多台专有宿主机的详细信息。


## 请求方式
GET

## 请求地址
https://dh.jdcloud-api.com/v1/regions/{regionId}/dedicatedHosts

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1 |地域ID|

## 请求参数
|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|否 |1|页码；默认为1|
|**pageSize**|Integer|否|  |分页大小；默认为20；取值范围[10, 100]|
|**filters**|[Filter[]](#filter)|否| |filters 中支持使用以下关键字进行过滤<br> `dedicatedHostId` : 专有宿主机ID，精确匹配，支持多个<br> `az`: 可用区，精确匹配，支持多个<br>`status`: 专有宿主机状态，精确匹配，支持多个，<a href="http://docs.jdcloud.com/dedicated-hosts/api/dh_status">参考专有宿主机状态</a><br> `name`: 专有宿主机名称，模糊匹配，支持单个<br> `dedicatedPoolId`: 专有宿主机池ID，精确匹配，支持多个<br> `dedicatedHostType`: 专有宿主机机型，精确匹配，支持多个<br>|

### <div id="Filter">Filter</div>
|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**name**|String|是 |name |过滤条件的名称|
|**operator**|String|否|eq |过滤条件的操作符，默认eq|
|**values**|String[]|是 |name-test |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dedicatedHosts**|[DedicatedHost[]](#dedicatedhost)| |
|**totalCount**|Number| |
### <div id="DedicatedHost">DedicatedHost</div>
|名称|类型|描述|
|---|---|---|
|**dedicatedHostId**|String|专有宿主机ID|
|**name**|String|专有宿主机名称|
|**az**|String|专有宿主机所在可用区|
|**dedicatedHostType**|String|专有宿主机机型|
|**description**|String|专有宿主机描述|
|**status**|String|专有宿主机状态，<a href="http://docs.jdcloud.com/dedicated-hosts/api/dh_status">参考专有宿主机状态</a>|
|**dedicatedPoolId**|String|专有宿主机所在的专有宿主机池ID|
|**logicRack**|Integer|专有宿主机所在的逻辑机架|
|**supportedInstanceType**|String[]|专有宿主机支持的云主机规格|
|**capacity**|[ResourceCapacity](#resourcecapacity)|专有宿主机资源使用信息|
|**instanceIds**|String[]|专有宿主机上的云主机ID|
|**charge**|[Charge](#charge)|计费信息|
|**createTime**|String|创建时间|
### <div id="Charge">Charge</div>
|名称|类型|描述|
|---|---|---|
|**chargeMode**|String|支付模式，返回值为：<br> `prepaid_by_duration`: 预付费 <br> `postpaid_by_usage`:按用量后付费<br> `postpaid_by_duration`: 按配置后付费|
|**chargeStatus**|String|费用支付状态，返回值为：<br>`normal`: 正常 <br> `overdue`:已到期 <br> `arrear`:欠费|
|**chargeStartTime**|String|计费开始时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**chargeExpiredTime**|String|过期时间，预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ，后付费资源此字段内容为空|
|**chargeRetireTime**|String|预期释放时间，资源的预期释放时间，预付费/后付费资源均有此值，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
### <div id="ResourceCapacity">ResourceCapacity</div>
|名称|类型|描述|
|---|---|---|
|**totalVCPUs**|Integer|专有宿主机总VCPU数|
|**totalMemoryMB**|Integer|专有宿主机总内存大小，单位MB|
|**totalDiskGB**|Integer|专有宿主机总本地磁盘大小，单位GB|
|**totalGPUs**|Integer|专有宿主机总GPU个数|
|**usedVCPUs**|Integer|专有宿主机已分配的VCPU数|
|**usedMemoryMB**|Integer|专有宿主机已分配的内存大小，单位MB|
|**usedDiskGB**|Integer|专有宿主机已分配的本地磁盘大小，单位GB|
|**usedGPUs**|Integer|专有宿主机已分配的GPU个数|
|**localDiskType**|String|专有宿主机本地盘类型|
|**instanceCount**|Integer|专有宿主机上的云主机个数|

### 请求示例
GET

```
/v1/regions/cn-north-1/dedicatedHosts
```

### 返回示例
```
{
    "requestId": "9d832c955a6ed94884bba7bec1505d3c",
    "result": {
        "dedicatedHosts": [
            {
                "dedicatedHostId": "host-nrj0****o0",
                "name": "name-test",
                "az": "cn-north-1c",
                "dedicatedHostType": "g2.c76",
                "status": "available",
                "dedicatedPoolId": "pool-urn7rqof1q",
                "logicRack": "1",
                "supportedInstanceType": [
                    "g.n2.medium",
                    "g.n2.large",
                    "g.n2.xlarge",
                    "g.n2.2xlarge",
                    "g.n2.4xlarge",
                    "g.n2.8xlarge",
                    "g.n2.16xlarge",
                    "g.n2.18xlarge",
                    "c.c2.large",
                    "c.c2.xlarge",
                    "c.c2.2xlarge",
                    "c.c2.3xlarge",
                    "c.c2.4xlarge",
                    "c.n2.large",
                    "c.n2.xlarge",
                    "c.n2.2xlarge",
                    "c.n2.4xlarge",
                    "c.n2.8xlarge",
                    "c.n2.16xlarge",
                    "c.n2.18xlarge",
                    "m.n2.large",
                    "m.n2.xlarge",
                    "m.n2.2xlarge",
                    "m.n2.4xlarge",
                    "m.n2.8xlarge"
                ],
                "capacity": {
                    "totalVCPUs": 76,
                    "totalMemoryMB": 311296,
                    "totalDiskGB": 1743,
                    "totalGPUs": 0,
                    "usedVCPUs": 2,
                    "usedMemoryMB": 8192,
                    "usedDiskGB": 0,
                    "usedGPUs": 0,
                    "localDiskType": "",
                    "instanceCount": 2
                },
                "instanceIds": [
                    "i-wluy****9d",
                    "i-ioyy****nx"
                ],
                "charge": {
                    "chargeMode": "postpaid_by_duration",
                    "chargeStatus": "normal",
                    "chargeStartTime": "2021-09-07T09:22:27Z"
                },
                "createTime": "2021-09-07 17:22:27"
            }
        ],
        "totalCount": 1
    }
}
```

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
