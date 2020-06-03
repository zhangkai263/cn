# 京东云es接口


## 简介
es相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**createInstance**|POST|创建一个指定配置的es实例|
|**deleteInstance**|DELETE|删除按配置计费或包年包月已到期的es实例，包年包月未到期不可删除。<br>状态为创建中和变配中的不可删除。<br>|
|**describeInstance**|GET|查询es实例的详细信息|
|**describeInstances**|GET|查询es实例列表|
|**disableDicts**|DELETE|关闭自定义字典。同时清除用户已上传的字典|
|**modifyInstanceSpec**|POST|变更es实例的配置，实例为running状态才可变更配置，每次只能变更一种且不可与原来的相同。<br>实例配置（cpu核数、内存、磁盘容量、节点数量）目前只允许变大<br>|
