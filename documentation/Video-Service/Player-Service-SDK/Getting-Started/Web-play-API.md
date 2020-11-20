## 对接攻略
### Step1. 页面准备工作  
在需要播放视频的页面（PC 或 H5）中引入初始化脚本。
```
<script src="https://j.jdcloud.com/video/player/1.0.0/libs/jdplayer.min.js"></script>;
```
注意：  
直接用本地网页无法调试，Web 播放器无法处理该情况下的跨域问题。

### Step2. 在 HTML 中放置容器
在需要展示播放器的页面位置加入播放器容器，即放一个 div 并命名，例如 id_video_container，视频画面都会在容器里渲染。对于容器的大小控制，您可以使用 div 的属性进行控制，示例代码如下：
```
 <div id="id_video_container" style="width:100%; height:auto;">
<video id="my-video" class="jdplayer"></video>

 </div> 
 ```
### Step3. 对接视频播放
编写 Javascript 代码，作用是去指定的 URL 地址拉取音视频流，并将视频画面呈现到添加的容器内。
#### 3.1简单播放
如下是一个直播格式的 URL 地址，使用 HLS（M3U8）协议，如果主播在直播中，则用 VLC 等播放器是可以直接打开该 URL 进行观看的：
```
http://www.live.myjdcloud.com/xxx.m3u8 // m3u8 播放地址
```

如果要在手机浏览器上播放该 URL 的视频，则 Javascript 代码如下：
```
var player = JDplayer('my_video', {
sources: [
 {
 src: 'http://www.live.myjdcloud.com/xxx.m3u8', //请替换成实际可用的播放地址
type: 'application/x-mpegURL' // 各视频资源type见 表1.1， 媒体资源扩展名不在地址最后时，该项必须配置，否则可以省略

 }
]
autoplay : true,      //iOS 下 safari 浏览器，以及大部分移动端浏览器是不开放视频自动播放这个能力的
poster : 'http://www.test.com/myimage.jpg',
width :  '480', //视频的显示宽度，请尽量使用视频分辨率宽度， 需视频根据容器自适应宽度时，设置fluid属性，该项不设置
height : '320', //视频的显示高度，请尽量使用视频分辨率高度， 需视频根据容器自适应高度时，设置fluid属性，该项不设置
fluid :  true //视频大小根据容器自适应
});
```

这段代码可以支持在 PC 及手机浏览器上播放 HLS（M3U8）协议的直播视频，虽然 HLS（M3U8）协议的视频兼容性不错，但部分 Android 手机依然不支持，其延迟较高，大约20秒以上的延迟。

#### 3.2PC上实现更低延迟
PC 浏览器支持 Flash，其 Javascript 代码如下：
```
var player = JDplayer('my_video', {
sources: [
 {
 src: 'http://www.live.myjdcloud.com/xxx.flv', //请替换成实际可用的播放地址
type: 'video/flv' // 各视频资源type见 表1.1， 媒体资源扩展名不在地址最后时，该项必须配置，否则可以省略

 }
]
autoplay : true,      //iOS 下 safari 浏览器，以及大部分移动端浏览器是不开放视频自动播放这个能力的
poster : 'http://www.test.com/myimage.jpg',
width :  '480', //视频的显示宽度，请尽量使用视频分辨率宽度， 需视频根据容器自适应宽度时，设置fluid属性，该项不设置
height : '320', //视频的显示高度，请尽量使用视频分辨率高度， 需视频根据容器自适应高度时，设置fluid属性，该项不设置
fluid :  true //视频大小根据容器自适应
});
```

这段代码中增加了 FLV 的播放地址，在使用PC端播放器播放直播流时，如果 FLV 、RTMP和 HLS（M3U8）这三个地址都可以出流，建议使用 FLV或RTMP 链路，从而实现更低的延迟。

表1.1 常用视频类型
<table>
<tr>
    <td>封装格式</td>
    <td>类型（type）</td>
</tr>
<tr>
    <td>MP4</td>
    <td>video/mp4</td>
</tr>
<tr>
    <td>M3U8</td>
    <td>application/x-mpegURL</td>
</tr>
<tr>
    <td>FLV</td>
    <td>video/flv 或 video/x-flv</td>
</tr>                
</table>

表1.2  RTMP协议类型
<table>
<tr>
    <td>封装格式</td>
    <td>类型（type）</td>
</tr>
<tr>
    <td>MP4</td>
    <td>rtmp/mp4</td>
</tr>
<tr>
    <td>FLV</td>
    <td>rtmp/flv</td>
</tr>                
</table>
注意: 媒资扩展名位于链接最后时，可以省略type属性。

### Step4. 多清晰度支持
#### 4.1原理介绍
Web 播放器支持多清晰度，如下图所示：
![播放器多清晰度.png](https://github.com/jdcloudcom/cn/blob/cn-Player-Service-SDK/image/Player-Service-SDK/web播放器1.png)

播放器本身是没有能力去改变视频清晰度的，视频源只有一种清晰度，称之为原画，而原画视频的编码格式和封装格式有多种，Web 端无法支持播放所有的视频格式，如点播支持以 H.264 为视频编码，MP4 和 FLV 为封装格式的视频。

#### 4.2代码实现
多清晰度支持的代码实现如下所示：
```
var player = JDplayer('my_video', {
resolutions: [
 {
 src: 'http://www.vod.myjdcloud.com/xxx-sd.flv', //请替换成实际可用的播放地址
type: 'video/flv', // 各视频资源type见表1.1， 媒体资源扩展名不在地址最后时，该项必须配置，否则可以省略

 resolution: '标清'
 },
{
 src: 'http://www.vod.myjdcloud.com/xxx-hd.mp4', 
 type: 'video/mp4',  
 resolution: '高清'
 },
{
 src: 'http://www.vod.myjdcloud.com/xxx-fhd.m3u8', 
 type: 'application/x-mpegURL',  
 resolution: '超清'
 }
]
autoplay : true,      //iOS 下 safari 浏览器，以及大部分移动端浏览器是不开放视频自动播放这个能力的
poster : 'http://www.test.com/myimage.jpg',
width :  '480', //视频的显示宽度，请尽量使用视频分辨率宽度， 需视频根据容器自适应宽度时，设置fluid属性，该项不设置
height : '320', //视频的显示高度，请尽量使用视频分辨率高度， 需视频根据容器自适应高度时，设置fluid属性，该项不设置
fluid :  true //视频大小根据容器自适应
});
```

#### 4.3实现用例
使用多种分辨率的设置及切换功能。线上示例如下，在 PC 浏览器中右键单击【查看网页源代码】即可查看页面的代码实现：<a href="https://j.jdcloud.com/video/player/index.html">分辨率实现</a>

正常情况将看到如下效果：
![播放器多分辨率.png](https://github.com/jdcloudcom/cn/blob/cn-Player-Service-SDK/image/Player-Service-SDK/web%E6%92%AD%E6%94%BE%E5%99%A82.png)

注意：
* PC 端现已支持多种清晰度播放及切换的功能，移动端尚未支持。  
* 以上示例链接仅用于文档演示，请勿用于生产环境。
