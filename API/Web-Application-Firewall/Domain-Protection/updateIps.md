# updateIps


## 描述
更新网站黑白名单ip配置

## 请求方式
POST

## 请求地址
https://waf.jdcloud-api.com/v1/regions/{regionId}/wafInstanceIds/{wafInstanceId}/userdefine:updateIps

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |实例所属的地域ID|
|**wafInstanceId**|String|True| |实例Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**req**|[SetIpReq](updateips#setipreq)|True| |请求|
|**content-language**|String|True| |语言，"en":英文，"zh":中文|

### <div id="setipreq">SetIpReq</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**wafInstanceId**|String|True| |WAF实例id|
|**domain**|String|True| |域名|
|**iswhite**|Integer|False| |0表示黑名单，1表示白名单|
|**ips**|[IpCfg[]](updateips#ipcfg)|True| |ip配置|
### <div id="ipcfg">IpCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**id**|Integer|False| |序号id,更新时需要|
|**val**|String|True| |支持 ipv4/8 ipv4/16 ipv4/24 ipv4/32 ipv6/64|
|**atCfg**|[AtCfg](updateips#atcfg)|True| |action配置|
### <div id="atcfg">AtCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**denyAction**|[DenyActionCfg](updateips#denyactioncfg)|False| |黑名单动作配置|
|**skipAction**|[SkipActionCfg](updateips#skipactioncfg)|False| |白名单动作配置|
### <div id="skipactioncfg">SkipActionCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**passAll**|Integer|True| |是否跳过所有阶段，1表示是，0表示否|
|**cc**|Integer|True| |是否执行cc防护，1表示是，0表示否|
|**waf**|Integer|True| |是否执行waf防护，1表示是，0表示否|
|**deny**|Integer|True| |是否执行deny防护，1表示是，0表示否|
|**rateLimit**|Integer|True| |是否执行限速，1表示是，0表示否|
|**bot**|Integer|True| |是否执行bot，1表示是，0表示否|
|**risk**|Integer|True| |是否执行风控，1表示是，0表示否|
### <div id="denyactioncfg">DenyActionCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**atOp**|Integer|True| |黑名单匹配动作类型 1-4 分别表示forbidden@1 redirect@2 verify@captcha3 verify@jscookie4 5-告警(自定义bot增加)，6-302cookie(自定义bot增加)|
|**atVal**|String|True| |黑名单匹配动作内容 当atOp为3/4时，atVal为空，atOp=1时，atVal为自定义页面,atOp=2时，atVal为跳转url。|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|此次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|BAD_REQUEST|
