## SDK的使用  

**短视频SDK的基本使用流程**   

关于SDK使用时的接入步骤：  
1、创建短视频接口类。  
2、初始化短视频的默认参数。  
3、设置预览窗口。  
4、添加视频、图片到时间线上。  
5、注册短视频代理，接收预览状态。  
6、播放预览。  
下面按照步骤分别介绍具体使用方法：    

**1.创建短视频接口类** 

JDMediaEdit类，为短视频SDK的核心类，提供所有视频编辑、预览和合成等等功能。
```
引入头文件#import <jdcloud_shortvideo_ios/JDMediaEdit.h>

@property (nonatomic,strong)JDMediaEdit* mediaEdit;                 
```

初始化底层短视频接口类。示例代码如下：
初始化之前设置默认参数和代理，详情参考2、6步骤。
```
self.mediaEdit = [[JDMediaEdit alloc] initWithPreviewConfig:previewConfig withDelegate:self];
```

**2.初始化短视频默认参数**    

JDMEPreviewConfig类配置短视频的默认参数，每个属性参数有一个对应的默认值，关于默认值和参数范围，参见JDMEPreviewConfig类提供的属性和方法。
初始化默认系统参数
```
JDMEPreviewConfig *previewConfig = [[JDMEPreviewConfig alloc] init];
```
其他预览参数设着，播放前后均可设置，接口示例代码如下：
```
//预览分辨率
 previewConfig.resolution = CGSizeMake(960, 540);
//预览帧率
previewConfig.frameRate = 30;
```

**3.设置预览窗口**    
```
@property (nonatomic,strong)UIView* playerView;

self.playerView = [[UIView alloc] initWithFrame:CGRectMake(50, 88, 200, 300)];
 _playerView.backgroundColor = [UIColor grayColor];
 [self.view addSubview:_playerView];

[_mediaEdit startPreview:_playerView];
```

**4.添加图片到时间线上**   

填写播放地址，播放器SDK支持RMVB、AVI、MKV、MP4、MOV等格式。
```
//修改一个工程中文件或者手机本地视频
NSURL *url1 = [NSURL fileURLWithPath:[[NSBundle mainBundle] pathForResource:@"yds01" ofType:@"mp4"]];
    AVURLAsset *asset1 = [AVURLAsset assetWithURL:url1];
    JDSMovieTimeLineItem* item = [[JDSMovieTimeLineItem alloc] initWithAsset:asset1];
   //添加
   [self.mediaEdit appendMovieTimeLineItem:item];
```

**5.注册短视频代理事件**   

引入<JDMediaEditDelegate>	播放器回调代理
播放器回调有二个，注册delegate可接受对应的回调，代码如下：
```
//播放状态发生改变
- (void)onPreviewStateChange:(JDMEPreviewState)statet；

//预览状态发生改变
- (void)onPreviewCurrentTimeChanged:(CMTime)time; 

//合成进度
- (void)onExportProgressChanged:(float)progress;

//缩略图更新
- (void)onThumbnailChanged:(JDSMovieTimeLineItem*)item thumbnail:(JDSThumbnail*)thumbnail;
```

**6.准备预览播放**   

短视频预览的控制接口，基本控制功能有播放、停止、暂停、Seek。
```
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
```

**7.编辑模块**   

短视频的编辑可以进行一下功能的设置，设置接口在JDMediaEdit类中有详细备注，详细解释和示例代码如下：    
7.1 添加  
1、在一个item之前插入  
```
/*!
 @abstract   在一个item之前插入一个时间线item
 @param      item  要插入的item
 @param      referenceItem  参考的item
 @result     成功返回YES，失败返回NO
 */
- (BOOL)insertMovieTimeLineItem:(JDSMovieTimeLineItem*)item beforeItem:(JDSMovieTimeLineItem*)referenceItem;
```

2、在一个item之后插入  
```
/*!
 @abstract   在一个item之后插入一个时间线item
 @param      item  要插入的item
 @param      referenceItem  参考的item
 @result     成功返回YES，失败返回NO
 */
- (BOOL)insertMovieTimeLineItem:(JDSMovieTimeLineItem*)item afterItem:(JDSMovieTimeLineItem*)referenceItem;
```

