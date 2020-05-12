# batchDeleteVqdTasks


## 描述
批量删除视频质检任务。删除任务时，会同时删除任务相关的数据，如任务执行结果等。一次最多删除50条

## 请求方式
POST

## 请求地址
https://vqd.jdcloud-api.com/v1/vqdTasks:batchDelete


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**taskIds**|String[]|True| | |


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
POST
```
https://vqd.jdcloud-api.com/v1/vqdTasks:batchDelete

```
```
{
    "taskIds": [
        "10001", 
        "10002"
    ]
}
```

