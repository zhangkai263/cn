# 常见问题

**Q：JRTC 支持哪些平台？**

A：JRTC支持的平台包括iOS、Android、Windows(C++)、Windows(C#)、Mac、Web、Electron、微信小程序。


**Q：什么是Token？**

A：Token是一种安全保护签名，目的是为了阻止恶意攻击者盗用您的云服务使用权。使用JRTC服务时您需要在相应SDK的初始化或登录函数中提供AppID，UserID和Token三个关键信息。
其中AppID用于标识您的应用，UserID 用于标识您的用户，而Token则是基于前两者计算出的安全签名，它由加密算法计算得出，只要攻击者不能伪造Token，就无法盗用您的云服务流量。


**Q：视音频通信如何收费？**

A：视音频通讯收费项包括音视频通信时长、云端录制、旁路转推等计费项，详细计费说明请参见“[计费规则](https://docs.jdcloud.com/cn/real-time-communication/billing-rules)”。
