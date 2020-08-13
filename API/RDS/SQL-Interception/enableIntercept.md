# enableIntercept


## 描述
开启数据库的高安全模式<br>- 仅支持MySQL

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/intercept:enableIntercept

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**instanceId**|String|True| |Instance ID|

## 请求参数
无


## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
public void testEnableIntercept() {
    EnableInterceptRequest request = new EnableInterceptRequest();
    request.setInstanceId("mysql-k67q8n46si");
    request.setRegionId("cn-north-1");
    EnableInterceptResponse response = rdsClient.enableIntercept(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpakbc5ihe8icrgq0b7cre48fkgk3n7o"
}
```
