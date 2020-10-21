# describeInstances


## 描述
批量查询分布式云物理服务器详细信息<br/>
支持分页查询，默认每页20条<br/>


## 请求方式
GET

## 请求地址
https://edcps.jdcloud-api.com/v1/regions/{regionId}/instances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID，可调用接口（describeEdCPSRegions）获取分布式云物理服务器支持的地域|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|20|分页大小；默认为20；取值范围[20, 100]|
|**az**|String|False| |可用区，精确匹配|
|**name**|String|False| |分布式云物理服务器名称，支持模糊匹配|
|**networkType**|String|False| |网络类型，精确匹配，支持vpc|
|**deviceType**|String|False| |实例类型，精确匹配，调用接口（describeDeviceTypes）获取实例类型|
|**subnetId**|String|False| |子网ID|
|**enableInternet**|String|False| |是否启用外网, yes/no|
|**privateIp**|String|False| |主网口内网ip|
|**extensionPrivateIp**|String|False| |辅网口内网ip|
|**keypairId**|String|False| |密钥对id|
|**interfaceMode**|String|False| |网口模式 单网口:bond,双网口:dual|
|**filters**|[Filter[]](describeinstances#filter)|False| |instanceId - 分布式云物理服务器ID，精确匹配，支持多个<br/><br>status - 分布式云物理服务器状态，参考分布式云物理服务器状态，精确匹配，支持多个<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstances#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instances**|[Instance[]](describeinstances#instance)| |
|**pageNumber**|Integer|页码；默认为1|
|**pageSize**|Integer|分页大小；默认为20；取值范围[20, 100]|
|**totalCount**|Integer|查询结果总数|
### <div id="instance">Instance</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|云物理服务器实例ID|
|**region**|String|区域代码, 如 cn-east-tz1|
|**az**|String|可用区, 如 cn-east-tz1a|
|**deviceType**|String|实例类型, 如 edcps.c.normal1|
|**name**|String|云物理服务器名称|
|**description**|String|云物理服务器描述|
|**status**|String|云物理服务器生命周期状态|
|**enableInternet**|String|是否启用外网, 如 yes/no|
|**enableIpv6**|String|是否启用IPv6, 如 yes/no|
|**bandwidth**|Integer|带宽, 单位Mbps|
|**extraUplinkBandwidth**|Integer|额外上行带宽, 单位Mbps|
|**imageType**|String|镜像类型, 如 standard|
|**osTypeId**|String|操作系统类型ID|
|**osName**|String|操作系统名称|
|**osType**|String|操作系统类型, 如 ubuntu/centos|
|**osVersion**|String|操作系统版本, 如 16.04|
|**sysRaidTypeId**|String|系统盘RAID类型ID|
|**sysRaidType**|String|系统盘RAID类型, 如 NORAID, RAID0, RAID1|
|**dataRaidTypeId**|String|数据盘RAID类型ID|
|**dataRaidType**|String|数据盘RAID类型, 如 NORAID, RAID0, RAID1|
|**networkType**|String|网络类型, 如 basic, vpc|
|**vpcId**|String|私有网络ID|
|**vpcName**|String|私有网络名称|
|**subnetId**|String|子网编号|
|**subnetName**|String|子网名称|
|**privateIp**|String|内网IP|
|**lineType**|String|外网链路类型, 如 bgp|
|**elasticIpId**|String|弹性公网IPID|
|**publicIp**|String|公网IP|
|**publicIpv6**|String|公网IPv6|
|**keypairId**|String|密钥对id|
|**interfaceMode**|String|网络接口模式，单网口:bond、双网口:dual|
|**extensionVpcId**|String|辅网口私有网络ID|
|**extensionVpcName**|String|辅网口私有网络名称|
|**extensionSubnetId**|String|辅网口子网ID|
|**extensionSubnetName**|String|辅网口子网名称|
|**extensionPrivateIp**|String|辅网口手动分配的内网ip|
|**extensionEnableInternet**|String|辅网口是否启用外网|
|**extensionElasticIpId**|String|辅网口弹性公网ip id|
|**extensionPublicIp**|String|辅网口公网ip|
|**extensionBandwidth**|Integer|辅网口外网带宽，单位Mbps|
|**extensionExtraUplinkBandwidth**|Integer|辅网口额外上行带宽, 单位Mbps|
|**agentStatus**|String|agent状态|
|**createTime**|String|创建时间|
|**updateTime**|String|更新时间|
|**charge**|[Charge](describeinstances#charge)|计费信息|
### <div id="charge">Charge</div>
|名称|类型|描述|
|---|---|---|
|**chargeMode**|String|支付模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration|
|**chargeStatus**|String|费用支付状态，取值为：normal、overdue、arrear，normal表示正常，overdue表示已到期，arrear表示欠费|
|**chargeStartTime**|String|计费开始时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**chargeExpiredTime**|String|过期时间，预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ，后付费资源此字段内容为空|
|**chargeRetireTime**|String|预期释放时间，资源的预期释放时间，预付费/后付费资源均有此值，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad request|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
