
# 函数日志

函数服务通过京东云日志服务提供函数日志，详情请参考[日志服务](https://docs.jdcloud.com/cn/logservice/product-overview)。

## 日志配置

如果您想要查看函数日志，验证函数执行情况。首先，您需开通京东云日志服务，并在日志服务中创建存放函数日志的日志集及日志主题，并添加“所属产品”为“函数服务”的采集配置。

* 若您想在同一个日志集、日志主题中**采集所有函数的日志**，仅需配置采集实例类型为“全部实例“，采集实例类型为“全部实例”的日志集和日志主题将采集用户名下“函数服务“的所有函数日志，包括后续新增的函数也将自动采集，**无需**在函数服务的函数高级配置中进行重复配置。

* 若您想在不同日志集、日志主题中**采集指定函数的日志**，请将采集实例类型配置为“选择实例“选择指定函数，或可通过**在函数高级配置中的日志服务选项，为不同函数配置不同的日志集和日志主题**。

日志服务采集配置方法详情请参考[云产品日志采集](https://docs.jdcloud.com/cn/logservice/cloudresource)和[配置管理](https://docs.jdcloud.com/cn/logservice/collectionconfigmanagement)。

## 日志格式

目前接入日志服务的函数服务日志类型为**函数执行日志**。

### 字段说明
日志字段 | 字段描述 | 字段类型
-- | -- | --
time | 日志记录时间 | time
request_id | 请求id | string
function_name | 函数名称 | string
version | 函数版本 | string
content | 函数输出 | string
message | 函数错误信息 | string
