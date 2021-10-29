# describePackages


## 描述
套餐包列表查询

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/regions/{regionId}/packages

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageSize**|Integer|False|10|页容量，默认10, 范围（1-100）|
|**pageNumber**|Integer|False|1|页序号，默认1，不能小于1|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describePackages#result)| |
|**requestId**|String|此次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[DescribePackRes[]](describePackages#describepackres)|套餐实例信息列表|
|**currentCount**|Integer|当前页记录数量|
|**totalCount**|Integer|总记录数量|
|**totalPage**|Integer|总页数|
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
