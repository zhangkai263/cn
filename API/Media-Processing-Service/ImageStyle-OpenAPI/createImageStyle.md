# createImageStyle


## 描述
添加图片样式

## 请求方式
POST

## 请求地址
https://mps.jdcloud-api.com/v1/regions/{regionId}/buckets/{bucketName}/imageStyles

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域ID|
|**bucketName**|String|True| |Bucket名称|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**id**|Long|False| |图片样式id(readOnly)|
|**userId**|String|False| |用户id(readOnly)|
|**styleName**|String|False| |图片样式名称|
|**params**|String|False| |图片样式参数|
|**paramAlias**|String|False| |图片样式参数别名|
|**regionId**|String|False| |所属区域(readOnly)|
|**bucketName**|String|False| |所属Bucket(readOnly)|
|**status**|Integer|False|1|图片样式状态(readOnly)|
|**modifyTime**|String|False| |修改时间(readOnly)|
|**createdTime**|String|False| |创建时间(readOnly)|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](user-content-createimagestyle#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**imageStyleID**|[ImageStyleID](user-content-createimagestyle#imagestyleid)| |
### <div id="imagestyleid">ImageStyleID</div>
|名称|类型|描述|
|---|---|---|
|**id**|Long|图片样式ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|success|
