# queryOverviewTraffic


## 描述
概览页统计数据

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/console:overview


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**domain**|String|False| |需要查询的域名, 必须为用户pin下有权限的域名|
|**area**|String|False| | |
|**isp**|String|False| | |
|**fields**|String|False| |可查avgbandwidth,pv默认avgbandwidth|
|**period**|String|False| |时间粒度，可选值:[oneMin,fiveMin,followTime],followTime只会返回一个汇总后的数据|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**download**|[OverviewTrafficItem](#overviewtrafficitem)| |
|**vod**|[OverviewTrafficItem](#overviewtrafficitem)| |
|**web**|[OverviewTrafficItem](#overviewtrafficitem)| |
|**dynamic**|[OverviewTrafficItem](#overviewtrafficitem)| |
|**live**|[OverviewTrafficItem](#overviewtrafficitem)| |
|**oriData**|[OverviewTrafficItem](#overviewtrafficitem)| |
|**total**|[OverviewTrafficTotal](#overviewtraffictotal)| |
### <div id="OverviewTrafficTotal">OverviewTrafficTotal</div>
|名称|类型|描述|
|---|---|---|
|**avgbandwidth**|Double| |
|**flow**|Double| |
|**pv**|Long| |
|**topTimeStamp**|Long| |
### <div id="OverviewTrafficItem">OverviewTrafficItem</div>
|名称|类型|描述|
|---|---|---|
|**avgbandwidth**|Long| |
|**flow**|Long| |
|**pv**|Long| |
|**maxavgbandwidthtime**|String| |
|**details**|[OverviewTrafficDetailItem[]](#overviewtrafficdetailitem)| |
### <div id="OverviewTrafficDetailItem">OverviewTrafficDetailItem</div>
|名称|类型|描述|
|---|---|---|
|**data**|Long| |
|**timeStamp**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
