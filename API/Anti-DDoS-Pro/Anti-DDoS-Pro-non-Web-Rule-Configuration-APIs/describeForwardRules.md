# describeForwardRules


## 描述
查询某个实例下的非网站转发配置

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/forwardRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |页码, 默认为1|
|**pageSize**|Integer|False| |分页大小, 默认为10, 取值范围[10, 100]|
|**searchType**|String|False| |查询类型名称, domain:源站域名, ip:源站 IP, port: 转发端口, originPort: 源站端口, serviceIp: 高防IP(仅支持BGP线路的实例)|
|**searchValue**|String|False| |查询类型值|
|**sorts**|[Sort[]](describeforwardrules#sort)|False| |排序属性：<br>port - 按转发端口排序，默认不排序,asc表示按转发端口升序，desc表示按转发端口降序<br>|

### <div id="sort">Sort</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|False| |排序条件的名称|
|**direction**|String|False| |排序条件的方向|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeforwardrules#result)| |
|**requestId**|String| |
|**error**|[Error](describeforwardrules#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](describeforwardrules#err)| |
### <div id="err">Err</div>
|名称|类型|描述|
|---|---|---|
|**code**|Long|同http code|
|**details**|Object| |
|**message**|String| |
|**status**|String|具体错误|
### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[ForwardRule[]](describeforwardrules#forwardrule)| |
|**currentCount**|Integer|当前页数量|
|**totalCount**|Integer|总数|
|**totalPage**|Integer|总页数|
### <div id="forwardrule">ForwardRule</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|规则 Id|
|**instanceId**|String|实例 Id|
|**protocol**|String|TCP 或 UDP|
|**cname**|String|规则的 CNAME|
|**originType**|String|回源类型: ip 或者 domain|
|**serviceIp**|String|高防 IP|
|**port**|Integer|端口号|
|**algorithm**|String|转发规则. <br>- wrr: 带权重的轮询<br>- rr:  不带权重的轮询<br>- sh:  源地址hash|
|**originAddr**|[OriginAddrItem[]](describeforwardrules#originaddritem)| |
|**onlineAddr**|String[]|备用的回源地址列表|
|**originDomain**|String|回源域名|
|**originPort**|Integer|回源端口号|
|**status**|Integer|0: 防御状态<br>1: 回源状态|
### <div id="originaddritem">OriginAddrItem</div>
|名称|类型|描述|
|---|---|---|
|**ip**|String|回源ip|
|**weight**|Integer|权重|
|**inJdCloud**|Boolean|是否为京东云内公网ip|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
