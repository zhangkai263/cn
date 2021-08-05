# createCacheInstance


## 描述
创建一个指定配置的缓存Redis实例：可选择版本、类型、规格（按CPU核数、内存容量、磁盘容量、带宽等划分），自定义分片规格可通过describeSpecConfig接口获取，老规格代码请参考，https://docs.jdcloud.com/cn/jcs-for-redis/specifications


## 请求方式
POST

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**cacheInstance**|[CacheInstanceSpec](createcacheinstance#cacheinstancespec)|True| |实例的创建参数|
|**charge**|[ChargeSpec](createcacheinstance#chargespec)|False| |实例的计费类型|

### <div id="chargespec">ChargeSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**chargeMode**|String|False|postpaid_by_duration|计费模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration.请参阅具体产品线帮助文档确认该产品线支持的计费类型|
|**chargeUnit**|String|False| |预付费计费单位，预付费必填，当chargeMode为prepaid_by_duration时有效，取值为：month、year，默认为month|
|**chargeDuration**|Integer|False| |预付费计费时长，预付费必填，当chargeMode取值为prepaid_by_duration时有效。当chargeUnit为month时取值为：1~9，当chargeUnit为year时取值为：1、2、3|
|**autoRenew**|Boolean|False| |True=：OPEN——开通自动续费、False=CLOSE—— 不开通自动续费，默认为CLOSE|
|**buyScenario**|String|False| |产品线统一活动凭证JSON字符串，需要BASE64编码，目前要求编码前格式为 {"activity":{"activityType":必填字段, "activityIdentifier":必填字段}}|
### <div id="cacheinstancespec">CacheInstanceSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**vpcId**|String|True| |缓存Redis实例所属的私有网络ID|
|**subnetId**|String|True| |缓存Redis实例在私有网络下所属的子网ID|
|**cacheInstanceName**|String|True| |缓存Redis实例名称，只支持数字、字母、英文下划线、中文，且不少于2字符不超过32字符|
|**cacheInstanceClass**|String|True| |缓存Redis实例的规格代码（可调用describeInstanceClass接口获取），或者自定义分片实例的单分片规格代码（可调用describeSpecConfig接口获取）|
|**password**|String|False| |缓存Redis实例的连接密码，为空即为免密，包含且只支持字母及数字，不少于8字符不超过16字符|
|**azId**|[AzIdSpec](createcacheinstance#azidspec)|True| |缓存Redis实例所在区域的可用区ID|
|**cacheInstanceDescription**|String|False| |缓存Redis实例的描述，不能超过256个字符|
|**redisVersion**|String|False| |缓存Redis引擎主次版本号：目前支持2.8和4.0，默认为2.8|
|**ipv6On**|Integer|False| |是否支持IPv6，0或空表示不支持，1表示支持IPv6，注意不是所有区域都支持IPv6，且必须保证VPC支持IPv6|
|**shardNumber**|Integer|False| |分片数，自定义分片规格集群版实例必须有，且大于1。每种分片规格支持的分片数可调用describeSpecConfig接口获取|
|**userTags**|[Tag[]](createcacheinstance#tag)|False| |用户普通标签|
### <div id="tag">Tag</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|False| |标签的键|
|**value**|String|False| |标签的值|
### <div id="azidspec">AzIdSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**master**|String|True| |缓存Redis主实例所在的可用区ID|
|**slave**|String|True| |缓存Redis从实例所在的可用区ID|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createcacheinstance#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**cacheInstanceId**|String|实例ID|
|**orderNum**|String|订单编号|
|**buyId**|String|购买ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
import com.google.gson.Gson;
import com.jdcloud.sdk.auth.StaticCredentialsProvider;
import com.jdcloud.sdk.service.redis.client.RedisClient;
import com.jdcloud.sdk.service.redis.model.*;
import org.junit.Test;

public class JDCloudRedisTest {
  RedisClient redisClient = RedisClient.builder().credentialsProvider(new StaticCredentialsProvider("accessKeyId", "secretKey")).build();

  @Test
  public void testCreateInstance() {
    // 1. 设置请求参数：在华北北京地域，创建总可用内存16G、8分片的集群基础版，4.0，按配置后付费实例
    CacheInstanceSpec spec = new CacheInstanceSpec();
    spec.cacheInstanceName("xx系统使用") // 实例名
        .password("W342azxj") // 实例访问密码
        .redisVersion("4.0") // 引擎版本：4.0
        .cacheInstanceClass("redis.s.small.basic") // 单分片规格：2G
        .shardNumber(8) // 分片数：8
        .azId(new AzIdSpec().master("cn-north-1a").slave("cn-north-1b")) // 跨可用区部署：主在cn-north-1a，从在cn-north-1b
        .vpcId("vpc-1234")
        .subnetId("subnet-1234");

    CreateCacheInstanceRequest request = new CreateCacheInstanceRequest();
    request.regionId("cn-north-1").cacheInstance(spec);

    // 2. 发起请求
    CreateCacheInstanceResponse response = redisClient.createCacheInstance(request);

    // 3. 处理响应结果
    if (response == null) {
      System.out.println("response is empty");
    } else if (response.getError() != null) {
      System.out.println(new Gson().toJson(response.getError()));
    } else {
      System.out.println(new Gson().toJson(response.getResult()));
    }
  }
}

```

## 返回示例
```
{
    "requestId": "c3o559jq7qbwwfm9qngbsr7jm99h5mc1", 
    "result": {
        "buyId": "B121116677688212350", 
        "cacheInstanceId": "redis-uae71bbgsga9", 
        "orderNum": "12882167725209383"
    }
}
```
