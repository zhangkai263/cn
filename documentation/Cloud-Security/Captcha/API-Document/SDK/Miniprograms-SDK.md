# 验证码SDK 小程序接入
接入验证码插件需先申请appid和了解接入流程，如有疑问请先阅读[验证码文档](https://docs.jdcloud.com/cn/captcha/getting-started)。

# 接入流程
## 根据微信要求添加插件并添加域名
添加域名 https://captcha-api-global.jdcloud.com
添加插件，引入插件代码包详情查看[微信文档](https://developers.weixin.qq.com/miniprogram/dev/framework/plugin/using.html)

## 在需要接入验证码的pages页接入组件
### 1. app.json中声明验证码小程序插件

```
{
 "plugins": {
     "myPlugin": {
         "version": "1.0.0",
         "provider": "wxd9bf2dbdd3e4bba2"
     }
 }
}
```

### 2. json中引入组件

``````javascript
"usingComponents": {
    "jcap": "plugin://myPlugin/jcap",
}
``````

### 3.wxml中加入组件

``````javascript
<jcap
  id="myJcapPlugin"
  sessionId="{{sessionId}}"
  appId="{{appId}}"
  bind:onSuccess="onSuccess"
  bind:onFailure="onFailure"
  bind:onJcapLoad="onJcapLoad"
  bind:onJcapCancel="onJcapCancel"
  />
``````
组件参数：

参数 | 说明 | 类型 | 默认值 | 必填
--- | --- | --- | --- | ---
id | 元素的id，为了获取插件中自定义组件的输出对象| String | 无 | true
sessionId | 服务端返回的sessionid | String | '' | true 
appId| 申请的应用id | Number | null | true 
onFailure | 验证失败回调（返回参数获取e.detail） | Function(e) | ()=>{} | 
onSuccess | 验证通过回调（返回参数获取e.detail） | Function(e)	 | ()=>{} | 
onJcapLoad | 验证码加载完成回调（获取到验证码类型）（返回参数获取e.detail） | Function(e)	 | ()=>{} | 
onJcapCancel | 弹出验证点击取消的回调（暂无返回参数） | Function(e)	 | ()=>{} | 

回调返回参数e.detail说明：

参数 | 说明 | 类型 
--- | --- | --- 
code | 验证码返回的错误码，0为成功，其他均为失败，各错误码需要进行的处理参见下表 | Number
msg	| 错误信息 | String
s_code | 后台详细错误代号(code非0时存在) | Number
vt | code为0时存在，后台再次校验的verify_token值 | 	String

错误代码、错误代码解释及建议处理逻辑：

错误代码(code) | 错误代码解释(msg) | 建议处理逻辑
--- | --- | --- 
0 | 成功 | 不用处理
16801 | 参数无效 | 不用处理
16802 | 服务异常 | 不用处理
16803 | 请求太频繁 | 不用处理
16807 | 验证码未通过 | 不用处理
16808 | sessionid过期失效 | 申请新的sessionid，根据各端api重置验证码
16809 | verify_token过期失效 | 申请新的sessionid，根据各端api重置验证码

### 4.js中调用逻辑

``````javascript
Page({
  data:{
    appId: 12345678, // 应用id, 示例id请勿直接使用
    sessionId:'', // 验证码会话id
  },
  onLoad: function() {
  },
  onReady: function() {
    this.myJcapPlugin= this.selectComponent("#myJcapPlugin");//需要通过selectComponent获取
  },
  onSuccess: function (e) {
    console.log('我是业务的成功回调', e.detail)
  },
  onFailure: function (e) {
    // sid失效，vt过期需重新申请sid，调用init方法
    console.log('我是业务的失败回调',e.detail)
  },
  onJcapLoad: function (e) {
    console.log('我是业务的加载完成回调', e.detail)
  },
  onJcapCancel: function (e) {
    console.log('我是业务的取消回调')
  },
  // 获取sessionId
  getSId(res){
    this.setData({
        sessionId: res.sessionId
    })
  },
  // 需要创建验证码时调用，显示验证码
  initJcap(){
    this.myJcapPlugin.init() // 初始化创建验证码
  }
})
``````







