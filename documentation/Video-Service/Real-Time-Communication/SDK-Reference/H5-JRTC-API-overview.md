<h2>1.JRTCClient&nbsp;</h2>
<h3><span style="color: rgb(0,0,0);"><strong>c</strong><strong>heckSystemRequirements</strong>()</span></h3>
<p>const&nbsp;checkResult&nbsp;= JRTCClient.<span style="color: rgb(0,51,102);">checkSystemRequirements()</span></p>
<p><span style="color: rgb(0,0,0);">参数：<span style="color: rgb(0,0,0);">无</span></span></p>
<p><span style="color: rgb(0,0,0);">说明：</span><span style="color: rgb(0,0,0);">检查 JRTC H5 SDK 对正在使用的浏览器的适配情况。</span><span style="color: rgb(0,0,0);">此方法建议在初始化SDK前调用。</span></p>
<p>返回：checkResult&nbsp;</p>
<table class="relative-table wrapped" style="width: 36.0943%;"><colgroup><col style="width: 14.003%;" /><col style="width: 64.9924%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><span style="color: rgb(0,0,0);">说明</span></th></tr>
<tr>
<td colspan="1"><span style="color: rgb(0,0,0);">isSupport</span></td>
<td colspan="1">是否支持当前浏览器, true: 支持 ， false： 不支持</td></tr>
<tr>
<td colspan="1">message</td>
<td colspan="1">支持结果描述</td></tr>
<tr>
<td colspan="1">result</td>
<td colspan="1">其它信息</td></tr></tbody></table>
<h3><span style="color: rgb(0,0,0);">init(<span style="color: rgb(253,151,31);">JRTCInitParams</span>)</span></h3>
<p><span style="color: rgb(0,0,0);"><span>const JWebrtc = JRTCClient.init(</span><span style="color: rgb(253,151,31);">JRTCInitParams:</span>{&nbsp;appId<span style="color: rgb(249,38,114);">:</span>&nbsp;<span style="color: rgb(102,217,239);">string</span>&nbsp;}<span>)</span><br /></span></p>
<p><span style="color: rgb(0,0,0);">参数：initParam</span></p>
<p><span style="color: rgb(0,0,0);">返回:&nbsp;&nbsp;JRTCClient实例</span></p>
<p><span style="color: rgb(0,0,0);"><span style="color: rgb(253,151,31);">JRTCInitParams:&nbsp;</span></span></p>
<table class="relative-table wrapped" style="width: 22.979%;"><colgroup><col style="width: 21.7391%;" /><col style="width: 24.8792%;" /><col style="width: 53.3816%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">类型</th>
<th><span style="color: rgb(0,0,0);">说明</span></th></tr>
<tr>
<td colspan="1">appId</td>
<td colspan="1">string</td>
<td colspan="1">appId</td></tr></tbody></table>
<h3><span style="color: rgb(0,0,0);">setVideoRecvonly<span style="color: rgb(23,43,77);">()</span><s style="color: rgb(23,43,77);letter-spacing: -0.006em;"><span style="color: rgb(0,0,0);"><br /></span></s></span></h3>
<p><span style="color: rgb(0,0,0);">JWebrtc.</span><span style="color: rgb(0,0,0);">setVideoRecvonly</span><span style="color: rgb(0,0,0);">(</span><span style="color: rgb(0,0,0);">videoRecvonly</span><span style="color: rgb(0,0,0);">: boolean)</span></p>
<p><span style="color: rgb(0,0,0);">参数：&nbsp;<span>videoRecvonly</span></span><span style="color: rgb(0,0,0);">：true是，false否, 默认false</span></p>
<p><span style="color: rgb(0,0,0);">说明：此方法需要在加入房间前调用</span></p>
<p><span style="color: rgb(0,0,0);">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; **有些手机上由于浏览器的版本问题，导致推视频流不支持，但是又想去拉视频流。&nbsp; 通过这个方法设置成只接受模式，就可以兼容上述问题。**<br /></span></p>
<h3><span style="color: rgb(0,0,0);">setVideoEncodingParam</span>()</h3>
<p><span style="color: rgb(0,0,0);">JWebrtc.setVideoEncodingParam(resolution: string)</span></p>
<p><span style="color: rgb(0,0,0);">说明：设置分辨率</span></p>
<p><span style="color: rgb(0,0,0);">参数：&nbsp;resolution</span></p>
<table class="relative-table wrapped" style="width: 31.2846%;"><colgroup><col style="width: 14.8936%;" /><col style="width: 70.0355%;" /><col style="width: 15.0709%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th><span style="color: rgb(0,0,0);">resolution<br /></span></th>
<th colspan="1">必填</th></tr>
<tr>
<td>resolution</td>
<td>
<p>nhd(640*360)、hd(1280*720)、fhd(1920*1080)</p></td>
<td colspan="1">Y</td></tr></tbody></table>
<h3><span style="color: rgb(0,0,0);"><br />setAudioCodecOptions</span>()</h3>
<p><span style="color: rgb(0,0,0);">JWebrtc.setSudioCodecOptions(isStereo: Boolean)</span></p>
<p><span style="color: rgb(0,0,0);">参数：&nbsp;isStereo&nbsp;是否开启立体声：true开启，false关闭</span></p>
<p>返回：无</p>
<h3><span style="color: rgb(0,0,0);">getVideoTrack</span>()</h3>
<p><span style="color: rgb(0,0,0);">JWebrtc.getVideoTrack()</span></p>
<p><span style="color: rgb(0,0,0);">参数： 无</span></p>
<p><span style="color: rgb(0,0,0);">说明：获取视频track</span></p>
<p>返回：videoTrack</p>
<h3><span style="color: rgb(0,0,0);">getAudioTrack</span>()</h3>
<p><span style="color: rgb(0,0,0);">JWebrtc.getAudioTrack()</span></p>
<p><span style="color: rgb(0,0,0);">参数： 无</span></p>
<p><span style="color: rgb(0,0,0);">说明：获取音频track<br /></span></p>
<p>返回：audioTrack</p>
<h3><span style="color: rgb(0,0,0);">getScreenTrack</span>()</h3>
<p><span style="color: rgb(0,0,0);">JWebrtc.getScreenTrack()</span></p>
<p><span style="color: rgb(0,0,0);">说明： 获取屏幕共享track</span></p>
<p><span style="color: rgb(0,0,0);">参数： 无</span></p>
<p>返回：screenTrack</p>
<h3>enterRoom()</h3>
<p><span style="color: rgb(0,0,0);">JWebrtc.</span>enterRoom(<span style="color: rgb(0,0,0);">enterRoomInfo:&nbsp;{&nbsp;appId:&nbsp;string,&nbsp;token:&nbsp;string,&nbsp;userId:&nbsp;string&nbsp;|&nbsp;number,&nbsp;nonce:&nbsp;string&nbsp;|&nbsp;number,&nbsp;timestamp:&nbsp;string&nbsp;|&nbsp;number,&nbsp;<span>userRoomId</span>:&nbsp;number,&nbsp;nickName?:&nbsp;string,&nbsp;subscribeType?:&nbsp;string&nbsp;|&nbsp;number,useVp8?: boolean }</span>)</p>
<p>进入房间成功, 会返回一个ROOM对象:&nbsp;JRTCRoom,</p>
<p><span style="color: rgb(0,51,102);">enterRoomInfo:&nbsp;</span></p>
<table class="relative-table wrapped"><colgroup><col style="width: 128.0px;" /><col style="width: 55.0px;" /><col style="width: 655.0px;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">必填</th>
<th colspan="1">说明</th></tr>
<tr>
<td colspan="1">appId</td>
<td colspan="1">Y</td>
<td colspan="1">应用ID，控制台获取</td></tr>
<tr>
<td colspan="1">token</td>
<td colspan="1">Y</td>
<td colspan="1">用户生成token，生成方式参见XXXX</td></tr>
<tr>
<td colspan="1">userId</td>
<td colspan="1">Y</td>
<td colspan="1">用户Id</td></tr>
<tr>
<td colspan="1">nonce</td>
<td colspan="1">Y</td>
<td colspan="1">令牌随机码，用户生成</td></tr>
<tr>
<td colspan="1">timeStamp</td>
<td colspan="1">Y</td>
<td colspan="1">令牌过期时间，用户生成</td></tr>
<tr>
<td>userRoomId</td>
<td colspan="1">Y</td>
<td colspan="1">房间Id</td></tr>
<tr>
<td>nickname</td>
<td colspan="1">N</td>
<td colspan="1">昵称</td></tr>
<tr>
<td colspan="1"><span style="color: rgb(0,51,102);">subscribeType</span></td>
<td colspan="1">N</td>
<td colspan="1">大房间模式下，音频订阅模式： 1 固定订阅 2 普通订阅 。 默认为 1</td></tr>
<tr>
<td colspan="1">useVp8</td>
<td colspan="1">N</td>
<td colspan="1">是否开启vp8环境，默认false</td></tr></tbody></table>
<p>ROOM：</p>
<table class="relative-table wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th></tr>
<tr>
<td colspan="1">
<p>roomId</p></td>
<td colspan="1">房间ID</td></tr>
<tr>
<td colspan="1">
<p>peers</p></td>
<td colspan="1">
<p>当前房间内成员信息</p>
<p><span>peers:[{&quot;userId&quot;:&quot;12&quot;,&quot;peerId&quot;:&quot;129532&quot;,&quot;nickName&quot;:&quot;AAs&quot;},{&quot;userId&quot;:&quot;13&quot;,&quot;peerId&quot;:&quot;129533&quot;,&quot;nickName&quot;:&quot;AAs&quot;}]</span></p></td></tr>
<tr>
<td colspan="1">
<p>streamInfos</p></td>
<td colspan="1">
<p><span>当前房间内已发布流信息</span></p>
<p><span><span>streamInfos:[{&quot;peerId&quot;:&quot;129533&quot;,&quot;streamId&quot;:&quot;12.129533.2.1.480&quot;,&quot;kind&quot;:&quot;video&quot;},{&quot;peerId&quot;:&quot;129533&quot;,&quot;streamId&quot;:&quot;12.129533.1.1.1&quot;,&quot;kind&quot;:&quot;audio&quot;}</span></span></p></td></tr>
<tr>
<td colspan="1">
<p>roomTemplate</p></td>
<td colspan="1">
<p>1小房间， <span> 2代表大房间</span></p></td></tr></tbody></table>
<p><br /></p>
<h3>exitRoom()</h3>
<p><span style="color: rgb(0,0,0);">JWebrtc.exitRoom()</span></p>
<p>说明：退出房间</p>
<p>参数： <span style="color: rgb(0,0,0);">无</span></p>
<p>返回：无</p>
<h3>错误监听</h3>
<p><span style="color: rgb(0,51,102);"><span style="color: rgb(0,0,0);">JWebrtc</span>.on('onError',&nbsp;</span><span style="color: rgb(0,0,0);">(</span><span style="color: rgb(0,0,0);"><span style="color: rgb(0,51,102);">err</span></span><span style="color: rgb(0,0,0);">)&nbsp;</span><span style="color: rgb(0,51,102);">=&gt;&nbsp;{</span><span style="color: rgb(0,51,102);">})</span></p>
<p>说明：错误事件<span style="color: rgb(0,51,102);">，返回 { errorCode: XXX, message: XXXX}</span></p>
<p><span style="color: rgb(0,51,102);">错误信息参考：</span></p>
<p><br /></p>
<table class="relative-table wrapped" style="width: 61.5172%;"><colgroup><col style="width: 19.4595%;" /><col style="width: 14.7748%;" /><col style="width: 35.1351%;" /><col style="width: 30.6306%;" /></colgroup>
<tbody>
<tr>
<th colspan="1">类型</th>
<th>errorCode</th>
<th colspan="1">message</th>
<th colspan="1">说明</th></tr>
<tr>
<td colspan="1">鉴权错误</td>
<td colspan="1">12000</td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">err.msg&nbsp;||&nbsp;'Authentication&nbsp;failure.'</span></p></td>
<td colspan="1">鉴权错误</td></tr>
<tr>
<td colspan="1">网络错误</td>
<td colspan="1">11000</td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">network_error</span></p></td>
<td colspan="1">网络已断开</td></tr>
<tr>
<td rowspan="3">音频错误</td>
<td colspan="1">10001</td>
<td colspan="1">audio&nbsp;device&nbsp;not&nbsp;found</td>
<td colspan="1">未找到音频设备</td></tr>
<tr>
<td colspan="1">10003</td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">audio&nbsp;device&nbsp;not&nbsp;allowed</span></p></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">浏览器禁用音频设备</span></p></td></tr>
<tr>
<td colspan="1">10005</td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">audio&nbsp;device&nbsp;not&nbsp;readable</span></p></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">系统禁用音频设备</span></p></td></tr>
<tr>
<td colspan="1">视频错误</td>
<td><span style="color: rgb(0,0,0);">10002</span></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">video&nbsp;device&nbsp;not&nbsp;found</span></p></td>
<td colspan="1">未找到视频设备</td></tr>
<tr>
<td colspan="1"><br /></td>
<td colspan="1">10004</td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">video&nbsp;device&nbsp;not&nbsp;allowed</span></p></td>
<td colspan="1"><span style="color: rgb(0,51,102);">浏览器禁用视频设备</span></td></tr>
<tr>
<td colspan="1"><br /></td>
<td colspan="1">10006</td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">video&nbsp;device&nbsp;not&nbsp;readable</span></p></td>
<td colspan="1"><span style="color: rgb(0,51,102);">系统禁用视频设备</span></td></tr>
<tr>
<td rowspan="3"><span style="color: rgb(0,51,102);">屏幕共享</span><br /><br /></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">10010</span></p></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">err.message&nbsp;<span style="color: rgb(249,38,114);"> || </span>&quot;unknown&nbsp;screenshare&nbsp;error&quot;</span></p></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">屏幕共享未知错误</span></p></td></tr>
<tr>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">10011</span></p></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">screenshare&nbsp;not&nbsp;allowed</span></p></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">屏幕共享被禁用</span></p></td></tr>
<tr>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">10012</span></p></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">screenshare&nbsp;ended</span></p></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">屏幕共享已取消</span></p></td></tr>
<tr>
<td rowspan="3">其它错误</td>
<td colspan="1"><span style="color: rgb(0,51,102);">10007</span></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">&quot;constraints&nbsp;&quot;&nbsp;+&nbsp;e.constraint&nbsp;+&nbsp;&quot;&nbsp;error&quot;</span></p></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">OverConstrainedError无法满足要求错误</span></p></td></tr>
<tr>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">1e4</span></p></td>
<td colspan="1">
<p><span style="color: rgb(0,51,102);">e.message&nbsp;:&nbsp;&quot;device&nbsp;unknown&nbsp;error&quot;</span></p></td>
<td colspan="1">未知错误</td></tr>
<tr>
<td colspan="1">。。。</td>
<td colspan="1">。。。</td>
<td colspan="1">。。。</td></tr></tbody></table>
<p><span style="color: rgb(0,51,102);"><br /></span></p>
<h2>2.JRTCRoom</h2>
<p><span style="color: rgb(0,0,0);">调用JWebrtc.</span>enterRoom 进入房间成功, 会返回一个ROOM对象:&nbsp;JRTCRoom,可通过JRTCRoom来进行房间内操作</p>
<ol>
<li>可直接通过调用JRTCRoom = await&nbsp;<span style="color: rgb(0,0,0);">JWebrtc.</span>enterRoom(XXXX)加入房间成功后的返回值来获取</li>
<li>也可在加入房间成功后，调用JRTCRoom =&nbsp;<span style="color: rgb(0,0,0);">JWebrtc.getRoomObj() 来获取</span></li></ol>
<h3><span style="color: rgb(0,0,0);">publishVideoStream</span>()</h3>
<p><span style="color: rgb(0,0,0);">const&nbsp;{&nbsp;track,&nbsp;streamId&nbsp;}&nbsp;=&nbsp;await&nbsp;JRTCRoom.publishVideoStream(videoTrack)</span></p>
<p><span style="color: rgb(0,0,0);">说明：发布视频流</span></p>
<p><span style="color: rgb(0,0,0);">参数： videoTrack</span></p>
<p><span style="color: rgb(0,0,0);">返回：track及streamId</span></p>
<h3><span style="color: rgb(0,0,0);">publishAudioStream</span>()</h3>
<p><span style="color: rgb(0,0,0);">const&nbsp;{&nbsp;track,&nbsp;streamId&nbsp;}&nbsp;=&nbsp;await&nbsp;JRTCRoom.publishAudioStream(audioTrack)</span></p>
<p>说明：发布音频</p>
<p>参数： audioTrack</p>
<p>返回：track及streamId</p>
<h3><span style="color: rgb(0,0,0);">unPublishStream</span>()</h3>
<p><span style="color: rgb(0,0,0);">JRTCRoom.unPublishStream(streamId)</span></p>
<p>说明：取消发布</p>
<p>参数： streamId</p>
<p>返回：无</p>
<h3><span style="color: rgb(0,0,0);">subscribeStreams</span>()</h3>
<p><span style="color: rgb(0,0,0);">JRTCRoom.subscribeStreams(streamIds: string[])</span></p>
<p>说明：订阅流，订阅成功如果产生新的消费者需手动监听streamSubscribed</p>
<p>参数： streamIds: string[]</p>
<p>返回：无</p>
<p>监听：<span style="color: rgb(0,51,102);">streamSubscribed，返回</span><span style="color: rgb(0,0,0);">peerInfo,&nbsp;peerInfo信息如下</span></p>
<p><span style="color: rgb(0,51,102);">JRTCRoom.on('StreamSubscribed',&nbsp;({ stream<span style="color: rgb(0,0,0);">Info</span>})&nbsp;=&gt;&nbsp;{</span></p>
<p><span style="color: rgb(0,51,102);">&nbsp; &nbsp;console.log(stream<span style="color: rgb(0,0,0);">Info</span>)</span><br /><span style="color: rgb(0,51,102);">})</span></p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th></tr>
<tr>
<td>userId</td>
<td colspan="1">用户Id</td></tr>
<tr>
<td colspan="1">nickName</td>
<td colspan="1">昵称</td></tr>
<tr>
<td colspan="1">audioTrack</td>
<td colspan="1">audioTrack</td></tr>
<tr>
<td>videoTrack</td>
<td colspan="1">videoTrack</td></tr></tbody></table>
<h3><span style="color: rgb(0,0,0);"><br />unSubscribeStreams</span>()</h3>
<p><span style="color: rgb(0,0,0);">JRTCRoom.unSubscribeStreams(streamIds: string[])</span></p>
<p>说明：取消订阅</p>
<p>参数： streamIds: string[]</p>
<p>返回：无</p>
<h3><span style="color: rgb(0,0,0);">pausePublish</span>()</h3>
<p><span style="color: rgb(0,0,0);">JRTCRoom.pausePublish(streamId)</span></p>
<p>说明：暂停发布</p>
<p>参数：&nbsp;<span style="color: rgb(0,0,0);">streamId</span></p>
<p>返回：无</p>
<h3><span style="color: rgb(0,0,0);">resumePublish</span>()</h3>
<p><span style="color: rgb(0,0,0);">JRTCRoom.resumePublish(streamId)</span></p>
<p>说明：恢复发布</p>
<p>参数：&nbsp;<span style="color: rgb(0,0,0);">streamId</span></p>
<p>返回：无</p>
<h3><span style="color: rgb(0,0,0);">pauseSubscribe</span>()</h3>
<p><span style="color: rgb(0,0,0);">JRTCRoom.pauseSubscribe(streamId)</span></p>
<p>说明：暂停订阅</p>
<p>参数：&nbsp;<span style="color: rgb(0,0,0);">streamId</span></p>
<p>返回：无</p>
<h3><span style="color: rgb(0,0,0);">resumeSubscribe</span>()</h3>
<p><span style="color: rgb(0,0,0);">JRTCRoom.resumeSubscribe(streamId)</span></p>
<p>说明：恢复订阅</p>
<p>参数：&nbsp;<span style="color: rgb(0,0,0);">streamId</span></p>
<p>返回：无</p>
<h3><span style="color: rgb(0,0,0);">sendMessage</span>()</h3>
<p><span style="color: rgb(0,0,0);">JRTCRoom.sendMessaage({msg: string, <span style="color: rgb(0,0,0);">userId</span>?: string})</span></p>
<p>说明：发送消息，可发送给指定人，可发送消息到房间</p>
<p>参数：<span style="color: rgb(0,0,0);">msg: 消息体， userId: 指定<span style="color: rgb(0,0,0);">userId</span></span></p>
<p>返回：无</p>
<h3>changeNickName()</h3>
<p><span style="color: rgb(0,0,0);">JRTCRoom.changeNickName(nickName:&nbsp;string)</span></p>
<p>说明：修改昵称</p>
<p>参数：&nbsp;<span style="color: rgb(0,0,0);">nickName</span></p>
<p>返回：无</p>
<p>监听：NickNameUpdate, 返回&nbsp;&nbsp;{userRoomId:&nbsp;<span style="color: rgb(102,217,239);">string</span>, <span style="color: rgb(0,0,0);">userId</span><span style="color: rgb(249,38,114);">:</span>&nbsp;&nbsp;<span style="color: rgb(102,217,239);">string</span>,&nbsp;nickName<span style="color: rgb(249,38,114);">:</span>&nbsp;<span style="color: rgb(102,217,239);">string</span>}</p>
<h3><span style="color: rgb(0,51,102);">enableStreamStat()</span></h3>
<p><span style="color: rgb(0,0,0);">JRTCRoom.</span><span style="color: rgb(0,51,102);">enableStreamStat</span><span style="color: rgb(0,0,0);">(isStat, intervalSec)</span></p>
<p><span style="color: rgb(0,0,0);">说明： 监控接口</span></p>
<p><span style="color: rgb(0,0,0);">参数：</span></p>
<p><br /></p>
<table class="relative-table wrapped" style="width: 22.3699%;"><colgroup><col /><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th>
<th colspan="1">类型</th></tr>
<tr>
<td>isStat</td>
<td colspan="1">是否开启监控</td>
<td colspan="1">boolean</td></tr>
<tr>
<td colspan="1">interValSec</td>
<td colspan="1">几秒获取一次监控信息</td>
<td colspan="1">number</td></tr></tbody></table>
<p><span style="color: rgb(0,0,0);">返回：{&nbsp;</span><span>JRTCNetStats,&nbsp;</span>JRTCLocalStreamStats,&nbsp;JRTCRemoteStreamStats&nbsp;<span style="color: rgb(0,0,0);">}</span></p>
<table class="relative-table wrapped" style="width: 38.5936%;"><colgroup><col style="width: 20.6897%;" /><col style="width: 26.1494%;" /><col style="width: 53.1609%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th>
<th colspan="1">类型</th></tr>
<tr>
<td>JRTCNetStats</td>
<td colspan="1">
<p>基本信息：</p></td>
<td colspan="1">
<p>{</p>
<p>localIp：XX，</p>
<p>serverIp： XX</p>
<p>}</p></td></tr>
<tr>
<td colspan="1">JRTCLocalStreamStats</td>
<td colspan="1">本地流信息</td>
<td colspan="1">
<p>{</p>
<p><span style="color: rgb(0,0,0);">userId</span>: XX,</p>
<p>streamId: XX,</p>
<p>kind: XX,</p>
<p>rtt: XX,</p>
<p>netLoss: XX,</p>
<p>frameWidth: XX,</p>
<p>frameHeight: XX,</p>
<p>fps: XX</p>
<p>}</p></td></tr>
<tr>
<td colspan="1">JRTCRemoteStreamStats&nbsp;</td>
<td colspan="1">远端流信息</td>
<td colspan="1">
<p>{</p>
<p><span style="color: rgb(0,0,0);">userId</span>: XX,</p>
<p>streamId: XX,</p>
<p>kind: XX,</p>
<p>jitterBufferDelay: XX,</p>
<p>netLoss: XX,</p>
<p>frameWidth: XX,</p>
<p>frameHeight: XX,</p>
<p>fps: XX</p>
<p>}</p></td></tr></tbody></table>
<h3><span style="color: rgb(0,51,102);"><br />getFixedAudioConsumers</span>()</h3>
<p><span style="color: rgb(0,0,0);">JRTCRoom.</span><span style="color: rgb(0,51,102);">getFixedAudioConsumers</span><span style="color: rgb(0,0,0);">()</span></p>
<p>说明：如果房间为大房间，可获取大房间固定音频， 可自行订阅</p>
<p>参数：&nbsp;<span style="color: rgb(0,0,0);">无</span></p>
<p>返回：fixedAudioConsumerList</p>
<p>fixedAudioConsumerList：</p>
<table class="relative-table wrapped" style="width: 19.6567%;"><colgroup><col style="width: 43.2203%;" /><col style="width: 56.7797%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th></tr>
<tr>
<td>streamId</td>
<td colspan="1">流ID</td></tr>
<tr>
<td colspan="1">kind</td>
<td colspan="1">媒体类型</td></tr>
<tr>
<td>track</td>
<td colspan="1">音频track</td></tr></tbody></table>
<h3><span style="color: rgb(0,51,102);">会控相关接口</span></h3>
<h4><span style="color: rgb(0,51,102);">removePeer</span></h4>
<p>JRTCRoom.<span style="color: rgb(0,51,102);">removePeer<span>(<span style="color: rgb(0,0,0);">userId</span>, appData)</span></span></p>
<p>说明：移除指定用户</p>
<p>参数说明：</p>
<table class="relative-table wrapped" style="width: 29.9003%;"><colgroup><col style="width: 22.449%;" /><col style="width: 26.1596%;" /><col style="width: 18.3673%;" /><col style="width: 33.0241%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">类型</th>
<th colspan="1">是否必须</th>
<th colspan="1">说明</th></tr>
<tr>
<td><span style="color: rgb(0,0,0);">userId</span></td>
<td colspan="1">string</td>
<td colspan="1">Y</td>
<td colspan="1">移除目标用户ID</td></tr>
<tr>
<td colspan="1">
<pre>appData</pre></td>
<td colspan="1">Object</td>
<td colspan="1">N 默认为 {}</td>
<td colspan="1">自定义参数</td></tr></tbody></table>
<h4><span style="color: rgb(0,51,102);">muteAudio</span></h4>
<p>JRTCRoom.<span style="color: rgb(0,51,102);">muteAudio({<span style="color: rgb(0,0,0);">userId</span><span>, appData}</span>)</span></p>
<p>说明：广播 房间内全局静音/指定用户静音</p>
<p>参数说明：</p>
<table class="relative-table wrapped" style="width: 40.1993%;"><colgroup><col style="width: 16.6897%;" /><col style="width: 19.4483%;" /><col style="width: 13.6552%;" /><col style="width: 50.2069%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">类型</th>
<th colspan="1">是否必须</th>
<th colspan="1">说明</th></tr>
<tr>
<td><span style="color: rgb(0,0,0);">userId</span></td>
<td colspan="1">string</td>
<td colspan="1">N</td>
<td colspan="1">目标用户ID，如果传入<span style="color: rgb(0,0,0);">userId</span>则为指定用户操作，不传则是对房间全局操作</td></tr>
<tr>
<td colspan="1">
<pre>appData</pre></td>
<td colspan="1">Object</td>
<td colspan="1">N 默认为 {}</td>
<td colspan="1">自定义参数</td></tr></tbody></table>
<h4><span style="color: rgb(0,51,102);">closeVideo</span></h4>
<p>JRTCRoom.<span style="color: rgb(0,51,102);">closeVideo()</span></p>
<p>说明：广播 房间内全局关闭视频/关闭指定用户视频</p>
<p>参数说明：同muteAudio</p>
<h4><span style="color: rgb(0,51,102);">forbidChat</span></h4>
<p>JRTCRoom.<span style="color: rgb(0,51,102);">forbidChat(appData)</span></p>
<p>说明：广播房间禁言</p>
<p>参数说明：</p>
<table class="relative-table wrapped" style="width: 40.1993%;"><colgroup><col style="width: 16.6897%;" /><col style="width: 19.4483%;" /><col style="width: 13.6552%;" /><col style="width: 50.2069%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">类型</th>
<th colspan="1">是否必须</th>
<th colspan="1">说明</th></tr>
<tr>
<td colspan="1">
<pre>appData</pre></td>
<td colspan="1">Object</td>
<td colspan="1">N 默认为 {}</td>
<td colspan="1">自定义参数</td></tr></tbody></table>
<h4><span style="color: rgb(0,51,102);">unForbidChat</span></h4>
<p>JRTCRoom.<span style="color: rgb(0,51,102);">unForbidChat()</span></p>
<p>说明：广播房间解除禁言</p>
<p>参数：同forbidChat</p>
<h4><span style="color: rgb(0,51,102);">customSignal</span></h4>
<p>JRTCRoom.<span style="color: rgb(0,51,102);">customSignal()</span></p>
<p>说明：广播用户自定义信令</p>
<p>参数说明：</p>
<table class="relative-table wrapped" style="width: 40.1993%;"><colgroup><col style="width: 16.6897%;" /><col style="width: 19.4483%;" /><col style="width: 13.6552%;" /><col style="width: 50.2069%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">类型</th>
<th colspan="1">是否必须</th>
<th colspan="1">说明</th></tr>
<tr>
<td>eventName</td>
<td colspan="1">string</td>
<td colspan="1">Y</td>
<td colspan="1">自定义信令名称</td></tr>
<tr>
<td colspan="1"><span style="color: rgb(0,0,0);"><span style="color: rgb(0,0,0);">userId</span><br /></span></td>
<td colspan="1">string</td>
<td colspan="1">N</td>
<td colspan="1">目标用户ID</td></tr>
<tr>
<td colspan="1">
<pre>appData</pre></td>
<td colspan="1">Object</td>
<td colspan="1">N 默认为 {}</td>
<td colspan="1">自定义参数</td></tr></tbody></table>
<p><br /><br /></p>
<h3>JRTCRoom房间内消息监听</h3>
<h4>UserJoinedRoom</h4>
<p>JRTCRoom.on('UserJoinRoom',<span style="color: rgb(0,51,102);">&nbsp;(data:&nbsp;{<span style="color: rgb(0,0,0);">userId</span>:&nbsp;&nbsp;string,&nbsp;nickName:&nbsp;string})</span>&nbsp;=&gt;&nbsp;{})</p>
<p>说明：加入房间</p>
<h4>UserLeavedRoom</h4>
<p><span style="color: rgb(0,51,102);">JRTCRoom.on('UserLeaveRoom',</span><span style="color: rgb(0,51,102);">&nbsp;(data:&nbsp;{<span style="color: rgb(0,0,0);">userId</span>:&nbsp;&nbsp;string,&nbsp;nickName:&nbsp;string})&nbsp;</span><span style="color: rgb(0,51,102);">=&gt;&nbsp;{</span><span style="color: rgb(0,51,102);">})</span></p>
<p>说明：离开房间</p>
<h4>NickNameUpdated</h4>
<p><span style="color: rgb(0,51,102);">JRTCRoom.on('NickNameUpdate',&nbsp;</span><span style="color: rgb(0,51,102);">(data:&nbsp;{userRoomId:&nbsp;string, <span style="color: rgb(0,0,0);">userId</span>:&nbsp;&nbsp;string,&nbsp;nickName:&nbsp;string})</span>&nbsp;<span style="color: rgb(0,51,102);">=&gt;&nbsp;{</span><span style="color: rgb(0,51,102);">})</span></p>
<p>说明：用户修改昵称</p>
<h4>MessageRecived</h4>
<p><span style="color: rgb(0,51,102);">JRTCRoom.on('MessageRecived',&nbsp;</span>(<span style="color: rgb(0,51,102);">data</span><span style="color: rgb(249,38,114);">:</span>&nbsp;{<span style="color: rgb(0,0,0);">userId</span>: string, nickName: string, msg<span style="color: rgb(249,38,114);">:</span>&nbsp;&nbsp;<span style="color: rgb(0,51,102);">string</span>})&nbsp;<span style="color: rgb(0,51,102);">=&gt;&nbsp;{</span><span style="color: rgb(0,51,102);">})</span></p>
<p>说明：有成员发送消息时</p>
<table class="relative-table wrapped" style="width: 21.7608%;"><colgroup><col style="width: 26.5306%;" /><col style="width: 73.4694%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th></tr>
<tr>
<td><span style="color: rgb(0,0,0);">userId</span></td>
<td colspan="1">发送者id</td></tr>
<tr>
<td colspan="1">nickName</td>
<td colspan="1">发送者昵称</td></tr>
<tr>
<td>msg</td>
<td colspan="1">消息体</td></tr></tbody></table>
<h4>StreamPublished<span style="color: rgb(0,51,102);"><br /></span></h4>
<p><span style="color: rgb(0,51,102);">JRTCRoom.on('StreamPublished',&nbsp;(streamsInfo:&nbsp;streamInfo[])&nbsp;=&gt;&nbsp;{</span></p>
<p><span style="color: rgb(0,51,102);">&nbsp; &nbsp; &nbsp; let&nbsp;streamIds&nbsp;=&nbsp;streamInfos.map(streamInfo&nbsp;=&gt;&nbsp;streamInfo.streamId);</span></p>
<p><span style="color: rgb(0,51,102);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;console.log('StreamPublished',&nbsp;streamIds)</span><br /><span style="color: rgb(0,51,102);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JRTCRoom.subscribeStreams(streamIds) // 可选择订阅</span><br /><span style="color: rgb(0,51,102);">&nbsp;&nbsp;&nbsp;&nbsp;})</span></p>
<p>说明：有新流发布</p>
<p><span style="color: rgb(0,51,102);">streamsInfo:,已发布流数组&nbsp;streamInfo[]:&nbsp;streamInfo信息如下:<br /></span></p>
<table class="relative-table wrapped" style="width: 30.5094%;"><colgroup><col style="width: 16.0%;" /><col style="width: 84.0%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th></tr>
<tr>
<td><span style="color: rgb(0,0,0);">userId</span></td>
<td colspan="1">用户Id</td></tr>
<tr>
<td colspan="1">streamId</td>
<td colspan="1">流ID</td></tr>
<tr>
<td>kind</td>
<td colspan="1">流类型</td></tr>
<tr>
<td colspan="1">streamName</td>
<td colspan="1">流名称</td></tr></tbody></table>
<h4>StreamUnpublished</h4>
<p><span style="color: rgb(0,51,102);">JRTCRoom.on('StreamUnpublished',&nbsp;(streamInfo: StreamInfo)&nbsp;=&gt;&nbsp;{</span><br /><span style="color: rgb(0,51,102);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;console.log('StreamUnpulished',&nbsp;streamInfo)&nbsp;// 返回取消发布的流信息</span><br /><span style="color: rgb(0,51,102);">&nbsp;&nbsp;&nbsp;&nbsp;})</span></p>
<p><span style="color: rgb(0,51,102);">说明：当有成员取消音频或视频发布时</span></p>
<p><span style="color: rgb(0,51,102);">StreamInfo:&nbsp;<br /></span></p>
<table class="relative-table wrapped" style="width: 30.5094%;"><colgroup><col style="width: 16.0%;" /><col style="width: 84.0%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th></tr>
<tr>
<td><span style="color: rgb(0,0,0);">userId</span></td>
<td colspan="1">用户Id</td></tr>
<tr>
<td colspan="1">streamId</td>
<td colspan="1">流ID</td></tr>
<tr>
<td>kind</td>
<td colspan="1">流类型</td></tr></tbody></table>
<h4><br />StreamPaused</h4>
<p><span style="color: rgb(0,51,102);">JRTCRoom.on('StreamPaused',&nbsp;(streamInfo: StreamInfo)&nbsp;=&gt;&nbsp;{</span><br /><span style="color: rgb(0,51,102);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;console.log('StreamPaused',&nbsp;streamInfo)&nbsp;//&nbsp;// 返回目标消费信息</span><br /><span style="color: rgb(0,51,102);">&nbsp;&nbsp;&nbsp;&nbsp;})</span></p>
<p><span style="color: rgb(0,51,102);">说明：当有成员暂停音频或视频发布时，返回StreamInfo信息如下</span></p>
<p><br /></p>
<table class="relative-table wrapped" style="width: 21.5393%;"><colgroup><col style="width: 35.8247%;" /><col style="width: 64.1753%;" /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th></tr>
<tr>
<td colspan="1">userRoomId</td>
<td colspan="1">房间ID</td></tr>
<tr>
<td><span style="color: rgb(0,0,0);">userId</span></td>
<td colspan="1">暂停流发布 用户Id</td></tr>
<tr>
<td colspan="1">streamId</td>
<td colspan="1">流ID</td></tr>
<tr>
<td>kind</td>
<td colspan="1">流类型</td></tr></tbody></table>
<h4><br />StreamResumed</h4>
<p><span style="color: rgb(0,51,102);">JRTCRoom.on('StreamResumed',&nbsp;(streamInfo: StreamInfo)&nbsp;=&gt;&nbsp;{</span><br /><span style="color: rgb(0,51,102);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;console.log('StreamResumed',&nbsp;streamInfo)&nbsp;// 返回目标消费信息</span><br /><span style="color: rgb(0,51,102);">&nbsp;&nbsp;&nbsp;&nbsp;})</span></p>
<p><span style="color: rgb(0,51,102);">说明：当有成员恢复音频或视频发布时，返回StreamInfo信息如下</span></p>
<p><br /></p>
<table class="relative-table wrapped" style="width: 21.5393%;"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th></tr>
<tr>
<td colspan="1"><span>userRoomId</span></td>
<td colspan="1">房间ID</td></tr>
<tr>
<td><span style="color: rgb(0,0,0);">userId</span></td>
<td colspan="1">暂停流发布 用户Id</td></tr>
<tr>
<td colspan="1">streamId</td>
<td colspan="1">流ID</td></tr>
<tr>
<td>kind</td>
<td colspan="1">流类型</td></tr></tbody></table>
<h4><span style="color: rgb(0,51,102);"><br />会控相关监听</span></h4>
<p><span style="color: rgb(0,51,102);font-weight: 600;letter-spacing: 0.0px;"><br />UserRemoved</span></p>
<p>JRTCRoom.on('<span style="color: rgb(0,51,102);">UserRemoved</span>',<span style="color: rgb(0,51,102);">&nbsp;(data:&nbsp;{<span style="color: rgb(0,0,0);">userId</span>:&nbsp;&nbsp;string,&nbsp;nickName:&nbsp;string})</span>&nbsp;=&gt;&nbsp;{})</p>
<p>说明：某个用户被移出房间</p>
<p>返回参数 data:&nbsp;</p>
<table class="relative-table wrapped" style="width: 30.5094%;"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th></tr>
<tr>
<td colspan="1">
<p>userRoomId</p></td>
<td colspan="1">userRoomId</td></tr>
<tr>
<td><span style="color: rgb(0,0,0);">userId</span></td>
<td colspan="1">发送者 用户Id</td></tr>
<tr>
<td colspan="1">nickName</td>
<td colspan="1">发送者 用户昵称</td></tr>
<tr>
<td>appData</td>
<td colspan="1">用户自定义参数</td></tr></tbody></table>
<h5><span style="color: rgb(0,51,102);">AudioMuted</span></h5>
<p><span style="color: rgb(0,51,102);">JRTCRoom.on('<span style="color: rgb(0,51,102);">AudioMuted</span><span style="color: rgb(23,43,77);font-weight: 400;letter-spacing: 0.0px;">',</span><span style="color: rgb(0,51,102);">&nbsp;(data:&nbsp;{<span style="color: rgb(0,0,0);">userId</span>:&nbsp;&nbsp;string,&nbsp;nickName:&nbsp;string})</span><span style="color: rgb(23,43,77);font-weight: 400;letter-spacing: 0.0px;">&nbsp;=&gt;&nbsp;{</span></span>})</p>
<p>说明：某个用户被静音</p>
<p>返回参数 data:&nbsp;</p>
<table class="relative-table wrapped" style="width: 30.5094%;"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th></tr>
<tr>
<td colspan="1">
<p>userRoomId</p></td>
<td colspan="1">userRoomId</td></tr>
<tr>
<td><span style="color: rgb(0,0,0);">userId</span></td>
<td colspan="1">发送者 用户Id</td></tr>
<tr>
<td colspan="1">nickName</td>
<td colspan="1">发送者 用户昵称</td></tr>
<tr>
<td>appData</td>
<td colspan="1">用户自定义参数</td></tr></tbody></table>
<h5><span style="color: rgb(0,51,102);">RoomAudioMuted</span></h5>
<p>JRTCRoom.on('<span style="color: rgb(0,51,102);">RoomAudioMuted</span>',<span style="color: rgb(0,51,102);">&nbsp;(data:&nbsp;{<span style="color: rgb(0,0,0);">userId</span>:&nbsp;&nbsp;string,&nbsp;nickName:&nbsp;string})</span>&nbsp;=&gt;&nbsp;{})</p>
<p>说明：房间被静音</p>
<p>返回参数 data:&nbsp; 同上</p>
<p><span style="color: rgb(0,51,102);font-weight: 600;letter-spacing: 0.0px;"><br />VideoClosed</span></p>
<p>JRTCRoom.on('<span style="color: rgb(0,51,102);">VideoClosed</span>',<span style="color: rgb(0,51,102);">&nbsp;(data:&nbsp;{<span style="color: rgb(0,0,0);">userId</span>:&nbsp;&nbsp;string,&nbsp;nickName:&nbsp;string})</span>&nbsp;=&gt;&nbsp;{})</p>
<p>说明：某个用户视频被关闭</p>
<p>返回参数 data:&nbsp; 同上</p>
<p><span style="color: rgb(0,51,102);font-weight: 600;letter-spacing: 0.0px;"><br />RoomVideoClosed</span></p>
<p>JRTCRoom.on('<span style="color: rgb(0,51,102);">RoomVideoClosed</span>',<span style="color: rgb(0,51,102);">&nbsp;(data:&nbsp;{<span style="color: rgb(0,0,0);">userId</span>:&nbsp;&nbsp;string,&nbsp;nickName:&nbsp;string})</span>&nbsp;=&gt;&nbsp;{})</p>
<p>说明：房间被关闭所有视频</p>
<p>返回参数 data:&nbsp; 同上</p>
<p><span style="color: rgb(0,51,102);font-weight: 600;letter-spacing: 0.0px;"><br />RoomChatForbidden</span></p>
<p>JRTCRoom.on('<span style="color: rgb(0,51,102);">RoomChatForbidden</span>',<span style="color: rgb(0,51,102);">&nbsp;(data:&nbsp;{<span style="color: rgb(0,0,0);">userId</span>:&nbsp;&nbsp;string,&nbsp;nickName:&nbsp;string})</span>&nbsp;=&gt;&nbsp;{})</p>
<p>说明：房间禁止所有文字聊天</p>
<p>返回参数 data:&nbsp; 同上</p>
<h5><span style="color: rgb(0,51,102);">RoomChatUnForbidden</span></h5>
<p><span style="color: rgb(0,51,102);">JRTCRoom.on('<span style="color: rgb(0,51,102);">RoomChatForbidden</span><span style="color: rgb(0,51,102);">losed</span><span style="color: rgb(23,43,77);font-weight: 400;letter-spacing: 0.0px;">',</span><span style="color: rgb(0,51,102);">&nbsp;(data:&nbsp;{<span style="color: rgb(0,0,0);">userId</span>:&nbsp;&nbsp;string,&nbsp;nickName:&nbsp;string})</span><span style="color: rgb(23,43,77);font-weight: 400;letter-spacing: 0.0px;">&nbsp;=&gt;&nbsp;{})</span></span></p>
<p>说明：房间取消禁言</p>
<p>返回参数 data:&nbsp; 同上</p>
<h5><span style="color: rgb(0,51,102);">SignalCustom</span></h5>
<p>JRTCRoom.on('SignalCustom',<span style="color: rgb(0,51,102);">&nbsp;(data:&nbsp;{<span style="color: rgb(0,0,0);">userId</span>:&nbsp;&nbsp;string,&nbsp;nickName:&nbsp;string, eventName})</span>&nbsp;=&gt;&nbsp;{})</p>
<p>说明：用户自定义信令</p>
<p>返回参数data:</p>
<table class="relative-table wrapped" style="width: 30.5094%;"><colgroup><col /><col /></colgroup>
<tbody>
<tr>
<th>参数</th>
<th colspan="1">说明</th></tr>
<tr>
<td colspan="1">
<p>userRoomId</p></td>
<td colspan="1">userRoomId</td></tr>
<tr>
<td><span style="color: rgb(0,0,0);">userId</span></td>
<td colspan="1">发送者 用户Id</td></tr>
<tr>
<td colspan="1">nickName</td>
<td colspan="1">发送者 用户昵称</td></tr>
<tr>
<td>appData</td>
<td colspan="1">用户自定义参数，</td></tr>
<tr>
<td colspan="1">eventName</td>
<td colspan="1">自定义信令名称</td></tr></tbody></table>
