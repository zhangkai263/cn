# describeInstanceAcl


## 描述
查询实例全局访问控制配置，包括全局的IP黑白名单和geo拦截配置

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:describeInstanceAcl

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |实例 ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstanceacl#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[InstanceAcl](describeinstanceacl#instanceacl)| |
### <div id="instanceacl">InstanceAcl</div>
|名称|类型|描述|
|---|---|---|
|**blackListIds**|[IpSet[]](describeinstanceacl#ipset)|黑名单引用的IP黑白名单库列表|
|**whiteListIds**|[IpSet[]](describeinstanceacl#ipset)|白名单引用的IP黑白名单库列表|
|**geoBlack**|[Geo[]](describeinstanceacl#geo)|geo 拦截地域列表|
|**success**|Boolean|上一次修改是否下发成功|
|**canRecover**|Boolean|上一次修改下发失败的情况下，是否可以回滚到上一次修改之前下发成功的配置|
### <div id="geo">Geo</div>
|名称|类型|描述|
|---|---|---|
|**label**|String|geo 拦截地域|
|**value**|String|geo 拦截地域编码|
### <div id="ipset">IpSet</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|IP 黑白名单 Id|
|**name**|String|IP 黑白名单的名称|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
