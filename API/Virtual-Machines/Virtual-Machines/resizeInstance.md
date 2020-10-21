# resizeInstance


## 描述
云主机变更实例规格<br>
云主机的状态必须为<b>stopped</b>状态。<br>
以下情况的云主机，不允许在一代与二代实例规格间互相调整，例：不允许g.n1与g.n2之间互相调配<br>
1、16年创建的云硬盘做系统盘的云主机<br>
2、本地盘(local类型)做系统盘的云主机。<br>
3、使用高可用组(Ag)创建的云主机。<br>
如果当前主机中的弹性网卡数量，大于新实例规格允许的弹性网卡数量，会返回错误。可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeinstancetypes">DescribeInstanceTypes</a>接口获得指定地域及可用区下的实例规格信息。<br>
当前主机所使用的镜像，需要支持要变更的目标实例规格，否则返回错误。可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeimageconstraints">DescribeImageConstraints</a>接口获得指定镜像的实例规格限制信息。<br>
云主机欠费或到期时，无法更改实例规格。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:resizeInstance

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**instanceId**|String|True| |云主机ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceType**|String|True| |实例规格，可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeinstancetypes">DescribeInstanceTypes</a>接口获得指定地域或可用区的规格信息。|
|**force**|Boolean|False| |是否强制调配，默认为false；如果指定为true, 将会清除本地数据盘。|


## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
