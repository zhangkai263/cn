# Accesskey管理

AccessKey 由 AccessKey 和 AccessKey Secret 秘钥对（简称 AK/SK）构成。您可以使用 AK/SK 调用京东云 OpenAPI，AK/SK 等同于您编程访问京东云的用户名和密码。

每个主账号可拥有 5 组有效访问密钥，每个 IAM 用户可拥有 2 组有效的访问密钥。您可以创建、禁用或删除您的 AK/SK，同时也建议您定期轮换 AK/SK 以保证您的账户和资源安全。

当 AK/SK 处于禁用状态时，意味着该密钥对不能用于 API  调用。如果需要轮换密钥，或禁止某个持有该 AK/SK 的服务对 OpenAPI 进行访问时，可以将 AK/SK 禁用。

您还可以随时删除访问密钥，不过，当您删除访问密钥时，意味着永久删除且无法恢复。

## 管理 AK/SK

您可以在【AccessKey 管理】页面创建、启用、禁用 AK/SK，并查看指定 AK/SK 的最后一次调用记录，以决定是否对 AK/SK 执行轮换。

### 管理主账号的 AK/SK

主账号登录后，可以在账户管理-[AccessKey管理](https://uc.jdcloud.com/account/accesskey)页面管理AK/SK。但是，京东云不建议在任何情况下启用主账号的 AK/SK，该秘钥对拥有主账号的全量权限，一旦泄露将会产生最大风险。

![image-20210722210205813](C:\Users\xialiwen\AppData\Roaming\Typora\typora-user-images\image-20210722210205813.png)

### 管理子用户的 AK/SK

子用户可以登录[账户中心](https://uc.jdcloud.com/subaccount/subaccount-accesskey)管理自己的 AK/SK。

![image-20210722210835865](C:\Users\xialiwen\AppData\Roaming\Typora\typora-user-images\image-20210722210835865.png)

有子用户安全凭证管理权限的管理员，也可以在 [IAM 控制台](https://iam-console.jdcloud.com/subUser/list)完成子用户 AK/SK 管理操作。详见：[设置子用户的安全凭证](../../../../../documentation/Management/IAM/Operation-manual/User-management/setting-user-credentials.md)

![image-20210722211148793](C:\Users\xialiwen\AppData\Roaming\Typora\typora-user-images\image-20210722211148793.png)

## 对API访问设置多因子认证（MFA）

拥有您的 AK/SK 的任何人，都与您拥有相同的资源访问和操作权限，在授权范围内可以随意访问资源并进行操作。因此，我们建议您为账户开启【**基于 MFA** 的操作保护】，这意味着当 AK/SK 请求对账户执行敏感操作（或称为高危操作）时，系统会要求调用者提供其第二种身份的证明，以避免由于 AK/SK 泄露产生风险。

> 注意：
>
> 启用【短信】或【邮件】作为操作保护的验证方式时，仅对控制台的敏感操作生效；
>
> 只有启用【MFA】作为操作保护验证方式，才能对编程访问生效。

操作保护的设置方法，详见：[操作保护设置](../../../../../documentation/User-Service/Security-Operation-Protection/Operation-Protection.md)
