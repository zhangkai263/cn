# listIps


## 描述
获取网站黑白名单ip配置

## 请求方式
POST

## 请求地址
https://waf.jdcloud-api.com/v1/regions/{regionId}/wafInstanceIds/{wafInstanceId}/userdefine:listIps

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |实例所属的地域ID|
|**wafInstanceId**|String|True| |实例Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**req**|[ListDenySkipRulesReq](listips#listdenyskiprulesreq)|True| |请求|
|**content-language**|String|True| |语言，"en":英文，"zh":中文|

### <div id="listdenyskiprulesreq">ListDenySkipRulesReq</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**wafInstanceId**|String|True| |WAF实例id|
|**domain**|String|True| |域名|
|**iswhite**|Integer|True| |0表示黑名单 1表示白名单|
|**pageIndex**|Integer|False| |页码，[1-100]，默认是1|
|**pageSize**|Integer|False| |页大小，[1-100]，默认是10|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listips#result)| |
|**requestId**|String|此次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**wafInstanceId**|String|实例id|
|**domain**|String|域名|
|**iswhite**|String|0表示黑名单 1表示白名单|
|**pageIndex**|Integer|页码，[1-100]|
|**pageSize**|Integer|页大小，[1-100]|
|**count**|Integer|总数|
|**data**|[IpListCfg](listips#iplistcfg)|网站过滤器status配置|
### <div id="iplistcfg">IpListCfg</div>
|名称|类型|描述|
|---|---|---|
|**id**|Integer|序号id|
|**updateTime**|String|规则更新时间，秒级时间戳, 0 表示历史数据无记录|
|**disable**|Integer|0-使用中 1-禁用|
|**ip**|String|支持 ipv4/8 ipv4/16 ipv4/24 ipv4/32 ipv6/64|
|**atCfg**|[AtCfg](listips#atcfg)|action配置|
### <div id="atcfg">AtCfg</div>
|名称|类型|描述|
|---|---|---|
|**denyAction**|[DenyActionCfg](listips#denyactioncfg)|黑名单动作配置|
|**skipAction**|[SkipActionCfg](listips#skipactioncfg)|白名单动作配置|
### <div id="skipactioncfg">SkipActionCfg</div>
|名称|类型|描述|
|---|---|---|
|**passAll**|Integer|是否跳过所有阶段，1表示是，0表示否|
|**cc**|Integer|是否执行cc防护，1表示是，0表示否|
|**waf**|Integer|是否执行waf防护，1表示是，0表示否|
|**deny**|Integer|是否执行deny防护，1表示是，0表示否|
|**rateLimit**|Integer|是否执行限速，1表示是，0表示否|
|**bot**|Integer|是否执行bot，1表示是，0表示否|
|**risk**|Integer|是否执行风控，1表示是，0表示否|
### <div id="denyactioncfg">DenyActionCfg</div>
|名称|类型|描述|
|---|---|---|
|**atOp**|Integer|黑名单匹配动作类型 1-4 分别表示forbidden@1 redirect@2 verify@captcha3 verify@jscookie4 5-告警(自定义bot增加)，6-302cookie(自定义bot增加)|
|**atVal**|String|黑名单匹配动作内容 当atOp为3/4时，atVal为空，atOp=1时，atVal为自定义页面,atOp=2时，atVal为跳转url。|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|BAD_REQUEST|
