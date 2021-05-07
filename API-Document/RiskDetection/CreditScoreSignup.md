# creditScoreSignup


## 描述
注册风险识别

## 请求方式
POST

## 请求地址
https://bri.jdcloud-api.com/v1/creditScore:check


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**tasks**|CreditTaskSignUp|True| |检测任务列表，只包含一个元素。每个元素是个结构体，每个元素的具体结构描述见CreditTaskSignUp|

### <div id="CreditTaskSignUp">CreditTaskSignUp</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dataId**|String|False| |数据Id。需要保证在一次请求中所有的Id不重复|
|**content**|String|True| |待检测数据字符串，最长4096个字符，为可解析字符串json，数据结构如creditTaskSignUpDetail|
|**resourceType**|String|True| |数据类型，signup-注册场景|
### <div id="CreditTaskSignUpDetail">CreditTaskSignUpDetail</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**phone**|String|True| |注册手机号，国内手机：11位手机号;海外手机：以+号开头，4位国家代码+5-11位手机号扩展位；手机注册，必填。手机号支持明文或者32位MD5手机号，必传其一。|
|**ip**|String|True| |注册IP，用户注册IP，IPV4 或 IPV6|
|**regEmail**|String|True| |注册邮箱，用户注册邮箱；邮箱注册，必填|
|**regName**|String|True| |注册账号名，用户注册名称；pin注册，必填|
|**regType**|Integer|True| |注册类型，1：手机注册；2 ：邮箱注册；3：pin注册；0：其他。|
|**channel**|Integer|True| |注册渠道或注册终端，1：PC端web浏览器注册 PC-Browser；2：PC客户端注册 PC-Client；3：移动设备各种APP注册 Mobile-APP；4 ：移动设备浏览器登录，移动端M页注册 Mobile-Brower；5：移动设备微信客户端中购物入口的注册操作 Mobile-WX；6： 移动设备QQ客户端中购物入口的注册操作 Mobile-QQ；7： 移动设备微信客户端中微信小程序注册操作- Mobile-WX；0：其他|
|**timestamp**|Integer|True| |注册时间，用户注册完成时间，UNIX时间戳，精确到毫秒|
|**elapsedTime**|String|True| |注册占用时长，从用户进入注册页到点击注册提交之间的时间差，单位ms|
|**macAddress**|String|False| |MAC地址，MAC 地址或设备唯一标识。|
|**imei**|String|False| |手机设备号，Android：imei，IOS：idfa|
|**idfa**|String|False| |手机设备号，Android：imei，IOS：idfa|
|**eid**|String|False| |注册设备号，设备指纹编码|
|**regResult**|Integer|False| |注册结果，1：注册成功；2：注册失败。|

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
            "dataId": "1234567829",
            "content": "{\"phone\":\"18212341234\",\"ip\":\"2001:3CA1:010F:001A:121B:0000:0000:0010\",\"regEmail\":\"\",\"regName\":\"user1\",\"regType\":1,\"channel\":1,\"timestamp\":1604588399968,\"elapsedTime\":\"29\",\"eid\":\"7E8XXX\",\"regResult\":1}",
            "resourceType": "signup"
        }
    ]
}

返回:
{
    "requestId": "d2f1b284-ef5e-4989-9ac1-96498XXX",
    "result": {
        "data": [
            {
                "success": true,
                "failMsg": "",
                "dataId": "1234567829",
                "content": "{\"phone\":\"18212341234\",\"ip\":\"2001:3CA1:010F:001A:121B:0000:0000:0010\",\"regEmail\":\"\",\"regName\":\"user1\",\"regType\":1,\"channel\":1,\"timestamp\":1604588399968,\"elapsedTime\":\"29\",\"eid\":\"7E8XXX\",\"regResult\":1}",
                "resourceType": "signup",
                "scoreDetail": {
                    "riskTag": "未知",
                    "riskCode": "998",
                    "riskClass": "signup",
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
