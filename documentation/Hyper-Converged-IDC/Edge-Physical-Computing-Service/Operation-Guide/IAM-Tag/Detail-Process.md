# 背景信息
[访问控制](https://docs.jdcloud.com/cn/iam/product-overview)是京东云提供的一项用户身份管理与资源访问控制服务。用户可以通过使用IAM创建、管理子用户，并控制这些子用户访问京东云资源的操作权限。使用访问控制，主账号可以向他人授权管理账户中的资源，而不必共享账户密码或访问秘钥，按需为用户分配所需的最小权限，从而降低企业信息安全风险。

[标签](https://docs.jdcloud.com/cn/tag-service/product-overview)是用户管理自己资源的工具。您可以通过为资源绑定标签来对资源进行分类，进而更有效地管理您的各类资源。 每个标签由一个“键”和一个“值”组成，例如：“部门：研发部”，这里“部门”是这个标签的“键”，“研发部”是这个“键”的值。 每个资源最多允许绑定10个不同键的标签。
# 使用标签控制资源的访问
访问控制台与标签结合使用，可以方便、快速进行资源的整合与管理，按需对子用户进行授权。

资源绑定标签后，可以使用标签为资源进行分类并授权访问，如下介绍如何为子用户授权策略，控制其对边缘物理计算资源的访问。

## 步骤一：创建或编辑标签
当对新资源绑定标签，或对已经拥有标签的资源进行变更时，可通过编辑标签实现。

支持编辑标签的资源：[机柜](../Resources-Management/View-Cabinet-List.md)，[设备](../Resources-Management/View-Device-List.md)，[公网IP](../Resources-Management/View-ipAddress-List.md)，[带宽（出口）](../Resources-Management/View-Bandwidth-List.md)，[报警规则](../Alarm-Management/View-Alarm-Rules.md)</br>
### 详细操作
1. 访问[边缘物理计算服务控制台](https://epcs-console.jdcloud.com/cabinet/list)，进入**资源管理或报警管理**。<br>
2. 在各资源列表页，选择需要绑定标签的资源，点击**编辑标签**。<br>
3. 在弹出的**编辑标签**弹窗中，当前标签默认显示当前已绑定的标签，支持添加、删除标签；若资源当前标签内已有10个标签则不能再添加标签，可查看[限制说明](https://docs.jdcloud.com/cn/tag-service/restrictions)了解具体限制条件.<br>
4. 可下拉选择已有标签键/值（Key-Value）添加标签，或者文本框输入键/值（Key-Value）来创建新标签，点击**添加**生成标签，例如 “部门：研发部”。<br>
5. 添加完成所需标签后，单击**确定**，将按照当前标签内显示情况完成标签的更新。<br>
## 步骤二：创建自定义策略
使用主账号新建自定义策略testiam，并介绍3种不同的使用方式的配置方法。
### 详细操作
1. 登录京东智联云控制台，进入**访问控制-策略管理**。<br>
2. 点击**创建策略**，页面中选择**可视化策略生成器**。<br>
3. 页面中，首先定义**策略名**，例如testiam。<br>
4. 选择服务：下拉选择**边缘物理计算服务**。<br>
5. 访问权限：对边缘物理计算服务是否有访问权限，选择允许，则后续所选接口&资源就允许访问，选择拒绝，则后续所选接口&资源就不可访问。<br>
6. 选择操作&资源，指定条件：操作，资源，条件可组合搭配制定需要的策略。可查看[边缘物理计算服务支持的策略配置](Policy-List.md)了解详细信息。<br>
7. 添加完所需策略后，点击**提交**，最终生成自定义策略。
### 三种策略配置方式
#### 方式1：子账号需要查看指定机房，指定资源ID的机柜
<table>
	<tr>
	    <th>选择操作</th>
	    <th>选择资源</th>
	    <th>指定条件</th>  
	</tr>
	<tr>
	    <td>describeConsolePermission<br>describeIdcs<br>describeRooms<br>describeCabinets<br>describeCabinet</td>
	    <td>1.资源唯一标识：填写指定机房，不做限制则填写*<br>2.二级资源唯一标识：填写指定的机柜ID</td>
	    <td>无</td>
	</tr>
</table>

#### 方式2：子账号需要查看指定标签“部门：研发部”的机柜
<table>
	<tr>
	    <th>选择操作</th>
	    <th>选择资源</th>
	    <th>指定条件</th>  
	</tr>
	<tr>
	    <td>describeConsolePermission<br>describeIdcs<br>describeRooms<br>describeCabinets<br>describeCabinet</td>
	    <td>添加全部资源</td>
	    <td>标签键：部门<br>条件值：研发部</td>
	</tr>
</table>

#### 方式3：子账号可以提交工单，但仅支持查看自己提交的工单
<table>
	<tr>
	    <th>选择操作</th>
	    <th>选择资源</th>
	    <th>指定条件</th>  
	</tr>
	<tr>
	    <td>createTicket<br>describeTickets<br>describeTicket</td>
	    <td>添加全部资源</td>
	    <td>标签键：选择系统标签，jdc-createdby<br>条件值：subuser-${name}</td>
	</tr>
</table>


## 步骤三：创建子用户
使用主账号创建子用户，并分配系统策略以及自定义策略
### 详细操作
1. 登录京东智联云控制台，进入**访问控制-用户管理**。<br>
2. 点击**创建子用户**，根据页面指引，填写必要信息后，创建成功。<br>
3. 用户列表中，点击**授权**，为子用户授权；可以分配系统策略，也可以分配主账号自己创建的自定义策略testiam，如果子用户需要访问边缘物理计算服务中的资源，请务必为子用户添加系统策略**JDCloudResourceTagRead**。<br>
4. 使用子用户登录控制台，即可查看被授权的内容。<br>

