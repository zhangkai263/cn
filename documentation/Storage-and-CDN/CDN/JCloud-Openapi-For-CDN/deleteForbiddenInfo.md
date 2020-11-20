## 解封(deleteForbiddenInfo)

**接口说明**

中国境外/全球加速时暂不支持该配置

### 请求地址

```reStructuredText
POST /v1/forbiddenInfo:delete
```

### 请求参数

| 参数名            | 类型                   | 是否必须 | 示例             | 描述                               |
| ----------------- | ---------------------- | -------- | ---------------- | ---------------------------------- |
| forbiddenType               | String                 | 是       |               | 封禁类型[url,domain]     |
| forbiddenUrl               | String                 | 否       | /a.jpg              | 封禁的url     |
| forbiddenDomain               | String                 | 是       |  www.test.com        | 封禁的域名    |
| shareCacheDomainFlag               | String                 | 否       | "0"             | 默认为0，是否同步封禁共享缓存域名的URL,0：不同步封禁，1：同步封禁     |
| token               | String                 | 否       |               |     |


### 返回参数

| 名称          | 类型    | 描述                                                     |
| ------------- | ------- | -------------------------------------------------------- |
| requestId | String | 请求id，每次请求的唯一标识 |
|result|DelForbiddenResp|解封结果|

### DelForbiddenResp 参数说明

| 名称          | 类型    | 描述                                                     |
| ------------- | ------- | -------------------------------------------------------- |
| tasksId        |String  | 解封的任务id                                              |


**返回示例**

```json
{
    "requestId": "dea35b36-9682-492d-8db2-e6b5e9a20aa4",

   "result":{ "taskId": "ddddd3093jfejfldfdf"}
}
```
