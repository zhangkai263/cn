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
1)播放 RTMP 格式的视频必须启用 Flash，目前浏览器默认禁用 Flash，需用户手动开启；  
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
B、若不考虑兼容低版本IE浏览器，可以使用flv.js+JDplayer.js结合播放FLV，采用HTML5 技术![](https://Media Source Extensions)，即便浏览器不再支持Flash控件，也可播放FLV，兼容Chrome, FireFox，IE11 and Edge，该方式采用H5技术，播放flv时，可显示播放速率菜单。




![](https://Media Source Extensions)

* **获取SDK**  
Android端推流SDK&播放器SDK请<a href="Media Source Extensions">点击下载</a><br/>  

* **工程目录结构**  
demo: 示例工程，演示本SDK主要接口功能的使用    
libs: 集成SDK需要的所有库文件    
jniLibs/[armeabi-v7a|arm64-v8a|x86]: 各平台的so库    
libs/jdc_live.jar: SDK jar包    

* **配置项目**    
引入目标库, 将libs目录下的库文件引入到目标工程中并添加依赖。
可参考下述配置方式（以Android Studio为例）：  
1)导入SDK
手动集成：
将libs目录copy到目标工程的libs下；
将jniLibs目录拷贝到目标工程的src\main\jniLibs;

2)修改proguard(混淆)文件，添加如下规则：
```
-keep class com.jdcloud.media.player.** {
  *;
}
```

3)在AndroidManifest.xml文件中申请相应权限
```
<!-- 使用权限 -->
<uses-permission android:name="android.permission.INTERNET" />
<uses-permission android:name="android.permission.WAKE_LOCK" />
<uses-permission android:name="android.permission.ACCESS_NETWORK_STATE" />
<uses-permission android:name="android.permission.ACCESS_WIFI_STATE" />
<uses-permission android:name="android.permission.READ_PHONE_STATE" />
```
