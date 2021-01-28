# Real-Time-Communication


## 简介
视音频通信产品相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**createRoom**|POST|创建房间<br>|
|**createUser**|POST|创建用户<br>|
|**deleteRoom**|DELETE|删除房间<br>|
|**describeApp**|GET|查询应用信息<br>|
|**describeAppKey**|GET|查询应用appKey<br>|
|**describeApps**|GET|查询用户应用列表<br>|
|**describeRoomInfo**|GET|查询房间信息<br>|
|**describeRoomOnlineUserNum**|GET|查询房间实时在线人数<br>|
|**describeRooms**|GET|查询应用下的房间列表<br>允许通过条件过滤查询，支持的过滤字段如下：<br>           \- appId[eq] 按应用ID查询<br>|
|**updateRoom**|PUT|修改房间<br>|

