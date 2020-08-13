# createInstance


## 描述
创建一个指定配置的kafka实例

## 请求方式
POST

## 请求地址
https://kafka.jdcloud-api.com/v1/regions/{regionId}/instances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |regionId|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instance**|[InstanceSpec](createinstance#instancespec)|True| |kafka实例的相关配置|
|**charge**|[ChargeSpec](createinstance#chargespec)|False| |计费信息的相关配置，只有prepaid_by_duration和postpaid_by_duration 2种计费模式|

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
|**instanceVersion**|String|True| |kafka版本，当前支持1.0.2|
|**instanceName**|String|True| |kafka集群名称，不可为空，只支持大小写字母、数字、英文下划线或者中划线，以字母开头且不能超过32位|
|**azId**|String[]|True| |azId|
|**instanceClassSpec**|[InstanceClassSpec[]](createinstance#instanceclassspec)|True| |集群规格配置|
|**extension**|[ReqExtension](createinstance#reqextension)|False| |扩展配置|
### <div id="reqextension">ReqExtension</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**msgRetain**|Integer|False| |消息保留时长|
### <div id="instanceclassspec">InstanceClassSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**role**|String|True| |角色|
|**nodeClassCode**|String|False| |节点规格代码|
|**nodeCount**|Integer|False| |节点个数|
|**nodeDiskType**|String|False| |磁盘类型|
|**nodeDiskGB**|Integer|False| |单节点磁盘大小单位GB|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createinstance#result)|结果|
|**requestId**|String|本次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|kafka实例编号|
|**buyId**|String|buyId|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|INVALID_ARGUMENT|
