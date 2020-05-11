# 添加应用并授权

身份通支持OAuth2.0和SAML2.0类型的应用。OAuth2.0支持[授权码模式](https://tools.ietf.org/html/rfc6749#page-24)（Authorization Code Grant）和[隐式模式](https://tools.ietf.org/html/rfc6749#page-31)（Implicit Grant），SAML2.0通过HTTP-POST Bindings支持[SSO Profile](https://docs.oasis-open.org/security/saml/v2.0/saml-profiles-2.0-os.pdf)。

## 创建应用

进入应用管理页面，点击 “创建应用” 并选择要创建的应用类型 - OAuth2.0应用或SAML2.0应用。填写应用名称和描述后，点击 “下一步” 按钮，应用即创建成功。应用创建后，应用类型不能更改。

![创建应用](../../../../image/IDaaS/create-app-0.png)

## 配置应用

应用 “配置信息” 页面分为两部分。

第一部分 “身份服务提供商信息” 为身份通作为IdP的元数据信息，被添加的应用程序将需要这些信息。OAuth2.0 IdP元数据信息也可以在[这里](https://idaas-idp-oauth2.jdcloud.com/)查看。

第二部分是 “应用信息配置”，这部分需要填写SP信任信息，请联系你的应用服务提供商获取这些信息。
