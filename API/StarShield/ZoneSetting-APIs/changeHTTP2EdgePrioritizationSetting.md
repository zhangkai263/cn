# changeHTTP2EdgePrioritizationSetting


## 描述
HTTP/2边缘优化，优化了通过HTTP/2提供的资源交付，提高了页面加载性能。当与Worker结合使用时，它还支持对内容交付的精细控制。


## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$h2_prioritization

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|String|False| |该设置的有效值|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](changeHTTP2EdgePrioritizationSetting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[HTTP2EdgePrioritization](changeHTTP2EdgePrioritizationSetting#http2edgeprioritization)| |
### <div id="http2edgeprioritization">HTTP2EdgePrioritization</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|String|该设置的有效值|
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
