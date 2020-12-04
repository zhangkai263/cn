# queryAvgbandwidth


## 描述
增加平均带宽展示

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/console:avgbandwidth


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**domain**|String|False| |需要查询的域名, 必须为用户pin下有权限的域名|
|**area**|String|False| | |
|**isp**|String|False| | |
|**abroad**|Boolean|False| |true 代表查询境外数据，默认false查询境内数据|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**avgbandwidth**|Integer| |
|**bandwidth_95**|Double| |
|**show**|Boolean| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
