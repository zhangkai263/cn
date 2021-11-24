# changeDevelopmentModeSetting


## 描述
如果你需要对你的网站进行修改，开发模式可以让你暂时进入网站的开发模式。这将绕过星盾的加速缓存，并降低您的网站速度。
但如果您正在对可缓存的内容（如图片、css 或 JavaScript）进行更改，并希望立即看到这些更改，这时就很有用。一旦进入，开发模式将持续3小时，然后自动切换关闭。


## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$development_mode

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
|**result**|[Result](changeDevelopmentModeSetting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[DevelopmentMode](changeDevelopmentModeSetting#developmentmode)| |
### <div id="developmentmode">DevelopmentMode</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|String|on - 开启；off - 关闭|
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|
|**time_remaining**|Number| |

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
