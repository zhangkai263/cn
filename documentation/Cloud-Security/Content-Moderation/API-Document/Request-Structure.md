## 请求结构

本文介绍了内容检测API服务的接入的请求结构。

### 环境准备

​	在您开始调用京东云open API之前，需提前在京东云用户中心账户管理下的AccessKey管理页面申请accesskey与secretKey密钥对（简称AK/SK）。AK/SK信息请妥善保管，如果遗失可能会造成非法用户使用此信息操作您在云上的资源，给你造成数据和财产损失。

### 通讯协议

为了您的数据安全，建议务必使用HTTPS协议。

### 服务地址

```
https://censor.jdcloud-api.com/业务API
```


具体每个接口的API路径，请参考具体API文档请求地址。

HTTP请求头中需要包含公共请求头，请参考公共请求头。POST的接口参数通过请求体传递。

### 请求方法

支持的 HTTP 请求方法:

- POST

POST 请求支持的 Content-Type 类型：

- application/json，必须使用 TC3-HMAC-SHA256 签名方法。

POST 请求支持10MB。

### 字符编码

请求及返回结果都使用UTF-8字符集进行编码。


