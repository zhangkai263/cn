# 子用户管理概述

子用户是只在主账号空间下可见的实体身份，有确定的用户名、密码和 AK/SK。

子用户不是独立的京东云账号，它由主账号创建，也只在主账号的空间下可见。资源归属于主账号，不归属于子用户，子用户只能被授权访问资源。

子用户必须得到主账号的授权，才能登录控制台或使用 OpenAPI 操作主账号授权的资源。

子用户没有独立的计量计费，其对资源的使用费用将统一计入主账号的账单。

## 常用操作

[创建子用户](../../../../../documentation/Management/IAM/Operation-manual/User-management/Create-subuser.md)

[管理子用户](../../../../../documentation/Management/IAM/Operation-manual/User-management/Manage-user.md)

[设置子用户的安全凭证](../../../../../documentation/Management/IAM/Operation-manual/User-management/setting-user-credentials.md)

[设置子用户密码策略](../../../../../documentation/Management/IAM/Operation-manual/User-management/setting-up-credential-policies.md)

[子用户访问控制台](../../../../../documentation/Management/IAM/Operation-manual/User-management/User-visit-console.md)

[子用户访问OpenAPI](../../../../../documentation/Management/IAM/Operation-manual/User-management/User-visit-openapi.md)
