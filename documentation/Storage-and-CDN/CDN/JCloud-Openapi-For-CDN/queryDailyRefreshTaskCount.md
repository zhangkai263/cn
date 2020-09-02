# queryDailyRefreshTaskCount


## 描述
查询刷新预热任务限额

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/task:count


## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](querydailyrefreshtaskcount#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**refreshAllCount**|Integer| |
|**prefetchAllCount**|Integer| |
|**dirAllCount**|Integer| |
|**refreshUsedCount**|Integer| |
|**prefetchUsedCount**|Integer| |
|**dirUsedCount**|Integer| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
