## 日志数据投递至Elasticsearch

支持将业务应用支持投递至云搜索Elasticsearch和用户自建Elasticsearch中.

**用户选择的云ES需要与选择的采集日志的云主机在同一个VPC网络内。**

### 操作流程

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogCollection/toES.png)

1.在创建业务应用日志配置时，打开高级配置，打开投递至指定目的地，投递目的地类型选择ES。

2.用户根据自身需求选择某个地域下的云ES实例或选择自建ES。若用户选择云ES，则默认获取该ES的访问域名；若用户选择自建ES，则需要填写对应自建ES的访问域名。

3.填写索引前缀后，会按天生成索引，如jdcloud-YYMMDD，YYMMDD代表年月日，若用户不填写，则前缀默认为jdcloud。

4.配置完成后，即可在云ES或自建ES中查看上报的日志数据。
