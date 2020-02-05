# queryAreaIspList


## 描述
查找地域运营商列表

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/console:areaIspList


## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](queryareaisplist#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**mainLand**|[AreaIspItem[]](queryareaisplist#areaispitem)|大陆城市|
|**overseas**|[AreaIspItem[]](queryareaisplist#areaispitem)|海外国家|
|**isp**|[AreaIspItem[]](queryareaisplist#areaispitem)|国内运营商|
|**gangaotai**|[AreaIspItem[]](queryareaisplist#areaispitem)|港澳台|
|**oceanica**|[AreaIspItem[]](queryareaisplist#areaispitem)|大洋洲国家|
|**southAmerica**|[AreaIspItem[]](queryareaisplist#areaispitem)|南美洲国家|
|**northAmerica**|[AreaIspItem[]](queryareaisplist#areaispitem)|北美洲国家|
|**asia**|[AreaIspItem[]](queryareaisplist#areaispitem)| |
|**europe**|[AreaIspItem[]](queryareaisplist#areaispitem)|欧洲国家|
### <div id="areaispitem">AreaIspItem</div>
|名称|类型|描述|
|---|---|---|
|**description**|String| |
|**code**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|