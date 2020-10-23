# updateTargetGroup


## 描述
修改一个虚拟服务器组的信息

## 请求方式
PATCH

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/targetGroups/{targetGroupId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**targetGroupId**|String|True| |TargetGroup Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**description**|String|False| |虚拟服务器组描述,允许输入UTF-8编码下的全部字符，不超过256字符|
|**targetGroupName**|String|False| |虚拟服务器组名称,只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Parameter TargetGroup id missing|
|**500**|Internal server error|
