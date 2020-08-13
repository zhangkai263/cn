## 调用过程中公共错误码参考

### 当您使用SDK经过京东云API网关对API进行调用时，可参考如下的公共错误码信息：

#### （1）客户端错误

Http 状态码|错误代码|错误信息|语义|解决方案
------|-----------|----------|---|------
400|HTTP_BAD_REQUEST|the request blocked by security rules|请求被安全规则拦截|参考京东云waf
401|ACCESS_ERROR|Invalid authentication credentials|认证凭证不合法|请使用有权限的访问密钥，或联系服务商提供有权限的访问密钥
401|ACCESS_ERROR|Invalid accessKey|访问密钥错误|需正确填写访问密钥
401|ACCESS_ERROR|lack of header authorization|header中缺少authorization信息|如果使用的是订阅密钥访问，确认订阅密钥是否正确。否者使用服务商提供的sdk访问服务
401|ACCESS_ERROR|lack of credential in the header authorization|authorization中缺少credential 信息|使用服务商提供的sdk访问服务
401|ACCESS_ERROR|lack of header x-jdcloud-date|header中缺少x-jdcloud-date信息|使用服务商提供的sdk访问服务
401|ACCESS_ERROR|lack of header signedHeaders|header中缺少signedHeaders信息|使用服务商提供的sdk访问服务
401|ACCESS_ERROR|sign result is not same|客户端和网关的签名不一致|检查调用数据有没有被修改，和确认ak,sk填写是否正确
403|HTTP_FORBIDDEN|Your IP address is not allowed|当前客户端IP不允许访问服务|联系服务商进行ip权限配置
403|HTTP_FORBIDDEN|api is disabled|API不可用|该API分组已下线
404|NOT_FOUND|no route and no API found with those values|找不到api和路由|该分组没有发布，请确认域名是否使用正确，或联系服务商
413|HTTP_REQUEST_ENTITY_TOO_LARGE|Payload too large|请求体太大|请求body超时限制，目前请求body大小限制为100m
414|HTTP_URI_TOO_LONG|URI too long|请求url太长|请求url超出限制，目前限制为8k
429|HTTP_RATE_LIMIT_EXCEEDED|minute rate limit exceeded, role:ak|因 accessKey流控被限制|调用频率过高导致被流控，可以联系 API 服务商协商放宽限制
429|HTTP_RATE_LIMIT_EXCEEDED|minute rate limit exceeded, role:api|因 API 分组流控被限制|调用频率过高导致被流控，可以联系 API 服务商协商放宽限制


#### （2）服务器端错误
以下为API服务端错误，如果频繁错误，可联系服务商。

Http 状态码|错误代码|错误信息|语义|解决方案
------|-----------|----------|---|------
500|HTTP_INTERNAL_SERVER_ERROR|An unexpected error occurred|内部错误|建议重试,或者联系服务商
502|HTTP_BAD_GATEWAY|An invalid response was received from the upstream server|服务端返回错误|建议重试,或者联系服务商
503|HTTP_SERVICE_UNAVAILABLE|The upstream server is currently unavailable|后端服务不可用|建议重试,或者联系服务商
504|HTTP_SERVER_TIMING_OUT|The upstream server is timing out|后端服务超时|建议重试,或者联系服务商
