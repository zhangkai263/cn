# GET Object legal hold

## 描述

该操作可获取文件的依法保留状态。

## 请求
### 语法

```HTTP
GET /<object-key>?legal-hold HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: date
Authorization: authorization string
```

### 请求参数
无请求参数

## 响应

### 响应元素
同Put Object legal hold中请求元素

## 示例
### 请求示例

```HTTP
GET /<object-key>?legal-hold HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: Thu, 12 Apr 2018 21:37:21 GMT
Authorization: authorization string
```

### 响应示例
```HTTP
HTTP/1.1 200 OK
x-amz-request-id: 0M26D08072A8EX6A
x-amz-date: Thu, 12 Apr 2018 21:37:21 GMT
Content-Length: 341
Server: JDCloudOSS

<LegalHold>
   <Status>ON</Status>
</LegalHold>  
```
