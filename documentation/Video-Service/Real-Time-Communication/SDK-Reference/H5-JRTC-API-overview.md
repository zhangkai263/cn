# H5 JRTC API接口说明
import JRTCClient from '../lib/jrtc.min.js'

## 1.JRTCClient 

## init(JRTCInitParams)

const JWebrtc = JRTCClient.init(JRTCInitParams:{ appId: string })
参数：initParam <br/>
返回:  JRTCClient实例 <br/>
JRTCInitParams:  <br/>

| 参数     |  类型   |   说明 |
| -------- | :------- | -------: |
| appId | string | appId |

### getPeerId()

JWebrtc.getPeerId(userInfo: UserInfo) <br/>
参数： UserInfo <br/>
说明：获取peerId， 返回用户 {peerId} <br/>
注：后期废弃<br/>

| 参数     |  说明   |   是否必填 |
| -------- | :------- | -------: |
| userId | userId | Y |
| userName | userName | N |
| temporary | 是否是临时用户 | Y |

### setVideoEncodingParam()

JWebrtc.setVideoEncodingParam(resolution: string) <br/>
设置分辨率 <br/>
参数： resolution <br/>

| 参数     |  说明   |   是否必填 |
| -------- | :------- | -------: |
| resolution | resolution nhd(640*360)、hd(1280*720)、fhd(1920*1080) | Y |
### setAudioCodecOptions()

JWebrtc.setSudioCodecOptions(isStereo: Boolean) <br/>
参数： isStereo 是否开启立体声：true开启，false关闭<br/>
返回：无

### getVideoTrack()

JWebrtc.getVideoTrack()<br/>
参数： 无<br/>
说明：获取视频track<br/>
返回：videoTrack

### getAudioTrack()

JWebrtc.getAudioTrack()<br/>
参数： 无<br/>
说明：获取音频track<br/>
返回：audioTrack<br/>

### getScreenTrack()

JWebrtc.getScreenTrack()<br/>
说明： 获取屏幕共享track<br/>
参数： 无<br/>
返回：screenTrack

### createRoom()

JWebrtc.createRoom(roomInfo: RoomInfo)<br/>
说明：创建房间<br/>
返回：roomId

| 参数     |  类型   |   是否必填 |
| -------- | :------- | -------: |
| roomName | string | N |
| peerId | string | Y |
| templateId | number | Y |
| limitPeople | int | Y |
| expireModeId | int | Y |
| expireTime | date: 过期类型为: 设定某个时间过期, expireTime必填 | Y |

### enterRoom()

JWebrtc.enterRoom(enterRoomInfo)<br/>
说明：进入房间成功, 会返回一个ROOM对象: JRTCRoom,<br/>
参数：enterRoomInfo Object如下

| 参数     | 类型     |  是否必填   |   说明 |
| -------- | :------- | -------: |-------: |
| appId | string | Y | 应用ID，控制台获取 |
| token | string | Y | 用户生成token，生成方式参见XXXX取 |
| userId | string or number | Y | 用户Id |
| nonce | string | Y | 令牌随机码，用户生成 |
| timeStamp | string | Y | 令牌过期时间，用户生成 |
| roomId | number | Y | roomId |
| peerId | string | Y | peerId |
| nickname | string | N | nickname |
| subscribeType | string | N | 大房间模式下，音频订阅模式： 1 固定订阅 2 普通订阅 。 默认为 1 |
### exitRoom()

JWebrtc.exitRoom(roomId: string, peerId: string)<br/>
说明：退出房间<br/>
参数： roomId、peerId<br/>
返回：无

### initBroadcast()

JWebrtc.initBroadcast(initBroadcastParams:{ appId: string, token: string, peerId: string | number, userName: string})<br/>
说明：消息大厅初始化，初始化成功后, 会返回一个Msg对象: JRTCMsg,<br/>
initBroadcastParams: 

| 参数     | 类型     |  是否必填   |   说明 |
| -------- | :------- | -------: |-------: |
| appId | string | Y | 应用ID，控制台获取 |
| token | string | Y | 用户生成token，生成方式参见XXXX取 |
| peerId | string | Y | peerId |
| userName | string | Y | 用户昵称 |

### 错误监听

JWebrtc.on('onError', (err) => {})<br/>
说明：错误事件，返回 { errorCode: XXX, message: XXXX}<br/>
错误信息参考：

