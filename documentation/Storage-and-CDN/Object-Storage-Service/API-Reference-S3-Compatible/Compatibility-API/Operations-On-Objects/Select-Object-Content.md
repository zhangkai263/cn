# Select Object Content
## 描述
该操作可以对文件执行SQL语句，返回执行结果。
## 请求
### 语法
```HTTP
POST /ObjectName?select&select-type=2 HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jcloud-oss.com
Date: date
Authorization: authorization string (See Authenticating Requests (AWS Signature Version4))

<SelectObjectContentRequest>
   <Expression>string</Expression>
   <ExpressionType>string</ExpressionType>
   <RequestProgress>
      <Enabled>boolean</Enabled>
   </RequestProgress>
   <InputSerialization>
      <CompressionType>string</CompressionType>
      <CSV>
         <AllowQuotedRecordDelimiter>boolean</AllowQuotedRecordDelimiter>
         <Comments>string</Comments>
         <FieldDelimiter>string</FieldDelimiter>
         <FileHeaderInfo>string</FileHeaderInfo>
         <QuoteCharacter>string</QuoteCharacter>
         <QuoteEscapeCharacter>string</QuoteEscapeCharacter>
         <RecordDelimiter>string</RecordDelimiter>
      </CSV>
   </InputSerialization>
   <OutputSerialization>
      <CSV>
         <FieldDelimiter>string</FieldDelimiter>
         <QuoteCharacter>string</QuoteCharacter>
         <QuoteEscapeCharacter>string</QuoteEscapeCharacter>
         <QuoteFields>string</QuoteFields>
         <RecordDelimiter>string</RecordDelimiter>
      </CSV>
</SelectObjectContentRequest>
```
### 请求参数
无请求参数

### 请求Header
无特殊Header

### 请求元素
名称|描述|必须
---|---|---
Expression|SQL表达式，UTF-8编码下最大256 KB<br>类型：String|是
ExpressionType|表达式类型<br>类型:String<br>有效值:SQL|是
InputSerialization|描述请求Object的格式<br>类型：容器|是
OutputSerialization|描述SELECT输出格式<br>类型：容器|是
RequestProgress|处理进度，开启后定期发送处理进度消息<br>类型：容器|否

InputSerialization 容器：
名称|描述|必须
---|---|---
CompressionType|描述请求Object的压缩类型<br>类型：String<br>有效值：NONE、GZIP<br>默认值：NONE<br>父标签：InputSerialization|否
CSV|描述请求Object的CSV格式<br>类型：容器<br>父标签：InputSerialization|是
RecordDelimiter|指定行分隔符，不能为空<br>类型：String<br>默认值：\n<br>父标签：CSV|否
FieldDelimiter|指定列分隔符，不能为空<br>类型：String<br>默认值：,<br>父标签：CSV|否
QuoteCharacter|指定引用符号，不能为空。如"a,b"，将解析为a,b<br>类型：String<br>默认值："<br>父标签：CSV|否
QuoteEscapeCharacter|指定引用转义符，不能为空。如"""a,b"""将解析为" a,b "<br>类型：String<br>默认值："<br>父标签：CSV|否
FileHeaderInfo|描述首行定义<br>类型：String<br>有效值：NONE（非列名称）<br>USE（是列名称，且可使用列名称过滤，如 SELECT "name" FROM S3Object）<br>IGNORE（是列名称，但不可使用列名称过滤，可使用_1 , _2，如SELECT _1 FROM S3Object）<br>父标签：CSV|否
Comments|指定描述字符，不能为空<br>类型：String<br>默认值：#<br>父标签：CSV|否
AllowQuotedRecordDelimiter|指定是否允许数据包含换行符。设置为TURE可能导致性能变慢<br>类型：Boolean<br>默认值：FALSE<br>父标签：CSV|否

OutputSerialization 容器：
名称|描述|必须
---|---|---
CSV|描述请求Object的CSV格式<br>类型：容器<br>父标签：OutputSerialization|是
QuoteFields|描述是否使用QuoteCharacter指定的引用符号<br>类型：String<br>有效值：ALWAYS、ASNEEDED<br>默认值：ASNEEDED<br>父标签：CSV|否
RecordDelimiter|指定行分隔符，不能为空<br>类型：String<br>默认值：\n<br>父标签：CSV|否
FieldDelimiter|指定列分隔符，不能为空<br>类型：String<br>默认值：,<br>父标签：CSV|否
QuoteCharacter|指定引用符号，不能为空。如"a,b"，将解析为a,b<br>类型：String<br>默认值："<br>父标签：CSV|否
QuoteEscapeCharacter|指定引用转义符，不能为空。如"""a,b"""将解析为" a,b "<br>类型：String<br>默认值："<br>父标签：CSV|否

## 响应
### 语法
```HTTP/1.1 200
<?xml version="1.0" encoding="UTF-8"?>
<Payload>
   <Records>
      <Payload>blob</Payload>
   </Records>
   <Stats>
      <Details>
         <BytesProcessed>long</BytesProcessed>
         <BytesReturned>long</BytesReturned>
         <BytesScanned>long</BytesScanned>
      </Details>
   </Stats>
   <Progress>
      <Details>
         <BytesProcessed>long</BytesProcessed>
         <BytesReturned>long</BytesReturned>
         <BytesScanned>long</BytesScanned>
      </Details>
   </Progress>
   <Cont>
   </Cont>
   <End>
   </End>
</Payload>
```
### 响应Header
无特殊Header

### 响应元素和响应body


## 示例
### 请求示例

```POST /exampleobject.csv?select&select-type=2 HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jcloud-oss.com
Date: Tue, 17 Oct 2020 01:49:52 GMT
Authorization: authorization string
Content-Length: content length

<?xml version="1.0" encoding="UTF-8"?>
<SelectRequest>
    <Expression>Select * from S3Object</Expression>
    <ExpressionType>SQL</ExpressionType>
    <InputSerialization>
        <CompressionType>GZIP</CompressionType>
        <CSV>
            <FileHeaderInfo>IGNORE</FileHeaderInfo>
            <RecordDelimiter>\n</RecordDelimiter>
            <FieldDelimiter>,</FieldDelimiter>
            <QuoteCharacter>"</QuoteCharacter>
            <QuoteEscapeCharacter>"</QuoteEscapeCharacter>
            <Comments>#</Comments>
        </CSV>
    </InputSerialization>
    <OutputSerialization>
        <CSV>
            <QuoteFields>ASNEEDED</QuoteFields>
            <RecordDelimiter>\n</RecordDelimiter>
            <FieldDelimiter>,</FieldDelimiter>
            <QuoteCharacter>"</QuoteCharacter>
            <QuoteEscapeCharacter>"</QuoteEscapeCharacter>
        </CSV>                               
    </OutputSerialization>
</SelectRequest> 
```

### 响应示例
```HTTP/1.1 200 OK
x-req-id: 81D2740FD887DF42
x-amz-request-id: 81D2740FD887DF42
Date: Tue, 17 Oct 2020 23:54:05 GMT

A series of messages
```
