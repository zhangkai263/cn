## 签名算法

#### 京东云提供的签名算法通过四个任务即可完成，详情如下。

### 任务1：创建规范请求

要开始签名过程，请创建一个字符串，其中包含来自标准（规范）格式的请求的信息。这可确保 JDCLOUD 在收到请求时计算出的签名与您计算出的签名相同。

按照此处的步骤创建请求的规范版本。否则，您的版本与 JDCLOUD 计算得到的版本将不匹配，请求将被拒绝。 以下示例演示了创建规范请求的伪代码。

#### 例 规范请求伪代码

```
  CanonicalRequest =
  HTTPRequestMethod + '\n' +
      CanonicalURI + '\n' +
      (CanonicalQueryString or '') + '\n' +
      CanonicalHeaders + '\n' +
      SignedHeaders + '\n' +
      Lowercase(HexEncode(Hash(RequestPayload or '')))
```

在此伪代码中，Hash 表示生成消息摘要的函数，通常是 SHA-256。（在该过程稍后的阶段中，您将指定要使用的哈希算法。）HexEncode 表示以小写字母形式返回摘要的 base-16 编码的函数。例如，HexEncode("m") 返回值 6d 而不是 6D。输入的每一个字节都必须表示为两个十六进制字符。

以下示例演示如何构造规范形式的 VM 请求。原始请求在从客户端发送到 JDCLOUD 时可能看上去与此类似，不过此示例还不包括签名信息。

#### 例 请求

```
    GET https://vm.jdcloud-api.com/v1/regions/cn-north-1/metrics/cpu_util/metricData?serviceCode=vm&startTime=2018-04-04T06:01:46ZHTTP/1.1
    Host: vm.jdcloud-api.com
    Content-Type: application/json
    x-jdcloud-date: 20180404T061302Z
    x-jdcloud-nonce:ed558a3b-9808-4edb-8597-187bda63a4f2
```

前面的示例请求是一个 GET 请求（方法），它向 Virtual-Machines（主机）发出调用。要创建规范请求，请将以下来自每个步骤的部分连接为一个字符串：

1. 首先是 HTTP 请求方法（GET、PUT、POST 等），后跟换行符。

#### 例 请求方法

```
 GET 
```