| 类型     | errorCode     |  message   |   说明 |
| -------- | :------- | -------: |-------: |
| 鉴权错误 | 12000 | 'Authentication failure.' | 鉴权错误 |
| 网络错误 | 11000 |network_error | 网络已断开 |
| 音频错误 | 10001 | audio device not found | 未找到音频设备 |
|  |10003 | audio device not allowed |浏览器禁用音频设备|
| | 10005 | audio device not readable | 系统禁用音频设备 |
|视频错误| 10002| video device not found | 未找到视频设备|
|| 10004| video device not allowed |浏览器禁用视频设备|
|| 10006| video device not readable |系统禁用视频设备|
|屏幕共享| 10010 | "unknown screenshare error" |屏幕共享未知错误|
||10011| |screenshare not allowed| 屏幕共享被禁用|
||10012| screenshare ended |屏幕共享已取消|
|连接错误| 10030 | io server disconnect |服务断开|
||10031| io client disconnect| 客户端断开|
||10032| ping timeout |客户端连接超时|
||10033| transport close |连接关闭|
||10034| transport error |连接错误|
|其它错误| 10007| "constraints " + e.constraint + " error" OverConstrainedError|无法满足要求错误|
||1e4| e.message : "device unknown error"| 未知错误|
## 2.JRTCRoom
initBroadcast
调用JWebrtc.enterRoom 进入房间成功, 会返回一个ROOM对象: JRTCRoom,<br/>
1. 可通过JRTCRoom来进行房间内操作<br/>
2. 可直接通过调用JRTCRoom = await 也可在加入房间成功后，<br/>调用JRTCRoom = JWebrtc.JWebrtc.getRoomObj() 来获取enterRoom(XXXX)加入房间成功后的返回值来获取

### publishVideoStream()

const { track, streamId } = await JRTCRoom.publishVideoStream(videoTrack)<br/>
说明：发布视频流<br/>
参数： videoTrack<br/>
返回：track及streamId

### publishAudioStream()

const { track, streamId } = await JRTCRoom.publishAudioStream(audioTrack)<br/>
说明：发布音频<br/>
参数： audioTrack<br/>
返回：track及streamId

### unPublishStream()

JRTCRoom.unPublishStream(streamId)<br/>
说明：取消发布<br/>
参数： streamId<br/>
返回：无

### subscribeStreams()


JRTCRoom.subscribeStreams(streamIds: string[])<br/>
说明：订阅流，订阅成功如果产生新的消费者需手动监听streamSubscribed<br/>
参数： streamIds: string[]<br/>
返回：无<br/>
监听：streamSubscribed，返回peerInfo, peerInfo信息如下<br/>
JRTCRoom.on('StreamSubscribed', ({ streamInfo}) => {
 console.log(stream}) Info)

| 参数     |  说明   |
| -------- | :------- |
| peerId | 用户Id |
| nickName | 昵称 |
| audioTrack | audioTrack |
| videoTrack | videoTrack |

### unSubscribeStreams()

JRTCRoom.unSubscribeStreams(streamIds: string[])<br/>
说明：取消订阅<br/>
参数： streamIds: string[]<br/>
返回：无

### pausePublish()

JRTCRoom.pausePublish(streamId)<br/>
说明：暂停发布<br/>
参数： streamId<br/>
返回：无

### resumePublish()

JRTCRoom.resumePublish(streamId)<br/>
说明：恢复发布<br/>
参数： streamId<br/>
返回：无

### pauseSubscribe()

JRTCRoom.pauseSubscribe(streamId)<br/>
说明：暂停订阅<br/>
参数： streamId<br/>
返回：无

### resumeSubscribe()

JRTCRoom.resumeSubscribe(streamId)<br/>
说明：恢复订阅<br/>
参数： streamId<br/>
返回：无


### sendMessage()

JRTCRoom.sendMessaage({msg: string, peerId?: string})<br/>
说明：发送消息，可发送给指定人，可发送消息到房间<br/>
参数：msg: 消息体， peerId: 指定peerId<br/>
返回：无

### changeNickName()

JRTCRoom.changeNickName(nickName: string)<br/>
说明：修改昵称<br/>
参数： nickName<br/>
返回：无<br/>
监听：NickNameUpdate, <br/>
返回  {roomId: string, peerId: string, nickName: string}

### enableStreamStat()

JRTCRoom.enableStreamStat(isStat, intervalSec)<br/>
说明： 监控接口<br/>
参数：

