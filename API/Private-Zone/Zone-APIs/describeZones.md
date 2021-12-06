# describeZones


## 描述
查询私有解析zone列表


## 请求方式
GET

## 请求地址
https://privatezone.jdcloud-api.com/v1/regions/{regionId}/zones

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone**|String|False| |zone模块匹配查询|
|**instanceId**|String|False| |购买的套餐实例ID|
|**zoneId**|String|False| |根据zoneId精准查询(zone模糊查询失效)|
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
|**dataList**|[DescribeZonesRes[]](#describezonesres)|zone列表|
|**currentCount**|Integer|当前页记录数量|
|**totalCount**|Integer|总记录数量|
|**totalPage**|Integer|总页数|
### <div id="DescribeZonesRes">DescribeZonesRes</div>
|名称|类型|描述|
|---|---|---|
|**zoneId**|String|域名id|
|**zone**|String|域名|
|**zoneType**|String|域名类型 LOCAL->云内全局 PTR->反向解析zone PV->私有zone|
|**recordCount**|Integer|解析记录个数|
|**lock**|Boolean|是否锁定 true->锁定 false->未锁定|
|**retryRecurse**|Boolean|解析失败后是否进行递归解析|
|**resolveStatus**|String|解析状态 NONE->没有解析 NORMAL->正常解析 PARTIAL->部分解析 PAUSE->暂停解析|
|**createTime**|String|创建时间, UTC时间格式，例如2017-11-10T23:00:00Z|
|**bindVpc**|[DescribeBindVpcRes[]](#describebindvpcres)|绑定的vpc信息|
### <div id="DescribeBindVpcRes">DescribeBindVpcRes</div>
|名称|类型|描述|
|---|---|---|
|**regionId**|String|vpc所在区域id|
|**regionName**|String|vpc所在区域名称|
|**vpcId**|String|vpc id|
|**vpcName**|String|vpc名称|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
