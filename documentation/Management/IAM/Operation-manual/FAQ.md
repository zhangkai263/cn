# 常见问题（FAQ）

## 一般性问题

**问题：京东云是否支持账户的分权管理？支持哪些产品授权？支持到什么授权粒度？**

答：京东云支持为不同人员或服务进行授权。京东云的大多数产品都支持授权，但是授权粒度在每个具体的产品服务上可能有所区别。您可以参考 [支持 IAM 的云产品](../../../../documentation/Management/IAM/Introduction/Support-Services.md) 了解详情。

**问题：访问控制（IAM）可以解决哪些问题？**

答：为了让多个用户可以安全地访问您的云账户，请使用 IAM，可以：

1. 为多个用户分别创建子用户账号，使您不必共享账户的主账号和密码，详见：[创建子用户](../../../../documentation/Management/IAM/Operation-manual/User-management/Create-subuser.md)
2. 管理每个子用户的安全凭证，包括为他们设置密码策略、AccessKey、虚拟 MFA 设备、操作保护等，加强子用户账号的安全性，详见：[设置子用户的安全凭证](../../../../documentation/Management/IAM/Operation-manual/User-management/setting-user-credentials.md)
3. 为每个子用户设置最小范围的授权，避免权限扩大造成的误操作或恶意操作，详见：[创建授权策略](../../../../documentation/Management/IAM/Operation-manual/Policy-management/policy-manage/UI-create.md)
4. 对每个子用户进行操作审计，详见：[操作审计](../../../../documentation/Management/Audit-Trail/Introduction/Product-Overview.md)
5. 通过角色支持两个京东云主账号的跨账户访问，详见：[创建用户角色](../../../../documentation/Management/IAM/Operation-manual/Role-management/create-role/createuserrole.md)，[代入用户角色访问](../../../../documentation/Management/IAM/Operation-manual/Role-management/switch-role.md)

## 子用户管理问题

**问题：我可以创建多个子用户吗？**

答：京东云支持每个账户下创建多个子用户，请前往 [IAM 控制台](https://iam-console.jdcloud.com/summary) 进行操作。详见：[创建子用户](../../../../documentation/Management/IAM/Operation-manual/User-management/Create-subuser.md)

**问题：我有很多个子用户，每个子用户都需要单独授权吗？**

答：您的每一个子用户，如果都具有不同的访问权限，那么您应该分别为每个子用户进行授权。如果您的多个子用户的访问权限是相同的，您可以通过【群组】管理子用户。通过为群组进行授权，群组内的每一个子用户都将具有相同的权限。详见：[群组管理](../../../../documentation/Management/IAM/Operation-manual/group-management.md)

## 访问权限问题

**问题：权限是怎么管理的？**

答：默认情况下，刚创建的子用户没有任何对云服务的访问权限。您需要让子用户执行的任何操作，都必须显式地进行授权。子用户的权限是子用户和其所在群组授权策略的合集。

如果您针对同一个操作、同一个资源为子用户同时进行了“deny”的授权和“allow”的授权，那么该资源操作将会被拒绝（deny 优先）。关于授权策略的编写，和授权策略的元素说明，详见：[授权策略元素说明](../../../../documentation/Management/IAM/Operation-manual/Policy-management/policy-grammar/elements.md)

**问题：子用户访问控制台，报错提示没有权限该怎么办？**

答：子用户访问控制台时，有时候会遇到 You are not authorized to perform (**具体未授权的OpenAPI名称**) on resource (**具体未授权的资源ID**) [IAM] [gw] 报错提示，说明当前子用户缺少执行操作所需的授权。请与管理员确认是否需要添加该授权。详见：[子用户访问控制台](../../../../documentation/Management/IAM/Operation-manual/User-management/User-visit-console.md) 中的 “访问资源” 章节

## 安全验证问题

**问题：子用户开启操作保护后，调用 OpenAPI 也需要进行 MFA 验证吗？**

答：是的，为子用户开启操作保护，意味着对所有敏感操作进行二次身份确认，无论该操作是由控制台发起的，还是通过子用户的 AccessKey 调用 OpenAPI 发起的。需要在 OpenAPI 的 header 传参中增加 x-jdcloud-security-token 头参数。参数的值仍然是从子用户绑定虚拟 MFA 设备的京东云 APP 中获取。详见：[子用户编程访问 OpenAPI](../../../../documentation/Management/IAM/Operation-manual/User-management/User-visit-openapi.md) 中的 “子用户调用OpenAPI的限制” 章节
