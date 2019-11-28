# 对象存储API


## 简介
对象存储API，主要包含查询Bucket列表，创建Bucket, 删除Bucket，查询Bucket是否存在；镜像回源API，主要包含添加镜像回源配置，获取镜像回源配置和删除镜像回源配置；历史数据同步API，主要包含创建和停止历史数据同步任务、查询同步任务和同步列表。更多API见：https://docs.jdcloud.com/cn/object-storage-service/compatibility-api-overview

注：以下OpenAPI接口不支持IAM子用户访问，如需使用子用户访问，请使用[兼容S3 API](https://docs.jdcloud.com/cn/object-storage-service/compatibility-api-overview)。

### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**deleteBackSourceConfiguration**|DELETE|删除回源配置(ossopenapi)|
|**deleteBucket**|DELETE|删除一个bucket(oss)</br>|
|**getBackSourceConfiguration**|GET|获取回源配置(ossopenapi)|
|**headBucket**|HEAD|查询bucket是否存在(oss)</br>|
|**listBuckets**|GET|列出当前用户的所有bucket(oss)</br>|
|**putBackSourceConfiguration**|PUT|添加修改回源配置(ossopenapi)|
|**putBucket**|PUT|创建bucket(oss)</br>|
|**getSingleBucketCapacity**|POST|根据type获取指定bucket用量数据(ossopenapi)|
|**createHistoricalReplicatTask**|POST|创建历史同步任务|
|**abortHistoricalReplicatTask**|POST|停止bucket名称获取该bucket下的同步任务|
|**getHistoricalReplicatTask**|GET|根据bucket名称获取该bucket下的同步任务|
|**listHistoricalReplicatTasks**|GET|根据bucket名称获取该bucket下的同步任务列表|
