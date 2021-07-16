# setMonitor


## 描述
设置源站监控信息，中国境外/全球加速时暂不支持源站监控相关配置

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/domain/{domain}/monitor

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**cycle**|Integer|True| |探测周期，取值1和5，单位为分钟|
|**monitorPath**|String|True| |探测路径|
|**httpRequestHeader**|Object|False| |http请求头|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](setmonitor#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**monitorId**|Long| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
