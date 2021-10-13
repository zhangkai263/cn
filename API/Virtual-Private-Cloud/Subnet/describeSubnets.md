# describeSubnets


## 描述
查询子网列表

## 请求方式
GET

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/subnets/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1, 取值范围：[1,∞), 页码超过总页数时, 显示最后一页|
|**pageSize**|Integer|False|20|分页大小，默认为20，取值范围：[10,100]|
|**filters**|[Filter[]](#filter)|False| |subnetIds - subnet ID列表，支持多个<br>subnetNames - subnet名称列表，支持多个<br>routeTableId	- 子网关联路由表Id，支持单个<br>aclId - 子网关联acl Id，支持单个<br>vpcId - 子网所属VPC Id，支持单个<br>subnetType - 子网类型，取值：all(全部类型)，standard(标准子网)，edge(边缘子网)，默认standard ，支持单个<br>azs - 可用区，支持多个<br>|

### <div id="Filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**subnets**|[Subnet[]](#subnet)|子网资源信息列表|
|**totalCount**|Number|总数量|
### <div id="Subnet">Subnet</div>
|名称|类型|描述|
|---|---|---|
|**subnetId**|String|Subnet的Id|
|**subnetName**|String|子网名称|
|**vpcId**|String|子网所属VPC的Id|
|**addressPrefix**|String|子网网段，vpc内子网网段不能重叠，cidr的取值范围：10.0.0.0/8、172.16.0.0/12和192.168.0.0/16及它们包含的子网，且子网掩码长度为16-28之间，如果VPC含有Cidr，则必须为VPC所在Cidr的子网|
|**availableIpCount**|Number|子网可用ip数量|
|**ipMaskLen**|Integer|子网内预留网段掩码长度，此网段IP地址按照单个申请，子网内其余部分IP地址以网段形式分配。此参数非必选，缺省值为0，代表子网内所有IP地址都按照单个申请|
|**description**|String|子网描述信息|
|**routeTableId**|String|子网关联的路由表Id|
|**aclId**|String|子网关联的acl Id|
|**startIp**|String|子网的起始地址，子网第1个地位为路由器网关保留，第2个地址为dhcp服务保留|
|**endIp**|String|子网的结束地址，子网第1个地位为路由器网关保留，第2个地址为dhcp服务保留|
|**createdTime**|String|子网创建时间|
|**subnetType**|String|子网类型，取值：standard(标准子网)，edge(边缘子网)|
|**az**|String|子网可用区|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 查询虚拟网络id为vpc-xmgvmynmkj下的所有子网


  /v1/regions/cn-north-1/subnets/?filters.1.name=vpcId&filters.1.values.1=vpc-xmgvmynmkj

```

## 返回示例
```
{
    "requestId": "c60bf198-c46c-458d-bcf1-0aae9d95b6d1", 
    "result": {
        "subnets": [
            {
                "aclId": "", 
                "addressPrefix": "10.0.0.0/20", 
                "availableIpCount": 4035, 
                "az": "", 
                "createdTime": "2020-08-14T06:07:36Z", 
                "description": "", 
                "endIp": "10.0.15.254", 
                "ipMaskLen": 0, 
                "ipv6AddressPrefix": "", 
                "routeTableId": "rtb-lx7zvnztvz", 
                "startIp": "10.0.0.3", 
                "subnetId": "subnet-5g97rio80i", 
                "subnetName": "0814", 
                "subnetType": "standard", 
                "vpcId": "vpc-xmgvmynmkj"
            }
        ], 
        "totalCount": 1
    }
}
```
