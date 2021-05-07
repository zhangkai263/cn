# describeAuditFiles


## 描述
获取当前实例下的所有审计结果文件的列表<br>- 仅支持SQL Server

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/audit:describeAuditFiles

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeauditfiles#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**auditFiles**|[AuditFile[]](describeauditfiles#auditfile)| |
### <div id="auditfile">AuditFile</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|审计日志文件名称|
|**sizeByte**|Long|审计日志文件大小，单位Byte|
|**lastUpdateTime**|String|审计日志文件最后更新时间|
|**uploadTime**|String|审计日志文件上传时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeAuditFiles(){
    DescribeAuditFilesRequest request = new DescribeAuditFilesRequest();
    request.setInstanceId("sqlserver-83uqv7avy4");
    request.setRegionId("cn-north-1");
    DescribeAuditFilesResponse response= rdsClient.describeAuditFiles(request);
    String result = new Gson().toJson(response);
    System.out.println(result);
}

```

## 返回示例
```
{
    "requestId": "bpa2rdrg41dcqujn7k4f89ji0ocfspde", 
    "result": {
        "auditFiles": [
            {
                "lastUpdateTime": "2020-01-07 14:56:23", 
                "name": "RDSAudit_054F6E2E-01C1-41FD-ABC8-91EE34CD2AF9_0_132228536211390000.sqlaudit", 
                "sizeByte": 8704, 
                "uploadTime": "2020-01-07 14:56:24"
            }
        ]
    }
}
```
