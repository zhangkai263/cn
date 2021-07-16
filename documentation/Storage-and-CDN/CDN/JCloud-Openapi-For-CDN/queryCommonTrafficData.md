# queryCommonTrafficData


## 描述
公共栏查询统计数据

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/console:common


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**domain**|String|False| |需要查询的域名, 必须为用户pin下有权限的域名|
|**area**|String|False| |area|
|**isp**|String|False| |isp|
|**fields**|String|False| |查询的字段|
|**period**|String|False| |查询周期|
|**abroad**|Boolean|False| |true 代表查询境外数据，默认false查询境内数据|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**avgbandwidth**|Double| |
|**bandUnit**|String| |
|**flow**|Double| |
|**flowUnit**|String| |
|**oriflow**|Double| |
|**oriflowUnit**|String| |
|**pv**|Double| |
|**pvUnit**|String| |
|**oripv**|Double| |
|**oripvUnit**|String| |
|**topTimeStamp**|Long| |
|**oriFlowPercent**|String| |
|**oriPvPercent**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
