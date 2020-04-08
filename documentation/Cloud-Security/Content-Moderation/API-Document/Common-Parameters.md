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
| authorization            | String | 是   | 鉴权信息，由签名算法生成，生成的数据格式例如：JDCLOUD2-HMAC-SHA256 Credential=accessKey/20180226/cn-north-1/censor/jdcloud2_request, SignedHeaders=content-type;host;x-jdcloud-date;x-jdcloud-nonce, Signature=4432ad80f84a41d56f3d41b59918a0844b468d8c131fa7d7c993693f62cf43ef` |



### POST请求示例

下面以调用内容安全图片异步鉴黄检测创建接口为例，介绍如何产生一个POST类型OpenAPI调用。（直接构造OpenAPI调用较为繁琐，建议您直接使用京东云提供的SDK）

首先在内容安全接口概览页，您可以看到不同检测接口的请求地址，请求方式为POST，请求地址为/v1/image:asyncscan，在API参考里可以看到请求参数。POST请求的所有参数都是以JSON格式的结构体，通过请求body发送到服务端。

最终生成的调用为：

```
POST
http://censor.jdcloud-api.com/v1/image:asyncscan
```

请求头:

```
x-jdcloud-algorithm: JDCLOUD2-HMAC-SHA256
x-jdcloud-date: 20200407T031912Z
x-jdcloud-nonce: 0b34c307-99fb-493e-ae4d-651ddf81cfc8
authorization: JDCLOUD2-HMAC-SHA256 Credential=accessKey/20200407/jdcloud-api/censor/jdcloud2_request, SignedHeaders=content-type;host;x-jdcloud-date;x-jdcloud-nonce, Signature=da90775ac5bccc8301b287531aaa392a027b05d82d70a0b4fea780c175b39fcd
```

请求体：

```
{
	"scenes": [
		"porn"
	],
	"tasks": [
		{
			"dataId": "81",
			"url": "http://xxx.xxx.xxx/img1.jpg"
		}
	],
	"callback": "http://xxx.xxx.xxx/callback",
	"seed": "seed"
}

```

其中，

- `POST`指定了请求方法。
- `/v1/image:asyncscan`是请求路径。
- 此后是http头，其中`x-jdcloud-algorithm`到`authorization`是签名时要用到的公共请求头。生成方法详见[签名算法](https://docs.jdcloud.com/cn/common-declaration/api/authorization-rules)

