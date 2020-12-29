
JRTCBase
1.基础方法
sharedInstance()
static JRTCBase sharedInstance( Context context )

创建JRTCBase单例

参数	
context	Android 上下文，内部会转为 ApplicationContext 用于系统 API 调用
返回

          JRTCBase 实例

注意

          可以调用 destroySharedInstance 销毁单例对象

setNetListener()
void setNetListener(JRTCNetListener listener)

设置网络状态回调接口 JRTCNetListener，用户获得来自JRTC 信令服务器网络状态通知



setStatsListener()
void setStatsListener(JRTCStatsListener listener)

设置统计信息回调接口JRTCStatsListener, 来获取发布和订阅的流的状态信息

2.房间相关接口函数
init()
void init()

初始化接口，用于启动native sdk

enterRoom()
void enterRoom(JRTCJoinRoomInfo info, JRTCRoomListener listener)

进入房间，成功会收到 JRTRoomCListener::onEnterRoom

参数	
joinroomInfo	
JRTCJoinRoomInfo{

ver : 1.0
roomId : 1044
peerId : 107330
nickName : zhanghao274
appId : 9f3440230172c69b5e01b1ad1ea7c6c7
token : NGVTSUUwYlBIdTV5TnZweWVvaTZWaXFEdUNKU1lnVmhtYmdUVUkrUlB1WT0_
userId : 6fKFbW0B
nonce : ak-12a1521482145
timestamp : 1625220102000
roomType : 2
}



用户token计算

listener	设置回调接口 JRTCRoomListener，用户获得来自JRTC的各种状态通知
注意

       不管进房是否成功，enterRoom必须与exitRoom配对使用，在调用exitRoom前在此调用enterRoom函数会导致不可预期的错误问题

exitRoom()
void exitRoom()

退出房间

注意

         调用 exitRoom() 接口会执行退出房间的相关逻辑，例如释放音视频设备资源和编解码器资源等。 待资源释放完毕，SDK 会通过JTRTListener::onExitRoom() 回调通知到您。

         如果您要再次调用 enterRoom() 或者切换到其他的音视频 SDK，请等待 onExitRoom() 回调到来之后再执行相关操作。 否则可能会遇到摄像头或麦克风被占用等各种异常问题，例如常见的 Android 媒体音量和通话音量切换问题等等。



3.视频相关接口函数
setVideoEncodingParam()
void setVideoEncodingParam( Resolution.Type resolution, Fps.Type fps)

设置发布的视频参数

参数	
JRTCEncodeParams	
resolution    分辨率:

JRTC_VIDEO_RESOLUTION_360P

JRTC_VIDEO_RESOLUTION_720P

JRTC_VIDEO_RESOLUTION_1080P



fps   帧率

JRTC_VIDEO_FPS_15

JRTC_VIDEO_FPS_20

JRTC_VIDEO_FPS_25

JRTC_VIDEO_FPS_30

注意

        此接口需要在startLocalPreview之前调用



startLocalPreview()
void startLocalPreview( JRTCVideoView view )

开启本地视频的预览画面，并且当用户成功进入房间后会自动进行发布



stopLocalPreview()
void stopLocalPreview()

停止本地视频采集和预览，并停止发布



startRemoteView()
void startRemoteVIew(int peerId, String streamId, JRTCVideoVIew view)

开始置顶远端用户视频画面，并显示在指定的JRTCVideoView上

用户成功进入房间后会收到JRTRoomCListener::onUserVIdeoAvailable()回调通知，该通知表示远端用户发布/取消了一条视频流，这个回调会带有远端用户的peerid以及发布的流streamid

参数	
peerId	远端用户的peerId
streamId	远端用户的streamId
view	指定显示远端用户视频画面的view
注意

        每一个JRTCVideoView需要绑定到一个远端用户，不可以重复绑定，所以如果需要显示一个新的远端用户，JRTCVideoView需要重新创建



stopRemoteView()
void stopRemoteView(int peerId, String streamId)

