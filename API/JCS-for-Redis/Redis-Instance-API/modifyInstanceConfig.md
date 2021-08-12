# modifyInstanceConfig


## 描述
修改缓存Redis实例的配置参数，支持部分配置参数修改

## 请求方式
POST

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/instanceConfig

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceConfig**|[ConfigItem[]](modifyinstanceconfig#configitem)|True| |配置参数名和参数值|

### <div id="configitem">ConfigItem</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**configName**|String|True| |configName目前只支持以下参数：<br>maxmemory-policy（redis 2.8和redis 4.0都支持，但配置值不相同）：内存剔除策略的最大使用内存限制<br>hash-max-ziplist-entries（redis 2.8和redis 4.0都支持）：用ziplist编码实现的哈希对象，ziplist中最多能存放entry个数的阈值<br>hash-max-ziplist-value（redis 2.8和redis 4.0都支持）：用ziplist编码实现的哈希对象，ziplist中能存放的value长度的最大值<br>list-max-ziplist-entries（只有redis 2.8支持）：用ziplist编码实现的列表对象，ziplist中最多能存放entry个数的阈值<br>list-max-ziplist-value（只有redis 2.8支持）：用ziplist编码实现的列表对象，ziplist中能存放的value长度的最大值<br>list-max-ziplist-size（只有redis 4.0支持）：用ziplist编码实现的列表对象，按照数据项个数或占用的字节数，限定ziplist的长度<br>list-compress-depth（只有redis 4.0支持）：用ziplist编码实现的列表对象，quicklist两端不被压缩的节点个数<br>set-max-intset-entries（redis 2.8和redis 4.0都支持）：用intset编码实现的集合对象，intset中最多能存放entry个数的阈值<br>zset-max-ziplist-entries（redis 2.8和redis 4.0都支持）：用ziplist编码实现的有序集合对象，ziplist中最多能存放entry个数的阈值<br>zset-max-ziplist-value（redis 2.8和redis 4.0都支持）：用ziplist编码实现的有序集合对象，ziplist中能存放的value长度的最大值<br>slowlog-log-slower-than（redis 2.8和redis 4.0都支持）：慢查询日志超时时间，单位微秒（1000000表示1秒），0表示记录所有的命令<br>notify-keyspace-events（只有redis 4.0支持）：事件通知<br>|
|**configValue**|String|True| |参数的配置值，默认值、参考值如下：<br>maxmemory-policy（redis 2.8和redis 4.0的默认值都为volatile-lru）：redis 4.0 的参考值有[volatile-lru, allkeys-lru, volatile-lfu, allkeys-lfu, volatile-random, allkeys-random, volatile-ttl, noeviction]，redis 2.8的参考值有[volatile-lru , allkeys-lru , volatile-random , allkeys-random , volatile-ttl , noeviction]<br>hash-max-ziplist-entries（redis 2.8和redis 4.0的默认值都为512）：[0-10000]<br>hash-max-ziplist-value（redis 2.8和redis 4.0的默认值都为64）：[0-10000]<br>list-max-ziplist-entries（redis 2.8的默认值为512，redis 4.0不支持）：[0-10000]<br>list-max-ziplist-value（redis 2.8的默认值为64，redis 4.0不支持）：[0-10000]<br>list-max-ziplist-size（redis 4.0的默认值为-2，redis 2.8不支持）：[-5-10000]<br>list-compress-depth（redis 4.0的默认值为0，redis 2.8不支持）：[0-10000]<br>set-max-intset-entries（redis 2.8和redis 4.0的默认值都为512）：[0-10000]<br>zset-max-ziplist-entries（redis 2.8和redis 4.0的默认值都为128）：[0-10000]<br>zset-max-ziplist-value（redis 2.8和redis 4.0的默认值都为64）：[0-10000]<br>slowlog-log-slower-than（redis 2.8和redis 4.0的默认值都为10000）：[0-10000]<br>notify-keyspace-events（redis 4.0的默认值为空，redis 2.8不支持）：[K , E , g , $ , l , s , h , z , x , e , A]字母的组合，区分大小写，或为空<br>|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|本次请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
@Test
public void testModifyInstanceConfig() {
  // 1. 设置请求参数
  ModifyInstanceConfigRequest request = new ModifyInstanceConfigRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234").addInstanceConfig(new ConfigItem().configName("maxmemory-policy").configValue("noeviction"));

  // 2. 发起请求
  ModifyInstanceConfigResponse response = redisClient.modifyInstanceConfig(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o559jq7qbwwfm9qngbsr7jm99h5mc9"
}
```
