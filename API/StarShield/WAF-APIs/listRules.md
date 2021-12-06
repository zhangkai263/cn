# listRules


## 描述
包内的搜索、排序和筛选规则

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_id}/firewall$$waf$$packages/{package_id}/rules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_id**|String|True| | |
|**package_id**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**mode**|String|False| |已将规则覆盖到的设置|
|**priority**|String|False| |在相关组中执行单个规则的顺序|
|**match**|String|False|all|是否匹配所有搜索要求或至少一个（任何）|
|**order**|String|False| |按指定字段排序|
|**page**|Number|False|1|分页结果的页码|
|**per_page**|Number|False|50|每页的规则数|
|**group_id**|String|False| |WAF组标识符标签|
|**description**|String|False| |规则的公开说明|
|**direction**|String|False| |asc-升序；desc-降序|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listRules#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[WAFRule[]](listRules#wafrule)| |
### <div id="wafrule">WAFRule</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|WAF规则标识符标签|
|**description**|String|规则的公开说明|
|**priority**|String|在相关组中执行单个规则的顺序|
|**group**|[Group](listRules#group)| |
|**package_id**|String|WAF包标识符标签|
|**allowed_modes**|String[]|定义触发规则时规则交互方式的可用模式。|
|**mode**|String|评估请求时是否使用基于异常的规则。|
### <div id="group">Group</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|WAF group identifier tag|
|**name**|String|Name of the firewall rule group|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
