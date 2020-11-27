# 创建视频截图工作流
### 此版媒体处理服务不再维护。推荐您使用[新版媒体处理服务](https://docs.jdcloud.com/cn/media-processing-service/product-overview)

## 操作步骤

1.登录[媒体处理服务控制台](https://mps-v1-console.jdcloud.com/)。

2.单击【视频截图工作流】按钮。

3.选择所需的地域。

4.单击新建视频截图按钮。

![](https://github.com/jdcloudcom/cn/blob/edit/image/Media-Processing-Service/MPS-007.png)

5.在新建视频截图弹框中，分别点击选择源Bucket,目标Bucket,截图文件格式和截图方式。点击选择源视频文件或者输入文件名检索。 输入截图文件前缀，文件格式，截图宽度，截图高度，截图数量。单击确定按钮提交视频截图任务。

截图方式支持单张截图，多张截图，平均截图，单张截图必须输入开始时间，多张截图必须输入开始与结束时间

多张截图，平均截图必须指定数量，截图数量必须在1-3600之间

关键帧默认开启

6.查看截图任务及状态

在 【媒体处理服务】>>【视频截图工作流】任务列表中。选择 地域 ，时间范围，查看截图任务

  i.查看任务列表及截图的状态

![](https://github.com/jdcloudcom/cn/blob/edit/image/Media-Processing-Service/MPS-008.png)

  ii.单击 TaskId 可查看任务详情

![](https://github.com/jdcloudcom/cn/blob/edit/image/Media-Processing-Service/MPS-009.png)
