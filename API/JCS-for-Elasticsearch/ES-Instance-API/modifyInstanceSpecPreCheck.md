# modifyInstanceSpecPreCheck


## 描述
水平缩容时，判断可以最小缩容到几个节点

## 请求方式
GET

## 请求地址
https://es.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:modifyInstanceSpecPreCheck

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |regionId|
|**instanceId**|String|True| |实例ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](modifyinstancespecprecheck#result)|结果|
|**requestId**|String|本次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**minimumDataNodeCount**|Integer|最少缩容到的节点数|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|FAILED_PRECONDITION|
|**404**|NOT_FOUND|
|**500**|DATA_ERROR|
