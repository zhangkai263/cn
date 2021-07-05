# 管理端基础操作

## 查看数据大屏列表

访问莫奈-数据可视化平台

![](http://storage.360buyimg.com/docs-image/e38cadd6807b4253a865234519381cfd.png)

点击数据可视化菜单，显示数据大屏列表，在这里我们可以看到当前这个用户所在的群组里所有用户创建的大屏，方便当前用户使用同一群组里其他用户创建的大屏。

用户可以在当前页面新建数据大屏，预览、修改、复制、重命名、删除已有的数据大屏，对未发布状态的大屏进行发布，对已发布的大屏取消发布，对已发布的大屏设置大屏访问权限等操作。发布状态的大屏拥有稳定的链接，而对大屏进行预览时只是生成了一个临时链接。

## 预览大屏

![](http://storage.360buyimg.com/docs-image/ba848089e9eea26082f2320b5419e4f8.png)

点击【预览】按钮，完成大屏的预览，对大屏进行预览时只是生成的一个临时链接，用于大屏制作者查看制作效果。

## 删除大屏

![](http://storage.360buyimg.com/docs-image/4de9188bf29e6e538e33b57fb8d2c41e.png)

点击【删除】按钮，对不需要的大屏进行删除操作，用户确认删除后即可删除大屏。已发布的大屏需要取消发布才能删除。

## 复制大屏

![](http://storage.360buyimg.com/docs-image/471583ed7c8739f34880ed26058263c7.png)

![](http://storage.360buyimg.com/docs-image/d219cb21581482e344188c82cf6aa4c6.png)

在需要复制的大屏上，点击【复制】按钮，确认复制后，完成大屏的复制，复制的大屏里的配置信息与原始大屏完全一致。

## 修改大屏名称

![](http://storage.360buyimg.com/docs-image/a565390a0e2b4da88141ee3bc0a090d0.png)

点击大屏名称前的【修改】按钮图标，大屏名称进入可编辑状态，如下图所示。

![](http://storage.360buyimg.com/docs-image/108b9df648f522947a694b27e12a3cf4.png)

修改大屏名称后，按回车键或点击其他空白区域完成大屏名称的修改。

## 发布大屏

![](http://storage.360buyimg.com/docs-image/70862de2fd37df59e72d0533f4740b4c.png)

在需要发布的大屏上，点击

![](http://storage.360buyimg.com/docs-image/60f1a363ce2ed7fbb122d0c8ece13bef.png)

开关，完成大屏的发布，发布后的大屏拥有稳定的访问链接，用户可以在任何地方访问此链接。

## 取消发布大屏

![](http://storage.360buyimg.com/docs-image/c14ea0b334ca177abc02b59aa8cf09b8.png)

在需要取消发布的大屏上，点击

![](http://storage.360buyimg.com/docs-image/0d653652f8bdd066fa79fb4b9799f88c.png)

开关，完成大屏的取消发布，取消发布后，之前发布大屏生成的访问链接失效。。

## 导出大屏

![](http://storage.360buyimg.com/docs-image/1593574635.png)

点击大屏导出，可以将此大屏以压缩文件形式导出，用于跨环境的大屏迁移。

## 导入大屏
![](http://storage.360buyimg.com/docs-image/1593574811.png)

点击屏幕右上方的导入大屏，可以把已经导出到本地的大屏直接导入在本环境中。

## 设置已发布大屏的访问权限

![](http://storage.360buyimg.com/docs-image/7f7519efc0844df98efcdc3090555b23.png)

在已发布的大屏上，点击【发布链接】按钮，查看已发布大屏的访问链接，点击链接可直接访问此大屏，在弹出窗口中可设置大屏的访问权限。

![](http://storage.360buyimg.com/docs-image/44ec07afcea1475ab8da6c3f735e53c4.png)

如上图所示，已发布的大屏在设置访问限制时有两种方式：访问密码和token验证。

访问密码：

如用户设置了访问密码，则已发布的大屏链接无法直接访问，需输入密码后才可见，如下图：

![](http://storage.360buyimg.com/docs-image/dca0b4c24613496a8490fe522d753aa1.png)

设置密码要求：密码长度只能6位，必须同时含有大写、小写字母和数字，不能以数字开头；

token验证：

前提要求：

大屏以Get的方式在URL中传递参数（直接在URL后面加参数）；

大屏URL中传递的参数要求不能被篡改；

如用户设置了token验证，则已发布的大屏链接无法直接访问，需通过莫奈提供的规则生成指定链接才可以访问，如下图：

规则如下：

http://monet.urban-computing.cn/#/screen?key={大屏uuid}&time={时间戳}&sign=md5({token}+{时间戳})

用户可通过此种方式将莫奈配置好的大屏嵌入其他系统中。

验证有效期：

![](http://storage.360buyimg.com/docs-image/e9953c9e4f104a86ac192987958d0ef2.png)

验证有效期开启后，首次验证成功之后的一段时间内无需验证即可成功访问大屏，超过时间需要重新验证，关闭后，每次访问都需要通过验证；

## 修改大屏

![](http://storage.360buyimg.com/docs-image/ebd1d475fdac9b396716dae0c0a2ad3f.png)

点击大屏上方，如图红框区域，即可进入大屏配置页面，进行大屏的修改。

## 创建空白大屏

点击页面中的【新建可视化】按钮，页面跳转到选择大屏模板页。

![](http://storage.360buyimg.com/docs-image/db5bfc427cf631d317be156212cd0081.png)

选择空白大屏，输入大屏名称，完成空白大屏的创建。

## 基于大屏模板创建大屏

点击页面中的【新建可视化】按钮，页面跳转到选择大屏模板页。

![](http://storage.360buyimg.com/docs-image/a49dd1606b3e6806d306b99122e5ac35.png)

选择一个大屏模板，输入大屏名称，基于此大屏模板，完成大屏的创建。

**通过大屏模板来创建大屏时，由于模板中已经把各种图表的配色调到最佳，我们只需要调整每个图表对应的数据，或者对图表进行简单的增加、修改和删除即可完成一个大屏的制作，极大缩短我们制作数据大屏的时间，对初学者是很友好的配置数据大屏的方法。但由于大屏模板只能满足有限的需求，当预置的大屏模板已经无法满足配置大屏的需求时，用户可以选择通过空白模板创建一个大屏。**


