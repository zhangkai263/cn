# 业务应用日志源设置

## 1.概述
业务应用日志是指用户在京东智联云上部署的业务应用所产生的日志。日志内容和日志格式由用户自己定义。

用户无需手动安装日志采集agent，只需要在日志源设置中选择需要采集的云主机，日志采集agent将会自动安装。支持单行和多行的业务应用日志作为日志源。

业务应用日志支持投递至多种类型的目的地，默认采集至日志服务的日志主题中。也可将日志投递至控制台的云ES和云Kafka中，或自建ES和自建Kafka中。

## 2.操作步骤
### 业务应用采集配置
1. 登录日志服务控制台，点击【创建日志配置】，或进入指定日志集内，点击左侧导航栏中的【新建主题】。
2. 完成日志集和日志主题的设置。
3. 点击【下一步】进入【日志源设置】页面。
4. 【日志来源】选择业务应用。
5. 【采集状态】默认打开，用户也可以关闭。关闭后不采集日志。
6. 【日志路径】填写所需采集的业务应用的日志的路径和文件名，路径支持“/* /”或“/* /abd/* /"的通配，不支持“/** /”的通配，文件名支持* 的通配。Linux的文件路径应该以/开头。日志文本的编码为UTF8。
7. 【采集实例】根据用户自身需求选择实例，或者对应的高可用组和标签。
8. 如果用户的业务应用日志是多行日志，则需要设置首行正则匹配的规则；首行正则遵循 **POSIX Extended Regular Express** 正则表达式 ，示例如下：  

日志首行基本上以时间格式开头，如java异常堆栈日志数据
```
2020-07-08 23:58:45.382 [INFO]  xxxxxxxxxxxx
	at xxxxxxxxxxxxxxxxxxx
	at xxxxxxxxxxxxxxxxxxx
	at xxxxxxxxxxxxxxxxxxx
2020-07-08 23:58:55.582 [INFO]  xxxxxxxxxxxx
	at xxxxxxxxxxxxxxxxxxx
	at xxxxxxxxxxxxxxxxxxx
	at xxxxxxxxxxxxxxxxxxx	
```
可以使用正则表达式进行匹配，不支持 ‘\d’ 方式进行数字匹配：  
```
^[[:digit:]]{4}-[[:digit:]]{2}-[[:digit:]]{2}
``` 
预期结果是将以上数据分割成两条日志，每条日志的开头匹配年月日。  
注：正在表达式相关语法可参考：[正则表达式](https://en.wikibooks.org/wiki/Regular_Expressions/POSIX-Extended_Regular_Expressions)


<img src="https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/operationguide/multi-line.jpg" width=80% height=80% />

### 业务应用高级配置
1. 【高级配置】默认关闭。打开高级配置后，可将日志直接从agent端投递至指定ES或Kafka中。
2. 若用户只有投递至ES或Kafka的需求，可以关闭【投递至日志主题中】，就不会在日志服务中存储对应的日志数据。也无法使用日志监控等功能。
3. 若业务应用日志的目的地是Kafka，则需要设定brokers，topic，以及是否压缩投递。压缩投递支持snappy和gzip格式。云Kafka会自动获取brokers。
4. 若业务应用日志的目的地是ES，则需要设定ES访问域名和索引前缀。云ES会自动获取访问域名。

<img src="https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/operationguide/advanceconfig.jpg" width=80% height=80% />

## 3.注意事项
- 当前版本仅支持采集Linux云主机的日志。
- 采集实例用户选择实例维度时，最多支持选择30台云主机，支持跨地域选择。
- 采集实例用户选择高可用组维度时，不受数量限制，高可用组内有多少云主机就采集多少，高可用组内后续新增的云主机的日志也会被采集，支持跨地域多选。
- 采集实例用户选择标签维度时，不受数量限制，标签内有多少云主机就采集多少，没有地域限制，标签内后续新增的云主机的日志也会被采集。
- 若高级配置中设置的目的地为自建ES或自建Kafka，则目的地ES或目的地Kafka前方的地域没有实际意义。

