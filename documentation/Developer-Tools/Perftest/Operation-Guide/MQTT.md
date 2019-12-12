# MQTT插件支持
## 构造MQTT采样器
目前构造mqtt采样器需要基于jmeter, 具体构造过程如下：
### jmeter安装http2插件
下载mqtt-jmeter插件依赖，下载地址：https://github.com/emqx/mqtt-jmeter/releases
将下载的依赖放到 jmeter的 lib/ext目录下，重启后便可创建mqtt采样器
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/51.png)
### 构造mqtt请求
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/52.png)
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/53.png)
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/54.png)
结果分析
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/55.png)
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/56.png)
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/57.png)


