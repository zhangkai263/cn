# describeInstanceStandards


## 描述
查询实例基准信息

## 请求方式
GET

## 请求地址
https://edgesecurity.jdcloud-api.com/v1/describeInstanceStandards


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|False| |开始时间|
|**endTime**|String|False| |结束时间|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**iesServiceType**|Integer|智能边缘安全服务类型(0->未开通 1->开通未购买 2->线上购买 3->线下购买)|
|**cdnServiceType**|Integer|cdn服务类型(0->未开通 1->线上用户 2->线下用户)|
|**billType**|Integer|账单类型(0->智能边缘安全账单 1->其他账单)|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
