

# 一般性问题

### 什么是OSS？

京东云对象存储服务（Object Storage Service，简称OSS），是京东云一种面向Internet的存储服务，提供提供的海量、安全、低成本、高可靠的云存储服务。它具有与平台无关的RESTful API接口，能够提供99.999999999%（11个9）的数据可靠性和99.9%的服务可用性。您可以在任何应用、任何时间、任何地点存储和访问任意类型的数据。数据多地域跨集群的存储，以实现资源统一利用，降低使用难度，提高工作效率。

### OSS可以用来做什么？

OSS提供简单的Web服务接口，可用于存储和提取任意数量的数据。开发人员可以轻松地构建利用互联网存储的应用程序。同时OSS具有很高的可扩展性，用户只需按实际用量付费。开发人员可以为了解决存储空间扩展受限或是为了数据安全而将海量数据上云备份，也可以从较小用量起步，根据需要扩展应用程序，而不影响性能或可靠性。如灾备系统、内容存储分享、数据分析存储、网盘等应用。

### 如何开始使用OSS？

使用OSS，需要先注册京东云账号。如果还没有京东云账号，请进入[京东云注册页面](https://user.jdcloud.com/register) 按提示进行注册。注册完成后，可参考[OSS入门指南-开通OSS服务](https://docs.jdcloud.com/cn/object-storage-service/sign-up-service-1)。

### OSS提供哪些存储类别?

OSS目前支持标准存储、低频存储、归档存储和低冗余存储。

不同存储类型详细介绍请参考[京东云对象存储类型介绍](https://docs.jdcloud.com/cn/object-storage-service/storageclass-overview)。价格具体请参考[OSS价格总览](https://docs.jdcloud.com/cn/object-storage-service/price-overview)。

### 如何使用低冗余存储类型?

京东云支持通过兼容AWS S3 的 API、各语言SDK 方式使用低冗余存储。

通过京东云OSS兼容AWS S3 的 API、各语言SDK 使用低冗余存储，即在上传Object 时请求增加x-amz-storage-class属性，并设置其值为REDUCED_REDUNDANCY。具体参考[PUTObject](https://github.com/jdcloud-cmw/oss/blob/master/S3-API-Document/Operations-on-Objects/Put-Object.md)。
