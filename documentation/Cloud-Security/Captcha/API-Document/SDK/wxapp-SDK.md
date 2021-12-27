# 验证码SDK - 微信小程序接入

# 1、插件接入准备

## 1.1 根据微信官方要求添加插件，并添加request合法域名

**步骤：**

1. 添加插件，详情请查看[微信文档](https://developers.weixin.qq.com/miniprogram/dev/framework/plugin/using.html)
2. 添加request合法域名：[https://captcha-api-global.jdcloud.com](https://captcha-api-global.jdcloud.com/)

# 2、在需要接入验证码的pages页接入组件

## 2.1 json中引入组件

**index.json**

```
"usingComponents": {
    "jcap": "plugin://myPlugin/jcap",
}
```

## 2.2 wxml中加入组件

**index.wxml**

```
<jcap
    id="myJcapPlugin"
    sessionId="{{sessionId}}"
    appId="{{appId}}"
    bind:onSuccess="onSuccess"
    bind:onFailure="onFailure"
    bind:onJcapLoad="onJcapLoad"
    bind:onJcapCancel="onJcapCancel"
/>
```

**组件参数：**

| 参数         | 说明                                         | 类型        | 默认值 | 必填 |
| :----------- | :------------------------------------------- | :---------- | :----- | :--- |
| id           | 元素的id，为了获取插件中自定义组件的输出对象 | String      | 无     | true |
| sessionId    | 服务端返回的sid                              | String      | ''     | true |
| appId        | 接入的应用Id（非小程序AppID）                | Number      | 无     | true |
| onSuccess    | 验证通过回调（返回参数获取e.detail）         | Function(e) | ()=>{} |      |
| onFailure    | 验证失败回调（返回参数获取e.detail）         | Function(e) | ()=>{} |      |
| onJcapLoad   | 加载完成验证码回调（返回参数获取e.detail）   | Function(e) | ()=>{} |      |
| onJcapCancel | 取消验证回调（返回参数获取e.detail）         | Function(e) | ()=>{} |      |

**回调返回参数e.detail说明：**

| 参数   | 说明                                                         | 类型   |
| :----- | :----------------------------------------------------------- | :----- |
| code   | 验证码返回的错误码，0为成功，其他均为失败，各错误码需要进行的处理参见下表 | Number |
| msg    | 错误信息                                                     | String |
| s_code | 后台详细错误代号(code非0时存在)                              | Number |
| vt     | code为0时存在，后台再次校验的verify_token值                  | String |

**错误代码、错误代码解释及建议处理逻辑：**

| 错误代码(code) | 错误代码解释(msg)    | 建议处理逻辑                             |
| :------------- | :------------------- | :--------------------------------------- |
| 0              | 成功                 | 不用处理                                 |
| 16801          | 参数无效             | 不用处理                                 |
| 16802          | 服务异常             | 不用处理                                 |
| 16803          | 请求太频繁           | 不用处理                                 |
| 16807          | 验证码未通过         | 不用处理                                 |
| 16808          | sessionid过期失效    | 申请新的sessionid，根据各端api重置验证码 |
| 16809          | verify_token过期失效 | 申请新的sessionid，根据各端api重置验证码 |



## 2.3 js中调用逻辑

**index.js**

```
Page({
  data: {
    appId: 12345678, // 应用id, 示例id请勿直接使用
    sessionId: '', // 验证码会话id
  },
  onReady: function () {
    this.myJcapPlugin = this.selectComponent("#myJcapPlugin"); // 在js里调用 this.selectComponent ，获取验证码组件的实例对象
  },
  onSuccess: function (e) {
    console.log('我是业务的成功回调', e.detail);
  },
  onFailure: function (e) {
    // sid失效，vt过期需重新申请sid，调用init方法
    console.log('我是业务的失败回调', e.detail)
  },
  onJcapLoad: function (e) {
    console.log('我是业务的加载完成回调', e.detail)
  },
  onJcapCancel: function (e) {
    console.log('我是业务的取消回调')
  },
   
  // 获取sessionId
  getSId(res) {
    this.setData({ sessionId: res.sessionId });
  },
 
  // 需要创建验证码时调用，显示验证码
  initJcap() {
    this.myJcapPlugin.init() // 初始化创建验证码
  }
})
```

