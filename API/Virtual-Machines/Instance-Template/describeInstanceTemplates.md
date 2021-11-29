# describeInstanceTemplates


## 描述

查询实例模板列表。

详细操作说明请参考帮助文档：[实例模板](https://docs.jdcloud.com/cn/virtual-machines/instance-template-overview)

## 接口说明
- 使用 `filters` 过滤器进行条件筛选，每个 `filter` 之间的关系为逻辑与（AND）的关系。
- 单次查询最大可查询100条实例模板数据。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instanceTemplates

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|否|1|页码；默认为1。|
|**pageSize**|Integer|否|20|分页大小。取值范围：`[10, 100]`。默认为20。|
|**filters**|[Filter[]](describeInstanceTemplates#user-content-filter)|否| |<b>filters 中支持使用以下关键字进行过滤</b><br>`name`: 实例模板名称，模糊匹配，支持多个<br>`instanceTemplateId`: 实例模板ID，精确匹配，支持多个<br>|

### <div id="user-content-filter">Filter</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**name**|String|是|name |过滤条件的名称。|
|**operator**|String|否| eq|过滤条件的操作符，默认eq。|
|**values**|String[]|是|name-test |过滤条件的值。|

## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](describeInstanceTemplates#user-content-result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="user-content-result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**instanceTemplates**|[InstanceTemplate[]](describeInstanceTemplates#user-content-instancetemplate)| |实例模板列表。|
|**totalCount**|Number|12 |本次查询可匹配到的总记录数，使用者需要结合 `pageNumber` 和 `pageSize` 计算是否可以继续分页。|

### <div id="user-content-instancetemplate">InstanceTemplate</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**id**|String|it-u3o8****yy|实例模板ID|
|**name**|String|name-test |实例模板名称。|
|**description**|String| |实例模板描述。|
|**instanceTemplateData**|[InstanceTemplateData](describeInstanceTemplates#user-content-instancetemplatedata)| |实例模板详细配置。|
|**ags**|[Ag[]](describeInstanceTemplates#user-content-ag)| |关联的高可用组(ag)信息。|
|**createdTime**|String|2020-11-11 12:22:56|实例模板创建时间。|

### <div id="user-content-ag">Ag</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**name**|String|agName-0 |高可用组名称。|
|**id**|String|ag-81qq****pn|高可用组ID。|

### <div id="user-content-instancetemplatedata">InstanceTemplateData</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**instanceType**|String|g.n2.xlarge|实例规格。|
|**vpcId**|String|vpc-z9r3****p8|实例主网卡所属VPC的ID。|
|**imageId**|String|img-m5s0****29|实例使用的镜像ID。|
|**includePassword**|Boolean|true|实例模板中是否包含自定义密码。<br>`true`：包含自定义密码，`false`：未包含自定义密码。|
|**systemDisk**|[InstanceTemplateDiskAttachment](describeInstanceTemplates#user-content-instancetemplatediskattachment)| |系统盘配置。|
|**dataDisks**|[InstanceTemplateDiskAttachment[]](describeInstanceTemplates#user-content-instancetemplatediskattachment)| |数据盘配置列表。|
|**primaryNetworkInterface**|[InstanceTemplateNetworkInterfaceAttachment](describeInstanceTemplates#user-content-instancetemplatenetworkinterfaceattachment)| |主网卡配置。|
|**elasticIp**|[InstanceTemplateElasticIp](describeInstanceTemplates#user-content-instancetemplateelasticip)| |主网卡主IP关联的弹性公网IP配置。|
|**keyNames**|String[]| key-124|云主机使用的密钥对名称。|
|**chargeOnStopped**|String|keepCharging|停机不计费模式。该参数仅对按配置计费且系统盘为云硬盘的实例生效，并且不是专有宿主机中的实例。<br>`keepCharging`：停机后继续计费。<br>`stopCharging`：停机后停止计费。<br>|
|**autoImagePolicyId**|String|pol-xgsc****7e|自动镜像任务策略ID。|
|**passwordAuth**|String|true|是否允许SSH密码登录。<br>`yes`：允许SSH密码登录。<br>`no`：禁止SSH密码登录。<br>仅在指定密钥时此参数有效，指定此参数后密码即使输入也将被忽略，同时会在系统内禁用SSH密码登录。<br>|
|**imageInherit**|String| |是否使用镜像中的登录凭证，不再指定密码或密钥。<br>`yes`：使用镜像登录凭证。<br>`no`：不使用镜像登录凭证。<br>仅使用私有或共享镜像时此参数有效。若指定`imageInherit=yes`则指定的密码或密钥将无效。|

### <div id="user-content-instancetemplateelasticip">InstanceTemplateElasticIp</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**bandwidthMbps**|Integer|20|弹性公网IP的带宽上限，单位：Mbps。|
|**provider**|String|BGP|弹性公网IP线路。中心可用区目前仅提供`BGP`类型IP。|
|**chargeMode**|String|bandwith|弹性公网IP计费模式。可能值：<br>`bandwith`：按带宽计费 <br>`flow`：按流量计费。|

### <div id="user-content-instancetemplatenetworkinterfaceattachment">InstanceTemplateNetworkInterfaceAttachment</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**deviceIndex**|Integer|1|网卡设备Index。<br>对于主网卡默认Index为1。<br>|
|**autoDelete**|Boolean|true|是否随实例一起删除。可能值：<br>`true`：随实例删除。<br>`false`：不随实例删除。<br>|
|**networkInterface**|[InstanceTemplateNetworkInterface](describeInstanceTemplates#user-content-instancetemplatenetworkinterface)| |网卡设备详细配置。|

### <div id="user-content-instancetemplatenetworkinterface">InstanceTemplateNetworkInterface</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**subnetId**|String|subnet-c2p3****9o|子网ID。|
|**securityGroups**|String[]| ["sg-p2d1****ya"]|安全组ID列表。|
|**sanityCheck**|Integer| |此参数已弃用，无须关注。|

### <div id="user-content-instancetemplatediskattachment">InstanceTemplateDiskAttachment</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**diskCategory**|String|cloud|磁盘类型。<br>**系统盘**：可能值：`local`：本地系统盘， `cloud` ：云盘系统盘。<br>**数据盘**：可能值：`local` ：本地数据盘， `cloud` ：云盘数据盘。<br>|
|**autoDelete**|Boolean|true|是否随实例一起删除，即删除实例时是否自动删除此磁盘。<br>`true`：随实例删除。<br>`false`：不随实例删除。<br>|
|**instanceTemplateDisk**|[InstanceTemplateDisk](describeInstanceTemplates#user-content-instancetemplatedisk)| |云硬盘配置。|
|**deviceName**|String|vdb|磁盘逻辑挂载点。<br>**系统盘**：默认为vda。<br>**数据盘**：可能值：`[vdb~vdbm]`。<br>|
|**noDevice**|Boolean| |排除设备，使用此参数 `noDevice` 配合 `deviceName` 一起使用。<br>创建实例模板的场景下：使用此参数可以排除镜像中的数据盘。<br>示例：如果镜像中除系统盘还包含一块或多块数据盘，期望仅使用镜像中的部分磁盘，配置`deviceName=vdb`、`noDevice=true`，则表示在使用实例模板创建实例时，忽略镜像中数据盘vdb配置，不创建磁盘。|

### <div id="user-content-instancetemplatedisk">InstanceTemplateDisk</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**diskType**|String|ssd.io1|云硬盘类型。各类型介绍请参见[云硬盘类型](https://docs.jdcloud.com/cn/cloud-disk-service/specifications)。<br>可能值：<br>`ssd.gp1`：通用型SSD<br>`ssd.io1`：性能型SSD<br>`hdd.std1`：容量型HDD|
|**diskSizeGB**|Integer|50|云硬盘容量，单位为 GiB。|
|**snapshotId**|String|snapshot-h8u1****36|创建云硬盘的快照ID。|
|**policyId**|String| |云硬盘自动快照策略ID。|
|**encrypt**|Boolean| |云硬盘是否加密。<br>可能值：<br>`true`：加密<br>`false`：不加密|
|**iops**|Integer|1000|云硬盘的最大iops。|


## 请求示例
GET

```
/v1/regions/cn-north-1/instanceTemplates?pageNumber=1&pageSize=10&filters.1.name=instanceTemplateId&filters.1.values.1=it-u3o8****yy&filters.1.values.2=it-x8s0****43
```



## 返回示例
```
{
    "requestId": "d42471c562b3815823257a977c0e1647", 
    "result": {
        "instanceTemplates": [
            {
                "ags": [
                    {
                        "id": "ag-81qq****pn", 
                        "name": "testag"
                    }
                ], 
                "createdTime": "2021-01-10 21:19:58", 
                "description": "", 
                "id": "it-u3o8****yy", 
                "instanceTemplateData": {
                    "chargeOnStopped": "keepCharging", 
                    "imageId": "img-m5s0****29", 
                    "imageInherit": "no", 
                    "includePassword": false, 
                    "instanceType": "g.n2.medium", 
                    "passwordAuth": "yes", 
                    "primaryNetworkInterface": {
                        "autoDelete": true, 
                        "deviceIndex": null, 
                        "networkInterface": {
                            "ipv6AddressCount": 0, 
                            "sanityCheck": 1, 
                            "securityGroups": [
                                "sg-p2d1****ya"
                            ], 
                            "subnetId": "subnet-c2p3****9o"
                        }
                    }, 
                    "systemDisk": {
                        "autoDelete": true, 
                        "diskCategory": "cloud", 
                        "instanceTemplateDisk": {
                            "diskSizeGB": 40, 
                            "diskType": "ssd.gp1", 
                            "encrypt": false
                        }
                    }, 
                    "vpcId": "vpc-z9r3****p8"
                }, 
                "name": "test1"
            }, 
            {
                "createdTime": "2020-10-20 21:18:13", 
                "id": "it-x8s0****43", 
                "instanceTemplateData": {
                    "chargeOnStopped": "stopCharging", 
                    "imageId": "img-m5s0****29", 
                    "includePassword": false, 
                    "instanceType": "g.n2.medium", 
                    "primaryNetworkInterface": {
                        "autoDelete": true, 
                        "networkInterface": {
                            "securityGroups": [
                                "sg-p2d1****ya"
                            ], 
                            "subnetId": "subnet-c2p3****9o"
                        }
                    }, 
                    "systemDisk": {
                        "autoDelete": true, 
                        "diskCategory": "cloud", 
                        "instanceTemplateDisk": {
                            "diskSizeGB": 40, 
                            "diskType": "ssd.io1", 
                            "encrypt": false, 
                            "iops": 1200
                        }
                    }, 
                    "vpcId": "vpc-z9r3****p8"
                }, 
                "name": "test2"
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
