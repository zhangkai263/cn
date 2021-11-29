# orderAdvancedCertificateManagerCertificatePack


## 描述
对于一个特定域，订购一个高级证书包

## 请求方式
POST

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/ssl$$certificate_packs$$order

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ty_pe**|String|False| |证书包的类型|
|**hosts**|String[]|False| |以逗号分隔的证书包的有效主机名称列表。必须包含域的顶级域名，不得包含50个以上的主机，也不得为空。|
|**validation_method**|String|False| |为订阅选择的验证方法|
|**validity_days**|Integer|False| |为订阅选择的有效日期|
|**certificate_authority**|String|False| |为该订阅选择的证书颁发机构。选择Let's Encrypt将减少对其他字段的定制。<br>validation_method必须是'txt'，validity_days必须是90，cloudflare_branding必须省略，hosts必须只包含两个条目。<br>一个是域名，一个是域名的子域通配符（例如 example.com, *.example.com）。<br>|
|**cloudflare_branding**|Boolean|False| |是否为订阅添加星盾品牌。|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](orderAdvancedCertificateManagerCertificatePack#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[CertificatePack](orderAdvancedCertificateManagerCertificatePack#certificatepack)| |
### <div id="certificatepack">CertificatePack</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|证书包的唯一标识符|
|**ty_pe**|String|证书包的类型|
|**hosts**|String[]|证书包的有效主机名的逗号分隔列表。必须包含域的顶级域名，不能包含超过50个主机，并且不能为空。|
|**certificates**|[Certificate[]](orderAdvancedCertificateManagerCertificatePack#certificate)| |
|**primary_certificate**|String|包中主证书的标识符|
### <div id="certificate">Certificate</div>
|名称|类型|描述|
|---|---|---|
|**priority**|Number|在请求中使用证书的顺序/优先级。<br>|
|**expires_on**|String|来自授权机构的证书过期时间|
|**hosts**|String[]| |
|**zone_id**|String|域标识符标签|
|**status**|String|域的自定义SSL的状态|
|**geo_restrictions**|[Geo_restrictions](orderAdvancedCertificateManagerCertificatePack#geo_restrictions)| |
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
