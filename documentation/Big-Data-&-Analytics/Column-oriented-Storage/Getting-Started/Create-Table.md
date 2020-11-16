# 创建表

本文介绍通过云数据库 JDNoSQL控制台创建表。

## 前提条件

- 已完成集群创建，NameSpace创建。

## 操作步骤

1.	登录 [云数据库 JDNoSQL控制台]，在集群列表页面，点击选中HBase集群，进入当前集群管理界面，在此界面选择表管理页签，进入表管理。

2.	在表管理界面，点击“+新建”，选择所属表空间，填写对应表单后提交申请，申请完成后新建的表会出现在表管理的列表。

## 预分区建表使用说明
1.  规则选择：FixNum  预分区内容填写startey 和 endKey 以及分区个数，以空格分开， 例如 ： 1 9 10 
2.  规则选择：HexStringSplit，UniformSplit，HexKeyPoint 预分区内容填写分区个数，分区个数至少大于2，例如 10
3.  规则选择：KeyPoint 预分区内容填写的是分区前缀，以空格分开 如 a b c d e f 或者 1 2 3 4 5 6 7 8 9

## 相关参考

- [Rowkey设计指导](../Develop-Guide/RowkeyDesign.md)
