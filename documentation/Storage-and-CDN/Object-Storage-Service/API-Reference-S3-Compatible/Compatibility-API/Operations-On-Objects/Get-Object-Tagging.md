# GET Object tagging

## 描述

该操作可获取文件的标签

## 请求

### 语法

```HTTP
GET /<object-key>?tagging HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
```

### 请求参数
无请求参数

## 响应

## 示例

### 响应元素


### 请求示例

```HTTP
GET /<object-key>?tagging HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: Thu, 19 Apr 2020 22:18:21 GMT
Authorization: authorization string
```

### 响应示例
```HTTP
HTTP/1.1 200 OK
x-amz-request-id: 7F26D08072A8EF2Z
x-amz-date: Thu, 19 Apr 2020 22:18:21 GMT
Content-Length: 316
Server: JDCloudOSS

<Tagging>
    <TagSet>
        <Tag>
            <Key>tag</Key>
            <Value>value</Value>
        </Tag>
     </TagSet>
</Tagging>
```
