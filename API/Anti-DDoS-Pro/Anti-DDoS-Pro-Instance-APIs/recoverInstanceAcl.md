# recoverInstanceAcl


## 描述
实例全局访问控制配置可以恢复到上一次下发成功的配置时，调用此接口回滚到上一次下发成功的配置

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:recoverInstanceAcl

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |实例 ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](recoverinstanceacl#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**success**|Boolean|是否回滚成功|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
