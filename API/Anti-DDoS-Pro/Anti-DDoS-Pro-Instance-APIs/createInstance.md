# createInstance


## 描述
新购或升级高防实例

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**createInstanceSpec**|[CreateInstanceSpec](createinstance#createinstancespec)|True| |新购或升级实例请求参数|
|**autoRenewalSpec**|[AutoRenewalSpec](createinstance#autorenewalspec)|False| |自动续费配置, 默认不开通, 仅新购实例时可设置|

### <div id="autorenewalspec">AutoRenewalSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**autoRenewalEnable**|Boolean|True| |是否开通自动续费, true: 开通自动续费, false: 不开通自动续费|
|**timeSpan**|Integer|False| |购买时长, 开通自动续费时必传. <br>- timeUnit 为 3 时, 可取值 1-9<br>- timeUnit 为 4 时, 可取值 1-3|
|**timeUnit**|Integer|False| |自动续费时长类型, 开通自动续费时必传. <br>- 3: 月<br>- 4: 年|
### <div id="createinstancespec">CreateInstanceSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**id**|String|False| |实例 Id, 升级时必传|
|**name**|String|False| |实例名称, 新购时必传|
|**buyType**|Integer|True| |购买类型. <br>- 1: 新购<br>- 3: 升级|
|**carrier**|Integer|True| |链路类型. <br>- 3: 电信、联通和移动<br>- 4: BGP 线路|
|**ipType**|Integer|False| |可防护 ip 类型, 目前仅电信线路支持 IPV6 线路<br>- 0: IPV4,<br>- 1: IPV4/IPV6|
|**ipCount**|Integer|False| |IP 数量|
|**portCount**|Integer|False| |可配的转发端口数量|
|**domainCount**|Integer|False| |可配的网站规则域名数量|
|**bp**|Integer|True| |保底带宽: 单位 Gbps|
|**ep**|Integer|True| |弹性带宽: 单位 Gbps|
|**bw**|Integer|True| |业务带宽: 单位 Mbps|
|**timeSpan**|Integer|False| |购买时长, 新购高防实例时必传<br>- timeUnit 为 3 时, 可取值 1-9<br>- timeUnit 为 4 时, 可取值 1-3|
|**timeUnit**|Integer|False| |购买时长类型, 新购高防实例时必传<br>- 3: 月<br>- 4: 年|
|**returnUrl**|String|False| |支付成功后跳转的页面, 控制台交互模式传该字段|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createinstance#result)| |
|**requestId**|String| |
|**error**|[Error](createinstance#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](createinstance#err)| |
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
|**code**|Integer|0: 新购或升级实例失败, 1: 新购或升级实例成功|
|**message**|String|新购或升级成功时为 订单 id, 创建实例失败时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
