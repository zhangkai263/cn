# 支持IAM的云产品

本文主要介绍目前IAM支持的京东云服务，以及各云服务支持的授权粒度、系统策略及其产品文档。

对于不同的云服务，授权粒度分为服务级、操作级和资源级三个级别。

- 服务级：该云产品只能在服务级别整体授权，有访问权限或没有访问权限，而不支持对某一个具体操作授权；
- 操作级：该云产品支持对指定API进行授权，而不支持对具体资源、实例或数据项进行授权；例如，可以授权查询、更新主机安全的检查任务，但不能区分具体的检查任务项权限；
- 资源级：该云产品支持对指定API和API操作的指定资源对象进行授权，这是最细的授权粒度；例如，可以授权只有某一台或某几台云主机的查询、重启权限，但不能查询和操作其他云主机。

## 弹性计算

|   **云产品**   | **Service Name**  | **授权粒度** |                           系统策略                           |
| :------------: | :---------------: | :----------: | :----------------------------------------------------------: |
|     云主机     |        vm         |    资源级    |  JDCloudVirtualMachineAdmin<br />JDCloudVirtualMachineRead   |
|     云硬盘     |       disk        |    资源级    |            JDCloudDiskAdmin<br />JDCloudDiskRead             |
|    原生容器    |  nativecontainer  |    资源级    | JDCloudNativeContainerAdmin<br />JDCloudNativeContainerRead  |
|      POD       |        pod        |    资源级    |             JDCloudPodAdmin<br />JDCloudPodRead              |
| Kubernetes集群 |    kubernetes     |    资源级    |      JDCloudKubernetesAdmin<br />JDCloudKubernetesRead       |
|    高可用组    |        ag         |    资源级    |  JDCloudAvailableGroupAdmin<br />JDCloudAvailableGroupRead   |
|  容器镜像仓库  | containerregistry |    资源级    | JDCloudContainerRegistryAdmin<br />JDCloudContainerRegistryRead<br />JDCloudContainerRegistryUpdate |
|    函数服务    |     function      |    资源级    |        JDCloudFunctionAdmin<br />JDCloudFunctionRead         |
|  自动任务策略  |  autotaskpolicy   |    资源级    |  JDCloudAutoTaskPolicyAdmin<br />JDCloudAutoTaskPolicyRead   |
|   专有宿主机   |        dh         |    资源级    |              JDCloudDHAdmin<br />JDCloudDHRead               |
|   实例抵扣券   |  instancevoucher  |    资源级    | JDCloudInstanceVoucherAdmin<br />JDCloudInstanceVoucherRead  |

## 网络

| **云产品** | **Service Name** | **授权粒度** |                    **系统策略**                     |
| :--------: | :--------------: | :----------: | :-------------------------------------------------: |
|  负载均衡  |        lb        |    资源级    | JDCloudLoadBalanceAdmin<br />JDCloudLoadBalanceRead |
|  私有网络  |       vpc        |    资源级    |         JDCloudVpcAdmin<br />JDCloudVpcRead         |

## 数据库与缓存

|         **云产品**         | **Service Name** | **授权粒度** |                   **系统策略**                    |
| :------------------------: | :--------------: | :----------: | :-----------------------------------------------: |
|        云数据库RDS         |       rds        |    资源级    |        JDCloudRDSAdmin<br />JDCloudRDSRead        |
|      云数据库MongoDB       |     mongodb      |    资源级    |    JDCloudMongoDBAdmin<br />JDCloudMongoDBRead    |
| 分布式关系型数据库（DRDS） |       drds       |    资源级    |       JDCloudDRDSAdmin<br />JDCloudDRDSRead       |
|        云缓存Redis         |      redis       |    资源级    |      JDCloudRedisAdmin<br />JDCloudRedisRead      |
|      云缓存Memcached       |    memcached     |    资源级    |  JDCloudMemcachedAdmin<br />JDCloudMemcachedRead  |
|    分析型云数据库 JCHDB    |    clickhouse    |    资源级    | JDCloudClickhouseAdmin<br />JDCloudClickhouseRead |
|       数据库备份 DBS       |       dbs        |    资源级    |        JDCloudDBSAdmin<br />JDCloudDBSRead        |
|      数据传输服务DTS       |       dts        |    资源级    |        JDCloudDTSAdmin<br />JDCloudDTSRead        |
|     云数据库 Greenplum     |       jdw        |    资源级    |        JDCloudJDWAdmin<br />JDCloudJDWRead        |
|     分布式数据库 TiDB      |       tidb       |    资源级    |       JDCloudTiDBAdmin<br />JDCloudTiDBRead       |
|     云数据库 InfluxDB      |       tsds       |    资源级    |       JDCloudTSDSAdmin<br />JDCloudTSDSRead       |

