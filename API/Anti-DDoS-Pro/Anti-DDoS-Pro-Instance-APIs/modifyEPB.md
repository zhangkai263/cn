# modifyEPB


## 描述
更新实例弹性防护带宽

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:modifyEPB

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |实例 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**modifyInstanceEPBSpec**|[ModifyInstanceEPBSpec](modifyepb#modifyinstanceepbspec)|True| |修改实例名称请求参数|

### <div id="modifyinstanceepbspec">ModifyInstanceEPBSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ep**|Integer|True| |弹性带宽: 单位 Gbps|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](modifyepb#result)| |
|**requestId**|String| |
|**error**|[Error](modifyepb#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](modifyepb#err)| |
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
|**code**|Integer|0: 修改失败, 1: 修改成功|
|**message**|String|修改失败时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
