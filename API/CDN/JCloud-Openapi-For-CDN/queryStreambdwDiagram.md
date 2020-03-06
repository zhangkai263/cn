# queryStreambdwDiagram


## 描述
流带宽趋势图

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/console:streambdwDiagram


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**domain**|String|False| |需要查询的域名, 必须为用户pin下有权限的域名|
|**appName**|String|False| |app名|
|**streamName**|String|False| |流名|
|**subDomain**|String|False| |子域名|
|**fields**|String|False| |需要查询的字段|
|**area**|String|False| | |
|**isp**|String|False| | |
|**reqMethod**|String|False| | |
|**scheme**|String|False| |查询的流协议类型|
|**period**|String|False| |时间粒度，可选值:[oneMin,fiveMin,followTime],followTime只会返回一个汇总后的数据|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**details**|[StreamDiagramItem[]](#streamdiagramitem)| |
### <div id="StreamDiagramItem">StreamDiagramItem</div>
|名称|类型|描述|
|---|---|---|
|**timeStamp**|Long| |
|**data**|Object| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
