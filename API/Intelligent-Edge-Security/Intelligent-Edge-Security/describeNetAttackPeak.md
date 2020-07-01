# describeNetAttackPeak


## 描述
查询攻击峰值

## 请求方式
GET

## 请求地址
https://edgesecurity.jdcloud-api.com/v1/describeNetAttackPeak


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |开始时间|
|**endTime**|String|True| |结束时间|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**flow**|Double|流量大小|
|**unit**|String|流量单位单位|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
