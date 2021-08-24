# describeInstanceVncUrl


## 描述

获取云主机vnc地址。

详细操作说明请参考帮助文档：[连接实例](https://docs.jdcloud.com/cn/virtual-machines/connect-to-instance)

## 接口说明
- 实例仅 `running` 状态时才可获取到 `vnc` 地址。
- 调用该接口可获取云主机 `vnc` 地址，用于远程连接管理云主机。
- `vnc` 地址的有效期为1个小时，调用接口获取vnc地址后如果1个小时内没有使用，`vnc` 地址将自动失效，再次使用需要重新获取。
- 裸金属实例目前不支持通过 `vnc` 登录。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/vnc

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
无


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**vncUrl**|String| |远程vnc地址。|


## 请求示例
GET

```
/v1/regions/cn-north-1/instances/i-eumm****d6/vnc
```



## 返回示例
```
{
    "requestId": "4768ffcc059f4cfb58edbd8ae6d9881e", 
    "result": {
        "vncUrl": "https://console-cn-north-1.jdcloud.com/vnc_auto.html?token=xxxxxxxx-8xx9-4xxd-8xxe-8xxxxx172477"
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|FAILED_PRECONDITION|Invalid instance status|错误的云主机状态。|
|**400**|FAILED_PRECONDITION|InstanceType constraints. Doesn't support VNC.|裸金属实例目前不支持通过vnc登录。|
|**400**|FAILED_PRECONDITION|Conflict with underlay task|云主机实例正在执行其它任务，请稍后再试。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
