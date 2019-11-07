## SDK的使用  

**短视频SDK的基本使用流程**   

关于SDK使用时的接入步骤：
1、创建短视频接口类。
2、初始化短视频的默认参数。
3、设置预览窗口
4、添加视频、图片到时间线上
5、注册短视频代理，接收预览状态。
6、播放预览。
下面按照步骤分别介绍具体使用方法：  

**1.创建短视频接口类** 

JDMediaEdit类，为短视频SDK的核心类，提供所有视频编辑、预览和合成等等功能。
引入头文件#import <jdcloud_shortvideo_ios/JDMediaEdit.h>

@property (nonatomic,strong)JDMediaEdit* mediaEdit;                 

初始化底层短视频接口类。示例代码如下：
初始化之前设置默认参数和代理，详情参考6.2、6、6步骤。

self.mediaEdit = [[JDMediaEdit alloc] initWithPreviewConfig:previewConfig withDelegate:self];

**2.初始化短视频默认参数**  
JDMEPreviewConfig类配置短视频的默认参数，每个属性参数有一个对应的默认值，关于默认值和参数范围，参见JDMEPreviewConfig类提供的属性和方法。
初始化默认系统参数

JDMEPreviewConfig *previewConfig = [[JDMEPreviewConfig alloc] init];

其他预览参数设着，播放前后均可设置，接口示例代码如下：

//预览分辨率
 previewConfig.resolution = CGSizeMake(960, 540);
//预览帧率
previewConfig.frameRate = 30;

**3.设置预览窗口**    

@property (nonatomic,strong)UIView* playerView;

self.playerView = [[UIView alloc] initWithFrame:CGRectMake(50, 88, 200, 300)];
 _playerView.backgroundColor = [UIColor grayColor];
 [self.view addSubview:_playerView];

[_mediaEdit startPreview:_playerView];
                                                                               
**4.添加图片到时间线上**  
填写播放地址，播放器SDK支持RMVB、AVI、MKV、MP4、MOV等格式。

//修改一个工程中文件或者手机本地视频
NSURL *url1 = [NSURL fileURLWithPath:[[NSBundle mainBundle] pathForResource:@"yds01" ofType:@"mp4"]];
    AVURLAsset *asset1 = [AVURLAsset assetWithURL:url1];
    JDSMovieTimeLineItem* item = [[JDSMovieTimeLineItem alloc] initWithAsset:asset1];
   //添加
   [self.mediaEdit appendMovieTimeLineItem:item];

**5.注册短视频代理事件**  
引入<JDMediaEditDelegate>	播放器回调代理
播放器回调有二个，注册delegate可接受对应的回调，代码如下：

//播放状态发生改变
- (void)onPreviewStateChange:(JDMEPreviewState)statet；

//预览状态发生改变
- (void)onPreviewCurrentTimeChanged:(CMTime)time; 

//合成进度
- (void)onExportProgressChanged:(float)progress;

//缩略图更新
- (void)onThumbnailChanged:(JDSMovieTimeLineItem*)item thumbnail:(JDSThumbnail*)thumbnail;

**6.准备预览播放**  
短视频预览的控制接口，基本控制功能有播放、停止、暂停、Seek。更详细接口请参考接口文档。

//暂停
[self.mediaEdit pausePreview];
//停止，在开始播放之后调用
[self.mediaEdit stopPreview];
//播放
[self.mediaEdit playPreview];
//当前预览状态
[self.mediaEdit getCurrentPreviewState];
//预览时间点
[self.mediaEdit seekToTime:CMTimeMake(600, 600)];

