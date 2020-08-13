# describePrivilege


## 描述
查看云数据库 RDS 的权限信息 - 仅支持 MySQL，Percona，MariaDB

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/common:describePrivilege

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**engine**|String|True| |设置可见的引擎类型，如 MySQL 等|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeprivilege#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**globalPrivileges**|String[]|全局权限信息，权限的具体定义参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|
|**databasePrivileges**|String[]|数据库权限信息，权限的具体定义参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|
|**tablePrivileges**|String[]|数据库表的权限信息，权限的具体定义参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribePrivilege() {
    DescribePrivilegeRequest request = new DescribePrivilegeRequest();
    request.setRegionId("cn-north-1");
    request.setEngine("MySQL");
    DescribePrivilegeResponse response = rdsClient.describePrivilege(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa3kg3q43nwe1f5195f969n4n4rktcc", 
    "result": {
        "databasePrivileges": [
            "DROP", 
            "EVENT", 
            "LOCK TABLES", 
            "REFERENCES", 
            "ALTER", 
            "CREATE VIEW", 
            "CREATE", 
            "DELETE", 
            "INDEX", 
            "INSERT", 
            "SELECT", 
            "SHOW VIEW", 
            "TRIGGER", 
            "UPDATE", 
            "ALTER ROUTINE", 
            "EXECUTE", 
            "CREATE TEMPORARY TABLES", 
            "CREATE ROUTINE"
        ], 
        "globalPrivileges": [
            "PROCESS", 
            "REPLICATION SLAVE", 
            "REPLICATION CLIENT"
        ], 
        "tablePrivileges": [
            "ALTER", 
            "CREATE VIEW", 
            "CREATE", 
            "DELETE", 
            "DROP", 
            "INDEX", 
            "INSERT", 
            "REFERENCES", 
            "SELECT", 
            "SHOW VIEW", 
            "TRIGGER", 
            "UPDATE"
        ]
    }
}
```
