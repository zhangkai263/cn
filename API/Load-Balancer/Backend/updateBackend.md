# updateBackend


## 描述
修改一个后端服务的信息

## 请求方式
PATCH

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/backends/{backendId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**backendId**|String|True| |Backend Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**backendName**|String|False| |后端服务名称,只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符|
|**healthCheckSpec**|[HealthCheckSpec](updatebackend#healthcheckspec)|False| |健康检查信息|
|**algorithm**|String|False| |调度算法 <br>【alb,nlb】取值范围为[IpHash, RoundRobin, LeastConn]（含义分别为：加权源Ip哈希，加权轮询和加权最小连接） <br>【dnlb】取值范围为[IpHash, QuintupleHash]（含义分别为：加权源Ip哈希和加权五元组哈希）|
|**targetGroupIds**|String[]|False| |虚拟服务器组的Id列表，目前只支持一个，且与agIds不能同时存在|
|**agIds**|String[]|False| |高可用组的Id列表，目前只支持一个，且与targetGroupIds不能同时存在|
|**proxyProtocol**|Boolean|False| |【alb Tcp协议】是否启用Proxy ProtocolV1协议获取真实源ip, 取值为false(不开启)或者true(开启), 默认为false|
|**description**|String|False| |描述,允许输入UTF-8编码下的全部字符，不超过256字符|
|**sessionStickiness**|Boolean|False| |会话保持, 取值为false(不开启)或者true(开启)，默认为false <br>【alb Http协议，RoundRobin算法】支持基于cookie的会话保持 <br>【nlb】支持基于报文源目的IP的会话保持|
|**sessionStickyTimeout**|Integer|False| |【nlb】会话保持超时时间，sessionStickiness开启时生效, 取值范围[1-3600]|
|**connectionDrainingSeconds**|Integer|False| |【nlb】连接耗尽超时，移除target前，连接的最大保持时间，默认300s，取值范围[0-3600]|
|**httpCookieExpireSeconds**|Integer|False| |【alb Http协议】cookie的过期时间,sessionStickiness开启时生效，取值范围为[0-86400], 0表示cookie与浏览器同生命周期|
|**httpForwardedProtocol**|Boolean|False| |【alb Http协议】获取负载均衡的协议, 取值为False(不获取)或True(获取)|
|**httpForwardedPort**|Boolean|False| |【alb Http协议】获取负载均衡的端口, 取值为False(不获取)或True(获取)|
|**httpForwardedHost**|Boolean|False| |【alb Http协议】获取负载均衡的host信息, 取值为False(不获取)或True(获取)|
|**httpForwardedVip**|Boolean|False| |【alb Http协议】获取负载均衡的vip, 取值为False(不获取)或True(获取)|
|**closeHealthCheck**|Boolean|False| |【alb,dnlb】关闭健康检查，取值为false(不关闭)或true(关闭)|

### <div id="healthcheckspec">HealthCheckSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**protocol**|String|True| |健康检查协议 <br>【alb、nlb】取值为Http, Tcp <br>【dnlb】取值为Tcp|
|**healthyThresholdCount**|Integer|False| |健康阀值，取值范围为[1,5]，默认为3|
|**unhealthyThresholdCount**|Integer|False| |不健康阀值，取值范围为[1,5], 默认为3|
|**checkTimeoutSeconds**|Integer|False| |响应超时时间, 取值范围为[2,60]，默认为3s|
|**intervalSeconds**|Integer|False| |健康检查间隔, 范围为[5,300], 默认为5s|
|**port**|Integer|False| |检查端口, 取值范围为[0,65535], 默认为0，默认端口为每个后端服务器接收负载均衡流量的端口|
|**httpDomain**|String|False| |检查域名，仅支持HTTP协议|
|**httpPath**|String|False| |检查路径, 健康检查的目标路径，必须以"/"开头，允许输入具体的文件路径，默认为根目录。当protocol为http时，必填, 仅支持HTTP协议|
|**httpCode**|String[]|False| |检查来自后端服务器的成功响应时，要使用的HTTP状态码。您可以指定单个数值（例如："200"，取值范围200-499）、一段连续数值（例如："201-205"，取值范围范围200-499，且前面的参数小于后面）和一类连续数值缩写（例如："3xx"，等价于"300-399"，取值范围2xx、3xx和4xx）。多个数值之间通过","分割（例如："200,202-207,302,4xx"）。目前仅支持2xx、3xx、4xx。仅支持HTTP协议，默认为[2xx、3xx]|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Parameter backend id missing|
|**403**|Operation permission denied|
|**500**|Internal server error|
|**503**|Service unavailable|
