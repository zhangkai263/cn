# queryDomainAllConfigClassify


## 描述
查询域名的全部分类配置

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/domain/{domain}/queryDomainAllConfigClassify

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**configItems**|[ConfigItem[]](#configitem)| |
### <div id="ConfigItem">ConfigItem</div>
|名称|类型|描述|
|---|---|---|
|**configItemType**|String|配置项类型|
|**configItemName**|String|配置项名称|
|**configStatus**|Integer|配置状态|
|**configStatusName**|String|配置状态名|
|**configItemDetails**|Object|配置项细节,类型为Map<String,Object>|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
