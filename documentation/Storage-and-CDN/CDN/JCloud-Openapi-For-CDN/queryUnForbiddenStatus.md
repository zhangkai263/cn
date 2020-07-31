## 解封状态查询(queryUnForbiddenStatus)

**接口说明**

### 请求地址

```reStructuredText
GET /v1/unForbiddeStatus
```

### 请求参数

| 参数名            | 类型                   | 是否必须 | 示例             | 描述                               |
| ----------------- | ---------------------- | -------- | ---------------- | ---------------------------------- |
| domain               | String                 | 否       | www.test.com              | 解封的域名     |
| url               | String                 | 否       | /a.jpg              | 解封的url     |
| taskId               | String                 | 否       | 810f0ee4-ff60-4778-86cb-fbb44d251de1              | 解封的任务id    |
| pageNumber               | int                 | 否       | 1              | 默认为1     |
| pageSize               | int                 | 否       | 1              | 默认为10     |


### 返回参数

| 名称          | 类型    | 描述                                                     |
| ------------- | ------- | -------------------------------------------------------- |
| requestId | String | 请求id，每次请求的唯一标识 |
|result|QueryUnForbiddenStatusResp|查询结果|

### QueryUnForbiddenStatusResp 参数说明

| 名称          | 类型    | 描述                                                     |
| ------------- | ------- | -------------------------------------------------------- |
| total           | int | 查询到的记录总数 |
| tasks         | List\<ForbiddenUrlTaskItem>  | 解封的信息列表                                              |

### ForbiddenUrlTaskItem 参数说明

| 名称          | 类型    | 描述                                                     |
| ------------- | ------- | -------------------------------------------------------- |
| domain | String |域名 |
| url | String |url |
| status | int |状态 |
| statusDesc | String |状态描述 |
**返回示例**

```json
{
    "requestId":"dea35b36-9682-492d-8db2-e6b5e9a20aa4",
    "result":{
        "tasks":[
            {
                "url":"/20200515-4.jpg",
                "domain":"www.test.com",
                "status":1,
                "statusDesc":"解封中"
            }
        ],
        "total":1
    }
}
```
