## 阅读对象
本文档面向所有使用京东云web/h5播放器SDK的开发、测试人员等, 要求读者具有一定的Javascript编程开发经验。  

## 版本说明
* **迭代**  
当前版本为V1.0.0  

## 平台、协议及格式支持
1.支持Chrome、Firefox、IE11/Edge、Safari等主流浏览器；  
2.支持多种视频封装格式，如MP4、FLV、M3U8、MOV等；  
3.支持多种播放协议：
<table>
<tr>
    <td>视频协议</td>
    <td>用途</td>
    <td>URL地址格式</td>
    <td>Web</td>
    <td>h5</td>
</tr>
<tr>
    <td>HLS（M3U8）</td>
    <td>可用于直播</td>
    <td>http://xxx.live.myjdcloud.com/xxx.m3u8</td>
    <td>√</td>
    <td>√</td>
</tr>
<tr>
    <td>HLS（M3U8）</td>
    <td>可用于点播</td>
    <td>http://xxx.vod.myjdcloud.com/xxx.m3u8</td>
    <td>√</td>
    <td>√</td>
</tr>
<tr>
    <td>FLV</td>
    <td>可用于直播</td>
    <td>http://xxx.live.myjdcloud.com/xxx.flv</td>
    <td>√</td>
    <td>×</td>
</tr>
<tr>
    <td>FLV</td>
    <td>可用于点播</td>
    <td>http://xxx.vod.myjdcloud.com/xxx.flv</td>
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
    <td>http://xxx.vod.myjdcloud.com/xxx.mp4</td>
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
播放器初始化需要传入两个参数，第一个为播放器容器 ID（即video标签上的ID，该ID名称可自定义,  例如：<video id=“player-video-id”></video>），第二个为功能参数对象。
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
    <td>设置封面图片完整地址url。注意：封面功能在部分移动端播放环境下可能失效，因为移动端视频播放环境相对比较复杂，各种浏览器和 App 的 Webview 对 H5 video 实现的方式并不统一，所以如果遇到功能失效的情况，请联系我们。</td>
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
<p>[</p>
    <p>{</p>
      type: 'video/mp4', // 这里的种类支持很多种：基本视频格式、直播、流媒体等
      src: 'http://xxx.vod.myjdcloud.com/xxx55.mp4' // url地址
     },

...

{
      type: 'video/flv',
      src: 'http://xxx.vod.myjdcloud.com/xxx66.flv' // url地址
     }

]

配置播放媒资， type - 媒体类型 src - 媒资地址</td>
</tr>
<tr>
    <td>fluid</td>
    <td>Boolean</td>
    <td>false</td>
    <td>根据容器大小自适应。</td>
</tr>
<tr>
    <td>fluid</td>
    <td>Boolean</td>
    <td>false</td>
    <td>根据容器大小自适应。</td>
</tr>                
</table>
