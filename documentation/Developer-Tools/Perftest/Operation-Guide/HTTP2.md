
# HTTP2插件支持
## 构造http2采样器
目前构造http2采样器需要基于jmeter, 具体构造过程如下：
### jmeter安装http2插件
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/40.png)
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/41.png)
说明：选择"HTTP/2 sampler", 右下方选择应用并重启jmeter,即可开始http2采样器的构造
### 构造http2采样器
![](https://github.com/jdcloudcom/cn/blob/ccn-perftest-v1/image/Perftest/42.png)
说明：若JDK版本为1.8以上，插件安装完成后即可构造http2 Request，若JDK版本为1.8及以下需要做以下依赖配置
### 相关依赖配置（jdk1.8以下需要做如下配置）
- jdk1.8及以下不支持h2协议，需要依赖alpn-boot.jar
需要注意的是，jdk小版本和alpn-boot.jar的小版本是一一对应的，对应关系可前往该网站查看： 
https://www.eclipse.org/jetty/documentation/9.4.x/alpn-chapter.html
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/43.png)
如笔者的jdk版本为1.8.0_161，对应的alpn-boot的版本是8.1.12.v20180117。
前往   https://mvnrepository.com/artifact/org.mortbay.jetty.alpn/alpn-boot  下载对应版本的jar包保存到本地”apache-jmeter-5.0\lib\ext“目录下。

- 修改jmeter.bat文件执行jvm参数，配置参数值为alpn-boot.jar包所在路径
windows修改jmeter.bat文件，在文件中加入set JVM_ARGS= -Xbootclasspath/p:<path.to.jar>
如：set JVM_ARGS= -Xbootclasspath/p:C:\Users\liqian55\Documents\software\apache-jmeter-5.0\apache-jmeter-5.0\lib\ext\alpn-boot-8.1.12.v20180117.jar
linux/macos 修改jmeter.sh文件，在文件中加入set JVM_ARGS= -Xbootclasspath/p:<path.to.jar>
如：set JVM_ARGS= -Xbootclasspath/p:C:\Users\liqian55\Documents\software\apache-jmeter-5.0\apache-jmeter-5.0\lib\ext\alpn-boot-8.1.12.v20180117.jar
jmeter.bat文件在jmeter应用对应的bin目录下，如笔者所在文件目录为：C:\Users\liqian55\Documents\software\apache-jmeter-5.0\apache-jmeter-5.0\bin
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/44.png)
以编辑方式打开 jmeter.bat文件，加入jvm参数配置
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/45.png)
### 以上配置完成后可构造h2采样器，以 m.jd.com为例
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/46.png)
注意：protocol为https
### 执行，查看结果树，请求成功
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/47.png)
相应数据：
![](https://github.com/jdcloudcom/cn/blob/cn-perftest-v1/image/Perftest/48.png)
另外，需要注意的是，h2是一个异步协议，这意味着client不必等待服务器的响应来继续通信。因此，如果我们想要将断言或后处理器添加到h2请求中，即 处理响应，我们需要选中h2采样器中的复选框Synchronized Request来让jmeter在发送更多请求之前需要等待直到收到响应。



