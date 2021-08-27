# describeImageConstraints


## 描述

查询单个镜像的实例规格限制。

详细操作说明请参考帮助文档：[实例使用限制](https://docs.jdcloud.com/cn/virtual-machines/restrictions)

## 接口说明
- 该接口与批量查询镜像的实例规格限制返回的信息一致。
- 通过此接口可以查询镜像的实例规格限制信息。
- 只有官方镜像、第三方镜像有实例规格的限制，用户的私有镜像没有此限制。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images/{imageId}/constraints

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**imageId**|String|是|i-eumm****d6|镜像ID。|

## 请求参数
无


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](describeImageConstraints#user-content-result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="user-content-result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**imageConstraints**|[ImageConstraint](describeImageConstraints#user-content-imageconstraint)| |镜像限制信息。|

### <div id="user-content-imageconstraint">ImageConstraint</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**imageId**|String|img-m5s0****29|镜像ID。|
|**imageInstanceTypeConstraint**|[ImageInstanceTypeConstraint](describeImageConstraints#user-content-imageinstancetypeconstraint)| |镜像对实例规格的约束信息。|

### <div id="user-content-imageinstancetypeconstraint">ImageInstanceTypeConstraint</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**constraintsType**|String|excludes|对实例规格的限制类型。可能值：<br>`excludes`：不支持的实例规格，当前只支持 excludes 一种类型。<br>`includes`：支持的实例规格。<br>|
|**instanceTypes**|String[]|\[&quot;g.n4.xlarge&quot;,&quot;m.n4.xlarge&quot;\]|实例规格列表。|


## 请求示例
GET

```
/v1/regions/cn-north-1/images/img-m5s0****29/constraints
```



## 返回示例
```
{
    "requestId": "46162394283a49252c51f0e94e9e2e25", 
    "result": {
        "imageConstraints": {
            "imageId": "img-m5s0****29", 
            "imageInstanceTypeConstraint": {
                "constraintsType": "excludes", 
                "instanceTypes": [
                    "p.c1p40g.3large", 
                    "p.c1p40g.xlarge", 
                    "m.n4.2xlarge", 
                    "g.n2.metal"
                ]
            }
        }
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**404**|NOT_FOUND|Image 'xx' not found|镜像不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
