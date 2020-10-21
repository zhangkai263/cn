# 连接实例

出于安全考虑，云数据库 MongoDB 默认仅提供内网连接地址，如需要可手动开启公网链接地址。



## 前提条件

- MongoDB 实例状态为运行，且计费状态正常。
- MongoDB 实例与用于连接云主机处于同一个VPC内，且未通过ACL、安全组、白名单等限制两者连通。

## 说明

- 创建MongoDB副本集或分片集群实例时，如果选择的子网支持IPv6，则创建的MongoDB实例默认支持IPv6。
- 使用mongo shell连接ipv6实例时，需显示写明`--ipv6`，使用driver连接时请参照相关说明。

- 支持IPv6的MongoDB副本集实例，可通过IPv4网了的单点连接，不支持IPv4 URI连接。

## 操作步骤

### 副本集实例

1. 获取 MongoDB 副本集的连接信息。

   - 登录 [MongoDB 控制台](https://mongodb-console.jdcloud.com/mongodb)。

   - 在“实例列表”页面，选择目标实例，点击 **实例名称** ，进入“实例详情”页面。

   - 在“实例详情”页面，查看资源信息，获取 MongoDB 实例的连接信息。

      ![查看连接](https://github.com/jdcloudcom/cn/blob/master/image/mongodb/mongo-006.png)

      - 数据库名称，默认为admin 。

      - 用户名称，默认为root 。

      - 副本集名称。

      - 连接地址。

        默认情况下，节点1为Primary， 节点2为Secondary，	如发生自动容灾切换等情况，Primary、Secondary节点可能发生变化。

        客户端请使用Connection String URI连接来保证高可用。

2. 连接 MongoDB 副本集。

   - 使用Mongo shell 连接
     
     mongo shell是MongoDB自带的一种交互式JavaScript shell。您可以使用mongo shell查询和更新数据或执行管理操作。请使用与数据库版本对应的client，否则可能无法鉴权成功。		
     命令样例如下：

     ```
     mongo mongodb://root:****@jmongo-xxx.jmiss.jcloud.com:27017,jmongo-xxx.jmiss.jcloud.com:27017/admin?replicaSet=mgset-xxx
     （****部分替换为root密码）
     ```

     如当前实例支持Ipv6，需使用`--ipv6`指定，命令样式如下：

     ```
     mongo mongodb://root:****@jmongo-xxx.jmiss.jcloud.com:27017,jmongo-xxx.jmiss.jcloud.com:27017/admin?replicaSet=mgset-xxx --ipv6
     ```
     
- 使用Connection String URI连接实例
   
  MongoDB服务可以用传统的传参的方式进行连接，同时大部分的驱动程序也支持URI形式进行连接，MongoDB官方推荐使用URI的方式连接MongoDB服务以保证连接高可用。
   
  命令样式如下：
   
  ```
     mongodb://root:****@jmongo-xxx.jmiss.jcloud.com:27017,jmongo-xxx.jmiss.jcloud.com:27017/admin?replicaSet=mgset-xxx
     （****部分替换为root密码）
     ```

### 分片集群实例

1. 获取MongoDB分片集群的连接地址。

   - 登录 [MongoDB 控制台](https://mongodb-console.jdcloud.com/mongodb)。

   - 在“实例列表”页面，选择目标实例，点击 **实例名称** ，进入“实例详情”页面。

   - 在“实例详情”页面，查看资源信息，获取 MongoDB 实例的连接信息。

      ![image-20200120161354197](../../../../image/mongodb/mongo-053.png)

2. 连接 MongoDB 分片实例。

   - 使用Mongo shell 连接。

     ```
     mongo mongodb://root:****@jmongo-hb1-prod-mongo-xxx.jmiss.jdcloud.com:27017/admin
     ```

     如当前实例支持Ipv6，需使用`--ipv6`指定：

     ```
     mongo mongodb://root:****@jmongo-hb1-prod-mongo-xxx.jmiss.jdcloud.com:27017/admin --ipv6
     ```

   - 使用Connection String URI连接实例
   
     ```
     mongodb://root:****@jmongo-hb1-prod-mongo-xxx1.jmiss.jdcloud.com:27017,jmongo-hb1-prod-mongo-xxx2.jmiss.jdcloud.com:27017/admin
     ```
   
      

## 相关参考

- [问题处理：云主机无法连接 MongoDB 实例](../Troubleshooting/Connect-Failed.md)
- [问题处理：登录数据库提示无权限](../Troubleshooting/Authentication.md)
  	
