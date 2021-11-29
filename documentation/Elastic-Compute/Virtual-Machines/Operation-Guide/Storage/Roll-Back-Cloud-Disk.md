# 使用快照恢复云硬盘
对云硬盘制作快照后，如果当前系统出现故障或错误，可使用快照恢复功能实现云盘数据的版本回退。<br>
详细操作步骤请参考云硬盘侧[恢复云硬盘](http://docs.jdcloud.com/cn/cloud-disk-service/recover-clouddisk)。

## 前提条件及限制

* 已经为云硬盘创建快照，且云硬盘未被删除；
* 要恢复的云硬盘没有正在创建的快照，且无进行中的其他任务；
* 要恢复的云硬盘需为**可用**状态，若已挂载至实例还请操作[卸载云硬盘](Detach-Cloud-Disk.md)。

## 操作影响
* 恢复云硬盘后，从创建快照时刻至恢复时刻时间内的数据均会丢失，请谨慎操作；
* 若创建快照后云硬盘有进行过扩容，则恢复后的云硬盘挂载至实例后，需要您重新登录实例进行[扩容文件系统](http://docs.jdcloud.com/cloud-disk-service/cloud-disk-expansion-overview)。

## 操作步骤
详细操作步骤请参考云硬盘侧[恢复云硬盘](http://docs.jdcloud.com/cn/cloud-disk-service/recover-clouddisk)。

## 相关参考
[恢复云硬盘](http://docs.jdcloud.com/cn/cloud-disk-service/recover-clouddisk)

[卸载云硬盘](Detach-Cloud-Disk.md)

[扩容文件系统](http://docs.jdcloud.com/cn/cloud-disk-service/cloud-disk-expansion-overview)

