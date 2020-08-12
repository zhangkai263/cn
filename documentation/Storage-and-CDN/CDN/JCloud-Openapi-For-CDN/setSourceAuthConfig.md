# 回源鉴权参数设置接口

### 描述

设置回源鉴权参数，中国境外/全球加速时暂不支持该配置



### 请求路径

/api/bytedance/setSourceAuthConfig



### 请求参数

| **名称**       | **类型** | **是否必填** | **描述**                                                     |
| -------------- | -------- | ------------ | ------------------------------------------------------------ |
| username       | String   | 是           | 京东用户名pin                                                |
| signature      | String   | 是           | 通用签名算法计算的签名                                       |
| domainName     | String   | 是           | 加速域名                                                     |
| originRole     | String   | 否           | 回源为主/备（可选值master，slave）                           |
| enable         | String   | 是           | 是否开启鉴权（可选值：on,off）                               |
| authType       | String   | 否           | 鉴权类型（可选值oss,aws（现不支持）,tos，enable=on时必填）   |
| originAuthRule | Objects  | 否           | 具体的鉴权参数（可选：TOSAuthInfo，OSSAuthInfo）（enableUrlAuth=on时必填） |


### TOSAuthInfo

| **名称**    | **类型** | **是否必填** | **描述**                                                     |
| ----------- | -------- | ------------ | ------------------------------------------------------------ |
| authVersion | String   | 是           | 可配置 v1、v2。                                              |
| accessKey   | String   | 是           | 密钥                                                         |
| secretKey   | String   | 是           | 密钥的加密密钥                                               |
| authHeaders | Object   | 否           | 需要参加鉴权的请求头（v2 使用,eg：[{"name":"header-1","value":"a"},{"name":"header-2","value":"b"}] |
| expireTime  | String   | 否           | 单位s，默认 900                                              |





### OSSAuthInfo

| **名称a**  | **类型** | **是否必填** | **描述**       |
| ---------- | -------- | ------------ | -------------- |
| accessKey  | String   | 是           | 密钥           |
| secretKey  | String   | 是           | 密钥的加密密钥 |
| bucketName | String   | 是           |                |
| objectName | String   | 否           |                |







### 返回参数

| **名称** | **描述** |
| -------- | -------- |
| status   | 结果状态 |
| msg      | 提示信息 |
| data     | taskid   |


### 调用示例

##### 请求示例
```html
{
	"domainName":"test.aaa.com",
	"signature":"9f310af4c0b55575874dc6354e90c447",
	"authKey":"aaaaaaaa",
	"enable":"on",
	"originRole":"master",
	"authType":"tos",
	"originAuthRule":{
		"accessKey":"aaa",
		"secretKey":"bbb",
		"authVersion":"v2",
		"AuthHeaders":[
			{
				"name":"a-b-c",
				"value":"aaaaaaa"
			},{
				"name":"d-e-f",
				"value":"ddddddd"
			}],
		"ExpireTime":"800"
	}
}
```
```

##### 返回示例

* json格式

​```json
{
  "status": 0,
  "msg": "成功",
  "data": "1846"
}
```

```

```