1. 添加规范 URI 参数，后跟换行符。规范 URI 是 URI 的绝对路径部分的 URI 编码版本，该版本是 URI 中的一切 - 从 HTTP 主机到开始查询字符串参数（如果有）的问号字符（“?”）。 根据 [RFC 3986](http://tools.ietf.org/html/rfc3986) 标准化 URI 路径。移除冗余和相对路径部分。路径中每个部分都必须 URI 编码。

#### 例 使用编码的规范 URI

```
 /v1/regions/cn-north-1/instances/jdcloud%20api/
```

#### 注意：

例外情况是，您没有使用规范的 URI 路径来提出请求。例如，如果您拥有包含名为 my-object//example//photo.user 的对象的存储桶，请使用该路径。如果将该路径标准化为 my-object/example/photo.user，则会导致请求失败。有关更多信息，请参阅 任务 1：创建规范请求。 如果绝对路径为空，则使用正斜杠 (/)。在示例VM请求中，URI中的绝对路径为：/v1/regions/cn-north-1/metrics/cpu_util/metricData

#### 例 规范 URI

```
 /v1/regions/cn-north-1/metrics/cpu_util/metricData 
```

1. 添加规范查询字符串，后跟换行符。如果请求不包括查询字符串，请使用空字符串（实际上是空白行）。示例请求具有以下查询字符串。

#### 例 规范查询字符串

```
 serviceCode=vm&startTime=2018-04-04T06%3A01%3A46Z
```

要构建规范查询字符串，请完成以下步骤：

（1）按字符代码点以升序顺序对参数名称进行排序。具有重复名称的参数应按值进行排序。例如，以大写字母 F 开头的参数名称排在以小写字母 b 开头的参数名称之前。

（2）根据以下规则对每个参数名称和值进行 URI 编码：

- 请勿对 [RFC 3986](http://tools.ietf.org/html/rfc3986)定义的任何非预留字符进行 URI 编码，这些字符包括：A-Z、a-z、0-9、连字符 (-)、下划线 (_)、句点 (.) 和波形符 (~)。
- 使用 %XY 对所有其他字符进行百分比编码，其中“X”和“Y”为十六进制字符（0-9 和大写字母 A-F）。例如，空格字符必须编码为 %20（不像某些编码方案那样使用“+”)，扩展 UTF-8 字符必须采用格式 %XY%ZA%BC。
- 对参数值中的任何等于 (=) 字符进行双重编码。

（3）以排序后的列表中第一个参数名称开头，构造规范查询字符串。

（4）对于每个参数，追加 URI 编码的参数名称，后跟等号字符 (=)，再接 URI 编码的参数值。对没有值的参数使用空字符串。

（5）在每个参数值后追加与字符 (&)，列表中最后一个值除外。

有关身份验证参数的更多信息，请参阅 **任务2：待签字符串**

4．添加规范标头，后跟换行符。规范标头包括您要包含在签名请求中的所有 HTTP 标头的列表。 对于 HTTP/1.1 请求，您必须至少包含 host、x-jdcloud-nonce、x-jdcloud-date 标头。标准标头（如 content-type）是可选的。不同的服务可能需要其他标头。

#### 例 规范标头

```
content-type: application/json\n
    host: vm.jdcloud-api.com\n
    x-jdcloud-date: 20180404T061302Z\n
    x-jdcloud-nonce:ed558a3b-9808-4edb-8597-187bda63a4f2\n
```

要创建规范标头列表，请将所有标头名称转换为小写形式并删除前导空格和尾随空格。将标头值中的连续空格转换为单个空格。 以下伪代码描述如何构造规范标头列表：

```
CanonicalHeaders =
    CanonicalHeadersEntry0 + CanonicalHeadersEntry1 + ... + CanonicalHeadersEntryN
    CanonicalHeadersEntry =
    Lowercase(HeaderName) + ':' + Trimall(HeaderValue) + '\n'
```

Lowercase 表示将所有字符转换为小写字母的函数。Trimall 函数删除值前后的多余空格并将连续空格转换为单个空格。 通过按字符代码对（小写）标头排序，然后对标头名称进行迭代操作，来构建规范标头列表。根据以下规则构造每个标头：

- 追加小写标头名称，后跟冒号。
- 追加该标头的值的逗号分隔列表。请勿对有多个值的标头进行值排序。
- 追加一个新行（“\n”）。

下列示例对更复杂的一组标头及其规范形式进行比较：

#### 例 原始标头

```
   Host: vm.jdcloud-api.com \n
   Content-Type: application/json \n
   My-header1:    a   b   c  \n
   x-jdcloud-date: 20180404T061302Z\n
   x-jdcloud-nonce:ed558a3b-9808-4edb-8597-187bda63a4f2\n
   My-Header2:    "a   b   c"  \n
```

#### 例 规范形式

```
   content-type: application/json \n
   host: vm.jdcloud-api.com \n
   my-header1:a b c\n
   my-header2:"a b c"\n
   x-jdcloud-date: 20180404T061302Z\n
   x-jdcloud-nonce:ed558a3b-9808-4edb-8597-187bda63a4f2\n
```

#### 注意：

每个标头都后跟换行符，这意味着完整列表以换行符结束。 对于规范形式，进行了下列更改：

- 标头名称已转换为小写字符。
- 标头已按字符代码进行排序。
- 已从 my-header1 和 my-header2 值中删除前导空格和尾随空格。
- 对于 my-header1 和 my-header2 值，已将 a b c 中的连续空格转换为单个空格。

1. 添加已签名的标头，后跟换行符。该值是您包含在规范标头中的标头列表。通过添加此标头列表，您可以向 JDCLOUD 告知请求中的哪些标头是签名过程的一部分以及在验证请求时 JDCLOUD可以忽略哪些标头（例如，由代理添加的任何附加标头）。

对于 HTTP/1.1 请求，host 标头必须作为已签名标头包括在内。如果包括日期或 x-jdcloud-date 标头，则还必须包括在已签名标头列表中的标头。

要创建已签名标头列表，请将所有标头名称转换为小写形式，按字符代码对其进行排序，并使用分号来分隔这些标头名称。以下伪代码描述如何构建已签名标头的列表。Lowercase 表示将所有字符转换为小写字母的函数。

```
   SignedHeaders =
   Lowercase(HeaderName0) + ';' + Lowercase(HeaderName1) + ";" + ... +               
   Lowercase(HeaderNameN)
```

通过对按小写字符代码排序的标头名称集合进行迭代操作，构建已签名标头的列表。对于除最后一个标头外的每个标头名称，请在标头名称后追加分号（“;”），将它与后面的标头名称分隔开。

#### 例 已签名标头

```
   content-type;host; x-jdcloud-date\n
```

1. 使用 SHA256 等哈希 (摘要) 函数以基于 HTTP 或 HTTPS 请求正文中的负载创建哈希值。JDCLOUD 不需要您使用特定字符编码来对负载中的文本进行编码。

#### 例 负载结构

```
   HashedPayload = Lowercase(HexEncode(Hash(requestPayload)))
```

在创建待签字符串后，请指定用于对负载进行哈希处理的签名算法。例如，如果您使用的是 SHA256，则将指定JDCLOUD2-HMAC-SHA256 作为签名算法。经过哈希处理的负载必须以小写十六进制字符串形式表示。 如果负载为空，则使用空字符串作为哈希函数的输入。在此 VM 示例中，负载为空。

#### 例 经过哈希处理的负载 (空字符串)

```
   e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855
```

1. 要构建完整的规范请求，请将来自每个步骤的所有组成部分组合为单个字符串。如上所述，每个组成部分都以换行符结尾。如果您执行前述规范请求伪代码，生成的规范请求将显示在以下示例中。

#### 例 规范请求

```
   GET
   /v1/regions/cn-north-1/metrics/cpu_util/metricData
   serviceCode=vm&startTime=2018-04-04T06%3A01%3A46Z
   content-type:application/json
   host:vm.jdcloud-api.com
   x-jdcloud-date:20180404T061302Z
   x-jdcloud-nonce:ed558a3b-9808-4edb-8597-187bda63a4f2 

   content-type;host;x-jdcloud-date;x-jdcloud-nonce
   e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855
```

1. 使用您对负载进行哈希处理时所使用的相同算法来创建规范请求的摘要（哈希）。

#### 注意：

在计算摘要之前，JDCLOUD 不需要您使用特定字符编码来对规范请求进行编码。经过哈希处理的规范请求必须以小写十六进制字符串形式表示。以下示例显示了使用 SHA-256 对示例规范请求进行哈希处理的结果。

#### 例 经过哈希处理的规范请求

```
   11c6350fd0b09dc62a9bbb8a4b550b73e5d1663b195c6f062ee2f42e2a356052
```

在**任务 2：创建待签字符串**中，将经过哈希处理的规范请求包括到待签字符串中。

### 任务2：创建待签字符串

待签字符串包含有关您的请求和您在**任务 1：创建规范请求**中创建的规范请求的元信息。您将使用待签字符串和稍后在**任务 3：计算签名**中为计算请求签名而作为输入创建的派生签名密钥。 要创建待签字符串，请如以下伪代码所示，连接算法、日期和时间、凭证范围和规范请求的摘要：

#### 待签字符串结构

```
   StringToSign =
       Algorithm + \n +
       RequestDateTime + \n +
       CredentialScope + \n +
       HashedCanonicalRequest
```

以下示例演示如何使用**任务 1：创建规范请求**中的相同请求构造待签字符串。

#### 例 HTTPS 请求

```
  GET https://vm.jdcloud-api.com/v1/regions/cn-north-1/metrics/cpu_util/metricData?serviceCode=vm&startTime=2018-04-04T06:01:46ZHTTP/1.1
  Host: vm.jdcloud-api.com
  Content-Type: application/json
  x-jdcloud-date: 20180404T061302Z
  x-jdcloud-nonce:ed558a3b-9808-4edb-8597-187bda63a4f2
```

#### 创建待签字符串

1. 以算法名称开头，后跟换行符。该值是您用于计算规范请求摘要的哈希算法。对于 SHA256，算法是 JDCLOUD2-HMAC-SHA256。

   ```
   JDCLOUD2-HMAC-SHA256\n
   ```

2. 追加请求日期值，后跟换行符。该日期是使用 ISO8601 基本格式以 YYYYMMDD'T'HHMMSS'Z' 格式在 x-jdcloud-date 标头中指定的。此值必须与您在前面所有步骤中使用的值匹配。

   ```
   20180404T061302Z\n
   ```

3. 追加凭证范围值，后跟换行符。此值是一个字符串，包含日期、目标区域、所请求的服务和小写字符形式的终止字符串（“jdcloud2_request”）。区域和服务名称字符串必须采用 UTF-8 编码。

   ```
   20180404/cn-north-1/vm/jdcloud2_request\n
   ```

- 日期必须为 YYYYMMDD 格式。请注意，日期不包括时间值。
- 请确保您指定的区域是您将请求发送到的目标区域。

1. 追加您在**任务 1：创建规范请求**中创建的规范请求的哈希。该值后面不跟换行符。如[RFC 4648 第 8 节](http://tools.ietf.org/html/rfc4648#section-8)所定义，经过哈希处理的规范请求必须为 base-16 编码的小写形式。

   ```
    11c6350fd0b09dc62a9bbb8a4b550b73e5d1663b195c6f062ee2f42e2a356052
   ```

以下待签字符串是 2018 年 4 月 4 日的对 VM的请求。

#### 待签字符串

```
   JDCLOUD2-HMAC-SHA256
   20180404T061302Z
   20180404/cn-north-1/vm/jdcloud2_request
   11c6350fd0b09dc62a9bbb8a4b550b73e5d1663b195c6f062ee2f42e2a356052
```

### 任务3：计算签名

在计算签名之前，从 JDCLOUD 秘密访问密钥派生出签名密钥。由于派生签名密钥特定于日期、服务和区域，因此它提供了更高程度的保护。秘密访问密钥不只用于对请求进行签名。然后将签名密钥和您在**任务 2：创建待签字符串**中创建的待签字符串用作加密哈希函数的输入。加密哈希函数生成的十六进制编码结果就是签名。 JDCLOUD 不需要您使用特定字符编码来对待签字符串进行编码。

#### 计算签名

1. 派生您的签名密钥。为此，请使用您的秘密访问密钥创建一系列基于哈希的消息身份验证代码 (HMAC)。此代码显示在以下伪代码中，其中 HMAC(key, data) 表示以二进制格式返回输出的 HMAC-SHA256 函数。每个哈希函数的结果将成为下一个函数的输入。

#### 用于派生签名密钥的伪代码

```
  kSecret =京东云Access Key Secret
  kDate = HMAC("JDCLOUD2" + kSecret, Date)
  kRegion = HMAC(kDate, Region)
  kService = HMAC(kRegion, Service)
  kSigning = HMAC(kService, "jdcloud2_request")
```

请注意，哈希过程中所使用的日期的格式为 YYYYMMDD（例如，20180404），不包括时间。 确保以正确的顺序为您要使用的编程语言指定 HMAC 参数。在此示例中，密钥是第一个参数，数据 (消息) 是第二个参数，但您使用的函数可能以不同顺序指定密钥和数据。 使用摘要 (二进制格式) 来派生密钥。大多数语言都有用来计算二进制格式哈希（通常称为摘要）或十六进制编码哈希（称为十六进制摘要）的函数。派生密钥需要使用二进制格式摘要。 以下示例显示了用于派生签名密钥的输入以及所生成的输出，其中 kSecret = 93C107EF1F3A0C46C6329C04F561A29E。 该示例使用与任务 1 和任务 2 中的请求相同的参数（对 VM 的请求，位于 cn-north-1 区域，2018 年 4 月 4 日）。

#### 示例输入

```
  HMAC(HMAC(HMAC(HMAC("JDCLOUD2" + kSecret," 20180404")," cn-north-1"),"vm"),"jdcloud2_request")
```

以下示例显示了此 HMAC 哈希操作序列生成的派生签名密钥。这说明了此二进制签名密钥中每个字节的十六进制表示形式。

#### 示例签名密钥

```
  93C107EF1F3A0C46C6329C04F561A29E
```

1. 计算签名。要计算签名，请使用派生的签名密钥和待签字符串作为加密哈希函数的输入。在计算签名后，将二进制值转换为十六进制表示形式。

以下伪代码说明如何计算签名：

```
  signature = HexEncode(HMAC(derived signing key, string to sign))
```

#### 注意：

确保以正确的顺序为您要使用的编程语言指定 HMAC 参数。在此示例中，密钥是第一个参数，数据 (消息) 是第二个参数，但您使用的函数可能以不同顺序指定密钥和数据。 以下示例显示了使用与任务 2 中相同的签名密钥和待签字符串会生成的签名：

#### 示例签名

9b2026198d3acbf99da395e23a994ed369a0d70f5b4a5d7567dd0caf3009656d

### 任务4：向 HTTP 请求添加签名

#### 将签名信息添加到 Authorization 标头

通过将签名信息添加到名为 Authorization 的 HTTP 标头，可以包括签名信息。此标头内容是在按前面的步骤所述计算签名之后创建的，因此 Authorization 标头未包含在已签名标头的列表中。尽管此标头名为 Authorization，但签名信息实际上用于身份验证。 计算签名后，需要将签名的结果作为Authorization请求头将其添加到请求中。

Authorization的格式为：

```
JDCLOUD2-HMAC-SHA256 Credential={Access Key}/{Date}/{Region}/{Service}/jdcloud2_request, SignedHeaders={SignedHeaders}, Signature={signResult}
```

下面的示例说明一个完整的 Authorization 标头：

```
curl -X GET -H "x-jdcloud-date:20180404T061302Z" -H "x-jdcloud-nonce:ed558a3b-9808-4edb-8597-187bda63a4f2" -H "Authorization:JDCLOUD2-HMAC-SHA256 Credential=C61249XXXXXXXXXXXXXXXXXX/20180404/cn-north-1/vm/jdcloud2_request, SignedHeaders=content-type;host;x-jdcloud-date;x-jdcloud-nonce, Signature=9b2026198d3acbf99da395e23a994ed369a0d70f5b4a5d7567dd0caf3009656d" -H "Content-Type:application/json" "http://vm.jdcloud-api.com/v1/regions/cn-north-1/metrics/cpu_util/metricData?serviceCode=vm&startTime=2018-04-04T06:01:46Z"
```

请注意以下几点：

- 算法和 Credential 之间没有逗号。但是，SignedHeaders 和 Signature 使用逗号与之前的值隔开。
- Credential 值以访问密钥 ID 开头，后跟正斜杠 (/)，再接您在任务 2：创建待签字符串中计算得出的凭证值范围。秘密访问密钥用于为签名派生签名密钥，但未包含在通过请求发送的签名信息中。

### 签名步骤示例

假设用户签名的输入信息为：

```
   Access Key：'TESTAK'
   Access Key Secret：'TESTSK'
   Date：'20190214T104514Z'
   Region：'cn-north-1'
   Service：'test'
   请求地址和路径：'http://test.jdcloud-api.com/v1/resource:action?p1=p1&p0=p0&o=%&u=u'
   参与签名的请求头：
       'x-jdcloud-date' => '20190214T104514Z',
       'x-jdcloud-nonce' => 'testnonce',
       'x-my-header' => 'test',
       'x-my-header_blank' => ' blank'
   请求地址和路径：'http://test.jdcloud-api.com/v1/resource:action?p1=p1&p0=p0&o=%&u=u'
   请求体为： 'body data'
```

执行前文所述的 **任务1：创建规范请求** 之后的结果为：

```
    POST
    /v1/resource%3Aaction
    o=%25&p0=p0&p1=p1&u=u
    x-jdcloud-date:20190214T104514Z
    x-jdcloud-nonce:testnonce
    x-my-header:test
    x-my-header_blank:blank

    x-jdcloud-date;x-jdcloud-nonce;x-my-header;x-my-header_blank
    e51832a118eeff7ad976d635b7d04538e362e4c21bd0f6253580b0a83a209074
```

执行前文所述的 **任务2：创建待签字符串** 之后的结果为：

```
JDCLOUD2-HMAC-SHA256
    20190214T104514Z
    20190214/cn-north-1/test/jdcloud2_request
    fb2e317056269590681d091f8eb22272967c0b922b2deda887312215ea4eed4c
```

执行前文所述的 **任务3：计算签名** 之后的结果为：

```
    kDate = dbbdee87f18afeedd6456923587f5323b90c3a77fbc6e381b243c90c672d5daf
    kRegion = 78e1da51757851329da8e31a6bad9f509c4816cacb8d5b2b9d171e49498ce4b6
    kService = 44050ec21c8e839f36ff5b2d44ec4a5876f4ffd6ef9a7a692a3eba40396bdb68
    kSigning = a4e50bcb6001be0008696b173c30172b5ce22a77db00d21c6a9d69de2ba33b7d

    signResult = 2a98f83c074e7bee260bfc8ef64f009c07595bd93f7f0c3f4e156bf6479ed9bf
```

注意：kDate、kRegion、kService、kSigning应该是二进制格式的结果，下面展示的是转化为16进制字符串展示后的结果。这个只是为了页面展示目的，实际签名过程中，16进制的转化结果绝对不要作为下一步的输入，请使用原始二进制格式数据。）

执行前文所述的 **任务4：向 HTTP 请求添加签名** 之后的结果为：

```
    JDCLOUD2-HMAC-SHA256 Credential=TESTAK/20190214/cn-north-1/test/jdcloud2_request, SignedHeaders=x-jdcloud-date;x-jd
```