# 验证码SDK iOS接入

## 1、静默验证接口说明

### 1.1 注册接口

```
/**
 * 1、注册
 * @param appid           外部业务接入id
 */
+ (void)registerJMAWithAppid:( NSString * _Nonnull )appid;
```

### 1.2 业务埋点上报接口

```
/**
 * 2、JMA安全数据上报
 */
+ (void)reportJMA;
```

### 1.3 停止采集方法

```
/**
 * 3、设置是否上报(采集启停开关，默认开启，主动设置NO停止采集)
 */
+ (void)setupReportJMAEnable:(BOOL)enable;
```

### 1.4 获取设备指纹掩码

```
/**
 * 4、获取设备指纹掩码
 */
+ (NSString *_Nullable)getwhwswswws;
```



## 2 、验证码接口说明

### 2.1 初始化

提供2种初始化方式：

```
/**
 * 1、可设置app环境语言环境
 */
-(id _Nonnull )initWithEnvironmentType:(JDAFDCapEnvironmentType)type countryType:(JDAFDCapAppCountryType)ct languageType:(JDAFDCapLanguageType)lt params:(JDAFDCapParams *_Nonnull)params;
 
 
 
/**
 * 2、URL: 自定义URL
 * lt: 自定义当前语言类型简写，使用前先联系确认是否支持
 *   zh    //中文
     th    //泰文
     es    //西班牙
     en    //英文
     ru    //俄文
     id    //印尼
 */
-(id _Nonnull )initWithURL:(nonnull NSURL *)url languageType:(nonnull NSString *)lt params:(JDAFDCapParams *_Nonnull)params;
```

注意事项

1.获取非弹出式验证码需设置embed=YES，同时设置embedwidth，业务接口返回会回调-(void)jdAFDCapVerifyEmbedView:(UIView \*)view;

2.获取错误回调需设置receiveErrors=YES

3.不需要使用sdk内置loading需设置canShowWaitDialogView=NO

4.使用弹出式验证码时，在页面出现时需设置canShowVerifyView=YES ，在页面消失时需设置canShowVerifyView=NO



### 2.2 获取sessiod后，获取验证码

2.2.1 通过执行下面的函数获取弹出式验证码

```
-(void)showWebVerifyWithSession:(nonnull NSString *)sessionid initFinished:(nullable dispatch_block_t)block;
```

2.2.2 当传入的sessionid失效时会回调下面的方法

```
-(void)jdAFDCapVerifySessionExpried;
```

2.2.3 最后，用户验证通过后会回调下面的方法

```
-(void)jdAFDCapVerifyCheckSuccess:(NSString *)vt;
```

2.2.4 发生错误时，设置了receiveErrors=YES时，会回调下面方法，否则不会回调，建议业务设置为NO，交由sdk内部处理

```
-(void)jdAFDCapVerifyErrors:(NSError *)error；
```

2.2.5 弹出式验证码点击黑色背景回调

```
-(void)jdAFDCapVerifyOnTapColse;
```



## 3 、工程调试和接入说明

### 3.1 项目初始化

验证码SDK–JDAFDSDK项目分为Demo和SDK两部分 (内部开发调试)

1、非Pod模式

手动创建JDAFDSDK.xcworkspace，分别添加JDAFDSDKDemo.xcodeproj和JDAFDSDK.xcodeproj联合调试

2、Pod-target模式

本地拉下项目后执行~/JDAFDSDKDemo/podsUpdate.sh，生成JDAFDSDK.xcworkspace，确保添加JDAFDSDK.xcodeproj，并在Link Binary With Libraries添加JDAFDSDK.framework

3、Pod-Development 模式

修改~/JDAFDSDKDemo/Podfile文件切换到path引用



### 3.2 Framework编译

选择Scheme-->JDAFDSDKLib (聚合包)进行编译，自动执行Run Script脚本，会重新在Release模式下编译SDK和资源Bundle target，形成交叉包和资源文件输出到根目录的Products文件下

### 3.3 第三方接入与初始化

接入方APP，集成JDAFDSDK.framework进入项目中：

3.3.1 安全上报需要在- (BOOL)application:(UIApplication *)application didFinishLaunchingWithOptions:(NSDictionary *)launchOptions{}方法中注册调用：

```
[JDAFDJMAiOSClientService registerJMAWithAppid:@``"appid"``]; //传入业务方appid
```

3.3.2 验证码部分根据接入业务点调用

```
#import "JDAFDCapVerifyViewController.h"
  
@interface JDAFDCapVerifyViewController ()<JDAFDCapVerifyProtocol>  {
    JCapVerify *verify;
}
  
@end
  
@implementation JDAFDCapVerifyViewController
  
- (void)viewDidLoad {
  
    [super viewDidLoad];
  
//    每个单独的业务都需要单独跟验证码产品申请业务ID
  
    JDAFDCapParams *params = [JDAFDCapParams new];//此参数可空
  
    params.gpsLan = @"1.00";
  
    params.gpsLon = @"2.00";
  
    params.udid = @"openudid";
  
    verify = [[JDAFDCapVerify alloc] initWithEnvironmentType:JCapEnvironmentTypeRelease countryType:JCapAppCountryChina languageType:JCapLanguageType_zh params:params];
  
    verify.delegate = self;
}
  
  
-(void)action:(NSString *)sessionID {
    [dialog show];
    [verify showWebVerifyWithSession:sessionID initFinished:^{
        [dialog hidden];
    }];
}
  
#pragma mark -JDAFDCapVerifyProtocol委托实现方法
  
-(void)jdAFDCapVerifyCheckSuccess:(NSString *)vt{
  
    //验证成功
}
  
-(void)jdAFDCapVerifySessionExpried{
  
    //sid过期，业务可在此处重新请求sid，或者做别的事
  
}
 
@end
```