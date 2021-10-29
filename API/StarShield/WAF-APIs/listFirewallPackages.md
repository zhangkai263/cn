# listFirewallPackages


## 描述
检索域的防火墙包

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/firewall$$waf$$packages

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|False| |Name of the firewall package|
|**page**|Number|False|1|Page number of paginated results|
|**per_page**|Number|False|50|每页的包数|
|**order**|String|False| |按字段对包排序|
|**direction**|String|False| |asc - 升序；desc - 降序|
|**match**|String|False|all|是否匹配所有搜索要求或至少一个（任何）|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[WAFRulePackage[]](#wafrulepackage)| |
### <div id="WAFRulePackage">WAFRulePackage</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|WAF包标识符标签|
|**name**|String|防火墙包的名称|
|**description**|String|防火墙包的目的/功能摘要|
|**detection_mode**|String| |
|**zone_id**|String|区标识符标签|
|**status**|String|指示对域应用防火墙包。|
|**sensitivity**|String|防火墙包的敏感度。|
|**action_mode**|String|将对防火墙包下的规则执行的默认操作。|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
