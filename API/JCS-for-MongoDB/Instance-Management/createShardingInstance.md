# createShardingInstance


## 描述
创建分片集群

## 请求方式
POST

## 请求地址
https://mongodb.jdcloud-api.com/v1/regions/{regionId}/shardingInstances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**shardingInstanceSpec**|[ShardingDBInstanceSpec](createshardinginstance#shardingdbinstancespec)|True| |实例规格|
|**chargeSpec**|[ChargeSpec](createshardinginstance#chargespec)|False| |付费方式|

### <div id="chargespec">ChargeSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**chargeMode**|String|False|postpaid_by_duration|计费模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration.请参阅具体产品线帮助文档确认该产品线支持的计费类型|
|**chargeUnit**|String|False| |预付费计费单位，预付费必填，当chargeMode为prepaid_by_duration时有效，取值为：month、year，默认为month|
|**chargeDuration**|Integer|False| |预付费计费时长，预付费必填，当chargeMode取值为prepaid_by_duration时有效。当chargeUnit为month时取值为：1~9，当chargeUnit为year时取值为：1、2、3|
|**autoRenew**|Boolean|False| |True=：OPEN——开通自动续费、False=CLOSE—— 不开通自动续费，默认为CLOSE|
|**buyScenario**|String|False| |产品线统一活动凭证JSON字符串，需要BASE64编码，目前要求编码前格式为 {"activity":{"activityType":必填字段, "activityIdentifier":必填字段}}|
### <div id="shardingdbinstancespec">ShardingDBInstanceSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceName**|String|False| |实例名称，名称只支持中文、数字、大小写字母及英文下划线“_”及中划线“-”，2-32个字符。|
|**engine**|String|False| |数据库类型，默认为MongoDB。|
|**engineVersion**|String|False| |数据库版本，支持：3.4, 3.6；默认为3.6。|
|**mongosNodeType**|String|True| |mongos节点规格代码，必填。|
|**mongosNodeNumber**|Integer|False| |mongos节点数量，支持2-32个，必填。|
|**configserverNodeType**|String|False| |configserve节点规格代码，默认为mongo.m1.small。|
|**shardNodeType**|String|True| |shard节点规格代码，必填。|
|**shardNodeStorageGB**|Integer|True| |shard节点存储空间，单位GB，取值10-1000,10的倍数，必填。|
|**shardNodeNumber**|Integer|True| |mongos节点数量，支持2-32个，必填。|
|**multiAZ**|Boolean|False| |是否选择多可用区部署，默认为否。|
|**mongosAzId**|String[]|True| |必填。单可用区部署，填写1个可用区；多可用区部署，依次填写每个mongos所在可用区，数量与mognos节点数量一致。|
|**shardAzId**|String[]|True| |必填。单可用区部署，填写1个可用区；多可用区部署，需填写3个可用区，依次为副本集的primary、secondary、hidden所在的可用区，将应用到分片集群的shard节点和configserver节点的全部副本集。|
|**vpcId**|String|True| |VPCID|
|**subnetId**|String|True| |子网ID|
|**password**|String|False| |密码，必须包含且只支持字母及数字，不少于8字符不超过16字符。|
|**originDBInstanceId**|String|False| |基于一个实例的备份创建新实例，如填写则restoreTime也需要填写。|
|**restoreTime**|String|False| |用户指定备份保留周期内的任意时间点，如2011-06-11T16:00:00Z。|
|**instanceStorageType**|String|False| |存储类型，支持：LOCAL_SSD -本地盘SSD、EBS_SSD -云盘；默认值为：LOCAL_SSD。|
|**storageEncrypted**|Boolean|False| |实例数据加密(存储类型为云硬盘才支持数据加密). false：不加密; true：加密. 缺省为false.|
|**serviceId**|String|False| |跨域服务ID，用于跨地域按时间点创建实例|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createshardinginstance#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String| |
|**orderId**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
