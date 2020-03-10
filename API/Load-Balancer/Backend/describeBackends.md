# describeBackends


## 描述
查询后端服务列表

## 请求方式
GET

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/backends/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1, 取值范围：[1,∞), 页码超过总页数时, 显示最后一页|
|**pageSize**|Integer|False|20|分页大小，默认为20，取值范围：[10,100]|
|**filters**|[Filter[]](describebackends#filter)|False| |backendIds - 后端服务Id列表，支持多个<br>backendNames - 后端服务名称列表，支持多个<br>loadBalancerId - 负载均衡器Id，支持单个<br>agId - 高可用组Id，支持单个<br>loadBalancerType - 负载均衡类型，取值为：alb、nlb、dnlb，默认alb，支持单个<br>protocol - 后端服务的协议【alb】支持Http、Tcp，【nlb&dnlb】支持Tcp，默认查询所有，支持单个<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describebackends#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**backends**|[Backend[]](describebackends#backend)|后端服务的信息|
|**totalCount**|Integer|总数量|
### <div id="backend">Backend</div>
|名称|类型|描述|
|---|---|---|
|**backendId**|String|后端服务的Id|
|**backendName**|String|后端服务的名字|
|**loadBalancerId**|String|后端服务所属loadBalancer的Id|
|**loadBalancerType**|String|后端服务所属负载均衡类型，取值为：alb、nlb、dnlb|
|**protocol**|String|后端服务的协议 <br>【alb】包括Http，Tcp <br>【nlb】包括Tcp <br>【dnlb】包括Tcp|
|**port**|Integer|后端服务的端口，取值范围为[1, 65535]|
|**algorithm**|String|调度算法 <br>【alb,nlb】取值范围为[IpHash, RoundRobin, LeastConn]（取值范围的含义：加权源Ip哈希，加权轮询和加权最小连接） <br>【dnlb】取值范围为[IpHash, QuintupleHash]（取值范围的含义分别为：加权源Ip哈希和加权五元组哈希）|
|**targetGroupIds**|String[]|虚拟服务器组的Id列表，目前只支持一个，且与agIds不能同时存在|
|**agIds**|String[]|高可用组的Id列表，目前只支持一个，且与targetGroupIds不能同时存在|
|**proxyProtocol**|Boolean|【alb tcp协议】通过Proxy Protocol协议获取真实ip, 取值为False(不获取)或者True(获取,支持v1版本)|
|**description**|String|后端服务的描述信息|
|**connectionDrainingSeconds**|Integer|【nlb】连接耗尽超时，移除target前连接的最大保持时间，范围[0，3600]|
|**sessionStickiness**|Boolean|会话保持, 取值为false(不开启)或者true(开启) <br>【alb Http协议，RoundRobin算法】支持基于cookie的会话保持 <br>【nlb】支持基于报文源目的IP的会话保持|
|**sessionStickyTimeout**|Integer|【nlb】会话保持超时时间，sessionStickiness开启时生效，默认300s, 范围[1-3600]|
|**httpCookieExpireSeconds**|Integer|【alb Http协议】cookie的过期时间,sessionStickiness开启时生效，取值范围为[0,86400], 0表示cookie与浏览器同生命周期|
|**httpForwardedProtocol**|Boolean|【alb http协议】获取负载均衡的协议, 取值为False(不获取)或True(获取)|
|**httpForwardedPort**|Boolean|【alb http协议】获取负载均衡的端口, 取值为False(不获取)或True(获取)|
|**httpForwardedHost**|Boolean|【alb http协议】获取负载均衡的host信息, 取值为False(不获取)或True(获取)|
|**httpForwardedVip**|Boolean|【alb http协议】获取负载均衡的vip, 取值为False(不获取)或True(获取)|
|**healthCheck**|Object|健康检查,数据结构：<br>protocol（string）健康检查协议,【ALB、NLB】取值为Http, Tcp，【DNLB】取值为Tcp;<br>healthyThresholdCount（integer）健康阀值，取值范围为[1,5]，默认为3;<br>unhealthyThresholdCount（integer）不健康阀值，取值范围为[1,5], 默认为3;<br>checkTimeoutSeconds（integer）响应超时时间, 取值范围为[2,60]，默认为3s;<br>intervalSeconds（integer）健康检查间隔, 范围为[5,300], 默认为5s;<br>port（integer）检查端口, 取值范围为[0,65535], 默认为0，默认端口为每个后端服务器接收负载均衡流量的端口;<br>httpDomain（string）【Http协议】检查域名;<br>httpPath（string）【Http协议】检查路径, 健康检查的目标路径，必须以"/"开头，允许输入具体的文件路径，默认为根目录;<br>httpCode（[]string）【Http协议】检查来自后端服务器的成功响应时，要使用的HTTP状态码。您可以指定：单个数值（例如："200"，取值范围200-499）、一段连续数值（例如："201-205"，取值范围范围200-499，且前面的参数小于后面）和一类连续数值缩写（例如："3xx"，等价于"300-399"，取值范围2xx、3xx和4xx）。多个数值之间通过","分割（例如："200,202-207,302,4xx"）。目前仅支持2xx、3xx、4xx。|
|**createdTime**|String|后端服务的创建时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
