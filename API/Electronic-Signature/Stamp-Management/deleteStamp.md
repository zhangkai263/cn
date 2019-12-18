# deleteStamp


## 描述
删除印章<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>

## 请求方式
DELETE

## 请求地址
https://cloudsign.jdcloud-api.com/v1/stamp/{stampId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**stampId**|String|True| |印章ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT FOUND|
