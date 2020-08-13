# 运行脚本
## 执行脚本
入口：“测试脚本”→"执行" 
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/17.png)
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/18.png)

参数说明：
- 测试名称：脚本名称
- 测试脚本：测试对应jmx文件
- 创建人：脚本创建人
- 创建时间：脚本创建时间
- 用户数：并发用户数量(并发线程数)
- 持续时间（单位：分钟）：在指定时间内循环执行脚本（可按脚本指定时长或次数执行）
- 预设QPS(次/秒)：设置期望的每秒发压请求数量
- 准备时长（单位：秒）：JMeter在多长时间内启动所有线程
- 监控：是否设置被测目标监控
- 区域/IP :  根据实例名称、id、IP地址等信息选择希望监控的目标主机，可以选多个，但只能测试自己账号下购买的云主机
注：QPS发压下，系统会调整发压强度，尽力匹配指定的QPS目标值。但是受测试脚本写法和被测目标响应能力的影响，实际测试中有可能达不到指定的目标值。
另外，如果指定的测试持续时间过短，系统也可能在尝试逼近QPS目标值的过程中，由于运行时间到达而结束整个测试。
如图所示
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/19.png)
## 运行时参数
### JMETER脚本构造（包含运行时参数）
- 添加用户自定义变量（User Defined Variables)
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/20.png)
- 增加用户变量值
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/21.png)
- 脚本中引用定义的“运行时变量”
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/22.png)
### 执行页面编辑运行时变量
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/23.png)
说明：
- 入口：“我的脚本”→"执行"   或  “定时任务管理”→" 创建定时任务"
- 执行脚本时会解析出脚本中定义的用户定义变量，可编辑修改，动态指定此次执行的变量值
## 列表操作说明
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/24.png)
- 更新脚本：编辑当前脚本，新上传脚本覆盖已有脚本
- 执行：执行当前脚本
- 执行历史：具体内容请看“执行历史操作说明”
- 下载脚本：下载已上传脚本内容
- 删除：删除此脚本
- 创建定时：创建脚本执行定时任务
## 执行历史操作说明
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/25.png)
- 查看详情：查看具体执行记录详情信息
- 删除：删除此条执行记录
- 复制链接：复制此条执行记录到浏览器中查看或作文档说明
