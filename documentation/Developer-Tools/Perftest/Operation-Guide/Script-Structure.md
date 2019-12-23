# 脚本构造
## JMETER构造脚本上传到性能测试平台
本地下载安装JMETER，通过JMeter编写和调试自己的脚本。 （请使用最近的JMeter 5.0版本，避免脚本版本不兼容带来的问题。安装使用很简单，网上有大量的教程可参考）
### 脚本配置说明：
1. 添加线程组
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/6.png)
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/7.png)
参数说明：
- Num of threads:线程数，相当于虚拟用户数
- Ramp up period：首次启动所有线程所需的总时间
- Loop count:循环次数
2. 添加HTTP请求
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/8.png)
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/9.png)
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/10.png)
参数说明：
- Name:请求名称
- Server name or ip:被测服务域名或IP
- Path:请求服务
- Port numumber:端口号
- Protocol:协议类型
3. 添加监听器
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/11.png)
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/12.png)
以上就完成了一个简单的JMETER脚本构造，保存生成的 .jmx 文件后上传到到平台构造压测平台脚本。
### 上传构造好的JMETER脚本
1. 添加脚本
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/13.png)
2. 选取脚本文件
 ![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/14.png)
参数说明： 
- 任务名称: 测试（脚本）名称
- 脚本类型（HTTP、JAVA）：目前仅支持HTTP
- 脚本文件：上传对应脚本文件（jmx文件、测试需要的其他CSV文件等请一并上传(支持10M以内的文件上传 )）
3. 上传成功后在脚本列表中会显示对应脚本信息
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/15.png)
操作说明：
- 更新脚本：对已经创建的脚本可以重新上传脚本文件
- 执行：执行已生成脚本
- 执行历史：查看已执行脚本历史记录
- 下载脚本：下载已上传脚本，若上传文件是单个JMS文件则直接下载此文件，若上传为多个文件，下载为ZIP压缩包
- 删除：删除脚本
- 创建定时：针对该脚本创建一个定时任务
## 在线创建脚本
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/16.png)
参数说明：
- 测试名称：测试名称
- 采样器名称：一次请求的名称
- 采样器执行时间间隔（选填）： 两次请求之间的延迟时间（单位：ms）
- 方法：GET/POST 
- 域名： www.baidu.com （对应服务域名或IP）
- 端口(选填)：服务端口（80）  
- 路径(选填)：请求路径  
- BODY(form-data/raw) (选填)：对应接口参数

按钮说明：
- + ： 添加采样器，可以创建多个采样器
- 删除：删除采样器
- 测试 ：调试添加采样器所执行的接口调用
- 保存：填写完成后保存该单个采样器的录制

注意：需要在创建之前点击右上角按钮做测试，通过后才可以创建成功。
