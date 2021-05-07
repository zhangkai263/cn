# 查询统计类的接口

## 点播查询字段

**通用说明**

* 带宽的单位为bps，计算方式为： 流量*8/时间
* 流量单位为Byte
* 换算单位默认1000

| 字段名              | 类型 | 说明                                                         |
| ------------------- | ---- | ------------------------------------------------------------ |
| avgbandwidth        | Long | 平均带宽                                                     |
| maxavgbandwidthtime | Long | 平均带宽峰值时间，该字段不需要手动指定，只要查询bandwidth就会在返回值中自动加上 |
| pv                  | Long | 请求次数                                                     |
| hitpv               | Long | 命中pv                                                       |
| flow                | Long | 流量                                                         |
| hitflow             | Long | 命中流量                                                     |
| codestat            | map  | 状态码统计，记录每种状态码的次数{"200":10, "404":1}          |
| avgoribandwidth     | Long |                                                              |
| oriflow             | Long | 回源流量                                                     |
| oripv               |      |                                                              |
| oricodestat         |      |                                                              |
| uv                  |      |                                                              |
| avgspeed                 |      |                                                              |
|firstpkgtime|Double|首包时间，单位ms|


## 直播查询字段

**通用说明**

* 带宽的单位为bps，计算方式为： 流量*8/时间
* 流量单位为Byte
* 换算单位默认1000

| 字段名              | 类型 | 说明                                                         |
| ------------------- | ---- | ------------------------------------------------------------ |
| avgbandwidth        | Long | 平均带宽                                                     |
| avgupbandwidth        | Long | 上行平均带宽，单位为bit/second，即bps                                                     |
| maxavgbandwidthtime | Long | 平均带宽峰值时间，该字段不需要手动指定，只要查询bandwidth就会在返回值中自动加上 |
| maxavgupbandwidthtime | Long |上行平均带宽峰值时间 |
| pv                  | Long | 请求次数                                                     |
| flow                | Long | 流量                                                         |
| upflow                | Long |上行流量                                                         |
| liveavgspeed        | Long | 下行码率 [liveavgspeed,avgupspeed,avgframerate,avgupframerate]只能在这四个中查，不与其他字段混合            |
| avgupspeed          | Long | 上行码率                                                     |
| avgframerate        | Float| 下行帧率，单位为帧/sec                                                  |
| avgupframerate        | Float| 上行帧率，单位为帧/sec                                                  |
|playercount          | Long|   在线人数          |

### ReqMethod说明


| 取值              | fields | 说明                                                         |
| ------------------- | ---- | ------------------------------------------------------------ |
|publish(推流)        | upflow，avgupbandwidth,maxavgupbandwidthtime,<br>avgupspeed，avgupframerate | 	客户直接往边缘推流时，<br>查询推流域名的上行流量带宽和帧率|
| play(拉流)        | flow，avgbandwidth,maxavgbandwidthtime,<br>liveavgspeed，avgframerate |    用户直接从边缘拉流，<br>查询播放域名的下行流量带宽和帧率                  |
| ingest(回源) | upflow，avgupbandwidth,maxavgupbandwidthtime,<br>avgupspeed，avgupframerate | 查询中转回源第三方客户的流量带宽等 |
| forward(转推) | flow，avgbandwidth,maxavgbandwidthtime,<br>liveavgspeed，avgframerate  |查询我们的中转转推到第三方客户的流量带宽等 |
