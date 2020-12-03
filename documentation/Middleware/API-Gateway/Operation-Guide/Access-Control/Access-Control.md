# IP访问控制

API网关为您提供IP访问控制功能。您可以通过此功能对特定的IP和IP段进行访问限制，从而保障您后端服务的安全。访问控制策略需要与API分组绑定，才会对分组下的 API 起作用。


*  流控策略可以对API分组次数限制、对单Access Key次数限制。

*  请注意，单Access Key次数限制应不大于API分组流量限制。即 单Access Key次数限制 <= API分组流量限制。

*  流控策略通过绑定 API分组生效。1个策略可以绑定于多个 API分组，且每一个 API分组 单独生效。

*  如果 API分组 已经与某个策略绑定，当您绑定新策略时，此次操作将替换之前的策略，实时生效。

*  在 API网关控制台，您可以完成对流控策略的创建、修改、删除、查看、绑定、解绑等基本操作。

*  流控的单位:分钟、天。

当您创建流量控制策略时，需要选择 Region，Region 一旦选定不可更改，且仅能被应用于同一个 Region 下的API使用。




## 操作步骤


1.点击左侧 **IP访问控制策略**，进入访问控制策略列表页，可进行策略的查看、配置和绑定。

![IP访问控制策略列表页](../../../../../image/Internet-Middleware/API-Gateway/策略列表.png)


2.新增IP访问控制策略。您可以选择对目标IP和IP段进行*允许* 或*拒绝* 的动作设置。

若选择允许，则目标IP和IP段以外的其他IP和IP段均无法通过API网关访问到您的后端服务。若选择拒绝，则除目标IP和IP段以外的其他IP和IP段均可以通过API网关访问到您的后端服务。

![新增策略](../../../../../image/Internet-Middleware/API-Gateway/新建IP策略.png)


新建成功后可以查看策略详情。
![查看策略详情](../../../../../image/Internet-Middleware/API-Gateway/查看IP策略详情.png)


3.将IP访问控制策略与API分组绑定。绑定成功后当用户调用该API分组时，对应的IP访问控制策略就会生效。

![绑定API分组](../../../../../image/Internet-Middleware/API-Gateway/绑定API分组.png)


如果想更换策略绑定的分组，也可以进行解绑操作，解除当前策略与API分组的绑定关系。

![解绑API分组](../../../../../image/Internet-Middleware/API-Gateway/解绑API分组.png)


4.当某个IP访问控制策略失效时，您可以删除该策略。

![删除IP策略](../../../../../image/Internet-Middleware/API-Gateway/删除IP策略.png)



