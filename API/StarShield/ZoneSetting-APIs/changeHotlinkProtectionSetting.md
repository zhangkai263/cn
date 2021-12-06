# changeHotlinkProtectionSetting


## 描述
启用后，热链路保护选项可确保其他网站无法通过建立使用您网站上托管的图像的页面来占用您的带宽。只要您的网站上的图像请求被星盾选中，我们就会检查以确保这不是其他网站在请求它们。
人们仍然能够从你的网页上下载和查看图像，但其他网站将无法窃取它们用于自己的网页。


## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$hotlink_protection

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
|**result**|[Result](changeHotlinkProtectionSetting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[HotlinkProtection](changeHotlinkProtectionSetting#hotlinkprotection)| |
### <div id="hotlinkprotection">HotlinkProtection</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|String|on - 开启；off - 关闭|
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
