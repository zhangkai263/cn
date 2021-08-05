# createCacheAnalysis


## 描述
创建缓存分析任务，一天最多创建12次分析任务

## 请求方式
POST

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/cacheAnalysis

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|本次请求ID，也是本次缓存分析任务的taskId|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**409**|STATE|

## 请求示例
POST
```
@Test
public void testCreateCacheAnalysis() {
  // 1. 设置请求参数
  CreateCacheAnalysisRequest request = new CreateCacheAnalysisRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234");

  // 2. 发起请求
  CreateCacheAnalysisResponse response = redisClient.createCacheAnalysis(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o559jq7qbwwfm9qngbsr7jm99h5mcc"
}
```
