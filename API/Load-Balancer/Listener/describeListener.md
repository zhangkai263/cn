# describeListener


## 描述
查询监听器详情

## 请求方式
GET

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/listeners/{listenerId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**listenerId**|String|True| |监听器ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describelistener#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**listener**|[Listener](describelistener#listener)|监听器的信息|
### <div id="listener">Listener</div>
|名称|类型|描述|
|---|---|---|
|**listenerId**|String|Listener的Id|
|**listenerName**|String|Listener的名称|
|**status**|String|Listener状态, 取值为On或者为Off|
|**loadBalancerId**|String|Listener所属loadBalancer的Id|
|**loadBalancerType**|String|Listener所属负载均衡类型，取值为：alb、nlb、dnlb|
|**protocol**|String|监听协议, 取值为Tcp, Tls, Http, Https <br>【alb】支持Http, Https，Tcp和Tls <br>【nlb】支持Tcp  <br>【dnlb】支持Tcp|
|**port**|Integer|监听端口，取值范围为[1, 65535]|
|**action**|String|默认后端服务的转发策略,取值为Forward或Redirect, 现只支持Forward|
|**backendId**|String|默认的后端服务Id|
|**urlMapId**|String|【alb Https和Http协议】转发规则组Id|
|**connectionIdleTimeSeconds**|Integer|【alb、nlb】空闲连接超时时间, 范围为[1,86400]。 <br>（Tcp和Tls协议）默认为：1800s <br>（Http和Https协议）默认为：60s <br>【dnlb】不支持|
|**certificateSpecs**|[CertificateSpec[]](describelistener#certificatespec)|【alb Https和Tls协议】Listener绑定的默认证书，只支持一个|
|**description**|String|Listener的描述信息|
|**createdTime**|String|Listener的创建时间|
|**extensionCertificateSpecs**|[ExtensionCertificateSpec[]](describelistener#extensioncertificatespec)|【alb Https和Tls协议】Listener绑定的扩展证书列表|
### <div id="extensioncertificatespec">ExtensionCertificateSpec</div>
|名称|类型|描述|
|---|---|---|
|**certificateId**|String|证书Id|
|**certificateBindId**|String|证书绑定Id|
|**domain**|String|域名,支持输入精确域名和通配符域名：1、仅支持输入大小写字母、数字、英文中划线“-”和点“.”，最少包括一个点"."，不能以点"."和中划线"-"开头或结尾，中划线"-"前后不能为点"."，不区分大小写，且不能超过110字符；2、通配符匹配支持包括一个星"\*"，输入格式为\*.XXX,不支持仅输入一个星“\*”。监听器创建时绑定的默认证书不允许修改域名。|
### <div id="certificatespec">CertificateSpec</div>
|名称|类型|描述|
|---|---|---|
|**certificateId**|String|证书Id|
|**isDefault**|Boolean|是否为默认证书，取值为True或False,默认为True，目前此字段暂不支持设置|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
