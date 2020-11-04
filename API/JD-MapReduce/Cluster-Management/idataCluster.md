# idataCluster


## 描述
查询用户的集群列表及相关服务的一些信息

## 请求方式
GET

## 请求地址
https://jmr.jdcloud-api.com/v1/regions/{regionId}/idata

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](idatacluster#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|Object|包括集群信息列表|
|**status**|Boolean| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
