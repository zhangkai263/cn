# queryIpBlackList


## 描述
查询IP黑白名单

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/domain/{domain}/ipBlackList

### 请求参数

| 参数名 | 类型   | 是否必须 | 示例              | 描述     |
| ------ | ------ | -------- | ----------------- | -------- |
| domain | String | 是       |  | 域名名称 |

### 返回参数

| 参数名    | 类型   | 示例值                               | 描述                      |
| --------- | ------ | ------------------------------------ | ------------------------- |
| requestId | String | 7cc7982b-a56e-40d7-adb0-d78d1d35f79f | 请求id,每次请求的唯一标识 |
| result    | Object |                                      |                           |

### 数据类型Result

| 参数   | 类型         | 描述         |
| ------ | ------------ | ------------ |
| domain | String       | 域名         |
| ips    | List\<String> | 黑名单ip列表 |
| status | String       | 黑名单状态   |
| whiteIps    | List\<String> | 白名单ip列表 |


### 示例

```json
{
    "requestId": "02394480-0054-45af-ae0d-0fb73d536a4c",
    "result": {
        "domain": "pid-xieshang728-domain.test20181437.com",
        "ips": [
            "1.1.1.1"
        ],
        "status": "on"
    }
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
