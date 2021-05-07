# describeErrorLog


## 描述
查询PostgreSQL实例的错误日志的概要信息。<br>- 仅支持PostgreSQL

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/performance:describeErrorLog

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |慢日志开始时间，格式为：YYYY-MM-DD HH:mm:ss，开始时间到当前时间不能大于 7 天，开始时间不能大于结束时间，结束时间不能大于当前时间|
|**endTime**|String|True| |慢日志结束时间，格式为：YYYY-MM-DD HH:mm:ss，开始时间到当前时间不能大于 7 天，开始时间不能大于结束时间，结束时间不能大于当前时间|
|**dbName**|String|False| |查询哪个数据库的慢日志，不填表示返回所有数据库的慢日志|
|**pageNumber**|Integer|False| |显示数据的页码，默认为1，取值范围：[-1,1000)。pageNumber为-1时，返回所有数据页码；超过总页数时，显示最后一页。|
|**pageSize**|Integer|False| |每页显示的数据条数，默认为10，取值范围：10、20、30、50、100|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeerrorlog#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**errorLogs**|[ErrorLogDigest[]](describeerrorlog#errorlogdigest)|错误日志文件的集合|
|**totalCount**|Integer|总记录条数|
### <div id="errorlogdigest">ErrorLogDigest</div>
|名称|类型|描述|
|---|---|---|
|**startTime**|String|错误日志开始执行时间|
|**dbName**|String|数据库名，表示该SQL是在哪个数据库中执行的|
|**dbNameAccount**|String|数据库账号，表示该数据库在哪个账号下面|
|**errorLogInformation**|String|错误日志信息|
|**errorSeverity**|String|错误日志级别|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeErrorLog() {
    DescribeErrorLogRequest request = new DescribeErrorLogRequest();
    request.setInstanceId("pg-x2fyuzvwak");
    request.setStartTime("2020-01-08 00:00:00");
    request.setEndTime("2020-01-08 14:00:00");
    request.setRegionId("cn-north-1");
    DescribeErrorLogResponse response = rdsClient.describeErrorLog(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpaomoqw3bjbesaav55w5imbpewrwk2v", 
    "result": {
        "errorLogs": [], 
        "totalCount": 0
    }
}
```
