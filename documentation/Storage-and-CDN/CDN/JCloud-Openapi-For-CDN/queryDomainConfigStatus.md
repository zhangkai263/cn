# queryDomainConfigStatus


## 描述
查询域名配置状态

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/domain/{taskId}/status

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**taskId**|String|True| |任务ID|

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
|**taskStatus**|String|任务状态,[success:成功,failed:失败,configuring:配置中]|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
