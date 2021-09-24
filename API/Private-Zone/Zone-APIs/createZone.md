# createZone


## 描述
- 添加一个私有解析的zone，可添加以下三种类型的zone
- 云内全局zone：zone的后缀是指定的后缀，如：local。该域名在云内自动全局生效，不用关联vpc即可在vpc内解析，该类型全局唯一，不能重复添加
- 反向解析zone：zone的后缀是in-addr.arpa时，我们认为他是一个反向解析的zone，反向解析域名前缀目前支持10/172.16-31/192.168网段，如：10.in-addr.arpa、16.172.in-addr.arpa。反向解析的zone只能添加反向解析的记录
- 私有解析zone：该类型的zone可以时任意符合格式的域名，私有解析zone需要关联vpc后，在vpc内生效解析


## 请求方式
POST

## 请求地址
https://privatezone.jdcloud-api.com/v1/regions/{regionId}/zones

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone**|String|True| |zone|
|**instanceId**|String|True| |购买的套餐实例ID|
|**zoneType**|String|True| |域名类型 LOCAL->云内全局 PTR->反向解析zone PV->私有zone|
|**retryRecurse**|Boolean|False| |解析失败后是否进行递归解析|
|**bindVpc**|[BindVpcReq[]](#bindvpcreq)|False| |绑定的vpc信息|

### <div id="BindVpcReq">BindVpcReq</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |vpc所在区域id|
|**vpcId**|String|True| |vpc id|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|此次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
