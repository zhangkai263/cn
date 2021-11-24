# Android JRTC API概览

## 1.JRTCCloud

+ ### 基础方法

    - #### sharedInstance

        创建JRTCBase单例

        static JRTCBase sharedInstance( Context context )
        | 参数 | 说明|
        | --- | ---|
        | context | Android上下文,内部会转为ApplicationContext用于系统API调用 |

        - ##### return

                JRTCCloud 实例

    - #### setNetListener

        设置网络状态回调接口 JRTCNetListener，用户获得来自JRTC 信令服务器网络状态通知

+ ### 房间相关

    - #### init

        初始化接口，用于启动native sdk

    - #### enterRoom

        进入房间，成功会收到 JRTRoomCListener::onEnterRoom

        void enterRoom(JRTCJoinRoomInfo info, JRTCRoomListener listener)

        |参数|说明|
        |---|---|
        |joinroomInfo|JRTCJoinRoomInfo{<br>ver : 版本号<br>roomId : 房间号<br>peerId : 用户标号<br>nickName : 昵称<br>appId : appid<br>token : token<br>userId : userid<br>nonce : nonce<br>timestamp : 时间戳<br>roomType : 房间类型<br>}<br>用户token计算<br><a href="https://docs.jdcloud.com/cn/real-time-communication/sdk/generate-user-token">生成Token</a>
        |listener|设置回调接口 JRTCRoomListener，用户获得来自JRTC的各种状态通知|

    - #### exitRoom

        退出房间

        - ##### 注意

            - 调用 exitRoom() 接口会执行退出房间的相关逻辑，例如释放音视频设备资源和编解码器资源等。 待资源释放完毕，SDK 会通过JTRTListener::onExitRoom() 回调通知到您。

            - 如果您要再次调用 enterRoom() 或者切换到其他的音视频 SDK，请等待 onExitRoom() 回调到来之后再执行相关操作。 否则可能会遇到摄像头或麦克风被占用等各种异常问题，例如常见的 Android 媒体音量和通话音量切换问题等等。

+ ### 视频相关

    - #### startLocalPreview

        开启本地视频的预览画面，并且当用户成功进入房间后会自动进行发布

        void startLocalPreview( JRTCVideoView view )

    - #### stopLocalPreview

        停止本地视频采集和预览，并停止发布

    - #### stopLocalPreview

        void stopLocalPreview( JRTCVideoView view )

        移除显示，不停止发布

    - #### startRemoteView

        开始置顶远端用户视频画面，并显示在指定的JRTCVideoView上

        用户成功进入房间后会收到JRTRoomCListener::onUserVIdeoAvailable()回调通知，该通知表示远端用户发布/取消了一条视频流，这个回调会带有远端用户的peerid以及发布的流streamid

        void startRemoteView(int peerId, String streamId, int streamType, JRTCVideoVIew view)

        |参数|说明|
        |---|---|
        |peerId|远端用户的peerId|
        |streamId|远端用户的streamId|
        |streamType|JRTCVideoStreamType<br>JRTC_VIDEO_STREAM_TYPE_SMALL 小流<br>JRTC_VIDEO_STREAM_TYPE_MIDDLE中流<br>JRTC_VIDEO_STREAM_TYPE_BIG 大流<br>JRTC_VIDEO_STREAM_TYPE_AUTO 自动|
        |view|指定渲染远端用户的videoView|

    - #### stopRemoteView

        void stopRemoteView(int peerId, String streamId)

        停止显示远端用户视频画面，同时不再拉取该远端用户的视频流数据
        调用此接口后SDK会停止接受远端用户的视频流，同时会清理相关的视频显示资源
        |参数|说明|
        |---|---|
        |peerId|远端用户id|
        |streamId|远端用户发布的流|

    - #### stopRemoteView

        void stopRemoteView(int peerId, String streamId, JRTCVideoView view)

        停止指定远端视图的显示，如果当前流不在任何一个视图上，那么会取消拉取视频数据

    - #### muteLocalVideo

        暂停/恢复推送本地的视频数据

        当暂停推送本地视频后，房间里的其他成员将会收到 onUserVideoMute(streamId, false)回调通知

        当恢复推送本地视频后，房间里的其他成员将会收到 onUserVideoMute(streamId, true)回调通知

        |参数|说明|
        |---|---|
        |mute|true:暂停 false:恢复|

    - #### muteRemoteVideoStream

        暂停/恢复 接收远端的视频数据

        该接口仅暂停/恢复接受指定的远端用户的视频流，但并不释放显示资源，所以如果暂停，视频画面会冻屏在mute前的最后一帧

        |参数|说明|
        |---|---|
        |streamId|远端用户的流id|
        |mute|true:暂停 false:恢复|

    - #### muteAllRemoteVideoStream

        暂停/恢复 全部的远端视频数据

        该接口 暂停全部的远端用户的视频流，但并不释放显示资源，所以如果暂停，视频画面会冻屏在mute前的最后一帧

        |参数|说明|
        |---|---|
        |mute|true:暂停 false:恢复|

