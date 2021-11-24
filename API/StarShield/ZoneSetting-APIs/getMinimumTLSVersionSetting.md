# getMinimumTLSVersionSetting


## 描述
获取HTTPS请求允许使用的TLS协议的最低版本。例如，如果是TLS 1.1，那么TLS 1.0连接将被拒绝，而1.1、1.2和1.3（如果启用）将被允许。

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$min_tls_version

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getMinimumTLSVersionSetting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[ZoneSetting](getMinimumTLSVersionSetting#zonesetting)| |
### <div id="zonesetting">ZoneSetting</div>
|名称|类型|描述|
|---|---|---|
|**id**|String| |
|**modified_on**|String| |
|**editable**|Boolean| |
|**value**|Object| |

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
