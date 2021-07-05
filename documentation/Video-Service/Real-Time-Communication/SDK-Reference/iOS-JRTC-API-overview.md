# iOS JRTC API接口说明  
# 1 JRTCCloud类
# 描述
JRTCCloud类是音视频会议开发最主要的类，提供了各种接口，供音视频会议App开发者调用

## JRTCCloud类基础方法

1. JRTCCloud类实例化单例

`+ (JRTCCloud *)sharedInstance;`

2. RTCCloud类销毁单例

`+ (void)destroySharedIntance;`

3. 是否没有插入耳机与连接蓝牙耳机，是的话，音频输出路由只能是听筒

`+ (BOOL)isNoHeadMicInsertedAndNoBluetoothMicAvaible;`

4. 房间事件的回调

您可以通过 JRTCCloudRoomDelegate 获得来自JRTC_iOS.Framework的各种房间状态通知，
详见 JRTCCloudRoomDelegate.h 中的定义

`@property(nonatomic,weak)id<JRTCCloudRoomDelegate> roomDelegate;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| roomDelegate    | JRTCCloudRoomDelegate    | 是  | 房间事件的各种回调    |

5. 网络事件的回调

视频会议中，网络状态发生变化时的回调，详见 JRTCCloudNetDelegate.h 中的定义

`@property(nonatomic,weak)id<JRTCCloudNetDelegate> netDelegate;`

属性说明:

| 属性名  | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| netDelegate   | JRTCCloudNetDelegate   | 是    | 网络事件的各种回调    |


6. 消息大厅消息事件的各种回调

消息大厅，接收消息事件的回调，详见 JRTCCloudMessageDelegate.h中的定义

`@property(nonatomic,weak)id<JRTCCloudMessageDelegate> messageDelegate`

属性说明:

| 属性名  | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| messageDelegate   | JRTCCloudMessageDelegate   | 是    | 消息大厅消息事件的各种回调    |


7. 初始化消息大厅

消息大厅发送消息，不必进入房间。参数错误的话，会收到JRTCCloudMessageDelegate中错误回调

`- (void)initJmsgMessageWithAuthModel:(JRTCEnterRoomAuthModel *)authModel;`

参数说明：

| 参数名  | 类型  | 是否必传  | 说明  |
|:----------|:----------|:----------|:----------|
| authModel   | JRTCEnterRoomAuthModel   | 是    | authModel 初始化消息大厅必须的认证信息，由京东云控制台相关接口下发   |

8. 开启/关闭 网络增强

只能在进入房间前进行设置，不设置的话，默认为NO

`- (void)enableNetWorkEnhance:(BOOL) enable;`

参数说明：

| 参数名  | 类型  | 是否必传  | 说明  |
|:----------|:----------|:----------|:----------|
| enable   | BOOL   | 否    | 是否打开网络增强功能   |

9. 加入房间

如果在调用加入房间前，调用了退出房间，则必须等退出房间finishBlock回调后，才能再次调用加入房间接口；
加入房间后，本地用户会收到JRTCCloudRoomDelegate中加入房间成功的消息回调，
同一房间内，远端用户会收到JRTCCloudRoomDelegate中有用户加入房间的回调消息。
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。
- 注意:只有处于未进入房间状态下，才能调用加入房间，否则调用无效。
- enterRoomModel 加入房间必传的参数，携带加入房间必须的鉴权信息，其中enterRoomModel中的authModel相关数据，由京东云控制台相关接口下发

`- (void)enterRoomWithEnterRoomModel:(JRTCEnterRoomModel *)enterRoomModel;`
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| enterRoomModel    | JRTCEnterRoomModel    | 是    | enterRoomModel 加入房间必传的参数，携带加入房间必须的鉴权信息，其中enterRoomModel中的authModel相关数据，由京东云控制台相关接口下发    |

10. 离开房间

本地用户调用离开房间后，同一房间内，远端用户会收到JRTCCloudRoomDelegate中用户离开房间的回调消息，
- 注意:只有处于已进入房间状态下，才能调用退出房间，否则调用无效。

`- (void)exitRoomWithFinishBlock:(FinishBlock)finishBlock;`
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| finishBlock    | FinishBlock    | 是    | 离开房间完成回调,只有离开房间后,才能再次调用加入房间接口   |

## JRTCCloud类视频相关方法

11. 设置视频编码器相关参数 

该设置决定了远端用户看到的画面质量及远端用户能否拉去大小画面视频流
该设置应该在调用 startLocalPreview:view:函数前设置
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。
如果不设置，本地视频默认分辨率为720P，帧率为15帧，默认不开启视频大小画面推流

`- (void)setCameraEncoderWithParam:(JRTCVideoEncParam*)param;`
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| param    | JRTCVideoEncParam    | 是    | 视频编码相关参数   |

12. 设置采集本地预览视频的前后摄像头，及视频要绘制展示的画面。

- 1.调用此接口前，先调用初始化消息大厅接口（initJmsgMessageWithAuthModel）或者进入房间接口（enterRoomWithEnterRoomModel），打开本地预览。否则本地用户会收不到JRTCCloudRoomDelegate中本地视频流视频第一帧宽高回调。加入房间成功后，会自动发布本地用户视频流，同一房间内，远端用户会收到JRTCCloudRoomDelegate中有视频流可以订阅的回调，远端用户可以根据可以订阅的视频流，来决定是否订阅对应视频流。打开本地预览，并发布本地用户视频流，同一房间内，远端用户会收JRTCCloudRoomDelegate中有视频流可以订阅的回调，远端用户可以根据可以订阅的视频流，来决定是否订阅对应视频流。
- 2.本地用户自己也会在视频流发布成功后，收到JRTCCloudRoomDelegate中本地视频流打开的回调消息，并且也会收到本地视频流视频第一帧宽高，通过宽高比，来决定如何展示。参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

- 3.本地用户加入房间后，调用此函数，发布视频流，如果发布视频流超时，会触发错误类型为JRTC_ERROR_CODE_PUBLISH_VIDEO_STREAM_TIMEOUT错误回调，超时时间15秒，本地用户可重新调用此函数，重新发布视频流。

```Object-C
- (void)startLocalPreviewWithFrontCamera:(BOOL)frontCamera
                                    view:(JRTCVideoView *)view;
```
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| frontCamera    | BOOL    | 是    | 视频采集前后摄像头    |
| view    | JRTCVideoView    | 是   | 视频绘制展示画面    |


13. 停止本地摄像头采集视频

调用此接口，出错时，本地用户会收到JRTCCloudRoomDelegate中的错误回调；
成功的话本地用户端不会收到任何回调，直接修改相关数据状态。
本地用户调用停止本地摄像头采集视频成功后，同一房间内，
远端用户会收到JRTCCloudRoomDelegate中有视频流不可以订阅的回调消息，
远端用户可以根据此视频流不可以订阅，来置空此条视频流相关信息。

`- (void)stopLocalPreview;`

14. 暂停/继续推送本地的视频数据

加入房间成功后，才可以调用此接口。
同一房间中，本地用户不会收到任何回调，
远端用户会收到JRTCCloudRoomDelegate中有视频流暂停或者继续的消息，
进而展示或者隐藏相应视频画面。

`- (void)muteLocalVideoWithMute:(BOOL)mute;`
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| mute    | BOOL    | 是    |   YES为暂停 NO为继续    |

15. 订阅远端视频流

加入房间成功后，才可调用此接口。同一房间中，订阅远端视频流成功后，
用户会收到JRTCCloudRoomDelegate中是否有
视频暂停或继续的回调消息，及视频画面第一帧宽高的回调消息。如果视频第一帧宽高都不为0，则可以展示此画面。
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。
本地用户加入房间后，调用此函数，订阅远端视频流，订阅视频流超时，会触发JRTC_ERROR_CODE_SUBSCRIBE_VEDIO_STREAM_TIMEOUT类型的错误回调，超时时间15秒，本地用户可重新调用此函数，重新订阅视频流。如果远端用户只发布了小画面视频流，本地用户订阅大小画面视频流无效，都会只订阅成功远端用户发布的视频流。
如果远端用户只发布了大画面视频流，本地用户订阅大小画面视频流会有效，会订阅成功远端用户发布的大小画面视频流。

- 本地用户加入房间后，调用此函数，订阅远端视频流，订阅视频流超时，会触发JRTC_ERROR_CODE_SUBSCRIBE_VEDIO_STREAM_TIMEOUT类型的错误回调，超时时间15秒，本地用户可重新调用此函数，重新订阅视频流。

```Object-C
- (void)startRemoteVideoWithVideoView:(JRTCVideoView *)videoView
                               peerID:(NSString *)peerId
                             streamID:(NSString *)streamId
                      streamModelType:(JRTC_VIDEO_STREAM_MODEL_TYPE)modelType
                           streamType:(JRTC_VIDEO_STREAM_TYPE)streamType;
```
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| videoView    | JRTCVideoView    | 是    | 远端视频流要绘制的画面    |
| peerId    | NSString    | 是   | 要订阅视频流对应的peerID    |
| streamId    | NSString    | 是   | 要订阅视频流对应的streamId    |
| modelType    | JRTC_VIDEO_STREAM_MODEL_TYPE    | 是   | 指定获取到视频流类型    |
| streamType    | JRTC_VIDEO_STREAM_TYPE    | 是   | 视频流类型，0为小画面视频流 1为大画面视频流    |

16. 切换大小画面流

加入房间成功后，才可调用此接口。
全屏展示视频时，可以选择视频流为大画面视频流，
小屏展示视频时，可选择视频流为小画面视频流，已达到减少耗电与节省流量。
此接口没有相应的成功失败回调，如果失败，则保持为切换前的大小画面视频流。
如果视频流大小画面切换成功，会触发onFirstVideoFrame视频帧宽高改变回调
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。
如果远端用户只发布了小画面视频流，本地用户切换远端用户大小画面视频流无效，都会只展示远端用户发布的视频流。
如果远端用户只发布了大画面视频流，本地用户切换远端用户大小画面视频流会有效，会展示远端用户发布的大小画面视频流。
注意:未订阅成功的视频流，禁止切换大小画面流。

```Object-C
- (void)changeVideoStreamWithPeerId:(NSString *)peerId
                      videoStreamId:(NSString *)videoStreamId
                    streamModelType:(JRTC_VIDEO_STREAM_MODEL_TYPE)modelType
                         streamType:(JRTC_VIDEO_STREAM_TYPE)streamType;
