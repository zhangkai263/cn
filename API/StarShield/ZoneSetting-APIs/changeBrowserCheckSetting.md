# changeBrowserCheckSetting


## 描述
浏览器完整性检查与不良行为检查类似，寻找最常被垃圾邮件发送者滥用的常见HTTP头，并拒绝他们访问您的页面。它还会对没有用户代理或非标准用户代理（也是滥用机器人、爬虫或访客常用的）的访客提出挑战质询。


## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$browser_check

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|String|False|True|on - 开启；off - 关闭|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](changeBrowserCheckSetting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[BrowserCheck](changeBrowserCheckSetting#browsercheck)| |
### <div id="browsercheck">BrowserCheck</div>
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
