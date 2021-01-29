# modifyInstanceAcl


## 描述
修改实例全局访问控制配置，包括全局的IP黑白名单和geo拦截配置

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:modifyInstanceAcl

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |实例 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceAclSpec**|[InstanceAclSpec](modifyinstanceacl#instanceaclspec)|True| |修改实例全局访问控制配置参数|

### <div id="instanceaclspec">InstanceAclSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**blackListIds**|String[]|False| |黑名单引用的 IP 黑白名单 ID 列表|
|**whiteListIds**|String[]|False| |白名单引用的 IP 黑白名单 ID 列表|
|**geoBlack**|String[]|False| |geo 拦截地域编码列表. 查询 <a href="http://docs.jdcloud.com/anti-ddos-pro/api/describegeoareas">describeGeoAreas</a> 接口获取可设置的地域编码列表|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](modifyinstanceacl#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**success**|Boolean|修改是否下发成功|
|**canRecover**|Boolean|是否可以恢复到上一次的配置|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
