## 自动任务策略日志
### 简介
目前接入日志服务的日志类型为自动镜像执行日志。

### 字段说明
#### 自动镜像执行日志
| 序号 | 字段名称 | 字段描述 | 字段类型 |
| --- | --- | --- | --- | 
| 1 | region  | 地域| string |
| 2 | policyId | 策略ID | string |
| 3 | policyType | 策略类型 | string |
| 4 | startTime | 开始执行时间 | string |
| 5 | execVmNum | 执行虚机数量 | int |
| 6 | taskState | 任务状态 | string |
| 7 | endTime | 执行结束时间 | string |
