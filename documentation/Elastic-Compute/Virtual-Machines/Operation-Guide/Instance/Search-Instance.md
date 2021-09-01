# 查找实例

默认情况下，实例列表展示的是当前地域下全部实例。为了帮助您快速搜索出当前地域下的特定实例，京东云提供实例搜索功能，目前支持您根据搜索项进行搜索。

## 前提条件及限制
支持以下搜索项
>不指定搜索项直接搜索时，将自动优先匹配内网IP地址和资源ID，如未匹配上则统一按名称搜索。

|搜索项|示例|搜索类型
|:---|:---|:---|
|实例名|`testVM`|支持单个，模糊搜索
|实例ID|`i-xxxxxxxx`|支持多个，精确搜索
|公网IPv4|`192.168.32.23`|支持单个，精确搜索
|内网IPv4|实例对应内网IPv4地址,示例`111.111.111.111`|支持多个，精确/模糊搜索
|可用区|`cn-north-1a`，可参阅[地域及可用区](../../Introduction/Regions-and-AvailabilityZones.md)|支持多个，精确搜索
|镜像ID|`img-xxxxx`|支持多个，精确搜索
|实例规格|`g.n2.large`|支持多个，精确搜索
|实例状态|`stopped`|支持多个，精确搜索
|高可用组ID|`ag-xxxxxx`|支持单个，精确搜索
|故障域|支持输入`1`,`2`,`3`,`4`,`5`|支持多个，精确搜索
|专有宿主机ID|`dh-xxxxxx`|支持多个，精确搜索
|专有资源池ID`dp-xxxxxx`|支持多个，精确搜索

## 操作影响
* 搜索条件间取为逻辑与，同一搜索条件不同搜索值之间取为逻辑或。
* 与列表表头筛选为逻辑与关系，即列表表头筛选等同于不同搜索条件。

## 操作步骤

1. 访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏**弹性计算-云主机**进入实例列表页。
2. 选择地域。
3. 您可通过键盘输入或下拉框选择搜索条件。
<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/search-instance-1.png" width="700"></div>
4. 输入搜索值，若支持多个搜索值，则以逗号分隔，回车生成搜索项后，可继续选择其他搜索条件并生成搜索项。完成输入后回车或点击搜索按钮则触发条件搜索。
<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/search-instance-2.png" width="1000"></div>
5. 若需要删除搜索项，则可通过键盘方向键选中搜索项再使用删除键删除选中项，或点击删除按钮进行删除，删除后需要重新触发搜索。
<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/search-instance-3.png" width="800"></div>
