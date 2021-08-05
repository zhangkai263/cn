# describeSlowLog


## 描述
获取缓存Redis实例的慢查询日志，可分页、可搜索

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/slowLog

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
|**shardId**|String|False| |分片id|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeslowlog#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**slowLogs**|[SlowLog[]](describeslowlog#slowlog)|该页的慢查询日志列表|
|**totalCount**|Integer|慢查询日志总条数|
### <div id="slowlog">SlowLog</div>
|名称|类型|描述|
|---|---|---|
|**command**|String|命令|
|**startTime**|String|命令开始执行时间（ISO 8601标准的UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ）|
|**executionTime**|String|命令执行时长（带单位）|
|**shardId**|String|执行命令的分片id|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|

## 请求示例
GET
```
@Test
public void testGetSlowlogs() {
  // 1. 设置请求参数
  DescribeSlowLogRequest request = new DescribeSlowLogRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234");

  // 2. 发起请求
  DescribeSlowLogResponse response = redisClient.describeSlowLog(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o9oteswcpou221oegepq4mtd4or99c", 
    "result": {
        "slowLogs": [
            {
                "command": "hgetall post:user1:1234", 
                "executionTime": "10.58 ms", 
                "shardId": "redis-1234-shard-0", 
                "startTime": "2021-07-14T08:09:48Z"
            }, 
            {
                "command": "keys *", 
                "executionTime": "15.85 ms", 
                "shardId": "redis-1234-shard-0", 
                "startTime": "2021-07-14T08:06:20Z"
            }
        ], 
        "totalCount": 2
    }
}
```
