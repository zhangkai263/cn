# createNetworkAcl


## 描述
创建networkAcl接口

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/networkAcls/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**vpcId**|String|True| |私有网络id|
|**networkAclName**|String|True| |networkAcl名称|
|**description**|String|False| |描述,允许输入UTF-8编码下的全部字符，不超过256字符|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#user-content-result)|返回结果|
|**requestId**|String|请求ID|

### <div id="user-content-result">Result</div>
|名称|类型|描述|
|---|---|---|
|**networkAclId**|String|networkAcl ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Invalid parameter|
|**404**|Not found|
|**429**|Quota exceeded|
|**500**|Internal error|

## 请求示例

调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。

- 请求示例：在id为vpc-1gnm8i9qi4的vpc下创建名称为“测试acl”的acl

POST
```
  /v1/regions/cn-north-1/networkAcls/
    {
           "networkAclName":"测试acl",
           "description":"",
           "vpcId":"vpc-1gnm8i9qi4",
           "dataCenter":"cn-north-1"
       }

```

## 返回示例
```
{
    "requestId": "c45prpfm8evoi69tqtc9nf6o1p2knsmw", 
    "result": {
        "networkAclId": "acl-axne0jaf0z"
    }
}
```
