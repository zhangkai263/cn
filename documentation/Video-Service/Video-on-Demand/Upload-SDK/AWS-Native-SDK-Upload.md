# 功能介绍

京东云视频点播支持使用AWS原生SDK进行媒资文件的上传，默认使用分片上传，最大支持48.8TB的单个文件，且支持断点续传，旨在让客户方便、快速实现媒体文件的上传。

# 准备工作
**服务开通**
请确认您已开通了视频点播服务，如未开通，请参考[开通服务](https://github.com/jdcloudcom/cn/blob/edit/documentation/Video-Service/Video-on-Demand/Getting-Started/Service-Provisioning.md)。

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

**使用Base64 解析上传凭证(authToken)，得到OSS的上传地址和授权信息**
authToken字段Base64解码后，得到JSON格式字符串，包含字段如下：
<table>
<tr>
    <td>变量名</td>
    <td>含义</td>
</tr>
<tr>
    <td>accessKey</td>
    <td>点播系统ak</td>
</tr>
<tr>
    <td>secretKey</td>
    <td>点播系统sk</td>
</tr>
<tr>
    <td>sessionToken</td>
    <td>鉴权token</td>
</tr>
<tr>
    <td>expiration</td>
    <td>过期时间</td>   
</tr>
<tr>
    <td>endpoint</td>
    <td>OSS 区域地址</td>
</tr>
<tr>
    <td>region</td>
    <td>OSS 区域</td>
</tr>
<tr>
    <td>bucket</td>
    <td>OSS Bucket名称</td>
</tr>
<tr>
    <td>objectKey</td>
    <td>媒体文件OSS位置</td>
</tr>                
</table>

**调用AWS SDK将视频文件上传至指定bucket的指定位置，（使用解析后的上传地址和授权信息初始化AWS客户端，不要使用自己的AccessKey等信息）。**

# 代码实现
**核心代码实现共分4步：**
1.使用AKSK初始化VOD客户端   
2.获取视频上传地址和凭证   
3.解析并使用上传凭证和地址初始化AWS客户端    
4.上传本地文件

使用AWS SDK在服务端上传，可参考如下版本：
# JAVA上传示例
**安装依赖**
```
<dependency>
    <groupId>com.amazonaws</groupId>  
    <artifactId>aws-java-sdk-s3</artifactId>  
    <version>1.11.136</version>  
</dependency>
```
