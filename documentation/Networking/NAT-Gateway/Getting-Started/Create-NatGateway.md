# 云主机使用NAT网关

NAT网关SNAT场景最佳实践环境包括：

1. 1个VPC（test-vpc）

2. 2个子网（nat-subnet和private-subnet）

3. 2个路由表，（nat-rt和private-rt）

4. 1台云主机（test-vm）

5. 1台NAT网关（test-natgw）

## 创建VPC，Subnet和云主机

1. 创建1个测试VPC(test-vpc)，在测试VPC中创建两个测试子网(nat-subnet,private-subnet)，详细步骤请参见[VPC配置](../../Virtual-Private-Cloud/Operation-Guide/VPC-Configuration.md)和[子网配置](../../Virtual-Private-Cloud/Operation-Guide/Subnet-Configuration.md)

2. 在测试子网private-subnet中创建1台没有公网IP的测试云主机(test-vm)，详细步骤参见[创建实例](../../../Elastic-Compute/Virtual-Machines/Operation-Guide/Instance/Create-Instance.md)

3. 创建2个路由表(nat-rt,private-rt), private-rt关联子网private-subnet，nat-rt关联子网nat-subnet，详细步骤请参见[路由表配置](../../Virtual-Private-Cloud/Operation-Guide/Route-Table-Configuration.md)

## 创建NAT网关

1. 打开私有网络控制台 https://cns-console.jdcloud.com/host/vpc/list

2. 在左侧导航栏，点击**NAT 网关**

3. 在NAT网关页面，点击**创建**

4. 根据以下信息，配置NAT网关

| 配置          | 说明                                                         |
| :------------ | :----------------------------------------------------------- |
| 地域与可用区  | 选择需要配置NAT网关的VPC所在的地域并选择可用区               |
| 规格          | 选择NAT网关的规格。NAT网关的规格会影响SNAT功能的最大连接数和每秒新建连接数，但不会影响数据吞吐量。详情参见[产品规格](../Introduction/Specifications.md) |
| 网络          | 选择需要配置NAT网关的VPC和子网                               |
| NAT网关公网IP | 选择NAT网关公网带宽                                          |
| 基本信息      | 填写NAT网关名称（test-natgw）和描述                          |

    请注意：需要给NAT网关创建单独子网，不能和使用NAT网关的云主机创建在同一子网

5. 确认信息无误后，点击**立即购买**

6. 确认订单信息，勾选**已阅读NAT《网关服务协议》**，点击**立即开通**

7. 返回NAT网关页面确认新购买NAT网关已显示，状态为运行中

## 配置路由表

1. 打开私有网络控制台 https://cns-console.jdcloud.com/host/vpc/list

2. 在左侧导航栏，点击**路由表**

3. 选择NAT网关所在子网关联的路由表（nat-rt），进入路由表详情页

4. 选择**路由策略**，点击**编辑**，增加一条路由，目的为**0.0.0.0/0**  下一跳类型为**Internet**，下一跳为**Internet**，确认后点击保存

5. 选择云主机所在子网关联的路由表（private-rt），进入路由表详情页

6. 选择**路由策略**，点击**编辑**，增加一条路由，目的为**0.0.0.0/0**  下一跳类型为**NAT 网关**，下一跳选择NAT网关（test-natgw），确认后点击**保存**

       注意：
       云主机所在子网配置默认路由规则0.0.0.0/0下一跳为NAT网关后，如没有配置优先级更高的访问互联网精细路由，有如下影响：
     
       （1）该子网内所有云主机将通过NAT网关访问互联网
     
       （2）子网内原绑定公网IP的云主机将不能再通过公网IP与互联网互通。如云主机仍需对外提供Telent、SSH或其他高可用服务，请参见NAT网关最佳实践文档https://docs.jdcloud.com/cn/nat-gateway/config-lb-eni-nat-gateway。
     

## 验证NAT网关Internet连通性

1. 确认在云主机所在子网内已经创建了一台没有关联公网IP的云主机

2. 打开云主机控制台 https://cns-console.jdcloud.com/host/compute/list

3. 在左侧导航栏，点击**实例**

4. 选择用来测试的云主机，在右侧操作列点击**远程连接**，登录云主机

5. 在命令行运行 "ping www.jd.com", 确认可以ping通

## 通过网络ACL实现NAT网关访问控制（可选）

1. 打开私有网络控制台 https://cns-console.jdcloud.com/host/vpc/list

2. 在左侧导航栏，点击**网络ACL**

3. 指定NAT网关所在VPC（test-vpc），选择创建网络ACL（nat-acl），进入网络ACL详情页

4. 选择关联子网，指定NAT网关所在子网（nat-subnet），点击**确定**，此时网络ACL的缺省规则入栈规则和出栈规则都是全部流量拒绝，会丢弃所有报文

5. 再次测试云主机通过NAT网关访问Internet，通过VNC远程连接登陆云主机

6. 在命令行运行 "ping www.jd.com", 确认不能ping通

7. 此时需要修改ACL规则，才能允许云主机访问Internet

8. 选择**入栈规则**，点击**编辑规则**，增加一条新规则，优先级为100，类型为**ALL ICMP**，源IP为**0.0.0.0/0**  策略为**接受**，确认后点击保存

9. 选择**出栈规则**，点击**编辑规则**，增加一条新规则，优先级为100，类型为**ALL ICMP**，目的IP为**0.0.0.0/0**  策略为**接受**，确认后点击保存

10. 再次测试云主机通过NAT网关访问Internet，通过VNC远程连接登陆云主机

11. 在命令行运行 "ping www.jd.com", 确认可以ping通

12. 此时云主机如果要通过NAT网关访问其他公网服务，比如"curl www.jd.com:80", 需要添加http类型的入栈和出栈规则，允许接受对应流量访问


        注意：
        
        1、网络ACL不是NAT网关最佳实践的必选项，只有需要进行访问控制时，才需要配置
        
        2、网络ACL规则是无状态的，即使设置入站规则允许指定的IP地址访问，如果没有设置相应的出站规则会导致无法响应访问，所以按照白名单配置允许访问时，需要入栈规则和出栈规则同时配置
        
