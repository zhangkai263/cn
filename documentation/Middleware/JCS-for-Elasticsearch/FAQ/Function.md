## 功能相关

**1.申请的集群节点磁盘空间会有哪些开销**</br>
占用集群节点磁盘空间的日志及文件如下所示：</br>
- 日志文件：Elasticsearch日志</br>
- 数据文件：Elasticsearch索引文件</br>
- 其他文件：集群配置文件</br>
- 操作系统：默认余留5%的存储空间</br>

**2.云搜索Elasticsearch是否支持logstash对接**
支持Logstash对接，Logstash版本建议与Elasticsearch版本保持一致，且用户需要申请一台云主机来安装Logstash并进行配置。
