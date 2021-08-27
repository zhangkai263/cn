# describeKeypairs


## 描述

批量查询密钥对。

详细操作说明请参考帮助文档：[密钥概述](https://docs.jdcloud.com/cn/virtual-machines/keypair-overview)

## 接口说明
- 使用 `filters` 过滤器进行条件筛选，每个 `filter` 之间的关系为逻辑与（AND）的关系。
- 单次查询最大可查询100条密钥数据。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/keypairs

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|否|1|页码，默认为1。|
|**pageSize**|Integer|否|20|分页大小，取值范围：`[10, 100]`。默认为20。|
|**filters**|[Filter[]](describeKeypairs#user-content-filter)|否| |<b>filters 中支持使用以下关键字进行过滤</b><br>`keyNames`: 密钥对名称，精确匹配，支持多个<br>|

### <div id="user-content-filter">Filter</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**name**|String|是| |过滤条件的名称|
|**operator**|String|否| |过滤条件的操作符，默认eq|
|**values**|String[]|是| |过滤条件的值|

## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](describeKeypairs#user-content-result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="user-content-result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**keypairs**|[Keypair[]](describeKeypairs#user-content-keypair)| |密钥信息列表。|
|**totalCount**|Number|2 |本次查询可匹配到的总记录数，使用者需要结合 `pageNumber` 和 `pageSize` 计算是否可以继续分页。|

### <div id="user-content-keypair">Keypair</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**keyName**|String|ssh-test |密钥对名称。|
|**keyFingerprint**|String|25:65:12:a8:2a:d9:03:79:a4:59:2a:ce:fe:00:aa:7f|密钥对的指纹，根据 `RFC4716` 定义的公钥指纹格式，采用 `MD5` 信息摘要算法。|
|**createTime**|String|2020-11-11 12:22:56|密钥创建时间。|
|**instanceIds**|String[]| ["i-eumm\*\*\*\*d6", "i-y5nh\*\*\*\*9w"] |绑定了此密钥的云主机ID列表。|


## 请求示例
GET

```
/v1/regions/cn-north-1/keypairs?filters.1.name=keyNames&filters.1.values.1=test
```



## 返回示例
```
{
    "requestId": "aeb6716d70a99a8f1c5abc35eddb1830", 
    "result": {
        "keypairs": [
            {
                "createTime": "2020-12-08 16:52:02", 
                "instanceIds": [
                    "i-eumm****d6", 
                    "i-y5nh****9w", 
                    "i-1dbu****79"
                ], 
                "keyFingerprint": "25:65:12:a9:2a:d8:03:97:a4:59:ce:3c:fe:00:aa:7c", 
                "keyName": "test"
            }
        ], 
        "totalCount": 1
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