| 参数     |  说明   |   类型   |
| -------- | :------- |:------- |
| isStat | 是否开启监控 | boolean |
| interValSec | 几秒获取一次监控信息 | number |

返回：{ JRTCNetStats, JRTCLocalStreamStats, JRTCRemoteStreamStats }

| 参数     |  说明   |   类型   |
| -------- | :------- |:------- |
| JRTCNetStats | 基本信息 | ```{localIp：XX，serverIp： XX}``` |
| JRTCLocalStreamStats | 本地流信息 | ```{peerId: XX,streamId: XX,kind: XX,rtt: XX,netLoss: XX,frameWidth: XX,frameHeight: XX,fps: XX}``` |
| JRTCRemoteStreamStats  | 远端流信息 | ``` { peerId: XX,streamId: XX,kind: XX,jitterBufferDelay: XX,netLoss: XX,jitterBufferDelay: XX,netLoss: XX,frameWidth: XX,frameHeight: XX,fps: XX}```|

### getFixedAudioConsumers()

JRTCRoom.getFixedAudioConsumers()<br/>
说明：如果房间为大房间，可获取大房间固定音频， 可自行订阅<br/>
参数： 无<br/>
返回：fixedAudioConsumerList<br/>
fixedAudioConsumerList：<br/>

| 参数     |  说明   |
| -------- | :------- |
| streamId | 流ID |
| kind | 媒体类型 |
| track | 音频track |

### 会控相关接口

#### removePeer

JRTCRoom.removePeer(targetPeerId, appData)<br/>
说明：移除指定用户<br/>
参数说明：<br/>

| 参数     |  类型   |   是否必须   |  说明 |
| -------- | :------- |:------- |:------- |
|targetPeerId| string| Y |移除目标用户ID|
|appData| Object| N, 默认为 {} |自定义参数|

#### muteAudio

JRTCRoom.muteAudio({targetPeerId, appData})<br/>
说明：广播 房间内全局静音/指定用户静音<br/>
参数说明：<br/>

| 参数     |  类型   |   是否必须   |  说明 |
| -------- | :------- |:------- |:------- |
|targetPeerId| string| N| 目标用户ID，如果传入targetPeerId则为指定用户操作，不传则是对房间全局操作|
|appData| Object| N ,默认为 {} |自定义参数|

#### closeVideo

JRTCRoom.closeVideo()<br/>

##### 说明：广播 房间内全局关闭视频/关闭指定用户视频<br/>

参数说明：同muteAudio<br/>

#### forbidChat

JRTCRoom.forbidChat(appData)<br/>
说明：广播房间禁言<br/>
参数说明：<br/>

| 参数     |  类型   |   是否必须   |  说明 |
| -------- | :------- |:------- |:------- |
|appData| Object| N ,默认为 {} |自定义参数|
#### unForbidChat

JRTCRoom.unForbidChat()<br/>
说明：广播房间解除禁言<br/>
参数：同forbidChat<br/>

#### customSignal

JRTCRoom.customSignal()<br/>
说明：广播用户自定义信令<br/>
参数说明：

| 参数     |  类型   |   是否必须   |  说明 |
| -------- | :------- |:------- |:------- |
|eventName| string| Y| 自定义信令名称|
|targetPeerId| string| N |目标用户ID|
|appData| Object| N ,默认为 {} | 自定义参数|

### JRTCRoom房间内消息监听

#### UserJoinedRoom
```js
JRTCRoom.on('UserJoinRoom', (data: {peerId:  string, nickName: string}) => {})
```
说明：加入房间

#### UserLeavedRoom
```js
JRTCRoom.on('UserLeaveRoom', (data: {peerId:  string, nickName: string}) => {})
```
说明：离开房间

#### NickNameUpdated
```js
JRTCRoom.on('NickNameUpdate', (data: {roomId: string, peerId:  string, nickName: string}) => {})
```
说明：用户修改昵称

#### MessageRecived
```js
JRTCRoom.on('MessageRecived', (data: {peerId: string, nickName: string, msg: string}) => {})
```
说明：有成员发送消息时

| 参数     |  说明   |
| -------- | :------- |
|peerId| 发送者id| 
|nickName| 发送者昵称|
|msg|消息体|

