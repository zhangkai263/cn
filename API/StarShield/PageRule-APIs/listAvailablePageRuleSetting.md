# listAvailablePageRuleSetting


## 描述


## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/pagerules$$settings

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listAvailablePageRuleSetting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[AvailablePageRule[]](listAvailablePageRuleSetting#availablepagerule)| |
### <div id="availablepagerule">AvailablePageRule</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|设置名称|
|**properties**|String[]|值的类型|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
