# 实例抵扣券服务


## 简介
实例抵扣券服务<br>
对应云主机、原生容器和Pod产品


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**createInstanceVoucher**|POST|创建实例抵扣券<br>|
|**deleteInstanceVoucher**|DELETE|删除实例抵扣券<br>|
|**describeInstanceVoucher**|GET|查询实例抵扣券的详细信息<br>|
|**describeInstanceVoucherTypes**|GET|查询实例规格信息列表<br>|
|**describeInstanceVouchers**|GET|批量查询实例抵扣券的详细信息<br>此接口支持分页查询，默认每页20条。<br>|
|**describeQuotas**|GET|查询配额<br>|
|**modifyInstanceVoucherAttribute**|PATCH|修改实例抵扣券的 名称 和 描述。<br>name 和 description 必须要指定一个<br>|
