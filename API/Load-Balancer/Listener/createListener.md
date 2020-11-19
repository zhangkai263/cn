# createListener


## 描述
创建一个监听器

## 请求方式
POST

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/listeners/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**listenerName**|String|True| |Listener的名字,只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符|
|**protocol**|String|True| |监听协议, 取值为Tcp, Tls, Http, Https <br>【alb】支持Http, Https，Tcp和Tls <br>【nlb】支持Tcp  <br>【dnlb】支持Tcp|
|**port**|Integer|True| |监听端口，取值范围为[1, 65535]|
|**backendId**|String|True| |默认的后端服务Id|
|**loadBalancerId**|String|True| |Listener所属loadBalancer的Id|
|**urlMapId**|String|False| |【alb Https和Http协议】转发规则组Id|
|**action**|String|False| |默认后端服务的转发策略,取值为Forward或Redirect, 现只支持Forward, 默认为Forward|
|**certificateSpecs**|[CertificateSpec[]](createlistener#certificatespec)|False| |【alb Https和Tls协议】Listener绑定的默认证书，只支持一个证书|
|**connectionIdleTimeSeconds**|Integer|False| |【alb、nlb】空闲连接超时时间, 范围为[1,86400]。 <br>（Tcp和Tls协议）默认为：1800s <br>（Http和Https协议）默认为：60s <br>【dnlb】不支持|
|**description**|String|False| |描述,允许输入UTF-8编码下的全部字符，不超过256字符|

### <div id="certificatespec">CertificateSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**certificateId**|String|True| |证书Id|
|**isDefault**|Boolean|False| |是否为默认证书，取值为True或False,默认为True，目前此字段暂不支持设置|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createlistener#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**listenerId**|String|监听器id|

## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**409**| 'xxx' is already exist|
|**404**|Resource not found|
|**400**|Request parameter x.y.z is 'xxx', expected one of [yyy,zzz]|
