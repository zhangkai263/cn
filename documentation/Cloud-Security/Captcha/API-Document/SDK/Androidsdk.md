# 验证码SDK Android接入

## 1 、静默验证接口调用

### 1.1 初始化接口

手动设置log和环境：

```
AntiGuard.init(Context context,AntiParams trackBaseData, boolean enableLog, boolean debug)
```

SDK使用之前需要先调用该接口初始化必要的参数

| 参数          | 参数说明                                 |
| ------------- | ---------------------------------------- |
| context       | APP上下文，推荐使用getApplicationContext |
| trackBaseData | 封装了初始化必要的各种参数               |
| enableLog     | log开关，false是关闭log                  |
| debug         | 设置是否使用预发布环境，false是线上环境  |

TrackBaseData成员变量

appId：用来标识一个APP

调用示例：

```
AntiParams trackBaseData = AntiParams.create().appId("100");
AntiGuard.init(MyApp.getInstance(), trackBaseData,false,false);
```



### 1.2 设备指纹信息上报接口

```
AntiGuard.report(Context context ,JSONObject event);         
```

业务埋点上报的接口

| 参数    | 参数说明                                                     |
| ------- | ------------------------------------------------------------ |
| context | APP上下文，推荐使用getApplicationContext                     |
| event   | 事件参数, JSONObject类型，必须包含以下至少1个key,"eventid"：事件id |

调用示例：

```
try {

   JSONObject event = new JSONObject();

   event.put("eventid", "STestEvent");

   AntiGuard.report(getApplicationContext(),event);

   } catch (Exception e) {

   

   }
```



### 1.3 设置是否开启防刷

AntiGuard. setAntiEnable (boolean enable )

| 参数   | 参数说明                            |
| ------ | ----------------------------------- |
| enable | 是否开启防刷，true开启，false不开启 |

### 1.4 获取设备指纹信息

AntiGuard. getUnionFingerPrint(Context context)

| 参数    | 参数说明  |
| ------- | --------- |
| Context | APP上下文 |

### 1.5 设置是否采集设备信息, 默认采集

AntiGuard. setPrivacyPolicyHelper(PrivacyPolicyHelper helper)

PrivacyPolicyHelper接口的 isAgree方法里头返回true采集，返回false不采集

## 2 、验证码接口调用

### 2.1 获取验证码实例

```
Verify verify = Verify.getInstance();
```

每个Verify实例对应一次验证的流程，同一场景的验证不需要重新获取Verify实例。

public void free()：Activity销毁时调用该方法，释放资源

public Verify setDebug(boolean isDebug)：设置环境

public Verify setLog(boolean openLog)：是否开启LOG

public Verify setLoading (boolean openLog)：是否显示loading圈

public Verify setURL(String url)：设置访问后台的url

### 2.2 执行验证

```
verify.init(session_id, MainActivity.this, udid, mCallBack);
  
 
 
CallBack verifyCallback = new ShowCapCallback() {
    @Override
 public void showCap() {
        //弹出验证码时的回调，业务方若自行显示loading圈，在这个回调要将loading圈消失掉。若使用验证码sdk提供的loading则不需处理。
 }
 
    @Override
 public void loadFail() {
        //验证码加载失败或验证失败的回调，业务方若自行显示loading圈，在这个回调要将loading圈消失掉。若使用验证码sdk提供的loading则不需处理。
 }
 
    @Override
 public void onSSLError() {
        //网络请求时ssl异常的回调，业务方若自行显示loading圈，在这个回调要将loading圈消失掉。若使用验证码sdk提供的loading则不需处理。
    }
 
    @Override
 public void showButton(int i) {
        //接入了嵌入式的验证方式，需要显示按钮的回调。现在支持的是点图的方式，所以正常接入不会执行到这个回调
 //业务方若自行显示loading圈，为保险起见在这个回调要将loading圈消失掉。若使用验证码sdk提供的loading则不需处理。
    }
 
    @Override
 public void invalidSessiongId() {
        //sid失效，需要重新获取
        getSessionId();
    }
 
    @Override
 public void onSuccess(IninVerifyInfo ininVerifyInfo) {
        //验证成功的回调
        helper.JDLoginWithPasswordNew(sUserName, sUserPassword, sid, ininVerifyInfo.getVt(), onLoginCallback);
    }
 
    @Override
 public void onFail(String s) {
        //嵌入式的（滑动验证码）验证失败回调，业务方若自行显示loading圈，在这个回调要将loading圈消失掉。若使用验证码sdk提供的loading则不需处理。
 }
};
```



