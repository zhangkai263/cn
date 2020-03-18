# 用户池概述

用户池是一款账号托管产品，支持自定义用户信息、认证安全策略、用户登录方式设置、关联应用、自定义登录/忘记密码页面样式、关联第三方登录服务提供商（Identity Provider，简称IdP）等功能，为应用开发者提供了完备的账号体系服务。

目前京东智联云支持通过OpenAPI创建和管理用户池及池内的用户，也开放HTTPS接口支持用户访问令牌直接调用，以实现用户中心功能。

## 用户池OpenAPI概览

* 池管理相关OpenAPI

| OpenAPI | 功能描述 | 说明 |
| ------- | ------- | -------- |
| createUserPool | 创建池 | 支持设置mobile/email是否为创建用户必填信息、是否为全局唯一的字段 |
| getUserPool | 获取池详情 | 获取池详情|
| listUserPools | 列出当前账户下的所有池 | |
| updateUserPool | 设置池用户登录时是否开启图形验证码 | 开启/关闭图形验证功能 |

* 池应用管理相关OpenAPI

| OpenAPI | 功能描述 | 功能点说明 |
| ------- | ------- | -------- |
| associateUserPoolClient | 将应用关联到池 | 仅支持关联当前京东智联云账户下的应用 |
| disassociateUserPoolClient | 解除应用和池关联关系 | |
| listUserPoolClients | 列出指定池关联的所有应用 | 一个用户池支持关联多个应用 |

* IdP管理相关OpenAPI

| OpenAPI | 功能描述 | 功能点说明 |
| ------- | ------- | -------- |
| createIdentityProvider | 创建第三方IdP | 需要提供IdP分配的client_id和client_secret，并指定IdP用户标识与池用户标识之间的映射关系。创建后，与池关联的应用登录页可以根据需要添加IdP登录入口 | |
| deleteIdentityProvider | 删除IdP | |
| describeIdentityProvider | 获取IdP详情 | |
| listIdentityProviders | 列出用户池关联的所有IdP | |
| updateIdentityProvider | 更新IdP设置 | |

* 用户管理相关OpenAPI

| OpenAPI | 功能描述 | 功能点说明 |
| ------- | ------- | -------- |
| adminCreateUser | 
| adminDeleteUser |
| adminDisableProviderForUser |
| adminDisableUser |
| adminEnableUser |
| adminGetUser |
| adminLinkProviderForUser |
| adminSetUserPassword |
| adminUpdateUserAttribute |
| listUsers |
