# ruleGroupDetails


## 描述
获取单个规则组

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/firewall$$waf$$packages/{package_identifier}/groups/{identifier}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |
|**package_identifier**|String|True| | |
|**identifier**|String|True| | |

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](ruleGroupDetails#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[WAFRuleGroup](ruleGroupDetails#wafrulegroup)| |
### <div id="wafrulegroup">WAFRuleGroup</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|WAF组标识符标签|
|**name**|String|防火墙规则组的名称|
|**description**|String|WAF规则集的功能摘要|
|**rules_count**|Number|此组中包含多少条规则|
|**modified_rules_count**|Number|组中有多少规则已从默认规则修改|
|**package_id**|String|WAF包标识符标签|
|**mode**|String|此组中包含的规则是否可配置/可用|
|**allowed_modes**|String[]|组可以具有的可用状态。这将影响此组中规则的状态。|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