```
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| peerId    | NSString    | 是    | 视频流对应的peerId    |
| videoStreamId    | NSString    | 是   | 视频流    |
| modelType    | JRTC_VIDEO_STREAM_MODEL_TYPE    | 是   | 指定获取到视频流类型   |
| streamType    | JRTC_VIDEO_STREAM_TYPE    | 是   | 视频流类型，0为小画面视频流 1为大画面视频流    |



17. 取消订阅远端视频流，

加入房间成功后，才可调用此接口。
取消订阅成功后，本地用户会收到JRTCCloudRoomDelegate.h中对应视频流不可用回调，
进而更改相应UI展示。
调用此接口，出错时，本地用户会收到JRTCCloudRoomDelegate中的错误回调；
成功的话本地用户端不会收到任何回调，直接修改相关数据状态。
调完此接口后，videoView会展示为黑色画面。
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

```Object-C
- (void)stopRemoteVideoWithVideoView:(JRTCVideoView *)videoView
                              peerId:(NSString *)peerId
                            streamID:(NSString *)streamId;
```
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| videoView    | JRTCVideoView    | 是    | 远端视频流要取消绘制的画面    |
| peerId    | NSString    | 是   | 要取消订阅视频流对应的peerID    |
| streamId    | NSString    | 是   | 要取消订阅视频流对应的streamId    |

18. 暂停/继续订阅远端的视频数据。

加入房间成功后，才可调用此接口。
暂停的话通道不断，网络数据不收，本地用户不会收到回调消息，
同一房间中，对应远端用户画面会展示为远端视频流最后一帧画面。
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。
 
```Object-C
- (void)muteRemoteVideoWithStreamId:(NSString*)streamId
                               mute:(BOOL)mute;
```
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| streamId    | NSString    | 是    | 远端视频流streamId   |
| mute    | BOOL    | 是   |  YES为暂停 NO为继续    |

19. 暂停/继续订阅所有远端用户的视频数据。

加入房间成功后，才可调用此接口。
暂停的话通道不断，网络数据不收，本地用户不会收到回调消息，
同一房间中，远端所有用户画面会展示为视频流最后一帧画面。

`- (void)muteAllRemoteVideoStreamsWithMute:(BOOL)mute;`

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| mute    | BOOL    | 是   |  YES为暂停 NO为继续    |

20. 设置本地摄像头预览画面的镜像模式

`- (void)setLocalViewWithMirror:(BOOL)mirror;`
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| mirror    | BOOL    | 是   |  YES为镜像 NO为非镜像    |

## JRTCCloud类音频相关方法

21. 开启本地音频的采集

当本地用户加进房间成功后，会自动发布本地用户音频流，
推流成功后，本地用户会收到JRTCCloudRoomDelegate中本地音频流可用的回调消息，
远端用户会收到JRTCCloudRoomDelegate中有音频流可以订阅的回调，远端用户可以根据有音频流可以订阅，
来决定是否订阅此条音频流。

- 本地用户加入房间后，调用此函数，发布音频流，如果发布音频流超时，会触发错误类型为JRTC_ERROR_CODE_PUBLISH_AUDIO_STREAM_TIMEOUT错误回调，超时时间15秒，本地用户可重新调用此函数，重新发布音频流。


`- (void)startLocalAudio;`

22. 关闭本地音频的采集和上行

调用此接口，出错时，本地用户会收到JRTCCloudRoomDelegate中的错误回调；
成功的话本地用户端不会收到任何回调，直接修改相关数据状态。
远端用户会走JRTCCloudRoomDelegate中有音频流不可以订阅的回调，
远端用户可以根据有音频流不可以订阅，来置空此条音频流相关信息。

`- (void)stopLocalAudio;`

23. 订阅远端音频流

加入房间成功后，才可调用此接口。
订阅远端视频流后，订阅成功后，本地用户会收到JRTCCloudRoomDelegate中音频流继续、
音频流音量信息的回调消息。
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。
- 大房间模式下，用户不可订阅远端用户音频流。
- 本地用户加入房间后，调用此函数，订阅远端音频流，订阅音频流超时，会触发JRTC_ERROR_CODE_SUBSCRIBE_AUDIO_STREAM_TIMEOUT类型的错误回调，超时时间15秒，本地用户可重新调用此函数，重新订阅音频流。

```Object-C
- (void)startRemoteAudioWithPeerId:(NSString *)peerId
                          streamID:(NSString *)streamId;
```
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| peerId    | NSString    | 是   |  要订阅音频流对应的peerID    |
| streamId    | NSString    | 是   |  要订阅音频流对应的streamId   |


24. 取消订阅远端音频流

加入房间成功后，才可调用此接口。
调用此接口，出错时，本地用户会收到JRTCCloudRoomDelegate中的错误回调；
成功的话本地用户端不会收到任何回调，直接修改相关数据状态。
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。
- 注意:1.大房间模式下，本地用户不可取消订阅远端用户音频流。

```Object-C
- (void)stopRemoteAudioWithPeerId:(NSString *)peerId
                         streamID:(NSString *)streamId;
```
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| peerId    | NSString    | 是   |  要取消订阅音频流对应的peerID   |
| streamId    | NSString    | 是   |  要取消订阅音频流对应的streamId   |

25. 静音/取消静音本地的音频

加入房间成功后，才可调用此接口。
远端用户会收到JRTCCloudRoomDelegate中有音频流暂停或者继续的回调消息，
进而改变有关音频展示的UI，本地用户不会收到回调消息。

`- (void)muteLocalAudioWithMute:(BOOL)mute;`

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| mute    | BOOL    | 是   |  mute YES为静音 NO为取消静音  |

26. 静音/取消静音指定的远端用户的声音。

加入房间成功后，才可以调用此接口。
静音的话通道不断，网络数据不收，本地用户不会收到回调消息。
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

```Object-C
- (void)muteRemoteAudioStreamWithStreamId:(NSString *)streamId
                                     mute:(BOOL)mute;
```

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| streamId    | NSString   | 是   |  音频流streamId  |
| mute    | BOOL    | 是   |  YES为静音 NO为取消静音  |

27. 静音/取消静音所有远端用户的声音

加入房间成功后，才可以调用此接口。
静音的话通道不断，网络数据不收，本地用户不会收到回调消息。

`- (void)muteAllRemoteAudioStreamsWithMute:(BOOL)mute;`
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| mute    | BOOL    | 是   | YES为静音 NO为取消静音  |


## JRTCCloud类切换摄像头接口

28. 切换前后摄像头

`- (void)switchCamera;`


## JRTCCloud类美颜美白，滤镜相关接口

29. 设置美颜美白

参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。


`- (void)setBeautyWhiteLevelWithLeve:(int)level;`

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| level    | int    | 是   | 美颜美白级别只能是0-5。0的话代表不进行美颜美白处理  |


30. 获取美颜美白级别

`- (void)getBeautyWhiteLevelWithFinishBlock:(void(^)(int result))finishBlock;`

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| finishBlock    | void(^)(int result)    | 是   | 获取到的美颜美白级别回调 result为美颜美白级别，result 美颜美白级别只能是0-5。0的话代表不进行美颜美白处理  |


31. 设置滤镜级别

参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

`- (void)setFilterEffectIndexWithIndex:(int)index;`

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| index    | int  | 是   | 滤镜级别，滤镜级别只能是0-5。0的话代表不进行滤镜处理  |

32. 获取滤镜级别

`- (void)getFilterEffectIndexWithFinishBlock:(void(^)(int result))finishBlock;`

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| finishBlock    | void(^)(int result)  | 是   | 获取到的滤镜级别回调 result为滤镜级别，result 滤镜级别，滤镜级别只能是0-5。0的话代表不进行滤镜处理  |


33. 使用滤镜对原始图片进行滤镜渲染

参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。


```Object-C
- (void)getEffectImageWithEffectIndex:(NSInteger)effectIndex
                             preImage:(UIImage *)preImage
                          finishBlock:(void(^)(UIImage *image))finishBlock;
```
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| effectIndex    | NSInteger  | 是   | 设置滤镜级别，范围为0-5  |
| preImage    | UIImage  | 是   | 原始图片  |
| finishBlock    | void(^)(UIImage *image)  | 是   | 渲染完成后，生成新的图片的回调，image为新生成的图片  |


## JRTCCloud类修改昵称接口

注意：只能是进入房间成功后，才能修改昵称

34. 修改昵称

加入房间成功后，才可以调用此接口。
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

`- (void)changeNickNameWithNickName:(NSString *)nickName;`

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| nickName    | NSString  | 是   | 新的昵称  |


## JRTCCloud类监控开启与关闭接口

35. 开启与关闭监控
	
开启监控会走JRTCCloudRoomDelegate.h中状态统计信息的回调
- 注意:暂时只能在订阅远端流成功后，才能开启监控


```Object-C
- (void)enableStreamStatWithIsStat:(BOOL)isstat intervalSec:(NSInteger)intervalSec;
```

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| isstat    | BOOL  | 是   | 是否开启监控 YES为开启监控 NO为关闭监控  |
| intervalSec    | NSInteger  | 是   | 监控时间间隔  |

## JRTCCloud类获取版本号接口

36. 获取版本号
  
`+ (NSString *)getSDKVersion;`


## JRTCCloud类发送消息接口

37. 发送消息

发送消息，消息大厅和普通模式下，发送消息都调用此函数。
- 1. 消息大厅模式下，用户不必加进房间，发送消息后，远端用户会收到JRTCCloudMessageDelegate中的回调消息；
- 2. 普通模式下，用户必须加入房间，同一房间中，远端用户会走JRTCCloudRoomDelegate.h中消息接收回调。

```Object-C
- (void)sendMessageWithModel:(JRTCMessageModel *)messageModel
                 finishBlock:(SendMessageBlock)finishBlock;
