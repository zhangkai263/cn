# SDK API 简介
SDK对外提供的类及可用接口如下：


1. MqttAndroidClient是一个单例类，可以通过getInstance方法获取到MqttAndroidClient对象
2. 调用startMqtt方法进行mqtt连接，该方法调用一次即可，调用者不用关心重连的逻辑，mqtt内部已经进行相关处理
3. doPublish方法进行消息发布
4. doSubscribe方法进行消息订阅
5. setPort、setBroker、setClientId设置用户自己相应的参数
6. 在sdcCard目录路下创建ssl文件夹， 把相应设备证书push进该目录 （ca.crt、device_id.crt、device_id.key）
