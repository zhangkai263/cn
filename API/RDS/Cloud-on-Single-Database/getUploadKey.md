# getUploadKey


## 描述
获取单库上云工具上传文件的需要的Key。单库上云工具需要正确的key值方能连接到京东云<br>- 仅支持SQL Server

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/importFiles:getUploadKey

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getuploadkey#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|上传文件需要用到的Key|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
public void testGetUploadKey(){
    GetUploadKeyRequest request=new GetUploadKeyRequest();
    request.setInstanceId("sqlserver-83uqv7avy4");
    request.setRegionId("cn-north-1");
    GetUploadKeyResponse response= rdsClient.getUploadKey(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa4m1sg1b8refswmtdq9h0r40082h3r", 
    "result": {
        "key": "GQx4EEy53e44Zt0por6NKhkrbhiHqw3NK4MBbZBft9xVy11m6BL5wTFsthBraXNSiN8G97OOED4dMryee1vybuQW7UliGAtzZdwX21NIX5dNcDQBcrELtQ=="
    }
}
```
