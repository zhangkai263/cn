# 计量计费

[OSS如何计费？](Billing#user-content-1)

[OSS有免费额度吗？](Billing#user-content-2)

[免费额度内为何仍会欠费（扣费）？](Billing#user-content-3)

[通过内网访问OSS产生的流量是否免费？](Billing#user-content-4)

[如何查看账单？](Billing#user-content-5)

[欠费停服后，OSS控制台还能不能访问文件及下载文件？](Billing#user-content-6)

[欠费停服后，OSS什么时间释放资源？](Billing#user-content-7)

[OSS服务如何停止计费？](Billing#user-content-8)

[如何查询资源包（预付费资源包、免费额度）的剩余量？](Billing#user-content-9)

[如何取消资源包？](Billing#user-content-10)

------

<div id="user-content-1"></div>

#### OSS如何计费？

对象存储OSS的费用由五部分组成：存储费用、流量费用、请求费用、数据取回费用、云端数据处理费用；

采用按量后付费的计费模式，根据用户实际用量按天推送账单，每天按照账单收取前一天的费用；

关于OSS计费项，计费规则等信息，请参见 [计费规则](https://docs.jdcloud.com/object-storage-service/billing-rules)。

<div id="user-content-2"></div>

#### OSS有免费额度吗？

我们为OSS的用户，提供了一定的标准存储容量、标准存储请求次数的免费额度。免费额度以资源包的形式发放，用户开通京东智联云对象存储后，系统自动发放至用户账户。用户账户正常时将按月发放免费资源包，详情请参见[免费额度](https://docs.jdcloud.com/object-storage-service/free-tier-for-oss)。

<div id="user-content-3"></div>

#### 免费额度内为何仍会欠费（扣费）？

含免费额度的资源包，用以抵扣您使用OSS过程中产生的部分费用，但是并不能抵扣所有费用。所以免费额度内仍会欠费（扣费）可能原因如下：

1. 其他收费项：OSS的费用包括存储费用、流量费用、请求费用、数据取回费用、云端数据处理费用，目前OSS免费额度只提供一定额度的标准存储容量和标准存储请求次数，只能抵扣标准存储类型的存储和请求次数费用。其他的计费项：如流量费用、数据取回费用、云端数据处理费用等，按量计费收取。
2. 超出额度的资源使用费用。例如，您享受10GB的免费标准存储容量，但是实际存储量超出了免费额度10GB，则超出部分将按量计费。

查看您存储空间的消费明细，详情请参见[查看账单](https://docs.jdcloud.com/object-storage-service/check-bill)

<div id="user-content-4"></div>

#### 通过内网访问OSS产生的流量是否免费？

通过内网访问OSS产生的流量免费；通过互联网从OSS下载数据到本地端所产生的流量和通过CDN下载OSS的数据所产生的流量按照固定单价收费。

<div id="user-content-5"></div>

#### 如何查看账单？

您可以通过控制台费用中心查看您的账户使用对象存储服务所产生的费用信息，详细查询方式请参见[查看账单](https://docs.jdcloud.com/object-storage-service/check-bill)。

<div id="user-content-6"></div>

#### 欠费停服后，OSS控制台还能不能访问文件及下载文件？

欠费停服后，您将不能使用对象存储做任何操作。对象存储服务将会在欠费时间超过24小时后自动停止；您的数据可以继续保持60天。在此期间您没有进行续费使账户余额大于等于0，数据将会被销毁。更多欠费相关信息请参见[计费概述](https://docs.jdcloud.com/object-storage-service/billing-overview)欠费规则部分。

<div id="user-content-7"></div>

#### 欠费后，OSS什么时间释放资源？

欠费超过60天没有补足欠款，将视为您主动放弃对象存储服务，存储空间将被回收，存储空间内的数据会被清理，数据不可恢复；若您在欠费后60天内充值补足欠款后，服务会自动开启，可以继续使用。

<div id="user-content-8"></div>

#### OSS服务如何停止计费？

因一键停服可能会导致客户的业务受到影响，所以OSS暂时没有提供此功能。

- 如果您确实不想再使用OSS服务，可以删除存储空间（Bucket）下的所有文件（Object），再删除Bucket，即可在下一个账期（OSS按量付费一天出一次账单）不产生扣费信息。推荐您通过[设置文件生命周期](https://docs.jdcloud.com/object-storage-service/lifecycle)来自动批量删除Object。
- 如果您长时间（超过30天）不需要使用OSS上的数据，又不想将这些数据删除，建议您将标准存储转换成低频存储或者归档存储，可以节省约30%到80%左右的费用。具体请您参见[存储类型介绍](https://docs.jdcloud.com/object-storage-service/storageclass-overview)和[价格总览](https://docs.jdcloud.com/object-storage-service/price-overview)。

<div id="user-content-9"></div>

#### 如何查询资源包（预付费资源包、免费额度）的剩余量？

请登录访问管理控制台的[资源包概览](https://uc.jdcloud.com/account/accesskey)中查看。

<div id="user-content-10"></div>

#### 如何取消资源包？

若您意外购买了错误的资源包，例如选错了生效地域、有效期（或购买时长）、规格等，您可以联系售后技术支持取消已购买的资源包。

适用条件：当您购买的资源包未使用时，可申请取消。
