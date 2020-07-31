# describeIpMonitorFlow


## 描述
查询多个公网 IP 的监控流量, 支持 ipv4 和 ipv6

## 请求方式
GET

## 请求地址
https://baseanti.jdcloud-api.com/v1/describeIpMonitorFlow


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |开始时间, UTC 时间, 格式: yyyy-MM-dd'T'HH:mm:ssZ|
|**endTime**|String|True| |结束时间, UTC 时间, 格式: yyyy-MM-dd'T'HH:mm:ssZ|
|**ip**|String[]|True| |基础防护已防护的公网 IP. <br>- 使用 <a href='http://docs.jdcloud.com/anti-ddos-basic/api/describeelasticipresources'>describeElasticIpResources</a> 接口查询基础防护已防护的私有网络弹性公网 IP. <br>- 使用 <a href='http://docs.jdcloud.com/anti-ddos-basic/api/describecpsipresources'>describeCpsIpResources</a> 接口查询基础防护已防护的云物理服务器公网IP 和 弹性公网 IP. <br>- 使用 <a href='http://docs.jdcloud.com/anti-ddos-basic/api/describeccsipresources'>describeCcsIpResources</a> 接口查询基础防护已防护的托管区公网 IP|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeipmonitorflow#result)| |
|**requestId**|String| |
|**error**|[Error](describeipmonitorflow#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](describeipmonitorflow#err)| |
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
|**bps**|[IpResourceFlow](describeipmonitorflow#ipresourceflow)| |
|**pps**|[IpResourceFlow](describeipmonitorflow#ipresourceflow)| |
### <div id="ipresourceflow">IpResourceFlow</div>
|名称|类型|描述|
|---|---|---|
|**time**|String[]|UTC 时间, 格式: yyyy-MM-dd'T'HH:mm:ssZ|
|**postProtect**|Double[]|防护后流量|
|**preProtect**|Double[]|防护前流量|
|**unit**|String|流量单位|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
