# 最佳实践-敏感数据加密保护

## 购买MySQL数据库

在[京东云控制台](https://rds-console.jdcloud.com/rds/database)购买MySQL数据库，并新建库(school)/账号(user)。

![](/image/Data-Centric-Audit-and-Protection/bestpractices-createdatabase.png)

建表语句：
```sql
CREATE TABLE `school`.`student` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(64) DEFAULT NULL COMMENT '姓名',
  `s_birth` datetime DEFAULT NULL COMMENT '出生日期',
  `s_addr` varchar(255) DEFAULT NULL COMMENT '地址',
  `s_phone` varchar(64) DEFAULT NULL COMMENT '手机号',
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
```

查看当前表信息：

![](/image/Data-Centric-Audit-and-Protection/bestpractices-showtable.png)

## 数据安全中心

### 开通服务
在京东云控制台开通[数据安全中心服务](https://dcap-console.jdcloud.com)，及[密钥管理服务](https://kms-console.jdcloud.com)。

![](/image/Data-Centric-Audit-and-Protection/bestpractices-applyservice.png)


### 配置数据源

在控制台 [敏感数据资产](https://dcap-console.jdcloud.com/sdm/dataAssets)页面添加数据源，并点击下一步。

![](/image/Data-Centric-Audit-and-Protection/bestpractices-createdatasource.png)


配置数据源的名称，并选择相应的密钥，如果没有密钥的话则通过 [新建密钥](https://kms-console.jdcloud.com)创建一个新的密钥。 然后使用"自动生成"方式生成数据密钥。

![](/image/Data-Centric-Audit-and-Protection/bestpractices-setdatasource.png)

点击下一步进行预览，并点击“完成”。


### 配置元信息

通过点击数据源ID进入数据源的详情页，并通过标签切换到元数据管理页面。

添加需要进行加密保护的表及字段，并为字段设置密文存储的字段，如下图：

![](/image/Data-Centric-Audit-and-Protection/bestpractices-setmetadata.png)

点击`生成DDL`按钮，根据弹出数据库调整建议的提示内容进行数据库调整。

![](/image/Data-Centric-Audit-and-Protection/bestpractices-generateddl.png)


调整完成的数据库信息如下：

![](/image/Data-Centric-Audit-and-Protection/bestpractices-showtable2.png)


### 配置防护实例(网关类型)

在控制台[防护实例](https://dcap-console.jdcloud.com/sdp/instance)中创建一个防护实例，这里选择“网关”类型。

![](/image/Data-Centric-Audit-and-Protection/bestpractices-createinstance.png)

等待控制台列表中的实例状态变成“运行中”，则可以通过点击ID/名称进入详情页查看域名。

![](/image/Data-Centric-Audit-and-Protection/bestpractices-descinstance.png)


### 操作数据(网关类型)

通过mysql客户端访问防护实例的域名，注意IP白名单的配置。

```sql
mysql -h dsg-engine.dcap-d07bri5xs1lbnk5k-hb.jvessel.jdcloud.com -u user -p school -e '
insert into student(s_name, s_phone, s_addr) values("张三", "13344445555", "北京市朝阳区天下无敌北路18号");
insert into student(s_name, s_phone, s_addr) values("李四", "13455556666", "天津市南开区无所畏惧西路22号");
';
```

![](/image/Data-Centric-Audit-and-Protection/bestpractices-insertdata.png)


插入数据后，可以通过网关类型防护实例，以及原始数据库进行数据对比。

原始数据库的数据：

![](/image/Data-Centric-Audit-and-Protection/bestpractices-cipherdatabase.png)

通过加密防护实例的数据：

![](/image/Data-Centric-Audit-and-Protection/bestpractices-plaindatabase.png)

### 配置防护实例(插件类型)

在控制台[防护实例](https://dcap-console.jdcloud.com/sdp/instance)中创建一个防护实例，这里选择“插件”类型。

![](/image/Data-Centric-Audit-and-Protection/bestpractices-createinstance2.png)

点击防护实例的“制作插件功能”，下载插件的软件包。

![](/image/Data-Centric-Audit-and-Protection/bestpractices-makeplugintar.png)

使用如下Demo程序构建工程：

```java
public class TestApplication {
    private static final String JDBCURL = "jdbc:mysql://mysql-cn-north-1-4042e85831614fb7.rds.jdcloud.com:3306/school?useUnicode=true&characterEncoding=UTF-8&serverTimezone=Asia/Shanghai&zeroDateTimeBehavior=convertToNull";
    private static final String USERNAME = "user";
    private static final String PASSWORD = "0vKiV3a2Dds1kv9";

    static {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
            throw new RuntimeException(e);
        }
    }

    public static void main(String[] args) throws SQLException {
        Connection connection = DriverManager.getConnection(JDBCURL, USERNAME, PASSWORD);
        PreparedStatement preparedStatement = connection.prepareStatement("insert into student(s_name, s_phone, s_addr) values(?, ?, ?)");
        preparedStatement.setString(1, "张三");
        preparedStatement.setString(2, "13344445555");
        preparedStatement.setString(3, "北京市朝阳区天下无敌北路18号");
        preparedStatement.execute();
    }
}

```

按照[插件实例对接步骤](../Sensitive-Data-Protection/Instance/PluginInstance.md)调整jdbc的url和className，调整后代码如下：

```java
public class TestApplication {
    private static final String JDBCURL = "jdbc:glory:mysql://mysql-cn-north-1-4042e85831614fb7.rds.jdcloud.com:3306/school?useUnicode=true&characterEncoding=UTF-8&serverTimezone=Asia/Shanghai&zeroDateTimeBehavior=convertToNull";
    private static final String USERNAME = "user";
    private static final String PASSWORD = "0vKiV3a2Dds1kv9";

    static {
        try {
            Class.forName("com.jdcloud.security.datasec.glory.jdbc.GloryDriver");
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
            throw new RuntimeException(e);
        }
    }

    public static void main(String[] args) throws SQLException {
        Connection connection = DriverManager.getConnection(JDBCURL, USERNAME, PASSWORD);
        PreparedStatement preparedStatement = connection.prepareStatement("insert into student(s_name, s_phone, s_addr) values(?, ?, ?)");
        preparedStatement.setString(1, "张三");
        preparedStatement.setString(2, "13344445555");
        preparedStatement.setString(3, "北京市朝阳区天下无敌北路18号");
        preparedStatement.execute();
    }
}

```

将插件解压到工程的依赖ClassPath中，运行Demo代码；执行成功后检查数据库字段内容为密文。
