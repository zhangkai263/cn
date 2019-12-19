# 对象锁定

对象锁定功能可以禁止文件的删除和覆盖，以保障数据可靠性和满足某些行业的合规性要求，实现一次写入，多次读取（WORM）模式。

## 使用场景

部分行业规定要求重要数据必须保存一定的时间后才可以被删除，如金融服务，医疗、政务部门等；为了满足该场景，对象存储需要支持WORM(对象锁定)模式，即一次写入，多次读取。

除特殊行业的强制需求外，如有其他需求需要在一定时间或永久禁止某些文件的删除和覆盖，也可以使用对象锁定功能。

## 保留模式

### 监管模式

在监管模式下，除非用户有特殊权限，否则用户不能覆盖或删除文件，或更改文件的对象锁定设置。

若要覆盖、删除处于监管模式下的文件，或者修改文件的对象锁定设置。用户必须具有s3:BypassGovernanceMode权限，并且携带x-amz-bypass-governance-retention:true请求头。

细节说明：

* 对象存储控制台的请求默认携带x-amz-bypass-governance-retention:true请求头，具有权限的用户在控制台做以上操作会成功。

* 文件所有者默认具有s3:BypassGovernanceMode权限。

### 合规性模式

在合规性模式下，任何用户都不能覆盖或删除文件。一旦设置为合规性模式，则保留模式不能修改为监管模式，也不能删除。保留周期不能缩短。

## 依法保留

文件的依法保留也可禁止用户删除和覆盖文件，但依法保留只有开启和关闭的状态，没有保留周期。也就是说，只要依法保留开启，那么文件就永远无法删除。

拥有s3:PutObjectLegalHold权限的用户可自由开启和关闭依法保留。

细节说明：

* 依法保留和两种保留模式之间没有逻辑关联，两者可并存。

* 文件所有者默认具有s3:PutObjectLegalHold权限。

## 控制台开启对象锁定功能

登入控制台->对象存储->空间管理->新建空间->高级设置

![开启对象锁定](https://github.com/jdcloudcom/cn/blob/edit/image/Object-Storage-Service/OSS-170.png)

细节说明：

* 对象锁定只能在创建空间时开启，已经创建完成的空间不支持开启对象锁定

## 控制台修改存储空间默认保留设置

1.登入控制台->对象存储->空间管理->进入某个bucket->空间设置->对象锁定

![空间级别对象锁定](https://github.com/jdcloudcom/cn/blob/edit/image/Object-Storage-Service/OSS-171.png)

2.点击编辑，进入设置页面。

![设置空间级别对象锁定](https://github.com/jdcloudcom/cn/blob/edit/image/Object-Storage-Service/OSS-172.png)

3.选择保留模式，并指定保留期。

细节说明：

* 修改空间的默认保留设置，只作用于修改后新增的文件，对已经上传到空间里的老文件没有作用。

* 如果上传新文件时指定了与默认规则不同的保留规则，则以上传指定的规则为准。

## 控制台修改文件的对象锁定设置

1.登入控制台->对象存储->空间管理->进入某个bucket->Object管理->某一文件->操作->更多->对象锁定

![对象级别对象锁定](https://github.com/jdcloudcom/cn/blob/edit/image/Object-Storage-Service/OSS-173.png)

2.点击对象锁定，进入设置页面。

![设置对象级别对象锁定](https://github.com/jdcloudcom/cn/blob/edit/image/Object-Storage-Service/OSS-174.png)

3.选择保留模式，并指定保留到期日期。

4.选择是否开启依法保留。
