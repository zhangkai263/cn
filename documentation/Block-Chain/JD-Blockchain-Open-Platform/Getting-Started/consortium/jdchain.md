
# JDChain API使用指南
智臻链BaaS平台JDChain企业组网提供两种应用接入方式：

* 使用JDChain官方提供的SDK直接与创建出来的区块链网络交互，具体参考[接入指南](http://ledger.jd.com/api.html)
* 使用平台提供的HTTP API接口，与JDChain区块链网络交互

本指南着重描述第二种接入方式。
> 注意：该版本的API接口暂未与京东云OPENAPI结合。且该文档仅适用于企业组网功能；

## 统一返回格式
现行API接口返回都统一返回如下格式：

### 接口执行成功

```json
{
   "code": 200,       // 执行状态码： 200 
   "expire": "2020-04-03T16:54:52+08:00",   // 有效期时间
   "token": "eyJhbGciOiJIUzI1NiIsInR5cC......",   // 登陆成功获取的token认证信息
}
```

### 接口执行失败

```json
{
   "code": 401,                  // 执行状态码：400或500等错误码，基本同http状态码
   "status": "fail",           // 状态短语字串：fail
   "data": null,                 // 出错返回时，data的具体值为null
   "message": "授权失败!",       // 状态详细信息字串：具体的错误信息
}
```

##  注册数据账户
### 描述
注册数据账户，调用合约时需事先指定数据账户。
### 请求方法
POST
### 请求路径
/rtmc/account/generateDataAccount
### 请求格式
JSON
### 请求参数
``` JSON
{ 
   "ledgerHash":"",  //"账本Hash",
   "gatewayIp": "",     //"gateway网关ip",
   "gatewayPort": "",    //"gateway网关port",
   "gatewaySecure":"",   //"gateway网关是否开启tls",
   "jdchainsdkUrl": "sdkIp:sdkPort" ,   //JDChainsdk的地址，形式是ip+port；
}

```

### 响应示例

```JSON
{
  "code": 200,
  "status": "ok",
  "data": {
    "pubkeyBase58": "7VeRHJoBy5AGSuhBPXQdq1A6kWwbP3gsZY5MzqQpZ7BuRM8Q", //base58格式公钥
    "privkeyBase58": "7VeRa2S9af7fhMMTaCYnBFcYZYjzfjPBdraPvu5c3edm9Xez",//base58格式私钥
    "addressBase58": "LdeNvpF53wcqS5xkxFhVvTMeuyJq34VyESddx" //base58格式数据账户地址
  },
  "err_msg": ""
}

```

## 上传合约
### 描述
rtmc调jdchaintools上传合约jar文件。
### 请求方法
POST
### 请求路径
/rtmc/contract/uploadContract
### 请求格式
FORM
### 请求参数
```form      
	"networkName": "网络名称",      // 创建区块链网络时定义的网络名称
	"ledgerName": "账本名称",      // 创建区块链网络时定义的账本名称
	"contractName": "合约名称",      // 定义该账本下的合约名称
	"version": "合约版本",      // 定义该合约的版本
```


### 响应示例
> 返回结果需从统一返回结果中的**data**字段中提取

```json
{
    "code": 200,   //执行状态码：400或500等错误码，基本同http状态码
    "msg": "成功",  // 返回信息
    "data": "success"  // 数据
}

```

## 发布合约
### 描述
rtmc调jdchaintools发布合约
### 请求方法
POST
### 请求路径
/rtmc/contract/publishContract
### 请求格式
JSON


### 请求参数
```json
{
    "networkName": "网络名称",
    "ledgerName": "账本名称",
    "contractName": "合约名称",
    "contractVersion": "合约版本",
    "gateway": { //gateway网关服务信息
        "ledgerHash": "j5sZLW2HNnx7TUNbUWtqZimKcx9Qhdn9Fm9y618wcjpkxb",
        "gatewayIp": "127.0.0.1",
        "gatewayPort": "18081",
        "gatewaySecure": "false",
        "jdchainsdkUrl": "jdchainsdk的请求地址，ip:port",
    }
}

```


### 响应示例
> 成功：返回头的状态码为：200，返回体的结构如下：
```json
{
    "code": 200,
    "msg": "成功",
    "data": {  //返回合约的公，私钥及地址信息
        "pubkeyBase58": "7VeRHM3UEtpX6QLqChNX2ji5Yh4D4x1Bi7X2mh754bZFtGqv",
        "privkeyBase58": "7VeRZQt9fS6vvoTSaG8pH3v4n3M7V91G7WC6HHKeT7tmtRRF",
        "addressBase58": "LdeNstUftMWDuJm6jUcwewGoPbCAaRBjgSByk"
    }
}
```

## 调用/查询合约
### 描述
rtmc调jdchaintools调用/查询合约
### 请求方法
POST
### 请求路径
/rtmc/contract/invokeContract
### 请求格式
JSON
### 请求头
* Authorization: Bearer +登录接口返回的Token

### 请求参数
```json
{
    "networkName":"网络名称",
    "ledgerName": "账本名称",
    "contractName": "合约名称",
    "contractVersion": "合约版本",
    "dataAddr": "数据账户Base58地址", 
    "contractAddr":"合约账户Base58地址",
    "key":"请求key键值",
    "val":"存储value值",
    "type":"rtmc调用类型(getval:查询;putval:调用)",
    "method":"调用合约方法(java为注解方法)",
    "gateway": {
        "ledgerHash": "j5sZLW2HNnx7TUNbUWtqZimKcx9Qhdn9Fm9y618wcjpkxb",
        "gatewayIp": "127.0.0.1",
        "gatewayPort": "18081",
        "gatewaySecure": "false",
        "jdchainsdkUrl": "jdchainsdk的请求地址，ip:port",
    }
}

```


### 响应示例
> 调用成功，返回体的结构如下：

```json
{
    "code": 200,
    "msg": "success",
    "data": {
    "algorithm": 8216,
    "rawDigest": "NUSllIjACZd4a9VYflfoMoNaW7hVmAryQMgdLSp28Tg="
  }
}  
```
> 查询成功，返回体的结构如下：
```json
{
    "code": 200,
    "msg": "success",
    "data": "结果值"
}
