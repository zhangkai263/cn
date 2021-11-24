# describeInstanceClass


## 描述
查询缓存Redis实例的规格列表

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/instanceClass

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**redisVersion**|String|False| |缓存Redis的版本号：目前有2.8和4.0，默认为2.8|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstanceclass#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceClasses**|[InstanceClass[]](describeinstanceclass#instanceclass)| |
|**totalCount**|Integer| |
### <div id="instanceclass">InstanceClass</div>
|名称|类型|描述|
|---|---|---|
|**instanceClass**|String|规格代码：redis 2.8与redis 4.0的规格码不同，具体参考 https://docs.jdcloud.com/cn/jcs-for-redis/specifications|
|**instanceType**|String|规格类型：master-slave表示主从版，cluster表示集群版|
|**cpu**|Integer|cpu核数|
|**memoryMB**|Integer|内存总容量（MB）|
|**diskGB**|Integer|磁盘总容量（GB）|
|**maxConnection**|Integer|最大连接数|
|**bandwidthMbps**|Integer|内网带宽（MBps）|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
@Test
public void testInstanceClass() {
  // 1. 设置请求参数
  DescribeInstanceClassRequest request = new DescribeInstanceClassRequest();
  request.regionId("cn-north-1").redisVersion("4.0");

  // 2. 发起请求
  DescribeInstanceClassResponse response = redisClient.describeInstanceClass(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o559jq7qbwwfm9qngbsr7jm99h5me0", 
    "result": {
        "instanceClasses": [
            {
                "bandwidthMbps": 48, 
                "cpu": 1, 
                "diskGB": 20, 
                "instanceClass": "redis.m.micro.basic", 
                "instanceType": "master-slave", 
                "maxConnection": 10000, 
                "memoryMB": 1024
            }, 
            {
                "bandwidthMbps": 384, 
                "cpu": 8, 
                "diskGB": 160, 
                "instanceClass": "redis.c.small.basic", 
                "instanceType": "cluster", 
                "maxConnection": 80000, 
                "memoryMB": 16384
            }
        ], 
        "totalCount": 2
    }
}
```
