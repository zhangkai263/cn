# describeNetworkInterface


## 描述
查询弹性网卡信息详情

## 请求方式
GET

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkInterfaces/{networkInterfaceId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**networkInterfaceId**|String|True| |networkInterface ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**networkInterface**|[NetworkInterface](#networkinterface)|networkInterface资源信息|
### <div id="NetworkInterface">NetworkInterface</div>
|名称|类型|描述|
|---|---|---|
|**networkInterfaceName**|String|弹性网卡名称|
|**networkInterfaceId**|String|弹性网卡ID|
|**az**|String|可用区名称，该参数无效，不建议使用|
|**role**|String|网卡角色，取值范围：Primary（主网卡）、Secondary（辅助网卡）|
|**macAddress**|String|以太网地址|
|**vpcId**|String|虚拟网络ID|
|**subnetId**|String|子网ID|
|**networkSecurityGroupIds**|String[]|安全组ID列表|
|**sanityCheck**|Integer|源和目标IP地址校验，取值为0或者1|
|**primaryIp**|[NetworkInterfacePrivateIp](#networkinterfaceprivateip)|网卡主IP|
|**secondaryIps**|[NetworkInterfacePrivateIp[]](#networkinterfaceprivateip)|网卡附属IP列表|
|**secondaryCidrs**|String[]|网卡附属IP网段|
|**instanceType**|String|关联实例类型，取值范围：vm|
|**instanceId**|String|关联实例ID|
|**instanceOwnerId**|String|实例所属的账号|
|**deviceIndex**|Integer|网卡在实例上的设备索引号，取值范围：[0,8]，0：辅助网卡未绑定设备，1：主网卡，2-8：辅助网卡已绑定设备|
|**description**|String|网卡描述信息|
|**attachmentStatus**|String|弹性网卡绑定实例状态，attached（已绑定）、detached（未绑定）|
|**networkInterfaceStatus**|String|弹性网卡可用状态，enabled（启用）、disabled（停用）|
|**createdTime**|String|弹性网卡创建时间|
### <div id="NetworkInterfacePrivateIp">NetworkInterfacePrivateIp</div>
|名称|类型|描述|
|---|---|---|
|**privateIpAddress**|String|私有IP的IPV4地址|
|**elasticIpId**|String|弹性IP实例ID|
|**elasticIpAddress**|String|弹性IP实例地址|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|invalid parameter|
|**401**|Authentication failed|

## 请求示例

调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。

- 请求示例: 查询ID为port-zhi9fqz09q的弹性网卡


GET
```
 /v1/regions/cn-north-1/networkInterfaces/port-zhi9fqz09q

```

## 返回示例
```
{
    "requestId": "d725672d-6048-4d6e-9f11-3d145c7026db", 
    "result": {
        "networkInterface": {
            "attachmentStatus": "attached", 
            "az": "cn-south-1b", 
            "createdTime": "2021-07-30T13:43:51Z", 
            "description": "", 
            "deviceIndex": 1, 
            "instanceId": "i-1kch0awxq9", 
            "instanceOwnerId": "boss-01", 
            "instanceType": "compute", 
            "macAddress": "fa:16:3e:ab:be:10", 
            "networkInterfaceId": "port-zhi9fqz09q", 
            "networkInterfaceName": "", 
            "networkInterfaceStatus": "enabled", 
            "networkSecurityGroupIds": [
                "sg-0yb6oqxxc0"
            ], 
            "primaryIp": {
                "elasticIpAddress": "114.67.178.43", 
                "elasticIpId": "fip-svj6u4mw6t", 
                "privateIpAddress": "10.0.0.3"
            }, 
            "role": "Primary", 
            "sanityCheck": 0, 
            "secondaryCidrs": [], 
            "secondaryIps": [], 
            "subnetId": "subnet-wobzpv8cng", 
            "vpcId": "vpc-c10xjyfiaf"
        }
    }
}
```
