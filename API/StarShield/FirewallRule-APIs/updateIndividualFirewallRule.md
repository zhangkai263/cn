# updateIndividualFirewallRule


## 描述
更新一个单独的现有防火墙规则。

## 请求方式
PUT

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/firewall$$rules/{id}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |
|**id**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**action**|String|False| |应用于匹配请求的行动。注意，行动 "log "只适用于企业客户。|
|**filter**|[Filter](updateIndividualFirewallRule#filter)|False| | |
|**products**|String[]|False| | |
|**priority**|Number|False| |规则的优先级，允许控制处理顺序。一个较小的数字表示高优先级。如果不提供，任何有优先权的规则将在没有优先权的规则之前排序。|
|**paused**|Boolean|False| |此防火墙规则当前是否已暂停。|
|**ref**|String|False| |短引用标记，用于快速选择相关规则。|
|**action_parameters**|[Action_parameters](updateIndividualFirewallRule#action_parameters)|False| | |
|**description**|String|False| |对规则的描述，以帮助识别它。|

### <div id="action_parameters">Action_parameters</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**uri**|[Uri](updateIndividualFirewallRule#uri)|False| | |
### <div id="uri">Uri</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**path**|[Path](updateIndividualFirewallRule#path)|False| | |
|**query**|[Query](updateIndividualFirewallRule#query)|False| | |
### <div id="query">Query</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|String|False| |要重写的字面URI查询字符串。|
### <div id="path">Path</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|String|False| |要重写的字面URI路径。|
### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**id**|String|False| |筛选器标识符|
|**expression**|String|False| |要使用的筛选器表达式|
|**paused**|Boolean|False| |此筛选器当前是否已暂停|
|**description**|String|False| |可用于描述过滤器用途的注释|
|**ref**|String|False| |短引用标记，用于快速选择相关规则。|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](updateIndividualFirewallRule#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[FirewallRule](updateIndividualFirewallRule#firewallrule1)| |
### <div id="firewallrule1">FirewallRule</div>
|名称|类型|描述|
|---|---|---|
|**products**|String[]| |
|**priority**|Number|规则的优先级，允许控制处理顺序。一个较小的数字表示高优先级。如果不提供，任何有优先权的规则将在没有优先权的规则之前排序。|
|**paused**|Boolean|此防火墙规则当前是否已暂停。|
|**ref**|String|短引用标记，用于快速选择相关规则。|
|**action_parameters**|[Action_parameters](updateIndividualFirewallRule#action_parameters1)| |
|**action**|String|应用于匹配请求的行动。注意，行动 "log "只适用于企业客户。|
|**filter**|[Filter](updateIndividualFirewallRule#filter1)| |
|**id**|String|防火墙规则标识符|
|**description**|String|对规则的描述，以帮助识别它。|
### <div id="filter1">Filter</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|筛选器标识符|
|**expression**|String|要使用的筛选器表达式|
|**paused**|Boolean|此筛选器当前是否已暂停|
|**description**|String|可用于描述过滤器用途的注释|
|**ref**|String|短引用标记，用于快速选择相关规则。|
### <div id="action_parameters1">Action_parameters</div>
|名称|类型|描述|
|---|---|---|
|**uri**|[Uri](updateIndividualFirewallRule#uri1)| |
### <div id="uri1">Uri</div>
|名称|类型|描述|
|---|---|---|
|**path**|[Path](updateIndividualFirewallRule#path1)| |
|**query**|[Query](updateIndividualFirewallRule#query1)| |
### <div id="query1">Query</div>
|名称|类型|描述|
|---|---|---|
|**value**|String|要重写的字面URI查询字符串。|
### <div id="path1">Path</div>
|名称|类型|描述|
|---|---|---|
|**value**|String|要重写的字面URI路径。|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
