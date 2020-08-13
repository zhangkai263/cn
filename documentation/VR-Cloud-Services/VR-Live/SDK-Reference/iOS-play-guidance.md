## 阅读对象
本文档面向所有使用京东云VR视频播放SDK的开发、测试人员等, 要求读者具有一定的iOS编程开发经验。
## 运行环境
**支持平台**  
SDK支持iOS 8.0以上系统
硬件CPU支持arm64  
**开发环境**  
SDK编译环境Xcode 8.0及以上版本   
Xcode运行环境OS X 10.10 及以上版本

## 版本说明  
**迭代**  
当前版本为1.0.0，为基础版本。    

## 快速集成  
本章节提供一个快速集成京东云VR视频播放SDK基础功能的示例。 
具体可以参考demo工程中的相应文件。  
**下载工程**   
iOS端VR播放器SDK请<a href="https://zhanghao274.s3.cn-north-1.jdcloud-oss.com/VR/iOS/VR-SDK.zip">点击下载</a>  
**工程目录结构**   
推流SDK的工程目录如下：包含头文件headers与lib。  
![](https://github.com/jdcloudcom/cn/blob/cn-VR-Cloud-Services/image/VR-Cloud-Services/VR%E6%92%AD%E6%94%BE%E5%99%A8SDK-iOS1.png)  
**配置项目**  
1.手动导入SDK。从Demo中拷贝VRLibrary，导入拖入您的Xcode工程中    
![](https://github.com/jdcloudcom/cn/blob/cn-VR-Cloud-Services/image/VR-Cloud-Services/VR%E6%92%AD%E6%94%BE%E5%99%A8SDK-iOS2.png)      
2.在 Building Setting > Valid Architectures 删除armv7、armv7s，只保留arm64。    
![](https://github.com/jdcloudcom/cn/blob/cn-VR-Cloud-Services/image/VR-Cloud-Services/VR%E6%92%AD%E6%94%BE%E5%99%A8SDK-iOS3.png)      
3.在 Building Setting > Enable Bitcode 修改为 NO。  
![](https://github.com/jdcloudcom/cn/blob/cn-VR-Cloud-Services/image/VR-Cloud-Services/VR%E6%92%AD%E6%94%BE%E5%99%A8SDK-iOS4.png)   
4.在 Building Setting > Other Linker Flags增加-all_load。  
![](https://github.com/jdcloudcom/cn/blob/cn-VR-Cloud-Services/image/VR-Cloud-Services/VR%E6%92%AD%E6%94%BE%E5%99%A8SDK-iOS5.png)   

