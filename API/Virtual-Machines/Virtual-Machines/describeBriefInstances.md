# describeBriefInstances


## 描述

查询一台或多台云主机实例的详细信息。该接口为轻量级接口，不返回云盘、网络、计费、标签等关联信息。如果不需要关联资源属性，尽量选择使用该接口。

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
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances:describeBriefInstances

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|否| |页码。默认为1。|
|**pageSize**|Integer|否| |分页大小。<br>取值范围：`[10, 100]`，默认值：`20`。|
|**tags**|[TagFilter[]](describeBriefInstances#user-content-1)|否| |Tag筛选条件。|
|**filters**|[Filter[]](describeBriefInstances#user-content-2)|否| |<b>filters 中支持使用以下关键字进行过滤</b><br>`instanceId`: 云主机ID，精确匹配，支持多个<br>`privateIpAddress`: 云主机挂载的网卡内网主IP地址，模糊匹配，支持多个<br>`az`: 可用区，精确匹配，支持多个<br>`vpcId`: 私有网络ID，精确匹配，支持多个<br>`status`: 云主机状态，精确匹配，支持多个，参考 [云主机状态](https://docs.jdcloud.com/virtual-machines/api/vm_status)<br>`name`: 云主机名称，模糊匹配，支持单个<br>`imageId`: 镜像ID，精确匹配，支持多个<br>`networkInterfaceId`: 弹性网卡ID，精确匹配，支持多个<br>`subnetId`: 子网ID，精确匹配，支持多个<br>`agId`: 使用可用组id，支持单个<br>`faultDomain`: 错误域，支持多个<br>`dedicatedHostId`: 专有宿主机ID，精确匹配，支持多个<br>`dedicatedPoolId`: 专有宿主机池ID，精确匹配，支持多个<br>`instanceType`: 实例规格，精确匹配，支持多个，可通过查询 [DescribeInstanceTypes](https://docs.jdcloud.com/virtual-machines/api/describeinstancetypes) 接口获得实例规格<br>`elasticIpAddress`: 公网IP地址，精确匹配，支持单个。该条件会将公网IP转换成 `networkInterfaceId` 进行查询，所以与 `networkInterfaceId` 为或者的关系<br>|

### <div id="user-content-2">Filter</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**name**|String|是| name |过滤条件的名称。|
|**operator**|String|否|eq |过滤条件的操作符，默认eq。|
|**values**|String[]|是| 123|过滤条件的值。|

### <div id="user-content-1">TagFilter</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**key**|String|否|环境|标签key。|
|**values**|String[]|否|测试|标签value。|

## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](describeBriefInstances#user-content-3)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="user-content-3">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**instances**|[BriefInstance[]](describeBriefInstances#user-content-4)| |云主机实例列表。|
|**totalCount**|Number| |本次查询可匹配到的总记录数，用户需要结合 `pageNumber` 和 `pageSize` 计算是否可以继续分页。|

### <div id="user-content-4">BriefInstance</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**instanceId**|String|i-eumm****d6|云主机ID。|
|**instanceName**|String|test|云主机名称。|
|**instanceType**|String|g.n2.medium|实例规格。|
|**vpcId**|String|vpc-z9r3****p8|主网卡所属VPC的ID。|
|**subnetId**|String|subnet-c2p3****9o|主网卡所属子网的ID。|
|**privateIpAddress**|String|10.0.0.3 |主网卡主内网IP地址。|
|**status**|String|running|云主机状态，参考 [云主机状态](https://docs.jdcloud.com/virtual-machines/api/vm_status)。|
|**description**|String| |云主机描述。|
|**imageId**|String|img-m5s0****29|云主机使用的镜像ID。|
|**systemDisk**|[BriefInstanceDiskAttachment](#user-content-5)| |系统盘配置。|
|**dataDisks**|[BriefInstanceDiskAttachment[]](#user-content-5)| |数据盘配置列表。|
|**primaryNetworkInterface**|[BriefInstanceNetworkInterfaceAttachment](#user-content-6)| |主网卡配置。|
|**secondaryNetworkInterfaces**|[BriefInstanceNetworkInterfaceAttachment[]](#user-content-6)| |辅助网卡配置列表。|
|**launchTime**|String|2020-11-11 12:22:56|云主机实例的创建时间。|
|**az**|String|cn-north-1b|云主机所在可用区。|
|**keyNames**|String[]|key123 |云主机使用的密钥对名称。|
|**faultDomain**|String|2|高可用组中的故障域。|
|**chargeOnStopped**|String|keepCharging|停机不计费模式，仅云硬盘做系统盘的按配置计费实例此参数生效。<br>`keepCharging`：关机后继续计费。<br>`stopCharging`：关机后停止计费。<br>|
|**dedicatedPoolId**|String|pool-s0o8****56|云主机所属的专有宿主机池。|
|**dedicatedHostId**|String|host-h67j****p0|云主机所属的专有宿主机ID。|

### <div id="user-content-6">BriefInstanceNetworkInterfaceAttachment</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**deviceIndex**|Integer|2|网卡设备Index。创建实例时此参数无须指定且指定无效。<br>对于主网卡默认Index为1，辅助网卡自动分配。<br>|
|**autoDelete**|Boolean|true|是否随实例关联删除。|

### <div id="user-content-5">BriefInstanceDiskAttachment</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**diskCategory**|String|cloud|磁盘类型。<br>**系统盘**：取值为：`local` 本地系统盘 或 `cloud` 云盘系统盘。<br>**数据盘**：取值为：`local` 本地数据盘 或 `cloud` 云盘数据盘。<br>|
|**autoDelete**|Boolean|true|是否随实例一起删除，即删除实例时是否自动删除此磁盘。此参数仅对按配置计费的非多点挂载云硬盘生效。<br>`true`：随实例删除。<br>`false`：不随实例删除。<br>|
|**localDisk**|[LocalDisk](#user-content-7)| |本地磁盘配置，对应 `diskCategory=local`。|
|**cloudDisk**|[LightCloudDiskInfo](#user-content-8)| |云硬盘配置，对应 `diskCategory=cloud`。|
|**deviceName**|String|vdb|磁盘逻辑挂载点。<br>**系统盘**：默认为vda。<br>**数据盘**：取值范围：`[vdb~vdbm]`。<br>|
|**status**|String|attached|磁盘挂载状态。<br>可能值：`attaching、detaching、attached、detached、error_attach、error_detach`。|

### <div id="user-content-8">LightCloudDiskInfo</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**diskId**|String|vol-u8r2****c1|云硬盘ID。|
|**diskType**|String|ssd.io1|云硬盘类型。可能值：`ssd、premium-hdd、hdd.std1、ssd.gp1、ssd.io1`。|
|**diskSizeGB**|Integer|120|云硬盘大小，单位为 GiB。|

### <div id="user-content-7">LocalDisk</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**diskType**|String|ssd.gp1|磁盘类型，可能值：`ssd、premium-hdd、hdd.std1、ssd.gp1、ssd.io1`。|
|**diskSizeGB**|Integer|120|磁盘大小，单位为 GiB。|


## 请求示例
GET

```
/v1/regions/cn-north-1/instances:describeBriefInstances?pageNumber=1&pageSize=10&filters.1.name=instanceId&filters.1.values.1=i-eumm****d6&filters.1.values.2=i-y5nh****9w
```



## 返回示例
```
{
    "requestId": "fa916c239eac25d6dffcbbb7547b7aa9", 
    "result": {
        "instances": [
            {
                "az": "cn-north-1c", 
                "chargeOnStopped": "keepCharging", 
                "description": "", 
                "imageId": "img-m5s0****29", 
                "instanceId": "i-eumm****d6", 
                "instanceName": "test1", 
                "instanceType": "g.n2.large", 
                "launchTime": "2021-07-19 20:33:17", 
                "primaryNetworkInterface": {
                    "autoDelete": true, 
                    "deviceIndex": 1, 
                    "networkInterface": {
                        "networkInterfaceId": "port-n2h7****se", 
                        "primaryIp": {
                            "privateIpAddress": "127.0.0.1"
                        }
                    }
                }, 
                "privateIpAddress": "127.0.0.1", 
                "status": "stopped", 
                "subnetId": "subnet-c2p3****9o", 
                "systemDisk": {
                    "autoDelete": true, 
                    "cloudDisk": {
                        "diskId": "vol-u8r2****c1", 
                        "diskSizeGB": 40, 
                        "diskType": "ssd.gp1"
                    }, 
                    "deviceName": "vda", 
                    "diskCategory": "cloud", 
                    "status": "attached"
                }, 
                "vpcId": "vpc-z9r3****p8"
            }, 
            {
                "az": "cn-north-1a", 
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
                "imageId": "img-m5s0****29", 
                "instanceId": "i-y5nh****9w", 
                "instanceName": "test2", 
                "instanceType": "p.n1p40.7xlarge", 
                "launchTime": "2021-04-16 10:08:26", 
                "primaryNetworkInterface": {
                    "autoDelete": true, 
                    "deviceIndex": 1, 
                    "networkInterface": {
                        "networkInterfaceId": "port-n2h7****se", 
                        "primaryIp": {
                            "privateIpAddress": "127.0.0.2"
                        }
                    }
                }, 
                "privateIpAddress": "127.0.0.2", 
                "status": "running", 
                "subnetId": "subnet-c2p3****9o", 
                "systemDisk": {
                    "autoDelete": true, 
                    "cloudDisk": {
                        "diskId": "vol-u8r2****c1", 
                        "diskSizeGB": 40, 
                        "diskType": "ssd.gp1"
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
|**400**|OUT_OF_RANGE|PageSize out of range|分页大小超出范围。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
