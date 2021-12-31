# releaseDedicatedHost


## 描述
释放按配置计费、或包年包月已到期的单个专有宿主机。不能释放没有计费信息的专有宿主机。<br>
专有宿主机状态必须为可用<b>available</b>、不可用<b>unavailable</b>、维护中<b>under-assessment</b>，同时专有宿主机上必须没有云主机实例才可删除。<br>
<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>

## 请求方式
DELETE

## 请求地址
https://dh.jdcloud-api.com/v1/regions/{regionId}/dedicatedHost/{dedicatedHostId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**dedicatedHostId**|String|True| |专有宿主机ID|

## 请求参数
无


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
