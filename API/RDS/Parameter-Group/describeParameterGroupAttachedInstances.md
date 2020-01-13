# describeParameterGroupAttachedInstances


## 描述
查看参数组绑定的云数据库实例<br>- 仅支持MySQL，Percona，MariaDB，PostgreSQL

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/parameterGroups/{parameterGroupId}/instances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**parameterGroupId**|String|True| |Parameter Group ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |显示数据的页码，默认为1，取值范围：[-1,∞)。pageNumber为-1时，返回所有数据页码；超过总页数时，显示最后一页|
|**pageSize**|Integer|False| |每页显示的数据条数，默认为10，取值范围：[10,100]，且为10的整数倍|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeparametergroupattachedinstances#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instances**|[AttachedDBInstance[]](describeparametergroupattachedinstances#attacheddbinstance)| |
|**totalCount**|Integer| |
### <div id="attacheddbinstance">AttachedDBInstance</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|实例ID|
|**instanceName**|String|实例名称，具体规则可参见帮助中心文档:[名称及密码限制](../../../documentation/Database-and-Cache-Service/RDS/Introduction/Restrictions/SQLServer-Restrictions.md)|
|**instanceType**|String|实例类型，例如主实例，只读实例等，参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|
|**engine**|String|实例引擎类型，如MySQL或SQL Server等，参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|
|**engineVersion**|String|实例引擎版本，参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|
|**parameterGroupId**|String|参数组ID|
|**parameterStatus**|String|参数的状态，参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|
|**instanceStatus**|String|实例状态，参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|
|**createTime**|String|实例创建时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeParameterGroupAttachedInstances() {
    DescribeParameterGroupAttachedInstancesRequest request = new DescribeParameterGroupAttachedInstancesRequest();
    request.setPageNumber(1);
    request.setPageSize(20);
    request.setParameterGroupId("mysql-pg-mpzspoh243");
    request.setRegionId("cn-north-1");
    DescribeParameterGroupAttachedInstancesResponse response = rdsClient.describeParameterGroupAttachedInstances(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpaoeib2c7hcvwcso2ujcq31m9quh18f", 
    "result": {
        "instances": [
            {
                "createTime": "2020-01-07 18:42:46", 
                "engine": "MySQL", 
                "engineVersion": "5.7", 
                "instanceId": "mysql-k67q8n46si", 
                "instanceName": "hdj_test", 
                "instanceStatus": "ACTIVE", 
                "instanceType": "cluster", 
                "parameterGroupId": "mysql-pg-mpzspoh243", 
                "parameterStatus": "VALID"
            }
        ], 
        "totalCount": 1
    }
}
```
