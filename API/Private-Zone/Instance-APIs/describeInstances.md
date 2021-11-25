# describeInstances


## 描述
查询实例信息


## 请求方式
GET

## 请求地址
https://privatezone.jdcloud-api.com/v1/regions/{regionId}/instances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageSize**|Integer|False| |页容量，默认10，取值范围(1 - 100)|
|**pageNumber**|Integer|False| |页序号，默认1，不能小于1|
|**instanceId**|String|False| |实例ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result[]](#result)| |
|**requestId**|String|此次请求的ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[DescribeInstancesRes[]](#describeinstancesres)|套餐实例信息|
|**currentCount**|Integer|当前页记录数量|
|**totalCount**|Integer|总记录数量|
|**totalPage**|Integer|总页数|
### <div id="DescribeInstancesRes">DescribeInstancesRes</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|实例ID|
|**instanceName**|String|实例名称|
|**packType**|String|套餐类型|
|**zoneNum**|Integer|zone数量|
|**bindVpcNum**|Integer|绑定vpc数量|
|**zoneLevel**|Integer|zone级别|
|**rrNum**|Integer|解析记录数量|
|**domainLevel**|Integer|域名等级|
|**rrAuthorExport**|Boolean|导出解析记录权限|
|**duration**|Integer|购买时长|
|**durationUnit**|String|时长单位（YEAR->年）|
|**expireTime**|String|到期时间, UTC时间格式，例如2017-11-10T23:00:00Z|
|**chargeStutas**|String|计费状态（NORMAL->正常 EXPIRE->到期 DELETED->已删除）|
|**usedZoneNum**|Integer|已使用zone数量|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
