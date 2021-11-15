<h1>iOS JRTC API接口说明</h1>

<h1>1 JRTCCloud类</h1>
<p>描述 &nbsp;<span style="letter-spacing: 0.0px;">JRTCCloud类是音视频会议开发最主要的类，提供了各种接口，供音视频会议App开发者调用</span></p>
<h2>JRTCCloud类基础方法</h2>
<p>1.JRTCCloud类实例化单例</p>
<h3><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;font-size: 16.0px;font-weight: bold;letter-spacing: -0.006em;">sharedInstance;</span></h3>
<p>2.RTCCloud类销毁单例</p>
<h3><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;font-size: 16.0px;font-weight: bold;letter-spacing: -0.006em;">destroySharedIntance;</span></h3>
<p><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;font-size: 16.0px;font-weight: bold;letter-spacing: -0.006em;"><br /></span></p>
<p><span style="letter-spacing: 0.0px;">3.房间事件的回调</span></p>
<p>您可以通过 JRTCCloudRoomDelegate 获得来自JRTC_iOS.Framework的各种房间状态通知， 详见 JRTCCloudRoomDelegate.h 中的定义</p>
<h3><code>@property(nonatomic,weak)id&lt;JRTCCloudRoomDelegate&gt; roomDelegate;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>roomDelegate</td>
<td>JRTCCloudRoomDelegate</td>
<td>是</td>
<td>房间事件的各种回调</td></tr></tbody></table>
<p>4.网络事件的回调</p>
<p>视频会议中，网络状态发生变化时的回调，详见 JRTCCloudNetDelegate.h 中的定义</p>
<h3><code>@property(nonatomic,weak)id&lt;JRTCCloudNetDelegate&gt; netDelegate;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>netDelegate</td>
<td>JRTCCloudNetDelegate</td>
<td>是</td>
<td>网络事件的各种回调</td></tr></tbody></table>
<p>5.消息大厅消息事件的各种回调</p>
<p>消息大厅，接收消息事件的回调，详见 JRTCCloudMessageDelegate.h中的定义</p>
<h3><code>@property(nonatomic,weak)id&lt;JRTCCloudMessageDelegate&gt; messageDelegate</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>messageDelegate</td>
<td>JRTCCloudMessageDelegate</td>
<td>是</td>
<td>消息大厅消息事件的各种回调</td></tr></tbody></table>
<p>6.初始化消息大厅</p>
<p>消息大厅发送消息，不必进入房间。参数错误的话，会收到JRTCCloudMessageDelegate中错误回调</p>
<h3><code>initJmsgMessageWithAuthModel:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>authModel</td>
<td>JRTCEnterRoomAuthModel</td>
<td>是</td>
<td><span>加入房间必传的参数，携带加入房间必须的鉴权信息，authModel相关鉴权数据，由京东云控制台相关接口下发，其它数据由用户填写</span></td></tr></tbody></table>
<p>7.开启/关闭 网络增强</p>
<p>只能在进入房间前进行设置，不设置的话，默认为NO</p>
<h3><code>enableNetWorkEnhance:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>enable</td>
<td>BOOL</td>
<td>否</td>
<td>是否打开网络增强功能</td></tr></tbody></table>
<p>8.加入房间</p>
<p>如果在调用加入房间前，调用了退出房间，则必须等退出房间finishBlock回调后，才能再次调用加入房间接口； 加入房间后，本地用户会收到JRTCCloudRoomDelegate中加入房间成功的消息回调， 同一房间内，远端用户会收到JRTCCloudRoomDelegate中有用户加入房间的回调消息。 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<ul>
<li>注意:只有处于未进入房间状态下，才能调用加入房间，否则调用无效。</li>
<li>enterRoomModel 加入房间必传的参数，携带加入房间必须的鉴权信息，其中enterRoomModel中的authModel相关数据，由京东云控制台相关接口下发</li></ul>
<h3><code>enterRoomWithEnterAuthModel:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>
<p>authMode</p></td>
<td>
<p>JRTCEnterRoomAuthModel</p></td>
<td>是</td>
<td>加入房间必传的参数，携带加入房间必须的鉴权信息，authModel相关鉴权数据，由京东云控制台相关接口下发，其它数据由用户填写</td></tr></tbody></table>
<p>9.离开房间</p>
<p>本地用户调用离开房间后，同一房间内，远端用户会收到JRTCCloudRoomDelegate中用户离开房间的回调消息，</p>
<ul>
<li>注意:只有处于已进入房间状态下，才能调用退出房间，否则调用无效。</li></ul>
<h3><code>exitRoomWithFinishBlock:</code>&nbsp;</h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>finishBlock</td>
<td>FinishBlock</td>
<td>是</td>
<td>离开房间完成回调,只有离开房间后,才能再次调用加入房间接口</td></tr></tbody></table>
<h2>JRTCCloud类视频相关方法</h2>
<p>10.设置视频编码器相关参数</p>
<p>该设置决定了远端用户看到的画面质量及远端用户能否拉去大小画面视频流 该设置应该在调用 startLocalPreviewview函数前设置 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。 如果不设置，本地视频默认分辨率为720P，帧率为15帧，默认不开启视频大小画面推流</p>
<h3><code>setCameraEncoderWithParam:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>param</td>
<td>JRTCVideoEncParam</td>
<td>是</td>
<td>视频编码相关参数</td></tr></tbody></table>
<p>11.设置采集本地预览视频的前后摄像头，及视频要绘制展示的画面。</p>
<ul>
<li>
<p>1.调用此接口前，先调用初始化消息大厅接口（initJmsgMessageWithAuthModel）或者进入房间接口（enterRoomWithEnterRoomModel），打开本地预览。否则本地用户会收不到JRTCCloudRoomDelegate中本地视频流视频第一帧宽高回调。加入房间成功后，会自动发布本地用户视频流，同一房间内，远端用户会收到JRTCCloudRoomDelegate中有视频流可以订阅的回调，远端用户可以根据可以订阅的视频流，来决定是否订阅对应视频流。打开本地预览，并发布本地用户视频流，同一房间内，远端用户会收JRTCCloudRoomDelegate中有视频流可以订阅的回调，远端用户可以根据可以订阅的视频流，来决定是否订阅对应视频流。</p></li>
<li>
<p>2.本地用户自己也会在视频流发布成功后，收到JRTCCloudRoomDelegate中本地视频流打开的回调消息，并且也会收到本地视频流视频第一帧宽高，通过宽高比，来决定如何展示。参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p></li>
<li>
<p>3.本地用户加入房间后，调用此函数，发布视频流，如果发布视频流超时，会触发错误类型为JRTC_ERROR_CODE_PUBLISH_VIDEO_STREAM_TIMEOUT错误回调，超时时间15秒，本地用户可重新调用此函数，重新发布视频流。</p></li></ul>
<h3><code class="language-Object-C">startLocalPreviewWithFrontCamera: view:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>frontCamera</td>
<td>BOOL</td>
<td>是</td>
<td>视频采集前后摄像头</td></tr>
<tr>
<td>view</td>
<td>JRTCVideoView</td>
<td>是</td>
<td>视频绘制展示画面</td></tr></tbody></table>
<p>12.停止本地摄像头采集视频</p>
<p>调用此接口，出错时，本地用户会收到JRTCCloudRoomDelegate中的错误回调； 成功的话本地用户端不会收到任何回调，直接修改相关数据状态。 本地用户调用停止本地摄像头采集视频成功后，同一房间内， 远端用户会收到JRTCCloudRoomDelegate中有视频流不可以订阅的回调消息， 远端用户可以根据此视频流不可以订阅，来置空此条视频流相关信息。</p>
<h3><code>stopLocalPreview</code></h3>
<p>13.暂停/继续推送本地的视频数据</p>
<p>加入房间成功后，才可以调用此接口。 同一房间中，本地用户不会收到任何回调， 远端用户会收到JRTCCloudRoomDelegate中有视频流暂停或者继续的消息， 进而展示或者隐藏相应视频画面。</p>
<h3><code>muteLocalVideoWithMute:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>mute</td>
<td>BOOL</td>
<td>是</td>
<td>YES为暂停 NO为继续</td></tr></tbody></table>
<p>14.订阅远端视频流</p>
<p>加入房间成功后，才可调用此接口。同一房间中，订阅远端视频流成功后， 用户会收到JRTCCloudRoomDelegate中是否有 视频暂停或继续的回调消息，及视频画面第一帧宽高的回调消息。如果视频第一帧宽高都不为0，则可以展示此画面。 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。 本地用户加入房间后，调用此函数，订阅远端视频流，订阅视频流超时，会触发JRTC_ERROR_CODE_SUBSCRIBE_VEDIO_STREAM_TIMEOUT类型的错误回调，超时时间15秒，本地用户可重新调用此函数，重新订阅视频流。如果远端用户只发布了小画面视频流，本地用户订阅大小画面视频流无效，都会只订阅成功远端用户发布的视频流。 如果远端用户只发布了大画面视频流，本地用户订阅大小画面视频流会有效，会订阅成功远端用户发布的大小画面视频流。</p>
<ul>
<li>本地用户加入房间后，调用此函数，订阅远端视频流，订阅视频流超时，会触发JRTC_ERROR_CODE_SUBSCRIBE_VEDIO_STREAM_TIMEOUT类型的错误回调，超时时间15秒，本地用户可重新调用此函数，重新订阅视频流。</li></ul>
<h3><code class="language-Object-C">startRemoteVideoWithVideoView:peer</code><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;letter-spacing: -0.006em;">ID:streamID:streamModelType:streamType:</span></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>videoView</td>
<td>JRTCVideoView</td>
<td>是</td>
<td>远端视频流要绘制的画面</td></tr>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>是</td>
<td>要订阅视频流对应的peerID</td></tr>
<tr>
<td>streamId</td>
<td>NSString</td>
<td>是</td>
<td>要订阅视频流对应的streamId</td></tr>
<tr>
<td>modelType</td>
<td>JRTC_VIDEO_STREAM_MODEL_TYPE</td>
<td>是</td>
<td>指定获取到视频流类型</td></tr>
<tr>
<td>streamType</td>
<td>JRTC_VIDEO_STREAM_TYPE</td>
<td>是</td>
<td>视频流类型，0为小画面视频流 1为大画面视频流</td></tr></tbody></table>
<p>15.切换大小画面流</p>
<p>加入房间成功后，才可调用此接口。 全屏展示视频时，可以选择视频流为大画面视频流， 小屏展示视频时，可选择视频流为小画面视频流，已达到减少耗电与节省流量。 此接口没有相应的成功失败回调，如果失败，则保持为切换前的大小画面视频流。 如果视频流大小画面切换成功，会触发onFirstVideoFrame视频帧宽高改变回调 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。 如果远端用户只发布了小画面视频流，本地用户切换远端用户大小画面视频流无效，都会只展示远端用户发布的视频流。 如果远端用户只发布了大画面视频流，本地用户切换远端用户大小画面视频流会有效，会展示远端用户发布的大小画面视频流。 注意:未订阅成功的视频流，禁止切换大小画面流。</p>
<h3><code class="language-Object-C">changeVideoStreamWithPeerId: videoStreamId:
            streamModelType:
                 streamType:
