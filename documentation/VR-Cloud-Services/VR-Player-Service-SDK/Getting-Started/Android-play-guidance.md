## 阅读对象
本文档面向所有使用京东云VR播放器SDK的开发、测试等人员, 要求读者具有一定的Android编程开发经验。  

## 运行环境
•	最低支持版本为Android 5.0 (API level 21)  

## 版本说明
* **迭代**  
当前版本为1.0.0，为基础版本。  

## 快速集成
本章节提供一个快速集成京东云播放器SDK基础功能的示例。

* **获取SDK和demo**  
Android端VR播放器SDK请<a href="https://zhanghao274.s3.cn-north-1.jdcloud-oss.com/VR/Android/jdcvrplayer.jar">点击下载</a><br/>  

* **工程目录结构**  
demo: 示例工程，演示本SDK主要接口功能的使用   
libs: 集成SDK需要的库文件   
libs/jdcvrplayer.jar: SDK jar包  
 

* **配置项目**    
配置好播放器sdk后, 将libs目录下的库文件jdcvrplayer.jar引入到目标工程中并添加依赖。   
可参考下述配置方式（以Android Studio为例）：   
1)导入SDK  
手动集成：   
将libs目录copy到目标工程的libs下；   
2)修改proguard(混淆)文件，添加如下规则：
```
-keep class com.jdcloud.vrlib.** {
  *;
}
```   
  3)在AndroidManifest.xml文件中申请相应权限   
  添加了集成播放器所需要的权限后，不需要额外添加权限。

