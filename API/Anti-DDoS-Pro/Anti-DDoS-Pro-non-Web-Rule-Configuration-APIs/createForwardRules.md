# createForwardRules


## 描述
批量添加非网站类规则

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:createForwardRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**forwardRuleSpecList**|[ForwardRuleSpec[]](createforwardrules#forwardrulespec)|True| |批量添加非网站类规则请求参数|

### <div id="forwardrulespec">ForwardRuleSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**protocol**|String|True| |协议: TCP 或者 UDP|
|**serviceIp**|String|False| |高防 IP|
|**port**|Integer|True| |端口号, 取值范围[1, 65535]|
|**algorithm**|String|True| |转发规则. <br>- wrr: 带权重的轮询<br>- rr:  不带权重的轮询<br>- sh:  源地址hash|
|**originType**|String|True| |回源类型: A 或者 CNAME|
|**originAddr**|[OriginAddrItem[]](createforwardrules#originaddritem)|False| | |
|**onlineAddr**|String[]|False| |备用的回源地址列表, 可以配置为一个域名或者多个 ip 地址|
|**originDomain**|String|False| |回源域名|
|**originPort**|Integer|True| |回源端口号, 取值范围[1, 65535]|
### <div id="originaddritem">OriginAddrItem</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ip**|String|False| |回源ip|
|**weight**|Integer|False| |权重|
|**inJdCloud**|Boolean|False| |是否为京东云内公网ip|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createforwardrules#result)|批量创建结果|
|**requestId**|String| |
|**error**|[Error](createforwardrules#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](createforwardrules#err)| |
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
|**forwardRuleIds**|String[]|创建成功的非网站规则id|
|**failedPorts**|[FailedPort[]](createforwardrules#failedport)|创建失败的非网站规则 port|
### <div id="failedport">FailedPort</div>
|名称|类型|描述|
|---|---|---|
|**port**|Integer|端口号|
|**message**|String|错误原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
