# 监控与报警概述
实例监控与告警为您提供实时实例监控管理服务，支持不同监控维度，在实例成功创建后即开始采集数据，以图表方式直观展现，方便您掌握实例资源使用情况、运行状态等信息，同时您可设置不同的报警规则，当触发该类条件后则触发报警通知，使您轻松定位故障。
## 监控项 
京东云为实例提供以下监控指标，按采集上报的前提条件来区分，可以分为三类：
* 由实例所在宿主机采集，不依赖于云主机内监控插件，此类指标共有4个，中英文展示名具有后缀‘（Host）’，包括：
  * 磁盘读吞吐量（Host）：vm.disk.bytes.read
  * 磁盘写吞吐量（Host）：vm.disk.bytes.write
  * 网络入带宽（Host）：vm.network.bytes.incoming
  * 网络出带宽（Host）：vm.network.bytes.outgoing
* 由云主机内官方系统组件采集，所有历史版本组件均支持采集，只要不对组件进行卸载均可获取数据，此类指标共有2个，包括：
  * CPU使用率：vm.cpu.util
  * 内存使用率：vm.memory.usage
* 由云主机内官方系统组件采集，仅不低于'3.0.989'版本的JCS-Agent组件支持采集。下表中除以上6个指标外的其他指标均为此分类，**如无法在监控页面查看到此类指标说明您当前环境内的系统组件版本过低，请参照 [下方文档](monitoring-overview#user-content-1) 进行安装。**

<table>
	<thead>
    <tr>
		<th colspan="2">监控指标</th>
      	<th>指标含义</th>
      	<th>单位</th>
        <th>上报依赖</th>
        <th>说明</th>
    </tr>
	</thead>
	<tbody>
    <tr>
        <td rowspan="4">CPU</td>
        <td> CPU使用率   <br>vm.cpu.util</td>
        <td> 非空闲vCPU所占的百分比</td>
        <td> % </td>
        <td> 官方镜像内置的Agent，所有版本均支持此指标采集</td>
        <td> 维度：无</td>   
    </tr>
    <tr>
        <td> CPU平均负载（1min）  <br>vm.avg.load1</td>
        <td> 采样时刻过去1分钟的系统平均负载</td>
        <td> 无 </td>
        <td rowspan="3"> 不低于'3.0.989'版本的JCS-Agent</td>
        <td rowspan="3"> 维度：无<br>仅Linux系统有此组指标</td>   
    </tr>
    <tr>
        <td> CPU平均负载（5min）  <br>vm.avg.load5</td>
        <td> 采样时刻过去5分钟的系统平均负载</td>
        <td> 无 </td>
    </tr>
    <tr>
        <td> CPU平均负载（15min）  <br>vm.avg.load15</td>
        <td> 采样时刻过去15分钟的系统平均负载</td>
        <td> 无 </td>
    </tr>
    <tr>
        <td rowspan="2">内存</td>
        <td> 内存使用率   <br>vm.memory.usage</td>
        <td> 已用内存量占总内存总量百分比</td>
        <td> % </td>
        <td> 官方镜像内置的Agent，所有版本均支持此指标采集</td>
        <td> 维度：无</td>   
    </tr>
    <tr>
        <td> 内存使用量   <br>vm.memory.used.bytes</td>
        <td> 系统已用内存情况</td>
        <td> Bytes </td>
        <td> 不低于'3.0.989'版本的JCS-Agent</td>
        <td> 维度：无</td>   
    </tr>
    <tr>
        <td rowspan="9">磁盘</td>
        <td> 磁盘读吞吐量（Host）  <br>vm.disk.bytes.read</td>
        <td> 磁盘每秒读取的字节数（全部磁盘）</td>
        <td> Bps </td>
        <td rowspan="2"> 无</td>
        <td rowspan="2"> 维度：无<br>宿主机采集，实例整体磁盘吞吐</td>   
    </tr>
    <tr>
        <td> 磁盘写吞吐量（Host）  <br>vm.disk.bytes.write</td>
        <td> 磁盘每秒写入的字节数（全部磁盘）</td>
        <td> Bps </td>
    </tr>
    <tr>
        <td> 磁盘读吞吐量  <br>vm.disk.dev.bytes.read</td>
        <td> 磁盘每秒读取的字节数</td>
        <td> Bps </td>
        <td rowspan="7"> 不低于'3.0.989'版本的JCS-Agent</td>
        <td rowspan="4"> 维度：设备文件名（以'devName'为tag上报）如：<br>* Linux：'devName'='/vda','/vdb1', ...<br>* Windows：‘devName’='C','D', ...<br>Linux系统如磁盘有分区，则按分区统计上报，若无分区则按磁盘统计上报；Windows系统均按盘符统计上报</td>   
    </tr>    
    <tr>
        <td> 磁盘写吞吐量  <br>vm.disk.dev.bytes.write</td>
        <td> 磁盘每秒写入的字节数</td>
        <td> Bps </td> 
    </tr>       
    <tr>
        <td> 磁盘读IOPS  <br>vm.disk.dev.io.read</td>
        <td> 磁盘每秒读请求数量</td>
        <td> Count/s</td> 
    </tr>    
    <tr>
        <td> 磁盘写IOPS  <br>vm.disk.dev.io.write</td>
        <td> 磁盘每秒写请求数量</td>
        <td> Count/s</td> 
    </tr>        
    <tr>
        <td> 磁盘使用率  <br>vm.disk.dev.used</td>
        <td>磁盘已使用空间百分比</td>
        <td> % </td>
        <td rowspan="3"> 维度：挂载点（以‘mountPoint’为tag上报）如：<br>* Linux：'mountPoint'='/','/mnt', ...<br>* Windows：‘mountPoint’='C','D', ...<br>Linux系统按挂载点统计上报；Windows系统按盘符统计上报<br>仅Linux系统提供'磁盘inode使用率'指标</td>   
    </tr>  
    <tr>
        <td> 磁盘使用量 <br>vm.disk.dev.used.bytes</td>
        <td>磁盘已使用空间容量</td>
        <td> Bytes </td>
    </tr>  
    <tr>
        <td> 磁盘inode使用率 <br>vm.disk.dev.inode.used</td>
        <td> 磁盘文件系统inode使用百分比</td>
        <td> % </td>
    </tr>  
    <tr>
        <td rowspan="7">网络</td>
        <td> 网络入带宽（Host）  <br>vm.network.bytes.incoming</td>
        <td> 网卡每秒接收的比特数（全部网卡之和）</td>
        <td> bps </td>
        <td rowspan="2"> 无</td>
        <td rowspan="2"> 维度：无<br>宿主机采集，实例整体网络带宽，不分区网卡和内外网</td>   
    </tr>
    <tr>
        <td> 网络出带宽（Host）  <br>vm.network.bytes.outgoing</td>
        <td> 网卡每秒发送的比特数（全部网卡之和）</td>
        <td> bps </td>
    </tr>
    <tr>
        <td> 网络入带宽  <br>vm.network.dev.bytes.in</td>
        <td> 网卡每秒接收的比特数</td>
        <td> bps </td>
        <td rowspan="5"> 不低于'3.0.989'版本的JCS-Agent</td>
        <td rowspan="4"> 维度：网卡（以‘devName’为tag上报）如：<br>* Linux/Windows：'devName'='eth0','eth1', ...<br>网卡整体数据指标，不分区内外网</td>   
    </tr>
    <tr>
        <td> 网络出带宽 <br>vm.network.dev.bytes.out</td>
        <td> 网卡每秒发送的比特数</td>
        <td> bps </td> 
    </tr>
    <tr>
        <td> 网络入包量  <br>vm.network.dev.packets.in</td>
        <td> 网卡每秒入包量</td>
        <td> pps </td> 
    </tr>
    <tr>
        <td> 网络出包量  <br>vm.network.dev.packets.out</td>
        <td> 网卡每秒出包量</td>
        <td> pps </td> 
    </tr>
    <tr>
        <td> TCP连接数  <br>vm.netstat.tcp.established</td>
        <td> 处于 ESTABLISHED 状态的 TCP 连接数量</td>
        <td> Count </td> 
        <td> 维度：无 </td> 
    </tr>    
    <tr>
        <td rowspan="7">GPU</td>
        <td> GPU功耗 <br>vm.gpu.power</td>
        <td> GPU功耗</td>
        <td> Wt </td>
        <td rowspan="7"> 不低于'3.0.989'版本的JCS-Agent</td>
        <td rowspan="7"> 维度：GPU卡（以‘gpu_index’为tag上报）如：<br>* Linux/Windows：'gpu_index‘=’0’,’1’,’2’,’3’, ...<br>仅GPU实例规格有此组指标</td>   
    </tr>    
    <tr>
        <td> GPU温度 <br>vm.gpu.temperature</td>
        <td> GPU温度</td>
        <td> ℃ </td>
    </tr>      
    <tr>
        <td> GPU核心使用率 <br>vm.gpu.util.gpu</td>
        <td> GPU核心使用率</td>
        <td> % </td>
    </tr>     
    <tr>
        <td> 	GPU编码器使用率 <br>vm.gpu.util.encoder</td>
        <td> 	GPU编码器使用率</td>
        <td> % </td>
    </tr>
    <tr>
        <td> 	GPU解码器使用率 <br>vm.gpu.util.decoder</td>
        <td> 	GPU解码器使用率</td>
        <td> % </td>
    </tr>    
    <tr>
        <td> 	GPU内存使用率 <br>vm.gpu.util.mem</td>
        <td> 	GPU内存使用率</td>
        <td> % </td>
    </tr>     
    <tr>
        <td> 	GPU内存使用量 <br>vm.gpu.used.mem.bytes</td>
        <td> 	GPU内存使用量</td>
        <td> Bytes </td>
    </tr>     
	</thead>
</table> 
 
 
 
 
<div id="user-content-1"></div>

## 监控插件安装说明

云主机监控数据的采集和上报依赖于官方镜像系统组件'JCS-Agent'中的'MonitorPlugin'插件，官方镜像在2019年5月-7月期间进行升级默认安装了升级工具'ifrit'以实现JCS-Agent的自动升级。<br>

如您当前实例中未安装JCS-Agent或已安装但版本过低不具备自动升级能力，可在确保已卸载早期系统组件cloud-init和QGA的前提下，直接安装ifrit，安装完成10分钟内，JCS-Agent会被自动安装/更新为最新版本。<br>

* cloud-init和QGA卸载方法以及Ifrit安装方法详见：[官方镜像系统组件-JCS-Agent](https://docs.jdcloud.com/cn/virtual-machines/default-agent-in-public-image#user-content-1)
* JCS-Agent版本查看方式：
  * Linux：
  `
   ps -ef|grep MonitorPlugin
  `
  * Windows：
  `
  wmic process where caption="MonitorPlugin.exe" get caption,commandline /value
  `
  
## 监控数据说明
* 监控数据采集周期为10s，最小展示间隔为1min；
* 不同指标的默认聚合方式不同，可在监控图中查看各指标的聚合方式；
* 统计周期默认支持1小时、6小时、12小时、1天、3天、7天及14天，此外还支持您设置统计周期，最短为1分钟最长为一个月；
* 不同统计周期监控值会做对应聚合，例如6小时统计周期情况下，监控图上间隔5分钟显示一个监控值，该监控值为对应统计周期内采集值的聚合，当前仅支持以默认聚合方式查询；
* 监控数据最长保存30天，用户在控制台可直接可以观察30天的监控数据。

## 其他
* bps表示每秒传输bit数，ps为per second，意同/s；
* Bps表示每秒传输Byte数，ps为per second，意同/s；
* Kbps=1000bps，KBps=1000Bps。
  
 
   