## 存储

| **云产品** | **Service Name** | **授权粒度** |                         **系统策略**                         |
| :--------: | :--------------: | :----------: | :----------------------------------------------------------: |
|  对象存储  |       oss        |    资源级    | JDCloudOSSAdmin<br />JDCloudOSSRead<br />JDCloudOSSReadOP<br />JDCloudOSSObjectManagement |
| 云文件服务 |       zfs        |    资源级    |             JDCloudcfsAdmin<br />JDCloudcfsRead              |

## 边缘与加速

| **云产品** | **Service Name** | **授权粒度** |                         **系统策略**                         |
| :--------: | :--------------: | :----------: | :----------------------------------------------------------: |
|    CDN     |       cdn        |    资源级    | JDCloudCDNAdmin<br />JDCloudCDNRead<br />JDCloudCDNDomainCreation<br />JDCloudCDNQueryDomainConfiguration<br />JDCloudCDNDeleteDomain<br />JDCloudCDNModifyDomainConfiguration<br />JDCloudCDNStatisticReport<br />JDCloudCDNRefreshAndPrefetch |

## 云安全

|  **云产品**   | **Service Name** | **授权粒度** |                         **系统策略**                         |
| :-----------: | :--------------: | :----------: | :----------------------------------------------------------: |
| DDoS基础防护  |     baseanti     |    资源级    |        JDCloudBaseantiAdmin<br />JDCloudBaseantiRead         |
|  DDoS防护包   |     antipro      |    资源级    |         JDCloudAntiproAdmin<br />JDCloudAntiproRead          |
| Web应用防火墙 |       waf        |    资源级    |             JDCloudWafAdmin<br />JDCloudWafRead              |
|    IP高防     |      ipanti      |    资源级    |          JDCloudIpantiAdmin<br />JDCloudIpantiRead           |
| 应用安全网关  |       sgw        |    资源级    |             JDCloudSgwAdmin<br />JDCloudSgwRead              |
|   主机安全    |       hips       |    操作级    |            JDCloudHipsAdmin<br />JDCloudHipsRead             |
|   态势感知    |       csa        |    操作级    |             JDCloudCsaAdmin<br />JDCloudCsaRead              |
|  SSL数字证书  |       ssl        |    资源级    |             JDCloudSSLAdmin<br />JDCloudSSLRead              |
| 密钥管理服务  |       kms        |    资源级    | JDCloudKMSAdmin<br />JDCloudKMSRead<br />JDCloudKMSDataOperation |
| 网站威胁扫描  |  threatscanner   |    操作级    |   JDCloudThreatScannerAdmin<br />JDCloudThreatScannerRead    |
|   资产中心    |   assetcenter    |    资源级    |     JDCloudAssetcenterAdmin<br />JDCloudAssetcenterRead      |
|   风险识别    |       bri        |    操作级    |             JDCloudBriAdmin<br />JDCloudBriRead              |
|   内容安全    |      censor      |    资源级    |          JDCloudCensorAdmin<br />JDCloudCensorRead           |
|  数据库审计   |     dbaudit      |    资源级    | JDCloudDBAuditAdmin<br />JDCloudDBAuditRead<br />JDCloudDBAuditSecAdmin |
| 数据安全中心  |       dcap       |    资源级    | JDCloudDcapAdmin<br />JDCloudDcapRead<br />JDCloudDcapEncryptor |

## 管理

|  **云产品**  | **Service Name** | **授权粒度** |                         **系统策略**                         |
| :----------: | :--------------: | :----------: | :----------------------------------------------------------: |
|   资源编排   |       jdro       |    资源级    |            JDCloudJDROAdmin<br />JDCloudJDRORead             |
|   目录服务   | directoryservice |    资源级    | JDCloudDirectoryServiceAdmin<br />JDCloudDirectoryServiceRead |
|   日志服务   |       logs       |    资源级    |            JDCloudLogsAdmin<br />JDCloudLogsRead             |
|   操作审计   |    audittrail    |    操作级    |                    JDCloudAuditTrailAdmin                    |
|   访问控制   |       iam        |    资源级    | JDCloudIAMAdmin<br />JDCloudIAMRead<br />JDCloudIAMSubUserManagement<br />JDCloudIAMGroupManagement<br />JDCloudIAMPolicyManagement<br />JDCloudIAMRoleManagement<br />JDCloudIAMPasswordPolicySetting |
| 安全令牌服务 |       sts        |    资源级    |                       JDCloudStsAdmin                        |
|   续费管理   |     renewal      |    操作级    |                     JDCloudRenewalAdmin                      |
|   标签管理   |   resourcetag    |    操作级    |     JDCloudResourceTagAdmin<br />JDCloudResourceTagRead      |
|   身份认证   |       ias        |    资源级    | JDCloudIdentityAuthenticationAdmin<br />JDCloudIdentityAuthenticationRead |
|   合同管理   |     contract     |    服务级    |                     JDCloudContractAdmin                     |
|   工单管理   |      ticket      |    资源级    |          JDCloudTicketAdmin<br />JDCloudTicketRead           |

