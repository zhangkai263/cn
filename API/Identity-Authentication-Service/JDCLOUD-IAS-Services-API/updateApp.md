# updateApp


## 描述
更新应用（只传需要变更的参数，不传的参数不会更新）

## 请求方式
PUT

## 请求地址
https://ias.jdcloud-api.com/v1/regions/{regionId}/app/{clientId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**clientId**|String|True| |应用ID，应用创建时由京东云分配的16位数字ID|
|**regionId**|String|True| |地域编码，参考OpenAPI公共说明|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**accessTokenValiditySeconds**|Integer|False| |访问令牌有效期，值的范围为 600 秒到 6x3600=21,600 秒，即10分钟-6小时|
|**clientName**|String|False| |应用名|
|**clientUri**|String|False| |应用介绍地址，url不支持#符号|
|**contacts**|String|False| |应用联系信息|
|**extension**|String|False| |应用扩展信息|
|**grantTypes**|String|False| |支持的OAuth类型：<br/> authorization_code：OAuth2授权码模式<br/> implicit：OAuth2隐式授权模式<br/> refresh_token：启用刷新令牌<br/><br/> 支持以下值：<br/> （1）authorization_code<br/> （2）authorization_code,refresh_token<br/> （3）authorization_code,implicit<br/> （4）authorization_code,implicit,refresh_token<br/> （5）implicit<br/><br/>        注：如果grantTypes指定了refresh_token，应用将可以使用刷新令牌；如果在创建应用时未指定，则应用不能使用刷新令牌；任何时候应用都可以调用“更新应用”接口更改grantTypes设置|
|**jwks**|String|False| |JWKS|
|**jwksUri**|String|False| |JWKS地址，url不支持#符号<br/> jwksUri和jwks传一个即可|
|**logoUri**|String|False| |应用logo地址，url不支持#符号|
|**multiTenant**|Boolean|False| |是否为多租户应用<br/> "false"：该应用仅支持当前创建应用的租户访问，其他京东云租户无法访问<br/>        "true"：该应用支持其他京东云租户访问，但当前创建应用的租户不能访问|
|**policyUri**|String|False| |应用隐私政策地址，url不支持#符号|
|**redirectUris**|String|False| |回调地址，最多4个，多个url之间用逗号,分隔，每个url长度不超过1000，url不支持#符号|
|**refreshTokenValiditySeconds**|Integer|False| |刷新令牌有效期，值的范围为 30x24x3600=2,592,000 秒到 365x24x3600=31,536,000 秒，即30天-365天<br/><br/> 注：当 GrantTypes 包含 refresh_token 时，refreshTokenValiditySeconds 为必传参数|
|**scope**|String|False| |OAuth scope范围，支持的值为：<br/> （1）openid：用OpenID Connect协议进行身份认证<br/> 指定scope为openid，并在Authorization Endpoint请求该scope，京东云将返回用户的OpenID令牌；如果在创建应用时未指明该值，则应用不能请求OpenID令牌；任何时候应用都可以调用“更新应用”更改该设置|
|**secret**|String|False| |应用的密码，支持8-255位长度的ASCII可打印字符，建议使用足够复杂的密码策略<br/><br/> 注：当TokenEndpointAuthMethod不等于none时，secret为必传参数；反之，当指定了secret时，TokenEndpointAuthMethod不能等于none<br/> 京东云将不可逆加密secret，因此您无法再次从京东云查看该密码，但您可以随时通过更新应用重新设置secret|
|**tokenEndpointAuthMethod**|String|False| |客户端认证方式：<br/> none：不设置客户端密码（不推荐）<br/> client_secret_post：客户端必须设置密码，且该密码需要在OAuth2 Token Endpoint提供于请求的body<br/> client_secret_basic：客户端必须设置密码，且该密码需要在OAuth2 Token Endpoint提供于请求的header<br/><br/> 支持以下值：<br/> （1）none<br/> （2）client_secret_post<br/> （3）client_secret_basic|
|**tosUri**|String|False| |应用服务协议地址，url不支持#符号|
|**userType**|String|False| |能访问应用的账号类型，支持以下值：<br/> （1）root：支持主账号访问，子用户无法访问<br/> （2）sub：子用户账号，使用主账号不能访问<br/><br/> 注：multiTenant和userType的组合指定了应用的用户人群，典型的应用场景如：<br/> （1）应用向当前租户下的子用户开放（2）应用向京东云其他租户主账号开放|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result|更新应用返回结果|

### Result
|名称|类型|描述|
|---|---|---|
|**accessTokenValiditySeconds**|Integer|accessTokenValiditySeconds参数值|
|**account**|String|创建应用的账户用户名|
|**clientId**|String|应用ID，由京东云分配的16位数字ID|
|**clientName**|String|clientName参数值|
|**clientUri**|String|clientUri参数值|
|**contacts**|String|contacts参数值|
|**createTime**|Long|createTime参数值|
|**extension**|String|extension参数值|
|**grantTypes**|String|grantTypes参数值|
|**jwks**|String|jwks参数值|
|**jwksUri**|String|jwksUri参数值|
|**logoUri**|String|logoUri参数值|
|**multiTenant**|Boolean|multiTenant参数值|
|**policyUri**|String|policyUri参数值|
|**redirectUris**|String|redirectUris参数值|
|**refreshTokenValiditySeconds**|Integer|refreshTokenValiditySeconds参数值|
|**responseTypes**|String|当grantTypes为authorization_code时，responseTypes为code；当grantTypes为implicit时，responseTypes为token|
|**scope**|String|scope参数值|
|**secretUpdateTime**|Long|secretUpdateTime参数值|
|**tokenEndpointAuthMethod**|String|tokenEndpointAuthMethod参数值|
|**tosUri**|String|tosUri参数值|
|**updateTime**|Long|updateTime参数值|
|**userType**|String|userType参数值|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
