# PUT Object retention

## 描述

该操作可设置文件的保留周期。

## 请求
### 语法

```HTTP
PUT /<object-key>?retention HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: date
Authorization: authorization string
 
<Retention>
    <Mode><value></Mode>
    <RetainUntilDate><value></RetainUntilDate>
</Retention>
```

### 请求参数
无请求参数

### 请求元素

名称|描述|必须
---|---|---
Retention|Mode和RetainUntilDate容器<br>类型：Container|是
Mode|保留周期模式<br>有效值：GOVERNANCE、COMPLIANCE<br>类型：String<br>父标签：Retention|否
RetainUntilDate|保留到期日<br>类型：dateTime（形如2019-06-16T10:00:00.000Z）<br>父标签：Retention|有Mode时才会存在

## 示例
### 请求示例

```HTTP
PUT /<object-key>?retention HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Content-Length: 643
Date: Thu, 12 Apr 2018 21:37:21 GMT
Authorization: authorization string

<Retention>
    <Mode>GOVERNANCE</Mode>
    <RetainUntilDate>2019-06-16T10:00:00.000Z</RetainUntilDate>
</Retention>
```

### 响应示例
```HTTP
HTTP/1.1 200 OK
x-amz-request-id: 7F26D08072A8EF2Z
x-amz-date: Thu, 12 Apr 2018 21:37:21 GMT
Content-Length: 0
Server: JDCloudOSS
```