## 监控与运维

| **云产品** | **Service Name** | **授权粒度** |                         **系统策略**                         |
| :--------: | :--------------: | :----------: | :----------------------------------------------------------: |
|   云监控   |     monitor      |    操作级    | JDCloudMonitorAdmin<br />JDCloudMonitorRead<br />JDCloudMonitorModule |
|   堡垒机   |     bastion      |    资源级    |     JDCloudBastionHostAdmin<br />JDCloudBastionHostRead      |
|   云拨测   |    detection     |    资源级    |       JDCloudDetectionAdmin<br />JDCloudDetectionRead        |
|   云事件   |      events      |    资源级    |          JDCloudEventsAdmin<br />JDCloudEventsRead           |

## 域名与备案

| **云产品** | **Service Name** | **授权粒度** |                      **系统策略**                       |
| :--------: | :--------------: | :----------: | :-----------------------------------------------------: |
| 云解析DNS  |  domainservice   |    资源级    | JDCloudDomainServiceAdmin<br />JDCloudDomainServiceRead |
|  HTTPDNS   |     httpdns      |    操作级    |       JDCloudHTTPDNSAdmin<br />JDCloudHTTPDNSRead       |

## 视频服务

|  **云产品**  | **Service Name** | **授权粒度** |                **系统策略**                 |
| :----------: | :--------------: | :----------: | :-----------------------------------------: |
|   视频直播   |       live       |    操作级    | JDCloudHTTPDNSAdmin<br />JDCloudHTTPDNSRead |
|   视频点播   |       vod        |    操作级    |     JDCloudVodAdmin<br />JDCloudVodRead     |
|   视频电商   |      elive       |    操作级    |              JDCloudEliveAdmin              |
| 视频质量检测 |       vqd        |    资源级    |     JDCloudVQDAdmin<br />JDCloudVQDRead     |

## 大数据与分析

| **云产品**  | **Service Name** | **授权粒度** |            **系统策略**             |
| :---------: | :--------------: | :----------: | :---------------------------------: |
| 数据工厂2.0 |   datafactory    |    服务级    |       JDCloudDataFactoryAdmin       |
|     JMR     |       jmr        |    资源级    | JDCloudJMRAdmin<br />JDCloudJMRRead |

## 互联网中间件

|      **云产品**       | **Service Name** | **授权粒度** |                         **系统策略**                         |
| :-------------------: | :--------------: | :----------: | :----------------------------------------------------------: |
|      消息队列JCQ      |       jcq        |    资源级    | JDCloudJCQAdmin<br />JDCloudJCQRead<br />JDCloudJCQPub<br />JDCloudJCQSub<br />JDCloudJCQTopicManagement |
|        API网关        |    apigateway    |    资源级    |      JDCloudApiGatewayAdmin<br />JDCloudApiGatewayRead       |
|  云搜索Elasticsearch  |        es        |    资源级    |   JDCloudElasticSearchAdmin<br />JDCloudElasticSearchRead    |
|       队列服务        |       jqs        |    资源级    | JDCloudQueueServiceAdmin<br />JDCloudQueueServiceManageQueue<br />JDCloudQueueServiceProduceMessage<br />JDCloudQueueServiceConsumeMessage<br />JDCloudQueueServiceTriggerFunction |
|      微服务平台       |       jdsf       |    资源级    |            JDCloudJDSFAdmin<br />JDCloudJDSFRead             |
| 消息队列  RabbitMQ 版 |     rabbitmq     |    资源级    |        JDCloudRabbitMQAdmin<br />JDCloudRabbitMQRead         |
|       Zookeeper       |        zk        |    资源级    |              JDCloudZKAdmin<br />JDCloudZKRead               |
|     消息队列Kafka     |      kafka       |    资源级    |           JDCloudKafkaAdmin<br />JDCloudKafkaRead            |

