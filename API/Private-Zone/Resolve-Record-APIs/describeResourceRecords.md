# describeResourceRecords


## 描述
查询解析记录


## 请求方式
GET

## 请求地址
https://privatezone.jdcloud-api.com/v1/regions/{regionId}/zone/{zoneId}/resourceRecords

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**zoneId**|String|True| |zone id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**hostRecord**|String|False| |主机记录左右模糊查询|
|**pageSize**|Integer|False| |页容量，默认10，取值范围(1 - 100)|
|**pageNumber**|Integer|False| |页序号，默认1，不能小于1|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result[]](#result)| |
|**requestId**|String|请求ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[DescribeResourceRecordsRes[]](#describeresourcerecordsres)|zone列表|
|**currentCount**|Integer|当前页记录数量|
|**totalCount**|Integer|总记录数量|
|**totalPage**|Integer|总页数|
### <div id="DescribeResourceRecordsRes">DescribeResourceRecordsRes</div>
|名称|类型|描述|
|---|---|---|
|**id**|Long|解析记录id|
|**hostRecord**|String|主机记录|
|**hostValue**|String|主机记录值|
|**recordType**|String|解析类型，目前支持类型 A AAAA CNAME TXT CAA SRV MX PTR|
|**ttl**|Integer|TTL值|
|**priority**|Integer|优先级，只存在于MX, SRV解析记录类型|
|**port**|Integer|端口，只存在于SRV解析记录类型|
|**weight**|Integer|解析记录的权重|
|**createTime**|String|创建时间, UTC时间格式，例如2017-11-10T23:00:00Z|
|**updateTime**|String| |
|**status**|String|解析状态 START->正在解析 STOP->停止解析|

## 返回码
|返回码|描述|
|---|---|
|**200**|查询成功|
