# describeParameterGroupParameters


## 描述
查看参数组的参数<br>- 仅支持MySQL，Percona，MariaDB，PostgreSQL

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/parameterGroups/{parameterGroupId}/parameters

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**parameterGroupId**|String|True| |Parameter Group ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeparametergroupparameters#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**parameters**|[ParameterGroupParameter[]](describeparametergroupparameters#parametergroupparameter)| |
### <div id="parametergroupparameter">ParameterGroupParameter</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|参数名称|
|**description**|String|参数描述|
|**configureValue**|String|参数修改后的数值，但不一定生效，需要视该参数生效是否需要重启|
|**defaultValue**|String|参数默认值|
|**range**|String|该参数数值的允许修改范围|
|**type**|String|参数数值的类型|
|**needRestart**|String|参数修改是否需要重启生效.- true:参数需要重启才能生效- false:参数生效无需重启|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeParameterGroupParameters() {
    DescribeParameterGroupParametersRequest request = new DescribeParameterGroupParametersRequest();
    request.setParameterGroupId("mysql-pg-e4zkfymxwt");
    request.setRegionId("cn-north-1");
    DescribeParameterGroupParametersResponse response = rdsClient.describeParameterGroupParameters(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpao9dpjb6w3rhja4dswi216drtajeih", 
    "result": {
        "parameters": [
            {
                "configureValue": "5000", 
                "defaultValue": "262144", 
                "description": "The size of the cache to hold changes to the binary log during a transaction", 
                "name": "binlog_cache_size", 
                "needRestart": "false", 
                "range": "4096-16777216", 
                "type": "integer"
            }, 
            "..."
        ]
    }
}
```
