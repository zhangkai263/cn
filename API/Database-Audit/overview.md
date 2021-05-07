# Database Audit API


## 简介
Database Audit API


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**addDatabase**|POST|新建数据库配置|
|**addIpWhiteItem**|POST|添加一条IP白名单记录|
|**addMaskRule**|POST|添加敏感信息遮蔽规则|
|**addRule**|POST|新增规则|
|**addRuleGroup**|POST|新增规则组|
|**createTask**|POST|创建任务报表|
|**deleteAuditFromAgent**|DELETE|取消对该数据库的审计，支持批量，多个ID用英文逗号分隔|
|**deleteDatabase**|DELETE|删除数据库配置|
|**deleteIpWhiteItem**|DELETE|删除一条IP白名单记录|
|**deleteMask**|DELETE|删除敏感信息遮蔽规则|
|**deleteReport**|DELETE|删除此任务报表|
|**deleteRule**|DELETE|删除规则|
|**deleteRuleGroup**|DELETE|删除规则组|
|**deleteTask**|DELETE|删除此任务|
|**deployRuleGroup**|POST|下发规则组到指定dbIds|
|**describeAgentDatabases**|GET|获取数据库审计agent审计的数据库列表|
|**describeAgentList**|GET|获取数据库审计agent主机列表|
|**describeAuditLog**|GET|查看审计日志详情|
|**describeAuditLogList**|GET|获取审计日志列表<br>时间范围[0-180天]<br>|
|**describeDatabase**|GET|获取数据库详情|
|**describeDatabases**|GET|获取数据库列表|
|**describeInstance**|GET|获取数据库审计实例详情|
|**describeInstanceList**|GET|获取数据库审计实例列表|
|**describeIpWhiteList**|GET|获取此实例的所有IP白名单列表|
|**describeMaskRuleList**|GET|获取敏感信息遮蔽规则列表|
|**describeReportList**|GET|获取任务下的报表列表|
|**describeRule**|GET|获取规则详情|
|**describeRuleGroupRules**|GET|获取规则组内规则列表|
|**describeRuleGroups**|GET|获取规则组列表|
|**describeTaskList**|GET|获取任务列表<br>一次性任务报表时间范围[0-30天]<br>|
|**disableAuditResponse**|PATCH|禁用数据库的双向审计|
|**disableRuleGroup**|POST|禁用规则组|
|**downloadReport**|GET|下载此任务报表|
|**enableAuditResponse**|PATCH|启用数据库的双向审计|
|**enableRuleGroup**|POST|启用规则组|
|**installAgent**|POST|安装数据库审计agent|
|**modifyInstance**|POST|修改数据库审计实例名称和描述|
|**modifyMask**|POST|编辑敏感信息遮蔽规则|
|**modifyRule**|POST|编辑规则组内的规则|
|**modifyTask**|POST|修改任务的配置信息|
|**modyfyAgentLimits**|PATCH|修改agent资源限额,支持多个agentId,英文逗号分隔|
|**setAuditConfig**|PATCH|配置数据库审计信息|
|**startTask**|POST|启动报表任务|
|**stopTask**|POST|停止报表任务|
|**uninstallAgent**|DELETE|卸载agent，支持批量，多个ID用英文逗号分隔|
|**updateDatabase**|POST|修改数据库描述或配置|
