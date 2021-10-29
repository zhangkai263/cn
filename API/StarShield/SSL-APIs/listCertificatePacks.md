# listCertificatePacks


## 描述
对于给定域，列出所有激活的证书包

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/ssl$$certificate_packs

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**status**|String|False| |包括所有状态的证书包，而不仅仅是激活状态的证书包。|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listCertificatePacks#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[CertificatePack[]](listCertificatePacks#certificatepack)| |
### <div id="certificatepack">CertificatePack</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|证书包的唯一标识符|
|**ty_pe**|String|证书包的类型|
|**hosts**|String[]|证书包的有效主机名的逗号分隔列表。必须包含域的顶级域名，不能包含超过50个主机，并且不能为空。|
|**certificates**|[Certificate[]](listCertificatePacks#certificate)| |
|**primary_certificate**|String|包中主证书的标识符|
### <div id="certificate">Certificate</div>
|名称|类型|描述|
|---|---|---|
|**priority**|Number|在请求中使用证书的顺序/优先级。<br>|
|**expires_on**|String|来自授权机构的证书过期时间|
|**hosts**|String[]| |
|**zone_id**|String|域标识符标签|
|**status**|String|域的自定义SSL的状态|
|**geo_restrictions**|[Geo_restrictions](listCertificatePacks#geo_restrictions)| |
|**modified_on**|String|上次修改证书的时间|
|**signature**|String|用于证书的哈希类型|
|**issuer**|String|颁发证书的证书颁发机构|
|**id**|String|自定义证书标识符标签|
|**uploaded_on**|String|证书上载到星盾的时间|
|**bundle_method**|String|SSL泛捆绑在各处有着最高的概率被验证，甚至能被使用过时的或不寻常的信任存储的客户端验证。<br>最佳捆绑使用最短的认证链和最新的中间证书。<br>而强制捆绑会验证证书链，但不以其他方式修改证书链。<br>|
### <div id="geo_restrictions">Geo_restrictions</div>
|名称|类型|描述|
|---|---|---|
|**label**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
