# 自定义元数据

通过自定义元数据功能，您可以在不登录实例的情况下，将自定义数据以key-value的形式通过Metadata服务传递给实例。常见使用方式是，将需要定期更新的配置以自定义元数据的形式配置给实例，并通过key来区分数据用途，在实例内部有组件或脚本通过定期轮训Metadata获取特定key的value来配置或更新实例。
> 自定义元数据功能目前为灰度开放，如需使用可提交工单申请。

## 前提条件及限制
* 每个实例指定的自定义元数据键值对不能超过20对。
* 每个元数据`Key`不能超过256字符；每个元数据`Value`不能超过16KB。

## 设置自定义元数据
### 创建实例/实例模板时设置
创建实例或实例模板时，可在 **高级选项-自定义元数据** 中开启配置项并以Key-Value的形式添加。

### 实例创建后设置或修改
实例创建成功后，可随时修改自定义元数据，修改功能暂不提供控制台操作，OpenAPI接口详见 [modifyInstanceAttribute](https://docs.jdcloud.com/virtual-machines/api/modifyinstanceattribute?content=API)。

## 自定义元数据查询
* 实例内查询<br>
  * 查询实例全部自定义元数据：
  
  ```
  http://169.254.169.254/metadata/latest/attributes/customdata/custom-metadata/
  ```
  
  * 查询指定`key`对应的`value`：
  
  ```
  http://169.254.169.254/metadata/latest/attributes/customdata/custom-metadata/[key]
  ```
  
* 实例外查询<br>
  * 暂不提供控制台查询，OpenAPI接口详见 [describeInstancesCustomData](https://docs.jdcloud.com/virtual-machines/api/describeinstancescustomdata?content=API)。
 
# 相关参考

[实例元数据](https://docs.jdcloud.com/virtual-machines/instance-metadata)
