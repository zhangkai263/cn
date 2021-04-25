## NAT网关日志
### 简介
目前接入日志服务的NAT网关日志类型为NAT连接日志。

### 字段说明
| 日志字段    | 字段描述                | 字段类型 |
| ----------- | ----------------------- | -------- |
| time        | 日志时间                | time     |
| region_id   | 地域                    | string   |
| severity    | 日志级别                | int      |
| tenant_id   | nat网关租户ID           | string   |
| natgw_name  | nat网关名称             | string   |
| natgw_id    | nat网关id               | string   |
| vpc_id      | vpc id                  | string   |
| subnet_id   | 子网id                  | string   |
| az          | 可用区                  | string   |
| src_ip      | 源IP                    | string   |
| src_port    | 源端口                  | int      |
| nat_ip      | nat转换后IP             | string   |
| nat_port    | nat转换后端口           | int      |
| dest_ip     | 目的IP                  | string   |
| dest_port   | 目的端口                | int      |
| protocol    | IANA protocol number    | int      |
| translation | NAT转换方式SNAT or DNAT | int      |
| endpoint_id | vpc内端点id             | string   |
| port_id     | vpc内port id            | string   |
| conn_status | 连接状态                | int      |