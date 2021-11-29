# describeClientIpDetail


## 描述
查询指定客户端IP的连接详细信息

## 请求方式
POST

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/clientIpDetail

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ip**|String|True| |客户端IP|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeclientipdetail#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**details**|[Details[]](describeclientipdetail#details)|客户端IP连接详情|
### <div id="details">Details</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|client名称|
|**port**|String|client的端口|
|**age**|String|client的已连接时长，单位：秒|
|**idle**|String|client的空闲时长，单位：秒|
|**db**|String|client连接的db|
|**lastCmd**|String|最近执行的命令名称|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
@Test
public void testGetClientIpDetail() {
  // 1. 设置请求参数
  DescribeClientIpDetailRequest request = new DescribeClientIpDetailRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234").ip("10.0.5.8");

  // 2. 发起请求
  DescribeClientIpDetailResponse response = redisClient.describeClientIpDetail(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o95re1cmcqf60qrvtiren04owgepeb", 
    "result": {
        "details": [
            {
                "age": "1343", 
                "db": "0", 
                "idle": "4", 
                "lastCmd": "info", 
                "name": "", 
                "port": "48694"
            }, 
            {
                "age": "1343", 
                "db": "0", 
                "idle": "4", 
                "lastCmd": "info", 
                "name": "", 
                "port": "44326"
            }, 
            {
                "age": "1343", 
                "db": "0", 
                "idle": "4", 
                "lastCmd": "info", 
                "name": "", 
                "port": "47224"
            }
        ]
    }
}
```
