# 检测任务列表
进入视频质量检测控制台，默认进入“检测任务列表”页面，在任务列表中可查看已经创建完成的检测任务，此页面信息及主要功能如下：
![](https://github.com/jdcloudcom/cn/blob/cn-Video-Quality-Detection/image/video-quality-detection/%E8%B4%A8%E6%A3%80%E6%96%B01.png)

1.【新建检测任务】，创建检测任务入口；  
2.【任务状态筛选】，查询任务时，可根据任务状态筛选，任务状态包括准备、成功、失败、检测中；创建完成的任务自动进入准备状态，检测成功和失败表示任务检测完成，可查看检测结果。  
3.【时间筛选】，查询任务时，支持按照时间维度筛选；  
4.【任务操作】，包括“检测结果”、“复制”、“删除”三部分，其中“检测结果”在任务检测完成（状态包括成功和失败）后可点击查看；“复制”是指复制任务地址；“删除”是指删除该检测任务。   

## 新建检测任务
点击【新建检测任务】，可打开新建新建检测任务窗口，输入URL并选择检测模板即可创建任务。   
注意：单个任务支持添加多个URL，多个URL以换行区分，最大支持20个视频同时检测。。
![](https://github.com/jdcloudcom/cn/blob/cn-Video-Quality-Detection/image/video-quality-detection/%E8%B4%A8%E6%A3%80%E6%96%B02.png)

## 查看检测结果
任务检测完成后，点击【任务操作】中的“检测结果”，可查看检测结果详情，如下图所示，检测成功的任务可查看所有检测项的检测值、开始/结束时间等信息；检测失败的任务会展示失败原因，如“该文件不是视频文件”、“URL不可用”等。
![](https://github.com/jdcloudcom/cn/blob/cn-Video-Quality-Detection/image/video-quality-detection/%E8%B4%A8%E6%A3%803.png)

检测原理：基于算法和检测项特征计算各检测项的缺陷程度，通过输出检测项的值与取值范围对比，直观的反应检测结果。    
各检测项的取值范围及说明如下所示：
![](https://github.com/jdcloudcom/cn/blob/cn-Video-Quality-Detection/image/video-quality-detection/%E8%B4%A8%E6%A3%804.png)

