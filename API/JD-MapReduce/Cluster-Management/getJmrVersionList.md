# getJmrVersionList


## 描述
查询JMR的版本信息

## 请求方式
GET

## 请求地址
https://jmr.jdcloud-api.com/v1/regions/{regionId}/jmrVersions

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getjmrversionlist#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|String[]|目前的JMR版本列表|
|**status**|Boolean| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
