# describeDedicatedHostType


## 描述
查询专有宿主机规格。

## 接口说明
- 调用该接口可查询全量专有宿主机规格信息。
- 使用 `filters` 过滤器进行条件筛选，每个 `filter` 之间的关系为逻辑与（AND）的关系。

## 请求方式
GET

## 请求地址
https://dh.jdcloud-api.com/v1/regions/{regionId}/dedicatedHostType

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1 |地域ID|

## 请求参数
|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**filters**|[Filter[]](#filter)|否| |filters 中支持使用以下关键字进行过滤 <br> `dedicatedHostType`: 专有宿主机机型，精确匹配，支持多个<br> `az`:可用区，精确匹配，支持多个<br>|

### <div id="Filter">Filter</div>
|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**name**|String|是|az |过滤条件的名称|
|**operator**|String|否|eq |过滤条件的操作符，默认eq|
|**values**|String[]|是 |cn-north-1a |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dedicatedHostTypes**|[HostType[]](#hosttype)| |
|**totalCount**|Number| |
### <div id="HostType">HostType</div>
|名称|类型|描述|
|---|---|---|
|**dedicatedHostType**|String|专有宿主机机型|
|**state**|[HostTypeState[]](#hosttypestate)|专有宿主机机型售卖状态|
|**totalVCPUs**|Integer|CPU总数|
|**totalMemoryMB**|Integer|内存总大小，单位MB|
|**totalDiskGB**|Integer|本地磁盘总大小，单位GB|
|**totalGPUs**|Integer|GPU总个数|
|**supportedInstanceType**|String[]|专有宿主机支持的云主机实例规格|
### <div id="HostTypeState">HostTypeState</div>
|名称|类型|描述|
|---|---|---|
|**az**|String|可用区|
|**inStock**|Boolean|售卖信息，true:可用、false:已售罄不可用|
|**online**|Boolean|在线状态，true:可用、false:已下线|

## 请求示例
GET

```
/v1/regions/cn-north-1/dedicatedHostType
```

## 返回示例
```
{
    "requestId": "4f13e85a23346918f62383da456c9569",
    "result": {
        "totalCount": 2,
        "dedicatedHostTypes": [
            {
                "dedicatedHostType": "g2.c76",
                "state": [
                    {
                        "az": "cn-north-1c",
                        "inStock": false,
                        "online": true
                    },
                    {
                        "az": "cn-north-1a",
                        "inStock": false,
                        "online": true
                    },
                    {
                        "az": "cn-north-1b",
                        "inStock": false,
                        "online": true
                    }
                ],
                "totalVCPUs": 76,
                "totalMemoryMB": 311296,
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
                ]
            },
            {
                "dedicatedHostType": "m2.c76",
                "state": [
                    {
                        "az": "cn-north-1a",
                        "inStock": false,
                        "online": true
                    },
                    {
                        "az": "cn-north-1b",
                        "inStock": false,
                        "online": true
                    },
                    {
                        "az": "cn-north-1c",
                        "inStock": false,
                        "online": true
                    }
                ],
                "totalVCPUs": 76,
                "totalMemoryMB": 716800,
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
                    "m.n2.8xlarge",
                    "m.n2.16xlarge",
                    "m.n2.18xlarge"
                ]
            }
        ]
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
