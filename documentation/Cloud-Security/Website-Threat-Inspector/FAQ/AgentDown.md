# 探针部署问题

### 1、为什么VPC内网探针部署完成离线？
![](../../../../image/Website-Threat-Inspector/WTS-VPC-ip-00lixian.jpg)


- 探针部署完成，部署状态显示离线，需要您进行如下操作：

  - 前往“云服务-原生容器“进行公网IP的绑定
    ![](../../../../image/Website-Threat-Inspector/wts-VPC-ip-01docker.png)

  - 找到网站威胁扫描产品创建的容器实例
    ![](../../../../image/Website-Threat-Inspector/wts-VPC-ip-02a.png)

  - 在“操作-更多”中绑定公网IP
    ![](../../../../image/Website-Threat-Inspector/wts-VPC-ip-03binda.png)

- 如果您发现没有空余的公网IP可以使用，需要您进行公网IP申请

  - 申请方式：“云服务-私有网络-弹性公网IP”
    ![](../../../../image/Website-Threat-Inspector/wts-VPC-ip-01a.png)

  - 对具体公网IP的申请方式没有要求，您可以按需选择包年包月或按量付费等方式。
