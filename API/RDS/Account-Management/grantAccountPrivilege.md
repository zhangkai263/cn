# grantAccountPrivilege


## 描述
授予账号的数据库细粒度的访问权限 - 仅支持 MySQL，Percona，MariaDB

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/accounts/{accountName}:grantAccountPrivilege

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|
|**accountName**|String|True| |账号名，在同一个实例中账号名不能重复|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**databasePrivileges**|[DatabasePrivilege[]](grantaccountprivilege#databaseprivilege)|False| |设置数据库细粒度权限内容|
|**globalPrivileges**|String[]|False| |设置全局权限，权限的具体定义参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|

### <div id="databaseprivilege">DatabasePrivilege</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dbName**|String|False| |数据库名称|
|**privileges**|String[]|False| |账号对数据库所具有的细粒度权限，权限的具体定义参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|
|**tablePrivileges**|[TablePrivilege[]](grantaccountprivilege#tableprivilege)|False| |数据库表的细粒度权限内容|
### <div id="tableprivilege">TablePrivilege</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**tableName**|String|False| |数据库表名称|
|**privileges**|String[]|False| |账号对数据库表所具有的细粒度权限，权限的具体定义参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|

## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
public void testGrantAccountPrivilege() {
    GrantAccountPrivilegeRequest request = new GrantAccountPrivilegeRequest();
    request.setAccountName("dj_ac");
    request.setInstanceId("mysql-wp4e9ztap2");
    request.setRegionId("cn-north-1");
    request.addGlobalPrivilege("PROCESS");
    DatabasePrivilege dp = new DatabasePrivilege();
    dp.setDbName("dj_db");
    dp.addPrivilege("DROP");
    request.addDatabasePrivilege(dp);
    GrantAccountPrivilegeResponse response = rdsClient.grantAccountPrivilege(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa2je0t7kr5fgmmqujuj8o7167t8dom"
}
```
