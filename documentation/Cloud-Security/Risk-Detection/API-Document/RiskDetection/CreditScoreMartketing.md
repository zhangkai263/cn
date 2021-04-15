# creditScoreMarketing


## 描述
营销风险识别

## 请求方式
POST

## 请求地址
https://bri.jdcloud-api.com/v1/creditScore:check


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**tasks**|CreditTaskMarketing|True| |检测任务列表，只包含一个元素。每个元素是个结构体，每个元素的具体结构描述见creditTaskMarketing|

### <div id="CreditTaskMarketing">CreditTaskMarketing</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dataId**|String|False| |数据Id。需要保证在一次请求中所有的Id不重复|
|**content**|String|True| |待检测数据字符串，最长4096个字符，为可解析字符串json，数据结构如creditTaskMarketingDetail|
|**resourceType**|String|True| |数据类型，marketing-营销|
### <div id="CreditTaskMarketingDetail">CreditTaskMarketingDetail</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**phone**|String|True| |注册手机号，国内手机：11位手机号;海外手机：以+号开头，4位国家代码+5-11位手机号扩展位；手机注册，必填。手机号支持明文或者32位MD5手机号，必传其一。|
|**ip**|String|True| |参与活动IP,用户领取奖励时的真实外网 IP（非服务端），IPV4 或 IPV6|
|**time**|Integer|True| |参与活动时间戳，参与活动时间戳，UNIX时间戳|
|**channel**|Integer|False| |用户参加活动渠道或终端，1：PC端web浏览器注册 PC-Browser；2：PC客户端注册 PC-Client；3：移动设备各种APP注册 Mobile-APP；4 ：移动设备浏览器登录，移动端M页注册 Mobile-Brower；5：移动设备微信客户端中购物入口的注册操作 Mobile-WX；6： 移动设备QQ客户端中购物入口的注册操作 Mobile-QQ；7： 移动设备微信客户端中微信小程序注册操作- Mobile-WX；0：其他|
|**referUrlLower**|String|True| |小写referUrl|
|**loginType**|Integer|False| |登录方式，1：手动帐号密码输入；2：动态短信密码登录；3：二维码扫描登录；0：其他|
|**lastLoginTime**|Integer|False| |登录时间，用户最近登录完成时间，UNIX时间戳|
|**regTime**|Integer|True| |注册时间，UNIX时间戳|
|**regIp**|String|True| |注册来源的外网 IP，IPV4 或 IPV6|
|**regType**|Integer|True| |注册类型，1：手机注册；2：邮箱注册；3：pin注册；0：其他。|
|**regName**|String|True| |注册帐号名，用户注册使用名称|
|**regChannel**|Integer|True| |注册渠道或注册终端，1： PC端web浏览器注册 PC-Browser；2：PC客户端注册 PC-Client；3：移动设备各种APP注册 Mobile-APP；4 ：移动设备浏览器登录，移动端M页注册 Mobile-Brower；5：移动设备微信客户端中购物入口的注册操作 Mobile-WX；6： 移动设备QQ客户端中购物入口的注册操作 Mobile-QQ；7： 移动设备微信客户端中微信小程序注册操作- Mobile-WX；0：其他|
|**uid**|String|False| |参加活动设备uid，UID是使用iOS系统非隐私参数，用一套统一规则生成的用于标识苹果手机的ID|
|**eid**|String|False| |参与活动登录的设备号，设备指纹编码|
|**macAddress**|String|False| |MAC地址，MAC 地址或设备唯一标识。|
|**vendorId**|String|False| |手机制造商 ID，手机制造商 ID，如果手机注册，请带上此信息。|
|**imei**|String|False| |手机设备号，Android：imei，IOS：idfa|
|**idfa**|String|False| |手机设备号，Android：imei，IOS：idfa|
|**appVersion**|String|False| |App 客户端版本，如果使用App操作，请带上此信息|
|**businessId**|Integer|False| |业务 ID， 网站或应用在多个业务中使用此服务，通过此 ID 区分统计数据|
|**newPersonType**|Integer|False| |对于新人的类型做分类，用于新人权益互斥的场景做领券限制，不同业务场景的解释会有变化。例如：1001：新人188大礼包；1002：全链路新人礼包；1003：市场部新人；1004： 极速版拉新；1005：事业部拉新|
|**batchId**|String|False| |优惠券ID|
|**activityKeyRaw**|String|False| |活动key|
|**source**|Integer|False| |业务来源，基础账号侧配置的业务来源，用来识别和区分独立业务，枚举可根据客户具体需求调整。|
|**cookieHash**|String|False| |cookie 的Hash值，用户 HTTP 请求中的 cookie 进行2次 hash 的值，只要保证相同 cookie 的 hash 值一致即可。|
|**address**|String|False| |用户领取奖品邮寄地址|
|**userAgent**|String|False| |用户 HTTP 请求的 userAgent|
|**xForwardedFor**|String|False| |用户 HTTP 请求中的 x_forward_for。|
|**mouseClickCount**|Integer|False| |用户操作过程中鼠标单击次数。|
|**keyboardClickCount**|Integer|False| |用户操作过程中键盘单击次数。|
|**loginSpend**|Integer|False| |登录耗时，从出登录页到登录提交之间的时间差（出登录视图埋点，提交时计算时间差），如果为免密码登录方式，可以在换取认证token时生成时间戳，验证token时计算时间差，单位ms|
|**lastLoginEid**|String|False| |最后登录设备号（eid），设备指纹编码|
|**jumpUrl**|String|False| |登录成功后跳转页面。|
|**elapsedTime**|String|True| |注册占用时长，从用户进入注册页到点击注册提交之间的时间差，单位ms|
|**regResult**|Integer|True| |注册结果，成功 or 失败；如直接做拦截校验可不填，1：注册成功；2：注册失败。|
|**regEmail**|String|False| |用户注册邮箱|
|**share**|Integer|False| |单个红包允许领取的用户数量（分享红包）|
|**dayTimes**|Integer|False| |单日内，单个账号每日领取奖励的最大次数。|
|**totalTimes**|Integer|False| |整个活动周期内，单个账号能领取奖励的最大次数|
|**atitude**|Number|False| |维度。浮点数，范围为-90 - 90|
|**longitude**|Number|False| |经度。浮点数，范围为-180 - 180|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result|API请求成功或者部分成功时返回数据|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|CreditResult|结果数组|
### <div id="CreditResult">CreditResult</div>
|名称|类型|描述|
|---|---|---|
|**success**|Boolean|是否成功，没成功会在failMsg附上错误信息|
|**failMsg**|String|错误描述信息|
|**dataId**|String|对应请求的dataId|
|**inBWList**|String|是否命中黑白名单，black-在黑名单中 white-在白名单中 none-不在任何名单中|
|**content**|String|对应请求的内容|
|**resourceType**|String|数据类型，ip-IP，phone-手机，addr-地址，card-身份，pin-账户，eid-设备，signup-注册，login-登录，marketing-营销|
|**scoreDetail**|CreditScoreDetail|评分数据|
### <div id="CreditScoreDetail">CreditScoreDetail</div>
|名称|类型|描述|
|---|---|---|
|**riskTag**|String|风险类型，对应riskCode的中文描述|
|**riskCode**|String|风险类型编码，对应riskCode的分类：<br/>200-208手机综合风险，包括200-黑手机、201-异常注册、202-异常登录、203-营销刷券、204-下单黄牛、205-异常支付、206-恶意售后、207-猫池小号、208-订单风险、998-未知<br/>501-507IP综合风险，包括501-普通代理、 502-秒拨代理IP、503-真人作弊、504-设备伪装、505-地址伪装、506-黑软IP、507-爬虫IP、998-未知<br/>600-604注册综合风险，包括600-其他、601-机器批量注册、602-代理IP注册、603-黑卡注册、604-垃圾小号注册、998-未知<br/>700-703登录综合风险，包括700-其他、701-机器批量登录、702-撞库登录、703-代理IP登录、998-未知<br/>800-803营销综合风险，包括800-其他、801-批量刷券、802-黑手机、803-黑设备、998-未知<br>详见[标签说明](https://docs.jdcloud.com/cn/risk-detection/core-concepts)|
|**riskClass**|String|风险分类，包括ip、phone、addr、login，signup，marketing|
|**score**|String|风险评分，1-低风险 2-中低风险 3-中风险 4-中高风险 5-高风险 0-无风险|
|**scoreDesc**|String|对应score的中文描述，1-低风险 2-中低风险 3-中风险 4-中高风险 5-高风险 0-无风险|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad Request|

[其他常见错误码](https://docs.jdcloud.com/cn/common-declaration/api/error-codes)

注：当请求QPS超过购买的包年不限次套餐里面限定的QPS阈值后，会提示如下：

```
{
    "requestId": "xxxxx", 
    "error": {
        "status": "CREDITSCORE_REQUEST_LIMITEXCEEDED", 
        "code": 400, 
        "message": "请求的次数超过了频率限制"
    }
}
```

## 示例代码

```
请求：
method：
  post
body：
{
    "tasks": [
        {
            "dataId": "123456789108",
            "content": "{\"time\":1605825847236,\"regIp\":\"10.0.0.7\",\"ip\":\"1.1.1.1\",\"regName\":\"jdck\",\"eid\":\"76NL6TUCUIDMKXXX\",\"activityKeyRaw\":\"FP_41lXXX\",\"phone\":\"18210000000\",\"referUrlLower\":\"http://test.com/a.html\",\"regTime\":1605825566665,\"regType\":1,\"regChannel\":1,\"elapsedTime\":\"30\",\"regResult\":1}",
            "resourceType": "marketing"
        }
    ]
}

返回:
{
    "requestId": "886e9b81-d2d3-4849-9862-e384a1cb97d3",
    "result": {
        "data": [
            {
                "success": true,
                "failMsg": "",
                "dataId": "123456789108",
                "content": "{\"time\":1605825847236,\"regIp\":\"10.0.0.7\",\"ip\":\"1.1.1.1\",\"regName\":\"jdck\",\"eid\":\"76NL6TUCUIDMKXXX\",\"activityKeyRaw\":\"FP_41lXXX\",\"phone\":\"18210000000\",\"referUrlLower\":\"http://test.com/a.html\",\"regTime\":1605825566665,\"regType\":1,\"regChannel\":1,\"elapsedTime\":\"30\",\"regResult\":1}",
                "resourceType": "marketing",
                "scoreDetail": {
                    "riskTag": "未知",
                    "riskCode": "998",
                    "riskClass": "marketing",
                    "score": "0",
                    "scoreDesc": "无风险"
                },
                "hitCache": "miss",
                "inBWList": "none"
            }
        ]
    }
}
```
