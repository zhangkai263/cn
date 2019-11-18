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
    <td>“http://xxx.vod.myjdcloud.com/xxx.mp4”</td>
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
B、若不考虑兼容低版本IE浏览器，可以使用flv.js+JDplayer.js结合播放FLV，采用HTML5 技术[Media Source Extensions](https://w3c.github.io/media-source/)，即便浏览器不再支持Flash控件，也可播放FLV，兼容Chrome, FireFox，IE11 and Edge，该方式采用H5技术，播放flv时，可显示播放速率菜单。

