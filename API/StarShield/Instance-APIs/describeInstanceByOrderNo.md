# describeInstanceByOrderNo


## 描述
根据订单号查询套餐实例详情

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/regions/{regionId}/instance/{orderNumber}/describeInstance

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**orderNumber**|String|True| | |
|**regionId**|String|True| |地域ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeInstanceByOrderNo#result)| |
|**requestId**|String|此次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**describeInstancesRes**|[DescribeInstancesRes](describeInstanceByOrderNo#describeinstancesres)| |
### <div id="describeinstancesres">DescribeInstancesRes</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|实例ID|
|**instanceName**|String|实例名称|
|**packType**|String|套餐类型|
|**chargeState**|String|计费状态|
|**zonePackNum**|Integer|域名增量包数量|
|**trafficExpansion**|Integer|流量包数量|
|**flowUsedCnt**|Number|已使用流量（单位：Byte）|
|**flowRemain**|Double|剩余流量(单位：Gb)|
|**packMode**|String|套餐模式(BASE->基础套餐 FLOW->流量套餐)|
|**memo**|String|备注|
|**createTime**|String|购买时间, UTC时间格式，例如2017-11-10T23:00:00Z|
|**expireTime**|String|到期时间, UTC时间格式，例如2017-11-10T23:00:00Z|
|**packageInfo**|[DescribePackRes](describeInstanceByOrderNo#describepackres)|套餐信息|
### <div id="describepackres">DescribePackRes</div>
|名称|类型|描述|
|---|---|---|
|**packType**|String|套餐类型|
|**packMode**|String|套餐模型(BASE->基础版 FLOW->流量版)|
|**flowLimit**|Long|套餐流量|
|**availableZoneNum**|Integer|可用域名数|
|**cdnSpeedTraffic**|Integer|cdn加速流量|
|**ddosBaseProtect**|Integer|DDoS保底防护|
|**ddosElasticProtect**|Boolean|是否支持DDoS弹性防护|
|**freeCert**|Boolean|是否提供免费证书|
|**botManage**|Boolean|是否支持BOT功能|
|**waf**|Boolean|是否支持WAF|
|**customUploadCert**|Integer|自定义上传证书数量|
|**ccAttackQpsSingle**|Integer|单节点CC攻击QPS|
|**ccAttackQpsTotal**|Integer|CC攻击QPS总量|
|**dedicatedIp**|Integer|独享IP数量|
|**availableNodeNum**|Integer|可用节点数量|
|**specialCertNum**|Integer|域名专用证书数|
|**trueClientIp**|Boolean|是否支持TrueCLientIp|
|**originErrorPagePass**|Boolean|是否支持RriginErrorPagePass|
|**staticContentCache**|Boolean|是否支持静态内容缓存|
|**customClearByUrl**|Boolean|基于URL自定义清除|
|**advanceCustomClear**|Boolean|高级自定义清除(主机名、Tag、前缀目录)|
|**minCacheTtl**|Integer|最小缓存TTL时间|
|**clientUploadFileLimit**|Integer|客户端上传文件限制|
|**maxCacheFileLimit**|Integer|最大缓存文件限制|
|**urlPrefetch**|Boolean|是否支持基于URL预取|
|**pageRuleNum**|Integer|页面规则数量|
|**imageOptimize**|Boolean|是否支持页面优化|
|**http2**|Boolean|是否支持HTTP2|
|**developMode**|Boolean|是否支持开发模式|
|**queryStringSort**|Boolean|是否支持查询字符串排序|
|**customNameServer**|Boolean|是否支持自定义名称服务器（忽略）|
|**generalCert**|Boolean|是否支持通用证书|
|**customCertNum**|Integer|自定义证书数量|
|**websiteAnalyseTimeSpecs**|Integer|网站分析时间规格|
|**dnsAnalyseTime**|Integer|DNS分析时间（历史时间）|
|**attackAnalyseTime**|Integer|攻击分析时间（历史时间）|
|**auditLog**|Boolean|是否支持审计日志|
|**requestLog**|Boolean|是否支持请求日志|
|**owaspCoreRule**|Boolean|是否支持OWASP核心规则|
|**builtInPredefinedRule**|Boolean|是否支持内置预定义规则|
|**firewallRuleNum**|Integer|防火墙规则数量|
|**firewalRegularRule**|Boolean|是否支持防火墙正则表达式规则|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
