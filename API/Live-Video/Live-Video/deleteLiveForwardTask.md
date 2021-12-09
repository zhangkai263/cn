# deleteLiveForwardTask


## 描述
删除直播拉流转推任务


## 请求方式
DELETE

## 请求地址
https://live.jdcloud-api.com/v1/LiveForwardTask:delete


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**taskIds**|String|True| |任务ID,批量用,分隔<br>|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|requestId|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
DELETE
```
https://live.jdcloud-api.com/v1/LiveForwardTask:delete

```

```
"https://live.jdcloud-api.com/v1/LiveForwardTask:delete?taskIds=9"
```

## 返回示例
```
{
    "code": 200, 
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41"
}
```
