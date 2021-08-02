# Real-Time-Communication


## 简介
视音频通信产品相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**createToken**|POST|生成token-用户加入房间时携带token校验通过后方能加入<br>|
|**describeApp**|GET|查询应用信息:<br>|
|**describeAppKey**|GET|查询应用appKey<br>|
|**describeApps**|GET|查询用户应用列表信息<br>|
|**describeRegisterUser**|GET|查询注册用户<br>|
|**describeRegisterUsers**|GET|查询注册用户列表<br>允许通过条件过滤查询，支持的过滤字段如下：<br>           \- startTime[eq] 用户注册时间段开始时间-UTC时间 startTime,endTime同时有值时生效<br>           \- endTime[eq] 用户注册时间段结束时间-UTC时间 startTime,endTime同时有值时生效<br>|
|**describeRoomUsers**|GET|查询房间内人员列表<br>允许通过条件过滤查询，支持的过滤字段如下：<br>           \- status[eq] 在线状态 1-在线 2-离线<br>           \- startTime[eq] 用户加入时间段开始时间-UTC时间  startTime,endTime同时有值时生效<br>           \- endTime[eq] 用户加入时间段结束时间-UTC时间    startTime,endTime同时有值时生效<br>|
|**describeRoomUsersNum**|GET|统计房间内人数<br>|
|**describeUserRoom**|GET|查询注册房间号<br>|
|**describeUserRooms**|GET|查询注册房间号列表<br>允许通过条件过滤查询，支持的过滤字段如下：<br>           \- startTime[eq] 房间注册时间段开始时间-UTC时间 startTime,endTime同时有值时生效<br>           \- endTime[eq] 房间注册时间段结束时间-UTC时间   startTime,endTime同时有值时生效<br>|
|**postMessageToUser**|POST|发送自定义信令给房间内的人员|
|**postMessageToUserRoom**|POST|发送自定义信令给房间|
|**registerUser**|POST|注册用户-将业务接入方用户体系的userId注册为jrtc系统内可识别和流转的用户id<br>|
|**registerUserRoom**|POST|注册用户房间号-将业务接入方定义的userRoomId注册为jrtc系统内可识别和流转的房间号<br>|
|**removeAllUsersByUserRoomId**|POST|移除房间内所有人员<br>|
|**removeUserByUserRoomId**|POST|移除房间内人员<br>|
|**updateUserRoom**|PUT|修改房间<br>|

