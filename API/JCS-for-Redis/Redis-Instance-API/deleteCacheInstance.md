# deleteCacheInstance


## 描述
删除按配置计费、或包年包月已到期的缓存Redis实例，包年包月未到期不可删除。
只有处于运行running或者错误error状态才可以删除，其余状态不可以删除。
白名单用户不能删除包年包月已到期的缓存Redis实例。


## 请求方式
DELETE

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|本次请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
DELETE
```
@Test
public void testDeleteInstance() {
  // 1. 设置请求参数
  DeleteCacheInstanceRequest request = new DeleteCacheInstanceRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234");

  // 2. 发起请求
  DeleteCacheInstanceResponse response = redisClient.deleteCacheInstance(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o559jq7qbwwfm9qngbsr7jm99h5mc6"
}
```
