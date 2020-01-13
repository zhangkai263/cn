# deleteParameterGroup


## 描述
删除参数组<br>- 仅支持MySQL，Percona，MariaDB，PostgreSQL

## 请求方式
DELETE

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/parameterGroups/{parameterGroupId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**parameterGroupId**|String|True| |Parameter Group ID|

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
public void testDeleteParameterGroup() {
    DeleteParameterGroupRequest request = new DeleteParameterGroupRequest();
    request.setRegionId("cn-north-1");
    request.setParameterGroupId("mysql-pg-ap9dc33crt");
    DeleteParameterGroupResponse response = rdsClient.deleteParameterGroup(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpao4p0b09ccwn0hnfrikc8cmg9nqj97"
}
```
