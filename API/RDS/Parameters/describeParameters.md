# describeParameters


## 描述
查看SQL Server实例的配置参数<br>- 仅支持SQL Server

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/parameters

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**instanceId**|String|True| |Instance ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeparameters#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**parameters**|[DBInstanceParameter[]](describeparameters#dbinstanceparameter)|实例配置参数列表|
### <div id="dbinstanceparameter">DBInstanceParameter</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|参数名称|
|**description**|String|参数描述|
|**configureValue**|String|参数修改后的数值，但不一定生效，需要视该参数生效是否需要重启|
|**runningValue**|String|当前在实例中生效的数值|
|**range**|String|该参数数值的允许范围|
|**needRestart**|String|修改是否需要重启生效.- true:参数需要重启才能生效- false:参数生效无需重启|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeParameters() {
    DescribeParametersRequest request = new DescribeParametersRequest();
    request.setInstanceId("sqlserver-83uqv7avy4");
    request.setRegionId("cn-north-1");
    DescribeParametersResponse response = rdsClient.describeParameters(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpam6r0kgsjvd3eshajnhaa1b5ifrwec", 
    "result": {
        "parameters": [
            {
                "configureValue": "32767", 
                "description": "enables SQL Server to create a pool of worker threads to service a larger number of query requests", 
                "name": "max_worker_threads", 
                "needRestart": "false", 
                "range": "[0,128-32767]", 
                "runningValue": "32767"
            }, 
            {
                "configureValue": "2", 
                "description": "limit the number of processors to use in parallel plan execution", 
                "name": "max_degree_of_parallelism", 
                "needRestart": "false", 
                "range": "[0-64]", 
                "runningValue": "2"
            }, 
            {
                "configureValue": "1887437", 
                "description": "Maximum amount of memory in megabytes in the buffer pool used by an instance of Microsoft SQL Server", 
                "name": "max_server_memory_(MB)", 
                "needRestart": "false", 
                "range": "[512-2147483647]", 
                "runningValue": "1887437"
            }
        ]
    }
}
```
