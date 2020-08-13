# createIpSet


## 描述
添加实例的 IP 黑白名单, 预定义的 IP 黑白名单绑定到转发规则的黑名单或白名单后生效

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/ipSets

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ipSetSpec**|[IpSetSpec](createipset#ipsetspec)|True| |添加实例的 IP 黑白名单请求参数|

### <div id="ipsetspec">IpSetSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |IP 黑白名单名称|
|**ip**|String[]|True| |IP 或 IP 段的数组|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createipset#result)| |
|**requestId**|String| |
|**error**|[Error](createipset#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](createipset#err)| |
### <div id="err">Err</div>
|名称|类型|描述|
|---|---|---|
|**code**|Long|同http code|
|**details**|Object| |
|**message**|String| |
|**status**|String|具体错误|
### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**code**|Integer|0: 添加失败, 1: 添加成功|
|**message**|String|添加失败时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
