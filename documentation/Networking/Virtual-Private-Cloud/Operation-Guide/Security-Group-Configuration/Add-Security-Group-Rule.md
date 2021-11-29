# 添加出/入站规则

### 前提条件及限制

- 确保您已经[注册京东云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现[实名认证](https://docs.jdcloud.com/cn/real-name-verification/introduction)；
- 已拥有一个安全组，且有足量的安全组规则配额。

### 操作步骤

出站规则用于过滤云主机访问互联网或其他云主机的网络流量，设置方式如下：

步骤1：进入京东云控制台，选择 弹性计算->云主机->安全组 页面（或者 弹性计算->容器服务->安全组，该指南以云主机为例），进入安全组列表页；

步骤2：找到需要配置出站规则的安全组，点击“更多”操作中的【修改出站规则】或点击安全组名称跳转到其详情页面；

![](/image/Networking/Virtual-Private-Cloud/Operation-Guide/Security-Group-Configuration/Step6.png)



步骤2：进入出站规则TAB页，点击页面上的编辑规则按钮，进入出站规则编辑页面；

![](/image/Networking/Virtual-Private-Cloud/Operation-Guide/Security-Group-Configuration/Step7.png)



步骤3：点击页面下方的【添加新规则】按钮将为当前安全组新增一条新的出站规则，选择出站规则类型，系统将根据所选择的出站规则类型自动匹配相应协议，依次设置端口（支持单个端口号，如80，也支持端口范围如：80-8080）、目的IP（支持单个IP或CIDR）后完成一条出站规则的配置；

     当协议类型仅支持IPv4地址（如ICMP协议）或仅支持IPv6地址（如ICMPv6协议）时，请输入正确的地址
     
步骤4：您也可以随时对页面上已添加的安全组出站规则进行编辑；

步骤5：点击操作列中的【删除】按钮，将删除一条对应的出站规则；

步骤6：完成出站规则编辑后，点击页面上方的【保存】按钮后，新修改的安全组规则自动生效；

![](/image/Networking/Virtual-Private-Cloud/Operation-Guide/Security-Group-Configuration/Step8.png)



**请您注意安全组规则的是有状态的，如果您从云主机发送一个请求，则无论入口安全组规则如何，都将允许该请求的响应流量流出。**

## 相关参考
