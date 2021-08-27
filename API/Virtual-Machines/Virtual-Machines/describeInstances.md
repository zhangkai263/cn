# describeInstances


## 描述

查询一台或多台云主机实例的详细信息。

详细操作说明请参考帮助文档：[查找实例](https://docs.jdcloud.com/cn/virtual-machines/search-instance)

## 接口说明
- 使用 `filters` 过滤器进行条件筛选，每个 `filter` 之间的关系为逻辑与（AND）的关系。
- 如果使用子帐号查询，只会查询到该子帐号有权限的云主机实例。关于资源权限请参考 [IAM概述](https://docs.jdcloud.com/cn/iam/product-overview)。
- 单次查询最大可查询100条云主机实例数据。
- 尽量一次调用接口查询多条数据，不建议使用该批量查询接口一次查询一条数据，如果使用不当导致查询过于密集，可能导致网关触发限流。
- 由于该接口为 `GET` 方式请求，最终参数会转换为 `URL` 上的参数，但是 `HTTP` 协议下的 `GET` 请求参数长度是有大小限制的，使用者需要注意参数超长的问题。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|否|1|页码；默认为1。|
|**pageSize**|Integer|否|20|分页大小；<br>默认为20；取值范围[10, 100]。|
|**filters**|[Filter[]](#filter)|否| |<b>filters 中支持使用以下关键字进行过滤</b><br>`instanceId`: 云主机ID，精确匹配，支持多个<br>`privateIpAddress`: 云主机挂载的网卡内网主IP地址，模糊匹配，支持多个<br>`az`: 可用区，精确匹配，支持多个<br>`vpcId`: 私有网络ID，精确匹配，支持多个<br>`status`: 云主机状态，精确匹配，支持多个，参考 [云主机状态](https://docs.jdcloud.com/virtual-machines/api/vm_status)<br>`name`: 云主机名称，模糊匹配，支持单个<br>`imageId`: 镜像ID，精确匹配，支持多个<br>`networkInterfaceId`: 弹性网卡ID，精确匹配，支持多个<br>`subnetId`: 子网ID，精确匹配，支持多个<br>`agId`: 使用可用组id，支持单个<br>`faultDomain`: 错误域，支持多个<br>`dedicatedHostId`: 专有宿主机ID，精确匹配，支持多个<br>`dedicatedPoolId`: 专有宿主机池ID，精确匹配，支持多个<br>`instanceType`: 实例规格，精确匹配，支持多个，可通过查询 [DescribeInstanceTypes](https://docs.jdcloud.com/virtual-machines/api/describeinstancetypes) 接口获得实例规格<br>`elasticIpAddress`: 公网IP地址，精确匹配，支持单个。该条件会将公网IP转换成 `networkInterfaceId` 进行查询，所以与 `networkInterfaceId` 为或者的关系。<br>|

### <div id="Filter">Filter</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**name**|String|是| |过滤条件的名称|
|**operator**|String|否| |过滤条件的操作符，默认eq|
|**values**|String[]|是| |过滤条件的值|

## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](#user-content-16)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="user-content-16">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**instances**|[Instance[]](#user-content-1)| |云主机实例列表。|
|**totalCount**|Number| |本次查询可匹配到的总记录数，使用者需要结合 `pageNumber` 和 `pageSize` 计算是否可以继续分页。|

### <div id="user-content-1">Instance</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**instanceId**|String|i-eumm****d6|云主机ID。|
|**instanceName**|String|test|云主机名称。|
|**hostname**|String| |云主机hostname。|
|**instanceType**|String|g.n2.medium|实例规格。|
|**vpcId**|String|vpc-z9r3****p8|主网卡所属VPC的ID。|
|**subnetId**|String|subnet-c2p3****9o|主网卡所属子网的ID。|
|**privateIpAddress**|String|10.0.0.3 |主网卡主内网IP地址。|
|**elasticIpId**|String|fip-z1z1****ja|主网卡主IP绑定弹性IP的ID。|
|**elasticIpAddress**|String| |主网卡主IP绑定弹性IP的地址。|
|**status**|String|running|云主机状态，参考 [云主机状态](https://docs.jdcloud.com/virtual-machines/api/vm_status)。|
|**description**|String| |云主机描述。|
|**imageId**|String|img-m5s0****29|云主机使用的镜像ID。|
|**systemDisk**|[InstanceDiskAttachment](#user-content-2)| |系统盘配置。|
|**dataDisks**|[InstanceDiskAttachment[]](#user-content-2)| |数据盘配置列表。|
|**primaryNetworkInterface**|[InstanceNetworkInterfaceAttachment](#user-content-3)| |主网卡主IP关联的弹性公网IP配置。|
|**secondaryNetworkInterfaces**|[InstanceNetworkInterfaceAttachment[]](#user-content-3)| |辅助网卡配置列表。|
|**launchTime**|String|2020-11-11 12:22:56|云主机实例的创建时间。|
|**az**|String|cn-north-1b|云主机所在可用区。|
|**keyNames**|String[]| key123|云主机使用的密钥对名称。|
|**charge**|[Charge](#user-content-4)| |云主机的计费信息。|
|**ag**|[Ag](#user-content-7)| |云主机关联的高可用组，如果创建云主机使用了高可用组，此处可展示高可用组名称。|
|**faultDomain**|String|2|高可用组中的故障域。|
|**tags**|[Tag[]](#user-content-5)| |Tag信息。|
|**chargeOnStopped**|String|keepCharging|停机不计费模式。可能值：<br>`keepCharging`：关机后继续计费。<br>`stopCharging`：关机后停止计费。<br>|
|**policies**|[Policy[]](#user-content-6)| |任务策略，关联了自动任务策略时可获取相应信息。|

### <div id="user-content-6">Policy</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**policyId**|String|policy-g65r****o2|自动任务策略ID。|
|**policyType**|String|AutoImage|自动任务策略类型，当前只支持 `AutoImage` 即自动镜像策略。|

### <div id="user-content-5">Tag</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**key**|String|环境|标签key。长度不能超过127字符，不能以 `jrn:` 或 `jdc-` 开头，仅支持中文、大/小写英文、数字及如下符号：`\_.,:\/=+-@`。|
|**value**|String|测试|标签value。长度不能超过255字符，仅支持中文、大/小写英文、数字及如下符号：`\_.,:\/=+-@`。|

### <div id="user-content-7">Ag</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**name**|String| ag-123|高可用组名称。|
|**id**|String|ag-81qq****pn|高可用组ID。|

### <div id="user-content-4">Charge</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**chargeMode**|String| postpaid_by_duration|计费模式。<br>可能值：<br>`postpaid_by_duration`：按配置（后付费）<br>`prepaid_by_duration`：包年包月（预付费）<br>`postpaid_by_usage`：按用量（后付费）<br>仅弹性公网IP计费模式可能出现`postpaid_by_usage`|
|**chargeStatus**|String|normal |费用支付状态。可能值：<br>`normal`：正常<br>`overdue`：已到期<br>`arrear`：已欠费|
|**chargeStartTime**|String|2020-11-11 12:22:56 |计费开始时间。遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ。|
|**chargeExpiredTime**|String| |到期时间。预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ，后付费资源此字段内容为空。|
|**chargeRetireTime**|String| |预期释放时间。到期/欠费后资源的预期释放时间，预付费/后付费资源均有此值，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ。|

### <div id="user-content-3">InstanceNetworkInterfaceAttachment</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**deviceIndex**|Integer|1|网卡设备Index。<br>对于主网卡默认Index为1。<br>|
|**autoDelete**|Boolean|true|是否随实例一起删除。可能值：<br>`true`：随实例删除。<br>`false`：不随实例删除。<br>|
|**networkInterface**|[InstanceNetworkInterface](#user-content-8)| |网卡设备详细配置。|

### <div id="user-content-8">InstanceNetworkInterface</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**networkInterfaceId**|String|port-n2h7****se|弹性网卡ID。|
|**macAddress**|String| fa:16:3e:a8:a4:xx|弹性网卡MAC地址。|
|**vpcId**|String|vpc-z9r3****p8|弹性网卡所属VPC的ID。|
|**subnetId**|String|subnet-c2p3****9o|子网ID。|
|**securityGroups**|[SecurityGroupSimple[]](#user-content-9)| | |
|**sanityCheck**|Integer| |参数已弃用。|
|**primaryIp**|[NetworkInterfacePrivateIp](#user-content-10)| |网卡主IP配置。|
|**secondaryIps**|[NetworkInterfacePrivateIp[]](#user-content-10)| |网卡辅IP地址列表。|

### <div id="user-content-10">NetworkInterfacePrivateIp</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**privateIpAddress**|String| 127.0.0.1|私有IP的IPV4地址。|
|**elasticIpId**|String| fip-z1z1****ja|弹性IP实例ID。|
|**elasticIpAddress**|String|116.111.11.1 |弹性IP实例地址。|

### <div id="user-content-9">SecurityGroupSimple</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**groupId**|String|sg-p2d1****ya|安全组ID。|
|**groupName**|String| 默认安全组|安全组名称。|

### <div id="user-content-2">InstanceDiskAttachment</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**diskCategory**|String|cloud|磁盘类型。<br>**系统盘**：可能值：`local`：本地系统盘， `cloud` ：云盘系统盘。<br>**数据盘**：可能值：`local` ：本地数据盘， `cloud` ：云盘数据盘。<br>|
|**autoDelete**|Boolean|true|是否随实例一起删除，即删除实例时是否自动删除此磁盘。<br>`true`：随实例删除。<br>`false`：不随实例删除。<br>|
|**localDisk**|[LocalDisk](#user-content-12)| |本地磁盘配置，对应 `diskCategory=local`。|
|**cloudDisk**|[Disk](#user-content-11)| |云硬盘配置，对应 `diskCategory=cloud`。|
|**deviceName**|String|vdb|磁盘逻辑挂载点。<br>**系统盘**：默认为vda。<br>**数据盘**：可能值：`[vdb~vdbm]`。<br>|
|**status**|String|attached|磁盘挂载状态。<br>可能值：`attaching、detaching、attached、detached、error_attach、error_detach`。|

### <div id="user-content-11">Disk</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**diskId**|String|disk123 |云硬盘ID。|
|**az**|String|cn-north-1c |云硬盘所属AZ。|
|**name**|String|test1 |云硬盘名称，只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符。|
|**description**|String| |云硬盘描述，允许输入UTF-8编码下的全部字符，不超过256字符。|
|**diskType**|String| ssd.gp1|云硬盘类型，可能值：` ssd.gp1、ssd.io1、hdd.std1`|
|**diskSizeGB**|Integer| 40|云硬盘大小，单位为 GiB。|
|**iops**|Integer| 2000|该云硬盘实际应用的iops值。|
|**status**|String|in-use |云硬盘状态，可能值：` creating、available、in-use、extending、restoring、deleting、deleted、error_create、error_delete、error_restore、error_extend`。|
|**snapshotId**|String| |创建该云硬盘的快照ID。|
|**multiAttachable**|Boolean| false|云盘是否支持多挂载。|
|**encrypted**|Boolean| false|云盘是否为加密盘。|
|**createTime**|String| 2021-07-19 20:32:53|创建云硬盘时间。|

### <div id="user-content-12">LocalDisk</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**diskType**|String|HDD|磁盘类型。可能值：`NVMe SSD、HDD`。|
|**diskSizeGB**|Integer|1187|磁盘大小。|


## 请求示例
GET

```
/v1/regions/cn-north-1/instances?pageNumber=1&pageSize=10&filters.1.name=instanceId&filters.1.values.1=i-eumm****d6&filters.1.values.2=i-y5nh****9w
```



## 返回示例
```
{
    "requestId": "e822b1613bde0dac45596cf756e9c37b", 
    "result": {
        "instances": [
            {
                "az": "cn-north-1c", 
                "charge": {
                    "chargeMode": "postpaid_by_duration", 
                    "chargeStartTime": "2021-07-19T12:33:17Z", 
                    "chargeStatus": "normal"
                }, 
                "chargeOnStopped": "keepCharging", 
                "description": "", 
                "hostName": "test1", 
                "imageId": "img-m5s0****29", 
                "instanceId": "i-eumm****d6", 
                "instanceName": "test1", 
                "instanceType": "g.n2.large", 
                "launchTime": "2021-07-19 20:33:17", 
                "primaryNetworkInterface": {
                    "autoDelete": true, 
                    "deviceIndex": 1, 
                    "networkInterface": {
                        "macAddress": "fa:16:3e:a8:a4:3a", 
                        "networkInterfaceId": "port-n2h7****se", 
                        "primaryIp": {
                            "privateIpAddress": "127.0.0.1"
                        }, 
                        "securityGroups": [
                            {
                                "groupId": "sg-p2d1****ya", 
                                "groupName": "test1"
                            }
                        ], 
                        "subnetId": "subnet-c2p3****9o", 
                        "vpcId": "vpc-z9r3****p8"
                    }
                }, 
                "privateIpAddress": "127.0.0.1", 
                "status": "stopped", 
                "subnetId": "subnet-c2p3****9o", 
                "systemDisk": {
                    "autoDelete": true, 
                    "cloudDisk": {
                        "az": "cn-north-1c", 
                        "createTime": "2021-07-19 20:32:53", 
                        "diskId": "vol-u8r2****c1", 
                        "diskSizeGB": 40, 
                        "diskType": "ssd.gp1", 
                        "encrypt": false, 
                        "encrypted": false, 
                        "iops": 2000, 
                        "multiAttachable": false, 
                        "name": "test1", 
                        "status": "in-use"
                    }, 
                    "deviceName": "vda", 
                    "diskCategory": "cloud", 
                    "status": "attached"
                }, 
                "vpcId": "vpc-z9r3****p8"
            }, 
            {
                "az": "cn-north-1a", 
                "charge": {
                    "chargeMode": "postpaid_by_duration", 
                    "chargeStartTime": "2021-04-16T02:08:26Z", 
                    "chargeStatus": "normal"
                }, 
                "chargeOnStopped": "keepCharging", 
                "dataDisks": [
                    {
                        "autoDelete": true, 
                        "deviceName": "vdb", 
                        "diskCategory": "local", 
                        "localDisk": {
                            "diskSizeGB": 894, 
                            "diskType": "SSD"
                        }, 
                        "status": "attached"
                    }, 
                    {
                        "autoDelete": true, 
                        "deviceName": "vdc", 
                        "diskCategory": "local", 
                        "localDisk": {
                            "diskSizeGB": 894, 
                            "diskType": "SSD"
                        }, 
                        "status": "attached"
                    }
                ], 
                "description": "", 
                "elasticIpAddress": "111.111.111.111", 
                "elasticIpId": "fip-z1z1****ja", 
                "hostName": "test2", 
                "imageId": "img-m5s0****29", 
                "instanceId": "i-y5nh****9w", 
                "instanceName": "test2", 
                "instanceType": "p.n1p40.7xlarge", 
                "launchTime": "2021-04-16 10:08:26", 
                "primaryNetworkInterface": {
                    "autoDelete": true, 
                    "deviceIndex": 1, 
                    "networkInterface": {
                        "macAddress": "fa:16:3e:36:a1:cd", 
                        "networkInterfaceId": "port-n2h7****se", 
                        "primaryIp": {
                            "elasticIpAddress": "111.111.111.111", 
                            "elasticIpId": "fip-z1z1****ja", 
                            "privateIpAddress": "127.0.0.2"
                        }, 
                        "securityGroups": [
                            {
                                "groupId": "sg-p2d1****ya", 
                                "groupName": "Linux安全组开放22端口"
                            }
                        ], 
                        "subnetId": "subnet-c2p3****9o", 
                        "vpcId": "vpc-z9r3****p8"
                    }
                }, 
                "privateIpAddress": "127.0.0.2", 
                "status": "running", 
                "subnetId": "subnet-c2p3****9o", 
                "systemDisk": {
                    "autoDelete": true, 
                    "cloudDisk": {
                        "az": "cn-north-1a", 
                        "createTime": "2021-04-16 10:08:01", 
                        "diskId": "vol-u8r2****c1", 
                        "diskSizeGB": 40, 
                        "diskType": "ssd.gp1", 
                        "encrypt": false, 
                        "encrypted": false, 
                        "iops": 2000, 
                        "multiAttachable": false, 
                        "name": "test2", 
                        "status": "in-use"
                    }, 
                    "deviceName": "vda", 
                    "diskCategory": "cloud", 
                    "status": "attached"
                }, 
                "vpcId": "vpc-z9r3****p8"
            }
        ], 
        "totalCount": 2
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|OUT_OF_RANGE|PageSize out of range|分页大小超出规定范围。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
