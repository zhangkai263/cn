# lastDownsample


## 描述
查看某资源的最后一个监控数据点

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/idcs/{idc}/metrics/{metric}/lastDownsample

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**idc**|String|True| |机房名称（英文标识）|
|**metric**|String|True| |监控项英文标识(id)|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**resourceId**|String|True| |资源ID，支持多个resourceId批量查询，每个id用竖线 | 分隔|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String| |

### Result
|名称|类型|描述|
|---|---|---|
|**items**|LastDownsampleRespItem[]| |
### LastDownsampleRespItem
|名称|类型|描述|
|---|---|---|
|**metric**|String|监控项英文标识|
|**resourceId**|String|资源ID|
|**value**|Double|采样值|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
