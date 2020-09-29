# releaseCluster


## 描述
释放集群


## 请求方式
POST

## 请求地址
https://jmr.jdcloud-api.com/v1/regions/{regionId}/clusters/{clusterId}:release

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**clusterId**|String|True| |集群ID|
|**regionId**|String|True| |地域ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](releasecluster#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**status**|Boolean|是否开始释放集群|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
