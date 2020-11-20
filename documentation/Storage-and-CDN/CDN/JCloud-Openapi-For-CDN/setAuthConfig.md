# dash鉴权参数设置接口

### 描述

设置dash鉴权参数，中国境外/全球加速时暂不支持该配置



### 请求路径

/api/bytedance/setAuthConfig



### 请求参数

| **名称**      | **类型** | **是否必填** | **描述**                          |
| ----------- | ------ | -------- | ------------------------------- |
| username      | String | 是        | 京东用户名pin                          |
| signature  | String | 是        | 通用签名算法计算的签名 |
| domainName      | String | 是      | 加速域名 |
| authKey | String | 否       | 鉴权key（enableUrlAuth=on时必填） |
| enableUrlAuth | String | 是        | 是否开启鉴权（可选值：on,off；默认为off）    |
| age | String | 否       | 鉴权时间戳过期时间，默认为0 |
| encAlgorithm | String | 否       | 鉴权参数加密算法，默认为md5且只支持md5 |
| timeFormat | String | 否       | 时间戳格式（可选值hex(16进制)，dec（10进制）,默认hex） |
| uriType       | String | 否       | 加密算法版本（可选值dash/dashv2/video，默认dashv2） |
| rule | String | 否 | 鉴权key生成顺序($key，$uri，$time三个值排列组合，表示生成鉴权key时参数的排列顺序，默认为：$key$uri$time) |
### 返回参数

| **名称**         | **描述**               |
| -------------- | -------------------- |
| status      | 结果状态                 |
| msg | 提示信息                   |
| data        | taskid           |


### 调用示例

##### 请求示例
```html
{
	"domainName":"test.aaa.com",
	"signature":"9f310af4c0b55575874dc6354e90c447",
	"authKey":"aaaaaaaa",
	"enableUrlAuth":"off",
	"age":"111",
	"encAlgorithm":"md5",
	"timeFormat":"dec",
	"uriType":"dashv2",
	"rule":"$time$key$uri"
}
​```
```

##### 返回示例

* json格式

```json
{
  "status": 0,
  "msg": "成功",
  "data": "1846"
}
```

```

```
