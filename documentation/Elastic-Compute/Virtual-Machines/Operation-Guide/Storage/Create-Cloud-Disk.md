# 创建云硬盘

云硬盘创建方式包括以下几种：

* 随实例创建，详细请参考[创建实例](../Instance/Create-Instance.md)；
* 创建空盘，挂载至实例使用，请参考[创建云硬盘](http://docs.jdcloud.com/cn/cloud-disk-service/create-cloud-disk)；
* 基于已有快照创建，以获得某一云硬盘的备份数据，请参考[使用快照创建云硬盘](http://docs.jdcloud.com/cn/cloud-disk-service/create-disk-by-snapshot)。

## 注意事项
* 每个地域云硬盘默认配额为15块，如需更多资源可提交工单提升配额；
* 单实例可以支持最多挂载8块云硬盘，单盘容量上限为16000GB；
* 支持在创建空数据盘时指定云硬盘加密属性，加密属性一经配置无法修改且会继承于基于该盘所创建的快照中；同理，若使用快照创建数据盘则云硬盘的加密属性取决于快照；
* 创建按配置计费云硬盘，需要保证您的余额（账号余额+加可用代金券）不低于50元；


## 相关参考
[创建实例](../Instance/Create-Instance.md)

[创建云硬盘](http://docs.jdcloud.com/cn/cloud-disk-service/create-cloud-disk)

[使用快照创建云硬盘](http://docs.jdcloud.com/cn/cloud-disk-service/create-disk-by-snapshot)




