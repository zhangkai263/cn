# describeTargetHealth


## 描述
查询后端服务下的target的健康状态

## 请求方式
GET

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/backends/{backendId}/health

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**backendId**|String|True| |Backend Id|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describetargethealth#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**targetHealths**|[TargetHealth[]](describetargethealth#targethealth)|后端服务的信息|
### <div id="targethealth">TargetHealth</div>
|名称|类型|描述|
|---|---|---|
|**targetGroupId**|String|Target所在的虚拟服务器组Id, 与agId不能并存|
|**agId**|String|Target所在的高可用组Id，与targetGroupId不能并存|
|**instanceId**|String|Target所属实例的Id|
|**type**|String|Target所属的type，取值为vm或者container,默认为vm|
|**port**|Integer|Target提供服务的端口，取值范围：0-65535，其中0表示与backend的端口相同|
|**weight**|Integer|Target的权重，取值范围：1-100 ，默认为10。|
|**status**|String|Target的健康状态，取值为healthy、unhealthy|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
