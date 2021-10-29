# listSSLConfigurations


## 描述
列出、搜索和筛选所有自定义SSL证书。


## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/custom_certificates

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**status**|String|False| |域的自定义SSL的状态|
|**page**|Number|False|1|分页结果的页码|
|**per_page**|Number|False|20|每页的域数|
|**match**|String|False|all|是否匹配所有搜索要求或至少一个（任何）|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listSSLConfigurations#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[CustomSSL[]](listSSLConfigurations#customssl)| |
### <div id="customssl">CustomSSL</div>
|名称|类型|描述|
|---|---|---|
|**priority**|Number|在请求中使用证书的顺序/优先级。<br>|
|**keyless_server**|[Keyless_server](listSSLConfigurations#keyless_server)| |
|**expires_on**|String|来自授权机构的证书过期时间|
|**hosts**|String[]| |
|**zone_id**|String|域标识符标签|
|**status**|String|域的自定义SSL的状态|
|**geo_restrictions**|[Geo_restrictions](listSSLConfigurations#geo_restrictions)| |
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
### <div id="keyless_server">Keyless_server</div>
|名称|类型|描述|
|---|---|---|
|**port**|Number|用于在星盾和客户的无密钥SSL服务器之间通信的无密钥SSL端口|
|**enabled**|Boolean|无钥匙SSL是否开启或关闭|
|**permissions**|String[]|当前用户的无密钥SSL的可用权限|
|**host**|String|无密钥SSL主机名或ip|
|**name**|String|无密钥SSL名称|
|**status**|String|无密钥SSL的状态|
|**modified_on**|String|上次修改无密钥SSL的时间|
|**created_on**|String|创建无密钥SSL的时间|
|**id**|String|无密钥证书标识符标签|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
