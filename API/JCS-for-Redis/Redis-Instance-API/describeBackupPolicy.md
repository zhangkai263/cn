# describeBackupPolicy


## 描述
查询缓存Redis实例的自动备份策略

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/backupPolicy

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describebackuppolicy#result)|结果,如果都为空,则表示自动备份已关闭|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**backupPeriod**|String|备份周期，包括：Monday，Tuesday，Wednesday，Thursday，Friday，Saturday，Sunday，多个用逗号分隔|
|**backupTime**|String|备份时间，格式为：HH:mm-HH:mm 时区，例如"01:00-02:00 +0800"，表示东八区的1点到2点|
|**nextBackupTime**|String|下次自动备份时间段，ISO 8601标准的UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ~YYYY-MM-DDTHH:mm:ssZ|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|

## 请求示例
GET
```
@Test
public void testGetBackupPolicy() {
  // 1. 设置请求参数
  DescribeBackupPolicyRequest request = new DescribeBackupPolicyRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234");

  // 2. 发起请求
  DescribeBackupPolicyResponse response = redisClient.describeBackupPolicy(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o9ch7w5f6mmeoqhn87mdoesbfghgbw", 
    "result": {
        "backupPeriod": "Sunday", 
        "backupTime": "20:00-21:00 +0000", 
        "nextBackupTime": "2021-07-18T20:00:00Z~2021-07-18T21:00:00Z"
    }
}
```
