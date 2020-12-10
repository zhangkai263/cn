# queryAreaIspDetail


## 描述
地域运营商带宽数据明细

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/console:areaIspDetail


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**domain**|String|False| |需要查询的域名, 必须为用户pin下有权限的域名|
|**area**|String|False| | |
|**isp**|String|False| | |
|**sortField**|String|False| |排序字段默认avgbandwidth,flowPercent同flow，pvPercent同pv|
|**sortRule**|String|False| |排序规则,默认desc|
|**groupBy**|String|False| | |
|**pageSize**|Integer|False|10|分页大小|
|**pageNumber**|Integer|False|1|页码|
|**scheme**|String|False| |查询协议，可选值:[http,https,all],传空默认返回全部协议汇总后的数据|
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
|**data**|[AreaIspbdwDetailItem[]](#areaispbdwdetailitem)| |
### <div id="AreaIspbdwDetailItem">AreaIspbdwDetailItem</div>
|名称|类型|描述|
|---|---|---|
|**area**|String| |
|**isp**|String| |
|**flowPercent**|String| |
|**pvPercent**|String| |
|**avgbandwidth**|Double| |
|**flow**|Double| |
|**pv**|Long| |
|**topTimeStamp**|Long| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
