# describeMetrics


## 描述
查询可用监控项列表

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/metrics


## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String| |

### Result
|名称|类型|描述|
|---|---|---|
|**metrics**|Metric[]| |
### Metric
|名称|类型|描述|
|---|---|---|
|**metric**|String|监控项英文标识|
|**metricName**|String|监控项名称|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
