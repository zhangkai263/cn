# listVqdTemplates


## 描述
查询视频质检模板列表。
支持过滤查询：
  - templateId,eq 精确匹配模板ID，非必选


## 请求方式
GET

## 请求地址
https://vqd.jdcloud-api.com/v1/vqdTemplates


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认值为 1|
|**pageSize**|Integer|False|10|分页大小；默认值为 10；取值范围 [10, 100]|
|**filters**|[Filter[]](listvqdtemplates#filter)|False| | |

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤器属性名|
|**operator**|String|False| |过滤器操作符，默认值为 eq|
|**values**|String[]|True| |过滤器属性值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listvqdtemplates#result)|查询视频质检模板列表信息结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pageNumber**|Integer|当前页码|
|**pageSize**|Integer|每页数量|
|**totalElements**|Integer|查询总数|
|**totalPages**|Integer|总页数|
|**content**|[VqdTemplateObject[]](listvqdtemplates#vqdtemplateobject)|分页内容|
### <div id="vqdtemplateobject">VqdTemplateObject</div>
|名称|类型|描述|
|---|---|---|
|**templateId**|String|模板ID|
|**templateName**|String|模板名称。长度不超过128个字符。UTF-8编码。<br>|
|**threshold**|Double|缺陷判定时间阈值|
|**detections**|String[]|检测项列表|
|**createTime**|String|创建时间|
|**updateTime**|String|修改时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
GET
```
https://vqd.jdcloud-api.com/v1/vqdTemplates?pageNumber=1&pageSize=10

```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "content": [
            {
                "createTime": "2019-04-16T15:51:32Z", 
                "detections": [
                    "BlackScreen", 
                    "ColorCast"
                ], 
                "templateId": "10000", 
                "templateName": "模板-10000", 
                "threshold": "3.000", 
                "updateTime": "2019-04-16T15:51:32Z"
            }
        ], 
        "pageNumber": 1, 
        "pageSize": 10, 
        "totalElements": 100, 
        "totalPages": 10
    }
}
```
