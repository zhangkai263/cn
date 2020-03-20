# OAuth2.0联合登录服务

## 服务概述
京东智联云OAuth2.0为应用程序提供的联合登录服务，应用接入OAuth2.0服务可以实现用户认证和授权。OAuth2.0是一个开放的身份验证与授权标准协议，京东智联云目前支持授权码模式和隐式授权模式。

## 接入流程
京东智联云OAuth2.0服务是一系列HTTPS接口。应用开发者需要先在应用管理控制台获取Client_ID，然后按以下步骤开发实现授权登录：
1. 调用授权端点（Authorize Endpoint），获取用户登录授权码（code）
2. 调用令牌端点（Token Endpoint），获取用户访问令牌（token）
3. 使用访问令牌调用用户信息端点（Userinfo Endpoint），获取登录用户信息（username，account）

另外，京东智联云还提供令牌撤销和令牌状态查询端点，应用可以根据需要进行调用。

### 授权端点（Authorize Endpoint）

- 地址（Path）：{oauth2}/authorize
- 方法（Method）：GET/POST
- 请求参数（Parameters）

| 参数名 | 是否必须 | 值 | 格式 | 备注 |
| :--------- | :--------- | :--------- | :--------- | :--------- |
| client_id | 是 | 16位ID | string | 在应用管理控制台获取 |
| include_granted_scopes | 否 | true/false | string | 默认为false，如需要获取用户在京东云的openid则传true |
| redirect_uri | 是 | 在创建应用时填写的 “回调地址” | uri | 必须与应用 “回调地址” 完全一致（如有多个回调地址，与其中一个完全一致即可）|
| response_type |	是 | code/token | string | 应用为授权码模式时，此值应为code；应用为隐式授权模式时，此值应为token。授权码模式相对来说安全性更高，推荐使用授权码模式 |
| state | 是 | 任意字符串 | string | 返回结果中会原样返回该值，用于避免CSRF |

- 请求示例（Examples）
```
https://oauth2.jdcloud.com/authorize?response_type=code&redirect_uri=https://example.myapp.com/oauth2&client_id=9891566283421234&state=eyJhcHBJZCI6Ijk2OTE1Nzc2NzY0MjgxNTYiLCJwcm92aWRlclR5cGUiOiJNaWNyb3NvZnQiLCJwcm92aWRlclVzZXJBbGlhc0lkRmllbGQiOiJ1c2VyUHJpbmNpcGFsTmFtZSIsInJlZGlyZWN0VXJsIjoiYUhSMGNDVXpRU1V5UmlVeVJtOWhkWFJvTWkxemRHRm5MbXBrWTJ4dmRXUXVZMjl0In0
```
发起授权请求后，浏览器会将用户302重定向到应用在京东智联云对应的登录页。用户完成登录后，浏览器会再次302重定向返回指定的回调地址，并返回用户授权码code。code有效期为5分钟，且请求一次令牌端点后就会失效。如需再次使用code，请重新获取。

### 令牌端点（Token Endpoint）

- 地址（Path）：{oauth2}/token
- 方法（Method）：GET/POST
- 请求头（Header）：客户端密码通过HTTP基础身份验证的应用适用
```
Authorization:Basic base64(client_id:client_secret)
```
- 请求参数（Parameters）

| 参数名 | 是否必须 | 值 | 格式 | 备注 |
| :--------- | :--------- | :--------- | :--------- | :--------- |
| client_id | 否 | 16位ID | string | 客户端密码通过请求参数验证或不需要验证的应用适用 |
| client_secret | 否 | 应用客户端密码 | string | 客户端密码通过请求参数验证的应用适用 |
| refresh_token | 否 | refresh_token的值 | String | grant_type为refresh_token时必须 |
| grant_type | 是 | authorization_code/refresh_token | string | 如果通过code请求Token，此值为authorization_code；如果通过refresh_token更新Token，此值为refresh_token |
| code | 否 | 授权端点返回code | String | grant_type为authorization_code时必须 |
| refresh_token | 否 | refresh_token的值 | String | grant_type为refresh_token时必须 |

- 请求示例（Examples）
> grant_type为authorization_code
```
metadata:true
content-type:text/plain;charset=UTF-8
Authorization:Basic OTg5MTU2NjI4MzQyNzI1MDphYmNkMTIzNA==
https://oauth2.jdcloud.com/token?grant_type=authorization_code&code=ROCxyxFL

{"access_token": "6dgnMg9jAmvEmY7Fx8Boi3a7yuO3raNg","refresh_token": "blUmpd6ASyVieLEB","token_type": "Bearer","expires_in": 3599}
```
> grant_type为refresh_token
```
metadata:true
content-type:text/plain;charset=UTF-8
Authorization:Basic OTg5MTU2NjI4MzQyNzI1MDphYmNkMTIzNA==
https://oauth2.jdcloud.com/token?grant_type=refresh_token&refresh_token=blUmpd6ASyVieLEB

{"access_token": "HGKLyJiujF3o7WYxT3fNTNu5hmiOORoF","token_type": "Bearer","expires_in": 3599}
```

