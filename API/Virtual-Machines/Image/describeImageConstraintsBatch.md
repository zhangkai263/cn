# describeImageConstraintsBatch


## 描述

批量查询镜像的实例规格限制。

详细操作说明请参考帮助文档：[镜像概述](https://docs.jdcloud.com/cn/virtual-machines/image-overview)

## 接口说明
- 通过此接口可以查询镜像的实例规格限制信息。
- 只有官方镜像、第三方镜像有实例规格的限制，用户的私有镜像没有此限制。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/imageConstraints

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**ids**|String[]|否|\[&quot;img-m5s0****29&quot;,&quot;img-m5s0****30&quot;]|要查询的镜像ID列表，只支持官方镜像和第三方镜像。|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**imageConstraints**|[ImageConstraint[]](#imageconstraint)| |镜像限制信息列表。|
### <div id="ImageConstraint">ImageConstraint</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**imageId**|String|img-m5s0****29|镜像ID。|
|**imageInstanceTypeConstraint**|[ImageInstanceTypeConstraint](#imageinstancetypeconstraint)| |镜像对实例规格的约束信息。|
### <div id="ImageInstanceTypeConstraint">ImageInstanceTypeConstraint</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**constraintsType**|String|excludes|对实例规格的限制类型。取值范围：<br>`excludes`：不支持的实例规格，当前只支持 excludes 一种数据。<br>`includes`：支持的实例规格。<br>|
|**instanceTypes**|String[]|\[&quot;g.n4.xlarge&quot;,&quot;m.n4.xlarge&quot;\]|实例规格列表。|


## 请求示例
GET

```
/v1/regions/cn-north-1/imageConstraints?ids.1=img-m5s0****29&ids.2=img-m5s0****30
```



## 返回示例
```
{
    "requestId": "af3f57cf9b84c24a5d9f4664a637797a", 
    "result": {
        "imageConstraints": [
            {
                "imageId": "img-m5s0****29", 
                "imageInstanceTypeConstraint": {
                    "constraintsType": "excludes", 
                    "instanceTypes": [
                        "s.i3f.metal", 
                        "m.n2.18xlarge", 
                        "p.c1p40m.large", 
                        "p.c1p40g.3large", 
                        "p.c1p40g.large", 
                        "g.n4.large"
                    ]
                }
            }, 
            {
                "imageId": "img-m5s0****30", 
                "imageInstanceTypeConstraint": {
                    "constraintsType": "excludes", 
                    "instanceTypes": [
                        "p.c1p40g.3large", 
                        "p.c1p40g.xlarge", 
                        "m.n4.2xlarge", 
                        "g.n4.8xlarge"
                    ]
                }
            }
        ]
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