停止显示远端用户视频画面，同时不再拉取该远端用户的视频流数据

调用此接口后SDK会停止接受远端用户的视频流，同时会清理相关的视频显示资源

参数	
peerid	远端用户id
streamId	远端用户发布的流
注意

        在startRemoteView传入的JRTCVideoView，在调用stopRemoteView后，SDK会进行资源释放并销毁，外部不需要再次销毁



muteLocalVideo()
void muteLocalVideo(boolean mute)

暂停/恢复推送本地的视频数据

当暂停推送本地视频后，房间里的其他成员将会收到 onUserVideoMute(streamId, false)回调通知

当恢复推送本地视频后，房间里的其他成员将会收到 onUserVideoMute(streamId, true)回调通知

参数	
mute	true:暂停 false:恢复
注意

        如果当前用户没有发布视频，调用此函数会返回false(失败)



muteRemoteVideoStream()
void muteRemoteVIdeoStream(String streamId, boolean mute)

暂停/恢复 接收远端的视频数据

该接口仅暂停/恢复接受指定的远端用户的视频流，但并不释放显示资源，所以如果暂停，视频画面会冻屏在mute前的最后一帧

参数	
streamid	远端用户的流id
mute	true:暂停 false:恢复


muteAllRemoteVideoStream()
void muteAllRemoteVideoStream(boolean mute)

暂停/恢复 全部的远端视频数据

该接口 暂停全部的远端用户的视频流，但并不释放显示资源，所以如果暂停，视频画面会冻屏在mute前的最后一帧

参数	
mute	true:暂停 false:恢复


4.音频相关接口函数
startLocalAudio()
void startLocalAudio()

开启本地音频的采集和上行

stopLocalAudio()
void stopLocalAudio()

关闭本地音频采集和上行

startRemoteAudio()
void startRemoteAudio(int peerId, String streamId)

订阅远端用户发布的音频流

用户成功进入房间后会收到JRTRoomCListener::onUserAudioAvailable()回调通知，该通知表示远端用户发布/取消了一条音频流，这个回调会带有远端用户的peerid以及发布的流streamid

参数	
peerid	远端用户id
streamid	远端用户发布的流
注意

        远端用户发布的视频流与音频流ID并不相同，不可以通过此接口去订阅一条视频流

stopRemoteAudio()
void stopRemoteAudio(int peerId, String streamId)

停止订阅远端用户发布的音频流

参数	
peerid	远端用户id
streamid	远端用户发布的流


muteLocalAudio()
void muteLocalAudio(boolean mute)

暂停/恢复 推送本地音频数据

当暂停推送本地视频后，房间里的其他成员将会收到 onUserAudioMute(streamId, false)回调通知

当恢复推送本地视频后，房间里的其他成员将会收到 onUserAudioMute(streamId, true)回调通知

参数	
mute	true:暂停 false:恢复
注意

        如果当前用户没有发布音频，调用此函数会返回false(失败)



muteRemoteAudioStream()
void muteRemoteAudioStream(String streamId, boolean mute)

暂停/恢复 接收远端的音频数据

该接口仅暂停/恢复接受指定的远端用户的音频流，但并不释放显示资源

参数	
streamId	远端用户的流id
mute	true:暂停 false:恢复


muteAllRemoteAudioStream()
void muteAllRemoteAudioStream(boolean mute)

暂停/恢复 全部的远端音频数据

该接口 暂停全部的远端用户的音频流

参数	
mute	true:暂停 false:恢复


5.摄像头相关接口函数
switchCamera()
void switchCamera()

切换前后摄像头

6.自定义采集和渲染
setLocalVideoFrameListener()
void setLocalVIdeoFrameListener( JRTCLocalVideoFrameListener listener)

设置视频帧数据的原始数据监听，通过此监听可以修改采集到的帧数据，之后做编码及预览的数据都以此接口处理过的最终数据为准



7.用户相关操作
changeNickName()
void checkNickName(String nickname)

