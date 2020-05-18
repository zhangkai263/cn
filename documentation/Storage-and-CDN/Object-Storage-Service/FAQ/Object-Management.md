# 文件（object）管理

[如何修改object存储类型？](Object-Management#user-content-1)

[如何修改文件的Content-Type？](Object-Management#user-content-2)

[上传到OSS的图片在浏览器打开链接后就直接下载了，如何做到可以通过浏览器打开这种图片？](Object-Management#user-content-3)

[如何使文件直接在浏览器中下载，而不是预览？](Object-Management#user-content-4)

[如何（定期）清理过期文件、过期分片？](Object-Management#user-content-5)

------

<div id="user-content-1"></div>

#### 如何修改object存储类型？

OSS支持标准存储、低频存储、归档存储、低冗余存储四种存储类型，不同存储类型之间可以相互转换。可以通过控制台、SDK、API手动转换Object的存储类型。操作如下：

1. 进入控制台；
2. 在存储空间列表中，单击目标存储空间名称，打开该存储空间【Object管理】页面；
3. 鼠标选中目标文件后，点击文件列表后方的操作项**修改存储类型**；
4. 选择您希望修改的存储类型后，单击**确定**。

Object存储类型转换后，会按照转换后的存储类型的存储单价计算存储费用。修改文件存储类型实际是通过覆写操作，将文件修改为指定的存储类型。所以，若转换的Object是低频存储或归档存储类型，且存储未满指定天数的，需要补足未满天数的存储费用，详情请参见[计费规则说明](https://docs.jdcloud.com/object-storage-service/billing-rules)。

<div id="user-content-2"></div>

#### 如何修改object的Content-Type？

OSS会默认匹配上传文件的后缀名，按照文件类型的对照表，设置文件的Content-Type。如果文件的后缀名不在对照表中，会默认设置为`application/octet-stream`。

用户也可以在上传文件时，指定Content-Type。如果在上传文件后，需要更改Content-Type， 支持两种方式：

- 1.API/SDK:

使用[Put Object Copy](https://docs.jdcloud.com/object-storage-service/put-object-copy-2) 修改Content-Type；

- 2.控制台：

可按照以下步骤：

1. 登录到OSS管理控制台；
2. 选择要设置的目标文件，在**操作**项选中**管理元数据**，在弹窗中配置Content-Type属性；
3. 输入Content-Type参数，点击确认按钮。

<div id="user-content-3"></div>

#### 上传到OSS的图片在浏览器打开链接后就直接下载了，如何做到可以通过浏览器打开这种图片？

解决方案：

- 通过API/SDK上传文件时指定Content-Type，例如指定为：image/png；
- 本地批量修改文件后缀再通过工具上传；
- 通过控制台上传文件后，使用对象的**管理元数据**功能设置Content-Type属性；

<div id="user-content-4"></div>

#### 如何使文件直接在浏览器中下载，而不是预览？

您可以通过[OSS控制台](https://oss-console.jdcloud.com/space)对象的管理元数据功能，将对象自定义Headers中的Content-Disposition参数值设为attachment。控制台操作指南请参见 [管理元数据](https://docs.jdcloud.com/object-storage-service/user-defined-metadata)。

也可以通过设置Post Object接口中请求参数Content-Disposition的值为attachment来实现浏览器中弹出下载文件，参考文档请参见[Post Object](https://docs.jdcloud.com/cn/object-storage-service/post-object-2)。

<div id="user-content-5"></div>

#### 如何（定期）清理过期文件、过期分片？

您可以在对象存储控制台上直接删除文件，操作方法请参见[删除文件](https://docs.jdcloud.com/object-storage-service/delete-object)，您也可以通过 [配置生命周期定期清理文件](https://docs.jdcloud.com/object-storage-service/delete-object)。
