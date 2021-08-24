# 导出数据

云数据库 MongoDB 提供自动备份与手动备份功能，如需导出数据，您可以下载备份文件后导出到本地数据库。

导出备份时请关注当前备份的备份方式是物理备份还是逻辑备份，两者恢复方式不同。

## 操作步骤
1. 登录 [MongoDB 控制台](https://mongodb-console.jdcloud.com/mongodb)。

2. 在“实例列表”页面，选择目标实例，点击 **实例名称** ，进入“实例详情”页面。

3. 在“实例详情”页面，点击 **备份与恢复** ，查看备份数据。

    ![查看备份](https://github.com/jdcloudcom/cn/blob/master/image/mongodb/mongo-010.png)

4. 选择要下载的备份，在操作项中，点击 **下载** ，打开下载弹窗。

    ![查看备份](https://github.com/jdcloudcom/cn/blob/master/image/mongodb/mongo-009.png)

5. 下载备份文件到本地。

  说明
  - 内网地址和外网地址有效期为24小时；
  - 使用wget下载时需要对URL添加英文引号；
  - 若云主机与云数据库在同一地域，建议您采用内网地址下载；

6. 将备份文件导入到本地数据库。

    - 备份为逻辑备份时，请执行以下命令。

        ```bash
        mongorestore --host xxx --port=27017 --authenticationDatabase admin --archive=xxx(文件路径)  --gzip -u root -p xxx
        ```

    - 备份为物理备份时，请按以下步骤操作。

        1）将备份文件解压到指定路径
        
        ```bash
        tar -C /xxx/data (mongod数据存储路径) -xf /yyy/mongo-xxxx.tar(备份文件下载路径)
        ```
        
        2）单节点模式启动mongod
          执行如下命令在/root/mongo文件夹中新建配置文件mongod.conf：
        
        ```bash
        touch /root/mongo/mongod.conf
        ```
          在命令行中输入vi /root/mongo/mongod.conf打开mongod.conf文件，进行编辑，完成后保存并退出：（WiredTiger存储引擎）
        ```bash
        systemLog:
            destination: file
            path: /home/Logs/mongod.log
            logAppend: true
        security:
            authorization: enabled
        storage:
            dbPath: /home/data
            directoryPerDB: true
        net:
            port: 27017
            unixDomainSocket:
            enabled: false
        processManagement:
            fork: true
            pidFilePath: /home/var/mongod.pid
        ```
          指定新建的配置文件mongod.conf来启动MongoDB:
        ```bash
        mongod -f /root/mongo/mongod.conf
        ```
        
        3）通过mongo shell登录mongo，删除local库
        
        ```bash
        mongo [--options]
        use local
        db.dropDatabase()
        ```
        
        4）以副本集的方式启动当前节点
          在所有节点,修改配置文件：
        ```bash
        bind_ip = ::,0.0.0.0
        port = 27017
        ipv6 = true
        fork = false
        pidfilepath = /home/var/mongod.pid
        logappend = true
        dbpath = /home/data
        logpath = /home/Logs/mongod.log
        maxConns = 500
        replSet = rs0
        keyFile = /home/etc/mongodb.key
        timeStampFormat = iso8601-local
        unixSocketPrefix = /home/var
        auth = true
        wiredTigerCacheSizeGB = 1
        directoryperdb = true
        setParameter = replWriterThreadCount=32
        ```
        在所有节点,分别在后台启动服务:
        ```bash
        mongod --config /var/jmiss_mongo/config/mongod.conf &
        ```
        
        5）通过mongo shell登录mongo，在副本集的一个且仅一个成员上使用rs.initiate()
        
        ```bash
        mongo [--options]
        
        rs.initiate( {
         		 _id : <replName>,
           		members: [ { _id : 0, host : <host:port> } ]
        })
        ```
        
          [rs.initiate()用法](https://docs.mongodb.com/master/reference/method/rs.initiate/#rs.initiate)
        
         6）向副本集中添加新的成员（请确保新添加成员--dbpath目录下数据为空）
        
        ```bash
        rs.add()
        ```
        
          [rs.add()用法](https://docs.mongodb.com/master/reference/method/rs.add/#rs.add)
        
          [MongoDB副本集恢复官方参考文档](https://docs.mongodb.com/master/tutorial/restore-replica-set-from-backup/)



## 相关参考

- [导入数据](Import-Data.md)

