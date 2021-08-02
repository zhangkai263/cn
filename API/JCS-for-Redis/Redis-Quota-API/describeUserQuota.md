# describeUserQuota


## 描述
查询账户的缓存Redis配额信息

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/quota

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeuserquota#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**quota**|[Quota](describeuserquota#quota)| |
### <div id="quota">Quota</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|配额项的名称|
|**max**|Integer|配额|
|**used**|Integer|已使用的数目|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
@Test
public void testInstanceQuota() {
  // 1. 设置请求参数
  DescribeUserQuotaRequest request = new DescribeUserQuotaRequest();
  request.regionId("cn-north-1");

  // 2. 发起请求
  DescribeUserQuotaResponse response = redisClient.describeUserQuota(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o559jq7qbwwfm9qngbsr7jm99h5me1", 
    "result": {
        "quota": {
            "max": 20, 
            "name": "缓存Redis", 
            "used": 1
        }
    }
}
```
