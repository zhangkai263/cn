# enableSSL


## 描述
开启数据库的加密连接, 同时会重启数据库实例

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/ssl:enableSSL

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

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
public void testEnableSSL() {
    EnableSSLRequest request = new EnableSSLRequest();
    request.setInstanceId("mysql-k67q8n46si");
    request.setRegionId("cn-north-1");
    EnableSSLResponse response = rdsClient.enableSSL(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa6jgkroerde1u5wh08e13824uia8d1"
}
```
