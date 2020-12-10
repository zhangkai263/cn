# describeInstance


## 描述
查询kafka实例的详细信息

## 请求方式
GET

## 请求地址
https://kafka.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}

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
|**instance**|[Instance](describeinstance#instance)|kafka实例详细信息|
### <div id="instance">Instance</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|实例ID|
|**instanceName**|String|实例名称|
|**instanceVersion**|String|kafka实例版本|
|**instanceStatus**|String|实例状态，running：运行，error：错误，creating：创建中，changing：变配，stop：停止|
|**createTime**|String|创建时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**vpcId**|String|所属VPC的ID|
|**subnetId**|String|所属子网的ID|
|**azId**|String[]|azId|
|**instanceClass**|[InstanceClass[]](describeinstance#instanceclass)|集群规格信息|
|**charge**|[Charge](describeinstance#charge)|计费信息|
|**tags**|[Tag[]](describeinstance#tag)|Tag信息|
|**extension**|[RespExtension](describeinstance#respextension)|扩展参数|
### <div id="respextension">RespExtension</div>
|名称|类型|描述|
|---|---|---|
|**internalEndpoint**|[InternalEndpoint](describeinstance#internalendpoint)|内网地址，详情接口|
### <div id="internalendpoint">InternalEndpoint</div>
|名称|类型|描述|
|---|---|---|
|**brokerEndpoint**|String[]|broker endpoint|
|**zkEndpoint**|String[]|zk endpoint|
### <div id="tag">Tag</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|标签键|
|**value**|String|标签值|
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
|**role**|String|角色|
|**nodeClassCode**|String|节点规格代码|
|**nodeCpu**|Integer|节点cpu核数|
|**nodeMemoryGB**|Integer|节点内存单位GB|
|**nodeCount**|Integer|节点个数|
|**nodeDiskType**|String|磁盘类型|
|**nodeDiskGB**|Integer|单节点磁盘大小单位GB|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
