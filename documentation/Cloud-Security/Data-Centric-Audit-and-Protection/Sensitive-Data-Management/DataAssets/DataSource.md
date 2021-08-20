# 数据源管理

数据安全中心目前支持MySQL类型的数据库，您可以添加京东云的RDS-MySQL数据库，也可以添加自建的MySQL数据库。

## 添加数据源

添加数据源操作路径： 云安全->数据安全中心->敏感数据资产->添加

**第一步：选择数据源**

根据向导选择您的数据源，如果数据源为京东云购买的RDS，则可以直接通过控制台进行选择，如图：

![](/image/Data-Centric-Audit-and-Protection/datasource-add-1.png)

如果您的数据源为自建的MySQL数据库，选择`自建MySQL`，需要您补全数据库所在的私有网络及子网信息，以及数据库的地址、端口，以及数据库的库名称，如下图：

![](/image/Data-Centric-Audit-and-Protection/datasource-add-2.png)

**第二步：防护策略设置：**

配置数据源的名称，以及数据保护策略，这里需要您已经开通京东云[`密钥管理服务`](https://kms-console.jdcloud.com/)，并创建数据保护密钥，如图：

![](/image/Data-Centric-Audit-and-Protection/datasource-add-3.png)

```
数据密钥（Data Key）是用来对数据进行加解密的密钥，受KMS主密钥的加密保护，此密钥用来对数据源内的数据进行加密使用，请妥善保管。
```

注： 密钥设置也可以在添加数据源之后再进行初始化。

**第三步：确认：**

对数据源的配置进行确认，如果配置正确的话，则点击`创建`按钮，进行数据源的创建操作。

![](/image/Data-Centric-Audit-and-Protection/datasource-add-4.png)


创建数据源完成后，您可以在控制台看到该数据源，同时可以通过点击数据源的名称或ID进入数据源的详情页，进行[元数据的管理](MetaData.md)。


## 删除数据源

您可以删除状态为`未防护`的数据源；如果数据源的状态是`已防护`的话，则需要先删除防护该数据源的实例。