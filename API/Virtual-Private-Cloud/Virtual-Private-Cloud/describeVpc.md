# describeVpc


## 描述
查询虚拟网络信息详情

## 请求方式
GET

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/vpcs/{vpcId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**vpcId**|String|True| |Vpc ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#user-content-result)|返回结果|
|**requestId**|String|请求ID|

### <div id="user-content-result">Result</div>
|名称|类型|描述|
|---|---|---|
|**vpc**|[Vpc](#user-content-vpc)|Vpc资源信息|
### <div id="user-content-vpc">Vpc</div>
|名称|类型|描述|
|---|---|---|
|**vpcId**|String|Vpc的Id|
|**addressPrefix**|String|如果为空，则不限制网段，如果不为空，10.0.0.0/8、172.16.0.0/12和192.168.0.0/16及它们包含的子网，且子网掩码长度为16-28之间|
|**description**|String|VPC 描述，取值范围：1~120个字符|
|**vpcName**|String|私有网络名称，取值范围：1-60个中文、英文大小写的字母、数字和下划线分隔符|
|**aclIds**|String[]|同一vpc下的acl id 列表|
|**routeTableIds**|String[]| |
|**subnets**|[Subnet[]](#user-content-subnet)|私有网络包含的子网列表|
|**createdTime**|String|vpc创建时间|
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
|**400**|invalid parameter|
|**401**|Authentication failed|

## 请求示例
调用方法、签名算法及公共请求参数请参考 [京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。

GET
```

/v1/regions/{regionId}/vpcs/vpc-s5e3eqf9pk

```

## 返回示例
```
{
    "requestId": "d2d2d82e-fc96-4bd2-8df6-e69f14953c1d", 
    "result": {
        "vpc": {
            "aclIds": [], 
            "addressPrefix": "", 
            "createdTime": "2021-08-06T13:22:45Z", 
            "description": "openapi-test", 
            "routeTableIds": [
                "rtb-jxeyqi4z58"
            ], 
            "subnets": [], 
            "vpcId": "vpc-s5e3eqf9pk", 
            "vpcName": "cheney_test"
        }
    }
}
```
