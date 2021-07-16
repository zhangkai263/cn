# describeInstanceList


## 描述
获取数据库审计实例列表

## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|10|分页大小；默认为10；取值范围[10, 100]|
|**nameFilter**|String|False| |列表过滤条件：数据库审计名称|
|**filters**|[Filter[]](describeinstancelist#filter)|False| |按instanceId 过滤|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstancelist#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**totalCount**|Integer| |
|**list**|[InstanceAbstract[]](describeinstancelist#instanceabstract)|数据库审计实例列表|
### <div id="instanceabstract">InstanceAbstract</div>
|名称|类型|描述|
|---|---|---|
|**pin**|String|PIN|
|**insId**|String|实例ID|
|**insName**|String|实例名称,长度限制32字节,允许英文字母,数字,下划线,中划线和中文|
|**insDesc**|String|实例描述,长度限制128字节|
|**vpcId**|String|VPC-ID|
|**subnetId**|String|Subnet-ID|
|**ipAddr**|String|VPC内地址|
|**insType**|String|实例规格: basic:标准版 professional:企业版 enterprise:增强版 ultimate:旗舰版|
|**state**|Integer|实例状态: 1->创建中, 2->运行中, 3->已停止, 4->已欠费停服, 5->已删除, 6->异常|
|**expireTime**|String|计费到期时间|
|**billingType**|Integer|计费类型 1:按配置 2: 按用量 3:包年包月 4:一次性|
|**insZone**|String|可用区|
|**insRegion**|String|地域|
|**insDomain**|String|域名|
|**dbLimit**|Integer|数据库限额|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
