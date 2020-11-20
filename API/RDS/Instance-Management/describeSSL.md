# describeSSL


## 描述
查看当前实例已开启加密连接。

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/ssl

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describessl#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**available**|Boolean|当前实例是否已经开启加密连接，如已开启，返回true，如未开启，返回false.|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeSSL() {
    DescribeSSLRequest request = new DescribeSSLRequest();
    request.setInstanceId("mysql-k67q8n46si");
    request.setRegionId("cn-north-1");
    DescribeSSLResponse response = rdsClient.describeSSL(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa6jgkroerde1u5wh08e13824uia8d1", 
    "result": {
        "available": false
    }
}
```