修改当前用户的昵称

参数	
nickname	要修改的用户昵称


8.消息
sendMessage()
void sendMessage(Message msg, JRTCSendMessageListener listener)

发送消息

参数	
msg	
Message{

      Integer targetId;                        要发送的目标ID(如果为null,则直接向房间内发送；不为null，指定发送给某一用户)

      ConversationType type;          要发送到的回话类型:

                                                                      1.RTC_ROOM(直播间消息,需要进入会议房间后才可以发送成功)

                                                                      2.BROADCAST(消息大厅全局广播)

                                                                      3.BROADCAST_SINGLE(消息大厅单聊，在消息大厅中发送给某一个人)

      MessageContent content;      要发送的内容,目前只支持文本消息TextMessage

}

listener	
发送成功/失败回调

JRTCSendMessageListener{

     void onSuccess(Message message); 消息发送成功

     viod onError(Message message, int errorCode);消息发送失败

}

样例:

TextMessage textMessage = TextMessage.obtain("test message");

ConversationType type = ConversationType.RTC_ROOM;

Message message = Message.obtain(targetId,  type, textMessage);

jcloud.sendMessage(message, new JRTCSendMessageListener() {

          public void onSuccess(Message message){}

          public void onError(Message message, int errorCode){}

})

initBroadcast()
void initBroadcast(int peerId, String nickName)

初始化消息大厅

参数	
peerId	用户id
nickName	昵称


setReceiveMessageListener()
void setReceiveMessageListener(JRTCReceiveMessageListener listener)

设置消息监听,服务器下发了消息

参数	
listener	
JRTCReceiveMessageListener{

     void onReceived(Message message);

}

样例:

jrtcCloud.setReceiveMessageListener(new JRTCReceiveMessageListener()  {

    public void onReceived(Message message){

               UserInfo sendInfo = message.getContent().getUserInfo;

               if(sendInfo != null){

                       int peerId = sendInfo.getPeerId();     //发送者的peerId

                       String nickName = sendInfo.getNickName();//  发送者的昵称

                }

               if(message.getContent() instanceOf TextMessage){

                      String msg = ((TextMessage)message.getContent).getContent(); //发送内容

               }

              ConversationType type = message.getConversationType();  // 会话类型

    }

});



9.控制
sendControlSignal()
void sendControlSignal(Control control)

发送控制信令

参数	
Control	
Control{

      Integer targetId;                        要发送的目标ID(如果为null,则直接向房间内发送；不为null，指定发送给某一用户)

      ControlType type;                     要发送到的控制类型:

                                                                      1.MUTE_AUDIO_PEER(静音某一个人)

                                                                      2.MUTE_AUDIO_ROOM(静音广播)

                                                                      3.UNMUTE_AUDIO_PEER(解除静音)

                                                                      4.UNMUTE_AUDIO_ROOM(解除静音房间)

                                                                      5.CUSTOM(自定义)

      ControlContent content;       用于自定义信令 CUSTOM

                                                             1.event 自定义控制事件

                                                             2.eventData 自定义内容

                                                             3.UserInfo 发送人信息

}



sendReceiveControlListener()
void sendReceiveControlListener(JRTCReceiveControlListrener listener)

接收控制信令

参数	
listener	
public interface JRTCReceiveControlListener {
 void onReceived(final Control control);
}




JRTCRoomListener
房间内的状态监听，其回调调用都是在MainThread之中，您可以直接在回调中 操作UI

onError()
void onError(int errorCode, String msg, Bundle bundle)

调用jrtc接口收到的错误码

参数	
errorCode	错误码
msg	错误描述
bundle	extraInfo(不需要为null)
onEnterRoom()
void onEnterRoom(PeersInfo info)

当用户成功加入房间后会收到这个回调

参数	
PeersInfo	
当前房间已经存在的用户列表，表示每一个远端用户的peerId以及nickname



onExitRoom()
void onExitRoom()

当用户调用exitRoom后收到的回调

