# setFollowSourceProtocol


## 描述
设置协议跟随回源

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/domain/{domain}/followSourceProtocol

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**status**|String|True| |开关取值[on,off]|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](setfollowsourceprotocol#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|String|任务id|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|