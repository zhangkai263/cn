# changeSecurityLevelSetting


## 描述
为你的网站选择适当的安全配置文件，这将自动调整每个安全设置。如果你选择定制一个单独的安全设置，该配置文件将成为自定义。


## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$security_level

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|String|False|medium|该设置的有效值|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](changeSecurityLevelSetting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[SecurityLevel](changeSecurityLevelSetting#securitylevel)| |
### <div id="securitylevel">SecurityLevel</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|String|该设置的有效值|
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
