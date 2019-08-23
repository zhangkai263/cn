# describeProgress


## 描述
查询集群操作进度

## 请求方式
GET

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/clusters/{clusterId}/progress

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|
|**clusterId**|String|True| |集群 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**nodeGroupIds**|String[]|False| |节点组 ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String| |

### Result
|名称|类型|描述|
|---|---|---|
|**masterProgress**|MasterProgress| |
|**nodeGroupProgresses**|NodeGroupProgress[]| |
### NodeGroupProgress
|名称|类型|描述|
|---|---|---|
|**nodeGroupId**|String|节点组 id|
|**action**|String|操作类型, upgrade, downgrade, rollback|
|**totalCount**|Integer|总node个数|
|**updatedCount**|Integer|升级完成node个数|
### MasterProgress
|名称|类型|描述|
|---|---|---|
|**action**|String|操作类型 upgrade,rollback,downgrade 等|
|**progress**|String|升级范围, 目前只有三个值：0, 50, 100|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**429**|Quota exceeded|
|**500**|Internal server error|
|**503**|Service unavailable|
