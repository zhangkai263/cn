## 统计数据查看

您可以在内容安全控制台查看内容检测API的调用统计数据。

### 背景信息

内容安全控制台汇总了内容检测API的调用统计数据，支持查询最近3个月内文本、图片检测接口的总识别量（等于调用次数）、疑似违规量、违规内容量、违规比率。以及识别量变化趋势、违规内容类型分布以及识别量统计数据等。

### 操作步骤

1. 登录 京东云控制台，点击**安全-内容安全**，进入内容安全控制台。

2. 在左侧导航栏，单击**数据概览**。

3. 通过页签选择要查询的检测接口类型：**文本**、**图片**。

4. 在**数据概览**页面，选择查询时间，并单击查询**。

   支持查询的时间段为最近3个月内。支持设置的时间跨度为1个月。如图

   ![image-20191217165517857](C:\Users\wangxuejiao17\AppData\Roaming\Typora\typora-user-images\image-20191217165517857.png)

5. 可以在仪表盘上看到机器识别量、疑似违规量、违规内容量、违规内容比率（违规内容量/机器识别量）。如图

       ![img](D://wangxuejiao17//Documents//JD//office_dongdong//wangxuejiao17//Image//263c04b41ead2deb86129b911c418313_src)  

6. 可以在统计表上看到识别量变化趋势，包括调用次数、返回结果（正常量、疑似违规量、确认违规量）的变化。如下图，其中图片的可以按照接口维度查看，文本只有一个接口，只需看总量。

       ![img](D://wangxuejiao17//Documents//JD//office_dongdong//wangxuejiao17//Image//6bec3c00badaa3979cabbeab38f2fff5_src)  

   

  ![img](D://wangxuejiao17//Documents//JD//office_dongdong//wangxuejiao17//Image//16e1f6a1c193c3829436e52cc95f4985_src) 



7. 可以在页面右侧的违规文本（或图片）分布饼图中，看到违规内容的类型比例。如图

       ![img](D://wangxuejiao17//Documents//JD//office_dongdong//wangxuejiao17//Image//0d181472cbff8d760f5cf8735b66008e_src) 

     

       ![img](D://wangxuejiao17//Documents//JD//office_dongdong//wangxuejiao17//Image//f6def99281b640ad06a42a81a85c4ad7_src) 

      

8. 可以查看文本、图片识别量的详细统计，如下表。

       ![img](D://wangxuejiao17//Documents//JD//office_dongdong//wangxuejiao17//Image//fc005ee4b2f397cda6ae40748584a083_src)  

     ![img](D://wangxuejiao17//Documents//JD//office_dongdong//wangxuejiao17//Image//a8ae2df58bf613d5e0c46f489dbfc36a_src) 

9. 可以查看调用API服务的统计数据，查看调用不同API的调用数据。如下表是图片调用量统计。因为文本的调用量等同于识别量，无子场景分类。

     ![img](D://wangxuejiao17//Documents//JD//office_dongdong//wangxuejiao17//Image//11718a9391eec0531077ccb51b89c964_src) 


