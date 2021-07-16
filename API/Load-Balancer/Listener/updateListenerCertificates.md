# updateListenerCertificates


## 描述
listener批量修改扩展证书

## 请求方式
POST

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/listeners/{listenerId}:updateListenerCertificates

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**listenerId**|String|True| |监听器ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**certificates**|[ExtCertificateUpdateSpec[]](#extcertificateupdatespec)|True| |【alb Https和Tls协议】Listener绑定的扩展证书列表|

### <div id="ExtCertificateUpdateSpec">ExtCertificateUpdateSpec</div>

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**certificateBindId**|String|True| |证书绑定Id|
|**certificateId**|String|False| |证书Id|
|**domain**|String|False| |域名,支持输入精确域名和通配符域名：1、仅支持输入大小写字母、数字、英文中划线“-”和点“.”，最少包括一个点"."，不能以点"."和中划线"-"开头或结尾，中划线"-"前后不能为点"."，不区分大小写，且不能超过110字符；2、通配符匹配支持包括一个星"\*"，输入格式为\*.XXX,不支持仅输入一个星“\*”。监听器创建时绑定的默认证书不允许修改域名。|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Request parameter error|
|**500**|Internal server error|
