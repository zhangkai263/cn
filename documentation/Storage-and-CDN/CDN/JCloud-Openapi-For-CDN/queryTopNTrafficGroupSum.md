# queryTopNTrafficGroupSum


## 描述
查询topn统计数据

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/console:topN


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**domain**|String|False| |需要查询的域名, 必须为用户pin下有权限的域名|
|**area**|String|False| |area|
|**isp**|String|False| |isp|
|**groupBy**|String|True| |分组依据|
|**topCount**|Integer|False|10| |
|**topField**|String|False| |排序字段|
|**sortRule**|String|False| |排序规则,默认desc|
|**period**|String|False| |时间粒度，可选值:[oneMin,fiveMin,followTime],followTime只会返回一个汇总后的数据|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**totalData**|Double| |
|**totalDataUnit**|String| |
|**topList**|[TopNRespItem[]](#topnrespitem)| |
### <div id="TopNRespItem">TopNRespItem</div>
|名称|类型|描述|
|---|---|---|
|**topKey**|String| |
|**topValue**|Object| |
|**topDataValue**|Double| |
|**topDataPercent**|String| |
|**details**|[TopNRespItemDetail[]](#topnrespitemdetail)| |
### <div id="TopNRespItemDetail">TopNRespItemDetail</div>
|名称|类型|描述|
|---|---|---|
|**timeStamp**|Long| |
|**data**|Double| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
