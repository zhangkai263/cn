# createSubnet


## 描述
创建子网

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/subnets/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**vpcId**|String|True| |子网所属vpc的Id|
|**subnetName**|String|True| |子网名称,只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符。|
|**addressPrefix**|String|True| |子网网段，vpc内子网网段不能重叠，cidr的取值范围：10.0.0.0/8、172.16.0.0/12和192.168.0.0/16及它们包含的子网，且子网掩码长度为16-28之间，如果vpc含有cidr，则必须为vpc所在cidr的子网|
|**routeTableId**|String|False| |子网关联的路由表Id, 默认为vpc的默认路由表,子网关联路由表需检查路由表中已绑定的子网与本子网类型是否一致（一致标准为：或者都为标准子网，或者都为相同边缘可用区的边缘子网）|
|**description**|String|False| |子网描述信息,允许输入UTF-8编码下的全部字符，不超过256字符。|
|**subnetType**|String|False| |子网类型，取值：standard(标准子网)，edge(边缘子网)|
|**az**|String|False| |子网可用区，边缘子网必须指定可用区|
|**ipMaskLen**|Integer|False| |子网内预留网段掩码长度，此网段IP地址按照单个申请，子网内其余部分IP地址以网段形式分配。此参数非必选，缺省值为0，代表子网内所有IP地址都按照单个申请|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**subnetId**|String|子网ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**409**|Parameter conflict|
|**429**|Quota exceeded|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
POST
```
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例: 在id为vpc-xmgvmynmkj的虚拟网络下创建子网
  https://vpc.jdcloud-api.com/v1/regions/{regionId}/subnets/
  body:{
        "vpcId" :"vpc-xmgvmynmkj",
        "subnetName":"cidr",
        "addressPrefix":"10.0.16.0/25",
        "routeTableId":"rtb-lx7zvnztvz"
       }
x-jdcloud-response-example: |
{
    "requestId": "1ee0403b-a40d-48ea-8a34-1bd771b1a6d0",
    "result": {
        "subnetId": "subnet-ypjmvip7tj"
    }
}

```
