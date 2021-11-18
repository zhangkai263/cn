# listPageRules


## 描述


## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/pagerules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**status**|String|False|disabled|页面规则的状态|
|**order**|String|False|priority|用于按顺序排列页面规则的字段|
|**direction**|String|False|desc|asc - 升序；desc - 降序|
|**match**|String|False|all|是否匹配所有搜索要求或至少一个（任何）|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listPageRules#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[PageRule[]](listPageRules#pagerule)| |
### <div id="pagerule">PageRule</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|API条目标识符标签|
|**targets**|[Target[]](listPageRules#target)|对请求进行评估的目标|
|**actions**|[Action[]](listPageRules#action)|如果此规则的目标与请求相匹配，要执行的一系列行动。行动可以将网址重定向到另一个网址或覆盖设置（但不能同时进行）。|
|**priority**|Integer|一个数字，表示一个页面规则优先于另一个页面规则。<br>如果您可能有一个全面页面规则（例如#1 '/images/'）<br>但是想要更具体的规则优先（例如#2 '/images/special/），<br>您需要在后者（#2）上指定更高的优先级，以便它将覆盖第一个优先级。<br>|
|**status**|String|页面规则的状态|
|**modified_on**|String|上次修改页面规则的时间|
|**created_on**|String|创建页面规则时间|
### <div id="action">Action</div>
|名称|类型|描述|
|---|---|---|
|**id**|String| |
|**value**|Object| |
### <div id="target">Target</div>
|名称|类型|描述|
|---|---|---|
|**target**|String| |
|**constraint**|[Constraint](listPageRules#constraint)| |
### <div id="constraint">Constraint</div>
|名称|类型|描述|
|---|---|---|
|**operator**|String| |
|**value**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
