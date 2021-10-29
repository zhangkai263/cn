# changeMirageSetting


## 描述
自动优化移动设备上网站访问者的图像加载

## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$mirage

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
|**data**|[MirageImageOptimization](#mirageimageoptimization)| |
### <div id="MirageImageOptimization">MirageImageOptimization</div>
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
