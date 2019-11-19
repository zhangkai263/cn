# 数据可视化

数据可视化的目的是让用户直观地在图表中看到所要监控的数据，我们提供的数据可视化功能包括趋势图、仪表盘和单IP搜图。

**（1）仪表盘**：允许用户业务逻辑和层级关系自由组合图形图表，将需要经常查看的数据集中在一起，配置成功后可随时查看

​       •  可按业务逻辑与层级关系，创建最多三级菜单

​      •  支持配置同期对比图

​      •  支持将多个同类型或有内在联系的监控项放在同一个图中查看

​      •  用户可自由组合仪表盘，用途如：

​       （1）例检资源情况：业务机器数量，资源机资源使用情况（cpu空闲率，磁盘空闲率，内存可用百分比）

​       （2）例检业务情况：重要模块业务量、重要业务指标的数量/流量等

​       （3）错误类监控

​       （4）更多...

**（2） 趋势图**：按监控指标的维度，查看各个监控对象的监控值

​      •  常用监控项一键查看

​      •  支持一键分享

​      •  支持查看大图

  **（3）单ip查图**：查看单机以及所属实例的监控指标。

​          输入ip快速查看趋势图

## 操作指南


**(1) 仪表盘：**

步骤一：选中服务树节点，菜单选择【智能监控】-【数据可视化】-【仪表盘】，进入如下页面。

点击“新建dashboard”菜单，首先创建仪表盘菜单。

![image](https://github.com/jdcloudcom/cn/blob/DevOps-guhezhu1/image/DevOps/Operation-Guide39.JPG)

点击“添加一级菜单”，首先创建一级目录，可理解为主要层级或分类，然后根据需求继续添加二级、三级菜单，仪表盘允许添加最多三级菜单。点击菜单后的☆，可将其设置为默认菜单，展示在当前服务树节点的仪表盘首页。点击编辑（返回图表）按钮，返回图表展示页。

![image](https://github.com/jdcloudcom/cn/blob/DevOps-guhezhu1/image/DevOps/Operation-Guide40.JPG)

步骤二：点击图中的“设置”按钮，在下拉框中选择“添加图表”-“趋势图”，打开添加趋势图配置窗口。

![image](https://github.com/jdcloudcom/cn/blob/DevOps-guhezhu1/image/DevOps/Operation-Guide41.JPG)

产品线和产品线以下节点，支持通过表单和JSON两种方式配置仪表盘。可按如图所示步骤配置想要查看的监控项。

![image](https://github.com/jdcloudcom/cn/blob/DevOps-guhezhu1/image/DevOps/Operation-Guide42.JPG)


**(2) 趋势图**

选中服务树应用、系统或产品线节点，菜单选择【智能监控】-【数据可视化】-【趋势图】，进入如下页面。

在左侧区域选择ns，然后在右侧框选择要查看的监控项类型及具体的监控项，勾选后在下方出图，查看各监控项的数据情况，以趋势图形式展示。

使用场景：

（1）观测数据情况（趋势图变化趋势、无数据、断点等情况），快速查看某一应用或分组下，多个实例or机器对应（多个）metric的趋势图，且可快速切换ns；

（2）问题排查。

![image](https://github.com/jdcloudcom/cn/blob/DevOps-guhezhu1/image/DevOps/Operation-Guide43.JPG)


**(3) 单IP搜图**

菜单选择【智能监控】-【数据可视化】-【单IP搜图】，进入如下页面。在搜索框中输入IP，点击搜索按钮，即可查看对应机器、实例的监控项与趋势图。支持切换所属产品线（有些机器可能跨产品线），便于用户根据机器IP查看其各类监控数据，查找定位问题。

![image](https://github.com/jdcloudcom/cn/blob/DevOps-guhezhu1/image/DevOps/Operation-Guide44.jpg)
