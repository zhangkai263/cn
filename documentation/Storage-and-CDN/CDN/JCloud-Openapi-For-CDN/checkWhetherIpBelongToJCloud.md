# checkWhetherIpBelongToJCloud


## 描述
获取所有上层节点的ip，仅支持中国境内上层节点IP地址查询

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/ip:whetherBelongToJCloud


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ips**|String[]|False| | |


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](checkWhetherIpBelongToJCloud#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**ipList**|[CheckWhetherIpBelongToJCloudItem[]](checkWhetherIpBelongToJCloud#checkwhetheripbelongtojclouditem)| |
### <div id="CheckWhetherIpBelongToJCloudItem">CheckWhetherIpBelongToJCloudItem</div>
|名称|类型|描述|
|---|---|---|
|**ip**|String| |
|**belongToJCloud**|Boolean| |
|**country**|String| |
|**province**|String| |
|**city**|String| |
|**isp**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
