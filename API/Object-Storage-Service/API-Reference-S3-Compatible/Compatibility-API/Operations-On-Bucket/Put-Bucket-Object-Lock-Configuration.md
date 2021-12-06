# PUT Bucket object lock configuration

## 描述

该操作可开启bucket的默认保留周期策略。

## 请求
### 语法

```HTTP
PUT /?object-lock HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: date
Authorization: authorization string
 
<ObjectLockConfiguration>
   <ObjectLockEnabled><value></ObjectLockEnabled>
   <Rule>
      <DefaultRetention>
         <Mode><value></Mode>
         <Days><value></Days>
         <Years><value></Years>
      </DefaultRetention>
   </Rule>
</ObjectLockConfiguration>
```

### 请求参数
无请求参数

### 请求元素

名称|描述|必须
---|---|---
ObjectLockConfiguration|ObjectLockEnabled和Rule容器<br>类型：Container|是
ObjectLockEnabled|ObjectLock状态<br>有效值：Enabled<br>类型:String<br>父标签：ObjectLockConfiguration|是
Rule|DefaultRetention容器<br>类型：Container<br>父标签：ObjectLockConfiguration|否
DefaultRetention|Mode、Days和Years容器<br>类型：Container<br>父标签：Rule|有Rule时必须
Mode|保留周期模式<br>有效值：GOVERNANCE、COMPLIANCE<br>类型：String<br>父标签：DefaultRetention|有Rule时必须
Days|保留天数<br>有效值：1-36500<br>类型:Positive Integer（正整数）<br>父标签：DefaultRetention|有Rule时才会存在<br>Days和Years必须有且仅有一个
Years|保留年数<br>有效值：1-100<br>类型:Positive Integer（正整数）<br>父标签：DefaultRetention|有Rule时才会存在<br>Days和Years必须有且仅有一个

## 示例
### 请求示例

```HTTP
PUT ?object-lock HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Content-Length: 1783
Date: Thu, 12 Apr 2018 21:37:21 GMT
Authorization: authorization string

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

### 响应示例
```HTTP
HTTP/1.1 200 OK
x-amz-request-id: 7F26D08072A8EF2Z
x-amz-date: Thu, 12 Apr 2018 21:37:21 GMT
Content-Length: 0
Server: JDCloudOSS
```
   
