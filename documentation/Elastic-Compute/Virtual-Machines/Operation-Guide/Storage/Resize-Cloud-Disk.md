# 扩容云硬盘

随着您业务数据增长，若当前云硬盘容量不能满足需要，您可对其进行扩容操作。

## 前提条件及限制

* 云硬盘当前支持两种扩容模式：
  * 普通扩容：云硬盘须处于**可用**状态，如挂载至实例须先操作卸载；
  * 热扩容:云盘须处于**可用**或**已挂载**状态，无须操作卸载即可操作扩容；
    >提示：热扩容功能目前仅在部分地域灰度开放，如需试用请提交工单申请开通权限。
* 扩容不会影响原有数据，但稳妥起见，建议您在扩容前对数据盘制作快照以做数据备份。

## 操作影响
* 扩容仅对磁盘容量进行扩容，而不对文件系统进行扩容，扩容后请参考[扩容文件系统](http://docs.jdcloud.com/cloud-disk-service/cloud-disk-expansion-overview) 完成后续操作。



## 操作步骤

详细操作步骤请参考[云硬盘扩容](http://docs.jdcloud.com/cn/cloud-disk-service/disk-expand).

## 相关参考

[扩容文件系统](http://docs.jdcloud.com/cn/cloud-disk-service/cloud-disk-expansion-overview)

[云硬盘扩容](http://docs.jdcloud.com/cn/cloud-disk-service/disk-expand)
