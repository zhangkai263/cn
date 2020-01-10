# createBackup


## 描述
创建一个RDS实例全量备份，可以对整个实例或者部分数据库（仅SQL Server支持）进行全量备份。同一时间点，只能有一个正在运行的备份任务

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/backups

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceId**|String|False| |RDS实例ID，唯一标识一个实例|
|**backupSpec**|[BackupSpec](createbackup#backupspec)|False| |备份规格|

### <div id="backupspec">BackupSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**backupName**|String|False| |备份名称<br>SQL Server：最长支持64个英文字符或等长的中文字符<br>MySQL：只允许数字、小写字母及英文下划线“_”,不超过32字符|
|**dbNames**|String[]|False| |需要备份的数据库名称列表。如不填，则备份整个实例<br>- **MySQL：不支持该参数**<br>- **SQL Server：支持**|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createbackup#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**backupId**|String|备份Id|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
public void testCreateBackup() {
    CreateBackupRequest createBackupRequest = new CreateBackupRequest();
    createBackupRequest.setInstanceId("mysql-wp4e9ztap2");
    createBackupRequest.setRegionId("cn-north-1");
    BackupSpec backupSpec = new BackupSpec();
    backupSpec.setBackupName("dj_backup");
    createBackupRequest.setBackupSpec(backupSpec);
    CreateBackupResponse createBackupResponse = rdsClient.createBackup(createBackupRequest);
    System.out.println(new Gson().toJson(createBackupResponse));
}

```

## 返回示例
```
{
    "requestId": "bpa2wfjr9bqrim7g6v93vkmnb78hf74n", 
    "result": {
        "backupId": "0313e588-44d0-4b20-b532-6eebb9d83352"
    }
}
```
