# 云主机报警时重启云主机

## 用户需求： ##

当云主机甲的内存超过80%的时候重启云主机甲。

## 前提条件： ##
1. 用户创建了云主机甲
2. 并对华北-北京的云主机甲设置了内存大于80%设置了报警规则

## 场景图 ##

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/CloudEvents/CE-application.jpg)

## 操作流程 ##

1. 选择事件来源类型为**系统事件**

2. 选择事件来源为**云监控**

3. 选择事件类型为**资源监控报警**

4. 事件筛选可为空

5. 订阅对象选择对云主机甲设置了内存大于80%的那条报警规则

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/CloudEvents/bestpractice02.jpg)

6. 目的地选择**云主机重启API**

7. 地域选择**华北-北京**

8. 云主机选择**云主机甲**

9. 点击**确定**，完成事件订阅规则的设置。

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/CloudEvents/bestpractice03.jpg)






