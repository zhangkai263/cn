# modifyParameterGroupParameters


## 描述
修改参数组的参数<br>- 仅支持MySQL，Percona，MariaDB，PostgreSQL

## 请求方式
PUT

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/parameterGroups/{parameterGroupId}/parameters

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**parameterGroupId**|String|True| |Parameter Group ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**parameters**|[Parameter[]](modifyparametergroupparameters#parameter)|True| |修改的参数|

### <div id="parameter">Parameter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |参数名称|
|**value**|String|True| |参数修改值|

## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
PUT
```
public void testModifyParameterGroupParameters() {
    ModifyParameterGroupParametersRequest request = new ModifyParameterGroupParametersRequest();
    request.setParameterGroupId("mysql-pg-e4zkfymxwt");
    Parameter parameter = new Parameter();
    parameter.setName("binlog_cache_size");
    parameter.setValue("5000");
    request.addParameter(parameter);
    request.setRegionId("cn-north-1");
    ModifyParameterGroupParametersResponse response = rdsClient.modifyParameterGroupParameters(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpao8wga4wnjbj1p3rq6uw9nj2468sek"
}
```
