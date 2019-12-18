# uploadTemplate


## 描述
上传合同模板

## 请求方式
POST

## 请求地址
https://cloudsign.jdcloud-api.com/v1/template


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**templateSpec**|[TemplateSpec](#templatespec)|True| | |

### <div id="templatespec">TemplateSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**templateContent**|String|False| |合同模板文件（base64）|
|**templateName**|String|False| |合同模板名称|
|**templateTitle**|String|False| |合同模板标题|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**templateId**|String|合同模板ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT FOUND|
