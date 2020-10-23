# describeErrorLogs


## 描述
获取SQL Server 错误日志及下载信息<br>- 仅支持SQL Server

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/errorLogs

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeerrorlogs#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**errorLogs**|[ErrorLog[]](describeerrorlogs#errorlog)|错误日志文件的集合|
### <div id="errorlog">ErrorLog</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|错误日志文件名称|
|**sizeByte**|Long|错误日志文件大小，单位Byte|
|**lastUpdateTime**|String|错误日志最后更新时间，格式为：YYYY-MM-DD HH:mm:ss|
|**uploadTime**|String|错误日志上传时间，格式为：YYYY-MM-DD HH:mm:ss|
|**publicURL**|String|公网下载链接|
|**internalURL**|String|内网下载链接|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeErrorLogs() {
    DescribeErrorLogsRequest request = new DescribeErrorLogsRequest();
    request.setRegionId("cn-north-1");
    request.setInstanceId("sqlserver-83uqv7avy4");
    DescribeErrorLogsResponse response = rdsClient.describeErrorLogs(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa4j42ju7ouu8s8m39m0w4h1ps7kqg4", 
    "result": {
        "errorLogs": [
            {
                "internalURL": "http://oss-internal.cn-north-1.jcloudcs.com/jddbsqlserver/sqlserver-83uqv7avy4/errorlog/ERRORLOG?Expires=1593939719&AccessKey=E3136A5602E671CD26D5A7B56A05F965&Signature=TECg4lQyjLGzeU9Zm9SNoluSIds=", 
                "lastUpdateTime": "2020-01-07 16:58:22", 
                "name": "ERRORLOG", 
                "publicURL": "http://oss.cn-north-1.jcloudcs.com/jddbsqlserver/sqlserver-83uqv7avy4/errorlog/ERRORLOG?Expires=1593939719&AccessKey=E3136A5602E671CD26D5A7B56A05F965&Signature=TECg4lQyjLGzeU9Zm9SNoluSIds=", 
                "sizeByte": 45072, 
                "uploadTime": "2020-01-07 17:01:59"
            }
        ]
    }
}
```
