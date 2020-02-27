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


- 请勿对 RFC 3986定义的任何非预留字符进行 URI 编码，这些字符包括：A-Z、a-z、0-9、连字符 (-)、下划线 (_)、句点 (.) 和波形符 (~)。 

- 使用 %XY 对所有其他字符进行百分比编码，其中“X”和“Y”为十六进制字符（0-9 和大写字母 A-F）。例如，空格字符必须编码为 %20（不像某些编码方案那样使用“+”)，扩展 UTF-8 字符必须采用格式 %XY%ZA%BC。

- 对参数值中的任何等于 (=) 字符进行双重编码。

（3）以排序后的列表中第一个参数名称开头，构造规范查询字符串。
（4）对于每个参数，追加 URI 编码的参数名称，后跟等号字符 (=)，再接 URI 编码的参数值。对没有值的参数使用空字符串。
（5）在每个参数值后追加与字符 (&)，列表中最后一个值除外。
有关身份验证参数的更多信息，请参阅 **任务2：待签字符串**

4．添加规范标头，后跟换行符。规范标头包括您要包含在签名请求中的所有 HTTP 标头的列表。
对于 HTTP/1.1 请求，您必须至少包含 host、x-jdcloud-nonce、x-jdcloud-date 标头。标准标头（如 content-type）是可选的。不同的服务可能需要其他标头。

#### 例 规范标头 	
	content-type: application/json\n
        host: vm.jdcloud-api.com\n
        x-jdcloud-date: 20180404T061302Z\n
        x-jdcloud-nonce:ed558a3b-9808-4edb-8597-187bda63a4f2\n

要创建规范标头列表，请将所有标头名称转换为小写形式并删除前导空格和尾随空格。将标头值中的连续空格转换为单个空格。
以下伪代码描述如何构造规范标头列表：
 	
	CanonicalHeaders =
        CanonicalHeadersEntry0 + CanonicalHeadersEntry1 + ... + CanonicalHeadersEntryN
        CanonicalHeadersEntry =
        Lowercase(HeaderName) + ':' + Trimall(HeaderValue) + '\n'
	
	
Lowercase 表示将所有字符转换为小写字母的函数。Trimall 函数删除值前后的多余空格并将连续空格转换为单个空格。 
通过按字符代码对（小写）标头排序，然后对标头名称进行迭代操作，来构建规范标头列表。根据以下规则构造每个标头：
- 追加小写标头名称，后跟冒号。	
- 追加该标头的值的逗号分隔列表。请勿对有多个值的标头进行值排序。	
- 追加一个新行（“\n”）。	





 

POST示例请求

 
	POST
	/v1/regions/cn-north-1/instances 

	content-type:application/json
	host:vm.jdcloud-api.com
	x-jdcloud-date:20180404T034307Z
	x-jdcloud-nonce:ed558a3b-9808-4edb-8597-187bda63a4f2 	

	content-type;host;x-jdcloud-date;x-jdcloud-nonce
	eadd64d9bd63436404495b9a2cd0a5b4c59b01332a88d81da27815824b3c4280
 