```

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| messageModel    | JRTCMessageModel  | 是   | 消息内容,当messageModel中的toPeerID为空时，为广播消息；有值时为单独发给对应的远端用户  |
| finishBlock    | SendMessageBlock  | 是   | 发送消息完成回调  |

## JRTCCloud类混流接口

38. 开始混流任务

下发混流任务，混流成功后，本地用户会收到JRTCCloudRoomDelegate中混流成功的回调
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

```Object-C
- (void)startMixStreamWithSrcStreamInfos:(NSArray <JRTCMixSrcStreamModel*>*)srcStreamInfos
                          destStreamInfo:(JRTCMixDestStreamModel *)destStreamInfo
                         toPushStreamUrl:(NSString *)toPushStreamUrl;
```
参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| srcStreamInfos    | NSArray  | 是   | 源流信息列表  |
| destStreamInfo    | JRTCMixDestStreamModel  | 是   | 混流后 目标流id  |
| toPushStreamUrl    | NSString  | 非   | 推直播平台的推流地址，如果存在必须携带  |

39. 更新混流任务

只有已经混流成功的视频流，才可以调用此接口
更新混流成功后，本地用户会收到JRTCCloudRoomDelegate中更新混流成功的回调
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

```Object-C
- (void)updateMixStreamWithSrcStreamInfos:(NSArray <JRTCMixSrcStreamModel*>*)srcStreamInfos
                             destStreamId:(NSString *)destStreamId
                          toPushStreamUrl:(NSString *)toPushStreamUrl;
```

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| srcStreamInfos    | NSArray  | 是   | 源流信息列表  |
| destStreamInfo    | JRTCMixDestStreamModel  | 是   | 混流后 目标流id |
| toPushStreamUrl    | NSString  | 非   | 推直播平台的推流地址，如果存在必须携带  |

40. 关闭混流任务

本地用户不会收到任何回调
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

```Object-C
- (void)closeMixStreamWithDestStreamId:(NSString *)destStreamId
                       toPushStreamUrl:(NSString *)toPushStreamUrl;
```

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| destStreamId    | NSString  | 是   | 混流后 目标流id |
| toPushStreamUrl    | NSString  | 非   | 推直播平台的推流地址，如果存在必须携带  |

## JRTCCloud类会控接口

41. 远端用户全体静音或取消静音

加入房间成功后，才可以调用此接口。
同一房间内，本地用户不会收到回调消息；
远端所有用户都会收到JRTCCloudRoomDelegate.h房间静音或取消静音的回调消息。

`-(void)muteAllAudioWithIsMute:(BOOL)isMute;`

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| isMute    | BOOL  | 是   | 静音/取消静音 |

42. 单独静音或取消静音某个用户

加入房间成功后，才可以调用此接口。
同一房间内，房间中对应人员会收到JRTCCloudRoomDelegate.h静音或取消静音的回调。
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

```Object-C
-(void)mutePeerAudioWithIsMute:(BOOL)isMute
                        peerID:(NSString *)peerId;
```

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| isMute    | BOOL  | 是   |静音/取消静音 |
| peerId    | NSString  | 是   | 对应用户peerId |


43. 房间中禁止/允许开启视频

加入房间成功后，才可以调用此接口。
同一房间内，远端用户全部禁止/允许开启视频频流，本地用户不会收到回调消息；
远端所有用户都会收到JRTCCloudRoomDelegate.h中房间中禁止/允许开启视频流的回调。

`-(void)forbidAllVideoWithIsForbid:(BOOL)isForbid;`

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| isForbid    | BOOL  | 是   | 关闭或取消关闭推视频流 |


44. 远端用户禁止/允许开启视频流，

加入房间成功后，才可以调用此接口。
同一房间内，本地用户不会收到回调消息；
远端对应用户会收到JRTCCloudRoomDelegate.h单个用户禁止/允许开启视频流回调。
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

```Object-C
-(void)forbidPeerVideoWithIsForbid:(BOOL)isForbid
                            peerID:(NSString *)peerId;
```

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| isForbid    | BOOL  | 是   | 禁止/允许开启视频流 |
| peerId    | NSString  | 是   | 对应用户peerId |


45. 禁止/允许聊天

加入房间成功后，才可以调用此接口。
同一房间内，本地用户不会收到回调消息；
远端所有用户都会收到JRTCCloudRoomDelegate.h中房间中禁止/允许聊天回调。

`-(void)forbidChatWithIsForbid:(BOOL)isForbid;`

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| isForbid    | BOOL  | 是   | 禁止/允许聊天 |

46. 主持人结束会议

加入房间成功后，才可以调用此接口。
同一房间内，远端用户会收到JRTCCloudRoomDelegate.h中主持人结束会议回调。

`-(void)hosterFinishMeeting;`

47. 主持人离开房间时，产生新的主持人

加入房间成功后，才可以调用此接口。
同一房间内，远端用户会收到JRTCCloudRoomDelegate.h中产生新的主持人回调。
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

`-(void)creatNewHosterWithHosterPeerId:(NSString *)hosterPeerId;`

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| hosterPeerId    | NSString  | 是   | 新的主持人peerId |

48. 向整个房间发送自定义事件。

加入房间成功后，才可以调用此接口。
同一房间内，本地用户不会收到回调，
远端用户会收到JRTCCloudRoomDelegate.h中自定义房间事件回调
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

```Object-C
-(void)customSignalToRoomWithEventName:(NSString *)eventName
                             eventInfo:(NSDictionary *)info;
```

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| eventName    | NSString  | 是   | 自定义事件名称，不能为空 |
| info    | NSDictionary  | 是   | 事件需要携带的信息，不能为空 |


49. 向某个人发送自定义事件。

加入房间成功后，才可以调用此接口。
同一房间内，本地用户不会收到回调，
对应远端用户会收到JRTCCloudRoomDelegate.h中自定义事件回调
参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。

```Object-C
-(void)customSignalToPeerWithTargetPeerId:(NSString *)peerId
                                eventName:(NSString *)eventName
                                eventInfo:(NSDictionary *)info;
```

参数说明：

| 参数名   | 类型  | 是否必传 | 说明  |
|:----------|:----------|:----------|:----------|
| peerId    | NSString  | 是   | 接受事件人的peerId，不能为空 |
| eventName    | NSString  | 是   | 自定义事件名称，不能为空 |
| info    | NSDictionary  | 是   | 事件需要携带的信息，不能为空 |


# 2 各种回调事件

## 1.JRTCCloudRoomDelegate

## 描述 

视频会议房各种事件回调接口


1. 错误事件回调

```Object-C
-(void)onRoomError:(NSInteger)errorCode errorState:(NSString *)errorState errorInfo:(NSDictionary *)errorInfo;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| errorCode    | NSInteger   | 错误码    |
| errorState    | NSString   | 错误描述    |
| errorInfo    | NSDictionary  |  错误信息，可能为空    |

2. 加入房间成功回调

```Object-C
-(void)onRoomJoin:(NSDictionary *)peerInfosDict;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerInfosDict    | NSDictionary   | 房间中的所有用户信息   |

## 用户事件回调

3. 新用户加入房间回调
  @param      peerId   用户peerId
  @param      nickName 用户昵称
```Object-C
-(void)onRoomUserJoin:(NSString *)peerId nickName:(NSString *)nickName;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSString   | 用户peerId    |
| nickName    | NSString   | 用户昵称    |

4. 用户离开房间回调

```Object-C
-(void)onRoomUserLeave:(NSString *)peerId;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSString   | 用户peerId    |

## 流信息事件回调

5. 对于远端视频流对应为是否可订阅回调；对于用户自己的视频流，用户本地视频流推流成功后，本行用户会收到此回调，同时available为YES。

```Object-C
-(void)onUserVideoAvailableWithPeerId:(NSString *)peerId
                             streamId:(NSString *)streamId
                           streamName:(NSString *)streamName
                            available:(BOOL)available;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSString   | 用户peerId    |
| streamId    | NSString   |  视频流ID    |
| streamName    | NSString  |  视频流名称   |
| available    | BOOL  |   视频流是否可用    |

6. 对于远端音频流对应为是否可订阅回调；对于用户自己的音频流，用户本地音频流推流成功后，本行用户会收到此回调，同时available为YES。

```Object-C
-(void)onUserAudioAvailableWithPeerId:(NSString *)peerId
                             streamId:(NSString *)streamId
                           streamName:(NSString *)streamName
                            available:(BOOL)available;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSString   | 用户peerId    |
| streamId    | NSString   |  音频流ID    |
| streamName    | NSString  |  音频流名称   |
| available    | BOOL  |  音频流是否可用    |

7. 视频流暂停或者继续回调
 
```Object-C
-(void)onUserVideoMuteWithPeerId:(NSString *)peerId
                        streamId:(NSString *)streamId
                            mute:(BOOL)mute;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSString   | 用户peerId    |
| streamId    | NSString   |  视频流ID  |
| mute    | BOOL  |  视频流暂停或者继续   |

8. 音频流暂停或者继续回调

```Object-C
-(void)onUserAudioMuteWithPeerId:(NSString *)peerId
                        streamId:(NSString *)streamId
                            mute:(BOOL)mute;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSString   | 用户peerId    |
| streamId    | NSString   |  音频流ID  |
| mute    | BOOL  | 视频流暂停或者继续   |


9. 房间中有人正在说话的回调

```Object-C
-(void)onRoomUserVoiceActived:(NSString *)roomId
                       peerId:(NSString *)peerId
                       volume:(CGFloat)volume;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| roomId    | NSString   | 房间ID    |
| peerId    | NSString   | 用户peerId   |
| volume    | NSDictionary  | 音量，范围为0.0-1.0，值越大，表示音量越大  |

10. 视频流开始展示的第一帧宽高回调

	用户可以根据视频帧宽高比来展示相应的视频画面
        
```Object-C
-(void)onFirstVideoFrameWithPeerId:(NSString *)peerId
                          streamId:(NSString *)streamId
                             width:(CGFloat)width
                            height:(CGFloat)height;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSString   | 视频流对应的peerId   |
| streamId    | NSString   | 视频流ID，本地预览的时候，streamId为nil   |
| width    | CGFloat  |  视频帧宽度  |
| height    | CGFloat  |  视频帧高度   |

## 修改昵称回调

11. 有用户修改昵称回调

```Object-C
-(void)onRoomUserUpdateNickName:(NSString *)roomId
                         peerId:(NSString *)peerId
                       nickName:(NSString *)nickName;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| roomId    | NSString   | 房间ID    |
