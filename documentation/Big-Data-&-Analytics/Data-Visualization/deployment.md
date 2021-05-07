---
title: 产品部署手册
order: 4
---


## 莫奈可视化平台介绍

莫奈可视化平台是一个数据可视化系统，包括可视化端、管理端、开放平台三大部分，每个部分包含前后端应用各一个。此外还有操作手册、geojson等静态资源。

## 生产环境推荐配置

| 软件名称  | CPU  | 内存 | 系统盘 | 数据盘 | 磁盘类型 | 操作系统 | 节点 | 部署服务                 | 备注                                          |
| --------- | ---- | ---- | ------ | ------ | -------- | -------- | ---- | ------------------------ | --------------------------------------------- |
| Nginx     | 2    | 4G   | 40G    | 60G    | SAS      | CentOS 7 | 2    | 莫奈各应用前端、静态资源 | 提供负载均衡，流量控制、故障转移              |
| MySQL 5.7 | 4    | 8G   | 40G    | 500G   | SAS      | CentOS 7 | 2    | 莫奈各应用业务数据库     | 业务数据库（HA模式），如果是云环境建议采用RDS |
| JDK 1.8   | 4    | 8G   | 40G    | 500G   | SAS      | CentOS 7 | 2    | 莫奈后端服务             | 提供负载均衡，流量控制、故障转移              |
| JDK 1.8   | 4    | 8G   | 40G    | 60G    | SAS      | CentOS 7 | 2    | 莫奈用户中心服务         | 提供负载均衡，流量控制、故障转移              |
| JDK 1.8   | 4    | 8G   | 40G    | 60G    | SAS      | CentOS 7 | 2    | 莫奈开放平台             | 提供负载均衡，流量控制、故障转移              |
| Redis集群 | 2    | 4G   | 40G    | 60G    | SAS      | CentOS 7 | 3    | Redis集群节点            | 业务缓存数据库                                |

**注意：**

此为莫奈部署的标准配置要求

- 若资源有限或对系统稳定性要求不高，可以进行单节点部署
- 若机器配置较高，可以进行混部
- 若有对象存储，建议使用对象存储

## 各应用部署说明

为方便部署，按前端、后端两大部分来进行说明

### 前端

#### 前端包部署

1.可视化端前端包：上传monet.zip到Nginx服务器，解压,重命名为 monet
2.管理端前端包：上传manage.zip到Nginx服务器，解压,重命名为 manage
3.开放平台前端包：monet-open.zip到Nginx服务器，解压,重命名为 monet-open
4.操作手册包：上传monet-doc.zip到Nginx服务器，解压,重命名为 monet-doc
5.GeoJson包：上传geojson.zip 到Nginx服务器，解压,重命名为 geojson

#### Nginx配置

```
location ^~/monet  {
        root /export/icity/frontend/monet;
        index index.html index.htm;
}
location ^~/monet-doc  {
        alias /export/icity/frontend/monet-doc;
        index index.html index.htm;
}
location ^~/geojson  {
        alias /export/icity/frontend/geojson;
        index index.html index.htm;
}
location ^~/manage  {
        alias /export/icity/frontend/manage;
        index index.html index.htm;
}
location ^~/monet-open  {
		alias /export/icity/frontend/monet-open;
		index index.html index.htm;
}
```



### 后端

#### 可视化端后端

- **依赖项**


> 1. JDK1.8
> 2. 组件及中间件：MySQL、Redis集群
> 3. MySQL数据库：visualdata
> 4. 其他依赖项：Apollo（可无）

- **部署步骤**

> 1. Apollo配置

应用名：VisualData
appId：visualdata
【有Apollo】将部署说明中的apollo_conf/application.properties配置到Apollo中（修改其中数据库、Redis、SSO、日志等）
【无Apollo】则修改jar包中application.properties的apollo.bootstrap.eagerLoad.enabled=false，并将部署说明中的apollo_conf/application.properties内容添加到jar包中的application.properties

> 2. 前期准备

若部署该服务的服务器不能访问外网，则为【纯内网环境】
将鲸盘【团队文件/城市计算平台部署/莫奈私有化部署资源/visualdata】整个文件夹部署到/export/icity/file/下，最终图片所在路径为/export/icity/file/visualdata/

> 3. sql文件

