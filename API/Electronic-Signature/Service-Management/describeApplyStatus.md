# describeApplyStatus


## 描述
查询服务开通状态

## 请求方式
GET

## 请求地址
https://cloudsign.jdcloud-api.com/v1/manage:applyStatus


## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pin**|String|用户pin|
|**usedCapacity**|Integer|已用存储容量|
|**status**|Integer|当前服务状态(0:正常 -1:停服)|
|**contractSaving**|Boolean|是否开启合同托管|
|**kmsKeyId**|String|签章系统所用的托管密钥|
|**applyTime**|String|申请开通服务时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT FOUND|
