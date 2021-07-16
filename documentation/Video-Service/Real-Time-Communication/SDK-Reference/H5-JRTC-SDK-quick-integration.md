#  H5 JRTC SDK快速集成

## JRTC简介
JRTC的基本功能包含创建实例、加入房间、本地发布、订阅远端和离开房间等。当您成功创建实例，您可以进行本地预览视频功能，进行简单的预览和测试。

## 前提条件
在执行Demo步骤之前，您需要从控制台获取鉴权信息，具体操作请参见[生成Token](https://docs.jdcloud.com/cn/real-time-communication/sdk/generate-user-token)。
您需要下载示例代码，详情请参见[SDK下载](https://docs.jdcloud.com/cn/real-time-communication/sdk/sdk-download)。

## 操作步骤
1.集成SDK。
  > JRTC SDK存放于demo中src/lib文件夹内，可根据自身项目构建需求，调整JRTC SDK存放位置。
  ```js
  import JRTCClient from '../lib/jrtc.min.js'
  ``` 

2.初始化SDK。
  ```js
  const JWebrtc = JRTCClient.init({ appId })
  ```
  > **说明** appId 为应用ID，从控制台获取
  

  
3.加入房间。进入房间成功, 会返回一个ROOM对象: JRTCRoom。
   ```js
   JWebrtc.enterRoom({ 
         appId,           // 应用ID，从控制台获取
         token,           // 用户生成token，生成方式参见XXXX取
         userId,          // 用户ID
         nonce,           // 令牌随机码，用户生成
         timestamp,       // 令牌过期时间，用户生成
         roomId,          // 房间ID
         peerId,          // 会议平台的用户ID
         nickName,        // 昵称
         subscribeType    // 大房间模式下，音频订阅模式：1.固定订阅 2.普通订阅。 默认为 1
   }).then((res) => {
      // 成功加入会议
   }).catch((err) => {
      // 加入会议失败，打印错误日志，可以查看失败原因    
      console.log(err);
   });
   ```

4.发布或取消发布音、视频流。
  * 发布音频流。通过getAudioTrack方法获取音频轨道后，使用publishAudioStream方法可以发布音频流。
  ```js
  JWebrtc.getAudioTrack()  // 该方法返回 audioTrack
      .then((track) => {
        JRTCRoom.publishAudioStream(track).then(
          ({ track, streamId }) => {
            // 音频流发布成功
          }
        );
      })
      .catch((err) => {
        // 音频流发布失败， 打印错误日志，可以查看失败原因   
        console.log(err);
      });
  ```

  * 发布视频流。通过getVideoTrack方法获取视频轨道后，使用publishVideoStream方法可以发布视频流。
  ```js
  JWebrtc.getVideoTrack()    // 该方法返回 videoTrack
      .then((track) => {
        JRTCRoom.publishVideoStream(track).then(
          ({ track, streamId }) => {
            // 视频流发布成功
          }
        );
      })
      .catch((err) => {
        // 视频流发布失败， 打印错误日志，可以查看失败原因
        console.log(err);
      });
  ```

  * 取消发布音、视频流。
  ```js
  JRTCRoom.unPublishStream(streamId);   // streamId - 流ID
  ```

5.发布StreamPublished回调或StreamUnpublished回调。
  * 发布StreamPublished回调。当有用户发布新的音、视频流时，在SDK里会触发StreamPublished回调，通过订阅这个回调，能够得到房间里已经发布新流的用户。
  ```js
  JRTCRoom.on("StreamPublished", (streamInfos) => {
      // 当有新流发布时，可获取streamInfos
      console.log(streamInfos)
  });
  ```

streamInfos 信息如下表所示：
  
  | 参数     |  说明   |
| -------- | :------- |
| peerId | 用户Id |
| nickName | 昵称 |
| kind | 流类型 |
| streamName | 流名称 |

  * 发布StreamUnpublished回调。当有用户取消音频或视频发布时，会触发这个回调。
  ```js
  JRTCRoom.on("StreamUnpublished", (peerInfo) => {
    // 返回取消发布的流信息
    console.log(peerInfo);
  });
  ```

peerInfo 信息如下表所示：
  
  | 参数     |  说明   |
| -------- | :------- |
| peerId | 用户Id |
| nickName | 昵称 |
| kind | 流类型 |

  > **说明** StreamPublished、StreamUnpublished回调只有加入房间以后才会触发。

6.订阅或取消订阅流。
  * 订阅流。通过subscribeStreams方法可以订阅流，订阅成功如果产生新的消费者，需手动监听streamSubscribed。
  ```js
  JRTCRoom.subscribeStreams(streamIds);   // 订阅流，streamIds - 流ID Array
  ```
  > 手动监听 streamSubscribed，返回peerInfo。
  > ```js
  > JRTCRoom.on("StreamSubscribed", ({ peerInfo }) => {
  >    console.log("StreamSubscribed", peerInfo);
  > })
  > ```
  
  peerInfo 信息如下表所示：
  
  | 参数     |  说明   |
| -------- | :------- |
| peerId | 用户Id |
| nickName | 昵称 |
| audioTrack | 音频轨道 |
| videoTrack | 视频轨道 |

  * 取消订阅。通过unSubscribeStreams方法可以取消订阅流。
  ```js
  JRTCRoom.unSubscribeStreams(streamIds);  // 取消订阅流，streamIds - 流ID Array
  ```

7.退出房间。
  ```js
  JWebrtc.exitRoom()
      .then(() => {
        // 退出房间成功
        JWebrtc.disconnectAll();  // 断开通信连接，销毁房间
        JWebrtc = null;           // 全局变量 JWebrtc 设置为null
      })
  ```

您可以下载示例代码，快速跑通Demo，实现频道内和其他人进行实时音视频通话，详情请参见[SDK 下载](https://docs.jdcloud.com/cn/real-time-communication/sdk/sdk-download)。
接口方法详情请参见H5 JRTC API接口说明。



