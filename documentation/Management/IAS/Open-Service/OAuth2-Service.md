# OAuth2.0联合登录服务

## 服务概述
京东智联云OAuth2.0服务是为应用程序提供的联合登录服务，应用接入OAuth2.0服务可以实现用户认证和授权。OAuth2.0是一个开放的身份验证与授权标准协议，京东智联云OAuth2.0服务主要支持Web应用，移动端或客户端应用也可以通过WebView形式对接。

## 接入流程
京东智联云OAuth2.0服务是一系列HTTPS接口。应用开发者需要先在 [应用管理控制台](https://ias-console.jdcloud.com/ias/apps) 获取Client_ID（请参考[《创建和管理应用》]()），然后按以下步骤开发实现授权登录：
1. 调用授权端点，获取用户登录授权码
2. 调用令牌端点，获取用户访问令牌，即登录态
3. 使用访问令牌调用用户信息端点，获取登录用户信息

另外，京东智联云还提供令牌撤销和令牌状态查询端点，应用可以根据需要进行调用。

### 授权端点（Authorize Endpoint）

- 地址（Path）：https://oauth2.jdcloud.com/authorize
- 方法（Method）：GET/POST
- 参数说明（Parameters）

| Fun                  | With                 | Tables          |
| :------------------- | -------------------: |:---------------:|
| left-aligned column  | right-aligned column | centered column |
| $100                 | $100                 | $100            |
| $10                  | $10                  | $10             |
| $1                   | $1                   | $1              |
