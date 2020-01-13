# createParameterGroup


## 描述
创建一个参数组<br>- 仅支持MySQL，Percona，MariaDB，PostgreSQL

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/parameterGroups

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**engine**|String|True| |实例引擎类型，参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|
|**engineVersion**|String|True| |实例引擎版本，参见[枚举参数定义](../Enum-Definitions/Enum-Definitions.md)|
|**parameterGroupName**|String|True| |参数组的名字|
|**description**|String|False| |参数组的描述|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createparametergroup#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**parameterGroupId**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
public void testCreateParameterGroup() {
    CreateParameterGroupRequest request = new CreateParameterGroupRequest();
    request.setEngine("MySQL");
    request.setEngineVersion("5.7");
    request.setParameterGroupName("test mysql");
    request.setRegionId("cn-north-1");
    request.setDescription("tttttt");
    CreateParameterGroupResponse response = rdsClient.createParameterGroup(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpao7596fv3d1f5qefbs76m9872j5ww9", 
    "result": {
        "parameterGroupId": "mysql-pg-e4zkfymxwt"
    }
}
```
