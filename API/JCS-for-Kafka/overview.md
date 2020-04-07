# 京东云kafka接口


## 简介
kafka相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**createInstance**|POST|创建一个指定配置的kafka实例|
|**deleteInstance**|DELETE|删除按配置计费或包年包月已到期的kafka实例，包年包月未到期不可删除。<br>状态为创建中和变配中的不可删除。<br>|
|**describeInstance**|GET|查询kafka实例的详细信息|
|**describeInstances**|GET|查询kafka实例列表|
|**modifyInstanceSpec**|POST|变更kafka实例的配置，实例为running状态才可变更配置<br>|
