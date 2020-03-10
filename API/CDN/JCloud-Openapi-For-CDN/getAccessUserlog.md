# getAccessUserlog


## 描述
获取日志下载链接地址数据

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/accessUserlog:download


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |日志上传域名，如：www.a.com|
|**interval**|String|False| |日志粒度：fiveMin(五分钟粒度),hour(一小时粒度),day(一天粒度)|
|**logType**|String|False| |日志类型：gz,log,zip|
|**startTime**|String|False| |日志开始时间，格式：yyyy-MM-dd HH:ss，如：2019-04-12 00:00|
|**endTime**|String|False| |日志结束时间，格式：yyyy-MM-dd HH:ss 如：2019-04-12 00:05|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**logs**|[AccessUserlogModel[]](#accessuserlogmodel)| |
### <div id="AccessUserlogModel">AccessUserlogModel</div>
|名称|类型|描述|
|---|---|---|
|**domain**|String|域名|
|**urls**|[DomainlogModel[]](#domainlogmodel)|日志对象|
### <div id="DomainlogModel">DomainlogModel</div>
|名称|类型|描述|
|---|---|---|
|**logUrl**|String|日志下载url地址|
|**logSize**|Long|日志大小，单位：Byte（字节）|
|**startTime**|String|日志开始时间，格式：yyyy-MM-dd HH:ss，如：2019-04-12 00:00|
|**endTime**|String|日志结束时间，格式：yyyy-MM-dd HH:ss 如：2019-04-12 00:05|
|**lastModified**|String|日志修改时间，UTC时间|
|**md5**|String|MD5值|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
