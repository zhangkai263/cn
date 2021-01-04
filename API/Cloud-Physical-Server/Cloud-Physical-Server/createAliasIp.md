# createAliasIp


## 描述
添加别名IP

## 请求方式
PUT

## 请求地址
https://cps.jdcloud-api.com/v1/regions/{regionId}/aliasIps

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID，可调用接口（describeRegions）获取云物理服务器支持的地域|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**clientToken**|String|False| |由客户端生成，用于保证请求的幂等性，长度不能超过36个字符；<br/><br>如果多个请求使用了相同的clientToken，只会执行第一个请求，之后的请求直接返回第一个请求的结果<br/><br>|
|**aliasIpSpec**|[AliasIpSpec](createaliasip#aliasipspec)|True| |别名IP配置|

### <div id="aliasipspec">AliasIpSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceId**|String|False| |实例ID|
|**aliasIps**|[AliasIpInfo[]](createaliasip#aliasipinfo)|False| |别名IP配置|
### <div id="aliasipinfo">AliasIpInfo</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**id**|String|False| |主CIDR或次要CIDR id|
|**cidr**|String|False| |cidr段|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createaliasip#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**successList**|[AliasIpSuccessInfo[]](createaliasip#aliasipsuccessinfo)| |
|**errorList**|[AliasIpErrorInfo[]](createaliasip#aliasiperrorinfo)| |
### <div id="aliasiperrorinfo">AliasIpErrorInfo</div>
|名称|类型|描述|
|---|---|---|
|**cidr**|String|cidr段|
|**message**|String|错误信息|
### <div id="aliasipsuccessinfo">AliasIpSuccessInfo</div>
|名称|类型|描述|
|---|---|---|
|**aliasIpId**|String|别名IP ID|
|**cidr**|String|cidr段|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad request|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
