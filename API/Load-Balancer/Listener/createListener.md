# createTargetGroup


## 描述
创建一个虚拟服务器组

## 请求方式
POST

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/targetGroups/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**targetGroupName**|String|True| |虚拟服务器组名称,只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符|
|**loadBalancerId**|String|True| |负载均衡的Id|
|**description**|String|False| |描述,允许输入UTF-8编码下的全部字符，不超过256字符|
|**type**|String|False| |类型，取值为instance或ip|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createtargetgroup#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**targetGroupId**|String|虚拟服务器组Id |

## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**409**| 'xxx' is already exist|
|**404**|Resource not found|
|**400**|Request parameter x.y.z is 'xxx', expected one of [yyy,zzz]|
