# deleteBackup


## 描述
删除RDS实例备份，仅允许删除用户生成的备份，系统自动备份不允许删除。

## 请求方式
DELETE

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/backups/{backupId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**backupId**|String|True| |备份ID|

## 请求参数
无


## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
DELETE
```
public void testDeleteBackup() {
    DeleteBackupRequest request = new DeleteBackupRequest();
    request.setRegionId("cn-north-1");
    request.setBackupId("0313e588-44d0-4b20-b532-6eebb9d83352");
    DeleteBackupResponse response = rdsClient.deleteBackup(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa3243h5ev46ih8q7dr4au0021v1btg"
}
```
