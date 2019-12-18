# getStatistics


## 描述
获取电子签章的数据统计信息

## 请求方式
GET

## 请求地址
https://cloudsign.jdcloud-api.com/v1/statistics


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**region**|String|False| |地区|
|**errCode**|String|False| |状态码|
|**startTime**|String|False| |开始时间，默认七天前|
|**endTime**|Integer|False| |结束时间，默认当前时间|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**statisticsInfo**|[StatisticsInfo](#statisticsinfo)| |
### <div id="statisticsinfo">StatisticsInfo</div>
|名称|类型|描述|
|---|---|---|
|**contractNumber**|Integer|已签合同数量|
|**stampNumber**|Integer|印章数量|
|**templateNumber**|Integer|合同模板数量|
|**contractSave**|Boolean|是否启用存管|
|**usedSpace**|Integer|已用存储空间容量(单位:MB)|
|**kmsKeyId**|String|签章系统加密密钥ID|
|**signStatistic**|[SignItem[]](#signitem)|签章次数统计[24小时，7天，30天，1年]|
### <div id="signitem">SignItem</div>
|名称|类型|描述|
|---|---|---|
|**time**|String|13位时间戳|
|**value**|Integer|签章次数|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT FOUND|
