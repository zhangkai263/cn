# GetBucketInventoryConfiguration

该接口用于查询存储空间中用户的清单任务信息。

与该接口相关的操作包括：

- [DeleteBucketInventoryConfiguration](https://docs.jdcloud.com/object-storage-service/Delete-Bucket-InventoryConfiguration)
- [PutBucketInventoryConfiguration](https://docs.jdcloud.com/object-storage-service/Put-Bucket-InventoryConfiguration)
- [ListBucketInventoryConfigurations](https://docs.jdcloud.com/object-storage-service/List-Bucket-InventoryConfigurations)

## 请求语法
```HTTP
GET /?inventory&id=inventory-configuration-id HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: <date>
Authorization: <authorization string> (see Authenticating Requests (AWS Signature Version4))
```

## 响应语法
```HTTP
HTTP/1.1 200
<?xml version="1.0" encoding="UTF-8"?>
<InventoryConfiguration>
   <Destination>
      <S3BucketDestination>
         <AccountId>string</AccountId>
         <Bucket>string</Bucket>
         <Format>string</Format>
         <Prefix>string</Prefix>
      </S3BucketDestination>
   </Destination>
   <IsEnabled>boolean</IsEnabled>
   <Filter>
      <Prefix>string</Prefix>
   </Filter>
   <Id>string</Id>
   <OptionalFields>
      <Field>string</Field>
   </OptionalFields>
   <Schedule>
      <Frequency>string</Frequency>
   </Schedule>
</InventoryConfiguration>
```

## 响应元素

名称|描述
---|---
InventoryConfiguration|包含清单的配置参数<br>Type: Container
Destination|描述存放清单结果的信息<br>Type: Container<br>Ancestors: InventoryConfiguration
S3BucketDestination|清单结果导出后存放的存储空间信息<br/>Type: Container<br/>Ancestors: InventoryConfiguration.Destination
AccountId|存储空间的所有者 ID<br/>Type: String<br/>Ancestors: InventoryConfiguration.Destination.S3BucketDestination
Bucket|清单分析结果的存储空间名<br/>Type: String<br/>Ancestors: InventoryConfiguration.Destination.S3BucketDestination
Format|清单分析结果的文件形式，目前为 CSV 格式<br/>Type: String<br/>Ancestors: InventoryConfiguration.Destination.S3BucketDestination
Prefix|清单分析结果的前缀<br/>Type: String<br/>Ancestors: InventoryConfiguration.Destination.S3BucketDestination
Filter|筛选待分析对象。清单功能将分析符合 Filter 中设置的前缀的对象<br>Type: Container<br>Ancestors: InventoryConfiguration
Prefix|需要分析的对象的前缀<br/>Type: String<br/>Ancestors: InventoryConfiguration.Filter
Id|清单的名称，与请求参数中的 ID 对应<br>Type: Container<br>Ancestors: InventoryConfiguration
IsEnabled|清单是否启用的标识<br>Type: Boolean<br>Ancestors: InventoryConfiguration
OptionalFields|设置清单结果中应包含的分析维度<br>Type: Container<br>Ancestors: InventoryConfiguration<br>Valid values：Size，LastModifiedDate，StorageClass，ETag
Field|清单结果中可选包含的分析维度名称，可选字段包括：Size，LastModifiedDate，StorageClass，ETag<br/>Type: String<br/>Ancestors: InventoryConfiguration.OptionalFields
Schedule|指定生成清单结果的周期<br>Type: Container<br>Ancestors: InventoryConfiguration
Frequency|清单任务周期，可选项为按日或者按周<br/>Type: String<br/>Ancestors: InventoryConfiguration.Schedule

## 示例
### 请求示例

下述请求示例展示了从某个存储空间中获取清单任务为 list1 的配置信息。

```HTTP
GET /?inventory&id=list1 HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: Wed, 28 Oct 2009 22:32:00 GMT
Authorization: <authorization string>
```
### 响应示例
```HTTP
HTTP/1.1 200 OK
x-amz-request-id: 236A8905248E5A02
Date: Mon, 31 Oct 2016 12:00:00 GMT
Server: JDCloudOSS
Content-Length: length

<?xml version="1.0" encoding="UTF-8"?>
<InventoryConfiguration xmlns = "http://....">
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
    <Prefix>myprefix/</Prefix>
  </Filter>
  <OptionalFields>
    <Field>Size</Field>
    <Field>LastModifiedDate</Field>
    <Field>ETag</Field>
    <Field>StorageClass</Field>
  </OptionalFields>
</InventoryConfiguration>
```
