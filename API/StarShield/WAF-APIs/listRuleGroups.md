# listRuleGroups


## 描述
搜索、列出和排序包中包含的规则组

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/firewall$$waf$$packages/{package_identifier}/groups

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |
|**package_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|False| |防火墙规则组名称|
|**mode**|String|False|True|此组中包含的规则是否可配置/可用|
|**rules_count**|Number|False| |此组中包含多少条规则|
|**page**|Number|False|1|分页结果的页码|
|**per_page**|Number|False|50|每页的组数|
|**order**|String|False| |按字段对组进行排序|
|**direction**|String|False| |asc-升序；desc-降序|
|**match**|String|False|all|是否匹配所有搜索要求或至少一个（任何）|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listRuleGroups#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[WAFRuleGroup[]](listRuleGroups#wafrulegroup)| |
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
