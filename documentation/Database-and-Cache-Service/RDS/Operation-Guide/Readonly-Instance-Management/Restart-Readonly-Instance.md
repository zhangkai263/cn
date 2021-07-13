# 重启只读实例
当云数据库 MySQL/Percona/MariaDB/PostgreSQL 只读实例出现连接数问题或者性能问题的时候，你可以手动重启只读实例，来尝试解决问题。

## 注意事项
* 只有只读实例状态为 **运行** 状态时，可进行重启操作。
* 重启只读实例会造成连接中断，请谨慎操作。

## 操作步骤
从实例列表重启只读实例
1. 登录 [云数据库 RDS 控制台](https://rds-console.jdcloud.com/database)。
2. 选择需要重启的只读实例，点击右侧操作列中 **重启** 按钮，重启只读实例。
![Restart](.../../../../../image/RDS/Restart-Readonly-Instance.png)

从实例详情页重启只读实例

1. 登录 [云数据库 RDS 控制台](https://rds-console.jdcloud.com/database)。
2. 选择需要重启的只读实例，点击实例名称进入只读实例详情页。
3. 点击实例详情页右上角 **操作-重启** 进行只读实例重启。

![Restart](.../../../../../image/RDS/Restart-Readonly-Instance2.png)