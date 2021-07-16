# Video-on-Demand


## 简介
视频点播相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**batchDeleteVideos**|POST|批量删除视频，调用该接口会同时删除与指定视频相关的所有信息，包括转码任务信息、转码流数据等，同时清除云存储中相关文件资源。|
|**batchSubmitQualityDetectionJobs**|POST|批量提交质检作业|
|**batchSubmitTranscodeJobs**|POST|批量提交转码作业|
|**batchUpdateVideos**|POST|批量修改视频信息|
|**createCategory**|POST|添加分类|
|**createDomain**|POST|添加域名|
|**createImageUploadTask**|POST|获取图片上传地址和凭证|
|**createQualityDetectionTemplate**|POST|创建质检模板|
|**createTranscodeTemplate**|POST|创建转码模板|
|**createTranscodeTemplateGroup**|POST|创建转码模板组|
|**createVeditJob**|POST|创建视频剪辑作业<br>|
|**createVeditProject**|POST|创建视频剪辑工程|
|**createVideoUploadTask**|POST|获取视频上传地址和凭证|
|**createWatermark**|POST|添加水印|
|**deleteCategory**|DELETE|删除分类|
|**deleteDomain**|DELETE|删除域名。执行该操作，需确保域名已被停用。|
|**deleteHeader**|POST|删除域名访问头参数|
|**deleteQualityDetectionTemplate**|DELETE|删除质检模板|
|**deleteTranscodeTemplate**|DELETE|删除转码模板|
|**deleteTranscodeTemplateGroup**|DELETE|删除转码模板组|
|**deleteVeditProject**|DELETE|删除视频剪辑工程|
|**deleteVideo**|DELETE|删除视频，调用该接口会同时删除与指定视频相关的所有信息，包括转码任务信息、转码流数据等，同时清除云存储中相关文件资源。|
|**deleteVideoStreams**|POST|删除视频转码流|
|**deleteWatermark**|DELETE|删除水印|
|**disableDomain**|POST|停用域名|
|**enableDomain**|POST|启用域名|
|**getCategory**|GET|查询分类|
|**getCategoryWithChildren**|GET|查询分类及其子分类，若指定的分类ID为0，则返回一个根分类及其子分类（即一级分类）.|
|**getDomain**|GET|查询域名|
|**getHttpSsl**|GET|查询CDN域名SSL配置|
|**getIPRule**|GET|查询CDN域名IP黑名单规则配置|
|**getQualityDetectionTemplate**|GET|查询质检模板|
|**getRefererRule**|GET|查询CDN域名Referer防盗链规则配置|
|**getTranscodeTemplate**|GET|查询转码模板|
|**getTranscodeTemplateGroup**|GET|查询转码模板组|
|**getURLRule**|GET|查询CDN域名URL鉴权规则配置|
|**getVeditProject**|GET|查询视频剪辑工程详情|
|**getVideo**|GET|查询单个视频信息|
|**getVideoPlayInfo**|GET|获取视频播放信息|
|**getWatermark**|GET|查询水印|
|**listCategories**|GET|查询分类列表。按照分页方式，返回分类列表信息。|
|**listDomains**|GET|查询域名列表|
|**listHeaders**|GET|查询域名访问头参数列表|
|**listQualityDetectionTemplates**|GET|查询质测模板列表。<br>|
|**listTranscodeTemplateGroups**|GET|查询转码模板组列表。<br>|
|**listTranscodeTemplates**|GET|查询转码模板列表。<br>允许通过条件过滤查询，支持的过滤字段如下：<br>  \- source[eq] 按模板来源精确查询<br>  \- templateType[eq] 按模板类型精确查询<br>|
|**listVeditProjects**|GET|查询视频剪辑工程列表。<br>允许通过条件过滤查询，支持的过滤字段如下：<br>  \- projectId[eq] 按照工程ID精确查询<br>|
|**listVideos**|GET|查询视频列表信息。<br>允许通过条件过滤查询，支持的过滤字段如下：<br>  \- status[eq] 按视频状态精确查询<br>  \- categoryId[eq] 按分类ID精确查询<br>  \- videoId[eq] 按视频ID精确查询<br>  \- name[eq] 按视频名称精确查询<br>|
|**listWatermarks**|GET|查询水印列表|
|**refreshVideoUploadTask**|GET|刷新视频上传地址和凭证|
|**setDefaultDomain**|POST|设为默认域名|
|**setHeader**|POST|设置域名访问头参数|
|**setHttpSsl**|POST|设置CDN域名SSL配置|
|**setIPRule**|POST|设置CDN域名IP黑名单规则|
|**setRefererRule**|POST|设置CDN域名Referer防盗链规则|
|**setURLRule**|POST|设置CDN域名URL鉴权规则|
|**submitQualityDetectionJob**|POST|提交质检作业|
|**submitTranscodeJob**|POST|提交转码作业|
|**submitVeditJob**|POST|提交视频剪辑作业|
|**updateCategory**|PUT|修改分类|
|**updateQualityDetectionTemplate**|PUT|修改质检模板|
|**updateTranscodeTemplate**|PUT|修改转码模板|
|**updateVideo**|PUT|修改视频信息|
|**updateWatermark**|PUT|修改水印|
