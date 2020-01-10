# 功能介绍

京东云视频点播支持使用AWS原生SDK进行媒资文件的上传，默认使用分片上传，最大支持48.8TB的单个文件，且支持断点续传，旨在让客户方便、快速实现媒体文件的上传。

# 准备工作
**服务开通**
请确认您已开通了视频点播服务，如未开通，请参考[开通服务](https://github.com/jdcloudcom/cn/blob/edit/documentation/Video-Service/Video-on-Demand/Getting-Started/Service-Provisioning.md)

# 上传步骤
![](https://github.com/jdcloudcom/cn/blob/cn-Video-On-Demand/image/Video-on-Demand/AWS%E5%8E%9F%E7%94%9FSDK%E4%B8%8A%E4%BC%A0%E6%AD%A5%E9%AA%A4.png)

**访问点播SDK获取上传地址和上传凭证信息，包含如下字段：**
<table>
<tr>
    <td>变量名</td>
    <td>含义</td>
</tr>
<tr>
    <td>videoId</td>
    <td>媒资ID,token过期后可用于刷新上传地址和凭证 </td>
</tr>
<tr>
    <td>uploadUrl</td>
    <td>上传链接，可直接put上传小文件</td>
</tr>
<tr>
    <td>authToken</td>
    <td>Base64编码后的上传凭证</td>
</tr>                
</table>

