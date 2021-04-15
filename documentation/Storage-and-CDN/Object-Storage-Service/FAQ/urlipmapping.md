# 对象存储域名内网IP新旧对应表

京东云对象存储产品将于2021年3月23日切换以下对象存储域名的后端内网IP，现有域名将直接解析到新的后端IP，如您使用域名对对象存储进行访问，则切换不会对上层业务造成影响。
如使用了Nginx访问对象存储，需要使用使用nginx -s reload 命令，重载Nginx，刷新缓存，确保正确访问到新的后端IP；
如使用对象存储域名时，绑定了内网hostIP，请根据下表，变更hostIP。

| 域名                                                         | 老VIP                                                | 新VIP                            |
| ------------------------------------------------------------ | ---------------------------------------------------- | -------------------------------- |
| *.openapi-internal.cn-north-1.jdcloudcs.com<br />openapi-internal.cn-north-1.jdcloudcs.com | 100.64.239.131                                       | 100.64.130.80<br />100.64.130.88 |
| s3-internal.cn-north-1.jdcloud-oss.com<br />*.s3-internal.cn-north-1.jdcloud-oss.com | 100.64.249.192 100.64.249.132                        | 100.64.130.80<br />100.64.130.88 |
| oss-internal.cn-north-1.jcloudcs.com<br />*.oss-internal.cn-north-1.jcloudcs.com | 100.64.249.131 100.64.249.196                        | 100.64.130.80<br />100.64.130.88 |
| s3.cn-north-1.jcloudcs.com<br />*.s3.cn-north-1.jcloudcs.com | 100.64.249.195                                       | 100.64.130.80<br />100.64.130.88 |
| s3.cn-north-1-nat.jdcloudcs.com<br />*.s3.cn-north-1-nat.jdcloudcs.com | 10.160.250.131 <br />10.219.226.2<br /> 10.219.227.2 | 10.160.146.128                   |
| oss-nat.cn-north-1.jcloudcs.com<br />*.oss-nat.cn-north-1.jcloudcs.com | 10.160.250.138                                       | 10.160.146.128                   |
| mall-internal.portal.cn-north-1.jdcloud-oss.com              | 100.64.249.135<br />100.64.249.197                   | 100.64.130.80<br />100.63.130.88 |
| *.s-bj-internal.jcloud.com<br />s-bj-internal.jcloud.com     | 100.64.2.236                                         | 100.64.130.80<br />100.63.130.88 |
| portal-internal.cn-north-1.jdcloud-oss.com                   | 100.64.249.193<br />100.64.249.133                   | 100.64.130.80<br />100.63.130.88 |
| az2-internal.cn-north-1.jdcloud-oss.com                      | 100.64.246.3 <br />100.64.246.4                      | 100.64.130.80<br />100.64.130.88 |