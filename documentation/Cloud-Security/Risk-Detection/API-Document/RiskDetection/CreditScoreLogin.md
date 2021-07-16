# creditScoreLogin


## 描述
登录风险识别

## 请求方式
POST

## 请求地址
https://bri.jdcloud-api.com/v1/creditScore:check


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**tasks**|CreditTaskLogin|True| |检测任务列表，只包含一个元素。每个元素是个结构体，每个元素的具体结构描述见CreditTaskLogin|

### <div id="CreditTaskLogin">CreditTaskLogin</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dataId**|String|False| |数据Id。需要保证在一次请求中所有的Id不重复|
|**content**|String|True| |待检测数据字符串，最长4096个字符，为可解析字符串json，数据结构如creditTaskLoginDetail|
|**resourceType**|String|True| |数据类型，login-登录|
### <div id="CreditTaskLoginDetail">CreditTaskLoginDetail</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**phone**|String|True| |注册手机号，国内手机：11位手机号;海外手机：以+号开头，4位国家代码+5-11位手机号扩展位；手机注册，必填。手机号支持明文或者32位MD5手机号，必传其一。|
|**loginIp**|String|True| |登录IP，用户登录IP，IPV4 或 IPV6|
|**loginType**|String|True| |登录认证方式，1：手动帐号密码输入；2：动态短信密码登录；3：二维码扫描登录；0其他|
|**loginName**|String|True| |登录账号名pin，用户登录使用名称|
|**channel**|Integer|True| |注册渠道或注册终端，1：PC端web浏览器注册 PC-Browser；2：PC客户端注册 PC-Client；3：移动设备各种APP注册 Mobile-APP；4 ：移动设备浏览器登录，移动端M页注册 Mobile-Brower；5：移动设备微信客户端中购物入口的注册操作 Mobile-WX；6： 移动设备QQ客户端中购物入口的注册操作 Mobile-QQ；7： 移动设备微信客户端中微信小程序注册操作- Mobile-WX；0：其他|
|**deviceName**|String|True| |应用设备名称，PC 端：如果为浏览器说明浏览器名称 IE、firefox、chrome等;移动APP端：请说明移动APP名称|
|**deviceVersion**|String|True| |应用设备版本，跟deviceName关联，说明deviceName对应的版本|
|**deviceOS**|String|True| |设备操作系统，说明设备的操作系统，如windows ，openSUSE、debian、ubuntu，unix, android, ios 等。|
|**deviceOSVersion**|String|True| |设备操作系统版本，说明设备的操作系统版本，跟deviceOs 字段关联，例如deviceOs为android，此处可以为 3.0，4.0，4.2，5.0 等。|
|**loginTime**|Integer|True| |登录时间，用户登录完成时间，UNIX时间戳|
|**elapsedTime**|String|True| |登录占用时长，从出登录页到登录提交之间的时间差（出登录视图埋点，提交时计算时间差），如果为免密码登录方式，可以在换取认证token时生成时间戳，验证token时计算时间差，单位ms|
|**loginResult**|String|True| |登录结果，1：登录成功；2： 用户不存在，无法登录；3 ：密码错误，无法登录；4： 密码错误，账号被锁定；5： 账号未通过审核，无法登录；6：账号审核中，无法登录；7：账号锁定，无法登录；8： 账号已注销，无法登录；9：短信验证码错误，无法登录；10：风险账号，无法登录；11：验证码错误，无法登录；0：其他；|
|**loginEmail**|String|False| |登录邮箱，用户登录邮箱，可选参数|
|**macAddress**|String|False| |MAC地址，MAC 地址或设备唯一标识。|
|**imei**|String|False| |手机设备号，Android：imei，IOS：idfa|
|**idfa**|String|False| |手机设备号，Android：imei，IOS：idfa|
|**regIp**|String|False| |注册ip，用户注册IP，IPV4 或 IPV|
|**eid**|String|False| |设备ID，设备指纹编码|
|**regTime**|Integer|False| |注册时间，用户注册完成时间，UNIX时间戳|
|**bizType**|String|True| |业务类型，1、个人；2、商家；3、企业；4、其他|
|**authType**|String|True| |认证方式，1 - PC 用户名/登录名+密码登录；2 - PC 关联手机号+密码登录；3 - PC 邮箱+密码登录；5 - 手机APP扫码授权登录其他终端（PC、TV、PAD、冰箱等）；6-（APP & M & WX & QQ、微信小程序、快应用）账号+密码登录；15-刷脸登录；|
|**appId**|String|False| |接入登录应用Id，仅APP登录时提供，说明接入京东登录的应用标识|
|**mobileBrand**|String|False| |手机品牌，如果手机注册，请带上此信息|
|**appVersion**|String|False| |App 客户端版本|
|**mouseClickCount**|Integer|False| |用户操作过程中鼠标单击次数|
|**keyboardClickCount**|Integer|False| |用户操作过程中键盘单击次数|
|**referer**|String|False| |用户 HTTP 请求的 referer 值|
|**jumpUrl**|String|False| |登录成功后跳转页面|
|**userAgent**|String|False| |用户 HTTP 请求的 userAgent|
|**xForwardedFor**|String|False| |用户 HTTP 请求中的 x_forward_for|

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
            "dataId": "123456789101",
            "content": "{\"phone\":\"13200000000\",\"loginIp\":\"1.1.1.1\",\"loginType\":\"1\",\"loginName\":\"jdtest\",\"channel\":1,\"deviceName\":\"Chrome\",\"deviceVersion\":\"78.0.3904.108\",\"deviceOS\":\"Windows 10\",\"deviceOSVersion\":\"10\",\"loginTime\":1605660884279,\"elapsedTime\":\"5045\",\"loginResult\":\"1\",\"loginEmail\":\"\",\"macAddress\":\"\",\"imei\":\"\",\"regIp\":\"10.0.0.1\",\"eid\":\"FK7CPS2R4XXX\",\"regTime\":1596791694000,\"bizType\":\"1\",\"authType\":\"1\",\"appId\":\"\",\"mobileBrand\":\"\",\"appVersion\":\"\",\"mouseClickCount\":10,\"keyboardClickCount\":11,\"referer\":\"\",\"jumpUrl\":\"\",\"userAgent\":\"\",\"xForwardedFor\":\"\"}",
            "resourceType": "login"
        }
    ]
}

