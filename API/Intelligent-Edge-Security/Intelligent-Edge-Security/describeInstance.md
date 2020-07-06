# describeInstance


## 描述
查询实例信息

## 请求方式
GET

## 请求地址
https://edgesecurity.jdcloud-api.com/v1/describeInstance


## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|Long|实例ID|
|**resourceId**|String|资源ID|
|**businessBandwidth**|Integer|业务加速带宽(正常业务消耗带宽，Mbps)|
|**basicBandwidth**|Integer|保底带宽(Gbps)|
|**elasticBandwidth**|Integer|弹性带宽(Gbps)|
|**businessQps**|Integer|正常业务qps|
|**peakQps**|Integer|CC防护峰值|
|**createTime**|String|创建时间|
|**expireTime**|String|到期时间|
|**chargeStatus**|Integer|计费类型(0->正常 1->欠费 2->到期)|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
