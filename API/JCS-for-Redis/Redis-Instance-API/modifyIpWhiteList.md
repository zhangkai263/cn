# modifyIpWhiteList


## 描述
修改Redis实例的IP白名单

## 请求方式
PATCH

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/ipWhiteList

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ipWhiteList**|String[]|True| |修改后的IP白名单列表，IP格式为CIDR表示法（x.x.x.x/x），0.0.0.0/0表示任何IP、网络都可以访问|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|本次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
PATCH
```
@Test
public void testModifyIpWhiteList() {
  // 1. 设置请求参数
  ModifyIpWhiteListRequest request = new ModifyIpWhiteListRequest();
  List<String> ips = new ArrayList<>();
  ips.add("10.0.0.1/16");
  ips.add("100.1.1.1/32");
  request.regionId("cn-north-1").cacheInstanceId("redis-1234").ipWhiteList(ips);

  // 2. 发起请求
  ModifyIpWhiteListResponse response = redisClient.modifyIpWhiteList(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o9mm8r59mi59wrsb4u0i7f4vie996c"
}
```
