# describeImageMembers


## 描述

查询私有镜像共享给哪些京东云帐户。

详细操作说明请参考帮助文档：[共享私有镜像](https://docs.jdcloud.com/cn/virtual-machines/share-image)

## 接口说明
- 只允许查询用户的私有镜像。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images/{imageId}/members

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**imageId**|String|是|i-eumm****d6|镜像ID。|

## 请求参数
无


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](describeImageMembers#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**pins**|String[]| |京东云帐户列表。|


## 请求示例
GET

```
/v1/regions/cn-north-1/images/img-m5s0****29/members
```



## 返回示例
```
{
    "requestId": "9d854943296442c6efbd6479039bd8dd", 
    "result": {
        "pins": [
            "pin1", 
            "pin2"
        ]
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|FAILED_PRECONDITION|Can't use this image|不能操作非私有镜像。|
|**400**|FAILED_PRECONDITION|Conflict with underlay image task 'xx'|镜像正在处理其它任务，请稍后再试。|
|**404**|NOT_FOUND|Image 'xx' not found|镜像不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
