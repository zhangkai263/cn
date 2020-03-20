## 日志数据投递至Kafka

支持将业务应用支持投递至云Kafka和用户自建Kafka中

### 操作流程

1.在创建业务应用日志配置时，打开高级配置，打开投递至指定目的地，投递目的地类型选择Kafka。

2.用户根据自身需求选择某个地域下的云Kafka实例或选择自建Kafka。若用户选择自建Kafka，则需要填写对应自建Kafka的brokers。

3.填写索引前缀后，会按天生成索引，如jdcloud-YYMMDD，YYMMDD代表年月日，若用户不填写，则前缀默认为jdcloud。

4.填写需要投递的Kafka topic。

5.选择是否压缩，支持压缩格式为snappy和gzip。

6.配置完成后，即可在云Kafka或自建Kafka中查看上报的日志数据。
