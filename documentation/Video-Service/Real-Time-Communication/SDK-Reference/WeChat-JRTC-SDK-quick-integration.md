
<p>JRTC Miniapp SDK for Wechat 是一个全新的SDK，能支持微信小程序实现如下功能：</p>
<ul>
<li>音频通话</li>
<li>音频直播</li></ul>
<p>结合微信小程序，能实现如下场景：</p>
<ul>
<li>线上课堂：1 对 1 及 1 对多线上小班课，老师、学生实时互动</li>
<li>在线客服：为客户提供在线服务，1 对 1 实时交流</li>
<li>在线会议：1 对 1 及 1 对多线上会议，嘉宾与观众实时互动</li></ul>
<h1>前提条件<span style="color: rgb(165,173,186);"></span></h1>
<p>在执行Demo步骤之前，您需要从控制台获取鉴权信息，具体操作请参见<a href="https://docs.jdcloud.com/cn/real-time-communication/sdk/generate-user-token">生成Token</a>。 您需要下载示例代码，详情请参见<a href="https://sdk-publish.s3.cn-north-1.jdcloud-oss.com/%E5%BE%AE%E4%BF%A1%E5%B0%8F%E7%A8%8B%E5%BA%8F-JRTC.zip">SDK下载</a>。</p>
<h1>操作步骤</h1>
<p>1.集成SDK。</p>
<blockquote>
<p>JRTC Miniapp SDK存放于demo中根目录下lib文件夹内，可根据自身项目构建需求，调整JRTC Miniapp SDK存放位置。</p></blockquote>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="k">import</span> <span class="nx">JRTCMiniappClient</span> <span class="k">from</span> <span class="s1">'../lib/jrtc-miniapp.min'</span></span></code></pre>
<p>2.初始化SDK。</p>
<pre class="code highlight js-syntax-highlight plaintext white" lang="plaintext"><code>const jrtcMiniapp = JRTCMiniappClient.init({ appId, pushDomain,  pullDomain });</code></pre>
<blockquote>
<p><strong>说明</strong> appId 为应用ID，从控制台获取</p></blockquote>
<p>3.加入房间。进入房间成功, 会返回一个ROOM对象:&nbsp;JRTCMiniAppRoom。</p>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">joinRoom</span><span class="p">({</span></span>
<span class="line" lang="javascript"> <span class="nx">appId</span><span class="p">,</span> <span class="c1">// 应用ID，从控制台获取</span></span>
<span class="line" lang="javascript"> <span class="nx">token</span><span class="p">,</span> <span class="c1">// 用户生成token，生成方式参见XXXX获取</span></span>
<span class="line" lang="javascript"> <span class="nx">userId</span><span class="p">,</span> <span class="c1">// 用户ID</span></span>
<span class="line" lang="javascript"> <span class="nx">role</span><span class="p">,</span> <span class="c1">// 用户角色</span></span>
<span class="line" lang="javascript"> <span class="nx">nonce</span><span class="p">,</span> <span class="c1">// 令牌随机码，用户生成</span></span>
<span class="line" lang="javascript"> <span class="nx">timestamp</span><span class="p">,</span> <span class="c1">// 令牌过期时间，用户生成</span></span>
<span class="line" lang="javascript"> <span class="nx">userRoomId</span><span class="p">,</span> <span class="c1">// 用户房间ID</span></span>
<span class="line" lang="javascript"> <span class="nx">peerId</span><span class="p">,</span> <span class="c1">// 会议平台的用户ID，选填</span></span>
<span class="line" lang="javascript"> <span class="nx">nickName</span> <span class="c1">// 昵称，选填</span></span>
<span class="line" lang="javascript"><span class="p">}).</span><span class="nx">then</span><span class="p">(</span><span class="nx">res</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 成功加入房间</span></span>
<span class="line" lang="javascript"><span class="p">}).</span><span class="k">catch</span><span class="p">(</span><span class="nx">err</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 加入房间失败，打印错误日志，可以查看失败原因</span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">err</span><span class="p">);</span></span>
<span class="line" lang="javascript"><span class="p">});</span></span></code></pre>
<p>4.设置用户角色。</p>
<ul>
<li>该方法设置用户角色。小程序端的用户角色默认为观众，因此在同时满足以下条件的使用场景中，必须调用该接口将小程序端的用户角色设置为主播再进入频道。参数roleType为用户角色类型：1 - 主播， 2 - 观众。</li></ul>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"> <span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">setRole</span><span class="p">(</span><span class="nx">roleType</span><span class="p">).</span><span class="nx">then</span><span class="p">(</span><span class="nx">res</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 成功设置角色</span></span>
<span class="line" lang="javascript"> <span class="p">}).</span><span class="k">catch</span><span class="p">(</span><span class="nx">err</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 设置角色失败，打印错误日志，可以查看失败原因</span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">err</span><span class="p">);</span></span>
<span class="line" lang="javascript"> <span class="p">});</span></span></code></pre>
<p>5.发布本地音频流。</p>
<ul>
<li>该方法将本地音视频流发布到远端。互动直播中，调用该 API 的用户即默认为主播。</li></ul>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"> <span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">publish</span><span class="p">().</span><span class="nx">then</span><span class="p">(</span><span class="nx">res</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 成功获取音频推流地址</span></span>
<span class="line" lang="javascript"> <span class="p">}).</span><span class="k">catch</span><span class="p">(</span><span class="nx">err</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 获取音频推流地址失败，打印错误日志，可以查看失败原因</span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">err</span><span class="p">);</span></span>
<span class="line" lang="javascript"> <span class="p">});</span></span></code></pre>
<p>6.订阅远端音频流。</p>
<ul>
<li>该方法订阅并接收远端音频流。互动直播中，调用该 API 的用户即默认为观众。</li></ul>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"> <span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">subscribe</span><span class="p">().</span><span class="nx">then</span><span class="p">(</span><span class="nx">res</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 成功获取音频拉流地址</span></span>
<span class="line" lang="javascript"> <span class="p">}).</span><span class="k">catch</span><span class="p">(</span><span class="nx">err</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 获取音频拉流地址失败，打印错误日志，可以查看失败原因</span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">err</span><span class="p">);</span></span>
<span class="line" lang="javascript"> <span class="p">});</span></span></code></pre>
<p>7.获取房间主播列表。</p>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"> <span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">getBroadcasterList</span><span class="p">().</span><span class="nx">then</span><span class="p">(</span><span class="nx">res</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 成功获取房间主播列表</span></span>
<span class="line" lang="javascript"> <span class="p">}).</span><span class="k">catch</span><span class="p">(</span><span class="nx">err</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 获取房间主播列表失败，打印错误日志，可以查看失败原因</span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">err</span><span class="p">);</span></span>
<span class="line" lang="javascript"> <span class="p">});</span></span></code></pre>
<p>8.获取房间观众列表。</p>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"> <span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">getAudienceList</span><span class="p">().</span><span class="nx">then</span><span class="p">(</span><span class="nx">res</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 成功获取房间观众列表</span></span>
<span class="line" lang="javascript"> <span class="p">}).</span><span class="k">catch</span><span class="p">(</span><span class="nx">err</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 获取房间观众列表失败，打印错误日志，可以查看失败原因</span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">err</span><span class="p">);</span></span>
<span class="line" lang="javascript"> <span class="p">});</span></span></code></pre>
<p>9.获取房间成员数，包括主播人数、观众人数和总人数。</p>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"> <span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">getRoomMemberCount</span><span class="p">().</span><span class="nx">then</span><span class="p">(</span><span class="nx">res</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 成功获取房间成员数</span></span>
<span class="line" lang="javascript"> <span class="p">}).</span><span class="k">catch</span><span class="p">(</span><span class="nx">err</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 获取房间成员数失败，打印错误日志，可以查看失败原因</span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">err</span><span class="p">);</span></span>
<span class="line" lang="javascript"> <span class="p">});</span></span></code></pre>
<p>10.退出房间。</p>
<pre class="code highlight js-syntax-highlight javascript white" lang="javascript"><code><span class="line" lang="javascript"><span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">leaveRoom</span><span class="p">().</span><span class="nx">then</span><span class="p">(</span><span class="nx">res</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 退出房间成功</span></span>
<span class="line" lang="javascript"> <span class="nx">jrtcMiniapp</span><span class="p">.</span><span class="nx">destroy</span><span class="p">();</span> <span class="c1">// 销毁客户端对象</span></span>
<span class="line" lang="javascript"><span class="p">}).</span><span class="k">catch</span><span class="p">(</span><span class="nx">err</span> <span class="o">=&gt;</span> <span class="p">{</span></span>
<span class="line" lang="javascript"> <span class="c1">// 退出房间失败，打印错误日志，可以查看失败原因</span></span>
<span class="line" lang="javascript"> <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">err</span><span class="p">);</span></span>
<span class="line" lang="javascript"><span class="p">})</span></span></code></pre>
