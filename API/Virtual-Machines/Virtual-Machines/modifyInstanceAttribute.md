# modifyInstanceAttribute


## 描述

修改一台云主机的属性。

详细操作说明请参考帮助文档：
[修改实例名称](https://docs.jdcloud.com/cn/virtual-machines/modify-instance-name)
[自定义数据](https://docs.jdcloud.com/cn/virtual-machines/userdata)
[实例元数据](https://docs.jdcloud.com/cn/virtual-machines/instance-metadata)

## 接口说明
- 支持修改实例的名称、描述、hostname、自定义脚本、自定义元数据。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:modifyInstanceAttribute

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**name**|String|否|test|实例名称。长度为2\~128个字符，只允许中文、数字、大小写字母、英文下划线（\_）、连字符（-）及点（.），不能以（.）作为首尾。<br>|
|**description**|String|否| |实例描述。256字符以内。<br>|
|**hostname**|String|否|test|实例hostname。<br>**Windows系统**：长度为2\~15个字符，允许大小写字母、数字或连字符（-），不能以连字符（-）开头或结尾，不能连续使用连字符（-），也不能全部使用数字。不支持点号（.）。<br>**Linux系统**：长度为2-64个字符，允许支持多个点号，点之间为一段，每段允许使用大小写字母、数字或连字符（-），但不能连续使用点号（.）或连字符（-），不能以点号（.）或连字符（-）开头或结尾。<br>|
|**metadata**|[Metadata[]](modifyInstanceAttribute#user-content-metadata)|否| |用户自定义元数据。<br>以 `key-value` 键值对形式指定，可在实例系统内通过元数据服务查询获取。最多支持40对键值对，且 `key` 不超过256字符，`value` 不超过16KB，不区分大小写。<br>注意：`key` 不要以连字符(-)结尾，否则此 `key` 不生效。<br>|
|**userdata**|[Userdata[]](modifyInstanceAttribute#user-content-userdata)|否| |自定义脚本。<br>目前仅支持启动脚本，即 `launch-script`，须Base64编码且编码前数据长度不能超过16KB。<br>**linux系统**：支持bash和python，编码前须分别以 `#!/bin/bash` 和 `#!/usr/bin/env python` 作为内容首行。<br>**Windows系统**：支持 bat 和 powershell ，编码前须分别以`<cmd>、</cmd>`和`<powershell>、</powershell>`作为内容首、尾行。<br>|

### <div id="user-content-userdata">Userdata</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**key**|String|否|launch-script|脚本类型，当前仅支持输入 `launch-script`，即启动脚本。|
|**value**|String|否|IyEvYmluL2Jhc2gKZWNobyAnMTIzJw|脚本内容，须 `Base64` 编码，且编码前长度不能超过16KB。|

### <div id="user-content-metadata">Metadata</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**key**|String|否|index|key，字符长度不超过256，支持全字符。不能以连字符(-)结尾，否则此key不生效。|
|**value**|String|否|1|value，字符长度不超过16KB，支持全字符。|

## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
POST

```
/v1/regions/cn-north-1/instances/i-eumm****d6:modifyInstanceAttribute
{
    "name":"test",
    "description" : "test"
}
```



## 返回示例
```
{
    "requestId": "a0633f72670e59f8c6db36b1ee257011"
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|INVALID_ARGUMENT|There are no modifiable properties in the parameter|未指定任何可修改的属性。|
|**400**|INVALID_ARGUMENT|Add metadata key-value count more than xx pairs.|metadata数量超出规定范围。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