+ ### 音频相关

    - #### startLocalAudio

        开启本地音频的采集和上行
    - #### stopLocalAudio

        关闭本地音频采集和上行
    - #### startRemoteAudio

        订阅远端用户发布的音频流

        用户成功进入房间后会收到JRTRoomCListener::onUserAudioAvailable()回调通知，该通知表示远端用户发布/取消了一条音频流，这个回调会带有远端用户的peerid以及发布的流streamid

        |参数|说明|
        |---|---|
        |peerId|远端用户id|
        |streamId|远端用户发布的音频流|

    - #### stopRemoteAudio

        停止订阅远端用户发布的音频流
        |参数|说明|
        |---|---|
        |peerId|远端用户id|
        |streamId|远端用户发布的流|

    - #### muteLocalAudio

        暂停/恢复 推送本地音频数据

        当暂停推送本地视频后，房间里的其他成员将会收到 onUserAudioMute(streamId, false)回调通知

        当恢复推送本地视频后，房间里的其他成员将会收到 onUserAudioMute(streamId, true)回调通知

        |参数|说明|
        |mute|true:暂停 false:恢复|

    - #### muteRemoteAudioStream

        暂停/恢复 接收远端的音频数据

        该接口仅暂停/恢复接受指定的远端用户的音频流，但并不释放显示资源

        |参数|说明|
        |---|---|
        |streamId|远端用户的流id|
        |mute|true:暂停 false:恢复|
    - #### muteAllRemoteAudioStream

        暂停/恢复 全部的远端音频数据

        该接口 暂停全部的远端用户的音频流

        |参数|说明|
        |---|---|
        |mute|true:暂停 false:恢复|

+ ### 摄像头

    - #### switchCamera

        切换前后摄像头

+ ### 自定义采集

    - #### setLocalVideoFrameListener

        设置视频帧数据的原始数据监听，通过此监听可以修改采集到的帧数据，之后做编码及预览的数据都以此接口处理过的最终数据为准

