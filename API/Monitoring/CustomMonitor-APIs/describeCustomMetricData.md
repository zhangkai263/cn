# describeCustomMetricData


## 描述
通过指定维度查询自定义监控的数据

## 请求方式
POST

## 请求地址
https://monitor.jdcloud-api.com/v2/regions/{regionId}/namespaces/{namespaceUID}/metricData

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |region|
|**namespaceUID**|String|True| |namespace|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**endTime**|String|False| |查询时间范围的结束时间， UTC时间，格式：2016-12-11T00:00:00+0800（为空时，将由startTime与timeInterval计算得出）|
|**query**|[QueryOption](describecustommetricdata#queryoption)|True| | |
|**startTime**|String|False| |查询时间范围的开始时间， UTC时间，格式：2016-12-11T00:00:00+0800|
|**timeInterval**|String|False| |时间间隔：1h，6h，12h，1d，3d，7d，14d，固定时间间隔，timeInterval默认为1h，当前时间往 前1h|

### <div id="queryoption">QueryOption</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**aggrType**|String|False| |聚合方式，默认等于downSampleType(若downSampleType为last，AggrType取max)或avg，可选值参考:sum、avg、min、max|
|**dimensions**|[DimensionsParam[]](describecustommetricdata#dimensionsparam)|True| |监控指标数据的维度信息,根据tags来指定查询的监控数据维度，至少指定一个查询维度|
|**downSampleType**|String|False| |采样方式，默认等于aggrType或avg，可选值参考：sum、avg、last、min、max|
|**metric**|String|True| |metric|
### <div id="dimensionsparam">DimensionsParam</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**groupBy**|Boolean|False| |是否分组查询|
|**key**|String|False| |维度key|
|**values**|String[]|False| |维度值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describecustommetricdata#result)| |
|**requestId**|String|请求的标识id|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**metricDatas**|[MetricDataItemCm[]](describecustommetricdata#metricdataitemcm)| |
### <div id="metricdataitemcm">MetricDataItemCm</div>
|名称|类型|描述|
|---|---|---|
|**data**|[DataPoint[]](describecustommetricdata#datapoint)| |
|**metric**|[MetricCm](describecustommetricdata#metriccm)| |
### <div id="metriccm">MetricCm</div>
|名称|类型|描述|
|---|---|---|
|**aggrType**|String| |
|**calculateUnit**|String| |
|**dimensions**|Object| |
|**downSamplePeriod**|String| |
|**downSampleType**|String| |
|**metric**|String| |
|**metricName**|String| |
### <div id="datapoint">DataPoint</div>
|名称|类型|描述|
|---|---|---|
|**timestamp**|Long|时间戳|
|**value**|Object|值|

## 返回码
|返回码|描述|
|---|---|
|**200**|通过指定维度查询自定义监控的数据|
