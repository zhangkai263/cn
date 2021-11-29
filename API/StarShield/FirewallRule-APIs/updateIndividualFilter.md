# updateIndividualFilter


## 描述
更新一个现有的筛选器。

## 请求方式
PUT

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/filters/{id}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |
|**id**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**expression**|String|False| |要使用的筛选器表达式|
|**paused**|Boolean|False| |此筛选器当前是否已暂停|
|**description**|String|False| |可用于描述过滤器用途的注释|
|**ref**|String|False| |短引用标记，用于快速选择相关规则。|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](updateIndividualFilter#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[Filter](updateIndividualFilter#filter)| |
### <div id="filter">Filter</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|筛选器标识符|
|**expression**|String|要使用的筛选器表达式|
|**paused**|Boolean|此筛选器当前是否已暂停|
|**description**|String|可用于描述过滤器用途的注释|
|**ref**|String|短引用标记，用于快速选择相关规则。|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
