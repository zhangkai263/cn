## 查询用户刷新预热封禁限额(queryCdnUserQuota)

**接口描述**

```reStructuredText
GET /v1/user:quota
```

### 请求参数

### 响应参数

| 名称      | 类型   | 描述 |
| --------- | ------ | ---- |
| result    | Result |      |
| requestId | String |      |

#### Result

| 名称              | 类型 | 描述                   |
| ----------------- | ---- | ---------------------- |
| dirAllCount           | int | 总的目录刷新上限 |
| dirUsedCount         | int  | 已使用的目录刷新个数                                              |
| dirRemainedCount      | int | 剩余可用的目录刷新个数                   |
| forbiddenUrlRemainedCount      | int | 剩余可封禁的URL个数                    |
| forbiddenUrlUsedCount      | int | 已封禁的URL个数                   |
| forbiddenUrlAllCount      | int | 总的封禁URL上限                   |
| hasForbiddenDomainCount      | int | 已封禁的域名个数，即用户账号下对违法内容封禁的域名  |
| prefetchRemainedCount           | int | 剩余可用的预热URL个数 |
| prefetchAllCount         | int  | 总的预热URL上限                                              |
| prefetchUsedCount      | int | 已使用的预热URL个数                   |
| refreshAllCount      | int |         总的刷新URL上限            |
| refreshRemainedCount      | int | 剩余可用的刷新URL个数                   |
| refreshUsedCount      | int | 已使用的刷新URL个数                  |
| totalUserDomainQuota      | int | 总的用户域名数上限; 即针对账号下可添加域名的总个数|
| usedUserDomainQuota      | int | 已使用的用户域名个数；即账号下已经添加的域名个数，包括停用域名、封禁域名等|
| remainUserDomainQuota      | int | 剩余可配置的用户域名个数               |
