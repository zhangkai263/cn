# 签名算法 #
### 京东云提供的签名算法共分为四个部分。
## 任务1：创建规范请求 ##
要开始签名过程，请创建一个字符串，其中包含来自标准（规范）格式的请求的信息。这可确保 JDCLOUD 在收到请求时计算出的签名与您计算出的签名相同。

按照此处的步骤创建请求的规范版本。否则，您的版本与 JDCLOUD 计算得到的版本将不匹配，请求将被拒绝。
以下示例演示了创建规范请求的伪代码。
 
#### 例 规范请求伪代码
 

	CanonicalRequest =
	  HTTPRequestMethod + '\n' +
          CanonicalURI + '\n' +
          (CanonicalQueryString or '') + '\n' +
          CanonicalHeaders + '\n' +
          SignedHeaders + '\n' +
          Lowercase(HexEncode(Hash(RequestPayload or '')))



在此伪代码中，Hash 表示生成消息摘要的函数，通常是 SHA-256。（在该过程稍后的阶段中，您将指定要使用的哈希算法。）HexEncode 表示以小写字母形式返回摘要的 base-16 编码的函数。例如，HexEncode("m") 返回值 6d 而不是 6D。输入的每一个字节都必须表示为两个十六进制字符。 

以下示例演示如何构造规范形式的 VM 请求。原始请求在从客户端发送到 JDCLOUD 时可能看上去与此类似，不过此示例还不包括签名信息。
 
#### 例 请求
 

        GET https:// vm.jdcloud-api.com/v1/regions/cn-north-1/metrics/cpu_util/metricData?serviceCode=vm&startTime= 2018-04-04T06:01:46ZHTTP/1.1
        Host: vm.jdcloud-api.com
        Content-Type: application/json
        x-jdcloud-date: 20180404T061302Z
        x-jdcloud-nonce:ed558a3b-9808-4edb-8597-187bda63a4f2


前面的示例请求是一个 GET 请求（方法），它向 Virtual-Machines（主机）发出调用。要创建规范请求，请将以下来自每个步骤的部分连接为一个字符串：
1. 首先是 HTTP 请求方法（GET、PUT、POST 等），后跟换行符。 

#### 例 请求方法
        GET 

2、 添加规范 URI 参数，后跟换行符。规范 URI 是 URI 的绝对路径部分的 URI 编码版本，该版本是 URI 中的一切 - 从 HTTP 主机到开始查询字符串参数（如果有）的问号字符（“?”）。
根据 RFC 3986标准化 URI 路径。移除冗余和相对路径部分。路径中每个部分都必须 URI 编码。 

#### 例 使用编码的规范 URI
        /v1/regions/cn-north-1/instances/jdcloud%20api/


#### 注意：
例外情况是，您没有使用规范的 URI 路径来提出请求。例如，如果您拥有包含名为 my-object//example//photo.user 的对象的存储桶，请使用该路径。如果将该路径标准化为 my-object/example/photo.user，则会导致请求失败。有关更多信息，请参阅 任务 1：创建规范请求。 
如果绝对路径为空，则使用正斜杠 (/)。在示例 VM 请求中，URI 中的主机后没有任何内容，因此，绝对路径为空。


#### 例 规范 URI
     / 

3. 添加规范查询字符串，后跟换行符。如果请求不包括查询字符串，请使用空字符串（实际上是空白行）。示例请求具有以下查询字符串。

#### 例 规范查询字符串
     serviceCode=vm&startTime=2018-04-04T06%3A01%3A46Z

要构建规范查询字符串，请完成以下步骤：
（1）按字符代码点以升序顺序对参数名称进行排序。具有重复名称的参数应按值进行排序。例如，以大写字母 F 开头的参数名称排在以小写字母 b 开头的参数名称之前。
（2）根据以下规则对每个参数名称和值进行 URI 编码：










CanonicalQueryString为请求查询字符串。要构建规范查询字符串，首先按字符代码对**参数名按升序**进行排序，如果重复名称的参数再**按值升序**进行排序。然后对每个**参数名称和值分别进行URI编码**（请不要重复编码）。接着通过从排序列表中的第一个参数名称开始构建规范查询字符串。**对于每个参数，附加URI编码的参数名称，后跟等号字符（=），后跟URI编码的参数值**。对没有值的参数使用空字符串。在每个参数值之后附加&符号，除了列表中的最后一个值。

要创建规范HTTP请求头列表，请将所有HTTP头名称转换为**小写**（请保证请求头名称不能包含空格），并**删除请求头value中前导空格和尾随空格**。通过用字符代码**升序**对请求头进行排序，然后遍历请求头名称来构建规范HTTP请求头列表。注意**：x-jdcloud-date**（遵循ISO8601标准，使用UTC时间，格式为YYYYMMDDTHHmmssZ）, **x-jdcloud-nonce**必须在请求中包含并且参与签名；如果有**x-jdcloud-security-token**头，此项也必须参与签名。

CanonicalHeaders表示需要参与签名的请求头及值，使用:分隔名称和值，并添加换行符。
SignedHeaders用于告知京东云，请求头中的哪些是签名过程的一部分。

最后，需要把请求体中的payload做SHA256哈希后，表示为**小写十六进制字符串**。如果有效负载为空，则使用空字符串作为Hash函数的输入。

 

POST示例请求

 
	POST
	/v1/regions/cn-north-1/instances 

	content-type:application/json
	host:vm.jdcloud-api.com
	x-jdcloud-date:20180404T034307Z
	x-jdcloud-nonce:ed558a3b-9808-4edb-8597-187bda63a4f2 	

	content-type;host;x-jdcloud-date;x-jdcloud-nonce
	eadd64d9bd63436404495b9a2cd0a5b4c59b01332a88d81da27815824b3c4280
 

