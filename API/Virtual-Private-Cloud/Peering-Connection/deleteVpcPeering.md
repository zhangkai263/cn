# deleteVpcPeering


## 描述
删除VpcPeering接口

## 请求方式
DELETE

## 请求地址
https://vpc.jdcloud-api.com/v1/regions/{regionId}/vpcPeerings/{vpcPeeringId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**vpcPeeringId**|String|True| |vpcPeeringId ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|

## 请求示例
调用方法、签名算法及公共请求参数请参考[京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。
- 请求示例：删除VpcPeering
DELETE
```

/v1/regions/cn-north-1/vpcPeerings/vpcpr-qrn8hp2btw

```

## 返回示例
```
{
    "requestId": "4ffc48b6-e1ff-4ff6-8ec8-0ad4c394ecac"
}
```
