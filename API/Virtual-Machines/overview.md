# 云主机


## 简介
云主机实例、镜像、实例规格、实例模板、配额相关的接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**associateElasticIp**|POST|为云主机主网卡的主内网IP绑定弹性公网IP。<br>一台云主机的主网卡的主内网IP只能绑定一个弹性公网IP，若已绑定弹性公网IP，操作绑定会返回错误。<br>|
|**attachDisk**|POST|为一台云主机挂载一块云硬盘，云主机和云硬盘没有正在进行中的的任务时才可挂载。<br>云主机状态必须是<b>running</b>或<b>stopped</b>状态。<br>本地盘(local类型)做系统盘的云主机可挂载8块云硬盘，云硬盘(cloud类型)做系统盘的云主机可挂载除系统盘外7块云硬盘。<br>|
|**attachNetworkInterface**|POST|云主机绑定一块弹性网卡。<br>云主机状态必须为<b>running</b>或<b>stopped</b>状态，并且没有正在进行中的任务才可操作。<br>弹性网卡上如果绑定了弹性公网IP，那么其所在az需要与云主机的az保持一致，或者为全可用区型弹性公网IP，才可挂载该网卡。<br>云主机挂载弹性网卡的数量，不能超过实例规格的限制。可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeinstancetypes">DescribeInstanceTypes</a>接口获得指定规格可挂载弹性网卡的数量上限。<br>弹性网卡与云主机必须在相同vpc下。<br>|
|**copyImages**|POST|镜像跨区复制，将私有镜像复制到其它地域下，只允许操作您的个人私有镜像。<br>只支持rootDeviceType为cloudDisk的云硬盘系统盘镜像操作。<br>|
|**createImage**|POST|为云主机创建私有镜像。云主机状态必须为<b>stopped</b>。<br>云主机没有正在进行中的任务才可制作镜像。<br>制作镜像以备份系统盘为基础，在此之上可选择全部或部分挂载数据盘制作整机镜像（如不做任何更改将默认制作整机镜像），制作镜像过程会为所挂载云硬盘创建快照并与镜像关联。<br>调用接口后，需要等待镜像状态变为<b>ready</b>后，才能正常使用镜像。<br>|
|**createInstanceTemplate**|POST|创建一个指定参数的启动模板，启动模板中包含创建云主机时的大部分配置参数，避免每次创建云主机时的重复性工作。<br>如果是使用启动模板创建云主机，如果指定了某些参数与模板中的参数相冲突，那么新指定的参数会替换模板中的参数。<br>如果是使用启动模板创建云主机，如果指定了镜像ID与模板中的镜像ID不一致，那么模板中的dataDisks参数会失效。<br>如果使用高可用组(Ag)创建云主机，那么Ag所关联的模板中的参数都不可以被调整，只能以模板为准。<br>|
|**createInstances**|POST|创建一台或多台指定配置的云主机，创建模式分为三种：1.普通方式、2.使用高可用组、3.使用启动模板。三种方式创建云主机时参数的必传与非必传是不同的，具体请参考<a href="http://docs.jdcloud.com/virtual-machines/api/create_vm_sample">参数详细说明</a><br>- 创建云主机需要通过实名认证<br>- 实例规格<br>    \- 可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeinstancetypes">DescribeInstanceTypes</a>接口获得指定地域或可用区的规格信息。<br>    \- 不能使用已下线、或已售馨的规格ID<br>- 镜像<br>    \- Windows Server所有镜像CPU不可选超过64核CPU。<br>    \- 可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeimages">DescribeImages</a>接口获得指定地域的镜像信息。<br>    \- 选择的镜像必须支持选择的实例规格。可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeimageconstraints">DescribeImageConstraints</a>接口获得指定镜像的实例规格限制信息。<br>- 网络配置<br>    \- 指定主网卡配置信息<br>        \- 必须指定subnetId<br>        \- 可以指定elasticIp规格来约束创建的弹性IP，带宽取值范围[1-200]Mbps，步进1Mbps<br>        \- 可以指定主网卡的内网主IP(primaryIpAddress)，此时maxCount只能为1<br>        \- 安全组securityGroup需与子网Subnet在同一个私有网络VPC内<br>        \- 一台云主机创建时必须至少指定一个安全组，至多指定5个安全组，如果没有指定安全组，默认使用默认安全组<br>        \- 主网卡deviceIndex设置为1<br>- 存储<br>    \- 系统盘<br>        \- 磁盘分类，系统盘支持local或cloud<br>        \- 磁盘大小<br>            \- local：不能指定大小，默认为40GB<br>            \- cloud：取值范围: 40-500GB，并且不能小于镜像的最小系统盘大小，如果没有指定，默认以镜像中的系统盘大小为准<br>        \- 自动删除<br>            \- 如果是local类型，默认自动删除，不可修改<br>            \- 如果是cloud类型的按配置计费的云硬盘，默认为True，可修改<br>            \- 如果是cloud类型的包年包月的云硬盘，默认为False，不可修改<br>    \- 数据盘<br>        \- 磁盘分类，数据盘仅支持cloud<br>        \- 云硬盘类型可以选择ssd、premium-hdd、hdd.std1、ssd.gp1、ssd.io1<br>        \- 磁盘大小<br>            \- premium-hdd：范围[20,3000]GB，步长为10G<br>            \- ssd：范围[20,1000]GB，步长为10G<br>            \- hdd.std1、ssd.gp1、ssd.io1: 范围[20-16000]GB，步长为10GB<br>        \- 自动删除<br>            \- 默认自动删除，如果是包年包月的云硬盘，此参数不生效<br>        \- 可以从快照创建磁盘<br>    \- iops<br>        \- 仅当云盘类型为ssd.io1时，可指定iops值，范围为【200， min（32000，size * 50 ）】，步长为10，若不指定则按此公式计算默认值<br>    \- local类型系统的云主机可以挂载8块云硬盘<br>    \- cloud类型系统的云主机可以挂载7块云硬盘<br>- 计费<br>    \- 弹性IP的计费模式，如果选择按用量类型可以单独设置，其它计费模式都以主机为准<br>    \- 云硬盘的计费模式以主机为准<br>- 其他<br>    \- 创建完成后，主机状态为running<br>    \- 仅Linux系统云主机可以指定密钥<br>    \- maxCount为最大努力，不保证一定能达到maxCount<br>    \- 虚机的az会覆盖磁盘的az属性<br>- 密码<br>    \- <a href="http://docs.jdcloud.com/virtual-machines/api/general_parameters">参考公共参数规范</a><br>|
|**createKeypair**|POST|创建ssh密钥对。公钥部分存储在京东云，并返回未加密的 PEM 编码的 PKCS#8 格式私钥，您只有一次机会保存您的私钥。请妥善保管。<br>若传入已存在的密钥名称，会返回错误。<br>|
|**deleteImage**|DELETE|删除一个私有镜像，只允许操作您的个人私有镜像。<br>若镜像已共享给其他用户，需先取消共享才可删除。<br>|
|**deleteInstance**|DELETE|删除按配置计费、或包年包月已到期的单个云主机。不能删除没有计费信息的云主机。<br>云主机状态必须为运行<b>running</b>、停止<b>stopped</b>、错误<b>error</b>，同时云主机没有正在进行中的任务才可删除。<br>如果主机中挂载的数据盘为按配置计费的云硬盘且AutoDelete属性为true，那么数据盘会随主机一起删除。<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>|
|**deleteInstanceTemplate**|DELETE|删除一个启动模板<br>|
|**deleteKeypair**|DELETE|删除ssh密钥对。<br>|
|**describeBriefInstances**|POST|批量查询云主机信息的轻量接口，不返回云盘、网络、计费、标签等信息。如果不需要关联资源属性，尽量选择使用该接口。<br>此接口支持分页查询，默认每页20条。<br>|
|**describeImage**|GET|查询镜像详情。<br>|
|**describeImageConstraints**|GET|查询镜像的实例规格限制。<br>通过此接口可以查看镜像不支持的实例规格。只有官方镜像、第三方镜像有实例规格的限制，个人的私有镜像没有此限制。<br>|
|**describeImageConstraintsBatch**|GET|批量查询镜像的实例规格限制。<br>通过此接口可以查看镜像不支持的实例规格。只有官方镜像、第三方镜像有实例规格的限制，个人的私有镜像没有此限制。<br>|
|**describeImageMembers**|GET|查询镜像共享帐户列表，只允许操作您的个人私有镜像。<br>|
|**describeImages**|GET|查询镜像信息列表。<br>通过此接口可以查询到京东云官方镜像、第三方镜像、私有镜像、或其他用户共享给您的镜像。<br>此接口支持分页查询，默认每页20条。<br>|
|**describeInstance**|GET|查询一台云主机的详细信息<br>|
|**describeInstancePrivateIpAddress**|GET|批量查询云主机内网IP地址，查询的是主网卡内网主IP地址。|
|**describeInstanceStatus**|GET|批量查询云主机状态|
|**describeInstanceTemplate**|GET|查询启动模板详情<br>|
|**describeInstanceTemplates**|GET|查询启动模板列表<br>|
|**describeInstanceTypes**|GET|查询实例规格信息列表<br>|
|**describeInstanceVncUrl**|GET|获取云主机vnc，用于连接管理云主机。<br>vnc地址的有效期为1个小时，调用接口获取vnc地址后如果1个小时内没有使用，vnc地址自动失效，再次使用需要重新获取。<br>|
|**describeInstances**|GET|批量查询云主机的详细信息<br>此接口支持分页查询，默认每页20条。<br>|
|**describeKeypairs**|GET|批量查询密钥对。<br>此接口支持分页查询，默认每页20条。<br>|
|**describeQuotas**|GET|查询配额，支持的类型：云主机、镜像、密钥、模板、镜像共享。<br>|
|**detachDisk**|POST|云主机缷载云硬盘，云主机和云硬盘没有正在进行中的任务时才可缷载。<br>|
|**detachNetworkInterface**|POST|云主机缷载一块弹性网卡。<br>云主机状态必须为<b>running</b>或<b>stopped</b>状态，并且没有正在进行中的任务才可操作。<br>不能缷载主网卡。<br>|
|**disassociateElasticIp**|POST|云主机解绑弹性公网IP，解绑的是主网卡、内网主IP对应的弹性公网IP。<br>|
|**exportImage**|POST|导出镜像，将京东云私有镜像导出至京东云以外环境<br>|
|**imageTasks**|GET|查询镜像导入导出任务详情<br>|
|**importImage**|POST|导入镜像，将外部镜像导入到京东云中<br>|
|**importKeypair**|POST|导入由其他工具生成的密钥对的公钥部分。<br>若传入已存在的密钥名称，会返回错误。<br>|
|**modifyImageAttribute**|POST|修改镜像信息，包括名称、描述；只允许操作您的个人私有镜像。<br>|
|**modifyInstanceAttribute**|POST|修改云主机部分信息，包括名称、描述。<br>|
|**modifyInstanceDiskAttribute**|POST|修改云主机挂载的数据盘属性，包括是否随主机删除。<br>仅按配置计费云硬盘支持设置随实例删除属性;包年包月计费云硬盘该属性不生效,实例删除时云硬盘将保留。<br>|
|**modifyInstanceNetworkAttribute**|POST|修改虚机弹性网卡属性，包括是否随云主机一起删除。<br>不能修改主网卡。<br>|
|**modifyInstancePassword**|POST|修改云主机密码，主机没有正在进行中的任务时才可操作。<br>修改密码后，需要重启云主机后生效。<br>|
|**rebootInstance**|POST|重启单个云主机，只能重启<b>running</b>状态的云主机，云主机没有正在进行中的任务才可重启。<br>|
|**rebuildInstance**|POST|云主机使用指定镜像重置云主机系统<br>云主机的状态必须为<b>stopped</b>状态。<br>若不指定镜像ID，默认使用当前主机的原镜像重置系统。<br>云主机系统盘类型必须与待更换镜像支持的系统盘类型保持一致，若当前云主机系统盘为local类型，则更换镜像的系统盘类型必须为loaclDisk类型；同理，若当前云主机系统盘为cloud类型，则更换镜像的系统盘类型必须为cloudDisk类型。可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeimages">DescribeImages</a>接口获得指定地域的镜像信息。<br>指定的镜像必须能够支持当前主机的实例规格(instanceType)，否则会返回错误。可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeimageconstraints">DescribeImageConstraints</a>接口获得指定镜像支持的系统盘类型信息。<br>|
|**releaseImage**|POST|发布社区镜像，只允许操作您的个人私有镜像。发布为社区镜像后会撤销共享关系。<br>|
|**resizeInstance**|POST|云主机变更实例规格<br>云主机的状态必须为<b>stopped</b>状态。<br>以下情况的云主机，不允许在一代与二代实例规格间互相调整，例：不允许g.n1与g.n2之间互相调配<br>1、16年创建的云硬盘做系统盘的云主机<br>2、本地盘(local类型)做系统盘的云主机。<br>3、使用高可用组(Ag)创建的云主机。<br>如果当前主机中的弹性网卡数量，大于新实例规格允许的弹性网卡数量，会返回错误。可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeinstancetypes">DescribeInstanceTypes</a>接口获得指定地域及可用区下的实例规格信息。<br>当前主机所使用的镜像，需要支持要变更的目标实例规格，否则返回错误。可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeimageconstraints">DescribeImageConstraints</a>接口获得指定镜像的实例规格限制信息。<br>云主机欠费或到期时，无法更改实例规格。<br>|
|**shareImage**|POST|共享镜像，只允许操作您的个人私有镜像，单个镜像最多可共享给20个京东云帐户。<br>整机镜像目前不支持共享。<br>|
|**startInstance**|POST|启动单个云主机，只能启动<b>stopped</b>状态的云主机，云主机没有正在进行中的任务才可启动。<br>只能启动正常计费状态的云主机，若已欠费停服或到期停服则不支持启动。<br>|
|**stopInstance**|POST|停止单个云主机，只能停止<b>running</b>状态的云主机，云主机没有正在进行中的任务才可停止<br>|
|**unReleaseImage**|POST|撤销社区镜像，只允许操作您的个人私有镜像。<br>|
|**unShareImage**|POST|取消共享镜像，只允许操作您的个人私有镜像。<br>|
|**updateInstanceTemplate**|PATCH|修改一个启动模板的信息，包括名称、描述<br>|
|**verifyInstanceTemplate**|GET|校验启动模板的有效性<br>|
