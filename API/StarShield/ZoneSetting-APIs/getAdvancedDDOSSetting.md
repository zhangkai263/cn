# getAdvancedDDOSSetting


## 描述
对您的网站进行高级保护，防止分布式拒绝服务（DDoS）攻击。这是一个不可编辑的值。


## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$advanced_ddos

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getAdvancedDDOSSetting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[AdvancedDDoSProtection](getAdvancedDDOSSetting#advancedddosprotection)| |
### <div id="advancedddosprotection">AdvancedDDoSProtection</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|String|on - 开启；off - 关闭|
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