3、在尾部追加  
```
/*!
 @abstract   在尾部添加时间线item
 @param      item  要添加的item
 @result     成功返回YES，失败返回NO
 */
- (BOOL)appendMovieTimeLineItem:(JDSMovieTimeLineItem*)item;
```

7.2 裁剪  
```
/*!
 @abstract   设置视频裁剪的起始时间和终止时间
 @param      item  时间线item
 @param      startTime 起始时间，变速后
 @param      endTime 起始时间，变速后
 @result     成功返回YES，失败返回NO
 */
- (BOOL)clipMovieTimeLineItem:(JDSMovieTimeLineItem*)item withStartTime:(CMTime)startTime endTime:(CMTime)endTime
```

7.3 分割  
```
/*!
 @abstract   分割一个movie item
 @param      time  分割时间点
 */
- (BOOL)splitMovieItemAtTime:(CMTime)time   
```

7.4 复制  
```
/*!
 @abstract   复制一个movie item，并放在后面
 @param      item  时间线item
 */
- (BOOL)copyMovieTimeLineItem:(JDSMovieTimeLineItem*)item;
```

7.5 变速  
```
/*!
 @abstract   设置播放速率
 @param      rate  播放速率
 @result     成功返回YES，失败返回NO
 */
- (BOOL)setMovieTimeLineItem:(JDSMovieTimeLineItem*)item withRate:(double)rate
```

7.6 旋转  
```
/*!
 @abstract   设置滤镜名称
 @param      item  时间线item
 @result     成功返回YES，失败返回NO
 */
- (BOOL)setMovieTimeLineItem:(JDSMovieTimeLineItem*)item withRotationMode:(GPUImageRotationMode)rotationMode
```

7.7 删除  
```
/*!
 @abstract   删除一个时间线item
 @param      item  要删除的item
 @result     成功返回YES，失败返回NO
 */
- (BOOL)removeMovieTimeLineItem:(JDSMovieTimeLineItem *)item
```

**8.滤镜**

设置不同的滤镜效果，filternName区分，我们目前支持六种不同风格的滤镜。
```
/*!
 @abstract   设置滤镜名称
 @param      item  时间线item
 @result     成功返回YES，失败返回NO
 */
- (BOOL)setMovieTimeLineItem:(JDSMovieTimeLineItem*)item withVideoFilterName:(NSString*)filterName

//回显跟酒该item的属性filternName是否又值
item.filternName
```
**9.字幕、贴纸**

贴纸可以增加动态和静态贴纸，暂提供10种素材、字幕支持缩放、拖动、删除等。
```
/*!
 @abstract   获取所有水印字幕时间线Item数组
 @result     返回所有水印字幕时间线Item数组
 */
- (NSArray *)getLayerTimeLineItemArray;
/*!
 @abstract   获取某个时间点的水印字幕时间线Item数组
 @param      time  时间点
 @result     返回某个时间点的水印字幕时间线Item数组
 */
- (NSArray *)getLayerTimeLineItemArrayAtTime:(CMTime)time;
/*!
 @abstract   添加水印字幕时间线Item
 @param      timeLineItem  时间线 timeLineItem
 @result     成功返回YES，失败返回NO
 */
- (BOOL)addLayerTimeLineItem:(JDSLayerTimeLineItem *)timeLineItem;
/*!
 @abstract   移除水印字幕时间线Item
 @param      timeLineItem  时间线timeLineItem
 @result     成功返回YES，失败返回NO
 */
- (BOOL)removeLayerTimeLineItem:(JDSLayerTimeLineItem *)timeLineItem;
/*!
 @abstract   修改水印字幕时间线Item在时间线上的时间范围
 @param      timeLineItem  时间线timeLineItem
 @param      timeRangeInWhole  水印字幕时间线Item在时间线上的时间范围
 @result     成功返回YES，失败返回NO
 */
- (BOOL)setLayerTimeLineItem:(JDSLayerTimeLineItem *)timeLineItem
        withTimeRangeInWhole:(CMTimeRange)timeRangeInWhole;

/*!
 @abstract   修改水印字幕是否可编辑
 @param      timeLineItem  时间线timeLineItem
 @param      canEdit  时间线timeLineItem是否可编辑
 @result     成功返回YES，失败返回NO
 */
- (BOOL)setLayerTimeLineItem:(JDSLayerTimeLineItem *)timeLineItem
                 withCanEdit:(BOOL)canEdit;

/*!
 @abstract   开始编辑水印字幕
 @param      timeLineItem  开始编辑的时间线timeLineItem
 */
- (void)beginEditTimeLineItem:(JDSLayerTimeLineItem *)timeLineItem;
/*!
 @abstract   结束编辑水印字幕
 @param      timeLineItem  结束编辑的时间线timeLineItem
 */
- (void)endEditTimeLineItem:(JDSLayerTimeLineItem *)timeLineItem;
```

