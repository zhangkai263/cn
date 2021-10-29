# changeAutomaticHTTPSRewritesSetting


## 描述
为该域启用自动HTTPS重写功能。

## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$automatic_https_rewrites

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|String|False|True|on - 开启；off - 关闭|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](changeAutomaticHTTPSRewritesSetting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[ZoneSetting](changeAutomaticHTTPSRewritesSetting#zonesetting)| |
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
