
<h1>JRTC简介</h1>
<p>JRTC的基本功能包含创建实例、加入房间、本地发布、订阅远端和离开房间等。当您成功创建实例，您可以进行本地预览视频功能，进行简单的预览和测试。</p>
<h1>前提条件</h1>
<p>在执行Demo步骤之前，您需要从控制台获取鉴权信息，具体操作请参见<a href="https://docs.jdcloud.com/cn/real-time-communication/sdk/generate-user-token">生成Token</a>。 您需要下载示例代码，详情请参见<a href="https://sdk-publish.s3.cn-north-1.jdcloud-oss.com/JRTC-H5.zip">SDK下载</a>。</p>
<h1>操作步骤</h1>
<p>1.使用scripty引入SDK,&nbsp; demo中SDK存放于public文件夹下。</p>
<pre class="code highlight js-syntax-highlight shell white" lang="shell"><code><span class="line" lang="shell">&lt;script src=&quot;./jrtc.min.js&quot;&gt;&lt;/script&gt;</span></code></pre>
<p>2.初始化SDK。</p>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="kd">const</span> <span class="nx">JWebrtc</span> <span class="o">=</span> <span class="nx">jrtc</span><span class="p">.</span><span class="nx">init</span><span class="p">({</span> <span class="nx">appId</span> <span class="p">})</span></span></code></pre>
<blockquote>
<p><strong>rt说明</strong>&nbsp;appId 为应用ID，从控制台获取</p></blockquote>
<p>4.加入房间。进入房间成功, 会返回一个ROOM对象:&nbsp;JRTCRoom。</p>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">JWebrtc</span><span class="p">.</span><span class="nx">enterRoom</span><span class="p">({</span> </span>
<span class="line" lang="javascript"> <span class="nx">appId</span><span class="p">,</span> <span class="c1">// 应用ID，从控制台获取</span></span>
<span class="line" lang="javascript"> <span class="nx">token</span><span class="p">,</span> <span class="c1">// 用户生成token，生成方式参见XXXX取</span></span>
<span class="line" lang="javascript"> <span class="nx">userId</span><span class="p">,</span> <span class="c1">// 用户ID</span></span>
<span class="line" lang="javascript"> <span class="nx">nonce</span><span class="p">,</span> <span class="c1">// 令牌随机码，用户生成</span></span>
<span class="line" lang="javascript"> <span class="nx">timestamp</span><span class="p">,</span> <span class="c1">// 令牌过期时间，用户生成</span></span>
<span class="line" lang="javascript"> userR<span class="nx">oomId</span><span class="p">,</span> <span class="c1">// 房间ID</span></span>
<span class="line" lang="javascript"> <span class="nx">nickName</span><span class="p">,</span> <span class="c1">// 昵称</span></span>
<span class="line" lang="javascript"> <span class="nx">subscribeType，</span> <span class="c1">// 大房间模式下，音频订阅模式：1.固定订阅 2.普通订阅。 默认为 1<br /></span></span>  useVp8 // 是否开启vp8运行环境，布尔值，默认false
<span class="line" lang="javascript"><span class="p">}).</span><span class="nx">then</span><span class="p">((</span><span class="nx">res</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 成功加入会议</span></span>
<span class="line" lang="javascript"><span class="p">}).</span><span class="k">catch</span><span class="p">((</span><span class="nx">err</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 加入会议失败，打印错误日志，可以查看失败原因 </span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">err</span><span class="p">);</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>5.发布或取消发布音、视频流。</p>
<ul>
<li>发布音频流。通过getAudioTrack方法获取音频轨道后，使用publishAudioStream方法可以发布音频流。</li></ul>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">JWebrtc</span><span class="p">.</span><span class="nx">getAudioTrack</span><span class="p">()</span> <span class="c1">// 该方法返回 audioTrack</span></span>
<span class="line" lang="javascript"> <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">track</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"><span class="nx">JRTCRoom</span><span class="p">.</span><span class="nx">publishAudioStream</span><span class="p">(</span><span class="nx">track</span><span class="p">).</span><span class="nx">then</span><span class="p">(</span></span>
<span class="line" lang="javascript"> <span class="p">({</span> <span class="nx">track</span><span class="p">,</span> <span class="nx">streamId</span> <span class="p">})</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 音频流发布成功</span></span>
<span class="line" lang="javascript"> <span class="p">}</span></span>
<span class="line" lang="javascript"> <span class="p">);</span></span>
<span class="line" lang="javascript"> <span class="p">})</span></span>
<span class="line" lang="javascript"> <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">err</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 音频流发布失败， 打印错误日志，可以查看失败原因 </span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">err</span><span class="p">);</span></span>
<span class="line" lang="javascript"> <span class="p">});</span></span></code></pre>
<ul>
<li>发布视频流。通过getVideoTrack方法获取视频轨道后，使用publishVideoStream方法可以发布视频流。</li></ul>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">JWebrtc</span><span class="p">.</span><span class="nx">getVideoTrack</span><span class="p">()</span> <span class="c1">// 该方法返回 videoTrack</span></span>
<span class="line" lang="javascript"> <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">track</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="nx">JRTCRoom</span><span class="p">.</span><span class="nx">publishVideoStream</span><span class="p">(</span><span class="nx">track</span><span class="p">).</span><span class="nx">then</span><span class="p">(</span></span>
<span class="line" lang="javascript"> <span class="p">({</span> <span class="nx">track</span><span class="p">,</span> <span class="nx">streamId</span> <span class="p">})</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 视频流发布成功</span></span>
<span class="line" lang="javascript"> <span class="p">}</span></span>
<span class="line" lang="javascript"> <span class="p">);</span></span>
<span class="line" lang="javascript"> <span class="p">})</span></span>
<span class="line" lang="javascript"> <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">err</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">err</span><span class="p">); //视频发布失败</span></span>
<span class="line" lang="javascript"> <span class="p">});</span></span></code></pre>
<ul>
<li>取消发布音、视频流。</li></ul>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">JRTCRoom</span><span class="p">.</span><span class="nx">unPublishStream</span><span class="p">(</span><span class="nx">streamId</span><span class="p">);</span> <span class="c1">// streamId - 流ID</span></span></code></pre>
<p>6.发布StreamPublished回调或StreamUnpublished回调。</p>
<ul>
<li>发布StreamPublished回调。当有用户发布新的音、视频流时，在SDK里会触发StreamPublished回调，通过订阅这个回调，能够得到房间里已经发布新流的用户。</li></ul>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">JRTCRoom</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s2">&quot;StreamPublished&quot;</span><span class="p">,</span> <span class="p">(</span><span class="nx">streamInfos</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 当有新流发布时，可获取streamInfos</span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">streamInfos</span><span class="p">)</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>streamInfos 信息如下表所示：</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<thead>
<tr>
<th>参数</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>userId</td>
<td>用户Id</td></tr>
<tr>
<td>nickName</td>
<td>昵称</td></tr>
<tr>
<td>kind</td>
<td>流类型</td></tr>
<tr>
<td>streamName</td>
<td>流名称</td></tr></tbody></table>
<ul>
<li>发布StreamUnpublished回调。当有用户取消音频或视频发布时，会触发这个回调。</li></ul>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">JRTCRoom</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s2">&quot;StreamUnpublished&quot;</span><span class="p">,</span> <span class="p">(</span><span class="nx">peerInfo</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 返回取消发布的流信息</span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">peerInfo</span><span class="p">);</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>peerInfo 信息如下表所示：</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<thead>
<tr>
<th>参数</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>userId</td>
<td>用户Id</td></tr>
<tr>
<td>nickName</td>
<td>昵称</td></tr>
<tr>
<td>kind</td>
<td>流类型</td></tr></tbody></table>
<blockquote>
<p><strong>说明</strong>&nbsp;StreamPublished、StreamUnpublished回调只有加入房间以后才会触发。</p></blockquote>
<p>7.订阅或取消订阅流。</p>
<ul>
<li>订阅流。通过subscribeStreams方法可以订阅流，订阅成功如果产生新的消费者，需手动监听streamSubscribed。</li></ul>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">JRTCRoom</span><span class="p">.</span><span class="nx">subscribeStreams</span><span class="p">(</span><span class="nx">streamIds</span><span class="p">);</span> <span class="c1">// 订阅流，streamIds - 流ID Array</span></span></code></pre>
<blockquote>
<p>手动监听 streamSubscribed，返回peerInfo。</p>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">JRTCRoom</span><span class="p">.</span><span class="nx">on</span><span class="p">(</span><span class="s2">&quot;StreamSubscribed&quot;</span><span class="p">,</span> <span class="p">({</span> <span class="nx">peerInfo</span> <span class="p">})</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="s2">&quot;StreamSubscribed&quot;</span><span class="p">,</span> <span class="nx">peerInfo</span><span class="p">);</span></span>
<span class="line" lang="javascript"><span class="p">})</span></span></code></pre></blockquote>
<p>peerInfo 信息如下表所示：</p>
<table class="wrapped"><colgroup><col /><col /></colgroup>
<thead>
<tr>
<th>参数</th>
<th>说明</th></tr></thead>
<tbody>
<tr>
<td>userId</td>
<td>用户Id</td></tr>
<tr>
<td>nickName</td>
<td>昵称</td></tr>
<tr>
<td>audioTrack</td>
<td>音频轨道</td></tr>
<tr>
<td>videoTrack</td>
<td>视频轨道</td></tr></tbody></table>
<ul>
<li>取消订阅。通过unSubscribeStreams方法可以取消订阅流。</li></ul>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">JRTCRoom</span><span class="p">.</span><span class="nx">unSubscribeStreams</span><span class="p">(</span><span class="nx">streamIds</span><span class="p">);</span> <span class="c1">// 取消订阅流，streamIds - 流ID Array</span></span></code></pre>
<p>8.退出房间。</p>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">JWebrtc</span><span class="p">.</span><span class="nx">exitRoom</span><span class="p">()</span></span>
<span class="line" lang="javascript"> <span class="p">.</span><span class="nx">then</span><span class="p">(()</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 退出房间成功</span></span>
<span class="line" lang="javascript"> <span class="nx">JWebrtc</span><span class="p">.</span><span class="nx">disconnectAll</span><span class="p">();</span> <span class="c1">// 断开通信连接，销毁房间</span></span>
<span class="line" lang="javascript"> <span class="nx">JWebrtc</span> <span class="o">=</span> <span class="kc">null</span><span class="p">;</span> <span class="c1">// 全局变量 JWebrtc 设置为null</span></span>
<span class="line" lang="javascript"> <span class="p">})</span></span></code></pre>
<p><br /></p>
