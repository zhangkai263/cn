# 导出实例信息

您可通过控制台导出指定地域下的实例列表，可以自定义导出数据的范围、方式及相关信息。

## 前提条件及限制
* 单次支持最多2000条数据的导出，若您的数据超过2000条还请选择指定页码分次导出。
* 导出时间受实例项数影响，若数据较多时还请耐心等待。

## 操作步骤

1. 访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏 **弹性计算-云主机** 进入实例列表页。
2. 选择地域。
3. 点击实例列表页右上角点击导出列表icon。<br> ![](https://img1.jcloudcs.com/cn/image/vm/exportinstance.png)
4. 您可按需选择导出范围、导出方式及导出信息。
	<table align="right">
   <tr>
      <td><b>导出范围</b></td>
      <td><b>导出方式</b></td>
      <td><b>说明</b></td>
   </tr>
   <tr>
      <td rowspan="2">全部数据</td>
      <td >所有数据</td>
      <td >导出范围为您所有实例（不超过2000条）。例如您对257条数据有查询权限，则将导出所有257条数据。请注意若您的数据超过2000条还请选择指定页码导出。<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/export-instance-2.png" width="500"></div></td> 
   </tr>
   <tr>
      <td >指定页码</td>
      <td >导出范围为您所有资源中您指定的页码范围的实例。例如您对257条数据有查询权限，目前每页50条数据，您选择导出第2至第3页，则将导出第51条至第150条数据。<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/export-instance-1.png" width="500"></div></td> 
   </tr>
   <tr>
      <td rowspan="2">筛选数据</td>
      <td >所有数据</td>
      <td >导出范围为您指定搜索条件搜索后满足条件的所有实例（不超过2000条）。例如您对257条数据有查询权限，指定搜索条件搜索后有90条数据满足搜索条件，则将导出90条数据。请注意若您的数据超过2000条还请选择指定页码导出<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/export-instance-3.png" width="500"></div></td> 
   </tr>
   <tr>
      <td >指定页码</td>
      <td >导出范围为您指定搜索条件搜索后满足条件的且指定的页码范围的实例。例如您对257条数据有查询权限，指定搜索条件搜索后有90条数据满足搜索条件，目前每页50条数据，您选择导出第2页，则将导出第51条至第90条数据。<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/export-instance-4.png" width="500"></div></td> 
   </tr>
   <tr>
      <td >选中数据</td>
      <td >-</td>
      <td >导出范围为您在列表页勾选的实例。例如您对257条数据有查询权限，勾选了5个实例，则将导出5条数据<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/export-instance-5.png" width="500"></div></td> 
   </tr>
</table>

	
