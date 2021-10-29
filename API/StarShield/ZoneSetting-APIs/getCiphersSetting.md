# getCiphersSetting


## 描述
一个用于TLS终端的密码允许列表。这些密码必须是BoringSSL的格式。

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$ciphers

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|String[]| |

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
