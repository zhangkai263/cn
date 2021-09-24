# 京东云内网域名解析OpenAPI接口


## 简介
京东云内网域名解析OpenAPI接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**bindVpc**|PUT|绑定vpc<br>- vpc信息为空时，会将之前的绑定关系全部解除<br>- 该接口为覆盖类的接口，请将需要的vpc全部进行绑定<br>|
|**checkInstancesName**|GET|检查实例名称|
|**createInstance**|POST|实例新购<br>|
|**createResourceRecord**|POST|创建解析记录<br>|
|**createZone**|POST|- 添加一个私有解析的zone，可添加以下三种类型的zone<br>- 云内全局zone：zone的后缀是指定的后缀，如：local。该域名在云内自动全局生效，不用关联vpc即可在vpc内解析，该类型全局唯一，不能重复添加<br>- 反向解析zone：zone的后缀是in-addr.arpa时，我们认为他是一个反向解析的zone，反向解析域名前缀目前支持10/172.16-31/192.168网段，如：10.in-addr.arpa、16.172.in-addr.arpa。反向解析的zone只能添加反向解析的记录<br>- 私有解析zone：该类型的zone可以时任意符合格式的域名，私有解析zone需要关联vpc后，在vpc内生效解析<br>|
|**deleteResourceRecords**|DELETE|删除解析记录。批量删除时多个resourceRecordId用","分隔。批量删除每次最多不超过100个记录<br>|
|**deleteZone**|DELETE|删除zone，该zone下的解析记录和绑定的vpc关联关系将会被删除<br>|
|**describeActionLogs**|GET|查询操作日志<br>|
|**describeInstances**|GET|查询实例信息<br>|
|**describePacks**|GET|查询服务套餐<br>|
|**describeResourceRecords**|GET|查询解析记录<br>|
|**describeZones**|GET|查询私有解析zone列表<br>|
|**exportResourceRecords**|GET|导出当前zone下所有解析记录，返回的数据是可以转换为csv文件格式的字符串<br>|
|**importResourceRecords**|POST|批量导入解析记录，批量导入每次不可超过100条记录<br>|
|**lockZone**|PUT|锁定/解锁zone，zone被锁定后不能进行相关的修改操作<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>|
|**modifyInstance**|PUT|实例升配<br>|
|**modifyResourceRecord**|PUT|修改解析记录<br>|
|**retryRecurse**|PUT|解析失败后，尝试递归解析开关<br>|
|**selectDetailList**|GET|查询实例详情|
|**setResourceRecordsStatus**|PUT|设置解析记录状态，STOP操作会将停止该记录的解析，直到再次START。批量设置时多个resourceRecordId用","分隔。批量设置时每次最多不超过100个记录<br>|
|**zoneFlowCount**|POST|统计zone的流量<br>|
|**zoneResolveCount**|POST|统计zone的解析量<br>|
