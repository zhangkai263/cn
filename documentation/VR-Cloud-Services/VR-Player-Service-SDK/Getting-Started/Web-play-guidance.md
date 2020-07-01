## 阅读对象
本文档面向所有使用京东云Web/H5播放器SDK的开发、测试人员等, 要求读者具有一定的Javascript编程开发经验。  

## 版本说明
* **迭代**  
当前版本为V1.0.0  

## 平台、协议及格式支持
1.支持Chrome、Firefox、IE11/Edge、Safari等主流浏览器；  
2.支持多种视频封装格式，如MP4、FLV、M3U8等；  
3.支持多种播放协议：
<table>
<tr>
    <td>视频协议</td>
    <td>用途</td>
    <td>URL地址格式</td>
    <td>Web</td>
    <td>H5</td>
</tr>
<tr>
    <td>HLS（M3U8）</td>
    <td>可用于直播</td>
    <td>http ://xxx.live.myjdcloud.com/xxx.m3u8</td>
    <td>√</td>
    <td>√</td>
</tr>
<tr>
    <td>HLS（M3U8）</td>
    <td>可用于点播</td>
    <td>http ://xxx.vod.myjdcloud.com/xxx.m3u8</td>
    <td>√</td>
    <td>√</td>
</tr>
<tr>
    <td>FLV</td>
    <td>可用于直播</td>
    <td>http ://xxx.live.myjdcloud.com/xxx.flv</td>
    <td>√</td>
    <td>×</td>
</tr>
<tr>
    <td>FLV</td>
    <td>可用于点播</td>
    <td>http ://xxx.vod.myjdcloud.com/xxx.flv</td>
    <td>√</td>
    <td>×</td>
</tr>
<tr>
    <td>RTMP</td>
    <td>只适用直播</td>
    <td>rtmp://xxx.live.myjdcloud.com/live/xxx</td>
    <td>√</td>
    <td>×</td>
</tr>
<tr>
    <td>MP4</td>
    <td>只适用点播</td>
    <td>http ://xxx.vod.myjdcloud.com/xxx.mp4</td>
    <td>√</td>
    <td>√</td>
</tr>                
</table>

