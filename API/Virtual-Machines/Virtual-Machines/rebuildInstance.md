# rebuildInstance


## 描述

重置云主机系统。

需要注意的是，重装系统会导致系统盘的内容全部丢失，数据盘的数据不受影响（但需要重新识别）。因此，在需要保留系统运行数据的情况下，强烈建议您在重置系统前制作私有镜像，之后重置时选择该私有镜像即可实现保留系统运行数据。

详细操作说明请参考帮助文档：[重置系统](https://docs.jdcloud.com/cn/virtual-machines/rebuild-instance)

## 接口说明
- 云主机的状态必须为 `stopped` 状态。
- 若实例基于私有镜像创建，而私有镜像已被删除，则无法使用原镜像重置系统，即无法恢复至刚创建时的系统状态，建议保留被实例引用的私有镜像。
- 重置系统需要重新指定密码，对于 `Linux` 系统您还可以重新指定 `SSH密钥`。
- 对于云盘作系统盘的实例，当前系统盘大小不能超过目标镜像对应系统盘快照的容量。
- 云主机系统盘类型必须与待更换镜像支持的系统盘类型保持一致，若当前云主机系统盘为 `local` 类型，则更换镜像的系统盘类型必须为 `loaclDisk` 类型；同理，若当前云主机系统盘为 `cloud` 类型，则更换镜像的系统盘类型必须为 `cloudDisk` 类型。可查询 [DescribeImages](https://docs.jdcloud.com/virtual-machines/api/describeimages) 接口获得指定地域的镜像信息。
- 指定的镜像必须能够支持当前主机的实例规格 `instanceType`，否则会返回错误。可查询 [DescribeImageConstraints](docs.jdcloud.com/virtual-machines/api/describeimageconstraints) 接口获得指定镜像支持的系统盘类型信息。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:rebuildInstance

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**password**|String|否|Instance@010|实例密码。<br>可用于SSH登录和VNC登录。<br>长度为8\~30个字符，必须同时包含大、小写英文字母、数字和特殊符号中的三类字符。特殊符号包括：`\(\)\`~!@#$%^&\*\_-+=\|{}\[ ]:";'<>,.?/，`。<br>更多密码输入要求请参见 [公共参数规范](https://docs.jdcloud.com/virtual-machines/api/general_parameters)。<br>|
|**imageId**|String|否|img-m5s0****29|镜像ID。<br>若不指定镜像ID，默认使用当前主机的原镜像重置系统。<br>可查询 [DescribeImages](https://docs.jdcloud.com/virtual-machines/api/describeimages) 接口获得指定地域的镜像信息。<br>|
|**keyNames**|String[]|否| |密钥对名称。仅Linux系统下该参数生效，当前仅支持输入单个密钥。<br>|
|**hostname**|String|否| |实例hostname。<br>若不指定hostname，则默认以实例名称`name`作为hostname，但是会以RFC 952和RFC 1123命名规范做一定转义。<br>**Windows系统**：长度为2\~15个字符，允许大小写字母、数字或连字符（-），不能以连字符（-）开头或结尾，不能连续使用连字符（-），也不能全部使用数字。不支持点号（.）。<br>**Linux系统**：长度为2-64个字符，允许支持多个点号，点之间为一段，每段允许使用大小写字母、数字或连字符（-），但不能连续使用点号（.）或连字符（-），不能以点号（.）或连字符（-）开头或结尾。<br>|
|**metadata**|[Metadata[]](#metadata)|否| |用户自定义元数据。<br>以 `key-value` 键值对形式指定，可在实例系统内通过元数据服务查询获取。最多支持40对键值对，且 `key` 不超过256字符，`value` 不超过16KB，不区分大小写。<br>注意：`key` 不要以连字符(-)结尾，否则此 `key` 不生效。<br>|
|**userdata**|[Userdata[]](#userdata)|否| |自定义脚本。<br>目前仅支持启动脚本，即 `launch-script`，须Base64编码且编码前数据长度不能超过16KB。<br>**linux系统**：支持bash和python，编码前须分别以 `#!/bin/bash` 和 `#!/usr/bin/env python` 作为内容首行。<br>**Windows系统**：支持 bat 和 powershell ，编码前须分别以`<cmd>、</cmd>`和`<powershell>、</powershell>`作为内容首、尾行。<br>|

### <div id="Userdata">Userdata</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**key**|String|否|launch-script|脚本类型，当前仅支持输入 `launch-script`，即启动脚本。|
|**value**|String|否|IyEvYmluL2Jhc2gKZWNobyAnMTIzJw|脚本内容，须 `Base64` 编码，且编码前长度不能超过16KB。|
### <div id="Metadata">Metadata</div>
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
/v1/regions/cn-north-1/instances/i-eumm****d6:rebuildInstance
{
    "imageId" : "img-m5s0****29",
    "password" : "xxx"
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
|**400**|INVALID_ARGUMENT|Invalid password|密码不符合规范。|
|**400**|FAILED_PRECONDITION|Conflict with underlay task 'xx'|云主机实例正在执行其它任务，请稍后再试。|
|**400**|FAILED_PRECONDITION|Invalid instance status 'xx'|错误的云主机状态。|
|**404**|NOT_FOUND|System disk not found|云主机没有挂载系统盘。|
|**404**|FAILED_PRECONDITION|Invalid system disk mount state|云主机系统盘挂载状态异常。|
|**400**|FAILED_PRECONDITION|Please stop the instance first.|需要将云主机实例关机再操作。|
|**400**|FAILED_PRECONDITION|Image constraints. Only support cloud system disk|本地系统盘云主机选择了云盘系统盘的镜像。|
|**400**|FAILED_PRECONDITION|Image constraints. Only support local system disk|云盘系统盘云主机选择了本地系统盘的镜像。|
|**400**|FAILED_PRECONDITION|Image constraints. Doesn't support instanceType 'xx'|镜像不支持这个实例规格。|
|**400**|FAILED_PRECONDITION|The image is not consistent with the system disk encryption properties.|云盘系统盘与镜像系统盘的加密属性不一致。|
|**400**|FAILED_PRECONDITION|instanceType is not supported when using xx.|当前云主机实例规格不支持某种场景。|
|**400**|OUT_OF_RANGE|NewSysDiskSizeGB out of range. Less than the image system disk capacity.|系统盘大小不能小于镜像系统盘大小。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**404**|NOT_FOUND|Keypair 'xx' not found|密钥不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
