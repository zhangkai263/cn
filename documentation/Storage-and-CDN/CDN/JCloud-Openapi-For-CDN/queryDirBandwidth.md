# queryDirBandwidth


## 描述
查询目录带宽，仅有部分用户支持该功能

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/statistics:queryDirBandwidth


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**domain**|String|True| |需要查询的域名, 必须为用户pin下有权限的域名，该接口仅支持单域名查询|
|**dirs**|String|False| |需要过滤的目录|
|**regions**|String|False| |需要过滤的地区|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**domain**|String| |
|**datas**|[DirBandwidthItem[]](#dirbandwidthitem)| |
### <div id="DirBandwidthItem">DirBandwidthItem</div>
|名称|类型|描述|
|---|---|---|
|**startTime**|String|UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**dirs**|[DirData[]](#dirdata)| |
### <div id="DirData">DirData</div>
|名称|类型|描述|
|---|---|---|
|**dir**|String|目录名称|
|**bandwidth**|Long|汇总后的目录带宽|
|**regions**|[DirRegionData[]](#dirregiondata)| |
### <div id="DirRegionData">DirRegionData</div>
|名称|类型|描述|
|---|---|---|
|**region**|String|地区名称|
|**bandwidth**|Long|各地区的目录带宽|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
