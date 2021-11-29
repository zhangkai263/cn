# ListBucketInventoryConfigurations

该接口用于请求返回一个存储桶中的所有清单任务。

- [DeleteBucketInventoryConfiguration](https://docs.jdcloud.com/object-storage-service/Delete-Bucket-InventoryConfiguration)
- [PutBucketInventoryConfiguration](https://docs.jdcloud.com/object-storage-service/Put-Bucket-InventoryConfiguration)
- [GetBucketInventoryConfiguration](https://docs.jdcloud.com/object-storage-service/Get-Bucket-InventoryConfiguration)

## 请求语法
```HTTP
GET /?inventory&ContinuationToken=ContinuationToken HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: <Date>
Authorization: <authorization string>			
```
## 请求参数

参数|描述|必须
---|---|---
continuation-token|当 OSS 响应体中 IsTruncated 为 true，且 NextContinuationToken 节点中存在参数值时，您可以将这个参数作为 continuation-token 参数值，以获取下一页的清单任务信息。<br/>Type: String<br>Default: None|否

## 响应语法

```HTTP
HTTP/1.1 200
<?xml version="1.0" encoding="UTF-8"?>
<ListBucketInventoryConfigurationsOutput>
   <ContinuationToken>string</ContinuationToken>
   <InventoryConfiguration>
      <Destination>
         <S3BucketDestination>
            <AccountId>string</AccountId>
            <Bucket>string</Bucket>
            <Format>string</Format>
            <Prefix>string</Prefix>
         </S3BucketDestination>
      </Destination>
      <Filter>
         <Prefix>string</Prefix>
      </Filter>
      <Id>string</Id>
      <IsEnabled>boolean</IsEnabled>
      <OptionalFields>
         <Field>string</Field>
      </OptionalFields>
      <Schedule>
         <Frequency>string</Frequency>
      </Schedule>
   </InventoryConfiguration>
   ...
   <IsTruncated>boolean</IsTruncated>
   <NextContinuationToken>string</NextContinuationToken>
</ListBucketInventoryConfigurationsOutput>
```

## 响应元素

名称|描述
---|---
ListBucketInventoryConfigurationsOutput|存储空间中所有清单任务信息的列表<br>Type: Container<br>Ancestor: None
ContinuationToken|当页清单列表的标识，可理解为页数。该标识与请求中的 continuation-token 参数对应<br>Type: String<br>Ancestor: ListBucketInventoryConfigurationsOutput
InventoryConfiguration|包含清单任务的详细信息，其 XML 结构请参见[GetBucketInventoryConfiguration](https://docs.jdcloud.com/object-storage-service/Get-Bucket-InventoryConfiguration)。<br>Type: Container<br>Ancestor: ListBucketInventoryConfigurationsOutput
IsTruncated|是否已列出所有清单任务信息的标识。如果已经展示完则为 false，否则为 true。<br>Type: Boolean<br>Ancestor: ListBucketInventoryConfigurationsOutput
NextContinuationToken|下一页清单列表的标识。如果该参数中有值，则可将该值作为 continuation-token 参数并发起 GET 请求以获取下一页清单任务信息。<br>Type: String<br>Ancestor: ListBucketInventoryConfigurationsOutput

## 示例
### 请求示例

以下请求示例返回某个存储空间中的清单配置信息。

```HTTP
GET /?inventory HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: Mon, 1 Nov 2010 20:34:56 GMT
Authorization: <authorization string>
Content-Type: text/plain
```
### 响应示例
```HTTP
HTTP/1.1 200 OK
x-amz-request-id: 3B3C7C725673C630
Date: Sat, 30 Apr 2016 23:29:37 GMT
Content-Type: application/xml
Content-Length: length
Connection: close
Server: JDCloudOSS

<?xml version="1.0" encoding="UTF-8"?>
<ListInventoryConfigurationsResult xmlns = "http://....">
   <InventoryConfiguration>
      <Id>report1</Id>
      <IsEnabled>true</IsEnabled>
      <Destination>
         <S3BucketDestination>
            <Format>CSV</Format>
            <AccountId>123456789012</AccountId>
            <Bucket>arn:aws:s3:::destination-bucket</Bucket>
            <Prefix>prefix1</Prefix>
         </S3BucketDestination>
      </Destination>
      <Schedule>
         <Frequency>Daily</Frequency>
      </Schedule>
      <Filter>
         <Prefix>prefix/One</Prefix>
      </Filter>
      <OptionalFields>
         <Field>Size</Field>
         <Field>LastModifiedDate</Field>
         <Field>ETag</Field>
         <Field>StorageClass</Field>
      </OptionalFields>
   </InventoryConfiguration>
   <InventoryConfiguration>
      <Id>report2</Id>
      <IsEnabled>true</IsEnabled>
      <Destination>
         <S3BucketDestination>
            <Format>CSV</Format>
            <AccountId>123456789012</AccountId>
            <Bucket>arn:aws:s3:::bucket2</Bucket>
            <Prefix>prefix2</Prefix>
         </S3BucketDestination>
      </Destination>
      <Schedule>
         <Frequency>Daily</Frequency>
      </Schedule>
      <Filter>
         <Prefix>prefix/Two</Prefix>
      </Filter>
      <OptionalFields>
         <Field>Size</Field>
         <Field>LastModifiedDate</Field>
         <Field>ETag</Field>
         <Field>StorageClass</Field>
      </OptionalFields>
   </InventoryConfiguration>
   <InventoryConfiguration>
      <Id>report3</Id>
      <IsEnabled>true</IsEnabled>
      <Destination>
         <S3BucketDestination>
            <Format>CSV</Format>
            <AccountId>123456789012</AccountId>
            <Bucket>arn:aws:s3:::bucket3</Bucket>
            <Prefix>prefix3</Prefix>
         </S3BucketDestination>
      </Destination>
      <Schedule>
         <Frequency>Daily</Frequency>
      </Schedule>
      <Filter>
         <Prefix>prefix/Three</Prefix>
      </Filter>
      <OptionalFields>
         <Field>Size</Field>
         <Field>LastModifiedDate</Field>
         <Field>ETag</Field>
         <Field>StorageClass</Field>
      </OptionalFields>
   </InventoryConfiguration>
    ...
    <IsTruncated>false</IsTruncated>
    <!-- If ContinuationToken was provided in the request. -->
    <ContinuationToken>...</ContinuationToken>
    <!-- if IsTruncated == true -->
    <IsTruncated>true</IsTruncated>
    <NextContinuationToken>...</NextContinuationToken>
</ListInventoryConfigurationsResult>
```
