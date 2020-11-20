# describeClusters


## 描述
查询用户集群的列表


## 请求方式
GET

## 请求地址
https://jmr.jdcloud-api.com/v1/regions/{regionId}/clusters

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dataCenter**|String|False| |地域|
|**status**|String|False| |集群状态，CREATING，RUNNING，RELEASED，FAILED等|
|**clusterName**|String|False| |集群名称|
|**orderBy**|String|False| |排序，比如 id desc|
|**pageNum**|Integer|False| |页数，默认为1|
|**pageSize**|Integer|False| |每页数目，默认为10|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeclusters#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**totalNum**|Integer|集群总的数目|
|**clusters**|[ClusterListNode[]](describeclusters#clusterlistnode)| |
|**status**|Boolean| |
### <div id="clusterlistnode">ClusterListNode</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|集群ID|
|**name**|String|集群名称|
|**dataCenter**|String|集群所属地域|
|**recordId**|Integer|集群ID|
|**monitorResourceId**|String|监控ID|
|**status**|String|集群状态|
|**errorMessage**|String|错误信息|
|**createTime**|String|集群创建时间|
|**payType**|String|集群收费类型|
|**duration**|String|集群运行时间|
|**outerIp**|String|公网Ip|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
