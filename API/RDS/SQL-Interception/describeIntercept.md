# describeIntercept


## 描述
查看当前实例已开启的安全模式。如果开启数据库的高安全模式，会返回配置信息<br>- 仅支持MySQL

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/intercept

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**instanceId**|String|True| |Instance ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeintercept#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**available**|Boolean| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeIntercept() {
    DescribeInterceptRequest request = new DescribeInterceptRequest();
    request.setInstanceId("mysql-k67q8n46si");
    request.setRegionId("cn-north-1");
    DescribeInterceptResponse response = rdsClient.describeIntercept(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpakd27kavrguqb926odbdbqdj49rfq7", 
    "result": {
        "available": false
    }
}
```
