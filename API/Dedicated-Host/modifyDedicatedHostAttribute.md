# modifyDedicatedHostAttribute


## 描述
修改一台专有宿主机的属性。

## 接口说明
支持修改专有宿主机的名称和描述。

## 请求方式
POST

## 请求地址
https://dh.jdcloud-api.com/v1/regions/{regionId}/dedicatedHost/{dedicatedHostId}:modifyAttribute

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1 |地域ID|
|**dedicatedHostId**|String|是|host-nrj0****o0 |专有宿主机ID|

## 请求参数
|名称|类型|是否必需|示例认值|描述|
|---|---|---|---|---|
|**name**|String|否|name-test |名称，<a href="http://docs.jdcloud.com/virtual-machines/api/general_parameters">参考公共参数规范</a>。|
|**description**|String|否| |描述，<a href="http://docs.jdcloud.com/virtual-machines/api/general_parameters">参考公共参数规范</a>。|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

## 请求示例
POST

```
/v1/regions/cn-north-1/dedicatedHost/host-nrj0****o0:modifyAttribute?name=test-0110
{
    "name":"test-0110",
}
```

## 返回示例
```
{
    "requestId": "a0633f72670e59f8c6db36b1ee257011"
}
```

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
