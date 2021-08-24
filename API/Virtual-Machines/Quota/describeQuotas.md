# describeQuotas


## 描述

查询资源配额。

## 接口说明
- 调用该接口可查询 `云主机`、`镜像`、`密钥`、`实例模板`、`镜像共享` 的配额。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/quotas

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**filters**|[Filter[]](#filter)|否| |<b>filters 中支持使用以下关键字进行过滤</b><br>`resourceTypes`: 资源类型，支持多个，可选范围：`instance、keypair、image、instanceTemplate、imageShare`<br>|
|**imageId**|String|否| |私有镜像Id。<br>查询镜像共享 `imageShare` 的配额时，此参数必传。<br>|

### <div id="Filter">Filter</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**name**|String|是| |过滤条件的名称|
|**operator**|String|否| |过滤条件的操作符，默认eq|
|**values**|String[]|是| |过滤条件的值|

## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**quotas**|[Quota[]](#quota)| |配额列表。|
### <div id="Quota">Quota</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**resourceType**|String|instance|资源类型。支持范围：<br>`instance`：云主机。<br>`keypair`：密钥。<br>`image`：镜像。<br>`instanceTemplate`：实例模板。<br>`imageShare`：共享镜像。<br>|
|**limit**|Integer|20|配额上限。|
|**used**|Integer|12|已用配额。|


## 请求示例
GET

```
/v1/regions/cn-north-1/quotas?filters.1.name=resourceTypes&filters.1.values.1=image&filters.1.values.2=instance
```



## 返回示例
```
{
    "requestId": "24601a12fb963f8943c3bb7f048f4772", 
    "result": {
        "quotas": [
            {
                "limit": 20, 
                "resourceType": "image", 
                "used": 5
            }, 
            {
                "limit": 20, 
                "resourceType": "instance", 
                "used": 6
            }
        ]
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|INVALID_ARGUMENT|Parameter ImageId missing|查询镜像共享配额时需要指定imageId。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
