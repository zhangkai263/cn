# importKeypair


## 描述

导入密钥。

与创建密钥不同的是，导入的密钥是由用户生成的。生成之后将公钥部分导入到京东云。

详细操作说明请参考帮助文档：[创建密钥](https://docs.jdcloud.com/cn/virtual-machines/create-keypair)

## 接口说明
- 调用该接口导入由其他工具生成的密钥对的公钥部分。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/keypairs:import

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**keyName**|String|是|test|密钥对名称，需要全局唯一。<br>只允许数字、大小写字母、下划线“_”及中划线“-”，不超过32个字符。<br>|
|**publicKey**|String|是| |密钥对的公钥部分。|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**keyName**|String|my-test|密钥对名称。|
|**keyFingerprint**|String|cd:d0:ac:97:1f:ad:39:60:15:1e:33:a4:f1:05:50:61|密钥对的指纹，根据 `RFC4716` 定义的公钥指纹格式，采用 `MD5` 信息摘要算法。|


## 请求示例
POST

```
/v1/regions/cn-north-1/keypairs:import
{
    "keyName": "my-test" ,
    "publicKey": "ssh-rsa AAAAB3NyRbvr1b7BhSx...........ETeiCO2a6BroENVaf Generated-by-Jvirt"
}
```



## 返回示例
```
{
    "requestId": "56b5b5d93947d7cc7bfa324cf9db1a37", 
    "result": {
        "keyFingerprint": "cd:d0:1a:97:3f:ac:39:60:15:1e:13:a4:b1:05:50:61", 
        "keyName": "my-test"
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|FAILED_PRECONDITION|KeyName 'xx' already in use|密钥名称已被使用。|
|**400**|FAILED_PRECONDITION|Malformed PublicKey xx|公钥格式错误。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
