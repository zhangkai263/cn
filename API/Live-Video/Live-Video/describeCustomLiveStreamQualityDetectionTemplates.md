# describeCustomLiveStreamQualityDetectionTemplates


## 描述
查询直播质量检测模板列表

## 请求方式
GET

## 请求地址
https://live.jdcloud-api.com/v1/qualityDetectionCustoms


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNum**|Integer|False|1|页码<br>- 取值范围 [1, 100000]<br>|
|**pageSize**|Integer|False|10|分页大小<br>- 取值范围 [10, 100]<br>|
|**filters**|[Filter[]](#Filter)|False| |质量检测模板查询过滤条件<br>- name:   template 质量检测自定义名称<br>- value:  如果参数为空，则查询全部<br>|

### <a name="Filter">Filter</a>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String|requestId|

### <a name="Result">Result</a>
|名称|类型|描述|
|---|---|---|
|**pageNumber**|Integer|当前页码|
|**pageSize**|Integer|每页数量|
|**totalCount**|Integer|查询总数|
|**qualityDetectionTemplates**|[QualityDetectionTemplate[]](#QualityDetectionTemplate)|质量检测模板集合|
### <a name="QualityDetectionTemplate">QualityDetectionTemplate</a>
|名称|类型|描述|
|---|---|---|
|**template**|String|模板名称<br>|
|**modules**|String|检测项列表<br>|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
GET
```
https://live.jdcloud-api.com/v1/qualityDetectionCustoms?filters.1.name=template&filters.1.values.1=yourQualityDetectionTemplate
```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "pageNumber": 1, 
        "pageSize": 10, 
        "qualityDetectionTemplates": [
            {
                "modules": [
                    "blackScreen", 
                    "contrast"
                ], 
                "templateName": "my qd template"
            }
        ], 
        "totalCount": 1
    }
}
```
