# queryHitRatioTable


## 描述
命中率表格数据

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/console:hitRatioTable


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**domain**|String|False| |需要查询的域名, 必须为用户pin下有权限的域名|
|**area**|String|False| | |
|**isp**|String|False| | |
|**sortField**|String|False| |排序字段,oripvPercent即为oripv,oriflowPercent即为oriflow|
|**sortRule**|String|False| |排序规则,默认desc|
|**pageSize**|Integer|False|10| |
|**pageNumber**|Integer|False|1| |
|**abroad**|Boolean|False| |true 代表查询境外数据，默认false查询境内数据|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**total**|Integer| |
|**data**|[HitrationTableItem[]](#hitrationtableitem)| |
### <div id="HitrationTableItem">HitrationTableItem</div>
|名称|类型|描述|
|---|---|---|
|**domain**|String| |
|**domainType**|String| |
|**pv**|Long| |
|**hitPv**|Long| |
|**oriPV**|Long| |
|**hitRatio**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
