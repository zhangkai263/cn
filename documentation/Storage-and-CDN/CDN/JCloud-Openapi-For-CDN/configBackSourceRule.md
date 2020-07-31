### 描述

回源改写配置(configBackSourceRule)

### 请求参数

| **名称**      | **类型** | **是否必填** | **描述**                          |
| ----------- | ------ | -------- | ------------------------------- |
| username      | String | 是        | 京东用户名pin                          |
| signature  | String | 是        | 用户签名                    |
|domain|String|是| 用户域名|
|beforeRegex|String|否| 回源改写之前的正则表达式,转义使用双斜线"\\\\",字段不填默认配置为"(.*)",已配置再填即是更新|
|afterRegex|String|是| 回源改写之后的正则表达式，转义使用双斜线"\\\\"，不支持多个"/(.\*)/(.\*)/(.\*)/(.\*)"连续的这类正则|

### 返回参数data中说明

| **名称**         | **描述**               |
| -------------- | -------------------- |
| status      | 结果状态 0，表示成功，其他失败            |
| msg | 提示信息                   |
| data | 返回数据   |

### 调用示例

##### 请求示例

```html
POST http://opencdn.jcloud.com/api/configBackSourceRule
{
    "username":"jcloud_test",
    "signature":"c13a5977f00c160ff8ec9612f16ee07c",
    "domain":"test.jcloud.com",
    "beforeRegex":"^/(.*)",
    "afterRegex":"/$1"
 }


 ```

##### 返回示例
```json
{
    "status": 0,
    "msg": "成功",
    "data": {}
}

```
