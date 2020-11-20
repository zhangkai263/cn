# enableInternetAccess


## 描述
开启RDS实例的外网访问功能。开启后，用户可以通过internet访问RDS实例

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:enableInternetAccess

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
public void testEnableInternetAccess() {
    EnableInternetAccessRequest request = new EnableInternetAccessRequest();
    request.setRegionId("cn-north-1");
    request.setInstanceId("mysql-wp4e9ztap2");
    EnableInternetAccessResponse response = rdsClient.enableInternetAccess(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa51721t8vscgc223qqpcagsqhtpgr7"
}
```
