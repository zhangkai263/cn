# 京东云WAF-OpenAPI接口


## 简介
京东云WAF-OpenAPI接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**addBotUsrRule**|POST|新增网站自定义类型bot规则|
|**addDomain**|POST|新增网站|
|**addIps**|POST|设置网站黑白名单ip配置|
|**antiLevelWaf**|POST|设置waf策略等级|
|**antiModeWaf**|POST|设置waf防护模式|
|**bindCert**|POST|绑定证书|
|**createInstance**|POST||
|**delBotUsrRule**|POST|删除网站自定义类型bot规则|
|**delIps**|POST|删除网站黑白名单ip配置|
|**delJsPage**|POST|删除js页面|
|**delRiskJs**|POST|删除网站业务防控js页面|
|**delRiskRule**|POST|删除网站业务防控规则|
|**delWafCondition**|POST|删除网站waf自定义防护条件|
|**delWafRule**|POST|删除waf自定义规则|
|**deleteDomain**|POST|删除网站|
|**describeIpDomainInfo**|GET|获取ip的域名信息|
|**describeJsPages**|POST|获取js插入页面|
|**disableRules**|POST|规则开关|
|**enableBot**|POST|激活bot|
|**enableRisk**|POST|使能risk|
|**enableUsrBot**|POST|激活自定义bot|
|**enableWaf**|POST|激活waf|
|**enableWafUserDefine**|POST|激活waf自定义规则|
|**getAvailableCertForDomain**|POST|获取域名可用证书列表|
|**getBpsData**|POST|获取网站在一定时间内的bps信息。|
|**getDomainAntiConfig**|POST|获取域名防护配置|
|**getDomainLbConfig**|POST|获取网站lb配置|
|**getQpsData**|POST|获取网站在一定时间内的qps信息。|
|**isWafVip**|GET|判断IP是否为waf的vip|
|**listBotStdRules**|POST|获取网站已知类型bot规则|
|**listBotUsrRules**|POST|获取网站自定义类型bot规则|
|**listDomains**|POST|获取网站列表|
|**listIps**|POST|获取网站黑白名单ip配置|
|**listMainCfg**|POST|获取网站|
|**listRiskJs**|POST|获取网站业务风控js插入页面|
|**listRiskRules**|POST|获取网站业务风控规则|
|**listWafConditions**|POST|获取网站waf自定义防护条件|
|**listWafFilter**|POST|获取网站waf自定义防护过滤器|
|**listWafRules**|POST|获取网站的waf自定义规则|
|**setBotStdRules**|POST|设置网站已知类型bot规则|
|**setJsPage**|POST|设置js插入页面|
|**setRiskJs**|POST|设置网站业务风控js插入页面|
|**setRiskRule**|POST|新增网站业务风控防护规则|
|**setWafCondition**|POST|设置网站waf自定义防护条件|
|**setWafRule**|POST|设置waf自定义规则|
|**updateBotUsrRule**|POST|更新网站自定义类型bot规则|
|**updateDomain**|POST|更新网站|
|**updateIps**|POST|更新网站黑白名单ip配置|
