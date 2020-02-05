# describeAuditDownloadURL


## 描述
获取某个审计文件的下载链接，同时支持内链和外链，链接的有效时间为24小时<br>- 仅支持SQL Server

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/audit:describeAuditDownloadURL

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**fileName**|String|True| |审计文件名|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeauditdownloadurl#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**publicURL**|String|公网下载链接，若当前不可下载，则为空串|
|**internalURL**|String|内网下载链接，若当前不可下载，则为空串|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeAuditDownloadURL(){
    DescribeAuditDownloadURLRequest request = new DescribeAuditDownloadURLRequest();
    request.setInstanceId("sqlserver-83uqv7avy4");
    request.setRegionId("cn-north-1");
    request.setFileName("RDSAudit_054F6E2E-01C1-41FD-ABC8-91EE34CD2AF9_0_132228536211390000.sqlaudit");
    DescribeAuditDownloadURLResponse response= rdsClient.describeAuditDownloadURL(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa2s5pamdfjjrirv2gwsnkq6v8c8mqf", 
    "result": {
        "internalURL": "http://oss-internal.cn-north-1.jcloudcs.com/jddbsqlserver/6d4ffa92-f497-4373-add9-c7493da70054/audit/RDSAudit_054F6E2E-01C1-41FD-ABC8-91EE34CD2AF9_0_132228536211390000.sqlaudit?Expires=1578467095&AccessKey=E3136A5602E671CD26D5A7B56A05F965&Signature=P7ku/1vTgHeYzdppg/WXt2+gRP8=", 
        "publicURL": "http://oss.cn-north-1.jcloudcs.com/jddbsqlserver/6d4ffa92-f497-4373-add9-c7493da70054/audit/RDSAudit_054F6E2E-01C1-41FD-ABC8-91EE34CD2AF9_0_132228536211390000.sqlaudit?Expires=1578467095&AccessKey=E3136A5602E671CD26D5A7B56A05F965&Signature=P7ku/1vTgHeYzdppg/WXt2+gRP8="
    }
}
```