调用exitRoom会执行退出房间的相关逻辑，例如释放音视频设备资源和编码器资源等

待资源释放完毕，SDK会通过onExitRoom回调通知

如果您要在此调用enterRoom()获取切换到其他音视频sdk，请等待onExitRoom回调到来之后再执行相关操作

否则会遇到音视频设备被占用等各种异常问题

onRemoteUserEnterRoom()
void onRemoteUserEnterRoom(int peerId, String nickname)

远端用户加入房间的监听

参数	
peerid	远端用户id
nickname	远端用户nickname
onRemoteLeaveRoom()
void onRemoteLeaveRoom(int peerId, int reason);

远端用户离开当前房间的监听

参数	
peerid	远端用户的id
reason	被踢原因(目前暂未实现)


onUserVideoAvailable()
void onUserVIdeoAvailable(int peerId, String streamId, String streamName, boolean available)

远端用户是否发布/取消发布了一条视频流

当您收到onUserVIdeoAvailable(streamId, true)通知时，表示远端用户发布了一条视频流

此时，您需要通过调用JRTCBase::startRemoteView接口来订阅该用户的远程画面

当您收到onUserVIdeoAvailable(streamId, false)通知时，表示远端用户取消发布了一条视频流

此时，如果您之前订阅过远端视频流，您需要将订阅时为该用户绑定的JRTCVideoView销毁即可

参数	
peerId	远端用户id
streamId	远端用户流id
streamName	远端用户流name
available	是否有效


onUserAudioAvailable()
void onUserAudioAvailable(int peerId, String streamId, boolean available)

远端用户是否存在可播放的音频数据

当您收到onUserAudioAvailable(streamId, true)通知时，表示远端用户发布了一条音频流

此时，您需要通过调用JRTCBase::startRemoteAudio接口来订阅该用户的远程画面

参数	
peerId	远端用户id
streamId	流id
available	是否有效


onUserVideoMute()
void onUserVIdeoMute(int peerId, String streamId, boolean mute)

远端用户是否暂停的某一条视频流

当您收到onUserVideoMute(streamId, false)通知时，表示远端用户暂停了一条视频流，不发数据，但是通路还在

此时，如果您之前订阅过这条流，那么您绑定的JRTCVideoView会显示最后一帧画面

参数	
peerId	远端用户id
streamId	流id
mute	true:暂停 false:恢复


onUserAudioMute()
void onUserAudioMute(int peerId, String streamId, boolean mute)

远端用户是否暂停了一条音频流

当您收到onUserAudioMute(streamId, false)通知时，表示远端用户暂停了一条音频流，不发数据，但是通路还在

参数	
peerId	远端用户id
streamId	流id
mute	true:暂停 false:恢复


onFIrstVideoFrame()
void onFIrstVIdeoFrame(int peerId, String streamId)

标识对应peer的对应视频流streamID已经渲染出了第一帧画面



onAudioVolume()
void onAudioVolume(List<JRTCVolumeInfo> jrtcVolumeInfos)

房间内的发布的音频音量列表

参数	
JRTCVolumeInfo	
JRTCVolumeInfo{

      int peerId;  

      float volume; 音量范围0.0~1.0f

}



JRTCNetListener
onConnectionRecovery()
恢复与服务器的连接

onConnectionLost()
失去与服务器的连接

onReConnecting()
正在与服务端重新连接



JRTCStatsListener
onStats()
void onStats(String stats);

回报统计信息



JRTCLocalVideoFrameListener
public interface JRTCLocalVIdeoFrameLIstener{

       RTCVideoFrame processVideoFrame(RTCVideoFrame videoFrame);

}

此监听为相机原始数据的监听

参数	
RTCVideoFrame	
当前帧数据

textureId:RGB类型的纹理

width:宽

height:高

rotation:旋转

timestamp:时间戳

textureType:纹理类型(目前为RGB)

如果对当前的纹理做了处理，您需要将新的纹理id设置到入参的videoFrame之中，然后直接返回即可









