# getSoftwareInfo


## 描述
获取对应版本的软件清单信息

## 请求方式
GET

## 请求地址
https://jmr.jdcloud-api.com/v1/regions/{regionId}/softwareInfo

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**version**|String|True| |JMR软件版本号|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getsoftwareinfo#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|String|对应的软件清单信息|
|**status**|Boolean| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