#### StreamPublished
```js
JRTCRoom.on('StreamPublished', (streamsInfo: streamInfo[]) => {
let streamIds = streamInfos.map(streamInfo => streamInfo.streamId);
      console.log('StreamPublished', streamIds)
      JRTCRoom.subscribeStreams(streamIds) // 可选择订阅
    })
```
说明：有新流发布<br/>
streamsInfo:,已发布流数组 streamInfo[]: streamInfo信息如下:

| 参数     |  说明   |
| -------- | :------- |
|peerId| 用户Id| 
|streamId| 流ID|
|kind|流类型|
|streamName|流名称|
#### StreamUnpublished
```js
JRTCRoom.on('StreamUnpublished', (streamInfo: StreamInfo) => {
      console.log('StreamUnpulished', streamInfo) // 返回取消发布的流信息
    })
```
说明：当有成员取消音频或视频发布时<br/>
StreamInfo: 

| 参数     |  说明   |
| -------- | :------- |
|peerId| 用户Id| 
|streamId| 流ID|
|kind|流类型|
#### StreamPaused
```js
JRTCRoom.on('StreamPaused', (streamInfo: StreamInfo) => {
      console.log('StreamPaused', streamInfo) // // 返回目标消费信息
    })
```
说明：当有成员暂停音频或视频发布时，返回StreamInfo信息如下<br/>

| 参数     |  说明   |
| -------- | :------- |
| roomId | 房间ID |
|peerId| 暂停流发布的用户Id| 
|streamId| 流ID|
|kind|流类型|

#### StreamResumed
```js
JRTCRoom.on('StreamResumed', (streamInfo: StreamInfo) => {
      console.log('StreamResumed', streamInfo) // 返回目标消费信息
    })
```
说明：当有成员恢复音频或视频发布时，返回StreamInfo信息如下<br/>
##### 参数 说明
| 参数     |  说明   |
| -------- | :------- |
| roomId | 房间ID |
|peerId| 恢复流发布的用户Id| 
|streamId| 流ID|
|kind|流类型|

#### 会控相关监听

#### UserRemoved
```js
JRTCRoom.on('UserRemoved', (data: {peerId:  string, nickName: string}) => {})
```
说明：某个用户被移出房间

#### AudioMuted
```js
JRTCRoom.on('AudioMuted', (data: {peerId:  string, nickName: string}) => {})

```
说明：某个用户被静音

#### RoomAudioMuted
```js
JRTCRoom.on('RoomAudioMuted', (data: {peerId:  string, nickName: string}) => {})
```
说明：房间被静音

#### VideoClosed
```js
JRTCRoom.on('VideoClosed', (data: {peerId:  string, nickName: string}) => {})
```
说明：某个用户视频被关闭

#### RoomVideoClosed
```js
JRTCRoom.on('RoomVideoClosed', (data: {peerId:  string, nickName: string}) => {})
```
说明：房间被关闭所有视频

#### RoomChatForbidden
```js
JRTCRoom.on('RoomChatForbidden', (data: {peerId:  string, nickName: string}) => {})
```
说明：房间禁止所有文字聊天

#### RoomChatUnForbidden
```js
JRTCRoom.on('RoomChatForbiddenlosed', (data: {peerId:  string, nickName: string}) => {})
```
说明：房间取消禁言

#### SignalCustom
```js
JRTCRoom.on('RoomChatForbiddenlosed', (data: {peerId:  string, nickName: string, eventName}) => {})
说明：用户自定义信令
```
## 3. JRTCMsg

1. 如若开启消息大厅模式：通过JRTCMsg对象来发送和监听大厅消息<br/>
2. 消息大厅初始化成功后, 会返回一个Msg实例: 也可在initBroadcast成功后通过调用<br/>
JRTCMsg = JWebrtc.getMsgObj() 来获取JRTCMsg对象JRTCMsg

### sendMessage()

JRTCMsg.sendMessage({msg: string, peerId?: string})<br/>
说明：发送消息，可发送给指定人，可发送广播消息<br/>
参数：msg: 消息内容， peerId: 指定peerId<br/>
返回：无<br/>

### JRTCMsg消息大厅消息监听

#### BroadcastMessageRecived
```js
JRTCMsg .on('BroadcastMessageRecived', (data) => {})

data: {requestId: XXXXX, peerId: string, data: string}
```

| 参数     |  说明   |
| -------- | :------- |
|requestId| requestId|
|peerId| 发送者ID|
|data| 消息内容| 

说明：收到大厅消息，广播消息或单聊消息

