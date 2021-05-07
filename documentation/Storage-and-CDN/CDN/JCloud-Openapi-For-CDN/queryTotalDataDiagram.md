# queryTotalDataDiagram


## 描述
域名带宽总数据趋势图

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/console:domainbdwDiagram


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**domain**|String|False| |需要查询的域名, 必须为用户pin下有权限的域名|
|**area**|String|False| | |
|**isp**|String|False| | |
|**period**|String|False| |查询周期，默认fiveMin|
|**fields**|String|True| |pv,flow,avgbandwidth会连查与之对应的回源字段|
|**scheme**|String|False| |查询协议，可选值:[http,https,all],传空默认返回全部协议汇总后的数据|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**details**|[TotalDetalItem[]](#totaldetalitem)| |
### <div id="TotalDetalItem">TotalDetalItem</div>
|名称|类型|描述|
|---|---|---|
|**data**|Object| |
|**oriData**|Object| |
|**timeStamp**|Long| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
