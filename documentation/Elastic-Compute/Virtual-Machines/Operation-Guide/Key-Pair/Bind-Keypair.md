# 绑定密钥

您可在实例创建时或重置系统为其指定密钥绑定，也可在创建之后进行绑定。绑定密钥时可设置是否禁用SSH密码登录，以降低密码被暴力破解的可能，获得更高的安全登录保证。

>提示：绑定SSH密钥的控制台操作入口目前为灰度开放，如需使用请提交工单申请。

## 前提条件及限制
* 仅Linux系统实例支持绑定密钥，且实例须处于 **运行中** 或 **已停止** 状态；
* 每个实例仅支持通过平台绑定一个密钥，如需调整所用密钥，可解绑后再行绑定；
* 密钥绑定功能依赖于镜像中内置的京东云官方系统组件，由于组件具备自动升级功能，因此通常情况下均支持密钥绑定功能。如需确认可进入系统运行`cat /usr/local/share/jcloud/agent/core/componentInfo.cfg`查看系统组件版本是否不低于`3.0.1042`。

>请注意：<br>
>* 绑定密钥后，须启动（停止状态绑定）或重启（运行状态绑定）实例才可生效;
>* 为实例绑定密钥只是在系统内添加了了受平台管理的密钥，而不影响实例中已有密钥的存在和使用。

## 操作影响
* 如在绑定密钥时，指定禁用SSH密码登录，则无法再通过密码SSH的登录实例。后续如需启用可通过[重置密码](https://docs.jdcloud.com/virtual-machines/reset-password)功能设置密码后自动启用。

## 操作步骤
1、访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击左侧顶部导航 **弹性计算-云主机** 进入实例列表页。<br>
2、选择地域后在实例列表中选择需要绑定SSH密钥的实例，点击 **操作-更多-绑定密钥** 按钮。<br>
3、在弹窗中选择要使用的SSH密钥，根据登录需求选择是否禁用SSH密码登录，点击 **确定** 后完成密钥绑定。

<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/attach-ssh1.png" width="650"></div>


## 相关参考

[重置系统](../Instance/Rebuild-Instance.md)

[SSH登录配置](../../Linux-Troubleshooting/Configuration-Class/SSH-creation-and-login.md)

[重置密码](https://docs.jdcloud.com/virtual-machines/reset-password)
