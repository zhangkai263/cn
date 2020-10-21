# 风险识别SDK概述

## SDK简介

风险识别 SDK封装了2020-07-20版本API，以accesskey和secretKey密钥对（简称AK/SK）识别调用者身份，提供自动签名等功能，方便您通过API创建和管理资源。

实现风险识别功能需要您同时安装风险识别 SDK和京东智联云核心库。以Python SDK为例，您需要下载[京东云Python SDK](https://github.com/jdcloud-api/jdcloud-sdk-python)以及[风险识别Python SDK](https://github.com/jdcloud-api/jdcloud-sdk-python/tree/master/jdcloud_sdk/services/bri)。

风险识别服务是以openAPI的形式对外提供服务，SDK中配置的公网Endpoint是bri.jdcloud-api.com，建议使用默认配置，也可根据需要修改相应的公网Endpoint。

| 区域      | 公网Endpoint                   |
| :-------- | :----------------------------- |
| 华北-北京 | bri.cn-north-1.jdcloud-api.com |
| 华东-上海 | bri.cn-east-2.jdcloud-api.com  |
| 华东-宿迁 | bri.cn-east-1.jdcloud-api.com  |
| 华南-广州 | bri.cn-south-1.jdcloud-api.com |

## SDK列表

下表提供了风险识别支持的SDK列表，您可以在GitHub仓库查看SDK更新历史、获取安装包以及查看指导文档。

| 编程语言 | GitHub地址                                                   |                                                              |
| :------- | :----------------------------------------------------------- | ------------------------------------------------------------ |
| Java     | [Java SDK下载](https://github.com/jdcloud-api/jdcloud-sdk-java/tree/master/bri) | [京东云Java SDK简介](https://docs.jdcloud.com/cn/sdk/java)   |
| Python   | [Python SDK下载](https://github.com/jdcloud-api/jdcloud-sdk-python/tree/master/jdcloud_sdk/services/bri) | [京东云Python SDK简介](https://docs.jdcloud.com/cn/sdk/python) |
| PHP      | [PHP SDK下载](https://github.com/jdcloud-api/jdcloud-sdk-php/tree/master/src/Bri) | [京东云PHP SDK简介](https://docs.jdcloud.com/cn/sdk/php)     |
| .NET     | [.NET SDK下载](https://github.com/jdcloud-api/jdcloud-sdk-net/tree/master/sdk/src/Service/Bri) | [京东云.NET SDK简介](https://docs.jdcloud.com/cn/sdk/dotnet) |
| Go       | [Go SDK下载](https://github.com/jdcloud-api/jdcloud-sdk-go/tree/master/services/bri) | [京东云Go SDK简介](https://docs.jdcloud.com/cn/sdk/go)       |
| Node.js  | [Node.js SDK下载](https://github.com/jdcloud-api/jdcloud-sdk-nodejs/blob/master/src/services/bri.js) | [京东云Node.js SDK简介](https://docs.jdcloud.com/cn/sdk/nodejs) |

## 相关链接

- 更多语言版本的SDK，请前往[SDK服务](https://github.com/jdcloud-api)中选择。
- 如何获取AccessKey请参见[创建AccessKey](https://docs.jdcloud.com/cn/account-management/accesskey-management)。

