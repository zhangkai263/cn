# deleteDNSRecord


## 描述


## 请求方式
DELETE

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/dns_records/{identifier}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |
|**identifier**|String|True| | |

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](deleteDNSRecord#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
