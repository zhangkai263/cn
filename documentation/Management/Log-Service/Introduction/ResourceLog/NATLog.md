## NAT网关日志
### 简介
目前接入日志服务的NAT网关日志类型为NAT连接日志。

### 字段说明

| 序号 | 日志字段    | 字段描述                | 字段类型 | 字段值说明                                                   |
| ---- | ----------- | ----------------------- | -------- | ------------------------------------------------------------ |
| 1    | time        | 日志时间                | time     | 精确到毫秒，eg：2018-12-20T02:59:40.001Z                     |
| 2    | region_id   | 地域                    | string   | eg：cn-north-1                                               |
| 3    | severity    | 日志级别                | int      | eg：0（INFO），1（ERROR）                                    |
| 4    | natgw_name  | nat网关名称             | string   | eg：product-nat                                              |
| 5    | natgw_id    | nat网关id               | string   | eg：natgw-q3jtdskjgdd                                        |
| 6    | vpc_id      | vpc id                  | string   | eg：vpc-q3jtdskjgdd                                          |
| 7    | subnet_id   | 子网id                  | string   | eg：subnet-q3jtdskjgdd                                       |
| 8    | src_ip      | 源IP                    | string   | eg：192.168.10.1                                             |
| 9    | src_port    | 源端口                  | int      | 1-65535，eg：50398                                           |
| 10   | nat_ip      | nat转换后IP             | string   | eg：192.168.10.1                                             |
| 11   | nat_port    | nat转换后端口           | int      | 1-65535，eg：50398                                           |
| 12   | dest_ip     | 目的IP                  | string   | eg：192.168.10.1                                             |
| 13   | dest_port   | 目的端口                | int      | 1-65535，eg：50398                                           |
| 14   | protocol    | IANA protocol number    | int      | eg：6（TCP），17（UDP），1（ICMP）                           |
| 15   | translation | NAT转换方式SNAT or DNAT | int      | eg：0（SNAT），1（DNAT）                                     |
| 16   | conn_status | 连接状态                | int      | eg：0（Created），1（ ActiveClosed ），2（ PassiveClosed），3（Dropped），4（Failover） |
