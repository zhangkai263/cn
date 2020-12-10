# 导入京东云主机

主机资源包括京东云主机、其他第三方主机（包括物理机、虚机）。

我们这里以京东云主机为例。

**操作步骤**

1.选中左侧服务树中的应用节点

2.从菜单-->配置管理-->资源池，进入到“京东云主机”分页

由于您的账户已经关联京东云控制台账户，因此，可使用快速导入的方式直接勾选控制台中的云主机至DevOps平台中。

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Starting5.png)

点击“快速导入”按钮，在导入页面选择云主机所属地域，点击“查询”按钮，将会列出该地域下所有云主机，请依照实际情况进行选择。点击“导入”按钮后，所选主机将自动与左侧服务树中指定产品线相关联，可在服务树指定产品线备机池中找到这些云主机。

3.将产品线备机池中的云主机与服务树中的应用节点相关联。从菜单-->配置管理-->服务树，进入到编辑服务树的页面，左侧选择指定应用，右侧进入到“编辑实例”分页

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Starting6.png)

点击“新增实例”，选择“所属分组”为默认创建好的分组“group-pre-template-租户名”，点击“选择服务器”，在选择服务器页面，勾选云主机，即将此云主机加入到分组中

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Starting7.png)
