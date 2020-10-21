## 日志数据投递至Kafka

支持将业务应用支持投递至云Kafka和用户自建Kafka中。

**用户选择的云Kafka需要与选择的采集日志的云主机在同一个VPC网络内。**

### 操作流程

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogCollection/toKafka.png)

1.在创建业务应用日志配置时，打开高级配置，打开投递至指定目的地，投递目的地类型选择Kafka。

2.用户根据自身需求选择某个地域下的云Kafka实例或选择自建Kafka。若用户选择自建Kafka，则需要填写对应自建Kafka的brokers。

3.填写需要投递的Kafka topic。

4.选择是否压缩，支持压缩格式为snappy和gzip。

5.配置完成后，即可在云Kafka或自建Kafka中查看上报的日志数据。
