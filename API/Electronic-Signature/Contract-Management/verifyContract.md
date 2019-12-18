# verifyContract


## 描述
验签已签章合同

## 请求方式
POST

## 请求地址
https://cloudsign.jdcloud-api.com/v1/contract/{contractId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**contractId**|String|True| |合同ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**contractVerifySpec**|[ContractVerifySpec](#contractverifyspec)|True| | |

### <div id="contractverifyspec">ContractVerifySpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**contractId**|String|False| |合同ID|
|**contractContent**|String|False| |合同文件（base64）|
|**checkCertChain**|Boolean|False| |是否验证证书链|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**verifyInfo**|[VerifyInfo](#verifyinfo)| |
### <div id="verifyinfo">VerifyInfo</div>
|名称|类型|描述|
|---|---|---|
|**success**|String|验签是否成功，true 成功 false 失败|
|**message**|String|验证消息|
|**stampResults**|[StampResult[]](#stampresult)|签章验证列表|
### <div id="stampresult">StampResult</div>
|名称|类型|描述|
|---|---|---|
|**verified**|Boolean|验证结果|
|**timestamp**|String|时间戳|
|**algorithm**|String|签名算法信息|
|**certInfo**|String|证书信息|
|**chainRootVerified**|Boolean|是否验证根证书|
|**subType**|String|子类型|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT FOUND|
