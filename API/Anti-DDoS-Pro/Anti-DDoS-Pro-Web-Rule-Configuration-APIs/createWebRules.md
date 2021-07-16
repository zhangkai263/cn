# createWebRules


## 描述
批量添加网站类规则

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:createWebRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**webRuleSpecList**|[WebRuleSpec[]](createwebrules#webrulespec)|True| |批量添加网站类规则请求参数|

### <div id="webrulespec">WebRuleSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**serviceIp**|String|False| |高防 IP|
|**domain**|String|True| |子域名|
|**protocol**|[WebRuleProtocol](createwebrules#webruleprotocol)|True| |协议: http, https 至少一个为 true|
|**port**|Integer[]|False| |HTTP 协议的端口号, 如80, 81; 如果 protocol.http 为 true, 至少配置一个端口|
|**httpsPort**|Integer[]|False| |HTTPS 协议的端口号, 如443, 8443; 如果 protocol.https 为 true, 至少配置一个端口|
|**originType**|String|True| |回源类型：A 或者 CNAME|
|**originAddr**|[OriginAddrItem[]](createwebrules#originaddritem)|False| |originType 为 A 时, 需要设置该字段|
|**onlineAddr**|String[]|False| |备用的回源地址列表, 可以配置为一个域名或者多个 ip 地址|
|**originDomain**|String|False| |回源域名, originType 为 CNAME 时需要指定该字段|
|**algorithm**|String|True| |转发规则. <br>- wrr: 带权重的轮询<br>- rr:  不带权重的轮询<br>- sh:  源地址hash|
|**forceJump**|Integer|False| |是否开启 HTTPS 强制跳转, protocol.http 和 protocol.https 都为 true 时此参数生效. <br>- 0: 不开启强制跳转. <br>- 1: 开启强制跳转|
|**customPortStatus**|Integer|False| |是否为自定义端口号. 0: 默认<br>- 1: 自定义|
|**httpOrigin**|Integer|False| |是否开启 HTTP 回源, protocol.https 为 true 时此参数生效. <br>- 0: 不开启. <br>- 1: 开启|
|**webSocketStatus**|Integer|True| |是否开启 WebSocket.<br>- 0: 不开启<br>- 1: 开启|
|**geoRsRoute**|[GeoRsRoute[]](createwebrules#georsroute)|False| |按区域分流回源配置|
|**enableKeepalive**|String|False| |是否开启回源长连接, protocol 选项开启 https 时生效, 可取值<br>- on: 开启<br>- off: 关闭|
|**httpVersion**|String|False| |http 版本, protocol 选项开启 https 时生效, 可取值 http1 或 http2|
|**sslProtocols**|String[]|False| |SSL协议类型, protocol 选项开启 https 时生效, 可取值SSLv2,SSLv3,TLSv1.0,TLSv1.1,TLSv1.2|
|**suiteLevel**|String|False| |加密套件等级, protocol 选项开启 https 时生效, 可取值<br>- low: 低级<br>- middle: 中级<br>- high：高级|
|**enableHealthCheck**|Integer|False| |健康检查开关, 0: 关闭, 1: 开启|
|**proxyConnectTimeout**|Integer|False| |回源连接超时时长, 单位 秒|
|**enableUnderscores**|Integer|False| |请求头支持下划线, 0: 关闭, 1: 开启|
### <div id="georsroute">GeoRsRoute</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**geo**|String|True| |要设置的区域编码, 查询 <a href='http://docs.jdcloud.com/anti-ddos-pro/api/describeWebRuleRSGeoAreas'>describeWebRuleRSGeoAreas</a> 接口获取可设置的地域编码|
|**rsAddr**|String[]|True| |对应区域的回源IP的列表|
### <div id="originaddritem">OriginAddrItem</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ip**|String|False| |回源ip|
|**weight**|Integer|False| |权重|
|**inJdCloud**|Boolean|False| |是否为京东云内公网ip|
### <div id="webruleprotocol">WebRuleProtocol</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**http**|Boolean|True| |http 协议|
|**https**|Boolean|True| |https 协议|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createwebrules#result)|批量创建结果|
|**requestId**|String| |
|**error**|[Error](createwebrules#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](createwebrules#err)| |
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
|**webRuleIdIds**|String[]|创建成功的网站规则id|
|**failedDomains**|[FailedDomain[]](createwebrules#faileddomain)|创建失败的网站规则域名|
### <div id="faileddomain">FailedDomain</div>
|名称|类型|描述|
|---|---|---|
|**domain**|String|子域名|
|**message**|String|错误原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
