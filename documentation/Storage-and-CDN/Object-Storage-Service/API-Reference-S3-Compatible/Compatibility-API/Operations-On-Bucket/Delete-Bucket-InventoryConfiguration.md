# DeleteBucketInventoryConfiguration

该接口用于删除存储空间中指定的清单任务，用户需提供待删除的清单任务的名称。

与该接口相关的操作包括：

- [GetBucketInventoryConfiguration](https://docs.jdcloud.com/object-storage-service/Get-Bucket-InventoryConfiguration)
- [PutBucketInventoryConfiguration](https://docs.jdcloud.com/object-storage-service/Put-Bucket-InventoryConfiguration)
- [ListBucketInventoryConfigurations](https://docs.jdcloud.com/object-storage-service/List-Bucket-InventoryConfigurations)

## 请求语法
```HTTP
DELETE /?inventory&id=inventory-configuration-id HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: <date>
Authorization: <authorization string> (see Authenticating Requests (AWS Signature Version4))
```
## 示例
### 请求示例

下述请求示例展示了从某个存储空间中删除清单任务list1。

```HTTP
DELETE ?/inventory&id=list1 HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: Tue, 04 Apr 2010 20:34:56 GMT  
Authorization: <authorization string>
```
### 响应示例

上述请求后， OSS返回`204 No-Content`的响应，表明已成功删除了该存储空间内的清单任务list1。

```HTTP
HTTP/1.1 204 No Content
x-amz-request-id: 656c76696e672SAMPLE5657374  
Date: Tue, 04 Apr 2010 20:34:56 GMT
Connection: keep-alive
Server: JDCloudOSS
```
