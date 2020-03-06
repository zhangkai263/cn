# copyParameterGroup


## 描述
拷贝参数组

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/parameterGroups:copyParameterGroup

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**parameterGroupId**|String|True| |参数组ID|
|**parameterGroupName**|String|True| |参数组的名字|
|**description**|String|False| |参数组的描述|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](copyparametergroup#result)| |

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
public void testCopyParameterGroup() {
    CopyParameterGroupRequest request = new CopyParameterGroupRequest();
    request.setDescription("copy mysql-pg-mpzspoh243");
    request.setParameterGroupId("mysql-pg-mpzspoh243");
    request.setParameterGroupName("copy");
    request.setRegionId("cn-north-1");
    CopyParameterGroupResponse response = rdsClient.copyParameterGroup(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpaodvuh5d8ncviu4bd10v05u451ghip", 
    "result": {
        "parameterGroupId": "mysql-pg-4xs1w58i9u"
    }
}
```
