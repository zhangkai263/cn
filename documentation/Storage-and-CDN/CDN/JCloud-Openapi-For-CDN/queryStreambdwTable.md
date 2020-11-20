# queryStreambdwTable


## 描述
流带宽表格

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/console:streambdwTable


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**domain**|String|False| |需要查询的域名, 必须为用户pin下有权限的域名|
|**appName**|String|False| |app名|
|**streamName**|String|False| |流名|
|**pageNumber**|Integer|False| | |
|**pageSize**|Integer|False| | |
|**sortField**|String|False| |排序字段|
|**sortRule**|String|False|desc|排序规则|
|**area**|String|False| | |
|**isp**|String|False| | |
|**scheme**|String|False| |查询协议，可选值:[http,https,all],传空默认返回全部协议汇总后的数据|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**total**|Integer| |
|**data**|[StreamTableItem[]](#streamtableitem)| |
### <div id="StreamTableItem">StreamTableItem</div>
|名称|类型|描述|
|---|---|---|
|**topTimeStamp**|Long| |
|**avgbandwidth**|Double| |
|**flow**|Double| |
|**pv**|Long| |
|**streamName**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
