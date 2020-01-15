## 专线连接

使用专线连接前，应规划好企业IDC和VPC的网段，保证企业IDC内的网段和VPC内的网段不会重叠！

若同时使用专线连接和托管连接，请规划好企业IDC内、京东云托管区内及公有云VPC内的网段，以保障正常通信。

### 操作步骤
##### 1.创建物理连接
a)登录[京东云物理连接控制台](https://cns-console.jdcloud.com/host/physicalConnection/list)；  </br>
b)选择地域，点击“创建”；</br>
c)输入连接的名称、描述、接入方式、客户IDC地址、合作伙伴/运营商(合作伙伴接入)、接入点(自助接入)，可选输入客户联系人、联系方式，创建物理连接；</br>

```
物理连接创建的前提是您已完成实名认证，物理连接创建后进入待审核状态。京东云收到您提交的物理连接申请后，会在1~2个工作日以内完成审核操作，您也可主动联系京东云进行确认。
```



![](../../../../../image/Networking/VPN/Operation-Guide/create-vpnconnection.png)

##### 2.确认物理连接施工完成
您可对VPN连接的名称、描述及路由方式进行修改。</br>
a)登录[京东云VPN连接控制台](https://cns-console.jdcloud.com/host/vpnConnection/list)；  </br>
b)选择相应的VPN连接，进入VPN连接详情页面；</br>
c)支持修改VPN连接名称、描述及路由方式，各配置项的限制同创建VPN连接；</br>
```
  路由方式由启用BGP修改为静态时，将立即断开所有隧道的BGP会话，仅谨慎操作。

  路由方式由静态修改为启用BGP时，将使用VPN隧道的隧道IP作为互联地址，以边界网关的BGP ASN、客户网关的BGP ASN建立BGP会话。
```
![](../../../../../image/Networking/VPN/Operation-Guide/update-vpnconnection.png)

##### 3.修改物理连接
您可对VPN连接的名称、描述及路由方式进行修改。</br>
a)登录[京东云VPN连接控制台](https://cns-console.jdcloud.com/host/vpnConnection/list)；  </br>
b)选择相应的VPN连接，进入VPN连接详情页面；</br>
c)支持修改VPN连接名称、描述及路由方式，各配置项的限制同创建VPN连接；</br>
```
  路由方式由启用BGP修改为静态时，将立即断开所有隧道的BGP会话，仅谨慎操作。

  路由方式由静态修改为启用BGP时，将使用VPN隧道的隧道IP作为互联地址，以边界网关的BGP ASN、客户网关的BGP ASN建立BGP会话。
```
![](../../../../../image/Networking/VPN/Operation-Guide/update-vpnconnection.png)

##### 4.删除物理连接
若您不再需要VPN连接，可将其删除。</br>
a)登录[京东云VPN连接控制台](https://cns-console.jdcloud.com/host/vpnConnection/list)；  </br>
b)选择相应的VPN连接，点击操作列中的“删除”，当该VPN连接未创建VPN隧道时可以删除；</br>
![](../../../../../image/Networking/VPN/Operation-Guide/delete-vpnconnection.png)
