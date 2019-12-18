# signContract


## 描述
合同签章四种方式：
1. 合同文件 + 印章文件：contractContent + stampContent
2. 合同文件 + 印章ID：contractContent + stampId
3. 模板ID + 印章文件：templateId + stampContent
4. 模板ID + 印章ID：templateId + stampId


## 请求方式
POST

## 请求地址
https://cloudsign.jdcloud-api.com/v1/contract


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**contractSpec**|[ContractSpec](#contractspec)|True| | |

### <div id="contractspec">ContractSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**perStamps**|[PerStamp](#perstamp)|False| |个人用户盖章信息|
|**comStamps**|[ComStamp](#comstamp)|False| |企业用户盖章信息|
|**contractContent**|String|False| |合同文件（base64）|
|**templateContent**|String|False| |合同模板文件（base64，与templateId二选一）|
|**templateId**|String|False| |合同模板文件ID（与templateContent二选一）|
|**contractTitle**|String|False| |合同标题或名称|
|**caType**|String|False| |证书类型|
### <div id="comstamp">ComStamp</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**signPositionType**|Integer|True| |盖章类型（0 坐标 1 关键字）|
|**keyWord**|String|False| |盖章关键字（与坐标二选一）|
|**positionX**|Integer|False| |盖章X坐标（与关键字二选一）|
|**positionY**|Integer|False| |盖章Y坐标（与关键字二选一）|
|**offsetX**|Integer|False| |盖章X坐标偏移量（配合positionX）|
|**offsetY**|Integer|False| |盖章Y坐标偏移量（配合positionY）|
|**page**|Integer|False| |盖章页码（选择坐标盖章时需要）|
|**sealName**|String|False| |印章名称,必须和imageB64同时非空|
|**imageB64**|String|False| |印章图像base64(与stampId二选一)|
|**stampId**|String|False| |印章ID(与imageB64二选一)|
|**desc**|String|False| |印章描述|
|**isDefault**|Boolean|False| |是否作为以后签章默认章|
|**imageType**|String|False| |图片类型，只支持png格式|
|**imageSize**|Integer|False| |图片大小，高度*宽度|
|**imageHeight**|Integer|False| |图片高度|
|**imageWidth**|Integer|False| |图片宽度|
|**orgName**|String|True| |公司名称|
|**legalPersonName**|String|True| |法人姓名|
|**transactorName**|String|True| |代办人姓名|
|**transactorIdCardNum**|String|True| |代办人身份证号码|
|**transactorMobile**|String|True| |代办人手机号|
|**identifyType**|String|True| |标记字段 - usci(统一社会信用码) orgCode（组织机构代码） businessNum （工商营业执照号）|
|**identifyValue**|String|True| |标记值|
### <div id="perstamp">PerStamp</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**signPositionType**|Integer|True| |盖章类型（0 坐标 1 关键字）|
|**keyWord**|String|False| |盖章关键字（与坐标二选一）|
|**positionX**|Integer|False| |盖章X坐标（与关键字二选一）|
|**positionY**|Integer|False| |盖章Y坐标（与关键字二选一）|
|**offsetX**|Integer|False| |盖章X坐标偏移量（配合positionX）|
|**offsetY**|Integer|False| |盖章Y坐标偏移量（配合positionY）|
|**page**|Integer|False| |盖章页码（选择坐标盖章时需要）|
|**sealName**|String|False| |印章名称,必须和imageB64同时非空|
|**imageB64**|String|False| |印章图像base64(与stampId二选一)|
|**stampId**|String|False| |印章ID(与imageB64二选一)|
|**desc**|String|False| |印章描述|
|**isDefault**|Boolean|False| |是否作为以后签章默认章|
|**imageType**|String|False| |图片类型，只支持png格式|
|**imageSize**|Integer|False| |图片大小，高度*宽度|
|**imageHeight**|Integer|False| |图片高度|
|**imageWidth**|Integer|False| |图片宽度|
|**userName**|String|True| |姓名|
|**mobile**|String|True| |手机号|
|**identifyType**|String|True| |标记字段 - idCardNum（身份证） passportNum（护照） mtpNum（港澳通行证）|
|**identifyValue**|String|True| |标记值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**contractId**|String|新签的合同ID|
|**contractContent**|String|新签的合同文件（base64）|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT FOUND|
