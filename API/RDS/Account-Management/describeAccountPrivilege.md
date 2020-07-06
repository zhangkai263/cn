# describeAccountPrivilege


## 描述
查看RDS实例的账号的权限信息 - 仅支持 MySQL，Percona，MariaDB

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/accounts/{accountName}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|
|**accountName**|String|True| |账号名，在同一个实例中账号名不能重复|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeaccountprivilege#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**databasePrivileges**|[DatabasePrivilege[]](describeaccountprivilege#databaseprivilege)|数据库细粒度权限内容|
|**globalPrivileges**|String[]|全局权限信息，权限的具体定义参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|
### <div id="databaseprivilege">DatabasePrivilege</div>
|名称|类型|描述|
|---|---|---|
|**dbName**|String|数据库名称|
|**privileges**|String[]|账号对数据库所具有的细粒度权限，权限的具体定义参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|
|**tablePrivileges**|[TablePrivilege[]](describeaccountprivilege#tableprivilege)|数据库表的细粒度权限内容|
### <div id="tableprivilege">TablePrivilege</div>
|名称|类型|描述|
|---|---|---|
|**tableName**|String|数据库表名称|
|**privileges**|String[]|账号对数据库表所具有的细粒度权限，权限的具体定义参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeAccountPrivilege() {
    DescribeAccountPrivilegeRequest request = new DescribeAccountPrivilegeRequest();
    request.setAccountName("dj_ac");
    request.setInstanceId("mysql-wp4e9ztap2");
    request.setRegionId("cn-north-1");
    DescribeAccountPrivilegeResponse response = rdsClient.describeAccountPrivilege(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa077r076iik0m8gf2uaa22ev5f071v", 
    "result": {
        "databasePrivileges": [], 
        "globalPrivileges": [
            "REPLICATION CLIENT", 
            "REPLICATION SLAVE", 
            "PROCESS"
        ]
    }
}
```
