# describeLatestRestoreTime


## 描述
获取SQL Server实例按时间点恢复/创建时，可恢复到的最后的一个时间点<br>- 仅支持SQL Server

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:describeLatestRestoreTime

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describelatestrestoretime#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**latestRestoreTime**|String|实例按时间点恢复时,可恢复到的最后的一个时间点|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeLatestRestoreTime() {
    DescribeLatestRestoreTimeRequest request = new DescribeLatestRestoreTimeRequest();
    request.setInstanceId("sqlserver-83uqv7avy4");
    request.setRegionId("cn-north-1");
    DescribeLatestRestoreTimeResponse response = rdsClient.describeLatestRestoreTime(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa4ra7kttub98404upawr11a9dnf1bb", 
    "result": {
        "latestRestoreTime": "2020-01-07 17:18:26"
    }
}
```
