# createRefreshTask


## 描述
创建刷新预热任务

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/task


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**taskType**|String|True| |刷新预热类型,(url:url刷新,dir:目录刷新,prefetch:预热)，中国境外/全球加速域名暂不支持预热功能|
|**urls**|String[]|True| | |


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createrefreshtask#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**errorCount**|Integer|失败任务的个数|
|**taskId**|String|任务的id|
|**includeOversea**|Boolean|预热时urls中是否包含全球或海外域名，默认为false，境外不支持预热|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
