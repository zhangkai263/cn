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
var player = JDplayer('id_video_container', {
sources: [
 {
 src: 'http://www.live.myjdcloud.com/xxx.m3u8', //请替换成实际可用的播放地址
type: 'application/x-mpegURL' // 各视频资源type见 表1.1， 媒体资源扩展名不在地址最后时，改项必须配置，否则可以省略

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
var player = JDplayer('id_video_container', {
sources: [
 {
 src: 'http://www.live.myjdcloud.com/xxx.flv', //请替换成实际可用的播放地址
type: 'video/flv' // 各视频资源type见 表1.1， 媒体资源扩展名不在地址最后时，改项必须配置，否则可以省略

 }
]
autoplay : true,      //iOS 下 safari 浏览器，以及大部分移动端浏览器是不开放视频自动播放这个能力的
poster : 'http://www.test.com/myimage.jpg',
width :  '480', //视频的显示宽度，请尽量使用视频分辨率宽度， 需视频根据容器自适应宽度时，设置fluid属性，该项不设置
height : '320', //视频的显示高度，请尽量使用视频分辨率高度， 需视频根据容器自适应高度时，设置fluid属性，该项不设置
fluid :  true //视频大小根据容器自适应
});
```

这段代码中增加了 FLV 的播放地址，在PC端使用京彩播放器播放直播流时，如果 FLV 、RTMP和 HLS（M3U8）这三个地址都是可以出流，建议使用 FLV或RTMP 链路，从而实现更低的延迟。

