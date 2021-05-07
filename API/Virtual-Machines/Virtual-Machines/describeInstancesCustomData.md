# describeInstancesCustomData


## 描述
批量查询云主机用户自定义元数据

## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instancesCustomData

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|10|分页大小；默认为10；取值范围[1, 10]|
|**filters**|[Filter[]](describeinstancescustomdata#filter)|False| |instanceId - 云主机ID，精确匹配，支持多个<br>privateIpAddress - 主网卡内网主IP地址，模糊匹配，支持多个<br>vpcId - 私有网络ID，精确匹配，支持多个<br>status - 云主机状态，精确匹配，支持多个，<a href="http://docs.jdcloud.com/virtual-machines/api/vm_status">参考云主机状态</a><br>imageId - 镜像ID，精确匹配，支持多个<br>networkInterfaceId - 弹性网卡ID，精确匹配，支持多个<br>subnetId - 子网ID，精确匹配，支持多个<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstancescustomdata#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**customData**|[CustomData[]](describeinstancescustomdata#customdata)| |
|**totalCount**|Number| |
### <div id="customdata">CustomData</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|云主机ID|
|**metadata**|[Metadata[]](describeinstancescustomdata#metadata)|自定义元数据信息 key-value键值对，key、value不区分大小写|
|**userdata**|[Userdata[]](describeinstancescustomdata#userdata)|自定义脚本，目前只支持"launch-script"，为首次启动脚本。vaule以base64编码返回|
### <div id="userdata">Userdata</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|键，当前仅支持launch-script|
|**value**|String|值，最大长度21848字符|
### <div id="metadata">Metadata</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|键，最大长度256字符，支持全字符|
|**value**|String|值，最大长度16k字符，支持全字符|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
