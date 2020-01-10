# deleteImportFile


## 描述
删除用户通过单库上云工具上传的数据库备份文件<br>- 仅支持SQL Server

## 请求方式
DELETE

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/importFiles/{fileName}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|
|**fileName**|String|True| |单库上云文件名|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**sharedFileGid**|String|False| |共享文件的全局ID，可从上传文件查询接口describeImportFiles中获取；如果该文件不是共享文件，则无须输入该字段|


## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
DELETE
```
public void testDeleteImportFile() {
    DeleteImportFileRequest request = new DeleteImportFileRequest();
    request.setFileName("db1_1.bak");
    request.setInstanceId("sqlserver-83uqv7avy4");
    request.setSharedFileGid("fcbb66c6-e7f0-4228-b4c0-b3e5a0d452c8");
    request.setRegionId("cn-north-1");
    DeleteImportFileResponse response = rdsClient.deleteImportFile(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa4nbcb0s3t3mg4ascg2o4h3iitng53"
}
```
