# 云物理服务器


## 简介
云物理服务器相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**addServers**|PUT|添加后端服务器|
|**applyElasticIps**|PUT|申请弹性公网IP<br>|
|**assignIpv6Address**|POST|申请IPv6地址|
|**assignIpv6AddressesBandwidth**|PUT|申请IPv6地址带宽<br>|
|**assignIpv6Cidr**|POST|申请IPv6网段<br>|
|**assignIpv6Gateway**|POST|申请开通IPv6网关<br>|
|**associateElasticIp**|PUT|绑定弹性公网IP<br>|
|**associateElasticIpLB**|PUT|绑定弹性公网IP|
|**createAliasIp**|PUT|添加别名IP|
|**createInstances**|PUT|创建一台或多台指定配置的云物理服务器<br/><br>- 地域与可用区<br/><br>  \- 调用接口（describeRegiones）获取云物理服务器支持的地域与可用区<br/><br>- 实例类型<br/><br>  \- 调用接口（describeDeviceTypes）获取物理实例类型列表<br/><br>  \- 不能使用已下线、或已售馨的实例类型<br/><br>- 操作系统<br/><br>  \- 可调用接口（describeOS）获取云物理服务器支持的操作系统列表<br/><br>- 存储<br/><br>  \- 数据盘多种RAID可选，可调用接口（describeDeviceRaids）获取服务器支持的RAID列表<br/><br>- 网络<br/><br>  \- 网络类型目前支持basic、vpc<br/><br>  \- 线路目前只支持bgp<br/><br>  \- 支持不启用外网，如果启用外网，带宽范围[1,200] 单位Mbps<br/><br>- 其他<br/><br>  \- 购买时长，可按年或月购买：月取值范围[1,9], 年取值范围[1,3]<br/><br>  \- 密码设置参考公共参数规范<br/><br>|
|**createKeypairs**|PUT|创建密钥对|
|**createListener**|PUT|创建监听器|
|**createLoadBalancer**|PUT|创建负载均衡实例|
|**createSecondaryCidr**|PUT|添加次要CIDR|
|**createServerGroup**|PUT|创建虚拟服务器组|
|**createSubnet**|PUT|创建子网|
|**createVpc**|PUT|创建私有网络|
|**deleteAliasIp**|DELETE|删除别名IP|
|**deleteKeypairs**|DELETE|删除密钥对|
|**deleteListener**|DELETE|删除监听器|
|**deleteSecondaryCidr**|DELETE|删除次要CIDR|
|**deleteServerGroup**|DELETE|删除虚拟服务器组|
|**deleteSubnet**|DELETE|删除子网|
|**deleteVpc**|DELETE|删除私有网络<br>|
|**describeAliasIps**|GET|查询别名IP列表|
|**describeAvailablePrivateIp**|GET|查询可用的私有IP列表|
|**describeBasicSubnet**|GET|查询基础网络子网|
|**describeCPSLBRegions**|GET|查询负载均衡地域列表|
|**describeDeviceRaids**|GET|查询某种实例类型的云物理服务器支持的RAID类型，可查询系统盘RAID类型和数据盘RAID类型|
|**describeDeviceTypes**|GET|查询云物理服务器实例类型|
|**describeElasticIp**|GET|查询弹性公网IP详情|
|**describeElasticIps**|GET|查询弹性公网IP列表<br/><br>支持分页查询，默认每页20条<br/><br>|
|**describeEventLogs**|GET|查询云物理服务器监控报警日志信息|
|**describeInstance**|GET|查询单台云物理服务器详细信息|
|**describeInstanceMonitorInfo**|GET|查询云物理服务器监控信息|
|**describeInstanceName**|GET|查询云物理服务器名称|
|**describeInstanceRaid**|GET|查询单个云物理服务器已安装的RAID信息，包括系统盘RAID信息和数据盘RAID信息|
|**describeInstanceStatus**|GET|查询单个云物理服务器硬件监控信息|
|**describeInstances**|GET|批量查询云物理服务器详细信息<br/><br>支持分页查询，默认每页20条<br/><br>|
|**describeIpv6Address**|GET|查询IPv6地址例详情|
|**describeIpv6Addresses**|GET|查询IPv6地址列表<br/><br>支持分页查询，默认每页20条<br/><br>|
|**describeIpv6Gateway**|GET|查询IPv6网关实例详情|
|**describeIpv6Gateways**|GET|查询IPv6网关实例列表|
|**describeKeypair**|GET|查询密钥对详情|
|**describeKeypairs**|GET|查询密钥对列表|
|**describeListener**|GET|查询监听器详情|
|**describeListeners**|GET|查询监听器|
|**describeLoadBalancer**|GET|查询负载均衡实例详情|
|**describeLoadBalancers**|GET|查询负载均衡实例列表|
|**describeOS**|GET|查询云物理服务器支持的操作系统|
|**describeRegiones**|GET|查询云物理服务器地域列表|
|**describeRouteTable**|GET|查询路由表详情|
|**describeRouteTables**|GET|查询路由表列表|
|**describeSecondaryCidrs**|GET|查询次要CIDR列表|
|**describeServerGroup**|GET|查询虚拟服务器组|
|**describeServerGroups**|GET|查询虚拟服务器组列表|
|**describeServers**|GET|查询后端服务器列表|
|**describeSubnet**|GET|查询子网详情|
|**describeSubnets**|GET|查询子网列表|
|**describeVpc**|GET|查询私有网络详情|
|**describeVpcs**|GET|查询私有网络列表|
|**disassociateElasticIp**|PUT|解绑弹性公网IP<br>|
|**disassociateElasticIpLB**|PUT|解绑弹性公网IP|
|**importKeypairs**|PUT|导入密钥对|
|**modifyBandwidth**|PUT|升级云物理服务器外网带宽，只能操作running或者stopped状态的服务器<br/><br>- 不支持未启用外网的服务器升级带宽<br>- 外网带宽不支持降级<br>|
|**modifyElasticIpBandwidth**|PUT|修改弹性公网IP带宽<br>|
|**modifyInstance**|POST|修改云物理服务器部分信息，包括名称、描述|
|**modifyIpv6AddressBandwidth**|PUT|修改IPv6公网带宽<br>|
|**modifyIpv6Gateway**|POST|修改IPv6网关实例|
|**modifyListener**|POST|修改监听器|
|**modifyLoadBalancer**|POST|修改负载均衡实例|
|**modifyServer**|POST|修改后端服务器|
|**modifyServerGroup**|POST|修改虚拟服务器组|
|**modifySubnet**|POST|修改子网|
|**modifyVpc**|POST|修改私有网络<br>|
|**reinstallInstance**|PUT|重装云物理服务器，只能重装stopped状态的服务器<br/><br>- 可调用接口（describeOS）获取云物理服务器支持的操作系统列表<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>|
|**removeServer**|DELETE|移除后端服务器|
|**resetPassword**|PUT|重置云物理服务器密码<br>|
|**restartInstance**|PUT|重启单台云物理服务器，只能重启running状态的服务器<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>|
|**startInstance**|PUT|对单台云物理服务器执行开机操作，只能启动stopped状态的服务器|
|**startListener**|PUT|开启监听器|
|**startLoadBalancer**|PUT|开启负载均衡实例|
|**stopInstance**|PUT|对单台云物理服务器执行关机操作，只能停止running状态的服务器<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>|
|**stopListener**|PUT|关闭监听器|
|**stopLoadBalancer**|PUT|关闭负载均衡实例|
