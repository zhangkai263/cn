# GET Bucket object lock configuration

## 描述

该操作可获取bucket的默认保留周期策略。

## 请求
### 语法

```HTTP
GET /?object-lock HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: date
Authorization: authorization string
```

### 请求参数
无请求参数

### 请求元素
无请求元素

## 响应

### 响应元素
同Put Bucket object lock configuration中请求元素

## 示例
### 请求示例

```HTTP
GET /?object-lock HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: Thu, 12 Apr 2018 21:37:21 GMT
Authorization: authorization string
```
### 响应示例
```HTTP
HTTP/1.1 200 OK
x-amz-request-id: 0M26D08072A8EX6A
x-amz-date: Thu, 12 Apr 2018 21:37:21 GMT
Content-Length: 1783
Server: JDCloudOSS

<ObjectLockConfiguration>
   <ObjectLockEnabled>Enabled</ObjectLockEnabled>
   <Rule>
      <DefaultRetention>
         <Mode>GOVERNANCE</Mode>
         <Days>30</Days>
      </DefaultRetention>
   </Rule>
</ObjectLockConfiguration>
```
