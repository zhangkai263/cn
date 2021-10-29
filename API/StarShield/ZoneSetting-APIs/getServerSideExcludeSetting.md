# getServerSideExcludeSetting


## 描述
如果你的网站上有敏感的内容，你想让真正的访问者看到，但你想对可疑的访问者进行隐藏，你所要做的就是用星盾SSE标签来包装这些内容。
用下面的SSE标签包住任何你想不让可疑访客看到的内容，<!--sse--><!--/sse-->。
例如，<!--sse-->不好的访问者不会看到我的电话号码，555-555-5555<!--/sse-->。注意，SSE只对HTML起作用。
如果你启用了HTML最小化功能，当你的HTML源代码通过星盾提供服务时，你不会看到SSE标签。
在这种情况下，SSE 仍将发挥作用，因为星盾的 HTML 缩减和 SSE 功能是在资源通过我们的网络传输给我们时即时发生的。当资源通过我们的网络移动到访问者的计算机上时，SSE 仍会发挥作用。


## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$server_side_exclude

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
|**data**|[ServerSideExclude](#serversideexclude)| |
### <div id="ServerSideExclude">ServerSideExclude</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|ID of the zone setting|
|**value**|String|Value of the zone setting|
|**editable**|Boolean|Whether or not this setting can be modified for this zone (based on your JDC StarShield plan level)|
|**modified_on**|String|last time this setting was modified|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
