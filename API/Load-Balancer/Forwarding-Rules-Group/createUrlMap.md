# createUrlMap


## 描述
创建转发规则组,仅alb支持

## 请求方式
POST

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/urlMaps/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**urlMapName**|String|True| |转发规则组名称，同一个负载均衡下，名称不能重复,只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符|
|**loadBalancerId**|String|True| |转发规则组所属负载均衡的Id|
|**description**|String|False| |描述,允许输入UTF-8编码下的全部字符，不超过256字符|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createurlmap#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**urlMapId**|String|转发规则组id|

## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**404**|Resource not found|
|**400**|Request parameter x.y.z is 'xxx', expected one of [yyy,zzz]|
