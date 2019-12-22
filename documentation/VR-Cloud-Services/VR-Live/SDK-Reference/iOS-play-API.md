## SDK的使用  
VR视频播放SDK的基本使用流程如下：  
1.配置VR视频播放配置管理对象。  
2.用设置配置管理对象初始化VR视频播放管理器。   
3.用VR视频播放管理器切换视频是否开启鱼眼。  
 
**配置VR视频播放管理对象** 

JDCloudVRConfiguration类配置VR视频播放，每个函数参数有一个对应的默认值，关于默认值和参数范围，参考API文档或注释。可以根据需求调用相应的函数，修改对应的功能。JDCloudVRConfiguration类的对象提供初始化VR视频播放管理类，VR视频播放管理类初始化后，不支持再次调用JDCloudVRConfiguration对象相应的函数。

使用：   
在需要使用VR播放视频的ViewController中引用头文件 #import“JDCloudVRLibrary.h”，示例代码如下：    
```
//生成JDCloudVRConfiguration实例对象
JDCloudVRConfiguration *config = [[JDCloudVRConfiguration alloc] init];

//** 以下设置交互模式，播放模式，是否接受手势都有默认值，可不设置 **//
//如果播放器是JDCloudPlayer的实例对象，则调用asVideoWithIJKSDLGLView:函数设置JDCloudPlayer播放器对象的playerView为视频源，
//如果播放器是AVPlayer的实例对象，则调用asVideo:函数传相应的playerItem作为参数。

[config asVideoWithIJKSDLGLView:self.jdCloudPlayer.playerView];

//设置播放器对象的playerView所在的ViewController和View
[config setContainer:self.mySuperController view:self.mySuperView];

//设置VR视频播放模式为眼镜模式，默认为普通模式
[config displayMode:JDCloudModeDisplayGlass];

//设置VR视频交互模式为同时手势和移动交互，默认为同时手势交互
[config interactiveMode:JDCloudModeInteractiveMotionWithTouch];

//设置VR视频支持手势，默认不支持手势
[config pinchEnabled:true];  
```

**用设置配置管理对象初始化VR视频播放管理器**  

JDCloudVRLibrary类，为VR视频播放管理类，切换VR视频开启与关闭鱼眼功能。  
引入头文件#import“JDCloudVRLibrary.h” 
```
@property (nonatomic, strong) JDCloudVRLibrary *vrLibrary;//vr视频播放管理接口类。
```
在配置好VR视频播放配置对象后，可以使用VR视频播放SDK中JDCloudVRLibrary类的initWithConfiguration方法进行初始化。示例代码如下：
```
self.vrLibrary = [[JDCloudVRLibrary alloc] initWithConfiguration:config];
```  
**用VR视频播放管理器切换视频是否开启鱼眼**   

当点击相应的切换时候开启或者关闭鱼眼播放时，可以使用 JDCloudVRLibrary类的setAntiDistortionEnabled方法进行开启或者关闭。示例代码如下：
```
[self.vrLibrary setAntiDistortionEnabled:isAntiDistortion];
```                                                                                
