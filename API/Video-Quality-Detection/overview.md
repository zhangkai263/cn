# Video Quality Detection


## 简介
视频质量检测相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**batchDeleteVqdTasks**|POST|批量删除视频质检任务。删除任务时，会同时删除任务相关的数据，如任务执行结果等。一次最多删除50条|
|**batchSubmitVqdTasks**|POST|批量提交视频质检任务，一次同时最多提交50个输入媒体|
|**createVqdTemplate**|POST|创建视频质检模板|
|**deleteVqdTask**|DELETE|删除视频质检任务。删除任务时，会同时删除任务相关的数据，如任务执行结果等|
|**deleteVqdTemplate**|DELETE|删除视频质检模板|
|**getVqdTask**|GET|获取视频质检任务详细信息|
|**getVqdTemplate**|GET|查询视频质检模板|
|**listVqdTasks**|GET|查询视频质检任务列表<br>支持过滤查询：<br>  \- createTime,ge 最早任务创建时间<br>  \- createTime,le 最晚任务创建时间<br>  \- status,in 任务状态<br>|
|**listVqdTemplates**|GET|查询视频质检模板列表。<br>支持过滤查询：<br>  \- templateId,eq 精确匹配模板ID，非必选<br>|
|**queryCallback**|GET|查询回调配置|
|**queryVqdTaskResult**|GET|查询视频质检任务结果|
|**setCallback**|POST|设置回调配置|
|**submitVqdTask**|POST|提交视频质检任务|
|**updateVqdTemplate**|PUT|修改视频质检模板|
