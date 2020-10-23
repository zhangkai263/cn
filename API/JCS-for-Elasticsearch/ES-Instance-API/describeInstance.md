# describeInstance


## 描述
查询es实例的详细信息

## 请求方式
GET

## 请求地址
https://es.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |regionId|
|**instanceId**|String|True| |实例ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstance#result)|结果|
|**requestId**|String|本次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instance**|[Instance](describeinstance#instance)|es实例详细信息|
### <div id="instance">Instance</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|实例ID|
|**instanceName**|String|实例名称|
|**instanceVersion**|String|实例版本，目前支持5.6.9和6.5.4两个版本|
|**instanceStatus**|String|实例状态，running：运行，error：错误，creating：创建中，changing：变配中，stop：已停止，processing：处理中|
|**instanceClass**|[InstanceClass](describeinstance#instanceclass)|实例的配置信息|
|**createTime**|String|创建时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**azId**|String|AZ信息，各AZ编码详见：https://docs.jdcloud.com/cn/jcs-for-elasticsearch/restrictions|
|**vpcId**|String|所属VPC的ID|
|**subnetId**|String|所属子网的ID|
|**charge**|[Charge](describeinstance#charge)|计费信息|
|**internalEndpoint**|[InternalEndpoint](describeinstance#internalendpoint)|内网地址|
|**tags**|[Tag[]](describeinstance#tag)|Tag信息|
|**dedicatedMaster**|Boolean|是否开启了专用主节点，true为开启，false为不开启|
|**coordinating**|Boolean|是否开启了协调节点，true为开启，false为不开启|
### <div id="tag">Tag</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|用于标识资源分类的Tag键|
|**value**|String|用于标识资源分类的Tag值|
### <div id="internalendpoint">InternalEndpoint</div>
|名称|类型|描述|
|---|---|---|
|**esHttpEndpoint**|String|es http endpoint|
### <div id="charge">Charge</div>
|名称|类型|描述|
|---|---|---|
|**chargeMode**|String|支付模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration|
|**chargeStatus**|String|费用支付状态，取值为：normal、overdue、arrear，normal表示正常，overdue表示已到期，arrear表示欠费|
|**chargeStartTime**|String|计费开始时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**chargeExpiredTime**|String|过期时间，预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ，后付费资源此字段内容为空|
|**chargeRetireTime**|String|预期释放时间，资源的预期释放时间，预付费/后付费资源均有此值，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
### <div id="instanceclass">InstanceClass</div>
|名称|类型|描述|
|---|---|---|
|**nodeClass**|String|data节点规格代码，规格代码对照关系参见：https://docs.jdcloud.com/cn/jcs-for-elasticsearch/specifications|
|**nodeCpu**|Integer|data节点cpu核数|
|**nodeMemoryGB**|Integer|data节点内存单位GB|
|**nodeDiskGB**|Integer|data节点存储大小单位GB|
|**nodeDiskType**|String|data节点存储类型|
|**nodeCount**|Integer|data节点数量|
|**masterClass**|String|master节点规格代码，规格代码对照关系参见：https://docs.jdcloud.com/cn/jcs-for-elasticsearch/specifications|
|**masterCpu**|Integer|master节点cpu核数|
|**masterMemoryGB**|Integer|master节点内存单位GB|
|**masterDiskGB**|Integer|master节点存储大小单位GB|
|**masterDiskType**|String|master节点存储类型|
|**masterCount**|Integer|master节点数量|
|**coordinatingClass**|String|coordinating节点规格代码，规格代码对照关系参见：https://docs.jdcloud.com/cn/jcs-for-elasticsearch/specifications|
|**coordinatingCpu**|Integer|coordinating节点cpu核数|
|**coordinatingMemoryGB**|Integer|coordinating节点内存单位GB|
|**coordinatingDiskGB**|Integer|coordinating节点存储大小单位GB|
|**coordinatingDiskType**|String|coordinating节点存储类型|
|**coordinatingCount**|Integer|coordinating节点数量|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
