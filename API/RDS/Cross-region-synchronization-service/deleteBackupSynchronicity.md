# deleteBackupSynchronicity


## 描述
删除一个跨地域备份同步服务。

## 请求方式
DELETE

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/backupSynchronicities/{serviceId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**serviceId**|String|True| |跨地域备份同步服务ID|

## 请求参数
无


## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
DELETE
```
public void testDeleteBackupSynchronicity() {
    DeleteBackupSynchronicityRequest request = new DeleteBackupSynchronicityRequest();
    request.setRegionId("cn-east-2");
    request.setServiceId("dbs-r1q51ene3s5d");
    DeleteBackupSynchronicityResponse response = rdsClient.deleteBackupSynchronicity(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa35r3b7jni1rj6krrfbprsr68vpb38"
}
```
