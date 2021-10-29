# purgeFilesByCache_TagsAndHostOrPrefix


## 描述
通过指定主机、关联的缓存标记或前缀，从星盾的缓存中精确删除一个或多个文件。
注意，缓存标记、主机和前缀清除每24小时的速率限制为30000次清除API调用。一次API调用最多可以清除30个标记、主机或前缀。
对于需要以更大容量进行清除的客户，可以提高此速率限制。


## 请求方式
POST

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{identifier}/purge_cache__purgeFilesByCache_TagsAndHostOrPrefix

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**tags**|String[]|False| |如何资产携带Cache-Tag头，并且它的值与提供的值之一匹配的话，该资产将从星盾缓存中清除|
|**hosts**|String[]|False| |如果资产的URL中的host与提供的值之一匹配的话，该资产将从星盾缓存中清除|
|**prefixes**|String[]|False| |URL上与前缀匹配的任何资产都将从星盾缓存中清除。<br>例如, a.com/b 意味着 a.com/b/c/d.png 会被删除，而 a.com/bc.png 不会被删除。前缀a.com/b和a.com/b/c是冗余的。<br>|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](purgeFilesByCache_TagsAndHostOrPrefix#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[Zone](purgeFilesByCache_TagsAndHostOrPrefix#zone)| |
### <div id="zone">Zone</div>
|名称|类型|描述|
|---|---|---|
|**plan_pending**|[Plan_pending](purgeFilesByCache_TagsAndHostOrPrefix#plan_pending)| |
|**original_dnshost**|String|切换到星盾时的DNS主机|
|**permissions**|String[]|当前用户在域上的可用权限|
|**development_mode**|Number|域的开发模式过期（正整数）或上次过期（负整数）的时间间隔（秒）。如果从未启用过开发模式，则此值为0。<br>|
|**verification_key**|String| |
|**plan**|[Plan](purgeFilesByCache_TagsAndHostOrPrefix#plan)| |
|**original_name_servers**|String[]|迁移到星盾之前的原始域名服务器|
|**name**|String|域名|
|**account**|[Account](purgeFilesByCache_TagsAndHostOrPrefix#account)| |
|**activated_on**|String|最后一次检测到所有权证明和该域激活的时间|
|**paused**|Boolean|指示域是否仅使用星盾DNS服务。如果值为真，则表示该域将不会获得安全或性能方面的好处。|
|**status**|String|域的状态|
|**owner**|[Owner](purgeFilesByCache_TagsAndHostOrPrefix#owner)| |
|**modified_on**|String|上次修改域的时间|
|**created_on**|String|创建域的时间|
|**ty_pe**|String|全接入的域意味着DNS由星盾托管。半接入的域通常是合作伙伴托管的域或CNAME设置。|
|**id**|String|域标识符标签|
|**name_servers**|String[]|星盾分配的域名服务器。这仅适用于使用星盾DNS的域|
|**original_registrar**|String|切换到星盾时的域注册商|
### <div id="owner">Owner</div>
|名称|类型|描述|
|---|---|---|
|**user_owner**|[User_owner](purgeFilesByCache_TagsAndHostOrPrefix#user_owner)| |
|**organization_owner**|[Organization_owner](purgeFilesByCache_TagsAndHostOrPrefix#organization_owner)| |
### <div id="organization_owner">Organization_owner</div>
|名称|类型|描述|
|---|---|---|
|**id**|String| |
|**name**|String| |
|**ty_pe**|String| |
### <div id="user_owner">User_owner</div>
|名称|类型|描述|
|---|---|---|
|**id**|String| |
|**email**|String| |
|**ty_pe**|String| |
### <div id="account">Account</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|帐户标识符标签|
|**name**|String|帐户名|
### <div id="plan">Plan</div>
|名称|类型|描述|
|---|---|---|
|**id**|String| |
|**name**|String| |
|**price**|Number| |
|**currency**|String| |
|**frequency**|String| |
|**legacy_id**|String| |
|**is_subscribed**|Boolean| |
|**can_subscribe**|Boolean| |
### <div id="plan_pending">Plan_pending</div>
|名称|类型|描述|
|---|---|---|
|**id**|String| |
|**name**|String| |
|**price**|Number| |
|**currency**|String| |
|**frequency**|String| |
|**legacy_id**|String| |
|**is_subscribed**|Boolean| |
|**can_subscribe**|Boolean| |

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
