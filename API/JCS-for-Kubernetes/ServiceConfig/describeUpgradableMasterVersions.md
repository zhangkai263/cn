# describeUpgradableMasterVersions


## 描述
查询可升级的控制节点版本

## 请求方式
GET

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/clusters/{clusterId}/upgradableMasterVersions

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**clusterId**|String|True| |集群 ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeupgradablemasterversions#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**masterVersions**|[MasterVersion[]](describeupgradablemasterversions#masterversion)| |
### <div id="masterversion">MasterVersion</div>
|名称|类型|描述|
|---|---|---|
|**version**|String|集群版本号|
|**isDefault**|Boolean|是否默认版本|
|**defaultNodeVersion**|String|默认工作节点版本号|
|**versionStatus**|String|版本状态|
|**nodeVersions**|[NodeVersion[]](describeupgradablemasterversions#nodeversion)|node 节点的配置|
|**nodeOsTypes**|String|node节点操作系统类型列表，以 "," 分割，目前支持 CentOS|Windows|
### <div id="nodeversion">NodeVersion</div>
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
