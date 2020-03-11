# describeTables


## 描述
获取当前实例的指定库的表列表信息 - 仅支持 MySQL，Percona，MariaDB

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/databases/{dbName}/tables

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|
|**dbName**|String|True| |库名称|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |显示数据的页码，默认为1，取值范围：[-1,∞)。pageNumber为-1时，返回所有数据页码；超过总页数时，显示最后一页;|
|**pageSize**|Integer|False| |每页显示的数据条数，默认为100，取值范围：[10,100]，用于查询列表的接口|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describetables#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**tables**|String[]|数据库表名称集合|
|**totalCount**|Integer| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeTables() {
    DescribeTablesRequest request = new DescribeTablesRequest();
    request.setDbName("dj_db");
    request.setInstanceId("mysql-k67q8n46si");
    request.setRegionId("cn-north-1");
    DescribeTablesResponse response = rdsClient.describeTables(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpaoofj0eshnh4sk65c6eh52cc2j9pe9", 
    "result": {
        "tables": [
            "dj_db"
        ], 
        "totalCount": 1
    }
}
```
