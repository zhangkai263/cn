# getImageStyle


## 描述
图片样式详情

## 请求方式
GET

## 请求地址
https://mps.jdcloud-api.com/v1/regions/{regionId}/buckets/{bucketName}/imageStyles/{id}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域ID|
|**bucketName**|String|True| |Bucket名称|
|**id**|Long|True| |图片样式id|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](user-content-getimagestyle#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**imageStyle**|[ImageStyle](user-content-getimagestyle#imagestyle)| |
### <div id="imagestyle">ImageStyle</div>
|名称|类型|描述|
|---|---|---|
|**id**|Long|图片样式id(readOnly)|
|**userId**|String|用户id(readOnly)|
|**styleName**|String|图片样式名称|
|**params**|String|图片样式参数|
|**paramAlias**|String|图片样式参数别名|
|**regionId**|String|所属区域(readOnly)|
|**bucketName**|String|所属Bucket(readOnly)|
|**status**|Integer|图片样式状态(readOnly)|
|**modifyTime**|String|修改时间(readOnly)|
|**createdTime**|String|创建时间(readOnly)|

## 返回码
|返回码|描述|
|---|---|
|**200**|successful operation|
