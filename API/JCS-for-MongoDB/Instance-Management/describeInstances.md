# describeInstances


## 描述
查询实例信息

## 请求方式
GET

## 请求地址
https://mongodb.jdcloud-api.com/v1/regions/{regionId}/instances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |页码；默认为1，取值范围：[1,∞)|
|**pageSize**|Integer|False| |分页大小；默认为10；取值范围[1, 100]|
|**filters**|[Filter[]](describeinstances#filter)|False| |instanceId - 实例ID, 精确匹配<br>instanceName - 实例名称, 模糊匹配<br>instanceStatus - mongodb状态，精确匹配，支持多个.RUNNING：运行, ERROR：错误 ,BUILDING：创建中, DELETING：删除中, RESTORING：恢复中, RESIZING：变配中<br>chargeMode - 计费类型，精确匹配<br>|
|**tagFilters**|[TagFilter[]](describeinstances#tagfilter)|False| |Tag筛选条件|
|**sorts**|[Sort[]](describeinstances#sort)|False| |createTime - 创建时间,asc（正序），desc（倒序）<br>|

### <div id="sort">Sort</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|False| |排序条件的名称|
|**direction**|String|False| |排序条件的方向|
### <div id="tagfilter">TagFilter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|True| |Tag键|
|**values**|String[]|True| |Tag值|
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
|**dbInstances**|[DBInstance[]](describeinstances#dbinstance)| |
|**totalCount**|Integer| |
|**pageNumber**|Integer| |
### <div id="dbinstance">DBInstance</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|实例ID|
|**instanceName**|String|实例名称|
|**instanceType**|String|实例类型，副本集：Replication；分片集群：Sharding；|
|**engine**|String|数据库类型|
|**engineVersion**|String|数据库版本|
|**instanceStorageType**|String|存储类型。LOCAL_SSD -本地盘SSD、LOCAL_NVMe -本地盘NVMe、EBS_SSD-SSD云盘。|
|**storageEncrypted**|Boolean|实例数据加密（存储类型为云硬盘才支持数据加密）。 false：不加密；true：加密。缺省为false。|
|**instanceClass**|String|副本集实例规格代码|
|**instanceStorageGB**|Integer|副本集存储空间|
|**instanceCPU**|Integer|副本集CPU核数|
|**instanceMemoryGB**|Integer|副本集内存，单位GB|
|**azId**|String[]|副本集可用区区ID，依次为主、从、隐藏节点所在可用区|
|**vpcId**|String|VPCID|
|**subnetId**|String|子网ID|
|**replicaSetName**|String|副本集名称|
|**instanceDomain**|String|副本集域名|
|**dBName**|String|默认库名|
|**accountName**|String|默认用户名|
|**instancePort**|String|副本集访问端口|
|**instanceStatus**|String|实例状态.RUNNING：运行, ERROR：错误 ,BUILDING：创建中, DELETING：删除中, RESTORING：恢复中, RESIZING：变配中|
|**backupRetentionPeriod**|Integer|自动备份保留时间|
|**createTime**|String|创建时间|
|**preferredBackupWindow**|String|自动备份时间，如：00:00-02:00，表示0点到2点进行数据库自动备份|
|**preferredmaintenanceWindow**|String|系统维护时间，如：00:00-02:00，表示0点到2点进行系统维护|
|**charge**|[Charge](describeinstances#charge)|计费信息|
|**isSetSecurityIps**|Boolean|是否设置白名单，true：已设置，false：未设置|
|**tags**|[Tag[]](describeinstances#tag)|标签|
|**mongos**|[Mongos[]](describeinstances#mongos)|mongos信息|
|**configserver**|[Configserver[]](describeinstances#configserver)|configserver信息|
|**shard**|[Shard[]](describeinstances#shard)|shard信息|
### <div id="shard">Shard</div>
|名称|类型|描述|
|---|---|---|
|**shardNodeId**|String|shard节点ID|
|**shardNodeStatus**|String|shard节点状态|
|**shardNodeName**|String|shard节点名称，shad-N|
|**shardNodeType**|String|shard节点规格代码|
|**shardNodeStorageGB**|Integer|shard节点存储空间|
|**shardNodeAzId**|String|shard节点所在地域|
|**shardNodeCPU**|Integer|shard节点的CPU|
|**shardNodeMemoryGB**|Integer|shard节点的Memory|
### <div id="configserver">Configserver</div>
|名称|类型|描述|
|---|---|---|
|**configserverNodeId**|String|configserver节点ID|
|**configserverNodeStatus**|String|configserver节点状态|
|**configserverNodeName**|String|configserver节点名称，configserver|
|**configserverNodeType**|String|configserver节点规格代码|
|**configserverNodeAzId**|String|configserver节点所在地域|
|**configserverNodeCPU**|Integer|configserver节点的CPU|
|**configserverNodeMemoryGB**|Integer|configserver节点的Memory|
### <div id="mongos">Mongos</div>
|名称|类型|描述|
|---|---|---|
|**mongosNodeId**|String|mongos节点ID|
|**mongosNodeStatus**|String|mongos节点状态|
|**mongosNodeName**|String|mongos节点名称，mongos-N|
|**mongosNodeType**|String|mongos节点规格代码|
|**mongosNodeDomain**|String|mongos节点域名|
|**mongosNodePort**|String|mongos节点端口|
|**mongosNodeAzId**|String|mongos节点所在地域|
|**mongosNodeCPU**|Integer|mongos节点的CPU|
|**mongosNodeMemoryGB**|Integer|mongos节点的Memory|
### <div id="tag">Tag</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|Tag键|
|**value**|String|Tag值|
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
