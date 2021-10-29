# getRocketLoaderSetting


## 描述
Rocket Loader是一个通用的异步JavaScript优化，它优先渲染你的内容同时异步加载你的网站的Javascript。
开启Rocket Loader将立即改善网页的渲染时间，有时以首次绘制时间（TTFP）以及window.onload时间（假设页面上有JavaScript）来衡量，这对你的搜索排名会产生积极影响。
当打开时，Rocket Loader将自动推迟加载你的HTML中引用的所有Javascript，而不需要配置。


## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$rocket_loader

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getRocketLoaderSetting#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[RocketLoader](getRocketLoaderSetting#rocketloader)| |
### <div id="rocketloader">RocketLoader</div>
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
