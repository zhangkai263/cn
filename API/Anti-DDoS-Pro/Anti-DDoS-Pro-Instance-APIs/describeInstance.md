# describeInstance


## 描述
查询实例

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |实例 ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstance#result)| |
|**requestId**|String| |
|**error**|[Error](describeinstance#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](describeinstance#err)| |
### <div id="err">Err</div>
|名称|类型|描述|
|---|---|---|
|**code**|Long|同http code|
|**details**|Object| |
|**message**|String| |
|**status**|String|具体错误|
### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[Instance](describeinstance#instance)| |
### <div id="instance">Instance</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|实例 ID|
|**name**|String|实例名称|
|**carrier**|Integer|链路类型. <br>- 1: 电信<br>- 3: 电信、联通和移动<br>- 4: BGP 线路|
|**ipType**|Integer|可防护 IP 类型, 目前仅电信线路支持 IPV6 线路. <br>- 0: IPV4. <br>- 1: IPV4/IPV6|
|**ipCount**|Integer|IP 数量|
|**portCount**|Integer|可配的转发端口数量|
|**domainCount**|Integer|可配的网站规则域名数量|
|**elasticTriggerCount**|Integer|触发弹性带宽的次数|
|**abovePeakCount**|Integer|超峰次数|
|**inBitslimit**|Integer|保底带宽|
|**resilientBitslimit**|Integer|弹性带宽|
|**businessBitslimit**|Integer|业务带宽大小|
|**ccThreshold**|Integer|CC 阈值大小|
|**ccPeakQPS**|Integer|CC 防护峰值, 单位: QPS|
|**ruleCount**|Integer|非网站类规则数|
|**webRuleCount**|Integer|网站类规则数|
|**dispatchRuleCount**|Integer|防护调度规则数|
|**chargeStatus**|String|计费状态. <br>- PAID: 已支付<br>- ARREARS: 欠费<br>- EXPIRED: 过期|
|**securityStatus**|String|安全状态. <br>- SAFE: 安全<br>- CLEANING: 清洗中<br>- BLOCKING: 封禁中|
|**createTime**|String|实例的创建的时间|
|**expireTime**|String|实例的过期时间|
|**resourceId**|String|资源 ID, 升级和续费时使用|
|**ccObserveMode**|Integer|CC 防护观察者模式. <br>- 0: 关闭 <br>- 1: 开启|
|**ccProtectMode**|Integer|CC 防护模式. <br>- 0: 正常 <br>- 1: 紧急 <br>- 2: 宽松 <br>- 3: 自定义|
|**ccProtectStatus**|Integer|CC 开关状态. <br>- 0: 关闭 <br>- 1: 开启|
|**ccSpeedLimit**|Integer|CC 防护模式为自定义时的限速大小|
|**ccSpeedPeriod**|Integer|CC 防护模式为自定义时的限速周期|
|**ipBlackList**|String[]|IP 黑名单列表|
|**ipBlackStatus**|Integer|IP 黑名单状态. <br>- 0: 关闭 <br>- 1: 开启|
|**ipWhiteList**|String[]|IP 白名单列表|
|**ipWhiteStatus**|Integer|IP 白名单状态. <br>- 0: 关闭<br>- 1: 开启|
|**urlWhitelist**|String[]|url白名单列表|
|**urlWhitelistStatus**|Integer|url白名单状态. <br>- 0: 关闭<br>- 1: 开启|
|**hostQps**|Integer|ccProtectMode为自定义模式时, 每个Host的防护阈值|
|**hostUrlQps**|Integer|ccProtectMode为自定义模式时, 每个Host+URI的防护阈值|
|**ipHostQps**|Integer|ccProtectMode为自定义模式时, 每个源IP对Host的防护阈值|
|**ipHostUrlQps**|Integer|ccProtectMode为自定义模式时, 每个源IP对Host+URI的防护阈值|
|**pageId**|String|关联的自定义页面id|
|**pageName**|String|关联的自定义页面名称|
|**pageStatus**|Integer|是否开启自定义页面, 关闭时透传状态码.  <br>- 0: 关闭<br>- 1: 开启|
|**webRulePortLimit**|Integer|每条网站规则可配的http/https端口数|
|**tags**|[Tag[]](describeinstance#tag)|Tag信息|
### <div id="tag">Tag</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|Tag键|
|**value**|String|Tag值|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
