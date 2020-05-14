# countImageStyle


## 描述
图片样式总数

## 请求方式
GET

## 请求地址
https://mps.jdcloud-api.com/v1/regions/{regionId}/buckets/{bucketName}/imageStyles/count

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域ID|
|**bucketName**|String|True| |Bucket名称|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**styleName**|String|False| |按样式名称查询|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](user-content-countimagestyle#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**imageStyleCount**|[ImageStyleCount](user-content-countimagestyle#imagestylecount)| |
### <div id="imagestylecount">ImageStyleCount</div>
|名称|类型|描述|
|---|---|---|
|**styleCount**|Integer|图片样式总数|

## 返回码
|返回码|描述|
|---|---|
|**200**|success|
