# getPolishSetting


## 描述
剥离元数据并压缩你的图像，以加快页面加载时间。
Basic（无损），减少PNG、JPEG和GIF文件的大小 - 对视觉质量没有影响。
Basic+JPEG（有损），进一步减少JPEG文件的大小，以加快图像加载。
较大的JPEG文件被转换为渐进式图像，首先加载较低分辨率的图像，最后是较高的分辨率版本。
不建议用于高像素的摄影网站。


## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$polish

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
|**data**|[PolishImageOptimization](#polishimageoptimization)| |
### <div id="PolishImageOptimization">PolishImageOptimization</div>
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
