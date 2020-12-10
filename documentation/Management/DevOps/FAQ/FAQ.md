# FAQ

**Q：我的租户叫什么？**

**A**：登录DevOps后，鼠标悬停右上角的用户名，在下拉菜单中，将显示租户名/用户名

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/FAQ1.png)

**Q：如何将本地已编译好的程序包，上传到DevOps？**

**A**：进入到菜单栏->编译构建页面，左侧选中某应用，进入 模块 分页，点击 创建模块，创建一个模块。

点击已创建的模块的上传按钮

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/FAQ2.png)

**Q：如何同一个git项目下编译不同的模块module？**

**A**：1）需要创建build.sh，需满足编译产出在同级目录output/下，build.sh中接收不同的模块名称作为参数

 2）需要在bin/目录下创建control启停脚本，同理，通过接受不同的模块名作为参数来决定启动哪个模块
 
 3）对于编译不同模块，需要在编译构建的构建参数中指定，然后build.sh通过参数判断，来选择编译不同的模块

示例如下：

需求：代码库下的结构是： /A/m 和 /A/n 一个仓库的两个模块，而A是个目录（非maven工程） ，m 和n是两个maven工程。

解决：在m和n下 分别添加 build.sh，里面是这个项目的编译命令及方法。之后在代码库的根目录在提供一个build.sh，内容大致如下：

cd $1 //进入子目录  

source ./build.sh //运行子目录的编译脚本

之后在新建构建页面中，使用<子目录>为构建参数

需求： m工程下 会编译多个环境的包（比如：测试，生产），这个参数如何动态设置呢

解决：根目录的build接受两个参数 build.sh m test，根据第一个参数进入不同的文件夹，之后build.sh test，在这个build中定义test参数对应什么编译命令

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/FAQ3.png)

**Q：已经上传镜像到镜像广场，如何在新建编译构建页面，构建镜像的里面找到？**

**A**：在镜像广场，镜像详情页，修改镜像类型为编译镜像

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/FAQ4.png)

**Q：主机资源与服务树节点的对应关系？**

**A**：主机资源属于某一个产品线，不同产品线无法共用主机资源。产品线内，不同应用可共用主机资源。
