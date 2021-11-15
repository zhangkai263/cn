# describeVpcs


## 描述
查询私有网络列表

## 请求方式
GET

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/vpcs/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1, 取值范围：[1,∞), 页码超过总页数时, 显示最后一页|
|**pageSize**|Integer|False|20|分页大小，默认为20，取值范围：[10,100]|
|**filters**|[Filter[]](#user-content-filter)|False| |vpcIds - vpc ID列表，支持多个<br>vpcNames - vpc名称列表,支持多个<br>|

### <div id="user-content-filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#user-content-result)|返回结果|
|**requestId**|String|请求ID|

### <div id="user-content-result">Result</div>
|名称|类型|描述|
|---|---|---|
|**vpcs**|[Vpc[]](#user-content-vpc)|Vpc资源信息列表|
|**totalCount**|Number|总数量|
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

## 请求示例
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。

- 请求示例: 查询私有网络列表

GET
```


/v1/regions/cn-north-1/vpc?pageNumber=1&pageSize=10

```

## 返回示例
```
{
    "requestId": "dc9549f3-3ce9-476e-98c6-5ffc39ae8695", 
    "result": {
        "totalCount": 2, 
        "vpcs": [
            {
                "aclIds": [], 
                "addressPrefix": "172.16.0.0/16", 
                "createdTime": "2021-06-16T07:47:50Z", 
                "description": "", 
                "routeTableIds": [
                    "rtb-6zujsd7d4m"
                ], 
                "subnets": [
                    {
                        "aclId": "", 
                        "addressPrefix": "172.16.0.0/20", 
                        "availableIpCount": 4089, 
                        "az": "", 
                        "createdTime": "2021-06-16T07:48:33Z", 
                        "description": "", 
                        "endIp": "172.16.15.254", 
                        "ipMaskLen": 0, 
                        "routeTableId": "rtb-6zujsd7d4m", 
                        "startIp": "172.16.0.3", 
                        "subnetId": "subnet-5rwvri0qg7", 
                        "subnetName": "lb_alpha", 
                        "subnetType": "standard", 
                        "vpcId": "vpc-sea7ctkqqf"
                    }
                ], 
                "vpcId": "vpc-sea7ctkqqf", 
                "vpcName": "lb_alpha"
            }, 
            {
                "aclIds": [], 
                "addressPrefix": "10.0.0.0/16", 
                "createdTime": "2017-08-03T11:24:17Z", 
                "description": "", 
                "routeTableIds": [
                    "rtb-soo5u56gss"
                ], 
                "subnets": [
                    {
                        "aclId": "", 
                        "addressPrefix": "10.0.1.0/24", 
                        "availableIpCount": 241, 
                        "az": "", 
                        "createdTime": "2017-08-03T11:24:49Z", 
                        "description": "", 
                        "endIp": "10.0.1.254", 
                        "ipMaskLen": 0, 
                        "routeTableId": "rtb-soo5u56gss", 
                        "startIp": "10.0.1.3", 
                        "subnetId": "subnet-nn68ho3904", 
                        "subnetName": "lb_verify", 
                        "subnetType": "standard", 
                        "vpcId": "vpc-zx1hhbrskd"
                    }
                ], 
                "vpcId": "vpc-zx1hhbrskd", 
                "vpcName": "lb_verify"
            }
        ]
    }
}
```
