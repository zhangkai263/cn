# ToKen管理

视音频通信控制台支持在线生成签名ToKen，开发者和京东云的服务通过签名ToKen验证建立信任关系，以避免加密密钥泄露导致的流量盗用。

## Token生成

1.进入视音频通信控制台，选择左侧栏的”ToKen管理“。

![](https://github.com/jdcloudcom/cn/blob/cn-Real-Time-Communication/image/Real-Time-Communicat/RTC-token%E7%94%9F%E6%88%90%E5%99%A8.png)

1）单击下拉框选择您已创建的应用（appid）。

2）在应用管理菜单找到并填写对应应用的appKey。

3）填写userRoomId，支持正整数（20位以内）。

4）填写userId，支持大小写字母、数字、下划线（_）、中划线（-）。

5）选择有效期（timestamp），支持12小时、24小时、3天、7天。

填写完成后，点击生成Token。

![](https://github.com/jdcloudcom/cn/blob/cn-Real-Time-Communication/image/Real-Time-Communicat/RTC-ToKen%E7%94%9F%E6%88%90%E7%BB%93%E6%9E%9C.png)

## Token校验器

1.进入视音频通信控制台，选择选项卡中的”ToKen校验器“。

![](https://github.com/jdcloudcom/cn/blob/cn-Real-Time-Communication/image/Real-Time-Communicat/RTC-token%E6%A0%A1%E9%AA%8C%E5%99%A8.png)

1）单击下拉框选择您已创建的应用（appid）。

2）在应用管理菜单找到并填写对应应用的appKey。

3）填写在Token生成器中生成的token

4）填写userRoomId，支持正整数（20位以内）。

5）填写userId，支持大小写字母、数字、下划线（_）、中划线（-）。

6）填写随机码（nonce），在Token生成或API返回时可查。

7）填写生成Token时选择的有效期（timestamp）。

填写完成后，点击验证Token即可。
