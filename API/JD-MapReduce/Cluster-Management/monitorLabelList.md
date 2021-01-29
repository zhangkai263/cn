# monitorLabelList


## 描述
查询JMR的监控模板信息

## 请求方式
POST

## 请求地址
https://jmr.jdcloud-api.com/v1/regions/{regionId}/monitorLabelList/{clusterId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**clusterId**|String|True| |集群ID|
|**regionId**|String|True| |地域ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](monitorlabellist#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[MonitorLabelDetail[]](monitorlabellist#monitorlabeldetail)|JMR的监控模板信息|
|**status**|Boolean| |
### <div id="monitorlabeldetail">MonitorLabelDetail</div>
|名称|类型|描述|
|---|---|---|
|**label**|String|监控显示名称|
|**serviceCode**|String|监控项目代码|
|**resourceId**|String|监控项目资源代码|
|**filters**|String[]|过滤条件的值|
|**nodes**|[MonitorLabelNodeDetail[]](monitorlabellist#monitorlabelnodedetail)|监控项目子节点信息|
### <div id="monitorlabelnodedetail">MonitorLabelNodeDetail</div>
|名称|类型|描述|
|---|---|---|
|**label**|String|监控显示名称|
|**serviceCode**|String|监控项目代码|
|**resourceId**|String|监控项目资源代码|
|**filters**|String[]|过滤条件的值|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
