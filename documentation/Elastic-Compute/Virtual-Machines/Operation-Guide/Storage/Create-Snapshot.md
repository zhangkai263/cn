# 创建云硬盘快照

可通过为云硬盘创建快照，来备份某个时间点上云硬盘内的数据。

## 前提条件限制

* 每个用户每个地域下默认有15个快照配额，创建快照前请确认配额是否充足，如需提升请提交工单申请；
* 为保证数据完整性，请您在创建快照之前，尽量停止或减少对云硬盘进行写入操作；
* 建议您在制作快照前先对云硬盘进行卸载操作，创建快照后再重新挂载至实例，请查阅[卸载云硬盘](Detach-Cloud-Disk.md)、[挂载云硬盘](Attach-Cloud-Disk.md)；

## 操作步骤
详细操作步骤请参考云硬盘侧[创建云硬盘快照](http://docs.jdcloud.com/cn/cloud-disk-service/create-clouddisk-snapshot)。
 	
>注意：
>* 第一次创建快照为全量快照，完成时间取决于云硬盘内数据量，还请耐心等待。
>* 云硬盘快照的加密属性从云硬盘继承且不可更改。
 	
 	
## 相关参考

[卸载云硬盘](Detach-Cloud-Disk.md)

[挂载云硬盘](Attach-Cloud-Disk.md)

[创建云硬盘快照](http://docs.jdcloud.com/cn/cloud-disk-service/create-clouddisk-snapshot)
