# describePod


## 描述
查询一个 pod 的详细信息


## 请求方式
GET

## 请求地址
https://pod.jdcloud-api.com/v1/regions/{regionId}/pods/{podId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**podId**|String|True| |Pod ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describepod#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pod**|[Pod](describepod#pod)| |
### <div id="pod">Pod</div>
|名称|类型|描述|
|---|---|---|
|**podId**|String|pod ID|
|**name**|String|pod 名称|
|**description**|String|描述信息，默认为空。|
|**az**|String|可用区|
|**hostname**|String|主机名|
|**instanceType**|String|pod 所需的计算资源规格|
|**restartPolicy**|String|pod重启策略|
|**terminationGracePeriodSeconds**|Integer|优雅关闭的时间|
|**vpcId**|String|主网卡所属vpcId|
|**subnetId**|String|主网卡所属子网的ID|
|**privateIpAddress**|String|主网卡主IP地址|
|**dnsConfig**|[DnsConfig](describepod#dnsconfig)|pod内容器的/etc/resolv.conf配置|
|**logConfig**|[LogConfig](describepod#logconfig)|容器日志配置信息；默认会在本地分配10MB的存储空间|
|**hostAliases**|[HostAlias[]](describepod#hostalias)|pod内容器的/etc/hosts配置|
|**volumes**|[Volume[]](describepod#volume)|属于Pod的volume列表，提供挂载到containers上。|
|**containers**|[Container[]](describepod#container)|pod内的容器信息|
|**podStatus**|[PodStatus](describepod#podstatus)|pod状态信息|
|**elasticIp**|[ElasticIp](describepod#elasticip)|主网卡主IP关联的弹性IP规格|
|**primaryNetworkInterface**|[NetworkInterfaceAttachment](describepod#networkinterfaceattachment)|主网卡配置信息|
|**tags**|[Tag[]](describepod#tag)| |
|**charge**|[Charge](describepod#charge)|计费配置；如不指定，默认计费类型是后付费-按使用时常付费|
|**createTime**|String|Pod创建时间|
### <div id="charge">Charge</div>
|名称|类型|描述|
|---|---|---|
|**chargeMode**|String|支付模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration|
|**chargeStatus**|String|费用支付状态，取值为：normal、overdue、arrear，normal表示正常，overdue表示已到期，arrear表示欠费|
|**chargeStartTime**|String|计费开始时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**chargeExpiredTime**|String|过期时间，预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ，后付费资源此字段内容为空|
|**chargeRetireTime**|String|预期释放时间，资源的预期释放时间，预付费/后付费资源均有此值，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
### <div id="tag">Tag</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|Tag键|
|**value**|String|Tag值|
### <div id="networkinterfaceattachment">NetworkInterfaceAttachment</div>
|名称|类型|描述|
|---|---|---|
|**autoDelete**|Boolean|指明删除pod时是否删除网卡。|
|**deviceIndex**|Integer|设备Index，目前pod只支持一个网卡，所以只能设置为1|
|**attachStatus**|String|绑定状态|
|**attachTime**|String|绑定时间|
|**networkInterface**|[InstanceNetworkInterface](describepod#instancenetworkinterface)|网卡接口规范|
### <div id="instancenetworkinterface">InstanceNetworkInterface</div>
|名称|类型|描述|
|---|---|---|
|**networkInterfaceId**|String|弹性网卡ID|
|**macAddress**|String|以太网地址|
|**vpcId**|String|虚拟网络ID|
|**subnetId**|String|子网ID|
|**description**|String|描述|
|**securityGroups**|[SecurityGroupSimple[]](describepod#securitygroupsimple)|安全组列表|
|**sanityCheck**|Boolean|源和目标IP地址校验，取值为0或者1|
|**primaryIp**|[NetworkInterfacePrivateIp](describepod#networkinterfaceprivateip)|网卡主IP|
|**secondaryIps**|[NetworkInterfacePrivateIp[]](describepod#networkinterfaceprivateip)| |
|**ipv6Addresses**|String[]|网卡IPv6地址|
### <div id="networkinterfaceprivateip">NetworkInterfacePrivateIp</div>
|名称|类型|描述|
|---|---|---|
|**privateIpAddress**|String|私有IP的IPV4地址|
|**elasticIpId**|String|弹性IP ID|
|**elasticIpAddress**|String|弹性IP实例地址|
### <div id="securitygroupsimple">SecurityGroupSimple</div>
|名称|类型|描述|
|---|---|---|
|**groupId**|String|安全组ID|
|**groupName**|String|安全组名称|
### <div id="elasticip">ElasticIp</div>
|名称|类型|描述|
|---|---|---|
|**elasticIpId**|String|弹性ip的Id|
|**elasticIpAddress**|String|弹性ip地址|
### <div id="podstatus">PodStatus</div>
|名称|类型|描述|
|---|---|---|
|**phase**|String|pod当前状态|
|**reason**|String|（简要）pod处于当前状态的原因|
|**message**|String|pod处于当前状态原因的详细信息|
|**podIP**|String|分配给pod的IP地址。至少在集群内是可路由的。未分配则为空。|
|**conditions**|[PodCondition[]](describepod#podcondition)|目前pod的状态。|
|**startTime**|String|Pod生命周期开始的时间。|
### <div id="podcondition">PodCondition</div>
|名称|类型|描述|
|---|---|---|
|**lastProbeTime**|String|最后一次探测状态的时间|
|**lastTransitionTime**|String|最后一次改变状态的时间|
|**reason**|String|最后一次状态改变的简要原因|
|**status**|String|Status is the status of the condition. Can be True, False, Unknown.|
|**message**|String|最后一次状态改变的信息|
|**conditionType**|String|状态的条件。目前仅限 Ready.|
### <div id="container">Container</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|容器名称|
|**command**|String[]|容器执行的命令。|
|**args**|String[]|容器执行命令的参数。|
|**env**|[Env[]](describepod#env)|容器执行的环境变量。|
|**image**|String|容器镜像名称。|
|**secret**|String|容器镜像仓库认证信息。|
|**tty**|Boolean|容器是否分配tty。|
|**workingDir**|String|容器的工作目录。|
|**livenessProbe**|[Probe](describepod#probe)|容器存活探针配置|
|**readinessProbe**|[Probe](describepod#probe)|容器服务就绪探针配置|
|**resources**|[ResourceRequests](describepod#resourcerequests)|容器计算资源配置|
|**systemDisk**|[CloudDisk](describepod#clouddisk)|容器计算资源配置|
|**volumeMounts**|[VolumeMount[]](describepod#volumemount)|容器计算资源配置|
|**containerStatus**|[ContainerStatus](describepod#containerstatus)|容器状态信息|
### <div id="containerstatus">ContainerStatus</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|容器名称|
|**restartCount**|Integer|容器被重新启动的次数|
|**ready**|Boolean|容器是否通过了就绪探针探测|
|**state**|[ContainerState](describepod#containerstate)|关于容器当前状态详细信息|
|**lastState**|[ContainerState](describepod#containerstate)|关于容器最后一次termination详细信息|
### <div id="containerstate">ContainerState</div>
|名称|类型|描述|
|---|---|---|
|**running**|[ContainerStateRunning](describepod#containerstaterunning)|容器运行的详细信息|
|**terminated**|[ContainerStateTerminated](describepod#containerstateterminated)|容器终止的详细信息|
|**waiting**|[ContainerStateWaiting](describepod#containerstatewaiting)|容器等待的详细信息|
### <div id="containerstatewaiting">ContainerStateWaiting</div>
|名称|类型|描述|
|---|---|---|
|**reason**|String|（简要）容器还没有运行原因。<br><br>eg ContainerCreating     <br>|
|**message**|String|容器还没有运行的详细信息。|
### <div id="containerstateterminated">ContainerStateTerminated</div>
|名称|类型|描述|
|---|---|---|
|**signal**|Integer|容器被终止的信号。|
|**exitCode**|Integer|容器被终止的退出码。|
|**reason**|String|（简要）容器被终止的原因。|
|**message**|String|容器被终止的详细信息。|
|**finishedAt**|String|容器被终止的时间。|
|**startedAt**|String|容器开始执行的时间。|
### <div id="containerstaterunning">ContainerStateRunning</div>
|名称|类型|描述|
|---|---|---|
|**startedAt**|String|容器最后一次重启或启动的时间。|
### <div id="volumemount">VolumeMount</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|挂载的云盘在pod中的名称。|
|**mountPath**|String|容器内挂载点。|
|**readOnly**|Boolean|是否以只读方式挂载。|
### <div id="clouddisk">CloudDisk</div>
|名称|类型|描述|
|---|---|---|
|**category**|String|磁盘类型 |
|**volumeId**|String|云盘ID。|
|**snapshotId**|String|云盘快照ID。|
|**diskType**|String|云盘类型：hdd.std1,ssd.gp1,ssd.io1。|
|**sizeGB**|Integer|云盘size,单位 GB。|
|**fsType**|String|指定volume文件系统类型，目前支持[xfs, ext4]。|
|**iops**|Integer|云盘的 iops 值，目前只有 ssd.io1 类型有效。|
|**autoDelete**|Boolean|是否随pod删除。|
### <div id="resourcerequests">ResourceRequests</div>
|名称|类型|描述|
|---|---|---|
|**requests**|[Request](describepod#request)|容器必需的计算资源|
|**limits**|[Request](describepod#request)|容器使用计算资源上限|
### <div id="request">Request</div>
|名称|类型|描述|
|---|---|---|
|**cpu**|String|容器必需的计算资源|
|**memoryMB**|String|容器使用计算资源上限|
### <div id="probe">Probe</div>
|名称|类型|描述|
|---|---|---|
|**initialDelaySeconds**|Integer|容器启动多久后触发探针。|
|**periodSeconds**|Integer|探测的时间间隔。|
|**timeoutSeconds**|Integer|探测的超时时间。|
|**failureThreshold**|Integer|在成功状态后，连续探活失败的次数，认为探活失败。|
|**successThreshold**|Integer|在失败状态后，连续探活成功的次数，认为探活成功。|
|**exec**|[Exec](describepod#exec)|在容器内执行指定命令；如果命令退出时返回码为 0 则认为诊断成功。|
|**httpGet**|[Hg](describepod#hg)|对指定的端口和路径上的容器的 IP 地址执行 HTTP Get 请求。如果响应的状态码大于等于 200 且小于 400，则认为诊断成功。|
|**tcpSocket**|[TcpSocket](describepod#tcpsocket)|对指定端口上的容器的 IP 地址进行 TCP 检查；如果端口打开，则认为诊断成功。|
### <div id="tcpsocket">TcpSocket</div>
|名称|类型|描述|
|---|---|---|
|**port**|Integer|端口号，范围：[1-65535]|
### <div id="hg">Hg</div>
|名称|类型|描述|
|---|---|---|
|**scheme**|String|默认值：http。|
|**host**|String|连接到pod的host信息。|
|**port**|Integer|端口号。|
|**path**|String|HTTP的路径。|
|**httpHeader**|[Hh[]](describepod#hh)|自定义Http headers|
### <div id="hh">Hh</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|http header 键|
|**value**|String|http header 值|
### <div id="exec">Exec</div>
|名称|类型|描述|
|---|---|---|
|**command**|String[]|执行的命令。|
### <div id="env">Env</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|环境变量名称（ASCII）。|
|**value**|String|环境变量取值。|
### <div id="volume">Volume</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|volume名字，在一个Pod唯一。|
|**jdcloudDisk**|[JDCloudVolumeSource](describepod#jdcloudvolumesource)|提供给Pod的cloud disk.|
### <div id="jdcloudvolumesource">JDCloudVolumeSource</div>
|名称|类型|描述|
|---|---|---|
|**volumeId**|String|云盘id，使用已有云盘|
|**snapshotId**|String|云盘快照id，根据云盘快照创建云盘。|
|**diskType**|String|云盘类型：hdd.std1,ssd.gp1,ssd.io1|
|**sizeGB**|Integer|云盘size,单位 GB,要求|
|**fsType**|String|指定volume文件系统类型，目前支持[xfs, ext4]；如果新创建的盘，不指定文件系统类型默认格式化成xfs|
|**formatVolume**|Boolean|随容器自动创建的新盘，会自动格式化成指定的文件系统类型；挂载已有的盘，默认不会格式化，只会按照指定的fsType去挂载；如果希望格式化，必须设置此字段为true|
|**iops**|Integer|云盘的 iops 值，目前只有 ssd.io1 类型有效|
|**autoDelete**|Boolean|是否随pod删除。默认：true|
### <div id="hostalias">HostAlias</div>
|名称|类型|描述|
|---|---|---|
|**hostnames**|String[]|域名列表。<br>|
|**ip**|String|ipv4地址。|
### <div id="logconfig">LogConfig</div>
|名称|类型|描述|
|---|---|---|
|**logDriver**|String|日志Driver名称。|
### <div id="dnsconfig">DnsConfig</div>
|名称|类型|描述|
|---|---|---|
|**nameservers**|String[]|DNS服务器IP地址列表。<br>|
|**searches**|String[]|DNS搜索域列表，用于主机名查找。<br>|
|**options**|[PodDnsConfigOption[]](describepod#poddnsconfigoption)|DNS解析器选项列表。|
### <div id="poddnsconfigoption">PodDnsConfigOption</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|长度范围：[1-63]，需满足linux resolver限制|
|**value**|String|长度范围：[0-100]，仅限timeout, attempts, ndots|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
