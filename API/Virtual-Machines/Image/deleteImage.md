# deleteImage


## 描述
删除一个私有镜像，只允许操作您的个人私有镜像。<br>
若镜像已共享给其他用户，需先取消共享才可删除。


## 请求方式
DELETE

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images/{imageId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**imageId**|String|True| |镜像ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**deleteSnapshot**|Boolean|False| false |删除镜像是否删除关联的快照。<br>默认为false，即仅删除镜像不删除关联快照；如果指定为true, 将会在删除镜像后删除关联的快照。|


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
