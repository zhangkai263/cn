# downloadExcel


## 描述
统计表格下载

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/console:download


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**domain**|String|False| |需要查询的域名, 必须为用户pin下有权限的域名|
|**area**|String|False| | |
|**isp**|String|False| | |
|**sortField**|String|False| |排序字段,oripvPercent即为oripv,oriflowPercent即为oriflow|
|**sortRule**|String|False| |排序规则,默认desc|
|**downLoadType**|String|False| |下载类型|
|**domainType**|String|False| |业务类型|
|**appName**|String|False| | |
|**streamName**|String|False| | |
|**groupBy**|String|False| |分组字段,domainType代表按业务类型分组|
|**topField**|String|False| |标识所在页面|
|**withParam**|Boolean|False| |是否带参数|
|**scheme**|String|False| |查询协议，可选值:[http,https,all],传空默认返回全部协议汇总后的数据|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**url**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
