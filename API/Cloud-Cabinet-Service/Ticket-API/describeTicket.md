# describeTicket


## 描述
查询工单详情

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/tickets/{ticketNo}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ticketNo**|String|True| |工单编号|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeticket#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**ticket**|[Ticket](describeticket#ticket)|工单详情|
### <div id="ticket">Ticket</div>
|名称|类型|描述|
|---|---|---|
|**ticketNo**|String|工单编号|
|**ticketTemplateName**|String|工单名称|
|**ticketTemplateCode**|String|工单模板CODE|
|**ticketTypeName**|String|工单类型|
|**status**|String|工单状态 pendingReview:待审核 已撤销 revoked:已撤销 processing:处理中 pendingVerification:待核验 pendingClose:待关单 rejected:已拒绝 completed:已完成 cancelled:已取消 draft:草稿中|
|**description**|String|描述|
|**createdTime**|String|创建时间，遵循ISO8601标准，使用UTC时间，格式为：yyyy-MM-ddTHH:mm:ssZ|
|**closedTime**|String|关闭时间，遵循ISO8601标准，使用UTC时间，格式为：yyyy-MM-ddTHH:mm:ssZ|
|**phone**|String|电话|
|**email**|String|邮箱|
|**idc**|String|机房英文标识|
|**idcName**|String|机房名称|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
