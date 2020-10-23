# 分布式云物理服务器


## 简介
分布式云物理服务器相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**addBandwidthPackageIp**|PUT|添加共享带宽IP<br>|
|**applyBandwidthPackages**|PUT|申请共享带宽<br>|
|**applyElasticIps**|PUT|申请弹性公网IP<br>|
|**associateElasticIp**|PUT|绑定弹性公网IP<br>|
|**createAliasIp**|PUT|添加别名IP|
|**createInstances**|PUT|创建一台或多台指定配置的分布式云物理服务器<br/><br>- 地域与可用区<br/><br>  \- 调用接口（queryEdCPSRegions）获取分布式云物理服务器支持的地域与可用区<br/><br>- 实例类型<br/><br>  \- 调用接口（describeDeviceTypes）获取物理实例类型列表<br/><br>  \- 不能使用已下线、或已售馨的实例类型<br/><br>- 操作系统<br/><br>  \- 可调用接口（describeOS）获取分布式云物理服务器支持的操作系统列表<br/><br>- 存储<br/><br>  \- 数据盘多种RAID可选，可调用接口（describeDeviceRaids）获取服务器支持的RAID列表<br/><br>- 网络<br/><br>  \- 网络类型目前支持vpc<br/><br>  \- 线路目前支持联通un、电信ct、移动cm<br/><br>  \- 支持不启用外网，如果启用外网，带宽范围[1,200] 单位Mbps<br/><br>- 其他<br/><br>  \- 购买时长，可按年或月购买：月取值范围[1,9], 年取值范围[1,3]<br/><br>  \- 密码设置参考公共参数规范<br/><br>|
|**createKeypairs**|PUT|创建密钥对|
|**createSecondaryCidr**|PUT|添加次要CIDR|
|**createSubnet**|PUT|创建子网|
|**createVpc**|PUT|创建私有网络|
|**deleteAliasIp**|DELETE|删除别名IP|
|**deleteBandwidthPackage**|DELETE|删除共享带宽<br>|
|**deleteInstance**|DELETE|删除单台云物理物理服务器，只能删除运行running、停止stopped、错误error状态的服务器<br/><br>不能删除没有计费信息的服务器<br/><br>|
|**deleteKeypairs**|DELETE|删除密钥对|
|**deleteSecondaryCidr**|DELETE|删除次要CIDR|
|**deleteSubnet**|DELETE|删除子网|
|**deleteVpc**|DELETE|删除私有网络<br>|
|**deleteelasticIp**|DELETE|删除弹性公网IP<br>|
|**describeAliasIps**|GET|查询别名IP列表|
|**describeAvailablePrivateIp**|GET|查询可用的私有IP列表|
|**describeBandwidthPackage**|GET|查询共享带宽详情|
|**describeBandwidthPackageStock**|GET|查询共享带宽库存|
|**describeBandwidthPackages**|GET|查询弹性公网IP列表<br/><br>支持分页查询，默认每页20条<br/><br>|
|**describeDeviceRaids**|GET|查询某种实例类型的分布式云物理服务器支持的RAID类型，可查询系统盘RAID类型和数据盘RAID类型|
|**describeDeviceStock**|GET|查询分布式云物理服务器库存|
|**describeDeviceTypes**|GET|查询分布式云物理服务器实例类型|
|**describeEdCPSRegions**|GET|查询分布式分布式云物理服务器地域列表|
|**describeElasticIp**|GET|查询弹性公网IP详情|
|**describeElasticIpStock**|GET|查询弹性公网IP库存|
|**describeElasticIps**|GET|查询弹性公网IP列表<br/><br>支持分页查询，默认每页20条<br/><br>|
|**describeInstance**|GET|查询单台分布式云物理服务器详细信息|
|**describeInstanceName**|GET|查询分布式云物理服务器名称|
|**describeInstanceRaid**|GET|查询单个分布式云物理服务器已安装的RAID信息，包括系统盘RAID信息和数据盘RAID信息|
|**describeInstanceStatus**|GET|查询单个分布式云物理服务器硬件监控信息|
|**describeInstances**|GET|批量查询分布式云物理服务器详细信息<br/><br>支持分页查询，默认每页20条<br/><br>|
|**describeKeypair**|GET|查询密钥对详情|
|**describeKeypairs**|GET|查询密钥对列表|
|**describeLineTypes**|GET|查询链路类型|
|**describeOS**|GET|查询分布式云物理服务器支持的操作系统|
|**describeSecondaryCidrs**|GET|查询次要CIDR列表|
|**describeSubnet**|GET|查询子网详情|
|**describeSubnets**|GET|查询子网列表|
|**describeVpc**|GET|查询私有网络详情|
|**describeVpcs**|GET|查询私有网络列表|
|**disassociateElasticIp**|PUT|解绑弹性公网IP<br>|
|**importKeypairs**|PUT|导入密钥对|
|**modifyBandwidthPackage**|POST|修改共享带宽<br>|
|**modifyBandwidthPackageBandwidth**|PUT|修改共享带宽的带宽<br>|
|**modifyElasticIpBandwidth**|PUT|修改弹性公网IP带宽<br>|
|**modifyInstance**|POST|修改分布式云物理服务器部分信息，包括名称、描述|
|**modifySubnet**|POST|修改子网|
|**modifyVpc**|POST|修改私有网络<br>|
|**reinstallInstance**|PUT|重装分布式云物理服务器，只能重装stopped状态的服务器<br/><br>- 可调用接口（describeOS）获取分布式云物理服务器支持的操作系统列表<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>|
|**removeBandwidthPackageIp**|PUT|移除共享带宽IP<br>|
|**resetPassword**|PUT|重置分布式云物理服务器密码<br>|
|**restartInstance**|PUT|重启单台分布式云物理服务器，只能重启running状态的服务器<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>|
|**startInstance**|PUT|对单台分布式云物理服务器执行开机操作，只能启动stopped状态的服务器|
|**stopInstance**|PUT|对单台分布式云物理服务器执行关机操作，只能停止running状态的服务器<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>|