注意：  
1)播放RTMP格式的视频必须启用 Flash，目前浏览器默认禁用Flash，需用户手动开启；  
2)使用flv.js + JDplayer.js 跨域播放视频资源时，需在服务器根域名下的跨域配置文件中进行跨域配置，并且按照如下说明配置Request Header和Respones Header；  
Request Header配置：
```
Access-Control-Request-Headers: range
Access-Control-Request-Method: GET
```
播放服务器必须允许 OPTIONS 请求，并打开播放服务器的Range回源设置。    
Video server Response Header配置：
```
Access-Control-Allow-Origin: <your-origin> | *
Access-Control-Allow-Methods: GET, OPTIONS
Access-Control-Allow-Headers: range
Access-Control-Expose-Headers: Content-Length
```  
3)跨域访问HLS(M3U8)时，也需在服务器根域名下的跨域配置文件中进行跨域配置，以及 Access-Control-Allow-Origin: * ；
4)对于 PC 浏览器播放FLV，提供两种解决方案：  
A、截止2020年12月底之前，因为目前浏览器和研发Flash控件的Adobe还没有抛弃Flash控件，并且Flash控件支持的视频源格式较多，兼容性较好，需兼容低版本IE浏览器的用户，可以使用Flash控件的方式播放FLV，兼容Chrome, FireFox, Safari 10, IE8及以上 and Edge，使用该方式播放flv，需要手动开启浏览器Flash插件，不显示播放速率菜单；  
B、若不考虑兼容低版本IE浏览器，可以使用flv.js+JDplayer.js结合播放FLV，采用HTML5 技术[Media Source Extensions](https://w3c.github.io/media-source/)，即便浏览器不再支持Flash控件，也可播放FLV，兼容Chrome, FireFox，IE11 and Edge，该方式采用H5技术，播放flv时，可显示播放速率菜单。

## 初始化参数
播放器初始化需要传入两个参数，第一个为播放器容器 ID（即video标签上的ID，该ID名称可自定义, 例如：
```
<video id="player-video-id"></video>
```
），第二个为功能参数对象。
```
var player = JDplayer('player-video-id', options);
```
1.options参数列表
options对象可配置的参数：
<table>
<tr>
    <td>名称</td>
    <td>类型</td>
    <td>默认值</td>
    <td>说明</td>
</tr>
<tr>
    <td>width</td>
    <td>String/Number</td>
    <td>无</td>
    <td>播放器区域宽度，单位像素，按需设置，可通过 CSS 控制播放器尺寸。</td>
</tr>
<tr>
    <td>height</td>
    <td>String/Number</td>
    <td>无</td>
    <td>播放器区域高度，单位像素，按需设置，可通过 CSS 控制播放器尺寸。</td>
</tr>
<tr>
    <td>controls</td>
    <td>Boolean</td>
    <td>true</td>
    <td>是否显示播放器的控制栏，可选值有“false”， “true”。</td>
</tr>
<tr>
    <td>poster</td>
    <td>String</td>
    <td>无</td>
    <td>设置封面图片完整地址url。注意：封面功能在部分移动端播放环境下可能失效，因为移动端视频播放环境相对比较复杂，各种浏览器和 App 的 Webview 对 H5 video 实现的方式并不统一，所以如果遇到功能失效的情况，请联系我们（联系电话：4006151212）。</td>
</tr>
<tr>
    <td>autoplay</td>
    <td>Boolean</td>
    <td>false</td>
    <td>是否自动播放，，可选值有“false”， “true” ，移动端由于系统限制，大部分机型设置 true 无效。</td>
</tr>
<tr>
    <td>playbackRates</td>
    <td>Array</td>
    <td>[0.5，1，1.5，2]</td>
    <td>设置变速播放倍率选项，仅 HTML5 播放模式有效。</td>
</tr>
<tr>
    <td>loop</td>
    <td>Boolean</td>
    <td>false</td>
    <td>是否循环播放，可选值有“false”， “true”。</td>
</tr>
<tr>
    <td>muted</td>
    <td>Boolean</td>
    <td>false</td>
    <td>是否静音播放，可选值有“false”， “true”。</td>
</tr>
<tr>
    <td>preload</td>
    <td>String</td>
    <td>auto</td>
    <td>是否需要预加载，可选值有"auto"，"metadata"和"none" ，移动端由于系统限制，设置 auto 无效。</td>
</tr>
<tr>
    <td>bigPlayButton</td>
    <td>Boolean</td>
    <td>true</td>
    <td>是否显示居中的播放按钮（浏览器劫持嵌入的播放按钮无法去除）。</td>
</tr>
<tr>
    <td>controlBar</td>
    <td>Object</td>
    <td>无</td>
    <td>设置控制栏属性的参数组合，后面有详细介绍。</td>
</tr>
<tr>
    <td>aspectRatio</td>
    <td>String</td>
    <td>无</td>
    <td>将播放器置于流畅模式，并在计算播放器的动态大小时使用该值。值应该代表一个比例 - 用冒号分隔的两个数字（例如"16:9"或"4:3"）。</td>
</tr>
<tr>
    <td>fluid</td>
    <td>Boolean</td>
    <td>false</td>
    <td>根据容器大小自适应。</td>
</tr>
<tr>
    <td>sources</td>
    <td>Array</td>
    <td>无</td>
    <td>        
[
        
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{   

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;type: 'video/mp4', // 这里的种类支持很多种：基本视频格式、直播、流媒体等   
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;src: 'http ://xxx.vod.myjdcloud.com/xxx55.mp4' // url地址   

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;},

...

{

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;type: 'video/flv',   
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;src: 'http ://xxx.vod.myjdcloud.com/xxx66.flv' // url地址

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}

]

配置播放媒资， type - 媒体类型 src - 媒资地址</td>
</tr>
<tr>
    <td>resolutions</td>
    <td>Array</td>
    <td>无</td>
    <td>        
[
        
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{   

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; type: 'video/mp4', // 这里的种类支持很多种：基本视频格式、直播、流媒体等      
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;src: 'http ://xxx.vod.myjdcloud.com/xxx-sd.mp4', // url地址   
resolution: '标清', // 自定义清晰度名称

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;},

...

{

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;type: 'video/mp4',   
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;src: 'http ://xxx.vod.myjdcloud.com/xxx-hd.mp4',   
resolution: '高清'

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}

]

用户根据需要配置所需展示切换的清晰度， type - 媒体类型 src - 媒资地址 resolution - 自定义清晰度名称</td>
</tr>                
</table>

2.controlBar 参数列表    
controlBar 参数可以配置播放器控制栏的功能，支持的属性有：
<table>
<tr>
    <td>名称</td>
    <td>类型</td>
    <td>默认值</td>
    <td>说明</td>
</tr>
<tr>
    <td>currentTimeDisplay</td>
    <td>Boolean</td>
    <td>true</td>
    <td>是否显示视频当前时间，可选值有“false”， “true”</td>
</tr>
<tr>
    <td>durationDisplay</td>
    <td>Boolean</td>
    <td>true</td>
    <td>是否显示视频时长，可选值有“false”， “true”</td>
</tr>
<tr>
    <td>fullscreenToggle</td>
    <td>Boolean</td>
    <td>true</td>
    <td>是否显示全屏按钮，可选值有“false”， “true”</td>
</tr>
<tr>
    <td>playbackRateMenuButton</td>
    <td>Boolean</td>
    <td>true</td>
    <td>是否显示播放速率选择按钮，可选值有“false”， “true”</td>
</tr>
<tr>
    <td>playToggle</td>
    <td>Boolean</td>
    <td>true</td>
    <td>是否显示播放、暂停切换按钮，可选值有“false”， “true”</td>
</tr>
<tr>
    <td>progressControl</td>
    <td>Boolean</td>
    <td>true</td>
    <td>是否显示播放进度条，可选值有“false”， “true”</td>
</tr>
<tr>
    <td>remainingTimeDisplay</td>
    <td>Boolean</td>
    <td>true</td>
    <td>是否显示播放剩余时间，可选值有“false”， “true”</td>
</tr>
<tr>
    <td>timeDivider</td>
    <td>Boolean</td>
    <td>true</td>
    <td>是否显示时间分割符，可选值有“false”， “true”</td>
</tr>
<tr>
    <td>volumePanel</td>
    <td>Boolean</td>
    <td>true</td>
    <td>是否显示音量控制，可选值有“false”， “true”</td>
</tr>                
</table>

注意：   
与播放进度条相关的设置项 ‘currentTimeDisplay’、‘timeDivider’ 、‘durationDisplay’, 当 ‘progressControl’ 设置为 true 时，对前三者的设置 true 或 false 可能不生效。

## 对象方法
初始化播放器返回对象的方法列表：
<table>
<tr>
    <td>名称</td>
    <td>参数及类型</td>
    <td>返回值及类型</td>
    <td>说明</td>
</tr>
<tr>
    <td>ready(function)</td>
    <td>(Function)</td>
    <td>无</td>
    <td>设置播放器初始化完成后的回调。</td>
</tr>
<tr>
    <td>play()</td>
    <td>无</td>
    <td>无</td>
    <td>播放以及恢复播放。</td>
</tr>
<tr>
    <td>pause()</td>
    <td>无</td>
    <td>无</td>
    <td>暂停播放。</td>
</tr>
<tr>
    <td>currentTime(seconds)</td>
    <td>(Number)</td>
    <td>(Number)</td>
    <td>获取当前播放时间点，或者设置播放时间点，该时间点不能超过视频时长。</td>
</tr>
<tr>
    <td>duration()</td>
    <td>无</td>
    <td>(Number)</td>
    <td>获取视频时长。</td>
</tr>
<tr>
    <td>volume(percent)</td>
    <td>(Number)[0，1][可选]</td>
    <td>(Number)/设置时无返回</td>
    <td>获取或设置播放器音量。</td>
</tr>
<tr>
    <td>poster(src)</td>
    <td>(String)</td>
    <td>(String)/设置时无返回</td>
    <td>获取或设置播放器封面。</td>
</tr>
<tr>
    <td>requestFullscreen()</td>
    <td>无</td>
    <td>无</td>
    <td>进入全屏模式。</td>
</tr>
<tr>
    <td>exitFullscreen()</td>
    <td>无</td>
    <td>无</td>
    <td>退出全屏模式。</td>
</tr>
<tr>
    <td>isFullscreen()</td>
    <td>无</td>
    <td>Boolean</td>
    <td>返回是否进入了全屏模式。</td>
</tr>
<tr>
    <td>on(type，listerner)</td>
    <td>(String, Function)</td>
    <td>无</td>
    <td>监听事件。</td>
</tr>
<tr>
    <td>one(type，listerner)	</td>
    <td>(String, Function)</td>
    <td>无</td>
    <td>监听事件，事件处理函数最多只执行1次。</td>
</tr>
<tr>
    <td>off(type，listerner)</td>
    <td>(String, Function)</td>
    <td>无</td>
    <td>解绑事件监听。</td>
</tr>
<tr>
    <td>buffered()</td>
    <td>无</td>
    <td>TimeRanges</td>
    <td>返回视频缓冲区间。</td>
</tr>
<tr>
    <td>bufferedPercent()</td>
    <td>无</td>
    <td>值范围[0，1]</td>
    <td>返回缓冲长度占视频时长的百分比。</td>
</tr>
<tr>
    <td>width()</td>
    <td>(Number)[可选]</td>
    <td>(Number)/设置时无返回</td>
    <td>获取或设置播放器区域宽度，如果通过 CSS 设置播放器尺寸，该方法将无效。</td>
</tr>
<tr>
    <td>height()</td>
    <td>(Number)[可选]</td>
    <td>(Number)/设置时无返回</td>
    <td>获取或设置播放器区域高度，如果通过 CSS 设置播放器尺寸，该方法将无效。</td>
</tr>
<tr>
    <td>videoWidth()</td>
    <td>无</td>
    <td>(Number)</td>
    <td>获取视频分辨率的宽度。</td>
</tr>
<tr>
    <td>videoHeight()</td>
    <td>无</td>
    <td>(Number)</td>
    <td>获取视频分辨率的高度。</td>
</tr>
<tr>
    <td>dispose()</td>
    <td>无</td>
    <td>无</td>
    <td>销毁播放器。</td>
</tr>                
</table>

注意：   
对象方法不能同步调用，需要在相应的事件（如 loadedmetadata）触发后才可以调用，除了 ready、on、one 以及 off。

## 事件
播放器可以通过初始化返回的对象进行事件监听，示例：
```
 var player = JDplayer('player-video-id', options);  
  // player.on(type, function(){
  // 做一些处理
 // });
 player.on('error', function(error) {
   // 做一些处理
 });
 ```
 
 其中 type 为事件类型，支持的事件有：
 <table>
<tr>
    <td>名称</td>
    <td>介绍</td>
</tr>
<tr>
    <td>play</td>
    <td>已经开始播放，调用 play() 方法或者设置了 autuplay 为 true 且生效时触发，这时 paused 属性为 false。</td>
</tr>
<tr>
    <td>playing</td>
    <td>因缓冲而暂停或停止后恢复播放时触发，paused 属性为 false 。通常用这个事件来标记视频真正播放，play 事件只是开始播放，画面并没有开始渲染。</td>
</tr>
<tr>
    <td>loadstart</td>
    <td>开始加载数据时触发。</td>
</tr>
<tr>
    <td>durationchange</td>
    <td>视频的时长数据发生变化时触发。</td>
</tr>
<tr>
    <td>loadedmetadata</td>
    <td>已加载视频的 metadata。</td>
</tr>
<tr>
    <td>loadeddata</td>
    <td>当前帧的数据已加载，但没有足够的数据来播放视频的下一帧时，触发该事件。</td>
</tr>
<tr>
    <td>progress</td>
    <td>在获取到媒体数据时触发。</td>
</tr>
<tr>
    <td>canplay</td>
    <td>当播放器能够开始播放视频时触发。</td>
</tr>
<tr>
    <td>canplaythrough</td>
    <td>当播放器预计能够在不停下来进行缓冲的情况下持续播放指定的视频时触发。</td>
</tr>
<tr>
    <td>error</td>
    <td>视频播放出现错误时触发。</td>
</tr>
<tr>
    <td>pause</td>
    <td>暂停时触发。</td>
</tr>
<tr>
    <td>ratechange</td>
    <td>播放速率变更时触发。</td>
</tr>
<tr>
    <td>seeked</td>
    <td>搜寻指定播放位置结束时触发。</td>
</tr>
<tr>
    <td>seeking</td>
    <td>搜寻指定播放位置开始时触发。</td>
</tr>
<tr>
    <td>timeupdate</td>
    <td>当前播放位置有变更，可以理解为 currentTime 有变更。</td>
</tr>
<tr>
    <td>volumechange</td>
    <td>设置音量或者 muted 属性值变更时触发。</td>
</tr>
<tr>
    <td>waiting</td>
    <td>播放停止，下一帧内容不可用时触发。</td>
</tr>
<tr>
    <td>ended</td>
    <td>视频播放已结束时触发。此时 currentTime 值等于媒体资源最大值。</td>
</tr>
<tr>
    <td>fullscreenchange</td>
    <td>全屏状态切换时触发。</td>
</tr>                
</table>

## 错误码
当播放器触发 error 事件时，监听函数会返回错误码，其中3位数以上的错误码为媒体数据接口错误码。错误码列表：
 <table>
<tr>
    <td>名称</td>
    <td>描述</td>
</tr>
<tr>
    <td>0 - MEDIA_ERR_CUSTOM</td>
    <td>用户错误</td>
</tr>
<tr>
    <td>1 - MEDIA_ERR_ABORTED</td>
    <td>You aborted the media playback （视频数据加载过程中被中断）。             

可能原因：

* 网络中断。   
* 浏览器异常中断。  

解决方案：  

* 查看浏览器控制台网络请求信息，确认网络请求是否正常。 
* 重新进行播放流程。</td>
</tr>
<tr>
    <td>2 - MEDIA_ERR_NETWORK</td>
    <td>A network error caused the media download to fail part-way（由于网络问题造成加载视频失败）。

可能原因：网络中断。

解决方案:
* 查看浏览器控制台网络请求信息，确认网络请求是否正常。
* 重新进行播放流程。</td>
</tr>
<tr>
    <td>3 - MEDIA_ERR_DECODE</td>
    <td>The media playback was aborted due to a corruption problem or because the media used features your browser did not support（视频解码时发生错误）。

可能原因：视频数据异常，解码器解码失败。

解决方案：
* 尝试重新转码再进行播放，排除由于转码流程引入的问题。
* 确认原始视频是否正常。</td>
</tr>
<tr>
    <td>4 - MEDIA_ERR_SRC_NOT_SUPPORTED</td>
    <td>The media could not be loaded, either because the server or network failed or because the format is not supported（视频因格式不支持或者服务器或网络的问题无法加载）。

可能原因：
* 获取不到视频数据，CDN 资源不存在或者没有返回视频数据。
* 当前播放环境不支持播放该视频格式。

解决方案：
* 查看浏览器控制台网络请求信息，确认视频数据请求是否正常。
* 确认是否按照使用文档加载了对应视频格式的播放脚本。
* 确认当前浏览器和页面环境是否支持将要播放的视频格式。</td>
</tr>
<tr>
    <td>5 - MEDIA_ERR_ENCRYPTED</td>
    <td>The media is encrypted and we do not have the keys to decrypt it（视频解密时发生错误）。

可能原因：
* 解密用的密钥不正确。
* 请求密钥接口返回异常。
* 当前播放环境不支持视频解密功能。

解决方案：
* 确认密钥是否正确，以及密钥接口是否返回正常。</td>
</tr>                
</table>
