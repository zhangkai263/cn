# deleteKeypair


## 描述

删除密钥。

详细操作说明请参考帮助文档：[删除密钥](https://docs.jdcloud.com/cn/virtual-machines/delete-keypair)

## 接口说明
- 密钥删除后，使用该密钥的实例仍可正常使用与之匹配的本地私钥登录，且密钥仍会显示在实例详情中。
- 密钥删除后，与之关联的实例模板将变为不可用，并且与该实例模板关联的高可用组也会变为不可用。


## 请求方式
DELETE

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/keypairs/{keyName}

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**keyName**|String|是|test|密钥名称。|

## 请求参数
无


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
DELETE

```
/v1/regions/cn-north-1/keypairs/my-test
```



## 返回示例
```
{
    "requestId": "aeb6716d70a99a8f1c5abc35eddb1830"
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**404**|NOT_FOUND|Keypair 'xx' not found|密钥不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
