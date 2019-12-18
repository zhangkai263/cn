# uploadStamp


## 描述
上传印章

## 请求方式
POST

## 请求地址
https://cloudsign.jdcloud-api.com/v1/stamp


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**stampSpec**|[StampSpec](#stampspec)|True| | |

### <div id="stampspec">StampSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**stampContent**|String|False| |印章图片（base64）|
|**stampName**|String|False| |印章名称|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**stampId**|String|印章ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT FOUND|
