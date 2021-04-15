# 京东云IP高防相关接口


## 简介
京东云IP高防相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**bindCert**|POST|网站类规则绑定 SSL 证书|
|**checkName**|GET|检测实例名称是否合法|
|**createBlackListRuleOfWebRule**|POST|添加网站类规则的黑名单规则|
|**createCCProtectionRuleOfWebRule**|POST|添加网站类规则的 CC 防护规则|
|**createCustomPage**|POST|添加自定义页面|
|**createDispatchRule**|POST|添加防护调度规则|
|**createDispatchRules**|POST|批量添加防护调度规则|
|**createForwardRule**|POST|添加非网站类规则|
|**createForwardRules**|POST|批量添加非网站类规则|
|**createInstance**|POST|新购或升级高防实例|
|**createIpSet**|POST|添加实例的 IP 黑白名单, 预定义的 IP 黑白名单绑定到转发规则的黑名单或白名单后生效|
|**createJsPageOfWebRule**|POST|添加网站类规则允许插入JS指纹的页面|
|**createJsPagesOfWebRule**|POST|批量添加网站类规则允许插入JS指纹的页面|
|**createWebRule**|POST|添加网站类规则|
|**createWebRules**|POST|批量添加网站类规则|
|**createWhiteListRuleOfWebRule**|POST|添加网站类规则的白名单规则|
|**deleteBlackListRuleOfWebRule**|DELETE|删除网站类规则的黑名单规则, 批量操作时 webBlackListRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**deleteCCProtectionRuleOfWebRule**|DELETE|删除网站规则的 CC 防护规则|
|**deleteCustomPage**|DELETE|删除自定义页面, 使用中的不允许删除|
|**deleteDispatchRule**|DELETE|删除防护调度规则|
|**deleteForwardRule**|DELETE|删除非网站规则, 批量操作时, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**deleteIpSet**|DELETE|删除实例的 IP 黑白名单. 支持批量操作, 批量操作时 ipSetId 传多个, 以 ',' 分隔. IP 黑白名单规则被引用时不允许删除|
|**deleteJsPageOfWebRule**|DELETE|删除网站类规则允许插入 JS 指纹的页面。支持批量操作, 批量操作时 jsPageId 传多个, 以 ',' 分隔|
|**deleteWebRule**|DELETE|删除网站规则。支持批量操作, 批量操作时 webRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**deleteWhiteListRuleOfWebRule**|DELETE|删除网站类规则的白名单规则, 批量操作时 webWhiteListRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**describeAlarmConfig**|GET|查询告警配置|
|**describeAttackStatistics**|GET|查询攻击次数及流量峰值|
|**describeAttackTypeCount**|GET|查询各类型攻击次数|
|**describeBlackListRuleOfForwardRule**|GET|查询转发规则的黑名单规则|
|**describeBlackListRuleOfWebRule**|GET|查询网站类规则的黑名单规则|
|**describeBlackListRulesOfWebRule**|GET|查询网站类规则的黑名单规则列表|
|**describeBusinessGraph**|GET|业务流量报表|
|**describeCCAttackLogDetails**|GET|查询 CC 攻击日志详情.<br>- 参数 attackId 优先级高于 instanceId, attackId 不为空时, 忽略 instanceId<br>|
|**describeCCAttackLogs**|GET|查询 CC 攻击日志|
|**describeCCGraph**|GET|CC 防护流量报表|
|**describeCCProtectionConfigOfWebRule**|GET|查询网站类规则的 CC 防护配置|
|**describeCCProtectionDefaultConfigOfWebRule**|GET|查询网站类规则的 CC 防护默认配置|
|**describeCCProtectionRuleOfWebRule**|GET|查询网站类规则的 CC 防护规则|
|**describeCCProtectionRulesOfWebRule**|GET|查询网站类规则的 CC 防护规则列表|
|**describeCcsIpList**|GET|查询用户可设置为网站类规则回源 IP 的京东云托管区公网 IP 资源|
|**describeConnStatGraph**|GET|新建与并发连接数统计报表|
|**describeCpsIpList**|GET|查询用户可设置为网站类规则回源 IP 的京东云云物理服务器公网 IP 资源|
|**describeCustomPages**|GET|查询自定义页面列表|
|**describeDDoSAttackLogs**|GET|查询 DDoS 攻击日志, 仅能查询非BGP实例的攻击记录, 同时查询BGP和非BGP实例请使用 <a href='http://docs.jdcloud.com/anti-ddos-pro/api/describeDDoSIpAttackLogs'>describeDDoSIpAttackLogs</a>|
|**describeDDoSGraph**|GET|DDos 防护流量报表|
|**describeDDoSIpAttackLogs**|GET|查询高防IP的 DDoS 攻击日志, 仅BGP实例返回的是IP级别的攻击记录, 非BGP实例返回的仍是实例级别的攻击记录(serviceIp 字段为空)|
|**describeDispatchRules**|GET|查询某个实例下的防护调度规则|
|**describeForwardRule**|GET|查询非网站类规则|
|**describeForwardRules**|GET|查询某个实例下的非网站转发配置|
|**describeFwdGraph**|GET|转发流量报表|
|**describeGeoAreas**|GET|查询非网站类转发规则的防护规则 Geo 拦截可设置区域编码|
|**describeInstance**|GET|查询实例|
|**describeInstanceAcl**|GET|查询实例全局访问控制配置，包括全局的IP黑白名单和geo拦截配置|
|**describeInstances**|GET|查询实例列表|
|**describeIpSet**|GET|查询实例的 IP 黑白名单|
|**describeIpSetUsage**|GET|查询实例的 IP 黑白名单用量信息|
|**describeIpSets**|GET|查询实例的 IP 黑白名单库列表|
|**describeJsPagesOfWebRule**|GET|查询网站类规则允许插入JS指纹的页面|
|**describeNameList**|GET|查询高防实例名称列表|
|**describeOriginWhiteIpList**|GET|查询高防实例回源 IP 白名单列表|
|**describeProtectionOutline**|GET|查询高防实例防护概要|
|**describeProtectionRuleOfForwardRule**|GET|查询非网站类转发规则的防护规则|
|**describeProtectionStatistics**|GET|查询高防实例防护统计信息|
|**describeServiceIpList**|GET|查询实例高防 IP 列表|
|**describeVpcIpList**|GET|查询用户可设置为网站类规则回源 IP 的京东云云内弹性公网 IP 资源|
|**describeWebRule**|GET|查询网站类规则|
|**describeWebRuleBlackListGeoAreas**|GET|查询网站类转发规则 Geo 模式的黑名单可设置区域编码|
|**describeWebRuleBlackListUsage**|GET|查询网站类防护规则的黑名单用量信息|
|**describeWebRuleRSGeoAreas**|GET|查询网站类转发规则按地域回源配置 geoRsRoute 可设置的区域|
|**describeWebRuleWhiteListGeoAreas**|GET|查询网站类转发规则 Geo 模式的白名单可设置区域编码|
|**describeWebRuleWhiteListUsage**|GET|查询网站类防护规则的白名单用量信息|
|**describeWebRules**|GET|查询某个实例下的网站类规则|
|**describeWhiteListRuleOfForwardRule**|GET|查询转发规则的白名单规则|
|**describeWhiteListRuleOfWebRule**|GET|查询网站类规则的白名单规则|
|**describeWhiteListRulesOfWebRule**|GET|查询网站类规则的白名单规则列表|
|**disableBlackListRuleOfForwardRule**|POST|关闭转发规则的黑名单规则|
|**disableBlackListRuleOfWebRule**|POST|关闭网站类规则的黑名单规则, 批量操作时 webBlackListRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**disableCCProtectionRuleOfWebRule**|POST|关闭网站类规则的 CC 防护规则|
|**disableInstanceCustomPage**|POST|关闭实例错误状态码返回页面, 透传错误状态码|
|**disableWebRuleBlackList**|POST|关闭网站类规则的黑名单|
|**disableWebRuleCC**|POST|关闭网站类规则 CC 防护, 网站类规则的 CC 防护规则和 CC 防护配置失效。支持批量操作, 批量操作时 webRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**disableWebRuleCCObserverMode**|POST|关闭网站类规则 CC 观察者模式, 观察模式下, CC 防护只告警不防御。支持批量操作, 批量操作时 webRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**disableWebRuleCCProtectionRule**|POST|关闭网站类规则的自定义 CC 防护规则总开关, 所有自定义 CC 防护规则失效|
|**disableWebRuleJsPage**|POST|关闭网站类规则的JS指纹开关|
|**disableWebRuleWhiteList**|POST|关闭网站类规则的白名单|
|**disableWhiteListRuleOfForwardRule**|POST|关闭转发规则的白名单规则|
|**disableWhiteListRuleOfWebRule**|POST|关闭网站类规则的白名单规则, 批量操作时 webWhiteListRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**enableBlackListRuleOfForwardRule**|POST|开启转发规则的黑名单规则|
|**enableBlackListRuleOfWebRule**|POST|开启网站类规则的黑名单规则, 批量操作时 webBlackListRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**enableCCProtectionRuleOfWebRule**|POST|开启网站类规则的 CC 防护规则|
|**enableInstanceCustomPage**|POST|开启实例错误状态码返回页面, 错误状态码返回默认页面或自定义页面|
|**enableWebRuleBlackList**|POST|开启网站类规则的黑名单|
|**enableWebRuleCC**|POST|网站类规则开启 CC 防护, 开启后网站类规则已配置的防护规则和 CC 防护配置生效, 若没有配置过 CC 防护, 默认的 CC 防护配置生效。支持批量操作, 批量操作时 webRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**enableWebRuleCCObserverMode**|POST|开启网站类规则 CC 观察者模式, 观察模式下, CC 防护只告警不防御。支持批量操作, 批量操作时 webRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**enableWebRuleCCProtectionRule**|POST|开启网站类规则的自定义 CC 防护规则总开关, 状态为开启的自定义 CC 防护规则生效|
|**enableWebRuleJsPage**|POST|打开网站类规则的JS指纹开关|
|**enableWebRuleWhiteList**|POST|开启网站类规则的白名单|
|**enableWhiteListRuleOfForwardRule**|POST|开启转发规则的白名单规则|
|**enableWhiteListRuleOfWebRule**|POST|开启网站类规则的白名单规则, 批量操作时 webWhiteListRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**modifyAlarmConfig**|POST|更新告警配置|
|**modifyBlackListRuleOfForwardRule**|PATCH|修改转发规则的黑名单规则|
|**modifyBlackListRuleOfWebRule**|PATCH|修改网站类规则的黑名单规则|
|**modifyCCProtectionConfigOfWebRule**|PATCH|修改网站类规则的 CC 防护配置|
|**modifyCCProtectionRuleOfWebRule**|PATCH|修改网站类规则的 CC 防护规则|
|**modifyCertInfo**|POST|编辑网站规则证书信息|
|**modifyCustomPage**|PUT|修改自定义页面|
|**modifyDispatchRule**|PATCH|更新防护调度规则|
|**modifyEPB**|POST|更新实例弹性防护带宽|
|**modifyForwardRule**|PATCH|更新非网站类规则|
|**modifyInstanceAcl**|POST|修改实例全局访问控制配置，包括全局的IP黑白名单和geo拦截配置|
|**modifyInstanceCustomPage**|POST|修改实例错误状态码返回页面为自定义页面|
|**modifyInstanceCustomPageDefault**|POST|修改实例页面错误状态码返回页面为为默认页面|
|**modifyInstanceName**|POST|修改实例名称|
|**modifyJsPageOfWebRule**|PATCH|修改网站类规则允许插入 JS 指纹的页面|
|**modifyProtectionRuleOfForwardRule**|POST|修改非网站类转发规则的防护规则|
|**modifyWebRule**|PATCH|修改网站类规则|
|**modifyWebRuleJsPageToAll**|POST|插入JS指纹到所有页面, 需要打开网站类规则的JS指纹开关|
|**modifyWebRuleJsPageToCustom**|POST|插入JS指纹到配置的自定义页面, 需要打开网站类规则的JS指纹开关|
|**modifyWhiteListRuleOfForwardRule**|PATCH|修改转发规则的白名单规则|
|**modifyWhiteListRuleOfWebRule**|PATCH|修改网站类规则的白名单规则|
|**recoverInstanceAcl**|POST|实例全局访问控制配置可以恢复到上一次下发成功的配置时，调用此接口回滚到上一次下发成功的配置|
|**switchDispatchRuleOrigin**|POST|防护调度规则切换成回源状态|
|**switchDispatchRuleProtect**|POST|防护调度规则切换成防御状态|
|**switchForwardRuleOrigin**|POST|非网站类规则切换成回源状态。支持批量操作, 批量操作时 forwardRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**switchForwardRuleProtect**|POST|非网站类规则切换成防御状态。支持批量操作, 批量操作时 forwardRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**switchWebRuleOrigin**|POST|网站类规则切换成回源状态。支持批量操作, 批量操作时 webRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
|**switchWebRuleProtect**|POST|网站类规则切换成防御状态。支持批量操作, 批量操作时 webRuleId 传多个, 以 ',' 分隔, 返回 result.code 为 1 表示操作成功, 为 0 时可能全部失败, 也可能部分失败|
