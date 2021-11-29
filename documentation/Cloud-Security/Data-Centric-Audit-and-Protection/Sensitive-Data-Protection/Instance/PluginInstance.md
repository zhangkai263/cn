# 接入插件类型防护实例

## 制作插件

在控制台的插件类型防护实例的`操作`栏，点击`制作插件`，即可得到一个压缩包，包含了防护实例所用的所有依赖jar包。

```
注：插件类型的防护实例暂只支持Java语言，要求JDK/JRE版本为 1.8.0-u162 及以上版本
```

![](/image/Data-Centric-Audit-and-Protection/instance-downloadplugin.png)

## 上传服务器并解压

将下载的插件压缩包解压到 /opt/datasec/目录：
![](/image/Data-Centric-Audit-and-Protection/instance-extractplugin.png)


## 调整业务配置

针对Java应用需要调整两个地方：

- driverClassName: 调整为 `com.jdcloud.security.datasec.glory.jdbc.GloryDriver`
- jdbc URL： 在jdbc和mysql中间增加`glory`关键字，如：jdbc:glory:mysql://localhost:3306/school?xxxx


### jdbc调整示例

```java
private static String JDBCURL = "jdbc:glory:mysql://localhost:3306/school?useUnicode=true&characterEncoding=UTF-8&serverTimezone=Asia/Shanghai&zeroDateTimeBehavior=convertToNull";
private static String USERNAME = "root";
private static String PASSWORD = "123456";

Class.forName("com.jdcloud.security.datasec.glory.jdbc.GloryDriver");
Connection conn = DriverManager.getConnection(jdbcURL,username,password);
```


### mybatis xml 调整示例
```xml
<?xml version="1.0" encoding="UTF-8"?>
<dataSource type="POOLED">
   <property name="driver" value="com.jdcloud.security.datasec.glory.jdbc.GloryDriver" />
   <property name="url" value="jdbc:glory:mysql://localhost:3306/school?useUnicode=true&amp;characterEncoding=UTF-8&amp;serverTimezone=Asia/Shanghai&amp;zeroDateTimeBehavior=convertToNull" />
   <property name="username" value="root" />
   <property name="password" value="123456" />
</dataSource>
```


### spring boot 调整示例
```
spring.datasource.type=com.alibaba.druid.pool.DruidDataSource
spring.datasource.driver-class-name=com.jdcloud.security.datasec.glory.jdbc.GloryDriver
spring.datasource.url=jdbc:glory:mysql://localhost:3306/school?useUnicode=true&characterEncoding=UTF-8&serverTimezone=Asia/Shanghai&zeroDateTimeBehavior=convertToNull
spring.datasource.username=root
spring.datasource.password=123456
```

## 将/opt/datasec加入到CLASSPATH中

```bash
# 例：
$ java -cp '.:/opt/datasec/*:/opt/datasec' MyApplication
```