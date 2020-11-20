# 安装Agent

Agent程序是部署在用户终端或目标数据库服务器上的功能插件，用来转发数据库访问流量到审计系统。您需要根据数据库服务器的操作系统类型，选择部署Linux或者Windows版本的Agent，才能使数据库审计服务收集目标数据库的访问流量信息。

## Agent程序的部署位置

根据所添加的数据库类型，您需要将Agent程序部署在以下位置：

- RDS数据库：Agent程序需要部署在与该数据库相连的应用服务器上

  ![云数据库RDS部署](/image/Database-Audit/云数据库RDS部署.png)

- 云主机自建数据库：Agent程序可以部署在数据库所在服务器上，也可以部署在与该数据库相连的Web服务器上。

  ![云主机自建数据库部署](/image/Database-Audit/云主机自建数据库部署.png)

## Agent程序安装

  您可以通过控制台的数据库审计实例详情中的“数据库管理”，下载Agent并进行安装操作。

  ![数据库管理](/image/Database-Audit/数据库管理.png)

  点击**安装Agent**下载安装Agent

  ![安装Agent](/image/Database-Audit/安装Agent.png)