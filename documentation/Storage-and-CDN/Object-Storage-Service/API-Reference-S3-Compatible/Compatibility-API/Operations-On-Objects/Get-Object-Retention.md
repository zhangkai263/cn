# GET Object retention

## 描述

该操作可获取文件的保留周期。

## 请求
### 语法

```HTTP
GET /<object-key>?retention HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: date
Authorization: authorization string
```

### 请求参数
无请求参数

## 响应

### 响应元素
同Put Object retention中请求元素

## 示例
### 请求示例

```HTTP
GET /<object-key>?retention HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: Thu, 12 Apr 2018 21:37:21 GMT
Authorization: authorization string
```

### 响应示例
```HTTP
HTTP/1.1 200 OK
x-amz-request-id: 0M26D08072A8EX6A
x-amz-date: Thu, 12 Apr 2018 21:37:21 GMT
Content-Length: 643
Server: JDCloudOSS

<Retention>
    <Mode>GOVERNANCE</Mode>
    <RetainUntilDate>2019-06-16T10:00:00.000Z</RetainUntilDate>
</Retention>
```
