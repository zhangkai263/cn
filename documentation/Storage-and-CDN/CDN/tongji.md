# 查询统计类的接口

## 点播查询字段

**通用说明**

* 带宽的单位为bps，计算方式为： 流量*8/时间
* 流量单位为Byte

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
