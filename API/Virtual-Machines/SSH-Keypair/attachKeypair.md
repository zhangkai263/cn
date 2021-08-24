# attachKeypair


## 描述

为云主机实例绑定密钥。

详细操作说明请参考帮助文档：[绑定密钥](https://docs.jdcloud.com/cn/virtual-machines/bind-keypair)

## 接口说明
- 只支持为 linux 云主机实例绑定密钥。
- 每台云主机实例只支持绑定一个密钥。如果云主机绑定的密钥被删除了，那么该云主机还可以再次绑定密钥。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/keypairs/{keyName}:attach

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**keyName**|String|是|test|密钥名称。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**instanceIds**|String[]|是|\[&quot;i-eumm****d6&quot;,&quot;i-y5nh****9w&quot;]|要绑定的云主机Id列表。|
|**passWordAuth**|String|是|True|绑定密钥后，根据此参数决定是否允许使用密码登录。可选范围：<br>`yes`：允许SSH密码登录。<br>`no`：禁止SSH密码登录。<br>|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**successInstanceId**|String[]| |请求成功的云主机实例ID列表。|
|**failInstanceId**|String[]| |请求失败的云主机实例ID列表。|


## 请求示例
POST

```
/v1/regions/cn-north-1/keypairs/my-test:attach
{
    "instanceIds": ["i-eumm****d6", "i-y5nh****9w"],
    "passwordAuth": "yes"
}
```



## 返回示例
```
{
    "requestId": "e93c391d985886bba6c242270f4d91d8", 
    "result": {
        "failInstanceId": [
            "i-y5nh****9w"
        ], 
        "successInstanceId": [
            "i-eumm****d6"
        ]
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|FAILED_PRECONDITION|Windows OS doesn't support attach keypair.|windows实例不支持绑定密钥。|
|**400**|FAILED_PRECONDITION|Invalid instance status xx|云主机状态异常。|
|**400**|FAILED_PRECONDITION|Already attached key pair. instance id xx|该云主机已经绑定了密钥。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**404**|NOT_FOUND|Keypair 'xx' not found|密钥不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
