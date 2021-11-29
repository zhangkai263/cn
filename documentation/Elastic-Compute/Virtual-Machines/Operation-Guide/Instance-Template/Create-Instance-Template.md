# 创建实例模板

## 前提条件及限制
* 不可跨地域使用实例模板，例如不能使用华南-广州地域的实例模板创建华北-北京地域的实例；
* 单地域最多可创建20个实例模板，如需调整请提交工单。
## 操作步骤
1. 访问 [实例模板控制台](https://cns-console.jdcloud.com/host/launchtemplate/list)，即进入实例模板列表页面。或访问 [京东云控制台](https://console.jdcloud.com) 点击顶部导航栏 **弹性计算-云主机-实例模板** 进入实例模板列表页。
2. 选择地域后点击 **创建**，进入实例模板创建页面。
3. 设置实例模板名称、描述。
4. 其他配置项可参考 [Linux入门指南-确定配置项](https://docs.jdcloud.com/virtual-machines/select-configuration-linux) 或 [Windows入门指南-确定配置项](https://docs.jdcloud.com/virtual-machines/select-configuration-windows) 进行选择和填写。

>注意：
>* 实例模板服务免费，页面价格显示的是基于此实例模板创建实例的预估费用，实际资源费用请以创建实例时的价格显示为准；
>* 云硬盘“随实例释放”功能和云盘系统盘实例“停机不计费”功能，均仅针对按配置计费实例生效，因此如您在实例模板中开启了此类功能，但使用模板创建了包年包月实例，则参数将不生效。



## 相关参考

[Linux入门指南-确定配置项](https://docs.jdcloud.com/virtual-machines/select-configuration-linux)
 
[Windows入门指南-确定配置项](https://docs.jdcloud.com/virtual-machines/select-configuration-windows)

[实例停机不计费](../Instance/uncharged_for_stopped_vm.md)