**10.背景音乐**

音乐可对原声和背景音乐的音量进行设置，可以选择不同的音乐，支持选择音乐加入的范围，支持增加多段音乐。
```
/*!
 @abstract   获取所有背景音乐数组
 @result     返回所有背景音乐数组
 */
- (NSArray *)getBGMTimeLineItemArray;
/*!
 @abstract   获取某个时间点的背景音乐数组
 @param      time  时间点
 @result     返回某个时间点的背景音乐数组
 */
- (NSArray *)getBGMTimeLineItemArrayAtTime:(CMTime)time;
/*!
 @abstract   添加背景音乐
 @param      timeLineItem  时间线timeLineItem
 @result     成功返回YES，失败返回NO
 */
- (BOOL)addBGMTimeLineItem:(JDSBGMTimeLineItem *)timeLineItem;
/*!
 @abstract   移除背景音乐
 @param      timeLineItem  时间线timeLineItem
 @result     成功返回YES，失败返回NO
 */
- (BOOL)removeBGMTimeLineItem:(JDSBGMTimeLineItem *)timeLineItem;
/*!
 @abstract   修改背景音乐在时间线上的时间范围与背景音乐相对于自己的开始与播放时长
 @param      timeLineItem  时间线timeLineItem
 @param      timeRangeInWhole  景音乐在时间线上的时间范围
 @param      timeRangeInAsset  背景音乐相对于自己的开始与播放时长
 @result     成功返回YES，失败返回NO
 */
- (BOOL)setBGMTimeLineItem:(JDSBGMTimeLineItem *)timeLineItem
      withTimeRangeInWhole:(CMTimeRange)timeRangeInWhole
      withTimeRangeInAsset:(CMTimeRange)timeRangeInAsset;

/*!
 @abstract   设置背景音乐播放速率
 @param      item  时间线item
 @param      rate  背景音乐播放速率
 @result     成功返回YES，失败返回NO
 */
- (BOOL)setBGMTimeLineItem:(JDSBGMTimeLineItem*)item withRate:(double)rate;

/*!
 @abstract   设置背景音乐是否静音
 @param      timeLineItem  时间线item
 @param      mute  是否静音 YES 为静音 NO 为正常音量播放
 */
- (void)setBGMTimeLineItem:(JDSBGMTimeLineItem *)timeLineItem
                  WithMute:(BOOL)mute;

/*!
 @abstract   设置背景音乐音量
 @param      timeLineItem  时间线item
 @param      volume  背景音乐音量
 */
- (void)setBGMTimeLineItem:(JDSBGMTimeLineItem *)timeLineItem
                WithVolume:(double)volume;
```
**11.合成**

合成时先配置合成参数，然后调用接口，回调中可以查看合成进度。
```
/*!
 @abstract  开始合成
 @param config 合成输出配置对象
 */
-(void)startExportWithConfig:(JDMEOutputConfig*)config;

/*!
 @abstract  媒体编辑合成进度变化回调
 @param progress 当前进度
 */
- (void)onExportProgressChanged:(float)progress;

/*!
 @abstract  媒体编辑合成完成回调
 */
- (void)onExportFinish;

/*!
 @abstract  媒体编辑合成取消
 */
- (void)onExportCancel;
```
