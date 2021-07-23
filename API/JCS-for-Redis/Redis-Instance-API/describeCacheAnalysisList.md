# describeCacheAnalysisList


## 描述
查询缓存分析任务列表

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/cacheAnalysis

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**date**|String|True| |格式:yyyy-MM-dd,表示查询某一天的缓存分析列表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describecacheanalysislist#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**analyses**|[CacheAnalysis[]](describecacheanalysislist#cacheanalysis)|缓存分析列表，最多返回12条数据|
### <div id="cacheanalysis">CacheAnalysis</div>
|名称|类型|描述|
|---|---|---|
|**analysisTime**|String|缓存分析的时间,rfc3339格式|
|**taskId**|String|缓存分析的任务ID|
|**status**|String|缓存分析任务状态, running, success, error, 只有sucess状态，才能根据taskId查询到结果|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
@Test
public void testGetCacheAnalysisList() {
  // 1. 设置请求参数
  DescribeCacheAnalysisListRequest request = new DescribeCacheAnalysisListRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234").date("2021-07-14");

  // 2. 发起请求
  DescribeCacheAnalysisListResponse response = redisClient.describeCacheAnalysisList(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o90nja6aa3wivwg7spfd32dc56kntn", 
    "result": {
        "analyses": [
            {
                "analysisTime": "2021-07-14 15:20:05", 
                "taskId": "c3o909b88c33djgeskogeo0cefaj1j1h"
            }
        ]
    }
}
```
