# modifyDedicatedHostAttribute


## 描述
修改专有宿主机部分属性，包括名称、描述。


## 请求方式
POST

## 请求地址
https://dh.jdcloud-api.com/v1/regions/{regionId}/dedicatedHost/{dedicatedHostId}:modifyAttribute

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**dedicatedHostId**|String|True| |专有宿主机ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|False| |名称，<a href="http://docs.jdcloud.com/virtual-machines/api/general_parameters">参考公共参数规范</a>。|
|**description**|String|False| |描述，<a href="http://docs.jdcloud.com/virtual-machines/api/general_parameters">参考公共参数规范</a>。|


## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
