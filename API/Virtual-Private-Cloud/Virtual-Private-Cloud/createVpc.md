# createVpc


## 描述
创建私有网络

## 请求方式
POST

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/vpcs/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**vpcName**|String|True| |私有网络名称,只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符。|
|**addressPrefix**|String|False| |如果为空，则不限制网段，如果不为空，10.0.0.0/8、172.16.0.0/12和192.168.0.0/16及它们包含的子网，且子网掩码长度为16-28之间|
|**description**|String|False| |vpc描述，允许输入UTF-8编码下的全部字符，不超过256字符。|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createvpc#user-content-result)|返回结果|
|**requestId**|String|请求ID|

### <div id="user-content-result">Result</div>
|名称|类型|描述|
|---|---|---|
|**vpcId**|String|私有网络ID|

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

调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。

POST
```
/v1/regions/cn-north-1/vpcs/
  {
       "vpcName" :"cheney_test",
        "description":"openapi-test"
   }

```

## 返回示例
```
{
    "requestId": "fa965e64-0d46-4a88-87b1-2b9366a83886", 
    "result": {
        "vpcId": "vpc-nirzvoacvu"
    }
}
```
