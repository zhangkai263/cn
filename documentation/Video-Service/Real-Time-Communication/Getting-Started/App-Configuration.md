# 应用配置

登录视音频通信控制台，单击左侧菜单栏选择“应用管理”，找到需要配置的应用，点击列表中的“配置”。

![](https://github.com/jdcloudcom/cn/blob/cn-Real-Time-Communication/image/Real-Time-Communicat/RTC-%E5%BA%94%E7%94%A8%E9%85%8D%E7%BD%AE%E5%85%A5%E5%8F%A3.png)

## 回调配置

进入应用配置页面，默认显示回调配置选项卡，点击”更改“即可进行回调配置，目前支持配置房间回调地址和媒体回调地址，JRTC后续将支持更多回调类型。

![](https://github.com/jdcloudcom/cn/blob/cn-Real-Time-Communication/image/Real-Time-Communicat/RTC%E5%BA%94%E7%94%A8%E7%AE%A1%E7%90%86-%E9%85%8D%E7%BD%AE.png)
![](https://github.com/jdcloudcom/cn/blob/cn-Real-Time-Communication/image/Real-Time-Communicat/RTC-%E5%9B%9E%E8%B0%83%E9%85%8D%E7%BD%AE.png)

## 云端录制

云端录制是指通过将用户使用过程中产生的实时音视频进行转码，生成点播文件并存储在云端实现录制及备案，可广泛应用在在金融双录、会议存储、在线医疗等RTC使用场景中。

1.前置条件说明

云端转录功能是对实时音视频服务的扩展，支持将RTC产生的音视频文件录制下来存储到对象存储中。 

· 本功能默认关闭，启用本功能请先开启对象存储服务，存储配置请在存储服务相关页面中进行设置。  

· 启用功能后，会依据为您录制的格式及时长进行收费，详细计费规则请参看计费逻辑。   

· 如需针对录制后的内容进行进一步使用，将依据您的后续场景产生相关费用，如点播加速流量、点播存储服务等，请您关注相关服务的收费说明。    
  
2.控制台开通及配置

1）配置页面中，选择云端录制选项卡，默认状态为未开启

![image](https://user-images.githubusercontent.com/89631429/138041301-555cc121-b1f1-4e31-bd56-98b913082cbd.png)


2）点击 功能开启按钮，进行配置

![image](https://user-images.githubusercontent.com/89631429/138041339-ddc2be30-0ccf-405d-825d-117c838ea820.png)


3）配置项目说明

a)录制方式

· 指定流录制：需要开发者定制开发，通过调用sdk提供的相关API，完成所需录制的音视频流，详细API请参看各平台SDK。  

· 全局自动：无需定制开发，系统将默认将所有的单流进行录制并存储，一键实现音视频备份。  

b)文件格式

支持M3U8格式备份存储。

c)存储位置

首先需要开通对象存储服务并创建存储Bucket，您可通过对象存储配置按钮直接跳转配置存储文件路径。  
配置完成后，下拉菜单会拉取当前账号配置好的云存Bucket（如内容未拉取到，请点击刷新按钮），如下图所示，选择需要存入的Bucket即可。 

详细规则：  
·全局录制存储路径: jrtc/{appId}/{userRoomId}/record/1/{yyyyMMdd}/{userRoomId_userId}.m3u8  
·指定录制存储路径: jrtc/{appId}/{userRoomId}/record/2}/{yyyyMMdd}/{自定义}.m3u8

![image](https://user-images.githubusercontent.com/89631429/138041448-6c7c5f08-f087-47b5-905f-5877a5112be1.png)

d)回调地址

存储落地后，支持消息通知机制，可通过配置回调地址设置消息接收位置。

e)回调秘钥

消息通知机制支持秘钥加密。

3.控制台更改及关闭功能

1）更改配置

已开通状态如下所示，可通过点击更改配置按钮弹出配置窗口进行配置更新。

![image](https://user-images.githubusercontent.com/89631429/138041496-8663ad92-cd29-41a7-b452-b9d5aa927555.png)


2）关闭功能

已开通状态如下所示，可通过点击功能关闭按钮关闭本功能。  
功能关闭将导致业务无法再进行录制，请谨慎操作。

![image](https://user-images.githubusercontent.com/89631429/138041542-5719cf22-7dc0-47a3-91fb-ef3f64edfcf5.png)

## 旁路转推

旁路转推是指为RTC产生的实时音视频流创建数据旁路，适配并推送到视频直播平台，使用视频直播平台转码、截图、视频加速等直播能力。

一般适用于超高并发的观看需求，如大型会议的直播等。虽然使用视频直播系统相较RTC会带来一定的延迟，但可以支撑白万量级以上的受众观看，且价格更便宜。

1.前置条件说明

旁路转推功能是实时音视频服务产品功能的扩展，支持将RTC产生的音视频流转换协议，无缝对接到视频直播平台中。

·本功能默认关闭，启用本功能请先开启视频直播服务

·启用功能后，会依据您的后续场景产生相关费用。如云端录制、CDN加速、转码、截图等，请您关注视频直播服务的收费说明。

2.控制台开通及配置

1）配置页面中，选择旁路转推选项卡，默认状态为未开启

![image](https://user-images.githubusercontent.com/89631429/138047857-20ec6436-50bc-4861-9f2b-5fe16fca9acb.png)


2）点击 功能开启按钮，进行配置

![image](https://user-images.githubusercontent.com/89631429/138047913-4089f08e-4b18-42dc-bee6-50cdca1e7b91.png)


3）配置项目说明

a）推流方式：

· 指定流转推：需要开发者定制开发，通过调用sdk提供的相关API完成音视频流的推送，详细API请参看各平台SDK。   

· 全局自动：无需定制开发，系统将默认将所有的单流进行旁路推送到视频直播平台。

b）推流地址

·域名管理：推流地址无缝打通京东云视频直播平台，可通过域名管理跳转到相关页面进行配置。

·下拉列表：在视频直播平台中配置完成的域名可通过下拉框进行选择，如新配置的域名未出现，可通过更新列表按钮进行更新。
![image](https://user-images.githubusercontent.com/89631429/138051936-a7353e08-9742-47ff-95b4-13b79d5c4953.png)



3.配置变更及功能关闭

1）更改配置:开通状态下，可通过点击更改配置按钮弹出配置窗口进行配置更新。
![image](https://user-images.githubusercontent.com/89631429/138056224-c7175a60-0f28-481c-8016-880840a22353.png)


2）关闭功能：开通状态下，可通过点击功能关闭按钮关闭本功能。      
功能关闭将导致业务流再无法推送，请谨慎操作。
![image](https://user-images.githubusercontent.com/89631429/138056365-be40b9d1-8e88-4bbe-adb7-a6a1ea22cbe4.png)

