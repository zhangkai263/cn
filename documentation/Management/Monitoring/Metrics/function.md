## 函数服务

函数服务获取监控数据的servicecode为function，提供函数、版本和别名三个维度的指标数据。  
- 获取某版本的指标数据时，tags中version需指定具体的版本号。
- 获取某别名的指标数据时，tags中alias需指定具体的别名。  

提供的指标如下：  

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |--- 
function.avergeduration|平均Duration|AvergeDuration|ms|
function.maxmemorysize|最大内存使用|MaxMemorySize|MB|
function.totalinvocations|TotalInvocations|TotalInvocations|次|
function.billableinvocations|BillableInvocations|BillableInvocations|次|
function.throttles|Throttles|Throttles|次|
function.functionerrors|FunctionErrors|FunctionErrors|次|