## 智能IDC

|    **云产品**    | **Service Name** | **授权粒度** |                         **系统策略**                         |
| :--------------: | :--------------: | :----------: | :----------------------------------------------------------: |
|   云物理服务器   |       cps        |    资源级    | JDCloudPhysicalServiceAdmin<br />JDCloudPhysicalServiceRead<br />JDCloudPhysicalServiceNetworkAdmin |
|    云托管服务    |      jdccs       |    服务级    |                  JDCloudCabinetServiceRead                   |
|   云物理服务器   |      edcps       |    资源级    | JDDistributedCloudPhysicalServiceAdmin<br />JDDistributedCloudPhysicalServiceRead<br />JDDistributedCloudPhysicalServiceNetworkAdmin |
| 边缘物理计算服务 |       epcs       |    资源级    | JDEdgePhysicalComputingServiceAdmin<br />JDEdgePhysicalComputingServiceRead |

## 费用中心

| **云产品** | **Service Name** | **授权粒度** |                         **系统策略**                         |
| :--------: | :--------------: | :----------: | :----------------------------------------------------------: |
|  订单管理  |      order       |    操作级    |          JDCloudOrderAdmin<br />JDCloudOrderPayment          |
|  发票管理  |     invoice      |    操作级    |                     JDCloudInvoiceAdmin                      |
|  消费管理  |     billing      |    操作级    |         JDCloudBillingAdmin<br />JDCloudBillingRead          |
|  结算管理  |    settlement    |    操作级    |                    JDCloudSettlementAdmin                    |
|  资金管理  |      asset       |    操作级    | JDCloudAssetAdmin<br />JDCloudAssetcenterAdmin<br />JDCloudAssetcenterRead |
|  费用中心  |    costcenter    |    服务级    |                    JDCloudCostCenterAdmin                    |
| 代金券管理 |      coupon      |    操作级    |                      JDCloudCouponAdmin                      |
|  积分兑换  |      reward      |    服务级    |                      JDCloudRewardAdmin                      |

## 渠道管理

| **云产品** | **Service Name** | **授权粒度** |    **系统策略**     |
| :--------: | :--------------: | :----------: | :-----------------: |
|  渠道管理  |     partner      |    操作级    | JDCloudPartnerAdmin |

## 开发者工具

| **云产品** | **Service Name**  | **授权粒度** |                   **系统策略**                    |
| :--------: | :---------------: | :----------: | :-----------------------------------------------: |
|  代码托管  |    codecommit     |    服务级    |              JDCloudCodeCommitAdmin               |
|   云编译   |      compile      |    资源级    |    JDCloudCompileAdmin<br />JDCloudCompileRead    |
|   云部署   |      deploy       |    资源级    | JDCloudCodeDeployAdmin<br />JDCloudCodeDeployRead |
|   流水线   |     pipeline      |    资源级    |   JDCloudPipelineAdmin<br />JDCloudPipelineRead   |
| 制品库私库 | artifacts_private |    资源级    |           JDCloudArtifacts_PrivateAdmin           |

## 物联网

|   **云产品**   | **Service Name** | **授权粒度** |                        **系统策略**                         |
| :------------: | :--------------: | :----------: | :---------------------------------------------------------: |
|   物联网引擎   |     iotcore      |    操作级    |         JDCloudIOTCoreAdmin<br />JDCloudIOTCoreRead         |
| 物联网协议适配 | iotcloudgateway  |    操作级    | JDCloudIOTCloudGatewayAdmin<br />JDCloudIOTCloudGatewayRead |
|   物联网中心   |      iothub      |    资源级    |          JDCloudIOTHubAdmin<br />JDCloudIOTHubRead          |

## 云通信

| **云产品** | **Service Name** | **授权粒度** |  **系统策略**  |
| :--------: | :--------------: | :----------: | :------------: |
|  短信服务  |       sms        |    服务级    | JDCloudSMSSend |

## 人工智能

|    **云产品**    | **Service Name** | **授权粒度** |      **系统策略**      |
| :--------------: | :--------------: | :----------: | :--------------------: |
| 一站式AI开发平台 |    neufoundry    |    服务级    | JDCloudNeuFoundryAdmin |

## 测试管理

| **云产品** | **Service Name** | **授权粒度** |     **系统策略**     |
| :--------: | :--------------: | :----------: | :------------------: |
|  性能测试  |     perftest     |    服务级    | JDCloudPerftestAdmin |

