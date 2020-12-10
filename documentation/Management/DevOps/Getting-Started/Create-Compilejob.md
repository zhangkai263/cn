# 创建构建任务

新建编译构建任务，开始进行代码的编译。

**操作步骤**

1.选中左侧服务树中某应用，在菜单栏选择“持续交付-编译构建”，点击“新增构建”按钮，设置编译构建基本信息。

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Starting8.png)


- Git代码地址：填写源码地址，这里可以填写示例代码：https://code.jdcloud.com/devops-demo/java-demo.git
- 模块名：默认即可
- 代码分支：请填写master
- 构建镜像：官方 library/maven 3.5.0-jdk-8u20
- 构建方式：支持build.sh
- 触发条件：手动构建
- 版本规则：版本命名规则
- 构建上传位置：请选择与云主机一致的位置

在这里，还支持设置构建参数、消息通知、webhook、LFS、缓存编译区等功能

2.保存后进入编译构建列表，点击“立即构建”，可进行编译构建操作。

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Starting9.png)

构建成功即可在 模块—查看版本，看到已编译构建的模块版本。
