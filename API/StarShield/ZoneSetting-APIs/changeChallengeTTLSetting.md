# changeChallengeTTLSetting


## 描述
指定访问者在成功完成一项挑战（如验证码）后允许访问您的网站多长时间。在TTL过期后，访问者将不得不完成新的挑战。我们建议设置为15-45分钟，并将尝试遵守任何超过45分钟的设置。


## 请求方式
PATCH

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$challenge_ttl

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**value**|Number|False|1800|该设置的有效值|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[ChallengePageTTL](#challengepagettl)| |
### <div id="ChallengePageTTL">ChallengePageTTL</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|Number|该设置的有效值|
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