</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td colspan="1">peerId</td>
<td colspan="1">
<p>NSString</p></td>
<td colspan="1"><span>是</span></td>
<td colspan="1">
<p>视频流对应的peerId</p></td></tr>
<tr>
<td>videoStreamId</td>
<td>NSString</td>
<td>是</td>
<td>视频流</td></tr>
<tr>
<td>modelType</td>
<td>JRTC_VIDEO_STREAM_MODEL_TYPE</td>
<td>是</td>
<td>指定获取到视频流类型</td></tr>
<tr>
<td>streamType</td>
<td>JRTC_VIDEO_STREAM_TYPE</td>
<td>是</td>
<td>视频流类型，0为小画面视频流 1为大画面视频流</td></tr></tbody></table>
<p>16.取消订阅远端视频流，</p>
<p>加入房间成功后，才可调用此接口。 取消订阅成功后，本地用户会收到JRTCCloudRoomDelegate.h中对应视频流不可用回调， 进而更改相应UI展示。 调用此接口，出错时，本地用户会收到JRTCCloudRoomDelegate中的错误回调； 成功的话本地用户端不会收到任何回调，直接修改相关数据状态。 调完此接口后，videoView会展示为黑色画面。 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;font-size: 16.0px;font-weight: bold;letter-spacing: -0.006em;">stopRemoteVideoWithVideoView:peerId:streamID:</span></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>videoView</td>
<td>JRTCVideoView</td>
<td>是</td>
<td>远端视频流要取消绘制的画面</td></tr>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>是</td>
<td>要取消订阅视频流对应的peerID</td></tr>
<tr>
<td>streamId</td>
<td>NSString</td>
<td>是</td>
<td>要取消订阅视频流对应的streamId</td></tr></tbody></table>
<p>17.暂停/继续订阅远端的视频数据。</p>
<p>加入房间成功后，才可调用此接口。 暂停的话通道不断，网络数据不收，本地用户不会收到回调消息， 同一房间中，对应远端用户画面会展示为远端视频流最后一帧画面。 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code class="language-Object-C">muteRemoteVideoWithStreamId:mute:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>streamId</td>
<td>NSString</td>
<td>是</td>
<td>远端视频流streamId</td></tr>
<tr>
<td>mute</td>
<td>BOOL</td>
<td>是</td>
<td>YES为暂停 NO为继续</td></tr></tbody></table>
<p>18.暂停/继续订阅所有远端用户的视频数据。</p>
<p>加入房间成功后，才可调用此接口。 暂停的话通道不断，网络数据不收，本地用户不会收到回调消息， 同一房间中，远端所有用户画面会展示为视频流最后一帧画面。</p>
<h3><code>muteAllRemoteVideoStreamsWithMute:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>mute</td>
<td>BOOL</td>
<td>是</td>
<td>YES为暂停 NO为继续</td></tr></tbody></table>
<p>19.设置本地摄像头预览画面的镜像模式</p>
<h3><code>setLocalViewWithMirror:</code></h3>
<p>&nbsp;参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>mirror</td>
<td>BOOL</td>
<td>是</td>
<td>YES为镜像 NO为非镜像</td></tr></tbody></table>
<h2>JRTCCloud类音频相关方法</h2>
<p>20.开启本地音频的采集</p>
<p>当本地用户加进房间成功后，会自动发布本地用户音频流， 推流成功后，本地用户会收到JRTCCloudRoomDelegate中本地音频流可用的回调消息， 远端用户会收到JRTCCloudRoomDelegate中有音频流可以订阅的回调，远端用户可以根据有音频流可以订阅， 来决定是否订阅此条音频流。</p>
<ul>
<li>本地用户加入房间后，调用此函数，发布音频流，如果发布音频流超时，会触发错误类型为JRTC_ERROR_CODE_PUBLISH_AUDIO_STREAM_TIMEOUT错误回调，超时时间15秒，本地用户可重新调用此函数，重新发布音频流。</li></ul>
<h3><code>startLocalAudio</code></h3>
<p>21.关闭本地音频的采集和上行</p>
<p>调用此接口，出错时，本地用户会收到JRTCCloudRoomDelegate中的错误回调； 成功的话本地用户端不会收到任何回调，直接修改相关数据状态。 远端用户会走JRTCCloudRoomDelegate中有音频流不可以订阅的回调， 远端用户可以根据有音频流不可以订阅，来置空此条音频流相关信息。</p>
<h3><code>stopLocalAudio</code></h3>
<p>22.订阅远端音频流</p>
<p>加入房间成功后，才可调用此接口。 订阅远端视频流后，订阅成功后，本地用户会收到JRTCCloudRoomDelegate中音频流继续、 音频流音量信息的回调消息。 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<ul>
<li>大房间模式下，用户不可订阅远端用户音频流。</li>
<li>本地用户加入房间后，调用此函数，订阅远端音频流，订阅音频流超时，会触发JRTC_ERROR_CODE_SUBSCRIBE_AUDIO_STREAM_TIMEOUT类型的错误回调，超时时间15秒，本地用户可重新调用此函数，重新订阅音频流。</li></ul>
<h3><code class="language-Object-C">startRemoteAudioWithPeerId: streamID:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>是</td>
<td>要订阅音频流对应的peerID</td></tr>
<tr>
<td>streamId</td>
<td>NSString</td>
<td>是</td>
<td>要订阅音频流对应的streamId</td></tr></tbody></table>
<p>23.取消订阅远端音频流</p>
<p>加入房间成功后，才可调用此接口。 调用此接口，出错时，本地用户会收到JRTCCloudRoomDelegate中的错误回调； 成功的话本地用户端不会收到任何回调，直接修改相关数据状态。 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<ul>
<li>注意:1.大房间模式下，本地用户不可取消订阅远端用户音频流。</li></ul>
<h3><code class="language-Object-C">stopRemoteAudioWithPeerId:streamID:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>是</td>
<td>要取消订阅音频流对应的peerID</td></tr>
<tr>
<td>streamId</td>
<td>NSString</td>
<td>是</td>
<td>要取消订阅音频流对应的streamId</td></tr></tbody></table>
<p>24.静音/取消静音本地的音频</p>
<p>加入房间成功后，才可调用此接口。 远端用户会收到JRTCCloudRoomDelegate中有音频流暂停或者继续的回调消息， 进而改变有关音频展示的UI，本地用户不会收到回调消息。</p>
<h3><code>muteLocalAudioWithMute:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>mute</td>
<td>BOOL</td>
<td>是</td>
<td>mute YES为静音 NO为取消静音</td></tr></tbody></table>
<p>25.静音/取消静音指定的远端用户的声音。</p>
<p>加入房间成功后，才可以调用此接口。 静音的话通道不断，网络数据不收，本地用户不会收到回调消息。 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code class="language-Object-C">muteRemoteAudioStreamWithStreamId:mute:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>streamId</td>
<td>NSString</td>
<td>是</td>
<td>音频流streamId</td></tr>
<tr>
<td>mute</td>
<td>BOOL</td>
<td>是</td>
<td>YES为静音 NO为取消静音</td></tr></tbody></table>
<p>26.静音/取消静音所有远端用户的声音</p>
<p>加入房间成功后，才可以调用此接口。 静音的话通道不断，网络数据不收，本地用户不会收到回调消息。</p>
<h3><code>muteAllRemoteAudioStreamsWithMute:</code></h3>
<p>&nbsp;参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>mute</td>
<td>BOOL</td>
<td>是</td>
<td>YES为静音 NO为取消静音</td></tr></tbody></table>
<p><br /></p>
<p>27.设置听筒或者外放</p>
<p><span>只有在未链接耳机的情况下，生效。</span></p>
<h3><code>setSpeaker:</code></h3>
<p>参数说明：</p>
<table><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>isSpeaker</td>
<td>BOOL</td>
<td>否</td>
<td>YES为外放，NO为听筒，默认为听筒</td></tr></tbody></table>
<h2>JRTCCloud类切换摄像头接口</h2>
<p>28.切换前后摄像头</p>
<h3><code>switchCamera</code></h3>
<h2>JRTCCloud类美颜美白，滤镜相关接口</h2>
<p>29.设置美颜美白</p>
<p>参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code>setBeautyWhiteLevelWithLeve:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>level</td>
<td>int</td>
<td>是</td>
<td>美颜美白级别只能是0-5。0的话代表不进行美颜美白处理</td></tr></tbody></table>
<p>30.获取美颜美白级别</p>
<h3><code>getBeautyWhiteLevelWithFinishBlock:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>finishBlock</td>
<td>void(^)(int result)</td>
<td>是</td>
<td>获取到的美颜美白级别回调 result为美颜美白级别，result 美颜美白级别只能是0-5。0的话代表不进行美颜美白处理</td></tr></tbody></table>
<p>31.设置滤镜级别</p>
<p>参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code>setFilterEffectIndexWithIndex:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>index</td>
<td>int</td>
<td>是</td>
<td>滤镜级别，滤镜级别只能是0-5。0的话代表不进行滤镜处理</td></tr></tbody></table>
<p>32.获取滤镜级别</p>
<h3><code>getFilterEffectIndexWithFinishBlock:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>finishBlock</td>
<td>void(^)(int result)</td>
<td>是</td>
<td>获取到的滤镜级别回调 result为滤镜级别，result 滤镜级别，滤镜级别只能是0-5。0的话代表不进行滤镜处理</td></tr></tbody></table>
<p>33.使用滤镜对原始图片进行滤镜渲染</p>
<p>参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code class="language-Object-C">getEffectImageWithEffectIndex:preImage:finishBlock:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>effectIndex</td>
<td>NSInteger</td>
<td>是</td>
<td>设置滤镜级别，范围为0-5</td></tr>
<tr>
<td>preImage</td>
<td>UIImage</td>
<td>是</td>
<td>原始图片</td></tr>
<tr>
<td>finishBlock</td>
<td>void(^)(UIImage *image)</td>
<td>是</td>
<td>渲染完成后，生成新的图片的回调，image为新生成的图片</td></tr></tbody></table>
<h2>JRTCCloud类修改昵称接口</h2>
<p>注意：只能是进入房间成功后，才能修改昵称</p>
<p>34.修改昵称</p>
<p>加入房间成功后，才可以调用此接口。 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code>changeNickNameWithNickName:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>nickName</td>
<td>NSString</td>
<td>是</td>
<td>新的昵称</td></tr></tbody></table>
<h2>JRTCCloud类监控开启与关闭接口</h2>
<p>35.开启与关闭监控</p>
<p>开启监控会走JRTCCloudRoomDelegate.h中状态统计信息的回调</p>
<ul>
<li>注意:暂时只能在订阅远端流成功后，才能开启监控</li></ul>
<h3><code class="language-Object-C">enableStreamStatWithIsStat:intervalSec:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>isstat</td>
<td>BOOL</td>
<td>是</td>
<td>是否开启监控 YES为开启监控 NO为关闭监控</td></tr>
<tr>
<td>intervalSec</td>
<td>NSInteger</td>
<td>是</td>
<td>监控时间间隔</td></tr></tbody></table>
<h2>JRTCCloud类获取版本号接口</h2>
<p>36.获取版本号</p>
<h3><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;letter-spacing: 0.0px;">getSDKVersion</span></h3>
<h2>JRTCCloud类发送消息接口</h2>
<p>37.发送消息</p>
<p>发送消息，消息大厅和普通模式下，发送消息都调用此函数。</p>
<ul>
<li>
<ol>
<li>消息大厅模式下，用户不必加进房间，发送消息后，远端用户会收到JRTCCloudMessageDelegate中的回调消息；</li></ol></li>
<li>
<ol>
<li>普通模式下，用户必须加入房间，同一房间中，远端用户会走JRTCCloudRoomDelegate.h中消息接收回调。</li></ol></li></ul>
<h3><code class="language-Object-C">sendMessageWithModel:finishBlock:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>messageModel</td>
<td>JRTCMessageModel</td>
<td>是</td>
<td>消息内容,当messageModel中的toUserID为空时，为广播消息；有值时为单独发给对应的远端用户</td></tr>
<tr>
<td>finishBlock</td>
<td>SendMessageBlock</td>
<td>是</td>
<td>发送消息完成回调</td></tr></tbody></table>
<h2>JRTCCloud类混流接口</h2>
<p>38.开始混流任务</p>
<p>下发混流任务，混流成功后，本地用户会收到JRTCCloudRoomDelegate中混流成功的回调 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code class="language-Object-C">startMixStreamWithSrcStreamInfos:destStreamInfo:toPushStreamUrl:</code></h3>
<p>参数说明：</p>
<table class="wrapped relative-table" style="width: 43.628376%;"><colgroup><col style="width: 18.876081%;" /><col style="width: 27.965147%;" /><col style="width: 11.0951%;" /><col style="width: 42.06592%;" /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>srcStreamInfos</td>
<td>NSArray</td>
<td>是</td>
<td>源流信息列表</td></tr>
<tr>
<td>destStreamInfo</td>
<td>JRTCMixDestStreamModel</td>
<td>是</td>
<td>混流后 目标流id</td></tr>
<tr>
<td>toPushStreamUrl</td>
<td>NSString</td>
<td>非</td>
<td>推直播平台的推流地址，如果存在必须携带</td></tr></tbody></table>
<p>39.更新混流任务</p>
<p>只有已经混流成功的视频流，才可以调用此接口 更新混流成功后，本地用户会收到JRTCCloudRoomDelegate中更新混流成功的回调 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code class="language-Object-C">updateMixStreamWithSrcStreamInfos:destStreamId:toPushStreamUrl:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>srcStreamInfos</td>
<td>NSArray</td>
<td>是</td>
<td>源流信息列表</td></tr>
<tr>
<td>destStreamInfo</td>
<td>JRTCMixDestStreamModel</td>
<td>是</td>
<td>混流后 目标流id</td></tr>
<tr>
<td>toPushStreamUrl</td>
<td>NSString</td>
<td>非</td>
<td>推直播平台的推流地址，如果存在必须携带</td></tr></tbody></table>
<p>40.关闭混流任务</p>
<p>本地用户不会收到任何回调 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code class="language-Object-C">closeMixStreamWithDestStreamId:toPushStreamUrl:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>destStreamId</td>
<td>NSString</td>
<td>是</td>
<td>混流后 目标流id</td></tr>
<tr>
<td>toPushStreamUrl</td>
<td>NSString</td>
<td>非</td>
<td>推直播平台的推流地址，如果存在必须携带</td></tr></tbody></table>
<h2>JRTCCloud类会控接口</h2>
<p><br /></p>
<p>41.远端用户全体静音或取消静音</p>
<p>加入房间成功后，才可以调用此接口。 同一房间内，本地用户不会收到回调消息； 远端所有用户都会收到JRTCCloudRoomDelegate.h房间静音或取消静音的回调消息。</p>
<h3><code>muteAllAudioWithIsMute:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>isMute</td>
<td>BOOL</td>
<td>是</td>
<td>静音/取消静音</td></tr></tbody></table>
<p>42.单独静音或取消静音某个用户</p>
<p>加入房间成功后，才可以调用此接口。 同一房间内，房间中对应人员会收到JRTCCloudRoomDelegate.h静音或取消静音的回调。 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code class="language-Object-C">mutePeerAudioWithIsMute:peerID:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>isMute</td>
<td>BOOL</td>
<td>是</td>
<td>静音/取消静音</td></tr>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>是</td>
<td>对应用户peerId</td></tr></tbody></table>
<p>43.房间中禁止/允许开启视频</p>
<p>加入房间成功后，才可以调用此接口。 同一房间内，远端用户全部禁止/允许开启视频频流，本地用户不会收到回调消息； 远端所有用户都会收到JRTCCloudRoomDelegate.h中房间中禁止/允许开启视频流的回调。</p>
<h3><code>forbidAllVideoWithIsForbid:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>isForbid</td>
<td>BOOL</td>
<td>是</td>
<td>关闭或取消关闭推视频流</td></tr></tbody></table>
<p>44.远端用户禁止/允许开启视频流，</p>
<p>加入房间成功后，才可以调用此接口。 同一房间内，本地用户不会收到回调消息； 远端对应用户会收到JRTCCloudRoomDelegate.h单个用户禁止/允许开启视频流回调。 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code class="language-Object-C">forbidPeerVideoWithIsForbid:peerID:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>isForbid</td>
<td>BOOL</td>
<td>是</td>
<td>禁止/允许开启视频流</td></tr>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>是</td>
<td>对应用户pe<span style="background-color: rgb(255,222,0);">erId</span></td></tr></tbody></table>
<p>45.禁止/允许聊天</p>
<p>加入房间成功后，才可以调用此接口。 同一房间内，本地用户不会收到回调消息； 远端所有用户都会收到JRTCCloudRoomDelegate.h中房间中禁止/允许聊天回调。</p>
<h3><code>forbidChatWithIsForbid:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>isForbid</td>
<td>BOOL</td>
<td>是</td>
<td>禁止/允许聊天</td></tr></tbody></table>
<p>46.主持人结束会议</p>
<p>加入房间成功后，才可以调用此接口。 同一房间内，远端用户会收到JRTCCloudRoomDelegate.h中主持人结束会议回调。</p>
<h3><code>hosterFinishMeeting</code></h3>
<p>47.主持人离开房间时，产生新的主持人</p>
<p>加入房间成功后，才可以调用此接口。 同一房间内，远端用户会收到JRTCCloudRoomDelegate.h中产生新的主持人回调。 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code>creatNewHosterWithHosterPeerId:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>hosterPeerId</td>
<td>NSString</td>
<td>是</td>
<td>新的主持人peerId</td></tr></tbody></table>
<p>48.向整个房间发送自定义事件。</p>
<p>加入房间成功后，才可以调用此接口。 同一房间内，本地用户不会收到回调， 远端用户会收到JRTCCloudRoomDelegate.h中自定义房间事件回调 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code class="language-Object-C">customSignalToRoomWithEventName:eventInfo:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>eventName</td>
<td>NSString</td>
<td>是</td>
<td>自定义事件名称，不能为空</td></tr>
<tr>
<td>info</td>
<td>NSDictionary</td>
<td>是</td>
<td>事件需要携带的信息，不能为空</td></tr></tbody></table>
<p>49.向某个人发送自定义事件。</p>
<p>加入房间成功后，才可以调用此接口。 同一房间内，本地用户不会收到回调， 对应远端用户会收到JRTCCloudRoomDelegate.h中自定义事件回调 参数错误的话，会收到JRTCCloudRoomDelegate中错误回调。</p>
<h3><code class="language-Object-C">customSignalToPeerWithTargetPeerId:eventName:eventInfo:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>是</td>
<td>接受事件人的peerId，不能为空</td></tr>
<tr>
<td>eventName</td>
<td>NSString</td>
<td>是</td>
<td>自定义事件名称，不能为空</td></tr>
<tr>
<td>info</td>
<td>NSDictionary</td>
<td>是</td>
<td>事件需要携带的信息，不能为空</td></tr></tbody></table>
<h2>JRTCCloud类分享屏幕接口</h2>
<p>50.<span style="letter-spacing: 0.0px;">只支持iOS12及以上系统，开始分享录屏前，调用此接口，开始分享</span></p>
<p><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;font-size: 16.0px;font-weight: bold;letter-spacing: -0.006em;">screenShareStart</span></p>
<p><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;font-size: 16.0px;font-weight: bold;letter-spacing: -0.006em;"><br /></span></p>
<p>51.<span style="letter-spacing: 0.0px;">只支持iOS12及以上系统，录屏分享结束后，调用此接口，结束分享</span></p>
<p><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;font-size: 16.0px;font-weight: bold;letter-spacing: -0.006em;">screenShareFinished</span></p>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>是否必传</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>isMute</td>
<td>BOOL</td>
<td>是</td>
<td>静音/取消静音</td></tr></tbody></table>
<h1>2 JRTCCloudExt类</h1>
<p>描述 &nbsp;<span>JRTCCloudExt类是接收录屏视频原始数据类，提供了接收录屏Extension视频原始数据的接口</span></p>
<p>1.生成传递录屏视频数据单利</p>
<h3><code class="language-Object-C">-(void)sharedInstance</code></h3>
<p><br /></p>
<p>2.开始录屏</p>
<h3><code class="language-Object-C">-(void)startScreenShare</code></h3>
<p><span style="letter-spacing: 0.0px;">3.结束录屏</span></p>
<h3><code class="language-Object-C">-(void)stopScreenShare</code></h3>
<p><span style="letter-spacing: 0.0px;"><br /></span></p>
<p><span style="letter-spacing: 0.0px;">1.发送屏幕共享视频原始数据</span></p>
<h3><code class="language-Object-C">-(void)sendSampleBuffer:&nbsp;</code></h3>
<p><span style="letter-spacing: 0.0px;">参数说明：</span></p>
<table class="wrapped"><colgroup><col style="width: 87.0px;" /><col style="width: 106.0px;" /><col style="width: 150.0px;" /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td><span>sampleBuffer</span></td>
<td>CMSampleBufferRef</td>
<td>视频原始数据</td></tr></tbody></table>
<h1>3 各种回调事件</h1>
<h2>1.JRTCCloudRoomDelegate</h2>
<p>描述<span style="letter-spacing: 0.0px;">视频会议房各种事件回调接口</span></p>
<p>1.错误事件回调</p>
<h3><code class="language-Object-C">-(void)onRoomError:errorState:errorInfo:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col style="width: 87.0px;" /><col style="width: 106.0px;" /><col style="width: 150.0px;" /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>errorCode</td>
<td>NSInteger</td>
<td>错误码</td></tr>
<tr>
<td>errorState</td>
<td>NSString</td>
<td>错误描述</td></tr>
<tr>
<td>errorInfo</td>
<td>NSDictionary</td>
<td>错误信息，可能为空</td></tr></tbody></table>
<p>2.加入房间成功回调</p>
<h3><code class="language-Object-C">onRoomJoin:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerInfosDict</td>
<td>NSDictionary</td>
<td>房间中的所有用户信息</td></tr></tbody></table>
<h2>用户事件回调</h2>
<p>3.新用户加入房间回调 @param userId&nbsp;用户userId @param nickName 用户昵称</p>
<h3><code class="language-Object-C">onRoomUserJoin:nickName:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>用户peerId</td></tr>
<tr>
<td>nickName</td>
<td>NSString</td>
<td>用户昵称</td></tr></tbody></table>
<p>4.用户离开房间回调</p>
<h4><code class="language-Object-C">onRoomUserLeave:</code></h4>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>用户peerId</td></tr></tbody></table>
<h2>流信息事件回调</h2>
<p>5.对于远端视频流对应为是否可订阅回调；对于用户自己的视频流，用户本地视频流推流成功后，本行用户会收到此回调，同时available为YES。</p>
<h3><code class="language-Object-C">onUserVideoAvailableWithPeerId:streamId:streamName:available:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>用户peerId</td></tr>
<tr>
<td>streamId</td>
<td>NSString</td>
<td>视频流ID</td></tr>
<tr>
<td>streamName</td>
<td>NSString</td>
<td>视频流名称</td></tr>
<tr>
<td>available</td>
<td>BOOL</td>
<td>视频流是否可用</td></tr></tbody></table>
<p>6.对于远端音频流对应为是否可订阅回调；对于用户自己的音频流，用户本地音频流推流成功后，本行用户会收到此回调，同时available为YES。</p>
<h3><code class="language-Object-C">onUserAudioAvailableWithPeerId:streamId:streamName:available:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>用户peerId</td></tr>
<tr>
<td>streamId</td>
<td>NSString</td>
<td>音频流ID</td></tr>
<tr>
<td>streamName</td>
<td>NSString</td>
<td>音频流名称</td></tr>
<tr>
<td>available</td>
<td>BOOL</td>
<td>音频流是否可用</td></tr></tbody></table>
<p>7.视频流暂停或者继续回调</p>
<h3><code class="language-Object-C">onUserVideoMuteWithPeerId:streamId:mute:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>用户peerId</td></tr>
<tr>
<td>streamId</td>
<td>NSString</td>
<td>视频流ID</td></tr>
<tr>
<td>mute</td>
<td>BOOL</td>
<td>视频流暂停或者继续</td></tr></tbody></table>
<p>8.音频流暂停或者继续回调</p>
<h3><code class="language-Object-C">onUserAudioMuteWithPeerId:streamId:mute:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>用户peerId</td></tr>
<tr>
<td>streamId</td>
<td>NSString</td>
<td>音频流ID</td></tr>
<tr>
<td>mute</td>
<td>BOOL</td>
<td>视频流暂停或者继续</td></tr></tbody></table>
<p>9.房间中有人正在说话的回调</p>
<h3><code class="language-Object-C">onRoomUserVoiceActived:userId:volume:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>roomId</td>
<td>NSString</td>
<td>房间ID</td></tr>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>用户peerId</td></tr>
<tr>
<td>volume</td>
<td>NSDictionary</td>
<td>音量，范围为0.0-1.0，值越大，表示音量越大</td></tr></tbody></table>
<p><br /></p>
<p><span style="letter-spacing: 0.0px;">10.视频流开始展示的第一帧宽高回调</span></p>
<p>用户可以根据视频帧宽高比来展示相应的视频画面</p>
<p><br /></p>
<h3><code class="language-Object-C">onFirstVideoFrameWithPeerId:streamId:width:height:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>视频流对应的peerId</td></tr>
<tr>
<td>streamId</td>
<td>NSString</td>
<td>视频流ID，本地预览的时候，streamId为nil</td></tr>
<tr>
<td>width</td>
<td>CGFloat</td>
<td>视频帧宽度</td></tr>
<tr>
<td>height</td>
<td>CGFloat</td>
<td>视频帧高度</td></tr></tbody></table>
<h2>修改昵称回调</h2>
<p>11.有用户修改昵称回调</p>
<h3><code class="language-Object-C">onRoomUserUpdateNickName:peerId:nickName:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>roomId</td>
<td>NSString</td>
<td>房间ID</td></tr>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>用户peerId</td></tr>
<tr>
<td>nickName</td>
<td>BOOL</td>
<td>用户新昵称</td></tr></tbody></table>
<p>12.状态统计信息回调</p>
<h3><code class="language-Object-C">onStatusInfo:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>statusInfo</td>
<td>NSDictionary</td>
<td>状态统计信息</td></tr></tbody></table>
<h2>消息事件回调</h2>
<p>13.普通房间接收到广播消息回调</p>
<p>如果是自己发送给所有人，自己也会收到这条回调</p>
<h3><code class="language-Object-C">onRecvMsgFromPwerId:nickName:msg:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>发送消息者peerId</td></tr>
<tr>
<td>nickName</td>
<td>NSString</td>
<td>发送消息者昵称</td></tr>
<tr>
<td>msg</td>
<td>NSString</td>
<td>消息内容</td></tr></tbody></table>
<h2>混流回调</h2>
<p>14.混流成功回调</p>
<h3><code class="language-Object-C">onRoomMixStreamWithDestStreamId:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>destStreamId</td>
<td>NSString</td>
<td>生成混流的streamId</td></tr></tbody></table>
<p>15.更新混流成功回调</p>
<h3><code class="language-Object-C">onRoomUpdateMixStreamWithDestStreamId:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>destStreamId</td>
<td>NSString</td>
<td>更新后,生成混流的streamId</td></tr></tbody></table>
<h2>会议控制</h2>
<p>16.本地用户接收到向整个房间广播的静音或者取消静音回调</p>
<h3><code class="language-Object-C">onAudioMuteToRoomWithIsMute:fromPeerId:nickName:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>isMute</td>
<td>BOOL</td>
<td>静音或者取消静音</td></tr>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>发出静音或者取消静音room的peerId</td></tr>
<tr>
<td>nickName</td>
<td>NSString</td>
<td>发出静音或者取消静音room的的nickName</td></tr></tbody></table>
<p>17.本地用户接收到被静音或者取消静音回调</p>
<h3><code class="language-Object-C">onAudioMuteFromPeerWithIsMute:fromPeerId:nickName:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>isMute</td>
<td>BOOL</td>
<td>静音或者取消静音</td></tr>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>发送静音或者取消静音者的peerId</td></tr>
<tr>
<td>nickName</td>
<td>NSString</td>
<td>发送静音或者取消静音者的nickName</td></tr></tbody></table>
<p>18.本地用户接收到向整个房间广播的禁止或者取消禁止房间视频回调</p>
<h3><code class="language-Object-C">onForbidVideoToRoomWithIsForbid:fromPeerId:nickName:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>isForbid</td>
<td>BOOL</td>
<td>禁止或者取消禁止房间视频</td></tr>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>发出关闭或取消关闭房间视频的peerId</td></tr>
<tr>
<td>nickName</td>
<td>NSString</td>
<td>发出关闭或取消关闭房间视频的的nickName</td></tr></tbody></table>
<p>19.本地用户接收到被禁止或者取消禁止视频回调</p>
<h3><code class="language-Object-C">onForbidVideoFromUserWithIsForbid:fromPeerId:nickName:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>isForbid</td>
<td>BOOL</td>
<td>禁止或者取消禁止房间某个userId的视频</td></tr>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>发送关闭或取消关闭房间视频者的peerId</td></tr>
<tr>
<td>nickName</td>
<td>NSString</td>
<td>发送关闭或取消关闭房间视频者userId对应的nickName</td></tr></tbody></table>
<p>20.本地用户接收到向整个房间广播禁言回调</p>
<h3><code class="language-Object-C">onForbiddenChatToRoomWithPeerId:nickName:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>禁言房间聊天发出者peerId</td></tr>
<tr>
<td>nickName</td>
<td>NSString</td>
<td>禁言房间聊天发出者nickName</td></tr></tbody></table>
<p>21.本地用户接收到向整个房间取消禁言回调</p>
<h3><code class="language-Object-C">onUnForbiddenChatToRoomWithPeerId:nickName:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSInteger</td>
<td>关闭禁言房间聊天发出者peerId</td></tr>
<tr>
<td>nickName</td>
<td>NSString</td>
<td>关闭禁言房间聊天发出者nickName</td></tr></tbody></table>
<p>22.本地用户接收到向整个房间广播的主持人结束会议回调</p>
<p>同一房间里所有人都会收到此回调</p>
<h3><code class="language-Object-C">onHosterFinishMeeting</code></h3>
<p>23.本地用户接收到向整个房间广播的产生新的主持人回调</p>
<h3><code class="language-Object-C">onNewHosterCreatedWithUserId:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>userId</td>
<td>NSString</td>
<td>新的主持人userId</td></tr></tbody></table>
<p>24.本地用户接收到向整个房间广播的自定义信令回调</p>
<p>同一房间里除了主持人，其他人都会收到此回调</p>
<h3><code class="language-Object-C">onCustomSignalToRoomWithEventName:peerId:nickName:eventInfo:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>eventName</td>
<td>NSString</td>
<td>自定义事件名称</td></tr>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>发出自定义广播信令者的peerId</td></tr>
<tr>
<td>nickName</td>
<td>NSString</td>
<td>发出自定义广播信令者的nickName</td></tr>
<tr>
<td>info</td>
<td>NSDictionary</td>
<td>自定义事件携带的信息，可以是普通字符串，也可以是可转化为json格式的字符串，客户端可根据自己需要获取相关信息</td></tr></tbody></table>
<p>25.本地用户接收到发送给本地用户的自定义信令回调</p>
<h3><code class="language-Object-C">onCustomSignalToUserWithEventName:peerId:nickName:eventInfo:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>eventName</td>
<td>NSString</td>
<td>自定义事件名称</td></tr>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>发出自定义信令者的peerId</td></tr>
<tr>
<td>nickName</td>
<td>NSString</td>
<td>发出自定义信令者的nickName</td></tr>
<tr>
<td>info</td>
<td>NSDictionary</td>
<td>自定义事件携带的信息，可以是普通字符串，也可以是可转化为json格式的字符串，客户端可根据自己需要获取相关信息</td></tr></tbody></table>
<h2>2. JRTCCloudNetDelegate</h2>
<p>描述<span style="letter-spacing: 0.0px;">视频通话网络事件回调接口</span></p>
<p>1.<span style="letter-spacing: 0.0px;">当前网络连接类型。</span></p>
<p><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;font-size: 16.0px;font-weight: bold;letter-spacing: -0.006em;">onNetType:</span></p>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>
<p>type</p></td>
<td>
<p>JRTC_NetWorkType</p></td>
<td>当前网络连接类型</td></tr></tbody></table>
<p>2.<span style="letter-spacing: 0.0px;">网络连接断开，触发这个回调后SDK内部会一直重新加入房间，直到有网后加入房间成功，然后会触发网络连接恢复。</span></p>
<h3><span>onNetStatusClose</span></h3>
<p>3.&nbsp;<span style="letter-spacing: 0.0px;">网络连接恢复，网络链接恢复后，App会收到加入房间成功及当前哪些流可以订阅的回调。</span></p>
<h3><code class="language-Object-C">-(void)onNetStatusRecovery</code></h3>
<h2>3. JRTCCloudMessageDelegate</h2>
<p>描述<span style="font-size: 14.0px;letter-spacing: 0.0px;">视频通话消息大厅事件回调接口</span></p>
<p>1.消息大厅错误事件回调</p>
<h3><code class="language-Object-C">messageOnErrorWithErrorCode:errorState:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>errorCode</td>
<td>NSInteger</td>
<td>错误码</td></tr>
<tr>
<td>errorState</td>
<td>NSString</td>
<td>错误描述</td></tr></tbody></table>
<p>2.消息大厅接收到广播事件回调</p>
<h3><code class="language-Object-C">messageOnUserBroadcastMessageFromPeerID:msg:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>发送广播者peerId</td></tr>
<tr>
<td>msg</td>
<td>NSString</td>
<td>消息内容</td></tr></tbody></table>
<p>3.消息大厅接收到消息回调</p>
<h3><code class="language-Object-C">messageOnUserSendMessageFromPeerWithPeerID:msg:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSString</td>
<td>消息发送者peerId</td></tr>
<tr>
<td>msg</td>
<td>NSString</td>
<td>消息内容</td></tr></tbody></table>
<h1>4 保存数据信息的模型类</h1>
<h2>1. JRTCEnterRoomAuthModel类</h2>
<p>描述<span style="font-size: 14.0px;letter-spacing: 0.0px;">加入房间必传的鉴权信息</span></p>
<p><span style="letter-spacing: 0.0px;">1.房间号</span></p>
<h3><code>@property(nonatomic,strong)NSNumber *roomId;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>roomId</td>
<td>NSNumber</td>
<td>是</td>
<td>房间号</td></tr></tbody></table>
<p>2.用户peerId</p>
<h3><code>@property(nonatomic,strong)NSNumber *peerId;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>peerId</td>
<td>NSNumber</td>
<td>是</td>
<td>
<p>用户peerId，用户京东账号登录成功后，控制台相关接口会下发peerId</p></td></tr></tbody></table>
<p>3.用户昵称</p>
<h3><code>@property(nonatomic,strong)NSString *nickName;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>nickName</td>
<td>NSString</td>
<td>是</td>
<td>用户昵称</td></tr></tbody></table>
<p>4.appId</p>
<h3><code>@property(nonatomic,strong)NSString *appId;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>appId</td>
<td>NSString</td>
<td>是</td>
<td>用户在JRTC控制台申请JRTC SDK 接入时，appId由JRTC控制台生成</td></tr></tbody></table>
<p>5.token</p>
<h3><code>@property(nonatomic,strong)NSString *token;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>token</td>
<td>NSString</td>
<td>是</td>
<td>用户在JRTC控制台申请JRTC SDK 接入时，token由JRTC控制台生成</td></tr></tbody></table>
<p>6.userId</p>
<h3><code>@property(nonatomic,strong)NSString *userId;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>userId</td>
<td>NSString</td>
<td>是</td>
<td>第三方用户ID</td></tr></tbody></table>
<p>7.令牌随机码nonce</p>
<h3><code>@property(nonatomic,strong)NSString *nonce;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>nonce</td>
<td>NSString</td>
<td>是</td>
<td>令牌随机码，用户在JRTC控制台申请JRTC SDK 接入时，nonce由JRTC控制台生成</td></tr></tbody></table>
<p>8.令牌过期时间戳timestamp(毫秒)，第三方用户生成，毕传</p>
<h3><code>@property(nonatomic,strong)NSString *timestamp;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>timestamp</td>
<td>NSString</td>
<td>是</td>
<td>令牌过期时间戳(毫秒)，第三方用户生成</td></tr></tbody></table>
<p>9.<span style="letter-spacing: 0.0px;">房间类型roomType</span></p>
<h3><span style="letter-spacing: 0.0px;">&nbsp;</span><code style="letter-spacing: 0.0px;">@property(nonatomic,strong)NSNumber *roomType;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>roomType</td>
<td>NSNumber</td>
<td>是</td>
<td>房间类型roomType 1 小会议 2 大会议 3 MCU混音模式会议 4 视频连麦模式会议 5 音频连麦模式，</td></tr></tbody></table>
<p>10.<span style="letter-spacing: 0.0px;">设备唯一号</span><span style="letter-spacing: 0.0px;">unionId</span></p>
<h3><span>&nbsp;</span><code>@property(nonatomic,strong)NSString *unionId;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>
<p>unionId</p></td>
<td>
<p>NSString</p></td>
<td>是</td>
<td>
<p>同一台设备，要保证unionId唯一且不变</p></td></tr></tbody></table>
<p>11.<span style="letter-spacing: 0.0px;">录制文件名</span><span style="letter-spacing: 0.0px;">recordFileName</span></p>
<h3><span>&nbsp;</span><code>@property(nonatomic,strong)NSString *recordFileName;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>
<p>recordFileName</p></td>
<td>NSString</td>
<td>否</td>
<td>
<p>录制文件名，<span style="color: rgb(0,0,0);">用于指定是否要在云端将该用户的音视频流录制下来，<span style="color: rgb(0,0,0);">限制长度为64字节，只允许包含大小写英文字母（a-zA-Z）、数字（0-9）及下划线和连词符</span></span></p></td></tr></tbody></table>
<p>12.<span style="letter-spacing: 0.0px;">转推直播流名</span><span style="letter-spacing: 0.0px;">liveStreamName</span></p>
<h3><span>&nbsp;</span><code>@property(nonatomic,strong)NSString *liveStreamName;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td><span>liveStreamName</span></td>
<td>
<p>NSString</p></td>
<td><span>否</span></td>
<td>
<p>转推直播流名，<span style="color: rgb(0,0,0);">设置之后，您可以在京东云直播 CDN 上通过标准拉流方案播放该用户的音视频流。</span></p></td></tr></tbody></table>
<h2><span style="letter-spacing: -0.008em;">2. JRTCMessageModel类</span></h2>
<p>描述<span style="letter-spacing: 0.0px;">保存消息信息</span></p>
<p>1.JRTC_MESSAGE_MODE</p>
<p>消息类型</p>
<pre><code class="language-Object-C">typedef NS_ENUM(NSInteger, JRTC_MESSAGE_MODE) {
    JRTC_MESSAGE_MODE_NORMAL = 0,
    JRTC_MESSAGE_MODE_NEWSHALL = 1
};
</code></pre>
<p>枚举类型说明：</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<thead>
<tr>
<th>枚举类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>JRTC_MESSAGE_MODE_NORMAL</td>
<td>普通消息类型</td></tr>
<tr>
<td>JRTC_MESSAGE_MODE_NEWSHALL</td>
<td>消息大厅类型</td></tr></tbody></table>
<p>2.fromPeerID</p>
<h3><code>@property(nonatomic,strong)NSString *fromPeerID;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>fromPeerID</td>
<td>NSString</td>
<td>是</td>
<td>消息发送者peerID</td></tr></tbody></table>
<p>3.toPeerID</p>
<h3><code>@property(nonatomic,strong)NSString *toPeerID;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>toPeerID</td>
<td>NSString</td>
<td>是</td>
<td>消息接受者peerID，为空时，为广播此条消息，不为空时为单聊</td></tr></tbody></table>
<p>4.msg</p>
<h3><code>@property(nonatomic,strong)NSString *msg;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>msg</td>
<td>NSString</td>
<td>是</td>
<td>消息内容</td></tr></tbody></table>
<p>5.messageMode</p>
<h3><code>@property(nonatomic,assign)JRTC_MESSAGE_MODE messageMode;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>messageMode</td>
<td>JRTC_MESSAGE_MODE</td>
<td>是</td>
<td>消息类型</td></tr></tbody></table>
<p>6.roomId</p>
<h3><code>@property(nonatomic,strong)NSString *roomId;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>roomId</td>
<td>NSString</td>
<td>是</td>
<td>所在房间</td></tr></tbody></table>
<h2>5. JRTCMixSrcStreamModel类</h2>
<p>描述<span style="letter-spacing: 0.0px;">保存混流源数据信息</span></p>
<p>1.srcStreamId</p>
<h3><code>@property(nonatomic,strong)NSString *srcStreamId;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>srcStreamId</td>
<td>NSString</td>
<td>是</td>
<td>源流id</td></tr></tbody></table>
<p>2.srcStreamName</p>
<h3><code>@property(nonatomic,strong)NSString *srcStreamName;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>srcStreamName</td>
<td>NSString</td>
<td>是</td>
<td>源流名称</td></tr></tbody></table>
<h2>6. JRTCMixDestStreamModel类</h2>
<p>描述<span style="font-size: 14.0px;letter-spacing: 0.0px;">保存混流目标数据信息</span></p>
<p>1.destStreamId</p>
<h3><code>@property(nonatomic,strong)NSString *destStreamId;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>destStreamId</td>
<td>NSString</td>
<td>是</td>
<td>目标流id</td></tr></tbody></table>
<p>2.destStreamName</p>
<h3><code>@property(nonatomic,strong)NSString *destStreamName;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>destStreamName</td>
<td>NSString</td>
<td>非</td>
<td>目标流名称</td></tr></tbody></table>
<p>3.streamLayout</p>
<h3><code>@property(nonatomic,strong)NSString *streamLayout;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>streamLayout</td>
<td>NSString</td>
<td>非</td>
<td>流布局：TILED（平铺），PIC-IN-PIC（画中画）</td></tr></tbody></table>
<p>4.kind</p>
<h3><code>@property(nonatomic,strong)NSNumber *kind;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>kind</td>
<td>NSNumber</td>
<td>是</td>
<td>1:音频 2：视频， 3：音视</td></tr></tbody></table>
<p>5.codec</p>
<h3><code>@property(nonatomic,strong)NSString *codec;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>codec</td>
<td>NSString</td>
<td>非</td>
<td>编码格式 默认h264</td></tr></tbody></table>
<p>6.bitrate</p>
<h3><code>@property(nonatomic,strong)NSNumber *bitrate;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>bitrate</td>
<td>NSNumber</td>
<td>非</td>
<td>码率</td></tr></tbody></table>
<p>7.frame</p>
<h3><code>@property(nonatomic,strong)NSNumber *frame;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>frame</td>
<td>NSNumber</td>
<td>非</td>
<td>帧率</td></tr></tbody></table>
<p>8.resolution</p>
<h3><code>@property(nonatomic,strong)NSNumber *resolution;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>resolution</td>
<td>NSNumber</td>
<td>非</td>
<td>分辨率 720,360</td></tr></tbody></table>
<p>9.ext</p>
<h3><code>@property(nonatomic,strong)NSString *ext;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>ext</td>
<td>NSString</td>
<td>非</td>
<td>扩展参数</td></tr></tbody></table>
<h2>8. JRTCVideoView类</h2>
<p>描述<span style="font-size: 14.0px;letter-spacing: 0.0px;">用于视频画面展示，继承自UIView</span></p>
<p>1.设置视频背景画面颜色</p>
<h3><code class="language-Object-C">setBackGroundColorWithColor:</code></h3>
<p>参数说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>参数名</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>color</td>
<td>UIColor</td>
<td>视频背景颜色</td></tr></tbody></table>
<h1>5 JRTCCloudDef</h1>
<p>描述<span style="letter-spacing: 0.0px;">JRTCCloudDef中声明各种枚举类型，及保存视频分辨率、帧率等信息的JRTCVideoEncParam类</span></p>
<h3>1.发送消息Block回调</h3>
<p>普通房间发送消息完成回调与消息大厅发送消息完成回调，都会走此回调</p>
<p><code>typedef void(^SendMessageBlock)(NSError *error,JRTCMessageModel *messageModel);</code></p>
<p>block说明：</p>
<table class="wrapped"><colgroup><col /><col /><col /></colgroup>
<thead>
<tr>
<th>block参数</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>error</td>
<td>NSError</td>
<td>发送失败信息</td></tr>
<tr>
<td>messageModel</td>
<td>JRTCMessageModel</td>
<td>发送的消息</td></tr></tbody></table>
<h3>2.JRTC_VIDEO_STREAM_MODEL_TYPE</h3>
<p>指定下发视频流类型 自动下发大小画面视频流，下发的视频流类型不一定为指定的视频流类型。</p>
<pre><code class="language-Object-C">typedef NS_ENUM(NSInteger, JRTC_VIDEO_STREAM_MODEL_TYPE) {
    JRTC_VIDEO_STREAM_MODEL_TYPE_AUTO   = 1,     
    JRTC_VIDEO_STREAM_MODEL_TYPE_FIX = 2,     
};
</code></pre>
<p>枚举类型说明：</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<thead>
<tr>
<th>枚举类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>JRTC_VIDEO_STREAM_MODEL_TYPE_AUTO</td>
<td>自动下发大小画面视频流</td></tr>
<tr>
<td>JRTC_VIDEO_STREAM_MODEL_TYPE_FIX</td>
<td>固定下发指定的大小画面视频流</td></tr></tbody></table>
<h3>3.JRTC_VIDEO_STREAM_TYPE</h3>
<p>视频流类型 如果上行网络和性能比较好，则可以同时送出大小两路画面。 不支持单独开启小画面，小画面必须依附于主画面而存在。</p>
<pre><code class="language-Object-C">typedef NS_ENUM(NSInteger, JRTC_VIDEO_STREAM_TYPE) {
    JRTC_VIDEO_STREAM_TYPE_BIG   = 1,     
    JRTC_VIDEO_STREAM_TYPE_SMALL = 0,      
};
</code></pre>
<p>枚举类型说明：</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<thead>
<tr>
<th>枚举类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>JRTC_VIDEO_STREAM_TYPE_BIG</td>
<td>大画面视频流，用来传输摄像头的视频数据</td></tr>
<tr>
<td>JRTC_VIDEO_STREAM_TYPE_SMALL</td>
<td>小画面视频流，跟大画面的内容相同，但是分辨率和码率更低</td></tr></tbody></table>
<h3>4.JRTC_VIDEO_RESOLUTION</h3>
<p>视频分辨率</p>
<pre><code class="language-Object-C">typedef NS_ENUM(NSInteger, JRTC_VIDEO_RESOLUTION) {
    JRTC_VIDEO_RESOLUTION_720P = 0,//默认720P
    JRTC_VIDEO_RESOLUTION_360P = 1,
};
</code></pre>
<p>枚举类型说明：</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<thead>
<tr>
<th>枚举类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>JRTC_VIDEO_RESOLUTION_720P</td>
<td>视频分辨率 720*1280，默认视频分辨率类型</td></tr>
<tr>
<td>JRTC_VIDEO_RESOLUTION_360P</td>
<td>视频分辨率360*640</td></tr></tbody></table>
<h3>5.JRTC_ROOM_TEMPLATE</h3>
<p>房间模板</p>
<pre><code class="language-Object-C">typedef NS_ENUM(NSInteger, JRTC_ROOM_TEMPLATE) {
    JRTC_ROOM_TEMPLATE_SIMPLE_MEETING = 1,
    JRTC_ROOM_TEMPLATE_BIG_MEETING = 2,
    JRTC_ROOM_TEMPLATE_MCU_METTING = 3,
    JRTC_ROOM_TEMPLATE_VIDEO_INTERACTIVE_LIVING = 4,
    JRTC_ROOM_TEMPLATE_AUDIO_INTERACTIVE_LIVING = 5,
};
</code></pre>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<thead>
<tr>
<th>枚举类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>JRTC_ROOM_TEMPLATE_SIMPLE_MEETING</td>
<td>房间枚举类型，小会议，默认类型</td></tr>
<tr>
<td>JRTC_ROOM_TEMPLATE_BIG_MEETING</td>
<td>房间枚举类型，大会议</td></tr>
<tr>
<td>JRTC_ROOM_TEMPLATE_MCU_METTING</td>
<td>房间枚举类型，MCU会议</td></tr>
<tr>
<td>JRTC_ROOM_TEMPLATE_VIDEO_INTERACTIVE_LIVING</td>
<td>房间枚举类型，视频直播互动</td></tr>
<tr>
<td>JRTC_ROOM_TEMPLATE_AUDIO_INTERACTIVE_LIVING</td>
<td>房间枚举类型，音频直播互动</td></tr></tbody></table>
<h3>6.JRTC_NetWorkType</h3>
<p>网络类型</p>
<pre><code class="language-Object-C">typedef NS_ENUM(NSInteger,JRTC_NetWorkType){
    NET_WORK_TYPE_UNKNOWN,
    NET_WORK_TYPE_ETHERNET,
    NET_WORK_TYPE_WIFI,
    NET_WORK_TYPE_CELLULAR,
    NET_WORK_TYPE_VPN,
    NET_WORK_TYPE_LOOPBACK,
    NET_WORK_TYPE_ANY,
};
</code></pre>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<thead>
<tr>
<th>枚举类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>NET_WORK_TYPE_UNKNOWN</td>
<td>未知网络类型</td></tr>
<tr>
<td>NET_WORK_TYPE_ETHERNET</td>
<td>以太网</td></tr>
<tr>
<td>NET_WORK_TYPE_WIFI</td>
<td>Wi-Fi</td></tr>
<tr>
<td>NET_WORK_TYPE_CELLULAR</td>
<td>移动流量</td></tr>
<tr>
<td>NET_WORK_TYPE_VPN</td>
<td>VPN网络</td></tr>
<tr>
<td>NET_WORK_TYPE_WIFI</td>
<td>本地网络</td></tr>
<tr>
<td>NET_WORK_TYPE_WIFI</td>
<td>任意网络</td></tr></tbody></table>
<h3>6.JRTC_ROOM_EXPIREMODE</h3>
<p>房间过期类型</p>
<pre><code class="language-Object-C">typedef NS_ENUM(NSInteger, JRTC_ROOM_EXPIREMODE) {
    JRTC_ROOM_EXPIREMODE_AT_LASTER_LEAVE = 1,
    JRTC_ROOM_EXPIREMODE_AT_ANY_TIME = 2,
    JRTC_ROOM_EXPIREMODE_IN_THE_END = 3,
};
</code></pre>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<thead>
<tr>
<th>枚举类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>JRTC_ROOM_EXPIREMODE_AT_LASTER_LEAVE</td>
<td>最后离开者离开后过期，默认类型</td></tr>
<tr>
<td>JRTC_ROOM_EXPIREMODE_AT_ANY_TIME</td>
<td>设定某个时间过期</td></tr>
<tr>
<td>JRTC_ROOM_EXPIREMODE_IN_THE_END</td>
<td>永久不过期</td></tr></tbody></table>
<h3>7.JRTC_VIDEO_FPS</h3>
<p>视频帧率</p>
<pre><code class="language-Object-C">typedef NS_ENUM(NSInteger,JRTC_VIDEO_FPS) {
    JRTC_VIDEO_FPS_15 = 0,
    JRTC_VIDEO_FPS_20 = 1,
    JRTC_VIDEO_FPS_25 = 2,
    JRTC_VIDEO_FPS_30 = 3,
};
</code></pre>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<thead>
<tr>
<th>枚举类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>JRTC_VIDEO_FPS_15</td>
<td>频帧率枚举类型，15帧每秒，默认类型</td></tr>
<tr>
<td>JRTC_VIDEO_FPS_20</td>
<td>频帧率枚举类型，20帧每秒</td></tr>
<tr>
<td>JRTC_VIDEO_FPS_25</td>
<td>频帧率枚举类型，25帧每秒</td></tr>
<tr>
<td>JRTC_VIDEO_FPS_30</td>
<td>频帧率枚举类型，30帧每秒</td></tr></tbody></table>
<h3>8.JRTC_ERROR</h3>
<p>错误类型</p>
<pre><code class="language-Object-C">typedef NS_ENUM(NSInteger, JRTC_ERROR) {
    JRTC_ERROR_CODE_NULL                            = 1,        

    
    JRTC_ERROR_CODE_ENTER_ROOM_VER_INVALID          = -120, 
    JRTC_ERROR_CODE_ENTER_ROOM_ROOMID_INVALID       = -121,       
    JRTC_ERROR_CODE_ENTER_ROOM_NICKNAME_INVALID     = -123,            
    JRTC_ERROR_CODE_ENTER_ROOM_APPID_INVALID        = -124, 
    JRTC_ERROR_CODE_ENTER_ROOM_TOKEN_INVALID        = -125,  
    JRTC_ERROR_CODE_ENTER_ROOM_USERID_INVALID       = -126,         
    JRTC_ERROR_CODE_ENTER_ROOM_NONCE_INVALID        = -127,           
    JRTC_ERROR_CODE_ENTER_ROOM_TIMESTAMP_INVALID    = -128,            
    JRTC_ERROR_CODE_ENTER_ROOM_ROOMTYPE_INVALID     = -129,           
    JRTC_ERROR_CODE_ENTER_ROOM_</code><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;letter-spacing: 0.0px;">UNIONID</span><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;letter-spacing: 0.0px;">_INVALID = -130,</span></pre>
<pre><span style="font-family: SFMono-Medium , &quot;SF Mono&quot; , &quot;Segoe UI Mono&quot; , &quot;Roboto Mono&quot; , &quot;Ubuntu Mono&quot; , Menlo , Courier , monospace;letter-spacing: 0.0px;"> JRTC_ERROR_CODE_ENTER_ROOM_HASJOINING_OR_JOINED_ERROR = 135,</span></pre>
<p><br /></p>
<pre>&nbsp; &nbsp; JRTC_ERROR_CODE_ENTER_ROOM_RECORDFILENAME_INVALID  = -140,&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</pre>
<pre>&nbsp; &nbsp; JRTC_ERROR_CODE_ENTER_ROOM_LIVESTREAMNAME_INVALID &nbsp;= -141, &nbsp;&nbsp;</pre>
<pre><br /></pre>
<pre><code class="language-Object-C">    JRTC_ERROR_CODE_INITJMSG_VER_INVALID            = -150, 
    JRTC_ERROR_CODE_INITJMSG_ROOMID_INVALID         = -151,                      
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
    
    JRTC_ERROR_CODE_CHANGE_VIDEO_USERID_INVALI   = -262,        
    JRTC_ERROR_CODE_CHANGE_VIDEO_STREAM_INVALID   = -263,        
    JRTC_ERROR_CODE_CHANGE_VIDEO_MODE_INVALID   = -264,        
    JRTC_ERROR_CODE_CHANGE_VIDEO_TYPE_INVALID   = -265,        
    JRTC_ERROR_CODE_CHANGE_VIDEO_SUBSTATUS_INVALID   = -266,</code></pre>
<pre>&nbsp; &nbsp; JRTC_ERROR_CODE_CHANGE_VIDEO_NO_VIDEO_TYPE &nbsp; = -267, &nbsp; &nbsp;</pre>
<pre><code class="language-Object-C">    

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
</code></pre>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<thead>
<tr>
<th>枚举类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>JRTC_ERROR_CODE_NULL</td>
<td>无错误</td></tr>
<tr>
<td>JRTC_ERROR_CODE_ENTER_ROOM_VER_INVALID</td>
<td>进入房间ver不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_ENTER_ROOM_ROOMID_INVALID</td>
<td>进入房间roomId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_ENTER_ROOM_NICKNAME_INVALID</td>
<td>进入房间nickName不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_ENTER_ROOM_APPID_INVALID</td>
<td>进入房间appId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_ENTER_ROOM_TOKEN_INVALID</td>
<td>进入房间token不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_ENTER_ROOM_USERID_INVALID</td>
<td>进入房间userId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_ENTER_ROOM_NONCE_INVALID</td>
<td>进入房间nonce不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_ENTER_ROOM_TIMESTAMP_INVALID</td>
<td>进入房间timestamp不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_ENTER_ROOM_ROOMTYPE_INVALID</td>
<td>进入房间roomType不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_ENTER_ROOM_UNIONID_INVALID</td>
<td>
<p>进入房间设备唯一号不正确</p></td></tr>
<tr>
<td colspan="1">
<p>JRTC_ERROR_CODE_ENTER_ROOM_HASJOINING_OR_JOINED_ERROR</p></td>
<td colspan="1">
<p>已正在加进房间或已加入房间，再次加入房间错误</p></td></tr>
<tr>
<td colspan="1">
<p>JRTC_ERROR_CODE_ENTER_ROOM_RECORDFILENAME_INVALID</p></td>
<td colspan="1">
<p>录制文件名无效</p></td></tr>
<tr>
<td colspan="1">
<p>JRTC_ERROR_CODE_ENTER_ROOM_LIVESTREAMNAME_INVALID</p></td>
<td colspan="1">
<p>转推直播流名无效</p></td></tr>
<tr>
<td>JRTC_ERROR_CODE_INITJMSG_VER_INVALID</td>
<td>初始化消息大厅ver不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_INITJMSG_ROOMID_INVALID</td>
<td>初始化消息大厅roomId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_INITJMSG_NICKNAME_INVALID</td>
<td>初始化消息大厅nickName不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_INITJMSG_APPID_INVALID</td>
<td>初始化消息大厅appId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_INITJMSG_TOKEN_INVALID</td>
<td>初始化消息大厅token不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_INITJMSG_USERID_INVALID</td>
<td>初始化消息大厅userId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_INITJMSG_NONCE_INVALID</td>
<td>初始化消息大厅nonce不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_INITJMSG_TIMESTAMP_INVALID</td>
<td>初始化消息大厅timestamp不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_INITJMSG_ROOMTYPE_INVALID</td>
<td>初始化消息大厅roomType不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_MUTEPEERAUDIO_PEERID_INVALID</td>
<td>静音peerId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_FORBIDPEERVIDEO_PEERID_INVALID</td>
<td>禁止peer开视频peerId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CREATNEWHOSTER_PEERID_INVALID</td>
<td>产生新的主持人hosterPeerId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STARTLOCALPREVIEW_VIEW_INVALID</td>
<td>打开本地视频预览videoView不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STARTREMOTEVIDEO_VIDEOVIEW_INVALID</td>
<td>订阅远端视频videoView不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STARTREMOTEVIDEO_PEERID_INVALID</td>
<td>订阅远端视频peerId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STARTREMOTEVIDEO_STREAMID_INVALID</td>
<td>订阅远端视频streamId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STARTREMOTEVIDEO_MODEL_INVALID</td>
<td>订阅远端视频MODEL不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STARTREMOTEVIDEO_TYPE_INVALID</td>
<td>订阅远端视频TYPE不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STOPREMOTEVIDEO_PEERID_INVALID</td>
<td>取消订阅远端视频peerId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STOPREMOTEVIDEO_STREAMID_INVALID</td>
<td>取消订阅远端视频streamId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STARTREMOTEAUDIO_PEERID_INVALID</td>
<td>订阅远端音频peerId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STARTREMOTEAUDIO_STREAMID_INVALID</td>
<td>订阅远端音频streamId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STOPREMOTEAUDIO_PEERID_INVALID</td>
<td>取消订阅远端音频peerId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STOPREMOTEAUDIO_STREAMID_INVALID</td>
<td>取消订阅远端音频streamId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_MUTEREMOTEVIDEO_STREAMID_INVALID</td>
<td>暂停、继续订阅远端视频streamId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_MUTEREMOTEAUDIO_STREAMID_INVALID</td>
<td>暂停、继续订阅远端音频streamId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CHANGE_VIDEO_STREAM_INVALID</td>
<td>切换远端视频订阅streamId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CHANGE_VIDEO_MODE_INVALID</td>
<td>切换远端视频订阅mode不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CHANGE_VIDEO_TYPE_INVALID</td>
<td>切换远端视频订阅type不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CHANGE_VIDEO_SUBSTATUS_INVALID</td>
<td>当前视频流未订阅成功，禁止切换远端视频订阅</td></tr>
<tr>
<td colspan="1">
<p>JRTC_ERROR_CODE_CHANGE_VIDEO_NO_VIDEO_TYPE</p></td>
<td colspan="1">
<p>当前切换的流为非视频流</p></td></tr>
<tr>
<td>JRTC_ERROR_CODE_SETAUDIOROUTE_ROUTE_INVALID</td>
<td>设置音频路由route不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STARTMIX_SRC_INVALID</td>
<td>开始混流源流信息列表不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STARTMIX_DES_INVALID</td>
<td>开始混流混流结果不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_UPDATEMIX_SRC_INVALID</td>
<td>更新混流源流信息列表不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_UPDATEMIX_DES_INVALID</td>
<td>更新混流destStreamId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CLOSEMIX_DES_INVALID</td>
<td>关闭混流destStreamId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_SETBEAUTY_LEVEL_INVALID</td>
<td>设置美颜美白level不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_SETFILTER_INDEX_INVALID</td>
<td>设置滤镜级别index不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CHANGENICK_NICKNAME_INVALID</td>
<td>修改昵称nickName不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_ENABLESTREAMSTAT_INTERVALSEC_INVALID</td>
<td>开启、关闭监控intervalSec不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_GETEFFECTIMAGE_EFFECTINDEX_INVALID</td>
<td>获取图片滤镜效果effectIndex不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_GETEFFECTIMAGE_PREIMAGE_INVALID</td>
<td>获取图片滤镜效果preImage不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_NETCONNECT_CLOSED</td>
<td>设备网络连接断开</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CANSUL_NOPUBLISHED_VIDEO</td>
<td>没有可以取消的视频流</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CANSUL_NOPUBLISHED_AUDIO</td>
<td>没有可以取消的音频流</td></tr>
<tr>
<td>JRTC_ERROR_CODE_PUBLISHING_OR_PUBLISHED_VIDEO</td>
<td>本地视频流正在发布或者已发布</td></tr>
<tr>
<td>JRTC_ERROR_CODE_PUBLISHING_OR_PUBLISHED_AUDIO</td>
<td>本地音频流正在发布或者已发布</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CANSUL_SUB_AUDIO</td>
<td>大房间模式，不允许用户订阅音频流</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CANSUL_UNSUB_AUDIO</td>
<td>大房间模式，不允许用户取消订阅音频流</td></tr>
<tr>
<td>JRTC_ERROR_CODE_NO_INROOM</td>
<td>没有加入房间，不允许此操作(如订阅、取消订阅远端音视频、发送聊天消息、禁言其他人等)</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CUSTOMSIGNAL_TO_ROOM</td>
<td>向房间发送自定义信令，参数错误</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CUSTOMSIGNAL_TO_PEER</td>
<td>向某个人发送自定义信令，参数错误</td></tr>
<tr>
<td>JRTC_ERROR_CODE_JOIN_ROOM_STATE_ERROR</td>
<td>进房间房间状态错误</td></tr>
<tr>
<td>JRTC_ERROR_CODE_JOIN_ROOM_PARAM_NULL</td>
<td>进房间参数为空</td></tr>
<tr>
<td>JRTC_ERROR_CODE_JOIN_ROOM_INVALID_APP_ID</td>
<td>进房参数appId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_JOIN_ROOM_INVALID_ROOM_ID</td>
<td>进房参数roomId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_JOIN_ROOM_INVALID_USER_ID</td>
<td>进房参数userId不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_JOIN_ROOM_INVALID_TOKEN</td>
<td>进房参数token不正确</td></tr>
<tr>
<td>JRTC_ERROR_CODE_JOIN_ROOM_REQUEST_TIMEOUT</td>
<td>进入房间请求超时</td></tr>
<tr>
<td>JRTC_ERROR_CODE_JOIN_ROOM_SERVICE_SUSPENDED</td>
<td>服务不可用 ,请检查是否欠费</td></tr>
<tr>
<td>JRTC_ERROR_CODE_JOIN_ROOM_NOT_EXIST</td>
<td>房间不存在</td></tr>
<tr>
<td>JRTC_ERROR_CODE_JOIN_ROOM_FULL</td>
<td>房间已满</td></tr>
<tr>
<td>JRTC_ERROR_CODE_JOIN_ROOM_CONNECT_ERROR</td>
<td>加入房间连接失败</td></tr>
<tr>
<td>JRTC_ERROR_CODE_JOIN_ROOM_NETWORK_ERROR</td>
<td>加入房间网络错误</td></tr>
<tr>
<td>JRTC_ERROR_CODE_LEAVE_ROOM_REQUEST_TIMEOUT</td>
<td>离开房间请求超时</td></tr>
<tr>
<td>JRTC_ERROR_CODE_LEAVE_ROOM_INVALID_ROOM_ID</td>
<td>离开房间请求参数roomId错误</td></tr>
<tr>
<td>JRTC_ERROR_CODE_LEAVE_ROOM_INVALID_PEER_ID</td>
<td>离开房间请求参数peerId错误</td></tr>
<tr>
<td>JRTC_ERROR_CODE_SUBSCRIBE_STREAM</td>
<td>订阅流失败</td></tr>
<tr>
<td>JRTC_ERROR_CODE_PUBLISH_STREAM</td>
<td>发布流失败（没进入房间直接发布流）</td></tr>
<tr>
<td>JRTC_ERROR_CODE_STREAM_ALREADY_PUBLISH</td>
<td>流重复发布</td></tr>
<tr>
<td>JRTC_ERROR_CODE_PUBLISH_AUDIO_STREAM</td>
<td>发布音频失败</td></tr>
<tr>
<td>JRTC_ERROR_CODE_PUBLISH_VIDEO_STREAM</td>
<td>发布视频失败</td></tr>
<tr>
<td>JRTC_ERROR_CODE_PUBLISH_AUDIO_STREAM_TIMEOUT</td>
<td>发布音频流超时</td></tr>
<tr>
<td>JRTC_ERROR_CODE_PUBLISH_VIDEO_STREAM_TIMEOUT</td>
<td>发布视频流超时</td></tr>
<tr>
<td>JRTC_ERROR_CODE_SUBSCRIBE_AUDIO_STREAM_TIMEOUT</td>
<td>订阅音频流超时</td></tr>
<tr>
<td>JRTC_ERROR_CODE_SUBSCRIBE_VEDIO_STREAM_TIMEOUT</td>
<td>订阅视频流超时</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CAMERA_START_FAIL</td>
<td>打开摄像头失败，例如在 Windows 或 Mac 设备，摄像头的配置程序（驱动程序）异常，禁用后重新启用设备，或者重启机器，或者更新配置程序</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CAMERA_NOT_AUTHORIZED</td>
<td>摄像头设备未授权，通常在移动设备出现，可能是权限被用户拒绝了</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CAMERA_SET_PARAM_FAIL</td>
<td>摄像头参数设置出错（参数不支持或其它）</td></tr>
<tr>
<td>JRTC_ERROR_CODE_CAMERA_OCCUPY</td>
<td>摄像头正在被占用中，可尝试打开其他摄像头</td></tr>
<tr>
<td>JRTC_ERROR_CODE_MIC_START_FAIL</td>
<td>打开麦克风失败，例如在 Windows 或 Mac 设备，麦克风的配置程序（驱动程序）异常，禁用后重新启用设备，或者重启机器，或者更新配置程序</td></tr>
<tr>
<td>JRTC_ERROR_CODE_MIC_NOT_AUTHORIZED</td>
<td>麦克风设备未授权，通常在移动设备出现，可能是权限被用户拒绝了</td></tr>
<tr>
<td>JRTC_ERROR_CODE_MIC_SET_PARAM_FAIL</td>
<td>麦克风设置参数失败</td></tr>
<tr>
<td>JRTC_ERROR_CODE_MIC_OCCUPY</td>
<td>麦克风正在被占用中，例如移动设备正在通话时，打开麦克风会失败</td></tr>
<tr>
<td>JRTC_ERROR_CODE_MIC_STOP_FAIL</td>
<td>停止麦克风失败</td></tr>
<tr>
<td>JRTC_ERROR_CODE_SPEAKER_START_FAIL</td>
<td>打开扬声器失败，例如在 Windows 或 Mac 设备，扬声器的配置程序（驱动程序）异常，禁用后重新启用设备，或者重启机器，或者更新配置程序</td></tr>
<tr>
<td>JRTC_ERROR_CODE_SPEAKER_SET_PARAM_FAIL</td>
<td>扬声器设置参数失败</td></tr>
<tr>
<td>JRTC_ERROR_CODE_SPEAKER_STOP_FAIL</td>
<td>停止扬声器失败</td></tr>
<tr>
<td>JRTC_ERROR_CODE_NETWORK</td>
<td>设备已连接网络，但网络连接异常</td></tr>
<tr>
<td>JRTC_ERROR_CODE_NETWORK_REQUEST_TIMEOUT</td>
<td>网络请求超时</td></tr>
<tr>
<td>JRTC_ERROR_CODE_SERVER_PARAMETER_INVALID</td>
<td>服务端返回参数错误</td></tr>
<tr>
<td>JRTC_ERROR_CODE_UNAUTHORIZED_OPERATION</td>
<td>无权操作</td></tr>
<tr>
<td>JRTC_ERROR_CODE_PARAMETER_INVALID</td>
<td>参数错误</td></tr>
<tr>
<td>JRTC_ERROR_CODE_OBJECT_NOT_FOUND</td>
<td>找不到对象</td></tr>
<tr>
<td>JRTC_ERROR_CODE_REQUEST_INVALID</td>
<td>请求错误</td></tr>
<tr>
<td>JRTC_ERROR_CODE_INTERNAL_ERROR</td>
<td>内部错误</td></tr>
<tr>
<td>JRTC_ERROR_CODE_REPEATE_SUBMISSION</td>
<td>重复提交</td></tr>
<tr>
<td>JRTC_ERROR_CODE_USER_NOT_FOUND</td>
<td>未找到目标用户</td></tr>
<tr>
<td>JRTC_ERROR_CODE_VIDEO_ENCODE_FAIL</td>
<td>视频帧编码失败，例如 iOS 设备切换到其他应用时，硬编码器可能被系统释放，再切换回来时，硬编码器重启前，可能会抛出</td></tr>
<tr>
<td>JRTC_ERROR_CODE_UNSUPPORTED_RESOLUTION</td>
<td>不支持的视频分辨率</td></tr>
<tr>
<td>JRTC_ERROR_CODE_AUDIO_ENCODE_FAIL</td>
<td>音频帧编码失败，例如传入自定义音频数据，SDK 无法处理</td></tr>
<tr>
<td>JRTC_ERROR_CODE_UNSUPPORTED_SAMPLERATE</td>
<td>不支持的音频采样率</td></tr></tbody></table>
<h2>JRTCVideoEncParam类保存视频分辨率、帧率等信息</h2>
<p><br /></p>
<p>1.视频分辨率</p>
<h3><code>@property(nonatomic,assign)JRTC_VIDEO_RESOLUTION videoResolution;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>videoResolution</td>
<td>JRTC_VIDEO_RESOLUTION</td>
<td>是</td>
<td>视频推流分辨率，默认720P</td></tr></tbody></table>
<p><br /></p>
<p>2.帧率</p>
<h3><code>@property(nonatomic,assign)JRTC_VIDEO_FPS videoFps;</code></h3>
<p>属性说明:</p>
<table class="wrapped"><colgroup><col /><col /><col /><col /></colgroup>
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>videoFps</td>
<td>JRTC_VIDEO_FPS</td>
<td>是</td>
<td>视频推流帧率，默认15帧</td></tr></tbody></table>
<p><br /></p>
<p>3.是否开启多路推流</p>
<h3><code>@property(nonatomic,assign)BOOL enableMultiStream;</code></h3>
<p>属性说明:</p>
<table class="wrapped">
<thead>
<tr>
<th>属性名</th>
<th>属性类型</th>
<th>是否必须设置</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>enableMultiStream</td>
<td>BOOL</td>
<td>是</td>
<td>是否开启多路推流，默认为NO，不开启多路推流</td></tr></tbody></table>
