# 访问控制

##  Referer防盗链

通过配置访问的referer黑白名单来对访问者身份进行识别和过滤，从而限制资源被恶意访问的情况。

![Referer防盗链](/image/Intelligent-Edge-Security/Referer防盗链.png)

- referer黑名单：不允许符合规则的请求来访问；referer白名单：允许符合规则的请求来访问

- 允许通过浏览器直接访问资源URL：是否允许无referer字段的请求访问（目前只支持无referer字段，referer字段为空的场景后续支持）

- referer黑白名单配置只能生效一种，选择白名单时，不能规则和“允许通过浏览器直接访问资源URL”均为空

- 支持多个referer配置，最多50个，且不能重复

- 支持泛域名规则配置

## URL鉴权 

  设置鉴权Key对URL进行加密，保护用户源站资源。

  ![URL鉴权](/image/Intelligent-Edge-Security/URL鉴权.png)

## UA访问控制

通过配置访问的UA黑白名单来对访问者身份进行识别和过滤，从而限制资源被访问的情况。
 ![UA访问控制](/image/Intelligent-Edge-Security/UA访问控制.png)

## IP黑名单

禁止来自黑名单的IP访问该域名

![IP黑名单](/image/Intelligent-Edge-Security/IP黑名单.png)

- 可设置多个IP以及IP地址段，最多添加50个；
- 不能重复添加同一个IP。