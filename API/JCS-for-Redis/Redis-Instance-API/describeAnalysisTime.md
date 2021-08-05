# describeAnalysisTime


## 描述
获取自动缓存分析时间

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/analysisTime

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeanalysistime#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**time**|String|-表示为关闭，HH:mm-HH:mm 时区，例如"01:00-02:00 +0800"，表示东八区的1点到2点|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|

## 请求示例
GET
```
@Test
public void testGetInstanceAnalysisTime() {
  // 1. 设置请求参数
  DescribeAnalysisTimeRequest request = new DescribeAnalysisTimeRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234");

  // 2. 发起请求
  DescribeAnalysisTimeResponse response = redisClient.describeAnalysisTime(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o559jq7qbwwfm9qngbsr7jm99h5mcb", 
    "result": {
        "time": "-"
    }
}
```
