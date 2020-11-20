# describePublishDomains


## 描述
查询全部推流域名

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/liveDomain:publishDomains


## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**publishDomainList**|String[]|推流域名列表|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
