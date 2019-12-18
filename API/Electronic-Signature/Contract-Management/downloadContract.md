# downloadContract


## 描述
下载已签章的合同

## 请求方式
GET

## 请求地址
https://cloudsign.jdcloud-api.com/v1/contract/{contractId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**contractId**|String|True| |合同ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**contractInfo**|[ContractInfo](#contractinfo)| |
### <div id="contractinfo">ContractInfo</div>
|名称|类型|描述|
|---|---|---|
|**contractId**|String|合同ID|
|**contractTitle**|String|合同标题|
|**stampNames**|String[]|印章名称(可能有多个印章)|
|**contractContent**|String|合同文件（base64）|
|**contractDigest**|String|合同文件摘要|
|**createTime**|String|合同签章时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT FOUND|
