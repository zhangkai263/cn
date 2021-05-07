# Real-Time-Communication


## 简介
视音频通信产品相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**describeApp**|GET|查询应用信息<br>|
|**describeAppKey**|GET|查询应用appKey<br>|
|**describeApps**|GET|查询用户应用列表<br>|
|**createUser**|POST|创建用户<br>|
|**createRoom**|POST|创建房间<br>|
|**updateRoom**|PUT|修改房间<br>|
|**describeRoomInfo**|GET|查询房间信息<br>|
|**describeRooms**|GET|查询应用下的房间列表<br>允许通过条件过滤查询，支持的过滤字段如下：<br>           \- appId[eq] 按应用ID查询<br>|
|**deleteRoom**|DELETE|删除房间<br>|
|**removeAllRoomUsers**|PUT|移除房间内所有人员<br>|
|**removeRoomUser**|PUT|移除房间内指定人员<br>|
|**sendMessageToRoom**|POST|发送自定义信令消息给房间<br>|
|**sendMessageToUser**|POST|发送自定义信令消息给房间内的人员<br>|
|**describeRoomOnlineUserNum**|GET|查询房间实时在线人数<br>|

