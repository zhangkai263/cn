# describeSpecConfig


## 描述
查询缓存Redis实例的规格配置信息

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/specConfig

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describespecconfig#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**shardSpec**|Map|单分片规格，自定义分片规格集群实例才需要|
|**instanceSpec**|[InstanceSpec](describespecconfig#instancespec)|实例规格|
### <div id="instancespec">InstanceSpec</div>
|名称|类型|描述|
|---|---|---|
|**region**|String|region id|
|**instanceVersions**|[VersionInfo[]](describespecconfig#versioninfo)|版本信息列表|
### <div id="versioninfo">VersionInfo</div>
|名称|类型|描述|
|---|---|---|
|**redisVersion**|String|redis引擎版本：目前支持2.8、4.0|
|**instanceTypes**|[TypeInfo[]](describespecconfig#typeinfo)|类型信息列表|
### <div id="typeinfo">TypeInfo</div>
|名称|类型|描述|
|---|---|---|
|**instanceType**|String|实例类型：目前支持标准版（master-slave）、集群版（cluster）|
|**specs**|[SpecInfo[]](describespecconfig#specinfo)|规格列表|
### <div id="specinfo">SpecInfo</div>
|名称|类型|描述|
|---|---|---|
|**memoryGB**|Integer|内存大小（GB）|
|**instanceClass**|String|实例规格，标准版不为空，4.0 自定义分片集群版规格为空，具体规格参考单分片规格|
|**cpu**|Integer|实例CPU核数，0表示自定义分片集群版规格，CPU核数由分片数变化|
|**diskGB**|Integer|实例磁盘大小（GB)，0表示自定义分片集群版规格，磁盘大小由分片数变化|
|**maxConnection**|Integer|最大连接数，0表示自定义分片集群版规格，最大连接数由分片数变化|
|**bandwidthMbps**|Integer|带宽（Mbps)，0表示自定义分片集群版规格，带宽由分片数变化|
|**ipNumber**|Integer|需要的IP数，0表示自定义分片集群版规格，IP数由分片数变化|
|**shard**|[ShardInfo](describespecconfig#shardinfo)|实例的分片列表信息，redis 2.8标准版、集群版以及redis 4.0标准版没有分片列表信息|
|**azs**|String[]|az列表|
### <div id="shardinfo">ShardInfo</div>
|名称|类型|描述|
|---|---|---|
|**defaultShardNumber**|Integer|默认分片数|
|**defaultShardClass**|String|默认单分片规格代码|
|**shardNumberList**|Integer[]|分片数列表|
|**ipNumberList**|Integer[]|需要的IP数列表|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
@Test
public void testAvailableRegion() {
  // 1. 设置请求参数
  DescribeSpecConfigRequest request = new DescribeSpecConfigRequest();
  request.regionId("cn-north-1");

  // 2. 发起请求
  DescribeSpecConfigResponse response = redisClient.describeSpecConfig(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o559jq7qbwwfm9qngbsr7jm99h5me2", 
    "result": {
        "instanceSpec": {
            "instanceVersions": [
                {
                    "instanceTypes": [
                        {
                            "instanceType": "master-slave", 
                            "specs": [
                                {
                                    "azs": [
                                        "cn-north-1b", 
                                        "cn-north-1c", 
                                        "cn-north-1a"
                                    ], 
                                    "bandwidthMbps": 48, 
                                    "cpu": 1, 
                                    "diskGB": 20, 
                                    "instanceClass": "redis.m.micro.basic", 
                                    "ipNumber": 6, 
                                    "maxConnection": 10000, 
                                    "memoryGB": 1, 
                                    "shard": null
                                }
                            ]
                        }, 
                        {
                            "instanceType": "cluster", 
                            "specs": [
                                {
                                    "azs": [
                                        "cn-north-1b", 
                                        "cn-north-1c", 
                                        "cn-north-1a"
                                    ], 
                                    "bandwidthMbps": 0, 
                                    "cpu": 0, 
                                    "diskGB": 0, 
                                    "instanceClass": "", 
                                    "ipNumber": 0, 
                                    "maxConnection": 0, 
                                    "memoryGB": 16, 
                                    "shard": {
                                        "defaultShardClass": "redis.s.medium.basic", 
                                        "defaultShardNumber": 4, 
                                        "ipNumberList": [
                                            8, 
                                            14, 
                                            26
                                        ], 
                                        "shardNumberList": [
                                            2, 
                                            4, 
                                            8
                                        ]
                                    }
                                }
                            ]
                        }
                    ], 
                    "redisVersion": "4.0"
                }
            ], 
            "region": "cn-north-1"
        }, 
        "shardSpec": {
            "redis.s.micro.basic": {
                "bandwidthMbps": 48, 
                "cpu": 1, 
                "diskGB": 20, 
                "maxConnection": 10000, 
                "memoryGB": 1, 
                "shardClass": "redis.s.micro.basic"
            }, 
            "redis.s.small.basic": {
                "bandwidthMbps": 48, 
                "cpu": 1, 
                "diskGB": 20, 
                "maxConnection": 10000, 
                "memoryGB": 2, 
                "shardClass": "redis.s.small.basic"
            }
        }
    }
}
```
