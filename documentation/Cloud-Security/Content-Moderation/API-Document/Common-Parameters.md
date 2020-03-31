## 公共参数

 公共参数分为公共请求头和公共查询参数。  公共参数是用于标识用户和接口鉴权目的的参数，如非必要，在每个接口单独的接口文档中不再对这些参数进行说明，但每次请求均需要携带这些参数，才能正常发起请求。 

### 公共请求头

所有HTTP请求中，都包含如下公共请求头（HTTP Header）：

| 名称                     | 类型   | 必填 | 描述                                                         |
| :----------------------- | :----- | :--- | :----------------------------------------------------------- |
| x-jdcloud-algorithm      | String | 是   | 用于创建请求签名的哈希算法，目前只支持 `JDCLOUD2-HMAC-SHA256` |
| x-jdcloud-date           | String | 是   | 签名请求的日期和时间，遵循ISO8601标准，使用UTC时间，格式为YYYYMMDDTHHmmssZ。日期必须与`authorization`请求头中使用的日期相匹配。例如： `20180707T150456Z` |
| x-jdcloud-nonce          | String | 是   | 随机生成的字符串，需要保证一段时间内的唯一性                 |
| x-jdcloud-security-token | String | 否   | 如果用户开启了mfa操作保护，该API接口又是需要保护的接口，调用时需要传此参数 |
| authorization            | String | 是   | 鉴权信息，由签名算法生成，生成的数据格式例如：JDCLOUD2-HMAC-SHA256 Credential=accessKey/20180226/cn-north-1/nc/jdcloud2_request, SignedHeaders=content-type;host;x-jdcloud-date;x-jdcloud-nonce, Signature=4432ad80f84a41d56f3d41b59918a0844b468d8c131fa7d7c993693f62cf43ef` |



### POST请求示例

下面以调用内容安全图片异步鉴黄检测创建接口为例，介绍如何产生一个POST类型OpenAPI调用。（直接构造OpenAPI调用较为繁琐，建议您直接使用京东云提供的SDK）

首先在内容安全接口概览页，您可以看到不同检测接口的请求地址，请求方式为POST，请求地址为/v1/image:asyncscan，在API参考里可以看到请求参数。POST请求的所有参数都是以JSON格式的结构体，通过请求body发送到服务端。

最终生成的调用为：

```
POST
https://censor.jdcloud-api.com/v1/image:asyncscan
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

其中，（**解释需要替换一下**）

- `POST`指定了请求方法。
- `v1/image:asyncscan`是请求路径。
- `clientInfo=%7b%22userId%22%3a%22120234234%22%2c%22userNick%22%3a%22Mike%22%2c%22userType%22%3a%22others%22%7d`为编码后的公共查询参数。
- 此后是http头，其中`Accept`到`Authorization`是签名时要用到的公共请求头。
- `{}`内的内容是JSON格式的请求body。





/////以下是阿里的



### 公共查询参数

所有HTTP请求中，都包含如下公共查询（Query）参数：

| 名称           | 类型   | 是否必需 | 描述                                                         |
| :------------- | :----- | :------- | :----------------------------------------------------------- |
| **clientInfo** | String | 否       | 客户端信息，由ClientInfo结构体JSON序列化所得。包括umid/imei等信息，具体结构描述见[ClientInfo](https://help.aliyun.com/document_detail/53413.html?spm=a2c4g.11186623.6.611.55d95ac9uFF5yV#table-vlp-3s4-w2b)。 |

| 名称            | 类型   | 是否必需 | 描述                                                         |
| :-------------- | :----- | :------- | :----------------------------------------------------------- |
| **sdkVersion**  | String | 否       | SDK版本，通过SDK调用时，需提供该字段。                       |
| **cfgVersion**  | String | 否       | 配置信息版本，通过SDK调用时，需提供该字段。                  |
| **userType**    | String | 否       | 用户账号类型，取值为：taobaoothers                           |
| **userId**      | String | 否       | 用户ID，唯一标识一个用户。                                   |
| **userNick**    | String | 否       | 用户昵称。                                                   |
| **avatar**      | String | 否       | 用户头像。                                                   |
| **imei**        | String | 否       | 硬件设备码。                                                 |
| **imsi**        | String | 否       | 运营商设备码。                                               |
| **umid**        | String | 否       | 设备指纹。                                                   |
| **ip**          | String | 否       | 该IP应该为公网IP。如果请求中不填写，服务端会尝试从链接或者从HTTP头中获取。如果请求是从设备端发起的，该字段通常不填写；如果是从后台发起的，该IP为用户的login IP或者设备的公网IP。 |
| **os**          | String | 否       | 设备的操作系统，如：Android 6.0                              |
| **channel**     | String | 否       | 渠道号。                                                     |
| **hostAppName** | String | 否       | 宿主应用名称。                                               |
| **hostPackage** | String | 否       | 宿主应用包名。                                               |
| **hostVersion** | String | 否       | 宿主应用版本。                                               |



