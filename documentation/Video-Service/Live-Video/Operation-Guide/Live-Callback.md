# 直播回调

视频直播服务支持直播回调功能，包含推流回调、录制回调和截图回调，推流回调可以将用户推流和断流的实时状态返回给客户，尤其在主播使用开源推流工具（如OBS），客户可通过该功能了解主播状态；录制回调在录制文件生成时会通知客户，客户可实时获取录制文件；截图回调在截图完成后会通知客户，客户可以实时获取图片文件。

使用该功能需要您添加一个接收回调的URL地址，并保证地址可用，该操作可在控制台中完成。

## 1.开启回调

登录直播控制台，进入“域名管理”页面，选择要查看播放地址的一组域名，点击右侧的“管理”进入“回调配置”页面

![](https://github.com/jdcloudcom/cn/blob/cn-Live-Video/image/live-video/12%E6%96%B0%E5%BB%BA%E8%BD%AC%E7%A0%81%E9%85%8D%E7%BD%AE.png)

在回调配置页面，按需滑动滑钮打开推流、录制或截图回调

![](https://github.com/jdcloudcom/cn/blob/cn-Live-Video/image/live-video/17%E5%9B%9E%E8%B0%83%E9%85%8D%E7%BD%AE.png)

点击推流或录制回调后的“编辑”按钮填写接收信息的回调地址，点击“确定”完成设置

![](https://github.com/jdcloudcom/cn/blob/cn-Live-Video/image/live-video/18%E5%9B%9E%E8%B0%83%E9%85%8D%E7%BD%AE.png)

## 2.关闭回调

登录直播控制台，进入“域名管理”页面，选择要查看播放地址的一组域名，点击右侧的“管理”进入“基本信息”页面

![](https://github.com/jdcloudcom/cn/blob/cn-Live-Video/image/live-video/12%E6%96%B0%E5%BB%BA%E8%BD%AC%E7%A0%81%E9%85%8D%E7%BD%AE.png)

在回调配置页面，滑动滑钮关闭推流或者录制、截图回调

![](https://github.com/jdcloudcom/cn/blob/cn-Live-Video/image/live-video/19%E5%9B%9E%E8%B0%83%E9%85%8D%E7%BD%AE.png)



## 通知回调信息样例

<table>
    <thead>
    <tr>
        <td>消息类型<br>
        <td>消息体示例</td>
        <td>消息体示例说明</td>
        <td>消息体字段说明</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td rowspan="2">推流回调(流状通知)</td>
        <td>
            {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"version": "v1.1",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"publishDomain": "push.yourdomain.com",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"appName": "live",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"streamName": "350802",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"event": "publish_started",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"status": "success",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"clientIp": "12.11.112.34",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"eventTime": 1566370626345,<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"pushParams": {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"a": "aaa",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"b": "bbb",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"c": "ccc"<br>
            &nbsp;&nbsp;&nbsp;&nbsp;}<br>
            }<br>
        </td>
        <td>
            推流开始消息体<br>
            例如:<br>
            推流地址为:rtmp://push.yourdomain.com/live/350802?a=aaa&b=bbb&c=ccc<br>
            推流到京东云平台时会收到样例所示的消息
        </td>
        <td rowspan="2">
            version:消息体版本号(当前为v1.1)<br>
            publishDomain:推流域名<br>
            appName:应用名称<br>
            streamName:流名称<br>
            event:事件 取值 : [publish_started(推流开始),publish_done(推流结束)]<br>
            status:状态[success]<br>
            clientIp:推流客户端ip<br>
            eventTime:触发时间（毫秒时间戳）<br>
            pushParams:推流参数(推流参数原样以json格式呈现)<br>
        </td>
    </tr>
    <tr>
        <td>
            {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"version": "v1.1",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"publishDomain": "push.yourdomain.com",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"appName": "live",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"streamName": "350802",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"event": "publish_done",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"status": "success",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"eventTime": 1566377826235<br>
            }<br>
        </td>
        <td>
            推流结束消息体<br>
            例如:<br>
            您的推流地址为:rtmp://push.yourdomain.com/live/350802?a=aaa&b=bbb&c=ccc<br>
            停止推流到京东云平台时会收到样例所示的消息<br>
        </td>
    </tr>
    <tr>
        <td rowspan="2">录制回调(录制结果通知)</td>
        <td>
            {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"version": "v1.1",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"publishDomain": "push.yourdomain.com",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"appName": "live",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"streamName": "350802",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"format": "flv",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"duration": 18439,<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"fileSize": 6007851133,<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"beginTime": 1553741853968,<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"endTime": 1553741935867,<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"event": "record_done",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"downloadUrl":
            "http://s3.cn-north-1.jcloudcs.com/video-formal/record/20190319/57/live/62caee8d6c595e9441be/20190319175419_20190319175422.flv",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"status": "success"<br>
            }<br>
        </td>
        <td>
            自动录制完成消息体<br>
            例如:<br>
            您配置了1个小时flv的录制模板到您所推的流上,在1个小时之后生成flv的录制文件之后您会收到如样例所示的消息<br>
        </td>
        <td rowspan="2">
            version:消息体版本号(当前为v1.1)<br>
            publishDomain:推流域名<br>
            appName:应用名称<br>
            streamName:流名称<br>
            event: 事件[record_done]<br>
            status:状态[success]<br>
            format:录制格式<br>
            duration:录制文件时长(毫秒)<br>
            fileSize:文件大小(byte)<br>
            beginTime:录制开始时间（毫秒时间戳）<br>
            endTime:录制结束时间（毫秒时间戳）<br>
            downloadUrl:可下载地址<br>
            group:打点录制时间段数组（打点录制消息体特有）<br>
            taskExternalId:打点录制任务外部id（打点录制消息体特有）<br>
        </td>
    </tr>
    <tr>
        <td>
            {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"version": "v1.1",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"publishDomain": "push.yourdomain.com",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"appName": "live",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"streamName": "350802",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"duration": "18439",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"event": "record_done",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"fileSize": "6007851133",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"format": "flv",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"status": "success",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"group": [<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"beginTime": 1553228747000,<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"endTime": 1553228747100<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;},<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"beginTime": 1553228747200,<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"endTime": 1553228747300<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
            &nbsp;&nbsp;&nbsp;&nbsp;],<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"downloadUrl":
            "http://s3.cn-north-1.jcloudcs.com/video-formal/record/20190319/57/live/62caee8d6c595e9441be/20190319175419_20190319175422.flv",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"taskExternalId": "163594946396839936"<br>
            }<br>
        </td>
        <td>
            打点录制完成消息体<br>
            例如:<br>
            您调用了openapi的接口 <a
                href="https://docs.jdcloud.com/cn/live-video/api/addliverecordtask?content=API">添加打点录制任务</a>
            在录制任务完成之后您会收到如样例所示的消息<br>
        </td>
    </tr>
    <tr>
        <td>截图回调(截图结果通知)</td>
        <td>
            {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"version": "v1.1",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"publishDomain": "push.yourdomain.com",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"appName": "jw",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"streamName": "210235T85E3188001452",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"snapshotTime": 1553826618026,<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"downloadUrl":"http://s3.cn-north-1.jcloudcs.com/jd-video-formal/snapshot/20190328/43/jw/210235T85E3188001452.jpg",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"status": "success",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"imgId": "8f5c8be9016ab658b98e3355336e3635"<br>
            }<br>
        </td>
        <td>
            截图结果消息体<br>
            例如:<br>
            您配置了10s一张的截图模板到您所推的流上面,在生成截图之后您会收到如样例所示的消息<br>
        </td>
        <td>
            version:消息体版本号(当前为v1.1)<br>
            publishDomain:推流域名<br>
            appName:应用名称<br>
            streamName:流名称<br>
            snapshotTime:截图文件生成时间（毫秒时间戳）<br>
            downloadUrl:可下载地址<br>
            status:状态[success]<br>
            imgId:图片id<br>
        </td>
    </tr>
    <tr>
        <td>质量检测回调(检测结果通知)</td>
        <td>
            {
            &nbsp;&nbsp;&nbsp;&nbsp;"publishDomain": "push1-test-yjh.jd.com",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"appName": "mqd-app-test",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"module": "Brightness",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"startTime": 1571301677664,<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"endTime": 1571301684919,<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"type": "video",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"version": "v1.0",<br>
            &nbsp;&nbsp;&nbsp;&nbsp;"streamName": "mqd-stream-test-1"<br>
            }<br>
        </td>
        <td>
            质量检测消息体<br>
            例如:<br>
            您配置(目前仅支持通过openapi配置)了质量检测的模板到您推的流上面,在检测到你所配置的检测项上发现了异常时您会收到如样例所示的消息<br>
        </td>
        <td>
            version:消息体版本号(当前为v1.1)<br>
            publishDomain:推流域名<br>
            appName:应用名称<br>
            streamName:流名称<br>
            module:质检项<br>
            目前只支持的检测项：<br>
            - BlackScreen - 黑屏<br>
            - PureColor - 纯色<br>
            - ColorCast - 偏色<br>
            - FrozenFrame - 静帧<br>
            - Brightness - 亮度<br>
            - Contrast - 对比度<br>
            type：类型 [video]<br>
            startTime:异常开始时间（毫秒时间戳）<br>
            endTime:异常结束时间（毫秒时间戳）<br>
        </td>
    </tr>
    </tbody>
</table>
