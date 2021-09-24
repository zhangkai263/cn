快速集成（iOS）
本文主要介绍如何快速地将京东云 JRTC_iOS SDK与JRTC_iOS_ReplayKitExt（iOS）集成到您的项目中，只要按照如下步骤进行配置，就可以完成 SDK 的集成工作。

开发环境要求

Xcode 9.0+。

JRTC_iOS SDK支持iOS 8.0 及以上版本的 iPhone 真机，如果使用录屏分享JRTC_iOS_ReplayKitExt则需要iOS 12.0及以上版本iPhone 真机。

项目已配置有效的开发者签名。

手动集成 JRTC_iOS SDK
JRTC_iOS SDK 当前只支持手动集成到您的项目中。您可以在京东云官网下载 SDK 再将其导入到您当前的工程项目中。

下载 JRTC_iOS SDK ，下载完成后，进行解压。

打开您的Xcode工程项目，选择要运行的target,选中 Build Phases项

![image](https://user-images.githubusercontent.com/89631429/134638696-1a70fa68-c5aa-4c4a-a1ef-469ce0135843.png)

单击 Link Binary with Libraries 项展开，单击底下的“+”号图标去添加依赖库。
![image](https://user-images.githubusercontent.com/89631429/134638744-191fa03e-0917-4e94-b153-cf3f3926c19a.png)

添加所下载的 JRTC_iOS SDK Framework。
![image](https://user-images.githubusercontent.com/89631429/134638766-a5c2588a-b749-476d-810f-765d0b8f7a9f.png)

设置Xcode Enable Bitcode 为 NO
打开您的Xcode工程项目，选择要运行的target,选中 Build Settings项，搜索Bitcode，将Enable Bitcode选项设置为NO。

![image](https://user-images.githubusercontent.com/89631429/134638792-c13cc69b-5876-4481-ac61-0718ecede2ae.png)

设置JRTC_iOS SDK Embed 为 Embed & Sign
打开您的Xcode工程项目，选择要运行的target,选中 General项，点击Frameworks,Libraries,and Embedded Content项展开， 选中JRTC_iOS.framework,将Embed 设置为 Embed & Sign。

![image](https://user-images.githubusercontent.com/89631429/134638849-88491d6d-e6df-4128-992a-6a7e1f829659.png)


授权摄像头和麦克风使用权限
使用 SDK 的音视频功能，需要授权麦克风和摄像头的使用权限。在 App 的 Info.plist 中添加以下两项，分别对应麦克风和摄像头在系统弹出授权对话框时的提示信息。

Privacy - Microphone Usage Description，并填入麦克风使用目的提示语。

Privacy - Camera Usage Description，并填入摄像头使用目的提示语。

![image](https://user-images.githubusercontent.com/89631429/134638905-18dc49d6-cc49-4c1f-a4ed-c40e60b82406.png)


引用 JRTC_iOS SDK  
Objective-C 通过  #import "JRTC_iOS/JRTC_iOS.h" 引用 JRTC_iOS SDK  





常见问题  
JRTC_iOS SDK 是否支持后台运行？ 支持，如需要进入后台仍然运行相关功能，可选中当前工程项目，在 Capabilities 下的设置 Background Modes 打开为 ON，并勾选 Audio，AirPlay and Picture in Picture和Voice over IP ，如下图所示：
![image](https://user-images.githubusercontent.com/89631429/134638943-fd2d5e64-6a1e-47b4-996f-2ad6ed8e65a9.png)
手动集成 JRTC_iOS_ReplayKitExt SDK  ——屏幕录制功能SDK
JRTC_iOS_ReplayKitExt SDK 为静态库，当前只支持手动集成到您的项目中。

1.打开您的Xcode工程项目，创建录屏Broadcast Upload Extension，如下图所示：

![image](https://user-images.githubusercontent.com/89631429/134638990-bce1a543-2090-4416-8338-c360edcb30ff.png)

2.将JRTC_iOS_ReplayKitExt SDK添加到您的工程中

选择创建好的Extension，点击Build Phases→Link Binary With Libraries ，点击“+”添加JRTC_iOS_ReplayKitExt与依赖的库
这里还需要导入依赖的lib库，如下图所示：
![image](https://user-images.githubusercontent.com/89631429/134639298-39d7bb3a-62c1-4571-bc82-7927605806f8.png)





设置Bundle Identifier与App Groups
这里的Bundle Identifier要与主App的Bundle Identifier前缀相同且有对应的后缀，App Groups为证书中添加的App Groups。

![image](https://user-images.githubusercontent.com/89631429/134639042-cfe029ec-dda4-40ef-b968-0fc24ccf5c38.png)


设定最顶支持版本为iOS 12.0并设置JRTC_iOS_ReplayKitExt SDK为Do Not Embed
点击工程的TARGETS，点击录屏分享Extension，点击General选择支持的最低版本，点击Frameworks and Libraries，设置JRTC_iOS_ReplayKitExt为Do Not Embed，如下图所示：

![image](https://user-images.githubusercontent.com/89631429/134639084-7245224b-0642-41c9-aaa7-d60cbc4a8f4d.png)

选择工程中录屏分享Extension对应的SampleHandler，进行录屏分享JRTC_iOS_ReplayKitExt的调用，如下图所示：
![image](https://user-images.githubusercontent.com/89631429/134639120-2d9e09f8-2b84-4e01-9bd1-892d5a86a70b.png)




