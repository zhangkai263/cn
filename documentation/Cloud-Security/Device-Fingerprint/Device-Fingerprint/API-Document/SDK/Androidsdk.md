# 设备指纹SDK Android接入

本文档介绍了设备指纹服务SDK（Android系统）的接入流程。

## 一． 权限说明

需要外部应用提供，SDK中没有主动申请权限

| 权限内容                                  | 是否必选       | 备注                                                         |
| :---------------------------------------- | :------------- | :----------------------------------------------------------- |
| android.permission.INTERNET               | 是             | 没有该权限将导致SDK功能不可用。                              |
| android.permission.ACCESS_NETWORK_STATE   | 是             | 没有该权限将导致SDK功能不可用。                              |
| android.permission.ACCESS_WIFI_STATE      | 否（推荐赋予） | 该部分权限在Android 6.0以上系统中需要动态获取。如果您要启用相关权限，那么在接入设备风险SDK并调用init初始化接口之前，确保您的App已经被授予了相关权限。 |
| android.permission.ACCESS_COARSE_LOCATION | 否（推荐赋予） | 该部分权限在Android 6.0以上系统中需要动态获取。如果您要启用相关权限，那么在接入设备风险SDK并调用init初始化接口之前，确保您的App已经被授予了相关权限。 |
| android.permission.ACCESS_FINE_LOCATION   | 否（推荐赋予） | 该部分权限在Android 6.0以上系统中需要动态获取。如果您要启用相关权限，那么在接入设备风险SDK并调用init初始化接口之前，确保您的App已经被授予了相关权限。 |
| android.permission.WRITE_EXTERNAL_STORAGE | 否（推荐赋予） | 该部分权限在Android 6.0以上系统中需要动态获取。如果您要启用相关权限，那么在接入设备风险SDK并调用init初始化接口之前，确保您的App已经被授予了相关权限。 |
| android.permission.READ_EXTERNAL_STORAGE  | 否（推荐赋予） | 该部分权限在Android 6.0以上系统中需要动态获取。如果您要启用相关权限，那么在接入设备风险SDK并调用init初始化接口之前，确保您的App已经被授予了相关权限。 |
| android.permission.READ_PHONE_STATE       | 否（推荐赋予） | 该部分权限在Android 6.0以上系统中需要动态获取。如果您要启用相关权限，那么在接入设备风险SDK并调用init初始化接口之前，确保您的App已经被授予了相关权限。 |

## 二．添加lib库到项目中

1. [下载Android SDK](https://eid-console.jdcloud.com/settings/access)，并完成解压。SDK为Android标准的.aar包。添加到android工程相应moudle的libs目录里

2. 在相应moudle的build.gradle中添加编译依赖

   ```
   compile fileTree(dir: 'libs', include: ['*.aar]) *
   ```


## 三．混淆配置

```
-keep public class com.jd.sec.** {*;}
```

## 四． 接口说明

1. 初始化 

  ```
  InitParams initParams = new InitParams.InitParamsBuilder()
       .acceptPrivacy(true)// 隐私协议是否授权，sdk中涉及采集mac和applist等
       .host("https://eid-api.jdcloud.com")//设置host
       .appKey("xxx")//设置appkey
       .userPin("xxx")//设置userPin
       .build();
  //同步接口，初始化过程中有网络请求等操作，要在子线程调用
  LogoManager.getInstance(this.getApplicationContext()).init(initParams);
  //异步接口
  LogoManager.getInstance(getApplicationContext()).initInBackground(initParams);
  ```

  

2. 获取指纹，同步接口无耗时操作

   ```
   /**
   
   获取指纹函数 <br>
   
   * <p>
      *
   
      @return 指纹字符串结构{“status”:100,”eid”:”mfoa”}，其中status=100表示因为网络原因或者认证原因导致的初始化失败。eid字段为本地指纹。status=200表示初始化成功，正确的获取到了服务端指纹。
   
      @see LogoModuleManager
      */
   
   String eidJson = LogoManager.getInstance(this.getApplicationContext()).getLogo();
   ```

3. 开启/关闭log输出

   ```
   /**
   
    * 设置指纹SDK是否为调试模式 <br>
   
    * <p>
   
    * <strong>Warning: 正式发布时，请设置为false </strong>
      *
   
    * @param debug if true will print log,
      */
   
   LogoManager.getInstance(this.getApplicationContext()).setDebugMode(false);
   ```

   