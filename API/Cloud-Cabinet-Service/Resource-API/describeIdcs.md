# describeIdcs


## 描述
查询IDC机房列表

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/idcs


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1|
|**pageSize**|Integer|False|20|分页大小，默认为20|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeidcs#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**idcs**|[Idc[]](describeidcs#idc)|IDC机房列表|
|**pageNumber**|Integer|页码|
|**pageSize**|Integer|分页大小|
|**totalCount**|Integer|总数量|
### <div id="idc">Idc</div>
|名称|类型|描述|
|---|---|---|
|**idc**|String|机房英文标识|
|**idcName**|String|机房名称|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
