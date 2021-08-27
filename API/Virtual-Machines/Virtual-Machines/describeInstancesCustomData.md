# describeInstancesCustomData


## 描述

批量查询云主机用户自定义元数据。

详细操作说明请参考帮助文档：[自定义元数据](https://docs.jdcloud.com/cn/virtual-machines/userdata)

## 接口说明
- 使用 `filters` 过滤器进行条件筛选，每个 `filter` 之间的关系为逻辑与（AND）的关系。
- 单次查询最大可查询10台云主机实例自定义元数据。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instancesCustomData

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|否| |页码；默认为1。|
|**pageSize**|Integer|否| |分页大小；默认为10；取值范围[1, 10]。|
|**filters**|[Filter[]](describeInstancesCustomData#user-content-filter)|否| |<b>filters 中支持使用以下关键字进行过滤</b><br>`instanceId`: 云主机ID，精确匹配，支持多个<br>`privateIpAddress`: 主网卡内网主IP地址，模糊匹配，支持多个<br>`vpcId`: 私有网络ID，精确匹配，支持多个<br>`status`: 云主机状态，精确匹配，支持多个，参考 [云主机状态](https://docs.jdcloud.com/virtual-machines/api/vm_status)<br>`name`: 云主机名称，模糊匹配，支持单个<br>`imageId`: 镜像ID，精确匹配，支持多个<br>`agId`: 使用可用组id，支持单个<br>`faultDomain`: 错误域，支持多个<br>`networkInterfaceId`: 弹性网卡ID，精确匹配，支持多个<br>`subnetId`: 子网ID，精确匹配，支持多个<br>|

### <div id="user-content-filter">Filter</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**name**|String|是| |过滤条件的名称|
|**operator**|String|否| |过滤条件的操作符，默认eq|
|**values**|String[]|是| |过滤条件的值|

## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](describeInstancesCustomData#user-content-result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="user-content-result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**customData**|[CustomData[]](describeInstancesCustomData#user-content-customdata)| |云主机实例自定义元数据列表。|
|**totalCount**|Number| |本次查询可匹配到的总记录数，使用者需要结合`pageNumber`和`pageSize`计算是否可以继续分页。|

### <div id="user-content-customdata">CustomData</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**instanceId**|String|i-eumm****d6|云主机ID。|
|**metadata**|[Metadata[]](describeInstancesCustomData#user-content-metadata)| |自定义元数据。<br>为key-value键值对形式，可在实例系统内通过元数据服务查询获取。单实例最多支持40对键值对。|
|**userdata**|[Userdata[]](describeInstancesCustomData#user-content-userdata)| |自定义脚本。<br>目前仅支持启动脚本，即 `launch-script`，须 `base64` 编码且编码前数据长度不能超过16KB。|

### <div id="user-content-userdata">Userdata</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**key**|String|launch-script|脚本类型，当前仅支持输入 `launch-script`，即启动脚本。|
|**value**|String|IyEvYmluL2Jhc2gKZWNobyAnMTIzJw|脚本内容，须 `Base64` 编码，且编码前长度不能超过16KB。|

### <div id="user-content-metadata">Metadata</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**key**|String|index|key，字符长度不超过256，支持全字符。|
|**value**|String|1|value，字符长度不超过16KB，支持全字符。|


## 请求示例
GET

```
/v1/regions/cn-north-1/instancesCustomData?pageNumber=1&pageSize=10&filters.1.name=instanceId&filters.1.values.1=i-eumm****d6
```



## 返回示例
```
{
    "requestId": "1ba20ebdf2fa27e39ea8efec75066351", 
    "result": {
        "customData": [
            {
                "instanceId": "i-eumm****d6", 
                "metadata": [
                    {
                        "key": "k8s-kube-reserved-cpu", 
                        "value": "110"
                    }, 
                    {
                        "key": "k8s-node-variables", 
                        "value": "H4sJwIb83YcAA/5xTXW+bQBD8L/tsY1AAktIAAAAX+LAVVtXsznw69F"
                    }
                ], 
                "userdata": [
                    {
                        "key": "launch-script", 
                        "value": "IyEvdXNyL2Jpbi9lbnYgYmFzaAoKTE9DS0VSX0ZJTEU"
                    }
                ]
            }
        ], 
        "totalCount": 1
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|OUT_OF_RANGE|PageSize out of range|分页大小超出规定范围。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
