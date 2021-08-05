# describeIpWhiteList


## 描述
获取Redis实例的IP白名单（只有白名单内的IP、网络才能访问该实例）

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/ipWhiteList

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeipwhitelist#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**ipWhiteList**|String[]|IP白名单列表（IP格式为CIDR表示法：x.x.x.x/x），默认为0.0.0.0/0，表示所有IP|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|

## 请求示例
GET
```
@Test
public void testGetIpWhiteList() {
  // 1. 设置请求参数
  DescribeIpWhiteListRequest request = new DescribeIpWhiteListRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234");

  // 2. 发起请求
  DescribeIpWhiteListResponse response = redisClient.describeIpWhiteList(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o9kige7vab8hoac9jqet64kvc0kkug", 
    "result": {
        "Ipv6": false, 
        "ipWhiteList": [
            "0.0.0.0/0"
        ]
    }
}
```