【纯内网环境】
修改初始化sql文件的file表内容（根据用户最终访问外网IP修改）,然后执行如下sql，（2.83.0.23需换为用户最终访问外网IP或域名）

```sql
UPDATE `t_file` SET file_path = REPLACE(file_path,'https://storage.jd.com/visualdata','http://2.83.0.23/visualdata/file/visualdata');
```

> 4. 修改启动脚本的apollo地址
> 5. 新建文件夹

```
/export/icity/visualdata/upload_tmp
/export/logs/ucplogs/visualdata
```

> 6. Nginx配置

```
location ^~/visualdata/ {
	proxy_set_header Host $host;
	proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
	proxy_pass http://127.0.0.1:9091/;
}

proxy_pass 根据实际情况修改
```

> 7. 验证服务进程及端口是否存在


#### 管理端后端

- **依赖项**


> 1. JDK1.8
> 2. 组件及中间件：MySQL、Redis集群
> 3. MySQL数据库：usercenterbridge
> 4. 其他依赖项：Apollo（可无）

- **部署步骤**

> 1. Apollo配置

应用名：UserCenterBridge
appId：usercenterbridge
【有Apollo】将部署说明中的apollo_conf/application.properties配置到Apollo中（修改其中数据库、Redis、SSO、日志等）
【无Apollo】则修改jar包中application.properties的apollo.bootstrap.eagerLoad.enabled=false，并将部署说明中的apollo_conf/application.properties内容添加到jar包中的application.properties

> 2. 修改启动脚本的apollo地址

> 3. sql文件

a).  根据环境所用账号体系，修改t_login_param的login_url和context_path。没有用到的账号体系无需修改
b).  修改t_resource_info的相关绝对路径：usercenterbridge库执行如下sql：（2.83.0.23需换为用户最终访问外网IP或域名，有端口需带端口）

```sql
UPDATE `t_resource_info` SET resource_path = REPLACE(resource_path,'https://cityos-dev.jdcityos.com','http://2.83.0.23');
```

c).  部署完成后且成功登录莫奈后，usercenterbridge库执行如下sql：

```sql
UPDATE t_user SET user_type = 1 WHERE id = 1;
```

> 4. Nginx配置

```
location ^~/usercenterbridge/ {
	proxy_set_header Host $host;
	proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
	proxy_pass http://127.0.0.1:9998/;
}

proxy_pass 根据实际情况修改
```

> 5. 验证服务进程及端口是否存在


#### 开放平台端后端

- **依赖项**


> 1. JDK1.8
> 2. 组件及中间件：MySQL、Redis集群
> 3. MySQL数据库：visualopen
> 4. 其他依赖项：Apollo（可无）

- **部署步骤**

> 1. Apollo配置

应用名：VisualOpen
appId：visualopen
【有Apollo】将部署说明中的apollo_conf/application.properties配置到Apollo中（修改其中数据库、Redis、SSO、日志等）
【无Apollo】则修改jar包中application.properties的apollo.bootstrap.eagerLoad.enabled=false，并将部署说明中的apollo_conf/application.properties内容添加到jar包中的application.properties

> 2. 修改启动脚本的apollo地址

> 3. 新建文件夹

```
/export/icity/visualopen/tempfile
/export/logs/ucplogs/visualopen
```

> 4. Nginx配置

```
location ^~/visualopen/ {
	proxy_set_header Host $host;
	proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
	proxy_pass http://127.0.0.1:9909/;
}

proxy_pass 根据实际情况修改
```

> 5. 验证服务进程及端口是否存在


## 部署验证

**可视化端**

使用如下接口进行验证：
    a) . 服务：{nginxIp}/visualdata/test/
    b) . 数据库：{nginxIp}/visualdata/test/mysql
    c) . Redis：{nginxIp}/visualdata/test/redis

**管理端**

使用如下接口进行验证：
    a) . 服务：{nginxIp}/usercenterbridge/test/
    b) . 数据库：{nginxIp}/usercenterbridge/test/mysql
    c) . Redis：{nginxIp}/usercenterbridge/test/redis

**开放平台**

使用如下接口进行验证：
    a) . 服务：{nginxIp}/visualopen/test/
    b) . 数据库：{nginxIp}/visualopen/test/mysql
    c) . Redis：{nginxIp}/visualopen/test/redis