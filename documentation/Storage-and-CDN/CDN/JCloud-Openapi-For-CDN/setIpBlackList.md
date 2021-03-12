# setIpBlackList


## 描述
设置Ip黑白名单

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/domain/{domain}/ipBlackList

### 请求参数

| 参数名 | 类型         | 是否必须 | 示例              | 描述              |
| ------ | ------------ | -------- | ----------------- | ----------------- |
| domain | String       | 是       | | 域名名称          |
| ips    | List\<String> | 否       |                   | IP列表，传空为删除，中国境外/全球加速域名暂不支持传IP段 |
| ipListType    | String | 否       |   black                | IP列表类型(i.e.黑名单或者白名单)，默认为black，取值范围[black,white]|

### 返回参数

| 参数名    | 类型   | 示例值                               | 描述                      |
| --------- | ------ | ------------------------------------ | ------------------------- |
| requestId | String | 7cc7982b-a56e-40d7-adb0-d78d1d35f79f | 请求id,每次请求的唯一标识 |

### 示例

**请求示例**

```html
POST
```

**返回示例**

```json
{
   "requestId": "4C467B38-3910-447D-87BC-AC049166F216"
}
```

**异常返回示例**

```json
{
          "requestId":"04F0F334-1335-436C-A1D7-6C044FE73368",
            "error": {
                "code": 429,
                "message": "Out of resource quota",
                "status": "QUOTA_EXCEEDED",
                "details": [
                {
                    "xxx": "xx"
                }]
            }
}
```
