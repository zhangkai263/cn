# eidScore


## 描述
获取设备标签

## 请求方式
POST

## 请求地址
https://eid.jdcloud-api.com/v1/eidScore:check


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**tasks**|ScoreTask|True| |检测任务列表，包含一个或多个元素。每个元素是个结构体，最多可添加100元素，即最多对100个设备数据进行评分。每个元素的具体结构描述见creditTask。|

### <div id="ScoreTask">ScoreTask</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dataId**|String|False| |数据Id。需要保证在一次请求中所有的Id不重复|
|**content**|String|True| |待检测数据，最长512个字符|
|**resourceType**|String|True| |数据类型，eid-设备|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result|API请求成功或者部分成功时返回数据|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|EidScoreResult|结果数组|
### <div id="EidScoreResult">EidScoreResult</div>
|名称|类型|描述|
|---|---|---|
|**success**|Boolean|是否成功，没成功会在failMsg附上错误信息|
|**failMsg**|String|错误描述信息|
|**dataId**|String|对应请求的dataId|
|**content**|String|对应请求的内容|
|**resourceType**|String|数据类型，eid-设备|
|**scoreDetail**|EidScoreDetail|评分数据|
### <div id="EidScoreDetail">EidScoreDetail</div>
|名称|类型|描述|
|---|---|---|
|**riskTag**|String|风险类型，对应riskCode的中文描述|
|**riskCode**|String|风险类型编码，101-正常设备，其它标签参考[标签列表](https://docs.jdcloud.com/cn/device-fingerprint/label)|
|**riskClass**|String|风险分类，对应riskCode的分类|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad Request|
