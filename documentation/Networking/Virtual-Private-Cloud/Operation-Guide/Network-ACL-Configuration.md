## **网络ACL配置**

本文将详细介绍如何管理网络ACL（简称“ACL”），包括创建/删除ACL、编辑ACL出入站规则等操作，具体内容如下：

- [创建/删除网络ACL](network-acl-configuration#user-content-1)
- [编辑网络ACL规则](network-acl-configuration#user-content-2)
- [ACL关联子网](network-acl-configuration#user-content-3)
- [ACL与子网解绑](network-acl-configuration#user-content-4)

## 前提条件及限制

- 确保您已经[注册京东云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现[实名认证](https://docs.jdcloud.com/cn/real-name-verification/introduction)；
- 每个子网同时只能绑定一个ACL，一个ACL可绑定多个子网；
- 默认的出入站规则不支持修改或删除；
- 网络ACL是有状态，在配置规则的时须配置出方向和入方向的规则；
- 华北-北京、华东-上海地域的ACL支持IPv6，更多限制[使用限制](../Introduction/Restrictions.md)

### **创建网络ACL**

<div id="user-content-1"> </div>

步骤1：进入[京东云控制台](https://console.jdcloud.com/overview)，点击左侧导航条 【私有网络 】-> 【网络ACL】，进入网络ACL列表页面

步骤2：点击【创建】按钮，弹出网络ACL创建弹框；

步骤3：选择VPC，并输入网络ACL名称、描述，点击【确定】，即创建完成。
```
请您注意在一个VPC创建的网络ACL只能适用于当前VPC，不支持在其他VPC内使用。
```


### **编辑网络ACL规则**

<div id="user-content-2"> </div>

步骤1：在网络ACL列表页面，点击要添加规则的网络ACL名称，进入到网络ACL详情页面；

步骤2：根据需要添加的规则类型，选择入站规则或出站规则Tab，进入规则列表页面；

步骤3：点击【编辑规则】，支持添加、修改、删除规则；

步骤4：设置协议类型、IP、端口以及策略后点击“确定”，即添加完成规则的修改；规则修改完成后及时生效；

    注：如需配置支持IPv6的ACL规则，需关联IPv6子网；若协议类型为IPv4独有的或者IPv6独有的协议，需输入对应类型的IP地址，如选择ICMPv6协议类型，则在目的端需输入IPv6地址



### **ACL关联子网**

<div id="user-content-3"> </div>

步骤1：在网络ACL列表页面，点击【关联子网】按钮；

步骤2：在弹窗中选择需要绑定的子网；

    注：一个网络ACL可以绑定多个子网、一个子网只能绑定一个网络ACL

步骤3：点击【确定】，即可将网络ACL规则绑定到子网，绑定完成后及时生效；

### **ACL与子网解绑**

<div id="user-content-4"> </div>

步骤1：在网络ACL列表页面，点击要添加规则的网络ACL名称，进入到网络ACL详情页面；

步骤2：点击【关联子网】选项卡；

步骤3：定位需要接触关联的子网，在关联子网列表中的操作列点击【解绑】按钮；

步骤4：在弹窗中点击【确定】完成解绑。

    该操作也可以在子网侧进行，具体请查看子网操作指南。


### 删除网络ACL

步骤1：进入[京东云控制台](https://console.jdcloud.com/overview)，点击左侧导航条 【私有网络 】-> 【网络ACL】，进入网络ACL列表页面

步骤2：定位需要删除的网络ACL，在操作列点击【删除】，进入删除资源弹窗；

```
删除ACL之前，需与已关联的子网接触关联。
```

步骤3：点击【确认】，删除对应的网络ACL。

## 相关参考

- [ACL简介](../Introduction/Features/Network-ACL-Features.md)
- [子网操作指南](Subnet-Configuration.md)
