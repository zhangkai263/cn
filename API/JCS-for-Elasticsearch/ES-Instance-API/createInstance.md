# createInstance


## 描述
创建一个指定配置的es实例

## 请求方式
POST

## 请求地址
https://es.jdcloud-api.com/v1/regions/{regionId}/instances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |regionId|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instance**|[InstanceSpec](createinstance#instancespec)|True| |es实例的相关配置|
|**charge**|[ChargeSpec](createinstance#chargespec)|False| |计费信息的相关配置，es只有prepaid_by_duration和postpaid_by_duration 2种计费模式|

### <div id="chargespec">ChargeSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**chargeMode**|String|False|postpaid_by_duration|计费模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration.请参阅具体产品线帮助文档确认该产品线支持的计费类型|
|**chargeUnit**|String|False| |预付费计费单位，预付费必填，当chargeMode为prepaid_by_duration时有效，取值为：month、year，默认为month|
|**chargeDuration**|Integer|False| |预付费计费时长，预付费必填，当chargeMode取值为prepaid_by_duration时有效。当chargeUnit为month时取值为：1~9，当chargeUnit为year时取值为：1、2、3|
|**autoRenew**|Boolean|False| |True=：OPEN——开通自动续费、False=CLOSE—— 不开通自动续费，默认为CLOSE|
|**buyScenario**|String|False| |产品线统一活动凭证JSON字符串，需要BASE64编码，目前要求编码前格式为 {"activity":{"activityType":必填字段, "activityIdentifier":必填字段}}|
### <div id="instancespec">InstanceSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**vpcId**|String|True| |私有网络vpcId|
|**subnetId**|String|True| |子网subnetId|
|**instanceVersion**|String|True| |es版本，当前支持5.6.9和6.5.4|
|**instanceName**|String|True| |es集群名称，不可为空，只支持大小写字母、数字、英文下划线或者中划线，以字母开头且不能超过32位|
|**azId**|String|True| |可用区，各可用区编码请参考：https://docs.jdcloud.com/cn/jcs-for-elasticsearch/restrictions|
|**instanceClass**|[InstanceClassSpec](createinstance#instanceclassspec)|True| |规格配置，规格代码请参考：https://docs.jdcloud.com/cn/jcs-for-elasticsearch/specifications|
|**dedicatedMaster**|Boolean|False| |是否包含专用主节点，默认false|
|**coordinating**|Boolean|False| |是否包含协调节点，默认false|
|**autoSnapshot**|[AutoSnapshot](createinstance#autosnapshot)|False| |自动快照设置。|
|**authConfig**|[AuthConfig](createinstance#authconfig)|False| |es数据面身份验证设置信息|
### <div id="authconfig">AuthConfig</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**authEnabled**|Boolean|False| |是否开启身份验证；true为开启，false为不开启|
|**username**|String|False| |用户名. 不可为空，支持数字、大小写字母、英文下划线“_”及中划线“-”，且不超过32字符|
|**password**|String|False| |密码. 需6到128位，包括大小写字母、数字、和特殊字符（[a-z],[A-Z],[0-9]和[-!@#$%&^*+=_:;,.?]）|
### <div id="autosnapshot">AutoSnapshot</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**open**|Boolean|False| |是否开启自动备份；true为开启，false为不开启|
|**hour**|Integer|False| |自动备份时间，0时区的小时数，[0，24）范围内取整|
### <div id="instanceclassspec">InstanceClassSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**nodeClass**|String|False| |data节点规格代码，详细规格请参考：https://docs.jdcloud.com/cn/jcs-for-elasticsearch/specifications|
|**nodeDiskGB**|Integer|False| |data节点存储大小，单位GB。单点存储规格范围20-4000GB，只允许输入整数且步长为10GB，|
|**nodeCount**|Integer|False| |data节点数量，各region和可用区的节点数量规格限制不完全相同，详情请参考：https://docs.jdcloud.com/cn/jcs-for-elasticsearch/restrictions|
|**masterClass**|String|False| |master节点规格代码，与data节点规格代码一致。|
|**masterDiskGB**|Integer|False| |master节点存储大小，固定为20GB，不可调整|
|**masterCount**|Integer|False| |master节点数量，固定为3，不可调整|
|**coordinatingClass**|String|False| |coordinating节点规格代码，与data节点规格代码一致。|
|**coordinatingDiskGB**|Integer|False| |coordinating节点存储大小，固定为20GB，不可调整|
|**coordinatingCount**|Integer|False| |coordinating节点数量，各region和可用区的节点数量规格限制不完全相同，详情请参考：https://docs.jdcloud.com/cn/jcs-for-elasticsearch/restrictions|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createinstance#result)|结果|
|**requestId**|String|本次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**orderNum**|String|订单编号|
|**instanceId**|String|es实例编号|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|INVALID_ARGUMENT|
