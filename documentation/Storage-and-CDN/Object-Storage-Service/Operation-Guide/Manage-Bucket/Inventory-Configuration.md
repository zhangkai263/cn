# 清单设置

清单是帮助用户管理存储空间对象的功能。用于周期性的（每天/每周）为Bucket中的对象（全部或部分）生成一份特定格式的列表文件（目前支持CSV 格式的文件），并将该文件存储到指定的Bucket中，并且可以有计划地取代对象存储同步 List API 操作。

基于对象清单，用户可以完成一些业务统计或者批量操作；可以在一个Bucket中配置多个清单任务，来满足不同维度的业务需求。

清单文件中会列出存储的对象及其对应的元数据，并根据用户的配置信息，记录用户所需的对象属性信息。在清单任务执行过程中并不会直接读取对象内容，仅扫描对象元数据等属性信息。

清单生成周期为每天或每周，从清单配置创建之日起，在指定的生成周期天数后生成清单列表文件。如果是每周一次，则在初始报告后每七天生成一份报告。

## 如何配置清单？

本部分介绍如何设置清单，包括有关清单源存储空间和目标存储空间的详细信息。

### 清单源存储空间和目标存储空间 

由清单列出其对象的存储空间称为*源存储空间*。在其中存储清单列表文件的存储空间称为*目标存储空间*。在配置清单前，我们先了解两个概念：

**源存储空间**

即想要开通清单功能的存储空间。清单列出了源存储空间中存储的对象，您可以获取整个存储空间的清单列表或按 (对象键名) 前缀筛选过的清单列表。

源存储空间：

- 包含在清单中列出的对象。
- 包含清单的配置。

**目标存储空间**

即存储清单的存储空间。清单列表文件将被写入目标存储空间，要对目标存储空间内公共位置中的所有清单列表文件进行分组，您可以在清单配置中指定目标 (对象键名) 前缀。

目标存储空间：

- 包含清单文件列表。
- 包含 Manifest 文件，其中列出了存储在目标存储空间中的所有文件清单列表。
- 必须具有将文件写入存储空间的权限的存储空间策略。
- 必须与源存储空间位于同一地域(Region)，两者可以是同一存储空间。
- 可以与源存储空间相同。
- 可以由与拥有源存储空间的账户不同的京东智能云账户拥有。

### 配置清单

清单将帮助您按预定的计划创建存储空间中的对象的列表，由此管理存储。您可以为存储空间配置多个清单列表。清单列表将发布到目标存储空间中的 CSV文件

**1.指定源存储空间中待分析的对象信息**

确定需要分析哪些对象信息。因此，在配置清单功能时，需要在源存储空间中配置以下信息：

- 配置所需分析的对象属性：您需要明确需要将对象属性中的哪些信息记录到清单报告中，目前支持的对象属性包括账号 ID、源存储空间名称、对象文件名称、对象大小、对象最新修改日期、ETag、对象的存储类型。

**2.配置清单报告的存储信息**

指定目标存储空间的存储空间策略，是每天还是每周生成一次清单报告列表，清单报告要存储至哪个存储空间中，需要配置信息如下：

- 选择清单导出频率：每天还是每周生成一次列表。您可以通过此配置选择需要的频率执行清单功能。
- 配置清单的输出位置：您需要指定清单报告需要存储的存储空间。

## 清单中包含了哪些参数？

清单列表文件包含源存储空间中对象的列表以及每个对象的元数据。清单列表将在目标存储空间中存储为使用 GZIP 压缩的 CSV 格式文件。

清单列表包含存储空间中的对象的列表以及每个列出的对象的以下元数据：

