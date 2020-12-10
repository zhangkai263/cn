# updateLogDownloadURLInternal


## 描述
设置日志文件的下载链接过期时间，重新生成 PostgreSQL 的日志文件下载地址

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/log/{logId}:updateLogDownloadURLInternal

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|
|**logId**|String|True| |日志文件ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**seconds**|Integer|True| |设置链接地址的过期时间，单位是秒，最长不能超过取值范围为 1 ~ 86400 秒|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](updatelogdownloadurlinternal#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**publicURL**|String|公网下载链接|
|**internalURL**|String|内网下载链接|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
public void testUpdateLogDownloadURLInternal() {
    UpdateLogDownloadURLInternalRequest request = new UpdateLogDownloadURLInternalRequest();
    request.setInstanceId("pg-x2fyuzvwak");
    request.setLogId("postgresql-0ab4d726-b4a4-46ef-9dc4-66e37e060833");
    request.setSeconds(3600);
    request.setRegionId("cn-north-1");
    UpdateLogDownloadURLInternalResponse response = rdsClient.updateLogDownloadURLInternal(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpakhjtwfufuv5abu59fc9tbp77mj0v5", 
    "result": {
        "internalURL": "http://s3.cn-north-1.jcloudcs.com/jddbpgsql/f7a5d144-fca1-4350-b3c5-1334c4d569b7/logupload/c30fc69d-48e1-43e0-b76c-3378dad25f9c/749f61ab-d4f3-4e66-946e-d8d2357a414b/postgresql-20200108_1100.log?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=11933B95E91AC3B8EB3C687BEFB3DFA3%2F20200108%2Fcn-north-1%2Fs3%2Faws4_request&X-Amz-Date=20200108T031319Z&X-Amz-Expires=3600&X-Amz-SignedHeaders=host&X-Amz-Signature=", 
        "publicURL": "http://s3.cn-north-1.jcloudcs.com/jddbpgsql/f7a5d144-fca1-4350-b3c5-1334c4d569b7/logupload/c30fc69d-48e1-43e0-b76c-3378dad25f9c/749f61ab-d4f3-4e66-946e-d8d2357a414b/postgresql-20200108_1100.log?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=11933B95E91AC3B8EB3C687BEFB3DFA3%2F20200108%2Fcn-north-1%2Fs3%2Faws4_request&X-Amz-Date=20200108T031319Z&X-Amz-Expires=3600&X-Amz-SignedHeaders=host&X-Amz-Signature="
    }
}
```
