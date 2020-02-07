# JDCLOUD 电子签章 API


## 简介
提供电子签章相关信息接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**applyService**|GET|申请开通电子签章服务|
|**deleteContract**|DELETE|删除已签章的合同<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>|
|**deleteStamp**|DELETE|删除印章<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>|
|**deleteTemplate**|DELETE|删除合同模板<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>|
|**describeApplyStatus**|GET|查询服务开通状态|
|**describeContractList**|GET|获取已签章合同列表|
|**describeStampList**|GET|获取印章列表|
|**describeTemplateList**|GET|获取合同模板列表|
|**disableContractSave**|PATCH|禁用合同存管|
|**downloadContract**|GET|下载已签章的合同|
|**downloadStamp**|GET|下载印章|
|**downloadTemplate**|GET|下载合同模板|
|**enableContractSave**|PATCH|启用合同存管|
|**getStatistics**|GET|获取电子签章的数据统计信息|
|**setKmsKeyId**|POST|签章系统加密密钥<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>|
|**signContract**|POST|合同签章四种方式：<br>1. 合同文件 + 印章文件：contractContent + stampContent<br>2. 合同文件 + 印章ID：contractContent + stampId<br>3. 模板ID + 印章文件：templateId + stampContent<br>4. 模板ID + 印章ID：templateId + stampId<br>|
|**uploadStamp**|POST|上传印章|
|**uploadTemplate**|POST|上传合同模板|
|**verifyContract**|POST|验签已签章合同|