+ ### 消息

    - #### sendMessage

        发送消息
        |参数|说明|
        |---|---|
        |msg|Message{<br>Integer targetId;要发送的目标ID(如果为null,则直接向房间内发送；不为null，指定发送给某一用户)<br>ConversationType type;要发送到的回话类型:<br>1.RTC_ROOM(直播间消息,需要进入会议房间后才可以发送成功)<br>2.BROADCAST(消息大厅全局广播)<br>3.BROADCAST_SINGLE(消息大厅单聊，在消息大厅中发送给某一个人)<br>MessageContent content;      要发送的内容,目前只支持文本消息TextMessage<br>}

        样例:<br>TextMessage textMessage = TextMessage.obtain("test message");<br>ConversationType type = ConversationType.RTC_ROOM;<br>Message message = Message.obtain(targetId,  type, textMessage);<br>jcloud.sendMessage(message, new JRTCSendMessageListener() {<br>public void onSuccess(Message message){}<br>public void onError(Message message, int errorCode){}<br>})

    - #### setReceiveMessageListener

        设置消息监听,服务器下发了消息

        |参数|说明|
        |---|---|
        |listener|JRTCReceiveMessageListener{<br>void onReceived(Message message);<br>}|

        样例:<br>jrtcCloud.setReceiveMessageListener(new JRTCReceiveMessageListener()  {<br>public void onReceived(Message message){<br>UserInfo sendInfo = message.getContent().getUserInfo;<br>if(sendInfo != null){<br>int peerId = sendInfo.getPeerId();     //发送者的peerId<br>String nickName = sendInfo.getNickName();//  发送者的昵称<br>}<br>if(message.getContent() instanceOf TextMessage){<br>String msg = ((TextMessage)message.getContent).getContent(); //发送内容<br>}<br>ConversationType type = message.getConversationType();  // 会话类型<br>}<br>
        });

+ ### 控制

    - #### sendControlSignal

        发送控制信令
        |参数|说明|
        |---|---|
        |Control|Control{<br>Integer targetId;要发送的目标ID(如果为null,则直接向房间内发送；不为null，指定发送给某一用户)<br>ControlType type; 要发送到的控制类型:<br>1.MUTE_AUDIO_PEER(静音某一个人)<br>2.MUTE_AUDIO_ROOM(静音广播)<br>3.UNMUTE_AUDIO_PEER(解除静音)<br>4.UNMUTE_AUDIO_ROOM(解除静音房间)<br>5.CUSTOM(自定义)<br>ControlContent content;       用于自定义信令 CUSTOM<br>1.event 自定义控制事件<br>2.eventData 自定义内容<br>3.UserInfo 发送人信息<br>}|

    - #### setReceiveControlListener

        接受控制信令
        |参数|说明|
        |---|---|
        |listener|public interface JRTCReceiveControlListener {<br> void onReceived(final Control control);<br>}|

## 2.JRTCRoomListener

   + #### onError

        调用jrtc接口收到的错误码
        |参数|说明|
        |---|---|
        |errorCode|错误码|
        |msg|错误描述|
        |bundle|extraInfo(不需要为null)|

   + #### onEnterRoom

        当用户成功加入房间后会收到这个回调
        |参数|说明|
        |---|---|
        |PeersInfo|当前房间已经存在的用户列表，表示每一个远端用户的peerId以及nickname|

   + #### onExitRoom

        当用户调用exitRoom后收到的回调

        调用exitRoom会执行退出房间的相关逻辑，例如释放音视频设备资源和编码器资源等

        待资源释放完毕，SDK会通过onExitRoom回调通知

        如果您要在此调用enterRoom()获取切换到其他音视频sdk，请等待onExitRoom回调到来之后再执行相关操作

        否则会遇到音视频设备被占用等各种异常问题

   + #### onRemoteUserEnterRoom

        远端用户加入房间的监听
        |参数|说明|
        |---|---|
        |peerid|远端用户id|
        |nickname|远端用户名|

   + #### onRemoteLeaveRoom

        远端用户离开当前房间的监听

        |参数|说明|
        |---|---|
        |peerid|远端用户id|

   + #### onUserVideoAvailable

        远端用户是否发布/取消发布了一条视频流

        当您收到onUserVIdeoAvailable(streamId, true)通知时，表示远端用户发布了一条视频流

        此时，您需要通过调用JRTCBase::startRemoteView接口来订阅该用户的远程画面

        当您收到onUserVIdeoAvailable(streamId, false)通知时，表示远端用户取消发布了一条视频流

        此时，如果您之前订阅过远端视频流，您需要将订阅时为该用户绑定的JRTCVideoView销毁即可
        |参数|说明|
        |---|---|
        |peerid|远端用户id|
        |streamid|远端用户流|
        |streamName|流名|
        |available|是否有效|

   + #### onUserAudioAvailable

        远端用户是否存在可播放的音频数据

        当您收到onUserAudioAvailable(streamId, true)通知时，表示远端用户发布了一条音频流

        此时，您需要通过调用JRTCBase::startRemoteAudio接口来订阅该用户的远程画面
        |参数|说明|
        |---|---|
        |peerid|远端用户id|
        |streamid|远端流id|
        |available|是否有效|

   + #### onUserVideoMute

        远端用户是否暂停的某一条视频流

        当您收到onUserVideoMute(streamId, false)通知时，表示远端用户暂停了一条视频流，不发数据，但是通路还在

        |参数|说明|
        |---|---|
        |peerid|远端用户id|
        |streamid|流id|
        |mute|true:暂停 false:恢复|

   + #### onUserAudioMute

        远端用户是否暂停了一条音频流

        当您收到onUserAudioMute(streamId, false)通知时，表示远端用户暂停了一条音频流，不发数据，但是通路还在

        |参数|说明|
        |---|---|
        |peerid|远端用户id|
        |streamid|流id|
        |mute|true:暂停 false:恢复|

   + #### onFirstVideoFrame

        标识对应peer的对应视频流streamID已经渲染出了第一帧画面

   + #### onAudioVolume

        房间内的发布的音频音量列表
        |参数|说明|
        |---|---|
        |JRTCVolumeINfo|JRTCVolumeInfo{<br>int peerId;<br>float volume; 音量范围0.0~1.0f<br>}|

## 3.JRTCNetListener

   + #### onConnectionRecovery

        恢复与服务器的连接

   + #### onConnectionLost

        失去与服务器的连接

   + #### onReConnecting

        正在与服务端重新连接

## 4.JRTCLocalVideoFrameListener

   此监听为相机原始数据的监听

   |参数|说明|
   |---|---|
   |RTCVideoFrame|当前帧数据<br>textureId:RGB类型的纹理<br>width:宽<br>height:高<br>rotation:旋转<br>timestamp:时间戳<br>textureType:纹理类型(目前为RGB)|

## 5.JRTCConfig

   JRTC高级功能设置

   + #### enableNetWorkEnhance

        开启网络增强,开启后jrtc会同时使用wifi与4g, 开启此功能需要app申请android.permission.CHANGE_NETWORK_STATE权限
   + #### enableEncSmallVideoStream

        开启双路编码,大小流双路编码

   + #### enableCustomAudioCapture

        开启自定义音频采集

   + #### enableCustomAudioPlay

        开启自定义音频播放

   + #### setAudioSampleRate

        设置音频采样率

   + #### setAudioSource

        设置音频采集方式

   + #### setAudioFormat

        设置音频格式

   + #### setChannelConfig

        设置立体声

   + #### setResolution

        设置视频分辨率

   + #### setFps

        设置视频帧率

