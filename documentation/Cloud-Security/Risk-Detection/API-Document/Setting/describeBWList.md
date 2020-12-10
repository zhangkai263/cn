# describeBWList


## 描述
获取黑白名单列表

## 请求方式
GET

## 请求地址
https://bri.jdcloud-api.com/v1/regions/{regionId}/blackwhite:list

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |实例所属的地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**resourceType**|String|False| |数据类型，不传或者为空返回所有类型数据，ip-IP，phone-手机，addr-地址|
|**bwType**|String|False| |数据类型，不传或者为空返回所有类型数据，列表类型，black-黑名单，white-白名单|
|**size**|Integer|False| |页面大小，缺省为10|
|**index**|Integer|False| |起始页，缺省为1|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String|此次请求的ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**totalCount**|Integer|总量|
|**index**|Integer|分页-页码|
|**size**|Integer|分页-每页大小|
|**list**|Bwcfg|黑白名单详情|
### <div id="Bwcfg">Bwcfg</div>
|名称|类型|描述|
|---|---|---|
|**id**|Integer|数据的id，更新数据时需要传此ID|
|**content**|String|关联内容|
|**bwType**|String|黑白名单类型，黑名单-black，白名单-white|
|**resourceType**|String|数据类型，ip-IP，phone-手机，addr-地址|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|BAD_REQUEST|