| peerId    | NSString   |  用户peerId  |
| nickName    | BOOL  | 用户新昵称   |

12. 状态统计信息回调

```Object-C
-(void)onStatusInfo:(NSDictionary *)statusInfo;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| statusInfo    | NSDictionary   | 状态统计信息 |

## 消息事件回调

13. 普通房间接收到广播消息回调

如果是自己发送给所有人，自己也会收到这条回调
    
```Object-C
-(void)onRecvMsgFromPeerId:(NSString *)peerId
                  nickName:(NSString *)nickName
                       msg:(NSString *)msg;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSString   | 发送消息者peerId    |
| nickName    | NSString   | 发送消息者昵称   |
| msg    | NSString  |  消息内容   |

## 混流回调
14. 混流成功回调

```Object-C
-(void)onRoomMixStreamWithDestStreamId:(NSString *)destStreamId;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| destStreamId    | NSString   | 生成混流的streamId   |


15. 更新混流成功回调

```Object-C
-(void)onRoomUpdateMixStreamWithDestStreamId:(NSString *)destStreamId;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| destStreamId    | NSString   | 更新后,生成混流的streamId  |

## 会议控制

16. 本地用户接收到向整个房间广播的静音或者取消静音回调
    
```Object-C
-(void)onAudioMuteToRoomWithIsMute:(BOOL)isMute
                        fromPeerId:(NSString *)peerId
                          nickName:(NSString *)nickName;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| isMute    | BOOL   | 静音或者取消静音   |
| peerId    | NSString   | 发出静音或者取消静音room的peerId  |
| nickName    | NSString  |  发出静音或者取消静音room的的nickName  |

17. 本地用户接收到被静音或者取消静音回调
 
```Object-C
-(void)onAudioMuteFromPeerWithIsMute:(BOOL)isMute
                          fromPeerId:(NSString *)peerId
                          nickName:(NSString *)nickName;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| isMute    | BOOL   | 静音或者取消静音   |
| peerId    | NSString   | 发送静音或者取消静音者的peerId   |
| nickName    | NSString  |  发送静音或者取消静音者的nickName   |

18. 本地用户接收到向整个房间广播的禁止或者取消禁止房间视频回调
  
```Object-C
-(void)onForbidVideoToRoomWithIsForbid:(BOOL)isForbid
                            fromPeerId:(NSString *)peerId
                              nickName:(NSString *)nickName;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| isForbid    | BOOL   | 禁止或者取消禁止房间视频  |
| peerId    | NSString   | 发出关闭或取消关闭房间视频的peerId  |
| nickName    | NSString  |   发出关闭或取消关闭房间视频的的nickName   |

19. 本地用户接收到被禁止或者取消禁止视频回调
     
```Object-C
-(void)onForbidVideoFromPeerWithIsForbid:(BOOL)isForbid
                              fromPeerId:(NSString *)peerId
                              nickName:(NSString *)nickName;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| isForbid    | BOOL   | 禁止或者取消禁止房间某个peerId的视频  |
| peerId    | NSString   | 发送关闭或取消关闭房间视频者的peerId   |
| nickName    | NSString  |  发送关闭或取消关闭房间视频者peerId对应的nickName   |

20. 本地用户接收到向整个房间广播禁言回调

```Object-C
-(void)onForbiddenChatToRoomWithPeerId:(NSString *)peerId
                              nickName:(NSString *)nickName;
```

参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSString   | 禁言房间聊天发出者peerId  |
| nickName    | NSString   | 禁言房间聊天发出者nickName  |

21. 本地用户接收到向整个房间取消禁言回调
     
```Object-C
-(void)onUnForbiddenChatToRoomWithPeerId:(NSString *)peerId
                                nickName:(NSString *)nickName;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSInteger   |关闭禁言房间聊天发出者peerId |
| nickName    | NSString   |  关闭禁言房间聊天发出者nickName  |

22. 本地用户接收到向整个房间广播的主持人结束会议回调

同一房间里所有人都会收到此回调

```Object-C
-(void)onHosterFinishMeeting;
```

23. 本地用户接收到向整个房间广播的产生新的主持人回调
   
```Object-C
-(void)onNewHosterCreatedWithPeerId:(NSString *)peerId;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSString   | 新的主持人peerId   |

24. 本地用户接收到向整个房间广播的自定义信令回调

同一房间里除了主持人，其他人都会收到此回调
         
```Object-C
-(void)onCustomSignalToRoomWithEventName:(NSString *)eventName
                                  peerId:(NSString *)peerId
                                nickName:(NSString *)nickName
                               eventInfo:(NSString *)info;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| eventName    | NSString   | 自定义事件名称   |
| peerId    | NSString   | 发出自定义广播信令者的peerId   |
| nickName    | NSString  |  发出自定义广播信令者的nickName   |
| info    | NSDictionary  |  自定义事件携带的信息，可以是普通字符串，也可以是可转化为json格式的字符串，客户端可根据自己需要获取相关信息    |


25. 本地用户接收到发送给本地用户的自定义信令回调
     
```Object-C
-(void)onCustomSignalToPeerWithEventName:(NSString *)eventName
                                  peerId:(NSString *)peerId
                                nickName:(NSString *)nickName
                               eventInfo:(NSString *)info;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| eventName    | NSString   | 自定义事件名称   |
| peerId    | NSString   | 发出自定义信令者的peerId   |
| nickName    | NSString  |  发出自定义信令者的nickName   |
| info    | NSDictionary  |  自定义事件携带的信息，可以是普通字符串，也可以是可转化为json格式的字符串，客户端可根据自己需要获取相关信息    |



## 2. JRTCCloudNetDelegate
## 描述 

视频通话网络事件回调接口

1. 网络连接状态错误回调

errorCode错误码，errorCode如果为JRTC_ERROR_CODE_NETWORK，SDK自动重新加入房间，
本地App层需要相应的正在重新加入房间弹框做提示，本地App需要清空订阅的远端信息，
本地App层不需要对本地音视频做特殊处理，可保持原状。
注意：远端画面会保持一段时间拉取不到远端画面视频流。

```Object-C
-(void)onNetErrorWithErrorCode:(NSInteger)errorCode errorState:(NSString *)errorState;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| errorCode    | NSInteger   | 错误码，errorCode如果为JRTC_ERROR_CODE_NETWORK，需重新加入房间   |
| errorState    | NSString   | 错误描述  |


2. 网络类型切换

```Object-C
-(void)onNetTypeChange:(JRTC_NetWorkType) type;
```

3. 网络状态发生变化

SDK自动重新加入房间，本地App层需要相应的正在重新加入房间弹框做提示，
本地App需要清空订阅的远端信息，本地App层不需要对本地音视频做特殊处理，可保持原状。
注意：远端画面会保持一段时间拉取不到远端画面视频流。

```Object-C
-(void)onNetStatusChanged;
```


## 3. JRTCCloudMessageDelegate
## 描述 

视频通话消息大厅事件回调接口

1. 消息大厅错误事件回调

```Object-C
-(void)messageOnErrorWithErrorCode:(NSInteger)errorCode errorState:(NSString *)errorState;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| errorCode    | NSInteger   | 错误码   |
| errorState    | NSString   | 错误描述  |


2. 消息大厅接收到广播事件回调
```Object-C
-(void)messageOnUserBroadcastMessageFromPeerID:(NSString *)peerId msg:(NSString *)msg;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSString   | 发送广播者peerId  |
| msg    | NSString   | 消息内容  |

3. 消息大厅接收到消息回调
```Object-C
-(void)messageOnUserSendMessageFromPeerWithPeerID:(NSString *)peerId msg:(NSString *)msg;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| peerId    | NSString   | 消息发送者peerId |
| msg    | NSString   | 消息内容  |


# 3 保存数据信息的模型类

## 1. JRTCEnterRoomModel类
## 描述

保存房间信息，包括加入房间鉴权认证所必须的信息，加入房间所需的设备信息

1. 鉴权认证信息

`@property(nonatomic,strong)JRTCEnterRoomAuthModel *authModel;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| authModel    | JRTCEnterRoomAuthModel    | 是  | 加入房间鉴权认证所必须的信息   |

2. 设备信息 

`@property(nonatomic,strong)JRTCEnterRoomDeviceModel *deviceModel;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| deviceModel    | JRTCEnterRoomDeviceModel    | 是  | 加入房间所需的设备信息    |

## 2. JRTCEnterRoomAuthModel类
## 描述

加入房间必传的鉴权信息

1. SDK版本

`@property(nonatomic,strong)NSString *ver;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| ver    | NSString    | 是  | SDK版本，由JRTCCloud中getSDKVersion获取到  |

2. 房间号

`@property(nonatomic,strong)NSNumber *roomId;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| roomId    | NSNumber    | 是  | 房间号 |

3. 用户peerId

`@property(nonatomic,strong)NSNumber *peerId;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| peerId    | NSNumber    | 是  | 用户peerId，用户京东账号登录成功后，控制台相关接口会下发peerId |

4. 用户昵称

`@property(nonatomic,strong)NSString *nickName;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| nickName    | NSString    | 是  | 用户昵称  |

5. appId 

`@property(nonatomic,strong)NSString *appId;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| appId    | NSString    | 是  | 用户在JRTC控制台申请JRTC SDK 接入时，appId由JRTC控制台生成  |

6. token 

`@property(nonatomic,strong)NSString *token;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| token    | NSString    | 是  | 用户在JRTC控制台申请JRTC SDK 接入时，token由JRTC控制台生成 |

7. userId 

`@property(nonatomic,strong)NSString *userId;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| userId    | NSString    | 是  | 第三方用户ID  |

8. 令牌随机码nonce

`@property(nonatomic,strong)NSString *nonce;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| nonce    | NSString    | 是  | 令牌随机码，用户在JRTC控制台申请JRTC SDK 接入时，nonce由JRTC控制台生成 |

9. 令牌过期时间戳timestamp(毫秒)，第三方用户生成，毕传

`@property(nonatomic,strong)NSString *timestamp;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| timestamp    | NSString    | 是  | 令牌过期时间戳(毫秒)，第三方用户生成 |

10. 房间类型roomType
`@property(nonatomic,strong)NSNumber *roomType;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| roomType    | NSNumber    | 是  | 房间类型roomType 1 小会议 2 大会议 3 MCU混音模式会议 4 视频连麦模式会议 5 音频连麦模式，|



