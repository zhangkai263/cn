# updateListener


## 描述
修改一个监听器的信息

## 请求方式
PATCH

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/listeners/{listenerId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**listenerId**|String|True| |监听器ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**listenerName**|String|False| |监听器名称,只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符|
|**status**|String|False| |Listener状态, 取值为On或者为Off|
|**certificateSpecs**|[CertificateSpec[]](#certificatespec)|False| |【alb Https和Tls协议】Listener绑定的默认证书，只支持一个证书|
|**connectionIdleTimeSeconds**|Integer|False| |【alb、nlb】空闲连接超时时间, 范围为[1,86400]。 <br>（Tcp和Tls协议）默认为：1800s <br>（Http和Https协议）默认为：60s <br>【dnlb】不支持该功能|
|**backendId**|String|False| |默认后端服务Id|
|**urlMapId**|String|False| |【alb Https和Http协议】转发规则组Id|
|**description**|String|False| |监听器描述,允许输入UTF-8编码下的全部字符，不超过256字符|

### <div id="CertificateSpec">CertificateSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**certificateId**|String|True| |证书Id|
|**isDefault**|Boolean|False| |是否为默认证书，取值为True或False,默认为True，目前此字段暂不支持设置|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**400**|Parameter listener id missing|
|**500**|Internal server error|
