# modifyParameters


## 描述
修改SQL Server实例的配置参数，目前支持以下参数:max_worker_threads,max_degree_of_parallelism,max_server_memory_(MB)。 部分参数修改后，需要重启才能生效，具体可以参考微软的相关文档。<br>- 仅支持SQL Server

## 请求方式
PUT

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/parameters

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**instanceId**|String|True| |Instance ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**parameters**|[Parameter[]](modifyparameters#parameter)|True| |修改的实例参数|

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
public void testModifyParameters(){
    ModifyParametersRequest request=new ModifyParametersRequest();
    request.setRegionId("cn-north-1");
    request.setInstanceId("sqlserver-83uqv7avy4");
    Parameter parameter=new Parameter();
    parameter.setName("max_worker_threads");
    parameter.setValue("32767");
    request.addParameter(parameter);
    ModifyParametersResponse response= rdsClient.modifyParameters(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpam6djdg3117vskkhm8c0fjmtksb9db"
}
```
