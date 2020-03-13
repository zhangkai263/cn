# OAuth2.0联合登录服务

## 服务概述
京东智联云OAuth2.0服务是为应用程序提供的联合登录服务，应用接入OAuth2.0服务可以实现用户认证和授权。OAuth2.0是一个开放的身份验证与授权标准协议，京东智联云OAuth2.0服务主要支持Web应用，移动端或客户端应用也可以通过WebView形式对接。

## 接入流程
京东智联云OAuth2.0服务是一系列HTTPS接口。应用开发者需要先在 [应用管理控制台](https://ias-console.jdcloud.com/ias/apps) 获取Client_ID（请参考[《创建和管理应用》]()），然后按以下步骤开发实现授权登录：
1. 调用授权端点（Authorize），获取用户登录授权码（Code）
2. 调用令牌端点（Token），获取用户访问令牌（Token）
3. 使用访问令牌调用用户信息端点（Userinfo），获取登录用户信息（Username，Account）

另外，京东智联云还提供令牌撤销和令牌状态查询端点，应用可以根据需要进行调用。

### 授权端点（Authorize Endpoint）

- 地址（Path）：https://oauth2.jdcloud.com/authorize
- 方法（Method）：GET/POST
- 参数说明（Parameters）

| 参数名 | 是否必须 | 值 | 格式 | 备注 |
| :--------- | :--------- | :--------- | :--------- | :--------- |
| client_id | 是 | 16位ID | string | 在应用管理控制台获取 |
| include_granted_scopes | 否 | true/false | string | 默认为false，如需要获取用户在京东云的openid则传true |
| redirect_uri | 是 | 在创建应用时填写的 “回调地址” | uri | 必须与应用 “回调地址” 完全一致（如有多个回调地址，与其中一个完全一致即可）|
| response_type |	是 | code/token | string | 应用为授权码模式时，此值应为code；应用为隐式授权模式时，此值应为token。授权码模式相对来说安全性更高，推荐使用授权码模式 |
| state | 是 | 任意字符串 | string | 返回结果中会原样返回该值，用于避免CSRF |

- 请求示例（Examples）
```HTTP 
https://oauth2.jdcloud.com/authorize?response_type=code&redirect_uri=https://example.myapp.com/oauth2&client_id=9891566283421234&state=eyJhcHBJZCI6Ijk2OTE1Nzc2NzY0MjgxNTYiLCJwcm92aWRlclR5cGUiOiJNaWNyb3NvZnQiLCJwcm92aWRlclVzZXJBbGlhc0lkRmllbGQiOiJ1c2VyUHJpbmNpcGFsTmFtZSIsInJlZGlyZWN0VXJsIjoiYUhSMGNDVXpRU1V5UmlVeVJtOWhkWFJvTWkxemRHRm5MbXBrWTJ4dmRXUXVZMjl0In0
```
发起授权请求后，浏览器会将用户302重定向到应用在京东智联云对应的登录页。用户完成登录后，浏览器会再次302重定向返回指定的回调地址，并返回用户授权码Code。Code有效期为5分钟，且只能请求一次令牌端点，使用后当前Code会失效，如需再次请求令牌端点，需要重新调用Authorize




