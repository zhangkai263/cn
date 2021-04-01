
# 页面规则

**安全加速页面规则功能说明**

当客户端请求与您配置定义的URL规则匹配时，页面规则就会被触发产生相应的操作。您可以通过以下内容了解创建和编辑页面规则，以及进行不同的设置。
对于不同版本套餐，配置页面规则的数量有所不同。页面规则为最高优先级。


页面规则基于以下格式匹配URL:

    <scheme>://<hostname><:port>/<path

举例如下:

    https://www.example.com:443/image.png

协议以及端口是可选的，则scheme匹配“http://”和“https://”，如果未指定端口，则该规则将匹配所有端口。


您可以随时禁用页面规则，禁用规则后操作不会被触发，但是仍然会显示在页面规则应用中，并且会计入套餐允许的规则数量。


**创建页面规则步骤参考**


1.登录京东云控制台，选择安全加速。

2.选择需要添加页面规则的域名。

3.单击页面规则，在页面规则下，找到需要编辑的规则进行配置。

4.根据需要启用或禁用规则，通过编辑修改URL以及需要更改的信息，通过删除按钮进行规则删除。


**通配符匹配**

您可以在URL中通过通配符星号（*）来匹配URL，例如：

    example.com/t*st

将会匹配：

    example.com/test
    example.com/toast
    example.com/trust
    ...

注意以下情况不进行匹配：

      example.com/foo/*
      example.com/foo

通配符匹配参考：

    在转发URL设置中，可应用如下的配置，如：

    转发http：//*.example.com/* 到 http://example.com/images/$1/$2.jpg

    规则将匹配：

    http://cloud.example.com/flare.jpg 到 http://example.com/images/cloud/flare.jpg

