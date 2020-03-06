# updateUrlMap


## 描述
修改转发规则组

## 请求方式
PATCH

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/urlMaps/{urlMapId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**urlMapId**|String|True| |转发规则组Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**description**|String|False| |转发规则组描述,允许输入UTF-8编码下的全部字符，不超过256字符|
|**urlMapName**|String|False| |转发规则组名称，同一个负载均衡下，名称不能重复,只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Parameter urlMap id missing|
|**500**|Internal server error|
