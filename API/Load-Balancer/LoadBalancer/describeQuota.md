# describeQuota


## 描述
获取配额信息

## 请求方式
GET

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/quotas/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**lbType**|String|False| |lb类型，取值范围：alb、nlb、dnlb，默认为alb|
|**type**|String|True| |资源类型，取值范围：loadbalancer、listener、target_group、target、backend、urlMap(仅alb支持)、rules(仅alb支持)、extensionCertificate(仅alb支持)|
|**parentResourceId**|String|False| |type为loadbalancer不设置, type为listener、backend、target_group、urlMap设置为loadbalancerId, type为target设置为targetGroupId, type为rules设置为urlMapId，type为extensionCertificate设置为listenerId ||


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**quota**|Object|配额，数据结构：<br>type（string）：资源类型，取值范围为loadbalancer、listener、target_group、target、backend、urlMap(仅alb支持)、rules(仅alb支持)、extensionCertificate(仅alb支持);<br>parentResourceId（string）：当type为loadbalancer时，parentResourceId为空; 当type为listener、backend、target_group、urlMap时，parentResourceId为LoadBalancerId;当type为target时，parentResourceId为targetGroupId;当type为rules时，parentResourceId为urlMapId;当type为extensionCertificate时，parentResourceId为listenerId<br>maxLimit（integer）配额大小;<br>count（integer）已存在的资源数量。|

## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**404**|Resource not found|
|**400**|Request parameter x.y.z is 'xxx', expected one of [yyy,zzz]|