参数说明：

Session_id:后台下发的验证码会话id, 由调用方从调用放后台获取并传入sdk

MainActivity.this:activity上下文

Udid：用户唯一标识，建议用imei_macAddress拼接(注意：此udid尽量和传入登录sdk的uuid一致)

mCallBack:验证码验证码结果回调，类型CallBack或SSLDialogCallback或ShowCapCallback

CallBack：验证结果回调

1.void onSuccess(IninVerifyInfo info);验证成功，在此进行后续业务处理
2.void onFail(String msg); 验证失败，在此进行后续业务处理

3.void showButton(int type); 此方法用于通知业务方一次验证类型，Verify. SHOW_BUTTON_CLICK:点击验证 Verify. SHOW_BUTTON_SLIDE:滑动验证
4.void invalidSessiongId();session_id过期。

SSLDialogCallback：验证结果回调

1.void onSuccess(IninVerifyInfo info);验证成功，在此进行后续业务处理
2.void onFail(String msg); 验证失败，在此进行后续业务处理

3.void showButton(int type);此方法用于通知业务方一次验证类型，Verify. SHOW_BUTTON_CLICK:点击验证 Verify. SHOW_BUTTON_SLIDE:滑动验证
4.void invalidSessiongId();session_id过期。

5.void onSSLError();处理SSL异常

ShowCapCallback：验证结果回调



ShowCapCallback：验证结果回调

1.void onSuccess(IninVerifyInfo info);验证成功，在此进行后续业务处理
2.void onFail(String msg); 验证失败，在此进行后续业务处理

​    3.void showButton(int type);此方法用于通知业务方一次验证类型，Verify. SHOW_BUTTON_CLICK:点击验证 Verify. SHOW_BUTTON_SLIDE:滑动验证
​    4.void invalidSessiongId();session_id过期。

5.void onSSLError();处理SSL异常

6.void showCap()：验证码弹出时的回调（可以在此隐藏业务方的加载圈）

7.void loadFail():验证码加载失败的回调（可以在此隐藏业务方的加载圈）

   

### 2.3 验证码验证API

 1.public void init(String session_id, Context context, String udid, CallBack callBack) 

参数说明：

Session_id:后台下发的验证码会话id, 由调用方从调用放后台获取并传入sdk

MainActivity.this:activity上下文

Udid：用户唯一标识，建议用imei_macAddress拼接(注意：此udid尽量和传入登录sdk的uuid一致)

mCallBack:验证码验证码结果回调，类型CallBack或SSLDialogCallback或ShowCapCallback



2.public void init(String session_id, Context context, String udid, String account, CallBack callBack)

参数说明：

Session_id:后台下发的验证码会话id, 由调用方从调用放后台获取并传入sdk

MainActivity.this:activity上下文

Udid：用户唯一标识，建议用imei_macAddress拼接(注意：此udid尽量和传入登录sdk的uuid一致)

account:：用户名，用于盲人用户白名单

mCallBack:验证码验证码结果回调，类型CallBack或SSLDialogCallback或ShowCapCallback



3.public void init(String session_id, Context context, String udid, String countryCode, String account, CallBack callBack)

参数说明：

Session_id:后台下发的验证码会话id, 由调用方从调用放后台获取并传入sdk

MainActivity.this:activity上下文

Udid：用户唯一标识，建议用imei_macAddress拼接(注意：此udid尽量和传入登录sdk的uuid一致)

countryCode：国家码，例：86（不需要加+）

account:：用户名

mCallBack:验证码验证码结果回调，类型CallBack或SSLDialogCallback或ShowCapCallback



## 3、 APP工程接入说明

1） 接入app在app启动时调用AntiGuard.init初始化SDK，之后可以正常调用其他接口;

2） 混淆设置

\# jma sdk包不混淆

-keep class com.jdbusiness.anti. {;}

\#确保native方法不被混淆

-keepclasseswithmembernames class * {

  native <methods>;

}