# describeAuditOptions


## 描述
获取当前系统所支持的各种数据库版本的审计选项及相应的推荐选项<br>- 仅支持SQL Server

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/audit:describeAuditOptions

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |审计选项类别，**大小写敏感**，目前支持两种类型：<br>（1）AuditOptions开头：在disalbed参数中返回SQL Server各个版本支持的所有选项，支持的名称为<br>AuditOptions2008R2<br>AuditOptions2012<br>AuditOptions2014<br>AuditOptions2016<br>例如输入参数为"AuditOptions2016"，则在disabled字段中返回SQL Server 2016 版本所支持的所有的审计选项<br>（2）AuditDefault开头：京东云建议的默认选项,在enabled参数中返回建议开启的选项，在disabled参数中返回不开启的选项，支持的名称为：<br>AuditDefault2008R2<br>AuditDefault2012<br>AuditDefault2014<br>AuditDefault2016<br>例如输入参数为"AuditDefault2016"，则在enabled字段返回SQL Server 2016 版本中京东云建议开启的审计选项，在disabled字段中返回建议不开启的选项|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeauditoptions#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**enabled**|String[]| |
|**disabled**|String[]| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeAuditOptions(){
    DescribeAuditOptionsRequest describeAuditOptionsRequest = new DescribeAuditOptionsRequest();
    describeAuditOptionsRequest.setInstanceId("sqlserver-83uqv7avy4");
    describeAuditOptionsRequest.setName("AuditOptions2016STD");
    describeAuditOptionsRequest.setRegionId("cn-north-1");
    DescribeAuditOptionsResponse describeAuditOptionsResponse = rdsClient.describeAuditOptions(describeAuditOptionsRequest);
    System.out.println(new Gson().toJson(describeAuditOptionsResponse));
}

```

## 返回示例
```
{
    "requestId": "bpa2qaq8hkc99jeggm1thwhs2v9c9e7e", 
    "result": {
        "disabled": [
            "APPLICATION_ROLE_CHANGE_PASSWORD_GROUP", 
            "AUDIT_CHANGE_GROUP", 
            "BACKUP_RESTORE_GROUP", 
            "BROKER_LOGIN_GROUP", 
            "DATABASE_CHANGE_GROUP", 
            "DATABASE_LOGOUT_GROUP", 
            "DATABASE_MIRRORING_LOGIN_GROUP", 
            "DATABASE_OBJECT_ACCESS_GROUP", 
            "DATABASE_OBJECT_CHANGE_GROUP", 
            "DATABASE_OBJECT_OWNERSHIP_CHANGE_GROUP", 
            "DATABASE_OBJECT_PERMISSION_CHANGE_GROUP", 
            "DATABASE_OPERATION_GROUP", 
            "DATABASE_OWNERSHIP_CHANGE_GROUP", 
            "DATABASE_PERMISSION_CHANGE_GROUP", 
            "DATABASE_PRINCIPAL_CHANGE_GROUP", 
            "DATABASE_PRINCIPAL_IMPERSONATION_GROUP", 
            "DATABASE_ROLE_MEMBER_CHANGE_GROUP", 
            "DBCC_GROUP", 
            "FAILED_DATABASE_AUTHENTICATION_GROUP", 
            "FAILED_LOGIN_GROUP", 
            "FULLTEXT_GROUP", 
            "LOGIN_CHANGE_PASSWORD_GROUP", 
            "LOGOUT_GROUP", 
            "SCHEMA_OBJECT_ACCESS_GROUP", 
            "SCHEMA_OBJECT_CHANGE_GROUP", 
            "SCHEMA_OBJECT_OWNERSHIP_CHANGE_GROUP", 
            "SCHEMA_OBJECT_PERMISSION_CHANGE_GROUP", 
            "SERVER_OBJECT_CHANGE_GROUP", 
            "SERVER_OBJECT_OWNERSHIP_CHANGE_GROUP", 
            "SERVER_OBJECT_PERMISSION_CHANGE_GROUP", 
            "SERVER_OPERATION_GROUP", 
            "SERVER_PERMISSION_CHANGE_GROUP", 
            "SERVER_PRINCIPAL_CHANGE_GROUP", 
            "SERVER_PRINCIPAL_IMPERSONATION_GROUP", 
            "SERVER_ROLE_MEMBER_CHANGE_GROUP", 
            "SERVER_STATE_CHANGE_GROUP", 
            "SUCCESSFUL_DATABASE_AUTHENTICATION_GROUP", 
            "SUCCESSFUL_LOGIN_GROUP", 
            "TRACE_CHANGE_GROUP", 
            "TRANSACTION_GROUP", 
            "USER_CHANGE_PASSWORD_GROUP", 
            "USER_DEFINED_AUDIT_GROUP"
        ], 
        "enabled": []
    }
}
```
