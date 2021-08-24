# describeInstanceTemplatesCustomdata


## 描述

查询实例模板上的自定义元数据。

详细操作说明请参考帮助文档：[实例模板](https://docs.jdcloud.com/cn/virtual-machines/instance-template-overview)

## 接口说明
- 一般情况下由于自定义元数据比较大，所以限制每次最多查询10个实例模板。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instanceTemplatesCustomData

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**filters**|[Filter[]](#filter)|否| |<b>filters 中支持使用以下关键字进行过滤</b><br>`instanceTemplateId`: 实例模板ID，精确匹配，最多支持10个<br>|

### <div id="Filter">Filter</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**name**|String|是| |过滤条件的名称|
|**operator**|String|否| |过滤条件的操作符，默认eq|
|**values**|String[]|是| |过滤条件的值|

## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**instanceTemplatesCustomData**|[InstanceTemplateCustomData[]](#instancetemplatecustomdata)| |自定义元数据列表。|
|**totalCount**|Number| |本次查询的总记录数。|
### <div id="InstanceTemplateCustomData">InstanceTemplateCustomData</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**id**|String|it-u3o8****yy|模板ID|
|**metadata**|[Metadata[]](#metadata)| |用户自定义元数据。<br>以key-value键值对形式指定，可在实例系统内通过元数据服务查询获取。最多支持40对键值对，且key不超过256字符，value不超过16KB，不区分大小写。<br>注意：key不要以连字符(-)结尾，否则此key不生效。<br>|
|**userdata**|[Userdata[]](#userdata)| |自定义脚本。<br>目前仅支持启动脚本，即 `launch-script`，须 `base64` 编码且编码前数据长度不能超过16KB。<br>**linux系统**：支持 `bash` 和 `python`，编码前须分别以 `#!/bin/bash` 和 `#!/usr/bin/env python` 作为内容首行。<br>**Windows系统**：支持 `bat` 和 `powershell`，编码前须分别以 `<cmd></cmd>和<powershell></powershell>` 作为内容首、尾行。|
### <div id="Userdata">Userdata</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**key**|String|launch-script|脚本类型，当前仅支持输入 `launch-script`，即启动脚本。|
|**value**|String|IyEvYmluL2Jhc2gKZWNobyAnMTIzJw|脚本内容，须 `Base64` 编码，且编码前长度不能超过16KB。|
### <div id="Metadata">Metadata</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**key**|String|index|key，字符长度不超过256，支持全字符。不能以连字符(-)结尾，否则此key不生效。|
|**value**|String|1|value，字符长度不超过16KB，支持全字符。|


## 请求示例
GET

```
/v1/regions/cn-north-1/instanceTemplatesCustomData?filters.1.name=instanceTemplateId&filters.1.values.1=it-u3o8****yy&filters.1.values.2=it-x8s0****43
```



## 返回示例
```
{
    "requestId": "c5a4274123a802cc4443004aa5709d44", 
    "result": {
        "instanceTemplatesCustomData": [
            {
                "id": "it-u3o8****yy", 
                "metadata": [
                    {
                        "key": "test", 
                        "value": "testvalue"
                    }, 
                    {
                        "key": "foo", 
                        "value": "bar"
                    }
                ], 
                "userdata": [
                    {
                        "key": "launch-script", 
                        "value": "IyEvYmluL2Jhc2g="
                    }
                ]
            }, 
            {
                "id": "it-x8s0****43", 
                "userdata": [
                    {
                        "key": "launch-script", 
                        "value": "IyEvYmluL2Jhc2ggCiBweXRob24gL3NvZnR3YXJlL3Nlc"
                    }
                ]
            }
        ], 
        "totalCount": 2
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|FAILED_PRECONDITION|describe instance_template_id count out of range|超出单次可查询的实例模板数量。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
