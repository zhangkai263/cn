# 角色管理概述

本页介绍角色的定义、京东云支持的角色类型和角色涉及的相关概念。

- 角色的定义
- 角色的类型
- 角色的相关概念

## 角色的定义

角色是一种虚拟的身份类型，没有确定的身份凭证，必须由某个授信的实体身份所扮演才能使用。扮演成功后实体用户将获得角色的临时安全凭证，使用临时安全凭证可以以角色身份访问被授权的资源。


## 角色的类型

不同的角色载体决定了不同的角色类型。京东云的角色载体可以是京东云账号（包含主账号和子用户）、京东云服务或京东云外部的身份提供商。具体如下：

- 用户角色  

  信任实体为京东云账号的角色叫做用户角色。用户角色可以由京东云主账号或主账号下的子用户扮演，主要解决跨主账号访问和临时授权的场景。

- 服务角色  

  信任实体为京东云服务（如云主机、数据库）的角色叫做服务角色。服务角色主要解决服务间的授权问题。

- 联合身份角色  

  信任实体为外部身份提供商的角色叫做联合身份角色。联合身份角色主要解决京东云外部的账号以角色身份访问京东云资源的问题。

## 角色的相关概念

| 概念名词 | 概念解释                                                     |
| :------- | :----------------------------------------------------------- |
| 角色 JRN | 角色 JRN（JDCloud Resource Namespace）为京东云角色的全局资源描述符，遵循京东云 JRN 命名规范，格式为 jrn:iam::accountID:role/<角色名称> |
| 信任关系 | 信任关系是创建角色时所指定的可以扮演角色的实体身份，可以是京东云账号、京东云服务或外部身份提供商 |
| 代入角色 | 由信任实体扮演角色的过程称之为代入角色，信任实体代入角色后，可以角色身份在角色的权限范围内对京东云资源进行访问 |
| 会话策略 | 会话策略是嵌入角色会话的策略，信任实体在代入角色时传入。其作用是限制在已有托管策略的基础上，每次角色会话所能拥有的最大权限 |
| 权限策略 | 直接附加到角色的托管策略                                     |
| 信任策略 | 描述角色信任关系的策略                                       |
| 临时凭证 | 信任实体调用安全令牌服务（STS，Security Token Service）代入角色接口所获取的临时 AK/SK 和 Token |

## 常用操作

[创建用户角色](../../../../../documentation/Management/IAM/Operation-manual/Role-management/create-role/createuserrole.md)

[创建服务角色](../../../../../documentation/Management/IAM/Operation-manual/Role-management/create-role/createservicerole.md)

[创建联合身份角色](../../../../../documentation/Management/IAM/Operation-manual/Role-management/create-role/createfederatedrole.md)

[管理角色](../../../../../documentation/Management/IAM/Operation-manual/Role-management/modify-role.md)

[为角色授权](../../../../../documentation/Management/IAM/Operation-manual/Role-management/attach-policy.md)

[代入用户角色访问](../../../../../documentation/Management/IAM/Operation-manual/Role-management/switch-role.md)