- Bucket name – 清单所针对的存储空间的名称。
- Key name – 存储空间中的对象文件名称，唯一标识存储空间中的对象的对象键名（或键）。使用 CSV 文件格式时，对象文件名称采用 URL 编码形式，必须解码然后才能使用。
- Size – 对象大小（以字节为单位）。
- Last modified date – 对象创建日期或上次修改日期（以较晚者为准）。
- ETag – 实体标签是对象的哈希。ETag 仅反映对对象的内容的更改，而不反映对对象的元数据的更改。ETag 可能是也可能不是对象数据的 MD5 摘要，是与不是取决于对象的创建方式和加密方式。
- Storage class – 用于存储对象的存储类。有关更多信息，请参见 [存储类型](https://docs.jdcloud.com/object-storage-service/storageclass-overview)。

## 使用方法

### 通过控制台配置清单

您可以参见下方通清单功能【控制台操作指南】，了解如何通过控制台配置清单功能。

### 通过API配置清单

您可以参见以下 API 文档了解如何通过 API 配置清单功能：

- [DELETE 存储空间清单](../../API-Reference-S3-Compatible/Compatibility-API/Operations-On-Bucket/Delete-Bucket-InventoryConfiguration.md)
- [GET 存储空间清单](../../API-Reference-S3-Compatible/Compatibility-API/Operations-On-Bucket/Get-Bucket-InventoryConfiguration.md)
- [List 存储空间清单](../../API-Reference-S3-Compatible/Compatibility-API/Operations-On-Bucket/List-Bucket-InventoryConfigurations.md)
- [PUT 存储空间清单](../../API-Reference-S3-Compatible/Compatibility-API/Operations-On-Bucket/Put-Bucket-InventoryConfiguration.md)

## 清单报告存储路径

清单报告及相关的 Manifest 相关文件会发布在目标存储空间中，其中清单报告会发布在以下路径：

```
destination-prefix/source-bucket/config-ID/
```

Manifest 相关文件将发布到目标存储空间中的以下位置：

```
destination-prefix/source-bucket/config-ID/YYYY-MM-DDTHH-MMZ/manifest.json
destination-prefix/source-bucket/config-ID/YYYY-MM-DDTHH-MMZ/manifest.checksum
destination-prefix/source-bucket/config-ID/hive/dt=YYYY-MM-DD-HH-MM/symlink.txt
```

清单列表每天或每周发布到目标存储空间中的以下位置:

```
destination-prefix/source-bucket/config-ID/data/example-file-name.csv.gz
```

路径中所代表的含义如下：

- **destination-prefix** ：是用户在配置清单时设置的“目标前缀”，可用于对目标存储空间中的公共位置的所有清单列表文件进行分组。
- **source-bucket** ：是清单报告对应的源存储空间名称，添加它是为了避免在多个源存储空间将各自清单报告发送至同一目标存储空间时可能造成的冲突。
- **config-ID** ：是用户在配置清单时设置的“清单名称”，添加它是为了避免从同一源存储空间发送到同一目标存储空间的多个清单报告发生冲突，可以用 config-ID 区分不同的清单报告。
- **YYYY-MM-DDTHH-MMZ** ：时间戳，包含生成清单报告时开始扫描存储空间的开始时间和日期；例如，2020-04-28T00-32Z。
- **manifest.json** ：是 Manifest 文件。
- **manifest.checksum** ：是 manifest.json 文件内容的 MD5。
- **symlink.txt** ：是与 Apache Hive 兼容的 Manifest 文件。
- **example-file-name.csv.gz** ：是 CSV 清单文件之一。

其中，Manifest 相关文件总共包含两份文件 manifest.json 和 manifest.checksum。

有关 Manifest 文件的介绍如下：

<table border="1">
  <tr>
    <td>
什么是清单Manifest？<br><P>
Manifest 文件 manifest.json 和 symlink.txt 描述清单报告的位置。每次交付新的清单报告时，均会带有一组新的 Manifest 文件。<br>
每当写入 manifest.json 文件后，它都会附带一个 manifest.checksum 文件 (作为 manifest.json 文件内容的 MD5)。<br>
manifest.json 文件包含的每个 Manifest 均提供了有关清单的元数据和其他基本信息，这些信息包括：<br>
   ● 源存储空间名称。<br>
   ● 目标存储空间名称。<br>
   ● 清单版本。<br>
   ● 时间戳，包含生成清单报告时开始扫描存储空间的日期与时间。<br>
   ● 清单文件的格式与架构。<br>
   ● 目标存储空间中清单报告的实际列表，大小及 md5Checksum。
     </td>
  </tr>
</table>

以下是 CSV 格式清单的 manifest.json 文件中的 Manifest 示例：

```
{
 "sourceBucket": "example-source-bucket",
 "destinationBucket": "example-inventory-destination-bucket",
 "fileFormat": "CSV",
 //"version": "2016-11-30",
 "creationTimestamp": "1514944800000",
 "fileSchema": "Bucket, Key, VersionId, Size, LastModifiedDate, ETag, StorageClass, IsMultipartUploaded, ReplicationStatus",
 "files": [
  {
   "key": "Inventory/example-source-bucket/2016-11-06T21-32Z/files/04d73d9debc73d9f0bf85af461abde6c.csv.gz",
   "size": 21999232,
   "MD5checksum": "7d40288a09c25b302ad6cb5fced54f35"
  }
 ]
}
```

## 清单一致性

清单报告提供了新对象和覆盖的 PUT 的最终一致性，并提供了 DELETE 的最终一致性。清单列表是存储空间项的滚动快照，这些项最终是一致的 (即，列表可能不包含最近添加或删除的对象)。例如，当在执行用户配置的清单任务的过程中时，用户执行了上传或删除对象的操作，则这些操作的结果可能不被反映在清单报告中。

如果您需要在对象执行操作之前验证对象的状态，我们建议您执行 HEAD Object API 请求来检索对象的元数据，或在对象存储控制台中检查对象属性。

# 控制台操作指南

## 清单功能

OSS清单提供您的对象和元数据的平面文件列表，该列表将有计划地取代 OSS 同步 List API 操作。OSS 清单每天或每周为存储空间或共享前缀的对象（即，其名称以相同字符串开头的对象）提供用于列出您的对象及其对应元数据的逗号分隔值 (CSV)。

### 配置清单步骤

* 交付第一份报告可能需要多达 48 小时。

1. 登录[对象存储控制台](https://oss-console.jdcloud.com/space)；
2. 在【空间管理】列表中，选择想要使用清单功能的存储空间（源存储空间），然后单击进入；
3. 单击【空间设置】选项卡，然后选择【清单设置】项；
4. 单击【添加清单】；
5. 在【添加清单】页您可以按以下方式进行配置：
   - 清单名称：输入您的输出清单名称。
   - 筛选条件：（可选）为筛选条件添加前缀，可以仅清查名称以相同字符串开头的对象。如不输入，默认无条件筛选。
   - 目标存储空间：选择要将报告保存到的目标存储空间。初始默认目标存储空间即源存储空间，目标存储空间必须与源存储空间处于同一地域。目标存储空间可处于不同的 JDCloud 账户中。
   - 目标前缀（选填）：（可选）您可以为目标存储空间选择前缀，可对公共位置的清单文件进行分组。
   - 频率：选择清单的生成频率。按照每日/每周进行导出，如不选择，默认每日导出。
   - 状态：您可以选择开启/关闭清单。
   - 【高级设置】：在高级设置中您可以配置更多的清单信息，若不进行高级设置，则全部为默认设置。
   - 输出格式：默认以 CSV 格式输出。
   - 清单信息：选择清单报告需要包含的对象的相应信息，可选项有：对象大小、存储类别、ETag、上次修改时间。如不选择，默认全选。
   - 加密：选择清单是否需要服务端加密。目前暂时不加密清单报告。
6. 确认配置信息无误后，点击【保存】按钮完成新增。

### 目标存储空间策略

在授予 OSS 写入权限的目标存储空间上创建存储空间权限策略。这样，OSS就能够将清单报告的数据写入存储空间。

如果您在其他账户中选择了目标存储空间，而没有权限读取和写入存储空间策略，则您会看到以下消息：‘保存失败，无法在目标Bucket上创建Bucket策略。请联系目标Bucket 拥有者添加相关Bucket 策略，允许该账号在Bucket中放置数据’。在这种情况下，目标存储空间拥有者必须将显示的存储空间策略添加到目标存储空间中。如果策略未添加到目标存储空间中，则您不会获得清单报告，因为 源存储空间所有者 无权写入目标存储空间。
