# PutBucketInventoryConfiguration

该操作用于在存储空间中创建清单任务，您可以对清单任务命名后，使用该请求创建清单任务。

- [DeleteBucketInventoryConfiguration](https://docs.jdcloud.com/object-storage-service/Delete-Bucket-InventoryConfiguration)
- [ListBucketInventoryConfigurations](https://docs.jdcloud.com/object-storage-service/List-Bucket-InventoryConfigurations)
- [GetBucketInventoryConfiguration](https://docs.jdcloud.com/object-storage-service/Get-Bucket-InventoryConfiguration)

## 请求语法

```HTTP
PUT /?inventory&id=inventory-configuration-ID HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Date: <Date>
Authorization: <authorization string>
<?xml version="1.0" encoding="UTF-8"?>
<InventoryConfiguration xmlns = "http://....">
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

## 请求元素

| 名称                   | 描述                                                         | 必须 |
| ---------------------- | ------------------------------------------------------------ | ---- |
| InventoryConfiguration | 包含清单的配置参数<br>Type: Container                        | 是   |
| Destination            | 描述存放清单结果的信息<br/>Type: Container<br/>Ancestors: InventoryConfiguration | 是   |
| S3BucketDestination    | 清单结果导出后存放的存储空间信息<br/>Type: Container<br/>Ancestors: InventoryConfiguration.Destination | 是   |
| AccountId              | 存储空间的所有者 ID<br/>Type: String<br/>Ancestors: InventoryConfiguration.Destination.S3BucketDestination | 否   |
| Bucket                 | 清单分析结果的存储空间名<br/>Type: String<br/>Ancestors: InventoryConfiguration.Destination.S3BucketDestination | 是   |
| Format                 | 清单分析结果的文件形式，目前为 CSV 格式<br/>Type: String<br/>Ancestors: InventoryConfiguration.Destination.S3BucketDestination | 是   |
| Prefix                 | 清单分析结果的前缀<br/>Type: String<br/>Ancestors: InventoryConfiguration.Destination.S3BucketDestination | 否   |
| Filter                 | 筛选待分析对象。清单功能将分析符合 Filter 中设置的前缀的对象<br/>Type: Container<br/>Ancestors: InventoryConfiguration | 否   |
| Prefix                 | 需要分析的对象的前缀<br/>Type: String<br/>Ancestors: InventoryConfiguration.Filter | 是   |
| Id                     | 清单的名称，与请求参数中的 ID对应 <br/>Type: <br/>Ancestors: InventoryConfiguration | 是   |
| IsEnabled              | 清单是否启用的标识<br/>Type: Boolean<br/>Ancestors: InventoryConfiguration | 是   |
| OptionalFields         | 设置清单结果中应包含的分析维度<br/>Type: Container<br/>Ancestors: InventoryConfiguration<br/>Valid values：Size，LastModifiedDate，StorageClass，ETag | 否   |
| Field                  | 清单结果中可选包含的分析维度名称，可选字段包括：Size，LastModifiedDate，StorageClass，ETag<br/>Type: String<br/>Ancestors: InventoryConfiguration.OptionalFields | 否   |
| Schedule               | 指定生成清单结果的周期<br/>Type: Container<br/>Ancestors: InventoryConfiguration | 是   |
| Frequency              | 清单任务周期，可选项为按日或者按周<br/>Type: String<br/>Ancestors: InventoryConfiguration.Schedule | 是   |

## 响应错误码

该请求可能会发生的一些常见的特殊错误如下，常见的错误码请参见 [错误码](https://docs.jdcloud.com/object-storage-service/error-response-2)文档。

| 错误码                | 描述                                           | 状态码               |
| :-------------------- | :--------------------------------------------- | :------------------- |
| InvalidArgument       | 不合法的参数值                                 | HTTP 400 Bad Request |
| TooManyConfigurations | 清单数量已经达到1000条的上限                   | HTTP 400 Bad Request |
| AccessDenied          | 未授权的访问。您可能不具备访问该存储空间的权限 | HTTP 403 Forbidden   |

## 示例

### 请求示例

该示例向某个存储空间中添加一条名为 report1 的清单任务。

```HTTP
PUT /?inventory&id=report1 HTTP/1.1
Host: <BUCKET_NAME>.s3.<REGION>.jdcloud-oss.com
Content-Length: length
Date: Thu, 12 Apr 2018 21:37:21 GMT
Authorization: authorization string

<?xml version="1.0" encoding="UTF-8"?>
<InventoryConfiguration xmlns="http://....">
   <Id>report1</Id>
   <IsEnabled>true</IsEnabled>
   <Filter>
      <Prefix>filterPrefix</Prefix>
   </Filter>
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
   <OptionalFields>
      <Field>Size</Field>
      <Field>LastModifiedDate</Field>
      <Field>ETag</Field>
      <Field>StorageClass</Field>   
   </OptionalFields>
</InventoryConfiguration>
```

### 响应示例
```HTTP
HTTP/1.1 200 OK
x-amz-request-id: 7F26D08072A8EF2Z
x-amz-date: Thu, 12 Apr 2018 21:37:21 GMT
Content-Length: 0
Server: JDCloudOSS
```