- 错误示例（Examples of error）
> Header格式不正确（如base64信息前缺少 “Basic空格” 关键字，请对照 “请求头” 说明和请求示例进行确认），或传值不正确（如base64信息中缺少冒号分隔符，或client_secret值错误 - 如果不能确认client_secret值，请登录控制台重置应用密码）
```
{"error": "unauthorized_client","error_description": "Basic authorization error, invalid authorization header"}
```
> code已过期（5分钟过期）或已失效（使用过一次后code自动失效），此时应重新请求authorize获取新的code
```
{"error": "invalid_request","error_description": "Invalid authorization_code"}
```

### 用户信息端点（UserInfo Endpoint）

- 地址（Path）：{oauth2}/userinfo
- 方法（Method）：GET/POST
- 请求头（Header）
```
Authorization:Bearer access_token
```
- 请求参数（Parameters）
无
- 请求示例（Example）
```
metadata:true
content-type:text/plain;charset=UTF-8
Authorization:Bearer 6dgnMg9jAmvEmY7Fx8Boi3a7yuO3raNg
https://oauth2.jdcloud.com/userinfo

{"name": "poolName/myPool/userName/myUser","account": "myAccount","type": "pool"}
```
返回结果中，account参数为租户的唯一标识，name为租户下用户的唯一标识，type为name对应的用户类型，与应用设置的面向用户类型有关：
1. "type":"root"：登录用户为京东智联云主账号，主账号的用户标识name与租户标识account相同
2. "type":"sub"：登录用户为京东智联云子用户，子用户标识name为子用户名
3. "type":"pool"：登录用户为京东智联云用户池用户，池用户标识name为 “poolName/myPool/userName/myUser” 格式

### 令牌撤销端点（Revocation Endpoint）

- 地址（Path）：{oauth2}/revoke
- 方法（Method）：GET/POST
- 请求头（Header）：客户端密码通过HTTP基础身份验证的应用适用
```
Authorization:Basic base64(client_id:client_secret)
```
- 请求参数（Parameters）

| 参数名 | 是否必须 | 值 | 格式 | 备注 |
| :--------- | :--------- | :--------- | :--------- | :--------- |
| client_id | 否 | 16位ID | string | 客户端密码通过请求参数验证或不需要验证的应用适用 |
| client_secret | 否 | 应用客户端密码 | string | 客户端密码通过请求参数验证的应用适用 |
| token_type_hint | 否 | access_token/refresh_token | string | 需要被撤销的token类型，默认值为access_token |
| token | 是 | 指定token的值 | string | 需要撤销的token |

- 请求示例（Example）
```
metadata:true
content-type:text/plain;charset=UTF-8
Authorization:Basic OTg5MTU2NjI4MzQyNzI1MDphYmNkMTIzNA==
https://oauth2.jdcloud.com/revoke?token_type_hint=refresh_token&token=blUmpd6ASyVieLEB
https://oauth2.jdcloud.com/revoke?token_type_hint=access_token&token=HGKLyJiujF3o7WYxT3fNTNu5hmiOORoF

HTTP 200 OK
```

### 令牌状态查询端点（Introspection Endpoint）

- 地址（Path）：{oauth2}/introspect
- 方法（Method）：GET/POST
- 请求头（Header）：客户端密码通过HTTP基础身份验证的应用适用
```
Authorization:Basic base64(client_id:client_secret)
```
- 请求参数（Parameters）

| 参数名 | 是否必须 | 值 | 格式 | 备注 |
| :--------- | :--------- | :--------- | :--------- | :--------- |
| client_id | 否 | 16位ID | string | 客户端密码通过请求参数验证或不需要验证的应用适用 |
| client_secret | 否 | 应用客户端密码 | string | 客户端密码通过请求参数验证的应用适用 |
| token_type_hint | 否 | access_token/refresh_token | string | 需要被撤销的token类型，默认值为access_token |
| token | 是 | 指定token的值 | string | 需要查询的token |

- 请求示例（Example）
```
metadata:true
content-type:text/plain;charset=UTF-8
Authorization:Basic OTg5MTU2NjI4MzQyNzI1MDphYmNkMTIzNA==
https://oauth2.jdcloud.com/introspect?token_type_hint=access_token&token=HGKLyJiujF3o7WYxT3fNTNu5hmiOORoF

{"active": false}

{"active": true,"username": "myUser","client_id": "9891566283457220","token_type": "Bearer"}
```
### {oauth2}环境变量

| 环境 | {oauth2}变量值 |
| ---- | ------------- |
| 京东智联云主站 | https://oauth2.jdcloud.com |
