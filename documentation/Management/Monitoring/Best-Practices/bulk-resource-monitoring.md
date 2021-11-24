# 批量资源监控
## 适用场景
用户由于业务需求需要将批量同类资源放在同一张监控表中进行监控，或者是需要将同一资源的多个监控项放在同一张图进行监控，用户可选择使用dashboard监控面板。
## 操作步骤
1. 登录京东云云监控控制台dashboard下的监控面板页面。
2. 点击左上角的“创建面板”。
3. 填写监控面板名称，点击确定完成创建监控面板。
![](https://raw.githubusercontent.com/jdcloudcom/cn/edit/image/Cloud-Monitor/zuijiashijian/%E6%9C%80%E4%BD%B3%E5%AE%9E%E8%B7%B51.1.png)
4. 进入监控面板详情页，点击右上角的“添加图表“。进入图表配置页面，配置如下参项：
- 图表类型:折线图或者TopN ，折线图以趋势图的形式展示指标走向，TopN表格对指标汇总排序
- 视图维度：折线图时，需要选择该项。提供明细（多个实例的指标放在同一张图中对比展示），汇总图（多个实例的相同指标汇总统计为1条线展示）
- 监控项：监控指标支持添加多个监控项。
- 监控资源：指定加入图标的资源实例，云主机支持以标签为维度筛选（带了所选标签的云主机自动加入该图表）。
5. 点击确定，完成监控图表的创建。
![](https://raw.githubusercontent.com/jdcloudcom/cn/edit/image/Cloud-Monitor/zuijiashijian/%E6%9C%80%E4%BD%B3%E5%AE%9E%E8%B7%B51.2.png)
6. 进入监控面板详情页，查看监控图表
![](https://github.com/jdcloudcom/cn/blob/edit/image/Cloud-Monitor/zuijiashijian/%E6%9C%80%E4%BD%B3%E5%AE%9E%E8%B7%B51.3.png)
