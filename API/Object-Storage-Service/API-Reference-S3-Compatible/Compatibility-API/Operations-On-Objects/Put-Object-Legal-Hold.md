# PUT Object legal hold

## 描述

该操作可开启或关闭文件的依法保留。

## 请求
### 语法

```HTTP
PUT /<object-key>?legal-hold HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: date
Authorization: authorization string
 
<LegalHold>
   <Status><value></Status>
</LegalHold>  
```

### 请求参数
无请求参数

### 请求元素

名称|描述|必须
---|---|---
LegalHold|Status容器<br>类型：Container|是
Status|依法保留状态<br>有效值：ON、OFF<br>类型：String<br>父标签：LegalHold|是

## 示例
### 请求示例

```HTTP
PUT /<object-key>?legal-hold HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Content-Length: 341
Date: Thu, 12 Apr 2018 21:37:21 GMT
Authorization: authorization string

<LegalHold>
   <Status>ON</Status>
</LegalHold>  
```

### 响应示例
```HTTP
HTTP/1.1 200 OK
x-amz-request-id: 7F26D08072A8EF2Z
x-amz-date: Thu, 12 Apr 2018 21:37:21 GMT
Content-Length: 0
Server: JDCloudOSS
```
