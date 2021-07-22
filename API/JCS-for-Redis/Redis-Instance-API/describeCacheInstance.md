# describeCacheInstance


## 描述
查询缓存Redis实例的详细信息

## 请求方式
GET

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
|**result**|[Result](describecacheinstance#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**cacheInstance**|[CacheInstance](describecacheinstance#cacheinstance)|实例的详细信息|
### <div id="cacheinstance">CacheInstance</div>
|名称|类型|描述|
|---|---|---|
|**cacheInstanceId**|String|实例ID|
|**cacheInstanceName**|String|实例名称|
|**cacheInstanceClass**|String|规格代码，2.8、4.0标准版是实例规格，4.0自定义分片集群版实例表示单分片规格|
|**cacheInstanceMemoryMB**|Integer|实例的总内存（MB），表示用户购买的可使用内存|
|**cacheInstanceStatus**|String|实例状态：creating表示创建中，running表示运行中，error表示错误，changing表示变更规格中，deleting表示删除中，configuring表示修改参数中，restoring表示备份恢复中|
|**cacheInstanceDescription**|String|实例描述|
|**createTime**|String|创建时间（ISO 8601标准的UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ）|
|**azId**|[AzId](describecacheinstance#azid)|az信息|
|**vpcId**|String|实例所属VPC ID|
|**subnetId**|String|实例所属子网ID|
|**connectionDomain**|String|实例的访问域名|
|**port**|Integer|实例的访问端口|
|**charge**|[Charge](describecacheinstance#charge)|实例的计费信息|
|**instanceVersion**|String|实例的详细版本号，形如x.x-x.x|
|**auth**|Boolean|连接实例时，是否需要密码认证，false表示无密码|
|**redisVersion**|String|创建实例时选择的引擎版本：目前支持2.8和4.0|
|**cacheInstanceType**|String|实例类型：master-slave表示主从版，cluster表示集群版|
|**ipv6On**|Integer|是否支持IPv6，0表示不支持（只能用IPv4），1表示支持|
|**tags**|[Tag[]](describecacheinstance#tag)|标签信息|
|**shardNumber**|Integer|实例分片数，标准版固定为1，自定义分片集群版实例分片数由用户创建时选择，其他实例为固定分片数|
|**memoryMBPerShard**|Integer|单分片内存大小（MB）|
### <div id="tag">Tag</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|标签的键|
|**value**|String|标签的值|
### <div id="charge">Charge</div>
|名称|类型|描述|
|---|---|---|
|**chargeMode**|String|支付模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration|
|**chargeStatus**|String|费用支付状态，取值为：normal、overdue、arrear，normal表示正常，overdue表示已到期，arrear表示欠费|
|**chargeStartTime**|String|计费开始时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**chargeExpiredTime**|String|过期时间，预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ，后付费资源此字段内容为空|
|**chargeRetireTime**|String|预期释放时间，资源的预期释放时间，预付费/后付费资源均有此值，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
### <div id="azid">AzId</div>
|名称|类型|描述|
|---|---|---|
|**master**|String|缓存Redis主实例所在区域的可用区ID|
|**slave**|String|缓存Redis从实例所在区域的可用区ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|

## 请求示例
GET
```
@Test
public void testGetInstanceDetail() {
  // 1. 设置请求参数
  DescribeCacheInstanceRequest request = new DescribeCacheInstanceRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-dr8kqlkauchk");

  // 2. 发起请求
  DescribeCacheInstanceResponse response = redisClient.describeCacheInstance(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o559jq7qbwwfm9qngbsr7jm99h5mc3", 
    "result": {
        "cacheInstance": {
            "auth": false, 
            "azId": {
                "master": "cn-north-1b", 
                "slave": "cn-north-1c"
            }, 
            "cacheInstanceClass": "redis.m.micro.basic", 
            "cacheInstanceDescription": "", 
            "cacheInstanceId": "redis-m0vcg462xe31", 
            "cacheInstanceMemoryMB": 1024, 
            "cacheInstanceName": "test", 
            "cacheInstanceStatus": "running", 
            "cacheInstanceType": "master-slave", 
            "charge": {
                "chargeExpiredTime": "2024-01-26T15:59:59Z", 
                "chargeMode": "prepaid_by_duration", 
                "chargeStartTime": "2020-03-20T03:27:58Z", 
                "chargeStatus": "normal"
            }, 
            "connectionDomain": "redis-m0vcg462xe31-proxy-nlb.jvessel-open-hb.jdcloud.com", 
            "createTime": "2020-03-20T03:27:28Z", 
            "instanceVersion": "4.0-1.3", 
            "ipv6On": 0, 
            "memoryMBPerShard": 1024, 
            "port": 6379, 
            "redisVersion": "4.0", 
            "shardNumber": 1, 
            "subnetId": "subnet-k8sjnalvo3", 
            "tags": null, 
            "vpcId": "vpc-hvo176vm93"
        }
    }
}
```
