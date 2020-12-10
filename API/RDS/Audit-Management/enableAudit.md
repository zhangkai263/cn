# enableAudit


## 描述
仅支持MySQL实例开启数据库审计<br>- 仅支持 MySQL 5.6, MySQL 5.7, Percona, MariaDB, PostgreSQL

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/audit:enableAudit

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
无


## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
public void testEnableAudit() {
    EnableAuditRequest request = new EnableAuditRequest();
    request.setInstanceId("mysql-wp4e9ztap2");
    request.setRegionId("cn-north-1");
    EnableAuditResponse response = rdsClient.enableAudit(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa2sur0aovda2093o03m9bfawbr3r1n"
}
```
