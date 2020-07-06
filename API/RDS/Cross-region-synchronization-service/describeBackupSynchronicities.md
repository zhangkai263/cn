# describeBackupSynchronicities


## 描述
查询跨地域备份同步服务列表。

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/backupSynchronicities

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |显示数据的页码，默认为1，取值范围：[1,∞)，页码超过总页数时，显示最后一页，用于查询列表的接口|
|**pageSize**|Integer|False| |每页显示的数据条数，默认为10，取值范围：10、20、30、50、100|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describebackupsynchronicities#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**backupSynchronicities**|[BackupSynchronicity[]](describebackupsynchronicities#backupsynchronicity)| |
|**totalCount**|Integer| |
### <div id="backupsynchronicity">BackupSynchronicity</div>
|名称|类型|描述|
|---|---|---|
|**serviceId**|String|跨地域备份同步服务ID|
|**instanceId**|String|RDS 实例ID|
|**serviceStatus**|String|跨地域备份同步服务状态，正常，running；错误，error|
|**srcRegion**|String|源实例所在地域|
|**destRegion**|String|备份同步的目标地域|
|**engine**|String|数据库类型|
|**engineVersion**|String|数据库版本|
|**createTime**|String|创建时间|
|**newestDataTime**|String|跨地域备份的最新数据时间点|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeBackupSynchronicities() {
    DescribeBackupSynchronicitiesRequest request = new DescribeBackupSynchronicitiesRequest();
    request.setPageNumber(1);
    request.setPageSize(10);
    request.setRegionId("cn-east-2");
    DescribeBackupSynchronicitiesResponse response = rdsClient.describeBackupSynchronicities(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa34rjhhaak7vqv10dw79t2ok13c566", 
    "result": {
        "backupSynchronicities": [
            {
                "createTime": "2020-01-07 15:24:06", 
                "destRegion": "cn-east-2", 
                "engine": "mssjstack", 
                "engineVersion": "5.7", 
                "instanceId": "mysql-wp4e9ztap2", 
                "newestDataTime": "", 
                "serviceId": "dbs-r1q51ene3s5d", 
                "serviceStatus": "RUNNING", 
                "srcRegion": "cn-north-1"
            }
        ], 
        "totalCount": 1
    }
}
```
