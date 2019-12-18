# downloadStamp


## 描述
下载印章

## 请求方式
GET

## 请求地址
https://cloudsign.jdcloud-api.com/v1/stamp/{stampId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**stampId**|String|True| |印章ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**stampInfo**|[StampInfo](#stampinfo)| |
### <div id="stampinfo">StampInfo</div>
|名称|类型|描述|
|---|---|---|
|**stampId**|String|印章ID|
|**stampName**|String|印章名称|
|**stampContent**|String|印章图片（base64）|
|**stampDigest**|String|印章摘要|
|**createTime**|String|印章上传时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT FOUND|
