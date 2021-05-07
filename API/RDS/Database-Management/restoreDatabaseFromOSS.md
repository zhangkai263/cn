# restoreDatabaseFromOSS


## 描述
从上传到OSS的备份文件中恢复单个数据库<br>- 仅支持SQL Server

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/databases/{dbName}:restoreDatabaseFromOSS

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|
|**dbName**|String|True| |库名称|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ossURL**|String|True| |用户上传到对象存储OSS上的备份文件的路径。<br>例如用户备份上传的bucket为db_backup，文件为test_server/db1.bak，那么ossULR为db_backup/test_server/db1.bak。<br>**授权说明**：需要授予账户ID：785455908940，对这个bucket的读取权限，具体步骤可以查看[文档](https://docs.jdcloud.com/cn/object-storage-service/set-bucket-policy-2)。|


## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
public void testRestoreDatabaseFromOSS() {
    RestoreDatabaseFromOSSRequest request = new RestoreDatabaseFromOSSRequest();
    request.setInstanceId("sqlserver-83uqv7avy4");
    request.setRegionId("cn-north-1");
    request.setDbName("test_db");
    request.setOssURL("sqlserverbucket01/73ba0514-75df-41b2-9ba2-649c3609a987/backup/023c72dc-f04e-44e9-9ee4-878eac32f177/dj_db.bak?Expires=1533720053&AccessKey=85B6358FACFBA460D7C0E4A6598F29C5&Signature=UO64r6mWb5vpraR0XCifD7R3T9A=");
    RestoreDatabaseFromOSSResponse response= rdsClient.restoreDatabaseFromOSS(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa40506ppag24kw0r872h1s0dtub35m"
}
```
