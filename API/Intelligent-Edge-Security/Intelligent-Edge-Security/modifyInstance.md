# modifyInstance


## 描述
修改实例信息

## 请求方式
POST

## 请求地址
https://edgesecurity.jdcloud-api.com/v1/modifyInstance


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**businessBandwidth**|Integer|True| |业务加速带宽(正常业务消耗带宽，Mbps)|
|**basicBandwidth**|Integer|True| |保底带宽(Gbps)|
|**elasticBandwidth**|Integer|True| |弹性带宽(Gbps)|
|**businessQps**|Integer|True| |正常业务qps|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**buyId**|String|购买ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
