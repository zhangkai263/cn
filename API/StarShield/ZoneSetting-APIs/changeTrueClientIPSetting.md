# changeTrueClientIPSetting


## 描述
允许客户继续在我们发送给源的头中使用真正的客户IP。这只限于企业级域。

## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$true_client_ip_header

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|String|False| |on - 开启；off - 关闭|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[ZoneSetting](#zonesetting)| |
### <div id="ZoneSetting">ZoneSetting</div>
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
