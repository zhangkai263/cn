# describeSubnet


## 描述
查询子网信息详情

## 请求方式
GET

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/subnets/{subnetId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**subnetId**|String|True| |Subnet ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeSubnet#user-content-result)|返回结果|
|**requestId**|String|请求ID|

### <div id="user-content-result">Result</div>
|名称|类型|描述|
|---|---|---|
|**subnet**|[Subnet](describeSubnet#user-content-subnet)|子网资源信息|
### <div id="user-content-subnet">Subnet</div>
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
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例：查询子网ID是subnet-5g97rio80i的子网信息

GET
```
  /v1/regions/cn-north-1/subnets/subnet-5g97rio80i

```

## 返回示例
```
{
    "requestId": "f92d1397-92a2-483e-91c0-5d2986707fcf", 
    "result": {
        "subnet": {
            "aclId": "", 
            "addressPrefix": "10.0.0.0/20", 
            "availableIpCount": 4035, 
            "az": "sh", 
            "createdTime": "2020-08-14T06:07:36Z", 
            "description": "", 
            "endIp": "10.0.15.254", 
            "ipMaskLen": 0, 
            "routeTableId": "rtb-lx7zvnztvz", 
            "startIp": "10.0.0.3", 
            "subnetId": "subnet-5g97rio80i", 
            "subnetName": "0814", 
            "subnetType": "standard", 
            "vpcId": "vpc-xmgvmynmkj"
        }
    }
}
```
