# changeMobileRedirectSetting


## 描述
自动将移动设备上的访问者重定向到一个移动优化的子域上

## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$mobile_redirect

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|[Value_0](#value_0)|False| | |

### <div id="Value_0">Value_0</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**status**|String|False| |是否启用移动重定向|
|**mobile_subdomain**|String|False| |你希望将移动设备上的访客重定向到哪个子域前缀（子域必须已经存在）。|
|**strip_uri**|Boolean|False| |是放弃当前页面路径并重定向到移动子域的URL根，还是保留路径并重定向到移动子域的同一页面|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[MobileRedirect](#mobileredirect)| |
### <div id="MobileRedirect">MobileRedirect</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|[Value_0](#value_0)| |
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|
### <div id="Value_0">Value_0</div>
|名称|类型|描述|
|---|---|---|
|**status**|String|是否启用移动重定向|
|**mobile_subdomain**|String|你希望将移动设备上的访客重定向到哪个子域前缀（子域必须已经存在）。|
|**strip_uri**|Boolean|是放弃当前页面路径并重定向到移动子域的URL根，还是保留路径并重定向到移动子域的同一页面|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
