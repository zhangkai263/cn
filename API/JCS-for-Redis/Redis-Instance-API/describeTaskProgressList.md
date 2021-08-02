# describeTaskProgressList


## 描述
查询正在执行的任务进度列表

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/taskProgress

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**taskType**|String|False| |任务类型：resize表示变配，目前只有变配可以查询进度|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describetaskprogresslist#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**taskProgresses**|[TaskProgress[]](describetaskprogresslist#taskprogress)|任务进度列表|
### <div id="taskprogress">TaskProgress</div>
|名称|类型|描述|
|---|---|---|
|**taskType**|String|任务类型：resize表示变配，同一时刻只能有一个变配任务|
|**taskId**|String|任务id|
|**taskStatus**|String|任务状态：init表示初始化，running表示运行中，success表示成功，fail表示失败|
|**progressPercent**|Integer|任务执行百分比|
|**elapsedTimeSecond**|Integer|执行时长（单位：秒）|
|**startTime**|String|启动时间（ISO 8601标准的UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ）|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
@Test
public void testGetLatestTaskProgress() {
  // 1. 设置请求参数
  DescribeTaskProgressListRequest request = new DescribeTaskProgressListRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234").taskType("resize");

  // 2. 发起请求
  DescribeTaskProgressListResponse response = redisClient.describeTaskProgressList(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o9ovh8ujsqnfm8bw56piuoqcn03ue4", 
    "result": {
        "taskProgresses": [
            {
                "elapsedTimeSecond": 443, 
                "progressPercent": 100, 
                "startTime": "2021-07-08T06:20:18Z", 
                "taskId": "c3j9i8fr05a7bhcbuncr3hj39nipmguc", 
                "taskStatus": "success", 
                "taskType": "resize"
            }
        ]
    }
}
```
