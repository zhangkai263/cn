# restoreInstanceByTime


## 描述
根据时间点，选择单表恢复当前实例<br>- 仅支持MySQL

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:restoreInstanceByTime

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**restoreTime**|String|True| |根据源实例的哪个时间点创建新实例|
|**restoreSchema**|[Schema[]](restoreinstancebytime#schema)|True| |需要进行单库，单表恢复的概要信息|

### <div id="schema">Schema</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dbName**|String|True| |原数据库名|
|**newDBName**|String|True| |新数据库名|
|**tableName**|String|False| |原数据库表名|
|**newTableName**|String|False| |新数据库表名|

## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
public void testRestoreInstanceByTime() {
    RestoreInstanceByTimeRequest request = new RestoreInstanceByTimeRequest();
    request.setRestoreTime("2020-01-07 19:26:00");
    request.setInstanceId("mysql-k67q8n46si");
    Schema schema = new Schema();
    schema.setNewDBName("dj_db2");
    schema.setDbName("dj_db");
    request.addRestoreSchema(schema);
    request.setRegionId("cn-north-1");
    RestoreInstanceByTimeResponse response = rdsClient.restoreInstanceByTime(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa6nm64sevg65kkghfkgma6hqjg8bmf"
}
```
