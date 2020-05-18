# 域名/网络

[Bucket如何绑定自定义域名？](Domain-Names-and-Network#user-content-1)

[一个Bucket最多可以绑定多少个域名？](Domain-Names-and-Network#user-content-2)

[OSS是否支持 HTTPS 访问？](Domain-Names-and-Network#user-content-3)

[OSS自定义域名如何实现HTTPS访问？](Domain-Names-and-Network#user-content-4)

------

<div id="user-content-1"></div>

#### Bucket如何绑定自定义域名？

1. 首先用户在OSS上创建了Bucket；
2. 在控制台上进入Bucket的【空间设置】->【自定义域名】，输入要绑定的域名，并提交；
3. 如果域名未备案，会绑定失败；
4. 如果自定义域名已经被当前账户下同一Region的其它存储空间（Bucket）绑定，需要先解绑，然后再进行绑定； 
5. 如果自定义域名被其它账户的存储空间(Bucket)绑定，需要通过修改域名服务器的TXT记录，进行域名所有权的验证，来删除之前的绑定关系，强制绑定到当前的存储空间（Bucket）；
6. 在域名绑定成功后，用户需在自己的域名服务器上，添加一条CNAME记录，记录值为要绑定Bucket的外网域名。这样，所有对用户自定义域名的访问都会被发送到OSS的存储空间（Bucket）；
7. 若您想支持https,目前仅支持**提交工单**完成。

具体操作流程请参见[自定义域名服务](https://docs.jdcloud.com/object-storage-service/set-custom-domain-name-2)。

<div id="user-content-2"></div>

#### 一个Bucket最多可以绑定多少个域名？

一个Bucket最多可以绑定20个域名。

<div id="user-content-3"></div>

#### OSS是否支持 HTTPS 访问？

支持。OSS在所有地域的访问节点都提供了SSL传输的支持，且在SDK和控制台都默认启用HTTPS。用户登录控制台后可看到object生成对应的外链url，url默认采用https协议，拷贝到浏览器中直接进行HTTPS访问即可，无其他特殊配置。

<div id="user-content-4"></div>

#### OSS自定义域名如何实现HTTPS访问？

具体操作请参见[自定义域名支持HTTPS访问OSS服务](https://docs.jdcloud.com/object-storage-service/custom-domain-name-guidance)。
