# 单行文本
## 概述
单行文本日志是指单条日志仅包含一行日志数据的日志形式。每条日志以换行符作为结束的标志。日志服务在采集单行日志时，将会统一存储成键为content，值为日志内容。不会再对日志内容进行键值提取。日志时间为采集时间。

## 日志预处理
### 前置条件
1. 已创建日志集日志主题。
2. 日志源选择了业务应用日志，并完成了日志源的设置。
3. 进入日志预处理步骤。

### 操作步骤
默认选择单行文本日志，无需配置，点击“下一步”即可完成。

<img src="https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/operationguide/singleline.jpg" width=60% height=60% />
