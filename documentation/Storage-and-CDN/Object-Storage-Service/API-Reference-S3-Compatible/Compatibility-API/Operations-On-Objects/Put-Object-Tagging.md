# PUT Object tagging

## 描述

该操作可设置文件的标签

## 请求

### 语法

```HTTP
PUT /<object-key>?tagging HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Content-MD5: ContentMD5

<?xml version="1.0" encoding="UTF-8"?>
<Tagging>
   <TagSet>
      <Tag>
         <Key>string</Key>
         <Value>string</Value>
      </Tag>
   </TagSet>
</Tagging>
```

### 请求参数
无请求参数


## 示例

### 请求示例

```HTTP
PUT /<object-key>?tagging HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Content-Length: 643
Content-MD5: vkMXr/BjKK5G2UKEcvkslv==
Date: Thu, 19 Apr 2020 22:18:21 GMT
Authorization: authorization string

<Tagging>
   <TagSet>
      <Tag>
         <Key>tag</Key>
         <Value>value</Value>
      </Tag>
   </TagSet>
</Tagging>
```

### 响应示例
```HTTP
HTTP/1.1 200 OK
x-amz-request-id: 7F26D08072A8EF2Z
x-amz-date: Thu, 19 Apr 2020 22:18:21 GMT
Content-Length: 0
Server: JDCloudOSS
```
