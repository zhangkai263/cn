# 边缘物理计算服务支持如下策略配置

|     接口名称                     |     描述                                    |     允许自定义添加资源        |     支持根据标签授权（指定条件）    |
|----------------------------------|---------------------------------------------|-------------------------------|-------------------------------------|
|     describeConsolePermission    |     查询账号是否有使用边缘物理计算控制台的权限    |     否                        |     否                              |
|     describeIdcs                 |     查询IDC机房列表                         |     否                        |     否                              |
|     describeRooms                |     查询机房房间号列表                      |     可添加机房资源            |     否                              |
|     describeIdcOverview          |     机房资源概览                            |     可添加机房资源            |     否                              |
|     describeCabinets             |     查询机柜列表                            |     可添加机柜资源            |     支持                            |
|     describeCabinet              |     查询机柜详情                            |     可添加机柜资源            |     支持                            |
|     describeDevices              |     查询设备列表                            |     可添加设备资源            |     支持                            |
|     describeDevice               |     查询设备详情                            |     可添加设备资源            |     支持                            |
|     describeIps                  |     查询公网IP列表                          |     可添加公网IP资源          |     支持                            |
|     describeBandwidths           |     查询带宽（出口）列表                    |     可添加带宽（出口）资源    |     支持                            |
|     describeBandwidth            |     查询带宽（出口）详情                    |     可添加带宽（出口）资源    |     支持                            |
|     describeMetrics              |     查询可用监控项列表                      |     否                        |     否                              |
|     describeMetricData           |     查看某资源单个监控项数据                |     可添加带宽（出口）资源    |     否                              |
|     lastDownsample               |     查看某资源的最后一个监控数据点          |     可添加机柜资源            |     否                              |
|     describeBandwidthTraffics    |     查询带宽（出口）流量列表                |     可添加带宽（出口）资源    |     支持                            |
|     describeBandwidthTraffic     |     查询带宽（出口）流量（资源）详情        |     可添加带宽（出口）资源    |     支持                            |
|     describeAlarms               |     查询报警规则列表                        |     可添加报警规则资源        |     支持                            |
|     describeAlarm                |     查询报警规则详情                        |     可添加报警规则资源        |     支持                            |
|     createAlarm                  |     创建报警规则                            |     否                        |     否                              |
|     updateAlarm                  |     修改报警规则                            |     可添加报警规则资源        |     支持                            |
|     switchAlarm                  |     启用、禁用报警                          |     可添加报警规则资源        |     支持                            |
|     deleteAlarm                  |     删除报警规则                            |     可添加报警规则资源        |     支持                            |
|     describeAlarmHistory         |     报警历史列表                            |     否                        |     否                              |
|     createTicket                 |     创建工单                                |     否                        |     否                              |
|     describeTickets              |     查询工单列表                            |     可添加工单资源            |     支持                            |
|     describeTicket               |     查询工单详情                            |     可添加工单资源            |     否                              |
|     queryResourceBill            |     查询资源账单                            |     否                        |     否                              |

