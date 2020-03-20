#池身份服务提供商（IdP）管理

* IdP管理相关OpenAPI

| OpenAPI | 功能描述 | 功能点说明 |
| ------- | ------- | -------- |
| createIdentityProvider | 创建第三方IdP | 需要提供IdP分配的client_id和client_secret，并指定IdP用户标识与池用户标识之间的映射关系。创建后，与池关联的应用登录页可以根据需要添加IdP登录入口 | |
| deleteIdentityProvider | 删除IdP | |
| describeIdentityProvider | 获取IdP详情 | |
| listIdentityProviders | 列出用户池关联的所有IdP | |
| updateIdentityProvider | 更新IdP设置 | |
