# describeBackups


## 描述
查询缓存Redis实例的备份任务（文件）列表，可分页、可指定起止时间或备份任务ID

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/backup

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |页码；默认为1|
|**pageSize**|Integer|False| |分页大小；默认为10；取值范围[10, 100]|
|**startTime**|String|False| |开始时间|
|**endTime**|String|False| |结束时间|
|**baseId**|String|False| |备份任务ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describebackups#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**backups**|[Backup[]](describebackups#backup)|备份任务（文件）列表|
|**totalCount**|Integer|备份任务（文件）总数|
### <div id="backup">Backup</div>
|名称|类型|描述|
|---|---|---|
|**baseId**|String|备份操作ID|
|**backupFileName**|String|备份文件的名称|
|**cacheInstanceId**|String|备份文件对应的实例ID|
|**backupStartTime**|String|备份开始时间（ISO 8601标准的UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ）|
|**backupEndTime**|String|备份结束时间（ISO 8601标准的UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ）|
|**backupType**|Integer|备份类型，1表示手动备份，0表示自动备份|
|**backupSize**|Long|备份文件总字节大小，如果实例是集群版，则表示每个分片备份文件大小的总和|
|**backupStatus**|Integer|备份任务状态状态，0表示备份中，1表示失败，2表示成功|
|**backupDownloadURL**|String|备份文件下载地址（已废弃，调用获取备份文件下载地址接口获取）|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|

## 请求示例
GET
```
@Test
public void testGetBackups() {
  // 1. 设置请求参数
  DescribeBackupsRequest request = new DescribeBackupsRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234");

  // 2. 发起请求
  DescribeBackupsResponse response = redisClient.describeBackups(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o9a8amafuww3hauj30aeifde85g140", 
    "result": {
        "backups": [
            {
                "backupDownloadURL": "", 
                "backupEndTime": "2021-07-14T15:36:57+08:00", 
                "backupFileName": "backup1", 
                "backupSize": 179, 
                "backupStartTime": "2021-07-14T15:36:57+08:00", 
                "backupStatus": 2, 
                "backupType": 1, 
                "baseId": "a607efba-ff06-4d78-ba3c-b3119fce27fd", 
                "cacheInstanceId": "redis-1234"
            }, 
            {
                "backupDownloadURL": "", 
                "backupEndTime": "2021-07-11T04:30:04+08:00", 
                "backupFileName": "autoBackuper", 
                "backupSize": 179, 
                "backupStartTime": "2021-07-11T04:30:04+08:00", 
                "backupStatus": 2, 
                "backupType": 0, 
                "baseId": "53a0b10d-a99a-44d3-97ca-ee892dba71ee", 
                "cacheInstanceId": "redis-1234"
            }
        ], 
        "totalCount": 2
    }
}
```
