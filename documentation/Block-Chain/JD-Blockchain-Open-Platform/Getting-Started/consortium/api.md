
# Fabric API使用指南
智臻链BaaS平台企业组网提供两种应用接入方式：

* 使用Hyperledger Fabric官方提供的SDK直接与创建出来的区块链网络交互，具体参考[接入指南](https://github.com/hyperledger)
* 使用平台提供的HTTP API接口，与区块链网络交互

本指南着重描述第二种接入方式。
> 注意：该版本的API接口暂未与京东云OPENAPI结合。且该文档仅适用于企业组网功能，一键部署应用接入请参考第一种应用接入方式

## 统一返回格式
现行API接口返回都统一返回如下格式：

### 接口执行成功

```json
{
   "code": 200,       // 执行状态码： 200 
   "status": "ok",    // 状态短语字串： ok
   "data": "操作描述或查询结果", 
   "err_msg": null,   // 成功返回时，具体值为null
}
```

### 接口执行失败

```json
{
   "code": 400,                  // 执行状态码：400或500等错误码，基本同http状态码
   "status": "error",            // 状态短语字串：error
   "data": null,                 // 出错返回时，data的具体值为null
   "err_msg": "具体的错误信息",    // 状态详细信息字串：具体的错误信息
}
```

## 服务状态检查
### 描述
用于检测当前区块链节点API服务是否正常，当http状态码为200，且返回字符串**ok**代表服务正常。
### 请求方法
GET
### 请求路径
/healthz
### 请求参数
无
### 请求示例
```
curl -X GET http://bc-r3scqqdhru-peerft-0-FI.jvessel-public-stag2.jdcloud.com:80/healthz 
```

### 响应示例

```
ok
```

## 登录
### 描述
登录接口用于获取后续接口执行时必须的Token。现阶段，Token有效期为1小时。
### 请求方法
POST
### 请求路径
/external/v1/login
### 请求格式
JSON
### 请求参数
```json
{        
	"username": "",      // 创建区块链网络时定义的API用户
	"password": "",      // 创建区块链网络时定义的API用户密码
}
```

### 请求示例
```
curl -X POST \
  http://bc-zrfyffl7cr-peerft-0-FI.jvessel-public-stag2.jdcloud.com/external/v1/login \
  -H 'Content-Type: application/json' \
  -d '{        
	"username": "user",    
	"password": "pass"
}'
```

### 响应示例
> 返回结果需从统一返回结果中的**data**字段中提取

```json
{
    "expire": "",
    "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1MzkyMjYzNDgsImlkIjoidGVzdHVzZXIiLCJvcmlnX2lhdCI6MTUzOTIyMjc0OH0.5zWYdquAIbdfTSjYBIZ5UB3rBjtbsyc8jBaZKAiupQc"
}
```

## 提交invoke交易
### 描述
用于提交invoke交易，交易执行完成后才会返回结果
### 请求方法
POST
### 请求路径
/external/v1/chaincode/invoke
### 请求格式
JSON
### 请求头
* Authorization: Bearer +登录接口返回的Token

### 请求参数
```json
{
	"channel": "ledgerw", // 区块链通道名
	"ccname": "kvchaincode",  // 链码名称
	"function": "put", // 要执行的链码方法名
	"args": ["k", "100"] // 链码方法的入参，注意此处为JSON数组
}
```

### 请求示例
```
curl -X POST \
  http://bc-sij02orkuz-peerft-0-FI.jvessel-public-stag2.jdcloud.com/external/v1/chaincode/invoke \
  -H 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1ODM3NDM5OTIsImlkIjoidXNlciIsIm9yaWdfaWF0IjoxNTgzNzQwMzkyfQ.4M7zR3X7_Tq1zG8Eo7Doi65jPzt11mL5Ziyd7vqDA50' \
  -H 'Content-Type: application/json' \
  -d '{
	"channel": "ledgerw",
	"ccname": "kvchaincode",
	"function": "put",
	"args": ["k", "100"]
}'
```

### 响应示例
> 返回结果需从统一返回结果中的**data**字段中提取
```json
{
	"txId": "871bd92a39622a97e8c1384c636774c681631191558d973003a13dfbbf81e899", // 此次交易ID，可作为当前操作的区块链唯一标识
	"txValidationCode":0,
	"proposalResponse": {
		"status": 200, // 交易执行状态码
		"payload": "ODcxYmQ5MmEzOTYyMmE5N2U4YzEzODRjNjM2Nzc0YzY4MTYzMTE5MTU1OGQ5NzMwMDNhMTNkZmJiZjgxZTg5OQ==" // 交易执行结果，具体返回值如何使用需与链码方法返回结果逻辑匹配
	}
	"ccResponse":{
		"payload":"ODcxYmQ5MmEzOTYyMmE5N2U4YzEzODRjNjM2Nzc0YzY4MTYzMTE5MTU1OGQ5NzMwMDNhMTNkZmJiZjgxZTg5OQ==",
		"status":200
	}
}
```

## 提交query交易
### 描述
用于提交query交易，交易执行完成后才会返回结果
### 请求方法
POST
### 请求路径
/external/v1/chaincode/query
### 请求格式
JSON
### 请求头
* Authorization: Bearer +登录接口返回的Token

### 请求参数
```json
{
	"channel": "ledgerw", // 区块链通道名
	"ccname": "kvchaincode",  // 链码名称
	"function": "get", // 要执行的链码方法名
	"args": ["k"] // 链码方法的入参，注意此处为JSON数组
}
```

### 请求示例
```
curl -X POST \
  http://bc-sij02orkuz-peerft-0-FI.jvessel-public-stag2.jdcloud.com/external/v1/chaincode/query \
  -H 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1ODM3NDM5OTIsImlkIjoidXNlciIsIm9yaWdfaWF0IjoxNTgzNzQwMzkyfQ.4M7zR3X7_Tq1zG8Eo7Doi65jPzt11mL5Ziyd7vqDA50' \
  -H 'Content-Type: application/json' \
  -d '{
	"channel": "ledgerw",
	"ccname": "kvchaincode",
	"function": "get",
	"args": ["k"]
}'
```

### 响应示例
> 返回结果需从统一返回结果中的**data**字段中提取

```json
{
	"message":"",
	"payload":"100",  // 交易执行结果，具体返回值如何使用需与链码方法返回结果逻辑匹配
	"status":200,   // 交易执行状态码
	"transactionid":"13e1aa10113d8026927469d90d6764add936c6bcebf8cc66d569ac8a9ce56580"  // 此次交易ID，可作为当前操作的区块链唯一标识
}
```

## 查询区块链通道信息
### 描述
用于查询区块链通道信息，包括当前高度、区块哈希等
### 请求方法
GET
### 请求路径
/external/v1/channel/info
### 请求格式
QUERY
### 请求头
* Authorization: Bearer +登录接口返回的Token

### 请求参数
* channelId: 通道名称（channel ID）

### 请求示例
```
curl -X GET http://bc-oyw2mynhyj-peerft-0-FI.jvessel-public-stag2.jdcloud.com:80/external/v1/channel/info?channelId=mychannel \
  -H 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1ODMyMzQ1OTcsImlkIjoicSIsIm9yaWdfaWF0IjoxNTgzMjMwOTk3fQ.lYH8jHlatgfImJ98SbvOE5clov50Y76tpTXnJqiVCHc' 
```

### 响应示例
> 返回结果需从统一返回结果中的**data**字段中提取
```json
{
  	"height":4, // 当前区块高度
	"currentBlockHash":"8bba079e00b7db40257f980901ef332f10ec731b40af4804eff678a6beb5c9ac", // 当前区块哈希
	"previousBlockHash ":"bb708f185322c9939a8696e46dd9d2e89599367e0c3e377a58126e14a4b5f932", // 前序区块哈希
}
```

## 根据区块高度查询区块信息
### 描述
根据区块高度查询区块信息
### 请求方法
GET
### 请求路径
/external/v1/channel/block/height
### 请求格式
QUERY
### 请求头
* Authorization: Bearer +登录接口返回的Token

### 请求参数
* channelId: 通道名称
* blockNumber: 区块高度

### 请求示例
```
curl -X GET http://bc-oyw2mynhyj-peerft-0-FI.jvessel-public-stag2.jdcloud.com:80/external/v1/channel/block/height?channelId=mychannel&blockNumber=2 \
  -H 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1ODMyMzQ1OTcsImlkIjoicSIsIm9yaWdfaWF0IjoxNTgzMjMwOTk3fQ.lYH8jHlatgfImJ98SbvOE5clov50Y76tpTXnJqiVCHc' 
```

### 响应示例
> 返回结果需从统一返回结果中的**data**字段中提取
```json
{
  	"blockHash":"bb708f185322c9939a8696e46dd9d2e89599367e0c3e377a58126e14a4b5f932", // 当前区块哈希
	"blockHeight":2, // 当前区块高度
	"previousBlockHash":"34e9a78ce62fa3b2e2e250ae6b02d4608e75d67ab48ba95acb8bbd00e8216614", // 前序区块哈希
	"dataHash":"a14815c79e352e63d732a641350130ff2125cd3748f82d0c1e4a8c8afb0f4869", // 当前区块数据哈希
	"blockTime":"2020-03-03 06:12:13", // 区块创建时间
	"txs":[{
		"txId":"9ad0ea1c81d0183d5a7b82fac854d8bf176abccf6d901b9fb5fd9158762a6962", // 交易ID
		"txTime":"2020-03-03 06:12:13", // 交易时间
		"envelopeInfo":{} // 交易内容 （测试的具体返回值中无该字段,可能由于无交易内容的缘故）
	}] // 区块交易集合
}
```

## 根据区块哈希查询区块信息
### 描述
根据区块哈希查询区块信息
### 请求方法
GET
### 请求路径
/external/v1/channel/block/hash
### 请求格式
QUERY
### 请求头
* Authorization: Bearer +登录接口返回的Token

### 请求参数
* channelId: 通道名称
* blockHash: 区块哈希

### 请求示例
```
curl -X GET http://bc-oyw2mynhyj-peerft-0-FI.jvessel-public-stag2.jdcloud.com:80/external/v1/channel/block/hash?channelId=mychannel&blockHash=bb708f185322c9939a8696e46dd9d2e89599367e0c3e377a58126e14a4b5f932 \
  -H 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1ODMyMzQ1OTcsImlkIjoicSIsIm9yaWdfaWF0IjoxNTgzMjMwOTk3fQ.lYH8jHlatgfImJ98SbvOE5clov50Y76tpTXnJqiVCHc' 
```

### 响应示例
> 返回结果需从统一返回结果中的**data**字段中提取

```json
{
  	"blockHash":"", // 当前区块哈希
	"blockHeight":1, // 当前区块高度
	"previousBlockHash":"", // 前序区块哈希
	"dataHash":"", // 当前区块数据哈希
	"blockTime":"yyyy-mm-dd hh:MM:ss", // 区块创建时间
	"txs":[{
		"txId":"", // 交易ID
		"txTime":"", // 交易时间
		"envelopeInfo":{} // 交易内容 
	}] // 区块交易集合
}
```

## 根据交易ID查询区块信息
### 描述
根据交易ID查询区块信息
### 请求方法
GET
### 请求路径
/external/v1/channel/block/txid
### 请求格式
QUERY
### 请求头
* Authorization: Bearer +登录接口返回的Token

### 请求参数
* channelId: 通道名称
* txId: 交易ID

### 请求示例
```
curl -X GET http://bc-oyw2mynhyj-peerft-0-FI.jvessel-public-stag2.jdcloud.com:80/external/v1/channel/block/txid?channelId=mychannel&txId=9ad0ea1c81d0183d5a7b82fac854d8bf176abccf6d901b9fb5fd9158762a6962' \
  -H 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1ODMyMzQ1OTcsImlkIjoicSIsIm9yaWdfaWF0IjoxNTgzMjMwOTk3fQ.lYH8jHlatgfImJ98SbvOE5clov50Y76tpTXnJqiVCHc' 
```

### 响应示例
> 返回结果需从统一返回结果中的**data**字段中提取

```json
{
  	"blockHash":"", // 当前区块哈希
	"blockHeight":1, // 当前区块高度
	"previousBlockHash":"", // 前序区块哈希
	"dataHash":"", // 当前区块数据哈希
	"blockTime":"yyyy-mm-dd hh:MM:ss", // 区块创建时间
	"txs":[{
		"txId":"", // 交易ID
		"txTime":"", // 交易时间
		"envelopeInfo":{} // 交易内容 
	}] // 区块交易集合
}
```

## 根据交易ID查询交易信息
### 描述
根据交易ID查询交易信息
### 请求方法
GET
### 请求路径
/external/v1/channel/tx/txid
### 请求格式
QUERY
### 请求头
* Authorization: Bearer +登录接口返回的Token

### 请求参数
* channelId: 通道名称
* txId: 交易ID

### 请求示例
```
curl -X GET \
  'http://bc-oyw2mynhyj-peerft-0-FI.jvessel-public-stag2.jdcloud.com:80/external/v1/channel/tx/txid?channelId=mychannel&txId=9ad0ea1c81d0183d5a7b82fac854d8bf176abccf6d901b9fb5fd9158762a6962' \
  -H 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1ODMyMzQ1OTcsImlkIjoicSIsIm9yaWdfaWF0IjoxNTgzMjMwOTk3fQ.lYH8jHlatgfImJ98SbvOE5clov50Y76tpTXnJqiVCHc' 
```

### 响应示例
> 返回结果需从统一返回结果中的**data**字段中提取

```json
{
	"txId":"9ad0ea1c81d0183d5a7b82fac854d8bf176abccf6d901b9fb5fd9158762a6962", // 交易ID
	"txTime":"2020-03-03 06:12:13", // 交易时间
	"txStatus":0, // 交易状态，0有效
	"invokes":[{"args":["a","b"],"chaincode":"test","method":"put"}] // 交易内容
}
```

## IPFS文件上传
### 描述
往IPFS集群上传文件
### 请求方法
POST
### 请求路径
/external/v1/files/upload
### 请求格式
multipart/form-data
### 请求头
* Authorization: Bearer +登录接口返回的Token
* Content-Type: multipart/form-data
### 请求参数
* file: 文件

```json
curl -i -X POST \
    -H "Content-Type:multipart/form-data" \
    -H "Authorization:Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1OTA2NTUzNDYsImlkIjoiMTIzIiwib3JpZ19pYXQiOjE1OTA2NTE3NDZ9.sliHlgQkKMywB1VYxM_G1nwG0ZxzDJLGrc8iKgLw8w0" \
    -F "file=@\"./file.txt\";type=application/gzip;filename=\"file.txt\"" \
   'http://bc-6oebaqruiz-peerft-0-FI.jvessel-public-stag2.jdcloud.com/external/v1/files/upload'
```

### 相应示例
```json
{
	"code":200,
	"status":"ok",
	"data":"QmPFULsxciTq37P9qL24ttBSsCQ1YzH1VnkKgWrCEJizcn",
	"err_msg":""
}
```

## IPFS文件下载
### 描述
从IPFS集群下载文件
### 请求方法
GET
### 请求路径
/external/v1/files/download
### 请求格式
QUERY
### 请求头
* Authorization: Bearer +登录接口返回的Token
### 请求参数
* hashId: 上传时返回的IPFS哈希
* fileName: 保存的文件名

```
curl -i -X GET \
   -H "Authorization:Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1OTA3MjU0NTcsImlkIjoiMTIzIiwib3JpZ19pYXQiOjE1OTA3MjE4NTd9.H_nPesJM8mcQ2tMYBEeGOKwHQE0PigjmnEZ20ptBoNI" \
 'http://bc-qgrpi7heoh-peerft-0-FI.jvessel-public-stag2.jdcloud.com/external/v1/files/download?hashId=QmSAQam7ikKh2J1JCBfuZhbv1opCQRWuZacKK5ZbkHw4Yy&fileName=file.txt'
```