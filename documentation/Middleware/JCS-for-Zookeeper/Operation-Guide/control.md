## 访问控制
### 访问控制简介
访问控制（Identity and Access Management， IAM）的核心功能主要是用户身份管理与资源访问控制。用户可以通过使用IAM创建、管理子用户，并控制这些子用户访问京东云资源的操作权限。使用访问控制，主账号可以向他人授权管理账户中的资源，而不必共享账户密码或访问秘钥，按需为用户分配所需的最小权限，从而降低企业信息安全风险。</br>

Zookeeper的访问控制功能是通过[访问控制 IAM]( https://docs.jdcloud.com/cn/iam/product-overview)来实现的，用户需要前往[访问控制菜单]( https://iam-console.jdcloud.com/summary)设置子账户和用户角色的权限。</br>

更多关于 IAM 的介绍可前往[IAM访问控制]( https://docs.jdcloud.com/cn/iam/product-overview)查看。</br>
### Zookeeper访问控制策略

#### 系统策略

Zookeeper已经预置2种系统策略，用户可以按需授权给子账户。系统预置策略如下：</br>

系统策略名称 | 权限描述 | 类型 | 资源范围 | 备注 
:---: | :--- | :--- | :--- | :---
JDCloudZKAdmin  | Zookeeper管理员权限 | 系统类型 | 主账号下Zookeeper的所有资源 | 可以让用户拥有创建和管理 zookeeper实例的权限。 |
JDCloudZKRead  | Zookeeper读权限 | 系统类型 | 主账号下Zookeeper的所有资源 | 可以让用户拥有查看Zookeeper实例的权限，但是不具有创建、删除等操作的权限。 |

#### 依赖策略
子账户依赖的资源策略如下，可在系统策略不能满足使用需求时添加：</br>

接口名称 | 权限描述 | 权限类型 | 备注 |  
:---: | :--- | :--- | :--- | 
JDCloudRenewalAdmin  | 续费管理员权限 | 系统策略| 子用户可执行续费操作时添加即可 |
JDCloudOrderPayment  | 收银台支付权限 | 系统策略 | 子用户可执行创建资源和续费操作时添加即可 |
