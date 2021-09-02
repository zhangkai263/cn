# 使用报警回调将报警信息推送至钉钉群组

借助于 DingDing 支持 webhook 的方式发起通知的能力，我们可以将京东云的告警推送到 Dingding群组。分为以下2个步骤：

- 获取钉钉机器人webhook（报警回调地址）
- 创建告警规则，并启用报警回调。



## 获取机器人的webhook地址

1. 登录钉钉，打开机器人管理页面。以PC端为例，打开PC端钉钉，点击头像，选择“机器人管理”。

   ![](../img/dingding-1.png)

2. 在机器人管理页面选择“自定义”机器人，输入机器人名字并选择要发送消息的群组。

   ![](../img/dingding-2.png)  

   ![](../img/dingding-3.png)

   3. 安全设置中选择“**自定义关键词**”，关键词设置为“**监控报警**”，勾选我已阅读并同意《自定义机器人服务及免责条款》，点击“完成”。 

      注：关键词也可以自定义，但在第二步创建报警规则，填写POST时，标黄内容 "content": "XXXX" 需与你自定义的关键词保持一致。

   4. 完成安全设置后，复制出机器人的Webhook地址，可用于向这个群发送消息，格式如下：

      https://oapi.dingtalk.com/robot/send?access_token=XXXXXX

   ## 创建告警规则，启用报警回调

   1. 登录京东智联云，进入[云监控控制台](https://cms-console.jdcloud.com/overview)。 选择【报警管理】-【全部报警规则】，点击【添加报警规则】按钮，进入报警规则配置页面。

      ![](../img/shooting-rule_1.png)

   2. 填写基本信息、触发条件等必要的报警配置信息。在页面底部，勾选「开启URL执行动作」- 填写 webhook 信息：URL 及 POST body。 

      - URL填写第一步生成的 webhook 地址（直接复制过来的地址，需要去除 「https://」 的前缀）
      - b.	填写 body，可以复制以下的模板 （注：若钉钉机器人自定义的其他关键词则需修改以下标黄内容。）

      ```
      {
          "msgtype":"text",
          "text":{
              "content":"监控报警：${region} 的 ${serviceCode} 产品线的 ${resourceId} 发生了告警，告警详情：指标 ${metric} 已连续 ${times} 次达到告警阈值 ${threshold}, 当前值为 ${currentValue} ，告警时间 ${alertTime} 。"
          },
          "at":{
              "isAtAll":true
          }
      }
      
      ```

      ![](../img/dingding-4.png)

      注：通知内容您也可以自定义，可参照钉钉官网帮助文档，以下截图部分。

      ![](../img/dingding-5.png)

   3. 完成已上配置后，点击“完成创建”即可。

   4. 当资源到达监控报警的阈值时，钉钉群组内会收到如下示意的通知消息：

      ![](../img/dingding-6.png)

