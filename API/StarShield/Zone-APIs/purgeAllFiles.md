# purgeAllFiles


## 描述
从星盾的缓存中删除所有文件

## 请求方式
POST

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{identifier}/purge_cache__purgeAllFiles

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**identifier**|String|True| | |

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**purge_everything**|Boolean|True| |指示星盾缓存中的所有资源都应该删除的标志。<br>注意，执行此操作后，可能会对源服务器负载产生显著影响。<br>|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[Zone](#zone)| |
### <div id="Zone">Zone</div>
|名称|类型|描述|
|---|---|---|
|**plan_pending**|[Plan_pending](#plan_pending)| |
|**original_dnshost**|String|切换到星盾时的DNS主机|
|**permissions**|String[]|当前用户在域上的可用权限|
|**development_mode**|Number|域的开发模式过期（正整数）或上次过期（负整数）的时间间隔（秒）。如果从未启用过开发模式，则此值为0。<br>|
|**verification_key**|String| |
|**plan**|[Plan](#plan)| |
|**original_name_servers**|String[]|迁移到星盾之前的原始域名服务器|
|**name**|String|域名|
|**account**|[Account](#account)| |
|**activated_on**|String|最后一次检测到所有权证明和该域激活的时间|
|**paused**|Boolean|指示域是否仅使用星盾DNS服务。如果值为真，则表示该域将不会获得安全或性能方面的好处。|
|**status**|String|域的状态|
|**owner**|[Owner](#owner)| |
|**modified_on**|String|上次修改域的时间|
|**created_on**|String|创建域的时间|
|**ty_pe**|String|全接入的域意味着DNS由星盾托管。半接入的域通常是合作伙伴托管的域或CNAME设置。|
|**id**|String|域标识符标签|
|**name_servers**|String[]|星盾分配的域名服务器。这仅适用于使用星盾DNS的域|
|**original_registrar**|String|切换到星盾时的域注册商|
### <div id="Owner">Owner</div>
|名称|类型|描述|
|---|---|---|
|**user_owner**|[User_owner](#user_owner)| |
|**organization_owner**|[Organization_owner](#organization_owner)| |
### <div id="Organization_owner">Organization_owner</div>
|名称|类型|描述|
|---|---|---|
|**id**|String| |
|**name**|String| |
|**ty_pe**|String| |
### <div id="User_owner">User_owner</div>
|名称|类型|描述|
|---|---|---|
|**id**|String| |
|**email**|String| |
|**ty_pe**|String| |
### <div id="Account">Account</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|帐户标识符标签|
|**name**|String|帐户名|
### <div id="Plan">Plan</div>
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
### <div id="Plan_pending">Plan_pending</div>
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