## 3. JRTCEnterRoomDeviceModel类
## 描述

加入房间必传的设备信息

1. 设备ID

`@property(nonatomic,strong)NSString *deviceId;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| deviceId    | NSString    | 是  | 设备ID，设备MAC base64, 或者其他唯一信息 base64  |

2. 设备名称

`@property(nonatomic,strong)NSString *deviceName;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| deviceName    | NSString    | 是  | 设备名称 |

3. 设备类型

`@property(nonatomic,strong)NSString *deviceType;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| deviceType    | NSString    | 是  | 设备类型，IOS、MAC  |

4. 设备分类

`@property(nonatomic,strong)NSString *deviceMode;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| deviceMode    | NSString    | 是  | 设备分类，如iPhone，iPod touch |

5. 设备操作系统版本

`@property(nonatomic,strong)NSString *osVersion;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| osVersion    | NSString    | 是  | 设备操作系统版本 |




## 4. JRTCMessageModel类
## 描述

保存消息信息


1. JRTC_MESSAGE_MODE 

消息类型

```Object-C
typedef NS_ENUM(NSInteger, JRTC_MESSAGE_MODE) {
    JRTC_MESSAGE_MODE_NORMAL = 0,
    JRTC_MESSAGE_MODE_NEWSHALL = 1
};
```

枚举类型说明：

| 枚举类型  | 说明 | 
|:----------|:----------|
| JRTC_MESSAGE_MODE_NORMAL    | 普通消息类型   | 
| JRTC_MESSAGE_MODE_NEWSHALL   | 消息大厅类型   | 



2. fromPeerID

`@property(nonatomic,strong)NSString *fromPeerID;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| fromPeerID    | NSString    | 是  | 消息发送者peerID  |


3. toPeerID 

`@property(nonatomic,strong)NSString *toPeerID;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| toPeerID    | NSString    | 是  | 消息接受者peerID，为空时，为广播此条消息，不为空时为单聊  |


4. msg 

`@property(nonatomic,strong)NSString *msg;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| msg    | NSString    | 是  | 消息内容  |


5. messageMode  

`@property(nonatomic,assign)JRTC_MESSAGE_MODE messageMode;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| messageMode    | JRTC_MESSAGE_MODE    | 是  | 消息类型 |


6. roomId  

`@property(nonatomic,strong)NSString *roomId;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| roomId    | NSString    | 是  | 所在房间  |


## 5. JRTCMixSrcStreamModel类
## 描述

保存混流源数据信息


1. srcStreamId

`@property(nonatomic,strong)NSString *srcStreamId;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| srcStreamId    | NSString    | 是  | 源流id  |

2. srcStreamName

`@property(nonatomic,strong)NSString *srcStreamName;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| srcStreamName    | NSString    | 是  | 源流名称  |


## 6. JRTCMixDestStreamModel类
## 描述

保存混流目标数据信息


1. destStreamId

`@property(nonatomic,strong)NSString *destStreamId;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| destStreamId    | NSString    | 是  | 目标流id  |

2. destStreamName

`@property(nonatomic,strong)NSString *destStreamName;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| destStreamName    | NSString    | 非  | 目标流名称 |

3. streamLayout

`@property(nonatomic,strong)NSString *streamLayout;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| streamLayout    | NSString    | 非  | 流布局：TILED（平铺），PIC-IN-PIC（画中画） |

4. kind

`@property(nonatomic,strong)NSNumber *kind;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| kind    |  NSNumber    | 是  | 1:音频 2：视频， 3：音视 |

5. codec

`@property(nonatomic,strong)NSString *codec;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| codec    |  NSString    | 非 | 编码格式 默认h264 |

6. bitrate

`@property(nonatomic,strong)NSNumber *bitrate;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| bitrate    |  NSNumber    | 非  | 码率 |

7. frame

`@property(nonatomic,strong)NSNumber *frame;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| frame    |  NSNumber    | 非  | 帧率 |

8. resolution

`@property(nonatomic,strong)NSNumber *resolution;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| resolution    |  NSNumber    | 非  | 分辨率 720,360 |

9. ext

