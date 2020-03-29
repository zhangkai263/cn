## 请求结构

本文介绍了HTTPS POST请求调用内容检测API的请求结构。为了您的数据安全，建议务必使用HTTPS协议。

### 环境准备

​	在您开始调用京东云open API之前，需提前在京东云用户中心账户管理下的AccessKey管理页面申请accesskey与secretKey密钥对（简称AK/SK）。AK/SK信息请妥善保管，如果遗失可能会造成非法用户使用此信息操作您在云上的资源，给你造成数据和财产损失。

### 内容检测API服务的接入地址为：

```
https://censor.jdcloud-api.com/业务API
```


具体每个接口的API路径，请参考具体API文档请求地址。

HTTP请求头中需要包含公共请求头，请参考公共请求头。POST的接口参数通过请求体传递。

### 公共请求头

| 名称                     | 类型   | 必填 | 描述                                                         |
| :----------------------- | :----- | :--- | :----------------------------------------------------------- |
| x-jdcloud-algorithm      | String | 是   | 用于创建请求签名的哈希算法，目前只支持 `JDCLOUD2-HMAC-SHA256` |
| x-jdcloud-date           | String | 是   | 签名请求的日期和时间，遵循ISO8601标准，使用UTC时间，格式为YYYYMMDDTHHmmssZ。日期必须与`authorization`请求头中使用的日期相匹配。例如： `20180707T150456Z` |
| x-jdcloud-nonce          | String | 是   | 随机生成的字符串，需要保证一段时间内的唯一性                 |
| x-jdcloud-security-token | String | 否   | 如果用户开启了mfa操作保护，该API接口又是需要保护的接口，调用时需要传此参数 |
| authorization            | String | 是   | 鉴权信息，由签名算法生成，生成的数据格式例如：JDCLOUD2-HMAC-SHA256 Credential=accessKey/20180226/cn-north-1/nc/jdcloud2_request, SignedHeaders=content-type;host;x-jdcloud-date;x-jdcloud-nonce, Signature=4432ad80f84a41d56f3d41b59918a0844b468d8c131fa7d7c993693f62cf43ef` |

### 字符编码

请求及返回结果都使用UTF-8字符集进行编码。


### POST请求示例

下面以调用内容安全图片异步鉴黄检测创建接口为例，介绍如何产生一个POST类型OpenAPI调用。（直接构造OpenAPI调用较为繁琐，建议您直接使用京东云提供的SDK）

首先在内容安全接口概览页，您可以看到不同检测接口的请求地址，请求方式为POST，请求地址为/v1/image:asyncscan，在API参考里可以看到请求参数。POST请求的所有参数都是以JSON格式的结构体，通过请求body发送到服务端。

最终生成的调用为：

```
POST
https://censor.jdcloud-api.com//v1/image:asyncscan
```

请求头:（**需要替换一下**）

```
x-jdcloud-algorithm: JDCLOUD2-HMAC-SHA256
x-jdcloud-date: 20140707T150456Z
x-jdcloud-nonce: ed558a3b-9808-4edb-8597-187bda63a4f2
authorization: JDCLOUD2-HMAC-SHA256 accessKey/20180226/cn-north-1/nc/jdcloud2_request, SignedHeaders=content-type;host;x-jdcloud-date;x-jdcloud-nonce, Signature=4432ad80f84a41d56f3d41b59918a0844b468d8c131fa7d7c993693f62cf43ef
```

请求体：（**请求体需要替换一下**）

```
{
     "instanceSpec": {
              "az": "cn-north-1a",
              "instanceType": "g.s1.micro",
              "imageId": "98d4a0f-88c1-451a-8971-f1f76903b6c",
              "name": "sdk-test",
              "elasticIp": {
                      "bandwidthMbps": 2,
                      "provider": "NO_BGP"
              },
              "primaryNetworkInterface": {
                      "networkInterface": {
                               "subnetId": "subnet-0rtcw9jl0",
                               "az": "cn-north-1a"
                      }
              },
              "systemDisk": {
                      "diskCategory": "local"
              },
              "dataDisks": [{
                      "diskCategory": "cloud",
                      "autoDelete": true,
                      "cloudDiskSpec": {
                               "name": "sdk-test-disk1",
                               "diskType": "premium-hdd",
                               "diskSizeGB": 50
                      }
              },
              {
                      "diskCategory": "cloud",
                      "autoDelete": true,
                      "cloudDiskSpec": {
                               "name": "sdk-test-disk2",
                               "diskType": "ssd",
                               "diskSizeGB": 40
                      }
              }],
              "description": "sdk测试"
     },
     "maxCount": 2,
     "regionId": "cn-north-1"
}
```