# 概述

设备厂商通过集成设备SDK的方式来实现设备接入智能生活物联网平台。注意：集成的设备必须要支持TCP/IP协议，其他非IP设备需要通过网关采用MQTT协议才能接入物联管理平台。 本平台提供的SDK面向MQTT Java语言开发者。本文档用于指导开发者如何实现设备的快速接入，如果开发者需要了解SDK细节，可参考用户开发手册。

# 获取SDK开发包
目前SDK提供了Java语言开发包，点击下载  [设备直连SDK-Java](../Related-Resources/设备直连SDK-Java.zip)

开发者可参考 **最佳实践-设备接入** 章节，使用SDK快速接入设备



# 产品框架
设备、SDK 、平台间的关系如下图所示：

![产品框架图](../../../../image/IoT/IoT-Estate/Developer-Guide/Introduction-Ark.png)

