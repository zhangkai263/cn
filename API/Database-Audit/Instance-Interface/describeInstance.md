# describeInstance


## 描述
获取数据库审计实例详情

## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances/{insId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**insId**|String|True| |审计实例ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstance#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceAbstract**|[InstanceAbstract](describeinstance#instanceabstract)| |
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