返回:
{
    "requestId": "7db31e35-631c-4eae-b93c-c82455b5247f",
    "result": {
        "data": [
            {
                "success": true,
                "failMsg": "",
                "dataId": "123456789101",
                "content": "{\"phone\":\"13200000000\",\"loginIp\":\"1.1.1.1\",\"loginType\":\"1\",\"loginName\":\"jdtest\",\"channel\":1,\"deviceName\":\"Chrome\",\"deviceVersion\":\"78.0.3904.108\",\"deviceOS\":\"Windows 10\",\"deviceOSVersion\":\"10\",\"loginTime\":1605660884279,\"elapsedTime\":\"5045\",\"loginResult\":\"1\",\"loginEmail\":\"\",\"macAddress\":\"\",\"imei\":\"\",\"regIp\":\"10.0.0.1\",\"eid\":\"FK7CPS2R4XXX\",\"regTime\":1596791694000,\"bizType\":\"1\",\"authType\":\"1\",\"appId\":\"\",\"mobileBrand\":\"\",\"appVersion\":\"\",\"mouseClickCount\":10,\"keyboardClickCount\":11,\"referer\":\"\",\"jumpUrl\":\"\",\"userAgent\":\"\",\"xForwardedFor\":\"\"}",
                "resourceType": "login",
                "scoreDetail": {
                    "riskTag": "未知",
                    "riskCode": "998",
                    "riskClass": "login",
                    "score": "0",
                    "scoreDesc": "未知"
                },
                "hitCache": "miss",
                "inBWList": "none"
            }
        ]
    }
}
```
