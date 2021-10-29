# changeEnableErrorPagesOnSetting


## 描述
星盾将代理源服务器上任何 502、504 错误的客户错误页面，而不是显示默认的星盾错误页面。这不适用于 522 错误，并且仅限于企业级域。


## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$origin_error_page_pass_thru

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
