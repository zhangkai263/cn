# describeCacheAnalysisResult


## 描述
查询缓存分析任务详情，最多查询到30天前的数据

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/cacheAnalysis/{taskId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|
|**taskId**|String|True| |任务ID，即request ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describecacheanalysisresult#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**startTime**|String|任务开始时间, rfc3339格式|
|**finishTime**|String|任务结束时间, rfc3339格式|
|**analysisType**|Integer|任务类型，0:手动分析，1自动分析|
|**stringBigKeys**|[RedisKey[]](describecacheanalysisresult#rediskey)|string类型的大key的降序数组|
|**otherBigKeys**|[RedisKey[]](describecacheanalysisresult#rediskey)|除了string的其他类型的大key的降序数组|
|**hotKeys**|[RedisKey[]](describecacheanalysisresult#rediskey)|热key的降序数组|
|**cmdCallTimesTop**|[RedisCmd[]](describecacheanalysisresult#rediscmd)|命令执行次数的降序数组|
|**cmdUseCpuTop**|[RedisCmd[]](describecacheanalysisresult#rediscmd)|命令使用cup时间的降序数组|
|**keyTypeDistribution**|Map|key的类型分布|
|**keySizeDistribution**|Map|key的大小分布|
### <div id="rediscmd">RedisCmd</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|命令名称|
|**data**|Long|命令调用次数或命令使用cpu的毫秒数|
### <div id="rediskey">RedisKey</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|key名称|
|**db**|Integer|key所在的db号|
|**size**|Integer|string类型的key表示字节数，list类型的key表示列表长度，set或zset类型的key表示集合或有序集合的大小、hash类型的key表示字典的大小等等|
|**keyType**|String|string、list、set、zset、hash五种类型|
|**frequency**|Integer|key访问的频度|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
@Test
public void testGetCacheAnalysisDetail() {
  // 1. 设置请求参数
  DescribeCacheAnalysisResultRequest request = new DescribeCacheAnalysisResultRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234").taskId("task-1234");

  // 2. 发起请求
  DescribeCacheAnalysisResultResponse response = redisClient.describeCacheAnalysisResult(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o90nww5rgfrhitif97cwoh8mjgsi33", 
    "result": {
        "analysisType": 1, 
        "cmdCallTimesTop": [
            {
                "data": 1, 
                "name": "get"
            }, 
            {
                "data": 1, 
                "name": "psync"
            }
        ], 
        "cmdUseCpuTop": [
            {
                "data": 135, 
                "name": "psync"
            }, 
            {
                "data": 3, 
                "name": "get"
            }
        ], 
        "finishTime": "2021-07-14 15:20:06.020918609 +0800 CST m=+650.859919607", 
        "hotKeys": null, 
        "keySizeDistribution": {}, 
        "keyTypeDistribution": {}, 
        "otherBigkeys": [], 
        "startTime": "2021-07-14 15:20:05.970576399 +0800 CST m=+650.809577370", 
        "status": "", 
        "stringBigKeys": []
    }
}
```