`@property(nonatomic,strong)NSString *ext;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| ext    |  NSString    | 非  | 扩展参数 |


## 8. JRTCVideoView类
## 描述

用于视频画面展示，继承自UIView

1. 设置视频背景画面颜色

```Object-C
-(void)setBackGroundColorWithColor:(UIColor *)color;
```
参数说明：

| 参数名   | 类型  |  说明  |
|:----------|:----------|:----------|
| color    | UIColor   |   视频背景颜色  |




# 4 JRTCCloudDef

# 描述 

JRTCCloudDef中声明各种枚举类型，及保存视频分辨率、帧率等信息的JRTCVideoEncParam类

1. 发送消息Block回调

普通房间发送消息完成回调与消息大厅发送消息完成回调，都会走此回调

`typedef void(^SendMessageBlock)(NSError *error,JRTCMessageModel *messageModel);`

block说明：

| block参数  |  类型 | 说明  |
|:----------|:----------|:----------|
| error    | NSError    | 发送失败信息    |
| messageModel    | JRTCMessageModel    | 发送的消息   |


2. JRTC_VIDEO_STREAM_MODEL_TYPE

指定下发视频流类型
自动下发大小画面视频流，下发的视频流类型不一定为指定的视频流类型。

```Object-C
typedef NS_ENUM(NSInteger, JRTC_VIDEO_STREAM_MODEL_TYPE) {
    JRTC_VIDEO_STREAM_MODEL_TYPE_AUTO   = 1,     
    JRTC_VIDEO_STREAM_MODEL_TYPE_FIX = 2,     
};
```
枚举类型说明：

| 枚举类型  | 说明 | 
|:----------|:----------|
| JRTC_VIDEO_STREAM_MODEL_TYPE_AUTO    | 自动下发大小画面视频流    | 
| JRTC_VIDEO_STREAM_MODEL_TYPE_FIX   | 固定下发指定的大小画面视频流    | 

3. JRTC_VIDEO_STREAM_TYPE

视频流类型
如果上行网络和性能比较好，则可以同时送出大小两路画面。
不支持单独开启小画面，小画面必须依附于主画面而存在。

```Object-C
typedef NS_ENUM(NSInteger, JRTC_VIDEO_STREAM_TYPE) {
    JRTC_VIDEO_STREAM_TYPE_BIG   = 1,     
    JRTC_VIDEO_STREAM_TYPE_SMALL = 0,      
};
```
枚举类型说明：

| 枚举类型  | 说明 | 
|:----------|:----------|
| JRTC_VIDEO_STREAM_TYPE_BIG    | 大画面视频流，用来传输摄像头的视频数据    | 
| JRTC_VIDEO_STREAM_TYPE_SMALL   | 小画面视频流，跟大画面的内容相同，但是分辨率和码率更低    | 


4. JRTC_VIDEO_RESOLUTION  

视频分辨率

```Object-C
typedef NS_ENUM(NSInteger, JRTC_VIDEO_RESOLUTION) {
    JRTC_VIDEO_RESOLUTION_720P = 0,//默认720P
    JRTC_VIDEO_RESOLUTION_360P = 1,
};
```
枚举类型说明：

| 枚举类型  | 说明 | 
|:----------|:----------|
| JRTC_VIDEO_RESOLUTION_720P    | 视频分辨率 720*1280，默认视频分辨率类型    | 
| JRTC_VIDEO_RESOLUTION_360P   | 视频分辨率360*640    | 


5. JRTC_ROOM_TEMPLATE 

房间模板

```Object-C
typedef NS_ENUM(NSInteger, JRTC_ROOM_TEMPLATE) {
    JRTC_ROOM_TEMPLATE_SIMPLE_MEETING = 1,
    JRTC_ROOM_TEMPLATE_BIG_MEETING = 2,
    JRTC_ROOM_TEMPLATE_MCU_METTING = 3,
    JRTC_ROOM_TEMPLATE_VIDEO_INTERACTIVE_LIVING = 4,
    JRTC_ROOM_TEMPLATE_AUDIO_INTERACTIVE_LIVING = 5,
};
```

| 枚举类型  | 说明 | 
|:----------|:----------|
| JRTC_ROOM_TEMPLATE_SIMPLE_MEETING    | 房间枚举类型，小会议，默认类型    | 
| JRTC_ROOM_TEMPLATE_BIG_MEETING   | 房间枚举类型，大会议    | 
| JRTC_ROOM_TEMPLATE_MCU_METTING   | 房间枚举类型，MCU会议    | 
| JRTC_ROOM_TEMPLATE_VIDEO_INTERACTIVE_LIVING   | 房间枚举类型，视频直播互动    | 
| JRTC_ROOM_TEMPLATE_AUDIO_INTERACTIVE_LIVING   | 房间枚举类型，音频直播互动    | 


7. JRTC_NetWorkType

网络类型
```Object-C
typedef NS_ENUM(NSInteger,JRTC_NetWorkType){
    NET_WORK_TYPE_UNKNOWN,
    NET_WORK_TYPE_ETHERNET,
    NET_WORK_TYPE_WIFI,
    NET_WORK_TYPE_CELLULAR,
    NET_WORK_TYPE_VPN,
    NET_WORK_TYPE_LOOPBACK,
    NET_WORK_TYPE_ANY,
};
```
| 枚举类型  | 说明 | 
|:----------|:----------|
| NET_WORK_TYPE_UNKNOWN    | 未知网络类型    | 
| NET_WORK_TYPE_ETHERNET   | 以太网    | 
| NET_WORK_TYPE_WIFI  | Wi-Fi    | 
| NET_WORK_TYPE_CELLULAR  | 移动流量    | 
| NET_WORK_TYPE_VPN  | VPN网络   | 
| NET_WORK_TYPE_WIFI  | 本地网络    | 
| NET_WORK_TYPE_WIFI  | 任意网络    | 



8. JRTC_ROOM_EXPIREMODE
  
房间过期类型

```Object-C
typedef NS_ENUM(NSInteger, JRTC_ROOM_EXPIREMODE) {
    JRTC_ROOM_EXPIREMODE_AT_LASTER_LEAVE = 1,
    JRTC_ROOM_EXPIREMODE_AT_ANY_TIME = 2,
    JRTC_ROOM_EXPIREMODE_IN_THE_END = 3,
};
```

| 枚举类型  | 说明 | 
|:----------|:----------|
| JRTC_ROOM_EXPIREMODE_AT_LASTER_LEAVE    | 最后离开者离开后过期，默认类型    | 
| JRTC_ROOM_EXPIREMODE_AT_ANY_TIME   | 设定某个时间过期    | 
| JRTC_ROOM_EXPIREMODE_IN_THE_END  | 永久不过期    | 


9. JRTC_VIDEO_FPS

视频帧率

```Object-C
typedef NS_ENUM(NSInteger,JRTC_VIDEO_FPS) {
    JRTC_VIDEO_FPS_15 = 0,
    JRTC_VIDEO_FPS_20 = 1,
    JRTC_VIDEO_FPS_25 = 2,
    JRTC_VIDEO_FPS_30 = 3,
};
```

| 枚举类型  | 说明 | 
|:----------|:----------|
| JRTC_VIDEO_FPS_15    | 频帧率枚举类型，15帧每秒，默认类型    | 
| JRTC_VIDEO_FPS_20   | 频帧率枚举类型，20帧每秒    | 
| JRTC_VIDEO_FPS_25  |  频帧率枚举类型，25帧每秒    | 
| JRTC_VIDEO_FPS_30  | 频帧率枚举类型，30帧每秒    | 


10. JRTC_ERROR

错误类型

```Object-C
typedef NS_ENUM(NSInteger, JRTC_ERROR) {
    JRTC_ERROR_CODE_NULL                            = 1,        

    
    JRTC_ERROR_CODE_ENTER_ROOM_VER_INVALID          = -120, 
    JRTC_ERROR_CODE_ENTER_ROOM_ROOMID_INVALID       = -121,       
    JRTC_ERROR_CODE_ENTER_ROOM_PEERID_INVALID       = -122, 
    JRTC_ERROR_CODE_ENTER_ROOM_NICKNAME_INVALID     = -123,            
    JRTC_ERROR_CODE_ENTER_ROOM_APPID_INVALID        = -124, 
    JRTC_ERROR_CODE_ENTER_ROOM_TOKEN_INVALID        = -125,  
    JRTC_ERROR_CODE_ENTER_ROOM_USERID_INVALID       = -126,         
    JRTC_ERROR_CODE_ENTER_ROOM_NONCE_INVALID        = -127,           
    JRTC_ERROR_CODE_ENTER_ROOM_TIMESTAMP_INVALID    = -128,            
    JRTC_ERROR_CODE_ENTER_ROOM_ROOMTYPE_INVALID     = -129,           
    JRTC_ERROR_CODE_ENTER_ROOM_DEVICEID_INVALID     = -130,            
    JRTC_ERROR_CODE_ENTER_ROOM_DEVICENAME_INVALID   = -131,           
    JRTC_ERROR_CODE_ENTER_ROOM_DEVICETYPE_INVALID   = -132,            
    JRTC_ERROR_CODE_ENTER_ROOM_DEVICEMODE_INVALID   = -133,           
    JRTC_ERROR_CODE_ENTER_ROOM_OSVERSION_INVALID    = -134,           
    JRTC_ERROR_CODE_INITJMSG_VER_INVALID            = -150, 
    JRTC_ERROR_CODE_INITJMSG_ROOMID_INVALID         = -151,           
    JRTC_ERROR_CODE_INITJMSG_PEERID_INVALID         = -152,            
    JRTC_ERROR_CODE_INITJMSG_NICKNAME_INVALID       = -153,            
    JRTC_ERROR_CODE_INITJMSG_APPID_INVALID          = -154,           
    JRTC_ERROR_CODE_INITJMSG_TOKEN_INVALID          = -155,            
    JRTC_ERROR_CODE_INITJMSG_USERID_INVALID         = -156,            
    JRTC_ERROR_CODE_INITJMSG_NONCE_INVALID          = -157,  
    JRTC_ERROR_CODE_INITJMSG_TIMESTAMP_INVALID      = -158,           
    JRTC_ERROR_CODE_INITJMSG_ROOMTYPE_INVALID       = -159,           

    JRTC_ERROR_CODE_MUTEPEERAUDIO_PEERID_INVALID    = -190,         

    JRTC_ERROR_CODE_FORBIDPEERVIDEO_PEERID_INVALID  = -191,           

    JRTC_ERROR_CODE_CREATNEWHOSTER_PEERID_INVALID   = -192,                   

    JRTC_ERROR_CODE_STARTLOCALPREVIEW_VIEW_INVALID  = -210,     
    JRTC_ERROR_CODE_STARTREMOTEVIDEO_VIDEOVIEW_INVALID = -220,     
    JRTC_ERROR_CODE_STARTREMOTEVIDEO_PEERID_INVALID    = -221,      
    JRTC_ERROR_CODE_STARTREMOTEVIDEO_STREAMID_INVALID  = -223,      
    JRTC_ERROR_CODE_STARTREMOTEVIDEO_MODEL_INVALID     = -224,       
    JRTC_ERROR_CODE_STARTREMOTEVIDEO_TYPE_INVALID      = -225,        

    JRTC_ERROR_CODE_STOPREMOTEVIDEO_PEERID_INVALID     = -230,        
    JRTC_ERROR_CODE_STOPREMOTEVIDEO_STREAMID_INVALID   = -231,        

    JRTC_ERROR_CODE_STARTREMOTEAUDIO_PEERID_INVALID    = -240,        
    JRTC_ERROR_CODE_STARTREMOTEAUDIO_STREAMID_INVALID  = -241,        

    JRTC_ERROR_CODE_STOPREMOTEAUDIO_PEERID_INVALID     = -250,         
    JRTC_ERROR_CODE_STOPREMOTEAUDIO_STREAMID_INVALID   = -251,       

    JRTC_ERROR_CODE_MUTEREMOTEVIDEO_STREAMID_INVALID   = -260,         

    JRTC_ERROR_CODE_MUTEREMOTEAUDIO_STREAMID_INVALID   = -261,  
    
    JRTC_ERROR_CODE_CHANGE_VIDEO_PEERID_INVALID   = -262,        
    JRTC_ERROR_CODE_CHANGE_VIDEO_STREAM_INVALID   = -263,        
    JRTC_ERROR_CODE_CHANGE_VIDEO_MODE_INVALID   = -264,        
    JRTC_ERROR_CODE_CHANGE_VIDEO_TYPE_INVALID   = -265,        
    JRTC_ERROR_CODE_CHANGE_VIDEO_SUBSTATUS_INVALID   = -266,    

    JRTC_ERROR_CODE_SETAUDIOROUTE_ROUTE_INVALID        = -270,        

    JRTC_ERROR_CODE_STARTMIX_SRC_INVALID   = -280,        
    JRTC_ERROR_CODE_STARTMIX_DES_INVALID   = -281,        
    JRTC_ERROR_CODE_UPDATEMIX_SRC_INVALID  = -282,        
    JRTC_ERROR_CODE_UPDATEMIX_DES_INVALID  = -283,         
    JRTC_ERROR_CODE_CLOSEMIX_DES_INVALID   = -284,        

    JRTC_ERROR_CODE_SETBEAUTY_LEVEL_INVALID = -290,        
    JRTC_ERROR_CODE_SETFILTER_INDEX_INVALID = -291,       

    JRTC_ERROR_CODE_CHANGENICK_NICKNAME_INVALID = -300,    

    JRTC_ERROR_CODE_ENABLESTREAMSTAT_INTERVALSEC_INVALID = -310,     

    JRTC_ERROR_CODE_GETEFFECTIMAGE_EFFECTINDEX_INVALID   = -320, 
    JRTC_ERROR_CODE_GETEFFECTIMAGE_PREIMAGE_INVALID      = -321,     
    
    JRTC_ERROR_CODE_NETCONNECT_CLOSED                    = -330,    
    
    JRTC_ERROR_CODE_CANSUL_NOPUBLISHED_VIDEO             = -340,   
    JRTC_ERROR_CODE_CANSUL_NOPUBLISHED_AUDIO             = -341,  

    JRTC_ERROR_CODE_PUBLISHING_OR_PUBLISHED_VIDEO        = -342,      
    JRTC_ERROR_CODE_PUBLISHING_OR_PUBLISHED_AUDIO        = -343,     
    
    JRTC_ERROR_CODE_CANSUL_SUB_AUDIO                     = -350,    
    JRTC_ERROR_CODE_CANSUL_UNSUB_AUDIO                   = -351,    
    
    JRTC_ERROR_CODE_NO_INROOM                            = -360,
    
    JRTC_ERROR_CODE_CUSTOMSIGNAL_TO_ROOM                 = -370,
    JRTC_ERROR_CODE_CUSTOMSIGNAL_TO_PEER                 = -371,
    JRTC_ERROR_CODE_JOIN_ROOM_STATE_ERROR            = -1000,     
    JRTC_ERROR_CODE_JOIN_ROOM_PARAM_NULL             = -1001,         
    JRTC_ERROR_CODE_JOIN_ROOM_INVALID_APP_ID         = -1002,           
    JRTC_ERROR_CODE_JOIN_ROOM_INVALID_ROOM_ID        = -1003,            
    JRTC_ERROR_CODE_JOIN_ROOM_INVALID_USER_ID        = -1004,            
    JRTC_ERROR_CODE_JOIN_ROOM_INVALID_TOKEN          = -1005,         
    JRTC_ERROR_CODE_JOIN_ROOM_REQUEST_TIMEOUT        = -1006,          
    JRTC_ERROR_CODE_JOIN_ROOM_SERVICE_SUSPENDED      = -1007,           
    JRTC_ERROR_CODE_JOIN_ROOM_NOT_EXIST              = -1008,          
    JRTC_ERROR_CODE_JOIN_ROOM_FULL                   = -1009,
    JRTC_ERROR_CODE_JOIN_ROOM_CONNECT_ERROR          = -1010,          
    JRTC_ERROR_CODE_JOIN_ROOM_NETWORK_ERROR          = -1011,            

    JRTC_ERROR_CODE_LEAVE_ROOM_REQUEST_TIMEOUT       = -1100,           
    JRTC_ERROR_CODE_LEAVE_ROOM_INVALID_ROOM_ID       = -1101,         
    JRTC_ERROR_CODE_LEAVE_ROOM_INVALID_PEER_ID       = -1102,        
    JRTC_ERROR_CODE_SUBSCRIBE_STREAM                 = -1200,          
    JRTC_ERROR_CODE_PUBLISH_STREAM                   = -1201,         
    JRTC_ERROR_CODE_STREAM_ALREADY_PUBLISH           = -1202,           
    JRTC_ERROR_CODE_PUBLISH_AUDIO_STREAM             = -1203,            
    JRTC_ERROR_CODE_PUBLISH_VIDEO_STREAM             = -1204,           
    JRTC_ERROR_CODE_PUBLISH_AUDIO_STREAM_TIMEOUT     = -1251,           
    JRTC_ERROR_CODE_PUBLISH_VIDEO_STREAM_TIMEOUT     = -1252,           
    JRTC_ERROR_CODE_SUBSCRIBE_AUDIO_STREAM_TIMEOUT   = -1253,          
    JRTC_ERROR_CODE_SUBSCRIBE_VEDIO_STREAM_TIMEOUT   = -1254,            
    

    JRTC_ERROR_CODE_CAMERA_START_FAIL                = -1300,           
    JRTC_ERROR_CODE_CAMERA_NOT_AUTHORIZED            = -1301,            
    JRTC_ERROR_CODE_CAMERA_SET_PARAM_FAIL            = -1302,           
    JRTC_ERROR_CODE_CAMERA_OCCUPY                    = -1303,            
    JRTC_ERROR_CODE_MIC_START_FAIL                   = -1304,            
    JRTC_ERROR_CODE_MIC_NOT_AUTHORIZED               = -1305,                
    JRTC_ERROR_CODE_MIC_SET_PARAM_FAIL               = -1306,            
    JRTC_ERROR_CODE_MIC_OCCUPY                       = -1307,            
    JRTC_ERROR_CODE_MIC_STOP_FAIL                    = -1308,          
    JRTC_ERROR_CODE_SPEAKER_START_FAIL               = -1309,            
    JRTC_ERROR_CODE_SPEAKER_SET_PARAM_FAIL           = -1310,           
    JRTC_ERROR_CODE_SPEAKER_STOP_FAIL                = -1311,            
    JRTC_ERROR_CODE_NETWORK                          = -1400,          
    JRTC_ERROR_CODE_NETWORK_REQUEST_TIMEOUT          = -1401,          
    JRTC_ERROR_CODE_SERVER_PARAMETER_INVALID         = -1500,             
    JRTC_ERROR_CODE_UNAUTHORIZED_OPERATION           = -1501,           
    JRTC_ERROR_CODE_PARAMETER_INVALID                = -1502,            
    JRTC_ERROR_CODE_OBJECT_NOT_FOUND                 = -1503,           
    JRTC_ERROR_CODE_REQUEST_INVALID                  = -1504,           
    JRTC_ERROR_CODE_INTERNAL_ERROR                   = -1505,            
    JRTC_ERROR_CODE_REPEATE_SUBMISSION               = -1506,         
    JRTC_ERROR_CODE_USER_NOT_FOUND                   = -1507,            
    JRTC_ERROR_CODE_VIDEO_ENCODE_FAIL                = -1600,                
    JRTC_ERROR_CODE_UNSUPPORTED_RESOLUTION           = -1601,           
    JRTC_ERROR_CODE_AUDIO_ENCODE_FAIL                = -1602,                 
    JRTC_ERROR_CODE_UNSUPPORTED_SAMPLERATE           = -1603,             
};
```
| 枚举类型  | 说明 | 
|:----------|:----------|
| JRTC_ERROR_CODE_NULL    | 无错误    | 
| JRTC_ERROR_CODE_ENTER_ROOM_VER_INVALID   | 进入房间ver不正确    | 
| JRTC_ERROR_CODE_ENTER_ROOM_ROOMID_INVALID  | 进入房间roomId不正确 |
| JRTC_ERROR_CODE_ENTER_ROOM_PEERID_INVALID  | 进入房间peerId不正确 |
| JRTC_ERROR_CODE_ENTER_ROOM_NICKNAME_INVALID  |  进入房间nickName不正确  |
| JRTC_ERROR_CODE_ENTER_ROOM_APPID_INVALID   | 进入房间appId不正确 |
| JRTC_ERROR_CODE_ENTER_ROOM_TOKEN_INVALID    | 进入房间token不正确 |
| JRTC_ERROR_CODE_ENTER_ROOM_USERID_INVALID   | 进入房间userId不正确 |
| JRTC_ERROR_CODE_ENTER_ROOM_NONCE_INVALID     | 进入房间nonce不正确 |
| JRTC_ERROR_CODE_ENTER_ROOM_TIMESTAMP_INVALID   | 进入房间timestamp不正确
| JRTC_ERROR_CODE_ENTER_ROOM_ROOMTYPE_INVALID   | 进入房间roomType不正确 |
| JRTC_ERROR_CODE_ENTER_ROOM_DEVICEID_INVALID    | 进入房间deviceId不正确 |
| JRTC_ERROR_CODE_ENTER_ROOM_DEVICENAME_INVALID  | 进入房间deviceName不正确 |
| JRTC_ERROR_CODE_ENTER_ROOM_DEVICETYPE_INVALID  | 进入房间deviceType不正确 | 
| JRTC_ERROR_CODE_ENTER_ROOM_DEVICEMODE_INVALID | 进入房间deviceMode不正确 |
| JRTC_ERROR_CODE_ENTER_ROOM_OSVERSION_INVALID   | 进入房间osVersion不正确 |
| JRTC_ERROR_CODE_INITJMSG_VER_INVALID  | 初始化消息大厅ver不正确 |
| JRTC_ERROR_CODE_INITJMSG_ROOMID_INVALID  | 初始化消息大厅roomId不正确 |
| JRTC_ERROR_CODE_INITJMSG_PEERID_INVALID        | 初始化消息大厅peerId不正确 |
| JRTC_ERROR_CODE_INITJMSG_NICKNAME_INVALID  | 初始化消息大厅nickName不正确 |
| JRTC_ERROR_CODE_INITJMSG_APPID_INVALID     | 初始化消息大厅appId不正确 |
| JRTC_ERROR_CODE_INITJMSG_TOKEN_INVALID | 初始化消息大厅token不正确 |
| JRTC_ERROR_CODE_INITJMSG_USERID_INVALID     | 初始化消息大厅userId不正确 |
| JRTC_ERROR_CODE_INITJMSG_NONCE_INVALID      | 初始化消息大厅nonce不正确 |
| JRTC_ERROR_CODE_INITJMSG_TIMESTAMP_INVALID  | 初始化消息大厅timestamp不正确 |
| JRTC_ERROR_CODE_INITJMSG_ROOMTYPE_INVALID    | 初始化消息大厅roomType不正确 |
| JRTC_ERROR_CODE_MUTEPEERAUDIO_PEERID_INVALID  | 静音peerpeerId不正确 |
| JRTC_ERROR_CODE_FORBIDPEERVIDEO_PEERID_INVALID | 禁止peer开视频peerId不正确 |
| JRTC_ERROR_CODE_CREATNEWHOSTER_PEERID_INVALID  | 产生新的主持人hosterPeerId不正确 |
| JRTC_ERROR_CODE_STARTLOCALPREVIEW_VIEW_INVALID  | 打开本地视频预览videoView不正确 |
| JRTC_ERROR_CODE_STARTREMOTEVIDEO_VIDEOVIEW_INVALID | 订阅远端视频videoView不正确 |
| JRTC_ERROR_CODE_STARTREMOTEVIDEO_PEERID_INVALID   | 订阅远端视频peerId不正确 |
| JRTC_ERROR_CODE_STARTREMOTEVIDEO_STREAMID_INVALID | 订阅远端视频streamId不正确 |
| JRTC_ERROR_CODE_STARTREMOTEVIDEO_MODEL_INVALID | 订阅远端视频MODEL不正确 |
| JRTC_ERROR_CODE_STARTREMOTEVIDEO_TYPE_INVALID   | 订阅远端视频TYPE不正确 |
| JRTC_ERROR_CODE_STOPREMOTEVIDEO_PEERID_INVALID  | 取消订阅远端视频peerId不正确 |
| JRTC_ERROR_CODE_STOPREMOTEVIDEO_STREAMID_INVALID | 取消订阅远端视频streamId不正确 |
| JRTC_ERROR_CODE_STARTREMOTEAUDIO_PEERID_INVALID   | 订阅远端音频peerId不正确 |
| JRTC_ERROR_CODE_STARTREMOTEAUDIO_STREAMID_INVALID | 订阅远端音频streamId不正确 |
| JRTC_ERROR_CODE_STOPREMOTEAUDIO_PEERID_INVALID  | 取消订阅远端音频peerId不正确 |
| JRTC_ERROR_CODE_STOPREMOTEAUDIO_STREAMID_INVALID  | 取消订阅远端音频streamId不正确 |
| JRTC_ERROR_CODE_MUTEREMOTEVIDEO_STREAMID_INVALID  | 暂停、继续订阅远端视频streamId不正确 |
| JRTC_ERROR_CODE_MUTEREMOTEAUDIO_STREAMID_INVALID | 暂停、继续订阅远端音频streamId不正确 |
| JRTC_ERROR_CODE_CHANGE_VIDEO_PEERID_INVALID | 切换远端视频订阅peerId不正确 |
| JRTC_ERROR_CODE_CHANGE_VIDEO_STREAM_INVALID | 切换远端视频订阅streamId不正确 |
| JRTC_ERROR_CODE_CHANGE_VIDEO_MODE_INVALID  | 切换远端视频订阅mode不正确 |
| JRTC_ERROR_CODE_CHANGE_VIDEO_TYPE_INVALID  | 切换远端视频订阅type不正确 |
| JRTC_ERROR_CODE_CHANGE_VIDEO_SUBSTATUS_INVALID  | 当前视频流未订阅成功，禁止切换远端视频订阅 |
| JRTC_ERROR_CODE_SETAUDIOROUTE_ROUTE_INVALID      | 设置音频路由route不正确 | 
| JRTC_ERROR_CODE_STARTMIX_SRC_INVALID   | 开始混流源流信息列表不正确 |
| JRTC_ERROR_CODE_STARTMIX_DES_INVALID   | 开始混流混流结果不正确 |
| JRTC_ERROR_CODE_UPDATEMIX_SRC_INVALID  | 更新混流源流信息列表不正确 |
| JRTC_ERROR_CODE_UPDATEMIX_DES_INVALID  | 更新混流destStreamId不正确 |
| JRTC_ERROR_CODE_CLOSEMIX_DES_INVALID  | 关闭混流destStreamId不正确 |
| JRTC_ERROR_CODE_SETBEAUTY_LEVEL_INVALID | 设置美颜美白level不正确 |
| JRTC_ERROR_CODE_SETFILTER_INDEX_INVALID | 设置滤镜级别index不正确 |
| JRTC_ERROR_CODE_CHANGENICK_NICKNAME_INVALID | 修改昵称nickName不正确 |
| JRTC_ERROR_CODE_ENABLESTREAMSTAT_INTERVALSEC_INVALID | 开启、关闭监控intervalSec不正确 |
| JRTC_ERROR_CODE_GETEFFECTIMAGE_EFFECTINDEX_INVALID   | 获取图片滤镜效果effectIndex不正确 |
| JRTC_ERROR_CODE_GETEFFECTIMAGE_PREIMAGE_INVALID  | 获取图片滤镜效果preImage不正确 |
| JRTC_ERROR_CODE_NETCONNECT_CLOSED   | 设备网络连接断开 |
| JRTC_ERROR_CODE_CANSUL_NOPUBLISHED_VIDEO  |  没有可以取消的视频流 |
| JRTC_ERROR_CODE_CANSUL_NOPUBLISHED_AUDIO  | 没有可以取消的音频流 |
| JRTC_ERROR_CODE_PUBLISHING_OR_PUBLISHED_VIDEO  | 本地视频流正在发布或者已发布 |
| JRTC_ERROR_CODE_PUBLISHING_OR_PUBLISHED_AUDIO  | 本地音频流正在发布或者已发布 |
| JRTC_ERROR_CODE_CANSUL_SUB_AUDIO     | 大房间模式，不允许用户订阅音频流 |
| JRTC_ERROR_CODE_CANSUL_UNSUB_AUDIO    | 大房间模式，不允许用户取消订阅音频流 |
| JRTC_ERROR_CODE_NO_INROOM   | 没有加入房间，不允许此操作(如订阅、取消订阅远端音视频、发送聊天消息、禁言其他人等) |
| JRTC_ERROR_CODE_CUSTOMSIGNAL_TO_ROOM  |    向房间发送自定义信令，参数错误 |
| JRTC_ERROR_CODE_CUSTOMSIGNAL_TO_PEER  |   向某个人发送自定义信令，参数错误 |
| JRTC_ERROR_CODE_JOIN_ROOM_STATE_ERROR  | 进房间房间状态错误 |
| JRTC_ERROR_CODE_JOIN_ROOM_PARAM_NULL   | 进房间参数为空 |
| JRTC_ERROR_CODE_JOIN_ROOM_INVALID_APP_ID  | 进房参数appId不正确 |
| JRTC_ERROR_CODE_JOIN_ROOM_INVALID_ROOM_ID  | 进房参数roomId不正确 |
| JRTC_ERROR_CODE_JOIN_ROOM_INVALID_USER_ID | 进房参数userId不正确 |
| JRTC_ERROR_CODE_JOIN_ROOM_INVALID_TOKEN  | 进房参数token不正确 |
| JRTC_ERROR_CODE_JOIN_ROOM_REQUEST_TIMEOUT | 进入房间请求超时 |
| JRTC_ERROR_CODE_JOIN_ROOM_SERVICE_SUSPENDED | 服务不可用 ,请检查是否欠费 |
| JRTC_ERROR_CODE_JOIN_ROOM_NOT_EXIST   | 房间不存在 |
| JRTC_ERROR_CODE_JOIN_ROOM_FULL   | 房间已满 |
| JRTC_ERROR_CODE_JOIN_ROOM_CONNECT_ERROR   | 加入房间连接失败 |
| JRTC_ERROR_CODE_JOIN_ROOM_NETWORK_ERROR   | 加入房间网络错误 |
| JRTC_ERROR_CODE_LEAVE_ROOM_REQUEST_TIMEOUT | 离开房间请求超时 |
| JRTC_ERROR_CODE_LEAVE_ROOM_INVALID_ROOM_ID | 离开房间请求参数roomId错误 |
| JRTC_ERROR_CODE_LEAVE_ROOM_INVALID_PEER_ID | 离开房间请求参数peerId错误 |
| JRTC_ERROR_CODE_SUBSCRIBE_STREAM  | 订阅流失败 |
| JRTC_ERROR_CODE_PUBLISH_STREAM   | 发布流失败（没进入房间直接发布流） |
| JRTC_ERROR_CODE_STREAM_ALREADY_PUBLISH | 流重复发布 |
| JRTC_ERROR_CODE_PUBLISH_AUDIO_STREAM  | 发布音频失败 |
| JRTC_ERROR_CODE_PUBLISH_VIDEO_STREAM  | 发布视频失败 |
| JRTC_ERROR_CODE_PUBLISH_AUDIO_STREAM_TIMEOUT | 发布音频流超时 |
| JRTC_ERROR_CODE_PUBLISH_VIDEO_STREAM_TIMEOUT | 发布视频流超时 |
| JRTC_ERROR_CODE_SUBSCRIBE_AUDIO_STREAM_TIMEOUT | 订阅音频流超时 |
| JRTC_ERROR_CODE_SUBSCRIBE_VEDIO_STREAM_TIMEOUT | 订阅视频流超时 |
| JRTC_ERROR_CODE_CAMERA_START_FAIL  | 打开摄像头失败，例如在 Windows 或 Mac 设备，摄像头的配置程序（驱动程序）异常，禁用后重新启用设备，或者重启机器，或者更新配置程序 |
| JRTC_ERROR_CODE_CAMERA_NOT_AUTHORIZED  | 摄像头设备未授权，通常在移动设备出现，可能是权限被用户拒绝了 |
| JRTC_ERROR_CODE_CAMERA_SET_PARAM_FAIL  | 摄像头参数设置出错（参数不支持或其它） |
| JRTC_ERROR_CODE_CAMERA_OCCUPY   | 摄像头正在被占用中，可尝试打开其他摄像头 |
| JRTC_ERROR_CODE_MIC_START_FAIL | 打开麦克风失败，例如在 Windows 或 Mac 设备，麦克风的配置程序（驱动程序）异常，禁用后重新启用设备，或者重启机器，或者更新配置程序 |
| JRTC_ERROR_CODE_MIC_NOT_AUTHORIZED  | 麦克风设备未授权，通常在移动设备出现，可能是权限被用户拒绝了 |
| JRTC_ERROR_CODE_MIC_SET_PARAM_FAIL | 麦克风设置参数失败 |
| JRTC_ERROR_CODE_MIC_OCCUPY | 麦克风正在被占用中，例如移动设备正在通话时，打开麦克风会失败 |
| JRTC_ERROR_CODE_MIC_STOP_FAIL  | 停止麦克风失败 |
| JRTC_ERROR_CODE_SPEAKER_START_FAIL  | 打开扬声器失败，例如在 Windows 或 Mac 设备，扬声器的配置程序（驱动程序）异常，禁用后重新启用设备，或者重启机器，或者更新配置程序 |
| JRTC_ERROR_CODE_SPEAKER_SET_PARAM_FAIL  | 扬声器设置参数失败 |
| JRTC_ERROR_CODE_SPEAKER_STOP_FAIL | 停止扬声器失败 |
| JRTC_ERROR_CODE_NETWORK   | 设备已连接网络，但网络连接异常 |
| JRTC_ERROR_CODE_NETWORK_REQUEST_TIMEOUT  | 网络请求超时 |
| JRTC_ERROR_CODE_SERVER_PARAMETER_INVALID | 服务端返回参数错误 |
| JRTC_ERROR_CODE_UNAUTHORIZED_OPERATION | 无权操作 |
| JRTC_ERROR_CODE_PARAMETER_INVALID  | 参数错误 |
| JRTC_ERROR_CODE_OBJECT_NOT_FOUND  | 找不到对象 |
| JRTC_ERROR_CODE_REQUEST_INVALID | 请求错误 |
| JRTC_ERROR_CODE_INTERNAL_ERROR  | 内部错误 |
| JRTC_ERROR_CODE_REPEATE_SUBMISSION | 重复提交 |
| JRTC_ERROR_CODE_USER_NOT_FOUND  | 未找到目标用户 |
| JRTC_ERROR_CODE_VIDEO_ENCODE_FAIL  | 视频帧编码失败，例如 iOS 设备切换到其他应用时，硬编码器可能被系统释放，再切换回来时，硬编码器重启前，可能会抛出 |
| JRTC_ERROR_CODE_UNSUPPORTED_RESOLUTION  | 不支持的视频分辨率 |
| JRTC_ERROR_CODE_AUDIO_ENCODE_FAIL  | 音频帧编码失败，例如传入自定义音频数据，SDK 无法处理 |
| JRTC_ERROR_CODE_UNSUPPORTED_SAMPLERATE | 不支持的音频采样率 |


## JRTCVideoEncParam类保存视频分辨率、帧率等信息 

11. 视频分辨率

`@property(nonatomic,assign)JRTC_VIDEO_RESOLUTION videoResolution;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| videoResolution    | JRTC_VIDEO_RESOLUTION    | 是  | 视频推流分辨率，默认720P  |

12. 帧率

`@property(nonatomic,assign)JRTC_VIDEO_FPS videoFps;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| videoFps    | JRTC_VIDEO_FPS    | 是  | 视频推流帧率，默认15帧  |

13. 是否开启多路推流

`@property(nonatomic,assign)BOOL enableMultiStream;`

属性说明:

|   属性名   | 属性类型  | 是否必须设置  | 说明  |
|:----------|:----------|:----------|:----------|
| enableMultiStream    | BOOL    | 是  | 是否开启多路推流，默认为NO，不开启多路推流  |
