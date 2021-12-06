
<p>import JRTCMiniappClient from '../lib/jrtc-miniapp.min'</p>
<h2>1.Methods&nbsp;</h2>
<h3>init(JRTCMiniappInitParams)</h3>
<p>const jrtcMiniapp = JRTCMiniappClient.init(JRTCMiniappInitParams:{ appId, pushDomain, pullDomain }); 参数：JRTCMiniappInitParams <br /> 返回:&nbsp;JRTCMiniapp实例 <br /> JRTCMiniappInitParams:&nbsp;</p>
<table>
<thead>
<tr>
<th>参数</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>appId</td>
<td>string</td>
<td>appId</td></tr>
<tr>
<td>pushDomain</td>
<td>string</td>
<td>推流域名</td></tr>
<tr>
<td>pullDomain</td>
<td>string</td>
<td>拉流域名</td></tr></tbody></table>
<h3>joinRoom(enterRoomInfo)</h3>
<p>JRTCMiniappClient.joinRoom(enterRoomInfo); 说明：进入房间成功, 会返回一个ROOM对象:JRTCMiniAppRoom<br /> 参数：enterRoomInfo，说明如下：</p>
<table>
<thead>
<tr>
<th>参数</th>
<th>类型</th>
<th>是否必填</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>appId</td>
<td>string</td>
<td>Y</td>
<td>应用ID，控制台获取</td></tr>
<tr>
<td>token</td>
<td>string</td>
<td>Y</td>
<td>用户生成token，生成方式参见XXXX取</td></tr>
<tr>
<td>userId</td>
<td>string&nbsp;or&nbsp;number</td>
<td>Y</td>
<td>用户Id</td></tr>
<tr>
<td>role</td>
<td>number</td>
<td>Y</td>
<td>用户角色类型： 1-主播 2-观众</td></tr>
<tr>
<td>nonce</td>
<td>string</td>
<td>Y</td>
<td>令牌随机码，用户生成</td></tr>
<tr>
<td>timeStamp</td>
<td>string</td>
<td>Y</td>
<td>令牌过期时间，用户生成</td></tr>
<tr>
<td>userRoomId</td>
<td>string or number</td>
<td>Y</td>
<td>用户房间Id</td></tr>
<tr>
<td>peerId</td>
<td>string</td>
<td>N</td>
<td>peerId</td></tr>
<tr>
<td>nickname</td>
<td>string</td>
<td>N</td>
<td>用户昵称</td></tr></tbody></table>
<h3>setRole(roleType)</h3>
<p>jrtcMiniapp.setRole(roleType)<br /> 说明：设置用户角色<br /> 参数：&nbsp;roleType<br /> 返回：code、data和reason<br /> roleType参数，说明如下:&nbsp;</p>
<table>
<thead>
<tr>
<th>参数</th>
<th>类型</th>
<th>是否必填</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>roleType</td>
<td>number</td>
<td>Y</td>
<td>用户角色类型：1 - 主播， 2 - 观众</td></tr></tbody></table>
<p>返回值说明:&nbsp;</p>
<table>
<thead>
<tr>
<th>返回值</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>code</td>
<td>number</td>
<td>状态码</td></tr>
<tr>
<td>data</td>
<td>object</td>
<td>publishUrl - 推流地址 <br /> pullUrl - 拉流地址 <br /> role - 用户角色</td></tr>
<tr>
<td>reason</td>
<td>string</td>
<td>捕获到异常时返回</td></tr></tbody></table>
<h3>publish()</h3>
<p>jrtcMiniapp.publish()<br /> 说明：发布本地音频流<br /> 参数：&nbsp;无<br /> 返回：code、url和reason</p>
<p>返回值说明:&nbsp;</p>
<table>
<thead>
<tr>
<th>返回值</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>code</td>
<td>number</td>
<td>状态码</td></tr>
<tr>
<td>url</td>
<td>string</td>
<td>推流地址</td></tr>
<tr>
<td>reason</td>
<td>string</td>
<td>捕获到异常时返回</td></tr></tbody></table>
<h3>subscribe()</h3>
<p>jrtcMiniapp.subscribe()<br /> 说明：订阅远端音频流<br /> 参数：&nbsp;无<br /> 返回：code、url和reason</p>
<p>返回值说明:&nbsp;</p>
<table>
<thead>
<tr>
<th>返回值</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>code</td>
<td>number</td>
<td>状态码</td></tr>
<tr>
<td>url</td>
<td>string</td>
<td>拉流地址</td></tr>
<tr>
<td>reason</td>
<td>string</td>
<td>捕获到异常时返回</td></tr></tbody></table>
<h3>getBroadcasterList()</h3>
<p>jrtcMiniapp.getBroadcasterList()<br /> 说明：获取房间主播列表<br /> 参数：&nbsp;无<br /> 返回：code、data和reason</p>
<p>返回值说明:&nbsp;</p>
<table>
<thead>
<tr>
<th>返回值</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>code</td>
<td>number</td>
<td>状态码</td></tr>
<tr>
<td>data</td>
<td>array</td>
<td>主播列表[item]:<br /> hasAudio: 是否存在音频<br />nickName: 主播昵称<br />userId: 用户Id<br />roomId: JRTC房间Id，由用户的appId和userRoomId生成的房间Id</td></tr>
<tr>
<td>reason</td>
<td>string</td>
<td>捕获到异常时返回</td></tr></tbody></table>
<h3>getAudienceList()</h3>
<p>jrtcMiniapp.getAudienceList()<br /> 说明：获取房间观众列表<br /> 参数：&nbsp;无<br /> 返回：code、data和reason</p>
<p>返回值说明:&nbsp;</p>
<table>
<thead>
<tr>
<th>返回值</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>code</td>
<td>number</td>
<td>状态码</td></tr>
<tr>
<td>data</td>
<td>array</td>
<td>观众列表[item]:<br /> nickName: 主播昵称<br />userId: 用户Id<br />roomId: JRTC房间Id，由用户的appId和userRoomId生成的房间Id</td></tr>
<tr>
<td>reason</td>
<td>string</td>
<td>捕获到异常时返回</td></tr></tbody></table>
<h3>getRoomMemberCount()</h3>
<p>jrtcMiniapp.getRoomMemberCount()<br /> 说明：获取房间成员数<br /> 参数：&nbsp;无<br /> 返回：code、data和reason</p>
<p>返回值说明:&nbsp;</p>
<table>
<thead>
<tr>
<th>返回值</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>code</td>
<td>number</td>
<td>状态码</td></tr>
<tr>
<td>data</td>
<td>object</td>
<td>total: 总人数<br />broadcasterCount: 主播人数<br />audienceCount: 观众人数</td></tr>
<tr>
<td>reason</td>
<td>string</td>
<td>捕获到异常时返回</td></tr></tbody></table>
<h3>customSignalToRoom(appData)</h3>
<p>jrtcMiniapp.customSignalToRoom(appData)<br /> 说明：用户自定义信令，全局会控相关，如全局静音、取消全局静音等<br /> 参数：appData<br /> 返回：code、data和reason</p>
<p>appData参数，说明如下:&nbsp;</p>
<table>
<thead>
<tr>
<th>参数</th>
<th>类型</th>
<th>是否必填</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>appData</td>
<td>object</td>
<td>Y</td>
<td>customEventName[string]：必填，用户自定义事件名称<br /> data[object]：选填，用户自定义传输数据</td></tr></tbody></table>
<p>返回值说明:&nbsp;</p>
<table>
<thead>
<tr>
<th>返回值</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>code</td>
<td>number</td>
<td>状态码</td></tr>
<tr>
<td>data</td>
<td>object</td>
<td>eventName: 自定义信令名称<br />nickName: 用户昵称<br />userId: 用户userId<br />data[object]: 用户自定义传输数据, 无传参时，返回空对象</td></tr>
<tr>
<td>reason</td>
<td>string</td>
<td>捕获到异常时返回</td></tr></tbody></table>
<h3>customSignalToPeer(customSignalToPeer)</h3>
<p>jrtcMiniapp.customSignalToPeer(customSignalToPeer)<br /> 说明：用户自定义信令，指定会控相关，如指定用户静音、取消指定用户静音<br /> 参数：customSignalToPeer<br /> 返回：code、data和reason</p>
<p>customSignalToPeer参数，说明如下:&nbsp;</p>
<table>
<thead>
<tr>
<th>参数</th>
<th>类型</th>
<th>是否必填</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>targetUserId</td>
<td>string or number</td>
<td>Y</td>
<td>指定用户Id</td></tr>
<tr>
<td>customData</td>
<td>object</td>
<td>Y</td>
<td>customEventName[string]：必填，用户自定义事件名称<br /> data[object]：选填，用户自定义传输数据</td></tr></tbody></table>
<p>返回值说明:&nbsp;</p>
<table>
<thead>
<tr>
<th>返回值</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>code</td>
<td>number</td>
<td>状态码</td></tr>
<tr>
<td>data</td>
<td>object</td>
<td>eventName: 自定义信令名称<br />nickName: 用户昵称<br />userId: 用户Id<br />data[object]: 用户自定义传输数据, 无传参时，返回空对象</td></tr>
<tr>
<td>reason</td>
<td>string</td>
<td>捕获到异常时返回</td></tr></tbody></table>
<h3>leaveRoom()</h3>
<p>jrtcMiniapp.leaveRoom()<br /> 说明：退出房间<br /> 参数：&nbsp;无<br /> 返回：code、data和reason</p>
<p>返回值说明:&nbsp;</p>
<table>
<thead>
<tr>
<th>返回值</th>
<th>类型</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>code</td>
<td>number</td>
<td>状态码</td></tr>
<tr>
<td>data</td>
<td>string</td>
<td>空字符串</td></tr>
<tr>
<td>reason</td>
<td>string</td>
<td>捕获到异常时返回</td></tr></tbody></table>
<h3>destroy()</h3>
<p>jrtcMiniapp.destroy()<br /> 说明：销毁客户端对象<br /> 参数：&nbsp;无<br /> 返回：无</p>
<h2>2.消息监听</h2>
<h4>UserJoinedRoom</h4>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s1">'UserJoinedRoom'</span><span class="p">,</span> <span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// data: 监听事件所传递的数据</span></span>
<span class="line" lang="javascript"> <span class="c1">// 监听到用户进入房间后，do something</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>说明：用户加入房间</p>
<h4>UserLeavedRoom</h4>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s1">'UserLeavedRoom'</span><span class="p">,</span> <span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// data: 监听事件所传递的数据</span></span>
<span class="line" lang="javascript"> <span class="c1">// 监听到用户离开房间后，do something</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>说明：用户离开房间</p>
<h4>UserModifyRole</h4>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s1">'UserModifyRole'</span><span class="p">,</span> <span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// data: 监听事件所传递的数据</span></span>
<span class="line" lang="javascript"> <span class="c1">// 监听到用户设置角色后，do something</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>说明：用户设置角色</p>
<h4>StreamPublished</h4>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s1">'StreamPublished'</span><span class="p">,</span> <span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// data: 监听事件所传递的数据</span></span>
<span class="line" lang="javascript"> <span class="c1">// 监听到用户发布音频流后，do something</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>说明：有用户发布音频流</p>
<h4>StreamUnpublished</h4>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s1">'StreamUnpublished'</span><span class="p">,</span> <span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// data: 监听事件所传递的数据</span></span>
<span class="line" lang="javascript"> <span class="c1">// 监听到用户发布音频流后，do something</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>说明：有用户取消发布音频流</p>
<h4>AudioVolumes</h4>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s1">'AudioVolumes'</span><span class="p">,</span> <span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// data: 监听事件所传递的数据</span></span>
<span class="line" lang="javascript"> <span class="c1">// 监听到用户有音量变化后，do something</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>说明：用户有音量变化</p>
<h4>GlobalMute</h4>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s1">'GlobalMute'</span><span class="p">,</span> <span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// data: 监听事件所传递的数据</span></span>
<span class="line" lang="javascript"> <span class="c1">// 监听到全局静音后，do something</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>说明：设置全局静音</p>
<h4>CancelGlobalMute</h4>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s1">'CancelGlobalMute'</span><span class="p">,</span> <span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// data: 监听事件所传递的数据</span></span>
<span class="line" lang="javascript"> <span class="c1">// 监听到取消全局静音后，do something</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>说明：取消全局静音</p>
<h4>AssignPeerMute</h4>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s1">'AssignPeerMute'</span><span class="p">,</span> <span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// data: 监听事件所传递的数据</span></span>
<span class="line" lang="javascript"> <span class="c1">// 监听到指定用户静音后，do something</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>说明：指定用户静音</p>
<h4>CancelAssignPeerMute</h4>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s1">'CancelAssignPeerMute'</span><span class="p">,</span> <span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// data: 监听事件所传递的数据</span></span>
<span class="line" lang="javascript"> <span class="c1">// 监听到取消指定用户静音后，do something</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>说明：取消指定用户静音</p>
<h2>3.错误监听</h2>
<p>jrtcMiniapp.on('onError',&nbsp;err&nbsp;=&gt;&nbsp;{})<br /> 说明：错误事件，返回 { code: XXX, reason: XXXX}<br /> 错误信息参考：</p>
<table>
<thead>
<tr>
<th>code</th>
<th>reason</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>401</td>
<td>&nbsp;UNAUTHORIZED</td>
<td>无权操作</td></tr>
<tr>
<td>430</td>
<td>BAD_REQUEST</td>
<td>请求异常</td></tr>
<tr>
<td>431</td>
<td>ARGUMENT_INVALIDATE</td>
<td>参数错误</td></tr>
<tr>
<td>439</td>
<td>REPEAT_SUBMISSION</td>
<td>重复提交</td></tr>
<tr>
<td>500</td>
<td>INTERNAL</td>
<td>内部错误</td></tr>
<tr>
<td>503</td>
<td>NOT_FOUND</td>
<td>找不到对象</td></tr>
<tr>
<td>903</td>
<td>request timeout</td>
<td>发送消息超时</td></tr>
<tr>
<td>1005</td>
<td>websocket connect failed</td>
<td>连接错误，服务断开</td></tr>
<tr>
<td>1006</td>
<td>websocket is disconnected</td>
<td>服务断开</td></tr>
<tr>
<td>1007</td>
<td>transport close</td>
<td>连接关闭</td></tr>
<tr>
<td>1e4</td>
<td>UNKNOWN</td>
<td>未知错误</td></tr></tbody></table>
