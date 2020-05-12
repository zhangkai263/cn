# describeAccounts


## 描述
查看某个RDS实例下所有账号信息，包括账号名称、对各个数据库的访问权限信息等

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/accounts

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |显示数据的页码，默认为1，取值范围：[-1,∞)。pageNumber为-1时，返回所有数据页码；超过总页数时，显示最后一页;|
|**pageSize**|Integer|False| |每页显示的数据条数，默认为100，取值范围：[10,100]，用于查询列表的接口|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeaccounts#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**accounts**|[Account[]](describeaccounts#account)| |
|**totalCount**|Integer| |
### <div id="account">Account</div>
|名称|类型|描述|
|---|---|---|
|**accountName**|String|账号名，账号名的具体规则可参见帮助中心文档:[名称及密码限制](../../../documentation/Database-and-Cache-Service/RDS/Introduction/Restrictions/SQLServer-Restrictions.md)|
|**accountStatus**|String|账号状态，参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)<br>- **MySQL：不支持，不返回该字段**<br>- **SQL Server：返回该字段**|
|**accountType**|String|账号类型，normal：普通，super：高权限<br>- 仅支持SQL Server|
|**createTime**|String|创建账号时间，格式为：YYYY-MM-DD HH:mm:ss<br>- 仅支持PostgreSQL|
|**updateTime**|String|修改账号时间，格式为：YYYY-MM-DD HH:mm:ss<br>- 仅支持PostgreSQL|
|**notes**|String|账号备注内容<br>- 仅支持PostgreSQL|
|**accountPrivileges**|[AccountPrivilege[]](describeaccounts#accountprivilege)|具有的权限|
### <div id="accountprivilege">AccountPrivilege</div>
|名称|类型|描述|
|---|---|---|
|**dbName**|String|数据库名称，具体规则可参见帮助中心文档:[名称及密码限制](../../../documentation/Database-and-Cache-Service/RDS/Introduction/Restrictions/SQLServer-Restrictions.md)|
|**privilege**|String|账号对数据库所具有的权限，权限的具体定义可以参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeAccounts() {
    DescribeAccountsRequest request = new DescribeAccountsRequest();
    request.setRegionId("cn-north-1");
    request.setInstanceId("mysql-wp4e9ztap2");
    DescribeAccountsResponse response = rdsClient.describeAccounts(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa03bvk9sf8qkbri7215avh7k4q2rdv", 
    "result": {
        "accounts": [
            {
                "accountName": "dj_ac", 
                "accountPrivileges": [], 
                "accountStatus": "RUNNING"
            }
        ], 
        "totalCount": 1
    }
}
```
