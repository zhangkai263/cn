# changeMaxUploadSetting


## 描述
变更上传文件的最大值

## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$max_upload

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|Number|False| | |


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[MaxUpload](#maxupload)| |
### <div id="MaxUpload">MaxUpload</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|Number| |
|**editable**|Boolean| |
|**modified_on**|String|上次修改此设置的时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
