## 本地验证

在把业务流量切到WAF上之前，建议您先通过本地验证确保一切配置正常，WAF转发正常。本地验证需要在本地模拟接入WAF，然后访问被防护网站，验证WAF正常转发。

通过修改本地hosts文件模拟接入WAF，将从本地访问被防护站点的请求导向WAF。以Windows操作系统和域名wodemo.jd.com为例：

1、记录WAF生成的域名，此域名位于云WAF网站配置界面中，DNS解析状态栏下的复制按钮处，将鼠标移动到其位置即可复制。（详情见下图）

![img](https://github.com/jdcloudcom/cn/blob/dns-zhangjingfeng/image/waf-img/%E6%96%B0%E6%9C%AC%E5%9C%B0%E9%AA%8C%E8%AF%81-1.png)

2、打开windows操作系统的命令行管理器，Ping上图生成的域名（本例为wodemo.jd.com-b0c363ff83ca.jdcloudwaf.com ），得到一个IP地址：101.124.17.209

![img](https://github.com/jdcloudcom/cn/blob/dns-zhangjingfeng/image/waf-img/%E6%96%B0%E6%9C%AC%E5%9C%B0%E9%AA%8C%E8%AF%81-2.png)

3、用记事本或notepad++等文本编辑器打开hosts文件，hosts文件一般位于C:\Windows\System32\drivers\etc\hosts路径。

![img](https://github.com/jdcloudcom/cn/blob/dns-zhangjingfeng/image/waf-img/%E6%9C%AC%E5%9C%B0%E9%AA%8C%E8%AF%81-1.png)

4、在最后一行添加如下内容：上面得到的防护IP（101.124.17.209）以及被防护的域名（本例为wodemo.jd.com）

![img](https://github.com/jdcloudcom/cn/blob/dns-zhangjingfeng/image/waf-img/%E6%96%B0%E6%9C%AC%E5%9C%B0%E9%AA%8C%E8%AF%81-3.png)

5、保存hosts文件，本地ping一下被防护的域名。此时解析到的IP地址应该是刚才绑定的WAF IP地址。如果依然是源站地址，可尝试刷新本地的DNS缓存（Windows的cmd下可以使用ipconfig/flushdns命令）。

![img](https://github.com/jdcloudcom/cn/blob/dns-zhangjingfeng/image/waf-img/%E6%96%B0%E6%9C%AC%E5%9C%B0%E9%AA%8C%E8%AF%81-4.png)

6、验证WAF转发正常，确认hosts绑定已经生效（域名已经本地解析为WAF IP）后，打开浏览器，输入该域名进行访问，如果WAF的配置正确，网站能够正常打开。
