# describeNodeVersion


## 描述
查询节点版本

## 请求方式
GET

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/nodeVersions/{nodeVersion}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**nodeVersion**|String|True| |节点版本|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String| |

### Result
|名称|类型|描述|
|---|---|---|
|**nodeVersion**|NodeVersion| |
### NodeVersion
|名称|类型|描述|
|---|---|---|
|**version**|String|节点版本号|
|**imageOs**|String|镜像操作系统|
|**versionStatus**|String|版本状态|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
