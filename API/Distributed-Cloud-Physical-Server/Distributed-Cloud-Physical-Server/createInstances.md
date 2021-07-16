# createInstances


## 描述
创建一台或多台指定配置的分布式云物理服务器<br/>
- 地域与可用区<br/>
  - 调用接口（queryEdCPSRegions）获取分布式云物理服务器支持的地域与可用区<br/>
- 实例类型<br/>
  - 调用接口（describeDeviceTypes）获取物理实例类型列表<br/>
  - 不能使用已下线、或已售馨的实例类型<br/>
- 操作系统<br/>
  - 可调用接口（describeOS）获取分布式云物理服务器支持的操作系统列表<br/>
- 存储<br/>
  - 数据盘多种RAID可选，可调用接口（describeDeviceRaids）获取服务器支持的RAID列表<br/>
- 网络<br/>
  - 网络类型目前支持vpc<br/>
  - 线路目前支持联通un、电信ct、移动cm<br/>
  - 支持不启用外网，如果启用外网，带宽范围[1,200] 单位Mbps<br/>
- 其他<br/>
  - 购买时长，可按年或月购买：月取值范围[1,9], 年取值范围[1,3]<br/>
  - 密码设置参考公共参数规范<br/>


## 请求方式
PUT

## 请求地址
https://edcps.jdcloud-api.com/v1/regions/{regionId}/instances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID，可调用接口（describeEdCPSRegions）获取分布式云物理服务器支持的地域|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**clientToken**|String|False| |由客户端生成，用于保证请求的幂等性，长度不能超过36个字符；<br/><br>如果多个请求使用了相同的clientToken，只会执行第一个请求，之后的请求直接返回第一个请求的结果<br/><br>|
|**instanceSpec**|[InstanceSpec](createinstances#instancespec)|True| |描述分布式云物理服务器配置|

### <div id="instancespec">InstanceSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**az**|String|True| |可用区, 如 cn-east-tz1|
|**deviceType**|String|True| |实例类型, 如 edcps.c.normal1|
|**hostname**|String|False| |主机名|
|**imageType**|String|True| |镜像类型, 取值范围：standard|
|**osTypeId**|String|True| |操作系统类型ID|
|**sysRaidTypeId**|String|True| |系统盘RAID类型ID|
|**dataRaidTypeId**|String|True| |数据盘RAID类型ID|
|**subnetId**|String|False| |子网ID|
|**enableInternet**|String|False|yes|是否启用外网，取值范围：yes、no|
|**internetChargeMode**|String|False| |启用外网时弹性公网IP的计费模式，取值范围：prepaid_by_duration、postpaid_by_duration|
|**bandwidthPackageId**|String|False| |弹性公网IP加入的共享带宽ID|
|**networkType**|String|True| |网络类型，取值范围：vpc|
|**cidr**|String|False| |网络CIDR|
|**privateIp**|String|False| |内网IP|
|**aliasIps**|[AliasIpInfo[]](createinstances#aliasipinfo)|False| |内网添加的别名IP范围|
|**lineType**|String|False| |外网链路类型, 目前支持联通un、电信ct、移动cm|
|**bandwidth**|Integer|False| |外网带宽, 范围[1,10240] 单位Mbps|
|**extraUplinkBandwidth**|Integer|False| |额外上行带宽, 范围[0,10240] 单位Mbps|
|**name**|String|True| |云物理服务器名称|
|**description**|String|False| |云物理服务器描述|
|**password**|String|False| |密码，不传值会随机生成密码|
|**count**|Integer|True| |购买数量|
|**userData**|String|False| |可执行脚本Base64编码后的内容，支持shell和python脚本|
|**keypairId**|String|False| |密钥对id|
|**charge**|[ChargeSpec](createinstances#chargespec)|True| |计费配置|
|**interfaceMode**|String|False| |网络接口模式，单网口:bond、双网口:dual|
|**extensionSubnetId**|String|False| |辅网口子网ID|
|**extensionPrivateIp**|String|False| |辅网口手动分配的内网ip|
|**extensionAliasIps**|[AliasIpInfo[]](createinstances#aliasipinfo)|False| |辅网口内网添加的别名IP范围|
|**extensionEnableInternet**|String|False| |辅网口是否启用外网，取值范围：yes、no|
|**extensionLineType**|String|False| |辅网口链路类型, 目前支持联通un、电信ct、移动cm|
|**extensionBandwidth**|Integer|False| |辅网口外网带宽，范围[1,10240] 单位Mbps|
|**extensionExtraUplinkBandwidth**|Integer|False| |辅网口额外上行带宽, 范围[0,10240] 单位Mbps|
|**extensionInternetChargeMode**|String|False| |辅网口启用外网时弹性公网IP的计费模式，取值范围：prepaid_by_duration、postpaid_by_duration|
|**extensionBandwidthPackageId**|String|False| |辅网口弹性公网IP加入的共享带宽ID|
|**resourceTags**|[Tag[]](createinstances#tag)|False| |标签|
### <div id="tag">Tag</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|True| |标签键|
|**value**|String|True| |标签值|
### <div id="aliasipinfo">AliasIpInfo</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**id**|String|False| |主CIDR或次要CIDR id|
|**cidr**|String|False| |cidr段|
### <div id="chargespec">ChargeSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**chargeMode**|String|False|postpaid_by_duration|计费模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration.请参阅具体产品线帮助文档确认该产品线支持的计费类型|
|**chargeUnit**|String|False| |预付费计费单位，预付费必填，当chargeMode为prepaid_by_duration时有效，取值为：month、year，默认为month|
|**chargeDuration**|Integer|False| |预付费计费时长，预付费必填，当chargeMode取值为prepaid_by_duration时有效。当chargeUnit为month时取值为：1~9，当chargeUnit为year时取值为：1、2、3|
|**autoRenew**|Boolean|False| |True=：OPEN——开通自动续费、False=CLOSE—— 不开通自动续费，默认为CLOSE|
|**buyScenario**|String|False| |产品线统一活动凭证JSON字符串，需要BASE64编码，目前要求编码前格式为 {"activity":{"activityType":必填字段, "activityIdentifier":必填字段}}|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createinstances#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceIds**|String[]| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad request|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
