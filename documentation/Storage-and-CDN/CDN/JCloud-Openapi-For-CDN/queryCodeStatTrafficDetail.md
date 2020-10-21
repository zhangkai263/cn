# queryCodeStatTrafficDetail


## 描述
状态码明细统计数据

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/console:codestatDetail


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**domain**|String|False| |需要查询的域名, 必须为用户pin下有权限的域名|
|**area**|String|False| | |
|**isp**|String|False| | |
|**period**|String|False| |时间粒度，可选值:[oneMin,fiveMin,followTime],followTime只会返回一个汇总后的数据|
|**scheme**|String|False| |查询协议，可选值:[http,https,all],传空默认返回全部协议汇总后的数据|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](querycodestattrafficdetail#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**codeMap**|Object|状态码对应map，类型为LinkedHashMap<String,String>|
|**details**|[CodeDetailItem[]](querycodestattrafficdetail#codedetailitem)| |
### <div id="CodeDetailItem">CodeDetailItem</div>
|名称|类型|描述|
|---|---|---|
|**timeStamp**|Long| |
|**ok**|Double| |
|**badGateway**|Double| |
|**badRequest**|Double| |
|**forbidden**|Double| |
|**found**|Double| |
|**gatewayTimeout**|Double| |
|**internalServerError**|Double| |
|**movedPermanently**|Double| |
|**notFound**|Double| |
|**notModified**|Double| |
|**partialContent**|Double| |
|**requestedRangeNotSuitable**|Double| |
|**other**|Double| |
|**serviceUnavailable**|Double| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
