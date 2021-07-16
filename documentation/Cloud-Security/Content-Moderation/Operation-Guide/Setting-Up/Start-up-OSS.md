# OSS违规检测设置

在您使用OSS违规检测审核时，可以配置回调地址，接收OSS检测的审核结果。本页主要为您介绍设置方法。

## 条件

已开通内容安全服务使用OSS违规检测。具体操作请参见[开通与购买](https://docs.jdcloud.com/cn/content-moderation/purchase-process)。

## 操作步骤

1. 登录[京东云内容安全控制台](https://censor-console.jdcloud.com/overview)。

2. 前往**设置**>**OSS违规检测**页面。

3. 选择**回调通知**页签，您可以填写回调地址，用于接收OSS检测自动审核的检测结果。按照下表项输入完毕后，点击**确认保存**。

   ![image](../../../../../image/Content-Moderation/Update-Website\8.setting-up-OSS.png)

   

   | 配置项           | 说明                                                   |
   | :--------------- | :----------------------------------------------------- |
   | **回调地址**     | 填写回调地址，用于接收OSS检测自动审核的检测结果        |
   | **生效模块**     | 可以选择回调地址生效模块，增量扫描或者存量扫描生效。   |
   | **开启扫描回调** | 开启开关，则回调配置生效，关闭开关，则回调配置不生效。 |

4. 点击**增量扫描设置**页签，配置过程请参考[扫描设置](https://docs.jdcloud.com/cn/content-moderation/oss-scan-setting)。