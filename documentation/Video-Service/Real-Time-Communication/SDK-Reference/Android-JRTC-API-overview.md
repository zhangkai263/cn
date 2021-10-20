
<p><ac:structured-macro ac:name="toc" ac:schema-version="1" ac:macro-id="7dc710f5-a249-4151-8c4c-a8451b68f956" /></p>
<h1>JRTCBase</h1>
<h2>1.基础方法</h2>
<h3>sharedInstance()</h3>
<p>static JRTCBase sharedInstance( Context context )</p>
<p>创建JRTCBase单例</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>context</td>
<td>Android 上下文，内部会转为 ApplicationContext 用于系统 API 调用</td></tr></tbody></table>
<p><strong>返回</strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JRTCBase 实例</p>
<p><strong>注意</strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 可以调用 destroySharedInstance 销毁单例对象</p>
<h3>setNetListener()</h3>
<p>void setNetListener(JRTCNetListener listener)</p>
<p>设置网络状态回调接口 JRTCNetListener，用户获得来自JRTC 信令服务器网络状态通知</p>
<p><br /></p>
<h3>setStatsListener()</h3>
<p>void setStatsListener(JRTCStatsListener listener)</p>
<p>设置统计信息回调接口JRTCStatsListener, 来获取发布和订阅的流的状态信息</p>
<h2>2.房间相关接口函数</h2>
<h3>init()</h3>
<p>void init()</p>
<p><span style="color: rgb(92,99,112);">初始化接口，</span><span style="color: rgb(92,99,112);">用于启动native sdk</span></p>
<h3>enterRoom()</h3>
<p>void enterRoom(JRTCJoinRoomInfo info, JRTCRoomListener listener)</p>
<p>进入房间，成功会收到 <span style="color: rgb(92,99,112);">JRTRoomCListener</span>::onEnterRoom</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>joinroomInfo</td>
<td>
<p>JRTCJoinRoomInfo{</p>
<pre><span style="color: rgb(92,99,112);">ver : 1.0</span><span style="color: rgb(92,99,112);"><br /></span><span style="color: rgb(92,99,112);">roomId : 1044</span><span style="color: rgb(92,99,112);"><br /></span><span style="color: rgb(92,99,112);">peerId : 107330</span><span style="color: rgb(92,99,112);"><br /></span><span style="color: rgb(92,99,112);">nickName : zhanghao274</span><span style="color: rgb(92,99,112);"><br /></span><span style="color: rgb(92,99,112);">appId : 9f3440230172c69b5e01b1ad1ea7c6c7</span><span style="color: rgb(92,99,112);"><br /></span><span style="color: rgb(92,99,112);">token : NGVTSUUwYlBIdTV5TnZweWVvaTZWaXFEdUNKU1lnVmhtYmdUVUkrUlB1WT0_</span><span style="color: rgb(92,99,112);"><br /></span><span style="color: rgb(92,99,112);">userId : 6fKFbW0B</span><span style="color: rgb(92,99,112);"><br /></span><span style="color: rgb(92,99,112);">nonce : ak-12a1521482145</span><span style="color: rgb(92,99,112);"><br /></span><span style="color: rgb(92,99,112);">timestamp : 1625220102000</span><span style="color: rgb(92,99,112);"><br /></span><span style="color: rgb(92,99,112);">roomType : 2 </span></pre>
<pre>recordFileName : fileName</pre>
<p>liveStreamName <span style="color: rgb(92,99,112);">: </span>livestreamName</p>
<p>}</p>
<p><br /></p>
<p><ac:link><ri:page ri:content-title="用户token计算" /></ac:link></p></td></tr>
<tr>
<td>listener</td>
<td>设置回调接口 JRTCRoomListener，用户获得来自JRTC的各种状态通知</td></tr></tbody></table>
<p><strong>注意</strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 不管进房是否成功，enterRoom必须与exitRoom配对使用，在调用exitRoom前在此调用enterRoom函数会导致不可预期的错误问题</p>
<h3>exitRoom()</h3>
<p>void exitRoom()</p>
<p>退出房间</p>
<p><strong>注意</strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 调用 exitRoom() 接口会执行退出房间的相关逻辑，例如释放音视频设备资源和编解码器资源等。 待资源释放完毕，SDK 会通过JTRTListener::onExitRoom() 回调通知到您。</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 如果您要再次调用 enterRoom() 或者切换到其他的音视频 SDK，请等待 onExitRoom() 回调到来之后再执行相关操作。 否则可能会遇到摄像头或麦克风被占用等各种异常问题，例如常见的 Android 媒体音量和通话音量切换问题等等。</p>
<p><br /></p>
<h2>3.视频相关接口函数</h2>
<h3>setVideoEncodingParam()</h3>
<p>void setVideoEncodingParam( Resolution.Type resolution, Fps.Type fps)</p>
<p>设置发布的视频参数</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>JRTCEncodeParams</td>
<td>
<p>resolution&nbsp;&nbsp;&nbsp; 分辨率:</p>
<p>JRTC_VIDEO_RESOLUTION_360P</p>
<p>JRTC_VIDEO_RESOLUTION_720P</p>
<p>JRTC_VIDEO_RESOLUTION_1080P</p>
<p><br /></p>
<p>fps&nbsp;&nbsp; 帧率</p>
<p>JRTC_VIDEO_FPS_15</p>
<p>JRTC_VIDEO_FPS_20</p>
<p>JRTC_VIDEO_FPS_25</p>
<p>JRTC_VIDEO_FPS_30</p></td></tr></tbody></table>
<p><strong>注意</strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 此接口需要在startLocalPreview之前调用</p>
<p><br /></p>
<h3>startLocalPreview()</h3>
<p>void startLocalPreview( JRTCVideoView view )</p>
<p>开启本地视频的预览画面，并且当用户成功进入房间后会自动进行发布</p>
<p><br /></p>
<h3>stopLocalPreview()</h3>
<p>void stopLocalPreview()</p>
<p>停止本地视频采集和预览，并停止发布</p>
<p><br /></p>
<h3>startRemoteView()</h3>
<p>void startRemoteVIew(int peerId, String streamId, JRTCVideoVIew view)</p>
<p>开始置顶远端用户视频画面，并显示在指定的JRTCVideoView上</p>
<p>用户成功进入房间后会收到<span style="color: rgb(92,99,112);">JRTRoomCListener</span>::onUserVIdeoAvailable()回调通知，该通知表示远端用户发布/取消了一条视频流，这个回调会带有远端用户的peerid以及发布的流streamid</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>peerId</td>
<td>远端用户的peerId</td></tr>
<tr>
<td>streamId</td>
<td>远端用户的streamId</td></tr>
<tr>
<td>view</td>
<td>指定显示远端用户视频画面的view</td></tr></tbody></table>
<p><strong>注意</strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 每一个JRTCVideoView需要绑定到一个远端用户，不可以重复绑定，所以如果需要显示一个新的远端用户，JRTCVideoView需要重新创建</p>
<p><br /></p>
<h3>stopRemoteView()</h3>
<p>void stopRemoteView(int peerId, String streamId)</p>
<p>停止显示远端用户视频画面，同时不再拉取该远端用户的视频流数据</p>
<p>调用此接口后SDK会停止接受远端用户的视频流，同时会清理相关的视频显示资源</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>peerid</td>
<td>远端用户id</td></tr>
<tr>
<td>streamId</td>
<td>远端用户发布的流</td></tr></tbody></table>
<p><strong>注意</strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 在startRemoteView传入的JRTCVideoView，在调用stopRemoteView后，SDK会进行资源释放并销毁，外部不需要再次销毁</p>
<p><br /></p>
<h3>muteLocalVideo()</h3>
<p>void muteLocalVideo(boolean mute)</p>
<p>暂停/恢复推送本地的视频数据</p>
<p>当暂停推送本地视频后，房间里的其他成员将会收到 onUserVideoMute(streamId, false)回调通知</p>
<p>当恢复推送本地视频后，房间里的其他成员将会收到 onUserVideoMute(streamId, true)回调通知</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>mute</td>
<td>true:暂停 false:恢复</td></tr></tbody></table>
<p><strong>注意</strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 如果当前用户没有发布视频，调用此函数会返回false(失败)</p>
<p><br /></p>
<h3>muteRemoteVideoStream()</h3>
<p>void muteRemoteVIdeoStream(String streamId, boolean mute)</p>
<p>暂停/恢复 接收远端的视频数据</p>
<p>该接口仅暂停/恢复接受指定的远端用户的视频流，但并不释放显示资源，所以如果暂停，视频画面会冻屏在mute前的最后一帧</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>streamid</td>
<td>远端用户的流id</td></tr>
<tr>
<td>mute</td>
<td>true:暂停 false:恢复</td></tr></tbody></table>
<p><br /></p>
<h3>muteAllRemoteVideoStream()</h3>
<p>void muteAllRemoteVideoStream(boolean mute)</p>
<p>暂停/恢复 全部的远端视频数据</p>
<p>该接口 暂停全部的远端用户的视频流，但并不释放显示资源，所以如果暂停，视频画面会冻屏在mute前的最后一帧</p>
<table class="wrapped">
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>mute</td>
<td>true:暂停 false:恢复</td></tr></tbody></table>
<p><br /></p>
<h2>4.音频相关接口函数</h2>
<h3>startLocalAudio()</h3>
<p>void startLocalAudio()</p>
<p>开启本地音频的采集和上行</p>
<h3>stopLocalAudio()</h3>
<p>void stopLocalAudio()</p>
<p>关闭本地音频采集和上行</p>
<h3>startRemoteAudio()</h3>
<p>void startRemoteAudio(int peerId, String streamId)</p>
<p>订阅远端用户发布的音频流</p>
<p>用户成功进入房间后会收到<span style="color: rgb(92,99,112);">JRTRoomCListener</span>::onUserAudioAvailable()回调通知，该通知表示远端用户发布/取消了一条音频流，这个回调会带有远端用户的peerid以及发布的流streamid</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>peerid</td>
<td>远端用户id</td></tr>
<tr>
<td>streamid</td>
<td>远端用户发布的流</td></tr></tbody></table>
<p><strong>注意</strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 远端用户发布的视频流与音频流ID并不相同，不可以通过此接口去订阅一条视频流</p>
<h3>stopRemoteAudio()</h3>
<p>void stopRemoteAudio(int peerId, String streamId)</p>
<p>停止订阅远端用户发布的音频流</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>peerid</td>
<td>远端用户id</td></tr>
<tr>
<td>streamid</td>
<td>远端用户发布的流</td></tr></tbody></table>
<p><br /></p>
<h3>muteLocalAudio()</h3>
<p>void muteLocalAudio(boolean mute)</p>
<p>暂停/恢复 推送本地音频数据</p>
<p>当暂停推送本地视频后，房间里的其他成员将会收到 onUserAudioMute(streamId, false)回调通知</p>
<p>当恢复推送本地视频后，房间里的其他成员将会收到 onUserAudioMute(streamId, true)回调通知</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>mute</td>
<td>true:暂停 false:恢复</td></tr></tbody></table>
<p><strong>注意</strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 如果当前用户没有发布音频，调用此函数会返回false(失败)</p>
<p><br /></p>
<h3>muteRemoteAudioStream()</h3>
<p>void muteRemoteAudioStream(String streamId, boolean mute)</p>
<p>暂停/恢复 接收远端的音频数据</p>
<p>该接口仅暂停/恢复接受指定的远端用户的音频流，但并不释放显示资源</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>streamId</td>
<td>远端用户的流id</td></tr>
<tr>
<td>mute</td>
<td>true:暂停 false:恢复</td></tr></tbody></table>
<p><strong><br /></strong></p>
<h3>muteAllRemoteAudioStream()</h3>
<p>void muteAllRemoteAudioStream(boolean mute)</p>
<p>暂停/恢复 全部的远端音频数据</p>
<p>该接口 暂停全部的远端用户的音频流</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>mute</td>
<td>true:暂停 false:恢复</td></tr></tbody></table>
<p><br /></p>
<h2>5.摄像头相关接口函数</h2>
<h3>switchCamera()</h3>
<p>void switchCamera()</p>
<p>切换前后摄像头</p>
<h2>6.自定义采集和渲染</h2>
<h3>setLocalVideoFrameListener()</h3>
<p>void setLocalVIdeoFrameListener( JRTCLocalVideoFrameListener listener)</p>
<p>设置视频帧数据的原始数据监听，通过此监听可以修改采集到的帧数据，之后做编码及预览的数据都以此接口处理过的最终数据为准</p>
<p><br /></p>
<h2>7.用户相关操作</h2>
<h3>changeNickName()</h3>
<p>void checkNickName(String nickname)</p>
<p>修改当前用户的昵称</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>nickname</td>
<td>要修改的用户昵称</td></tr></tbody></table>
<p><br /></p>
<h2>8.消息</h2>
<h3>sendMessage()</h3>
<p>void sendMessage(Message msg, JRTCSendMessageListener listener)</p>
<p>发送消息</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>msg</td>
<td>
<p>Message{</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Integer targetId;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 要发送的目标ID(如果为null,则直接向房间内发送；不为null，指定发送给某一用户)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ConversationType type;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 要发送到的回话类型:</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.RTC_ROOM(直播间消息,需要进入会议房间后才可以发送成功)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.BROADCAST(消息大厅全局广播)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.BROADCAST_SINGLE(消息大厅单聊，在消息大厅中发送给某一个人)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MessageContent content;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 要发送的内容,目前只支持文本消息TextMessage</p>
<p>}</p></td></tr>
<tr>
<td>listener</td>
<td>
<p>发送成功/失败回调</p>
<p>JRTCSendMessageListener{</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp; void onSuccess(Message message); 消息发送成功</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp; viod onError(Message message, int errorCode);消息发送失败</p>
<p>}</p></td></tr></tbody></table>
<p>样例:</p>
<p>TextMessage textMessage = TextMessage.obtain(&quot;test message&quot;);</p>
<p>ConversationType type = ConversationType.RTC_ROOM;</p>
<p>Message message = Message.obtain(targetId,&nbsp; type, textMessage);</p>
<p>jcloud.sendMessage(message, new JRTCSendMessageListener() {</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; public void onSuccess(Message message){}</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; public void onError(Message message, int errorCode){}</p>
<p>})</p>
<h3>initBroadcast()</h3>
<p>void initBroadcast(int peerId, String nickName)</p>
<p>初始化消息大厅</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>peerId</td>
<td>用户id</td></tr>
<tr>
<td>nickName</td>
<td>昵称</td></tr></tbody></table>
<p><br /></p>
<h3>setReceiveMessageListener()</h3>
<p>void setReceiveMessageListener(JRTCReceiveMessageListener listener)</p>
<p>设置消息监听,服务器下发了消息</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>listener</td>
<td>
<p>JRTCReceiveMessageListener{</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp; void onReceived(Message message);</p>
<p>}</p></td></tr></tbody></table>
<p>样例:</p>
<p>jrtcCloud.setReceiveMessageListener(new JRTCReceiveMessageListener()&nbsp; {</p>
<p>&nbsp;&nbsp;&nbsp; public void onReceived(Message message){</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UserInfo sendInfo = message.getContent().getUserInfo;</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; if(sendInfo != null){</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; int peerId = sendInfo.getPeerId();&nbsp;&nbsp;&nbsp;&nbsp; //发送者的peerId</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; String nickName = sendInfo.getNickName();//&nbsp; 发送者的昵称</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; }</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; if(message.getContent() instanceOf TextMessage){</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; String msg = ((TextMessage)message.getContent).getContent(); //发送内容</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; }</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ConversationType type = message.getConversationType();&nbsp; // 会话类型</p>
<p>&nbsp;&nbsp;&nbsp; }</p>
<p>});</p>
<p><br /></p>
<h2>9.控制</h2>
<h3>sendControlSignal()</h3>
<p>void sendControlSignal(Control control)</p>
<p>发送控制信令</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>Control</td>
<td>
<p>Control{</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Integer targetId;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 要发送的目标ID(如果为null,则直接向房间内发送；不为null，指定发送给某一用户)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ControlType type;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 要发送到的控制类型:</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.MUTE_AUDIO_PEER(静音某一个人)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.MUTE_AUDIO_ROOM(静音广播)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.UNMUTE_AUDIO_PEER(解除静音)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4.UNMUTE_AUDIO_ROOM(解除静音房间)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5.CUSTOM(自定义)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ControlContent content;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 用于自定义信令 CUSTOM</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.event 自定义控制事件</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.eventData 自定义内容</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.UserInfo 发送人信息</p>
<p>}</p></td></tr></tbody></table>
<p><br /></p>
<h3>sendReceiveControlListener()</h3>
<p>void sendReceiveControlListener(JRTCReceiveControlListrener listener)</p>
<p>接收控制信令</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>listener</td>
<td>
<pre><span style="color: rgb(198,120,221);">public interface </span><span style="color: rgb(229,192,123);">JRTCReceiveControlListener </span><span style="color: rgb(209,154,102);">{<br /></span><span style="color: rgb(209,154,102);"> </span><span style="color: rgb(198,120,221);">void </span><span style="color: rgb(97,175,239);">onReceived</span><span style="color: rgb(209,154,102);">(</span><span style="color: rgb(198,120,221);">final </span><span style="color: rgb(229,192,123);">Control </span><span style="color: rgb(209,154,102);">control)</span>;<br /><span style="color: rgb(209,154,102);">}</span></pre></td></tr></tbody></table>
<p><br /></p>
<p><br /></p>
<h1>JRTCRoomListener</h1>
<p>房间内的状态监听，其回调调用都是在MainThread之中，您可以直接在回调中 操作UI</p>
<h2>onError()</h2>
<p>void onError(int errorCode, String msg, Bundle bundle)</p>
<p>调用jrtc接口收到的错误码</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>errorCode</td>
<td>错误码</td></tr>
<tr>
<td>msg</td>
<td>错误描述</td></tr>
<tr>
<td>bundle</td>
<td>extraInfo(不需要为null)</td></tr></tbody></table>
<h2>onEnterRoom()</h2>
<p>void onEnterRoom(PeersInfo info)</p>
<p>当用户成功加入房间后会收到这个回调</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>PeersInfo</td>
<td>
<p>当前房间已经存在的用户列表，表示每一个远端用户的peerId以及nickname</p></td></tr></tbody></table>
<p><strong><br /></strong></p>
<h2>onExitRoom()</h2>
<p>void onExitRoom()</p>
<p>当用户调用exitRoom后收到的回调</p>
<p>调用exitRoom会执行退出房间的相关逻辑，例如释放音视频设备资源和编码器资源等</p>
<p>待资源释放完毕，SDK会通过onExitRoom回调通知</p>
<p>如果您要在此调用enterRoom()获取切换到其他音视频sdk，请等待onExitRoom回调到来之后再执行相关操作</p>
<p>否则会遇到音视频设备被占用等各种异常问题</p>
<h2>onRemoteUserEnterRoom()</h2>
<p>void onRemoteUserEnterRoom(int peerId, String nickname)</p>
<p>远端用户加入房间的监听</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>peerid</td>
<td>远端用户id</td></tr>
<tr>
<td>nickname</td>
<td>远端用户nickname</td></tr></tbody></table>
<h2>onRemoteLeaveRoom()</h2>
<p>void onRemoteLeaveRoom(int peerId, int reason);</p>
<p>远端用户离开当前房间的监听</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>peerid</td>
<td>远端用户的id</td></tr>
<tr>
<td>reason</td>
<td>被踢原因(目前暂未实现)</td></tr></tbody></table>
<p><br /></p>
<h2>onUserVideoAvailable()</h2>
<p>void onUserVIdeoAvailable(int peerId, String streamId, String streamName, boolean available)</p>
<p>远端用户是否发布/取消发布了一条视频流</p>
<p>当您收到onUserVIdeoAvailable(streamId, true)通知时，表示远端用户发布了一条视频流</p>
<p>此时，您需要通过调用JRTCBase::startRemoteView接口来订阅该用户的远程画面</p>
<p>当您收到onUserVIdeoAvailable(streamId, false)通知时，表示远端用户取消发布了一条视频流</p>
<p>此时，如果您之前订阅过远端视频流，您需要将订阅时为该用户绑定的JRTCVideoView销毁即可</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>peerId</td>
<td>远端用户id</td></tr>
<tr>
<td>streamId</td>
<td>远端用户流id</td></tr>
<tr>
<td>streamName</td>
<td>远端用户流name</td></tr>
<tr>
<td>available</td>
<td>是否有效</td></tr></tbody></table>
<p><br /></p>
<h2>onUserAudioAvailable()</h2>
<p>void onUserAudioAvailable(int peerId, String streamId, boolean available)</p>
<p>远端用户是否存在可播放的音频数据</p>
<p>当您收到onUserAudioAvailable(streamId, true)通知时，表示远端用户发布了一条音频流</p>
<p>此时，您需要通过调用JRTCBase::startRemoteAudio接口来订阅该用户的远程画面</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>peerId</td>
<td>远端用户id</td></tr>
<tr>
<td>streamId</td>
<td>流id</td></tr>
<tr>
<td>available</td>
<td>是否有效</td></tr></tbody></table>
<p><br /></p>
<h2>onUserVideoMute()</h2>
<p>void onUserVIdeoMute(int peerId, String streamId, boolean mute)</p>
<p>远端用户是否暂停的某一条视频流</p>
<p>当您收到onUserVideoMute(streamId, false)通知时，表示远端用户暂停了一条视频流，不发数据，但是通路还在</p>
<p>此时，如果您之前订阅过这条流，那么您绑定的JRTCVideoView会显示最后一帧画面</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>peerId</td>
<td>远端用户id</td></tr>
<tr>
<td>streamId</td>
<td>流id</td></tr>
<tr>
<td>mute</td>
<td>true:暂停 false:恢复</td></tr></tbody></table>
<p><br /></p>
<h2>onUserAudioMute()</h2>
<p>void onUserAudioMute(int peerId, String streamId, boolean mute)</p>
<p>远端用户是否暂停了一条音频流</p>
<p>当您收到onUserAudioMute(streamId, false)通知时，表示远端用户暂停了一条音频流，不发数据，但是通路还在</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>peerId</td>
<td>远端用户id</td></tr>
<tr>
<td>streamId</td>
<td>流id</td></tr>
<tr>
<td>mute</td>
<td>true:暂停 false:恢复</td></tr></tbody></table>
<p><br /></p>
<h2>onFIrstVideoFrame()</h2>
<p>void onFIrstVIdeoFrame(int peerId, String streamId)</p>
<p>标识对应peer的对应视频流streamID已经渲染出了第一帧画面</p>
<p><br /></p>
<h2>onAudioVolume()</h2>
<p>void onAudioVolume(List&lt;JRTCVolumeInfo&gt; jrtcVolumeInfos)</p>
<p>房间内的发布的音频音量列表</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>JRTCVolumeInfo</td>
<td>
<p>JRTCVolumeInfo{</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; int peerId;&nbsp;&nbsp;</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; float volume; 音量范围0.0~1.0f</p>
<p>}</p></td></tr></tbody></table>
<p><br /></p>
<h1>JRTCNetListener</h1>
<h2>onConnectionRecovery()</h2>
<p>恢复与服务器的连接</p>
<h2>onConnectionLost()</h2>
<p>失去与服务器的连接</p>
<h2>onReConnecting()</h2>
<p>正在与服务端重新连接</p>
<p><br /></p>
<h1>JRTCStatsListener</h1>
<h2>onStats()</h2>
<p>void onStats(String stats);</p>
<p>回报统计信息</p>
<p><br /></p>
<h1>JRTCLocalVideoFrameListener</h1>
<p>public interface JRTCLocalVIdeoFrameLIstener{</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RTCVideoFrame processVideoFrame(RTCVideoFrame videoFrame);</p>
<p>}</p>
<p>此监听为相机原始数据的监听</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><br /></th></tr>
<tr>
<td>RTCVideoFrame</td>
<td>
<p>当前帧数据</p>
<p>textureId:RGB类型的纹理</p>
<p>width:宽</p>
<p>height:高</p>
<p>rotation:旋转</p>
<p>timestamp:时间戳</p>
<p>textureType:纹理类型(目前为RGB)</p></td></tr></tbody></table>
<p>如果对当前的纹理做了处理，您需要将新的纹理id设置到入参的videoFrame之中，然后直接返回即可</p>
<p><br /></p>
<p><br /></p>
<p><br /></p>
<p><br /></p>
<p><br /></p>
