# setBWList


## 描述
设置黑/白名单

## 请求方式
POST

## 请求地址
https://bri.jdcloud-api.com/v1/regions/{regionId}/blackwhite:list

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |实例所属的地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**req**|BwcfgSet|True| |黑白名单数据|

### <div id="BwcfgSet">BwcfgSet</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**action**|String|True| |新增还是更新，add-新增，update-更新|
|**item**| Bwcfg  |True| |黑白名单数据|
### <div id="Bwcfg">Bwcfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**id**|Integer|False| |数据的id，更新数据时需要传此ID|
|**content**|String|True| |关联内容|
|**bwType**|String|True| |黑白名单类型，黑名单-black，白名单-white|
|**resourceType**|String|True| |数据类型，ip-IP，phone-手机，addr-地址|

## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|BAD_REQUEST|
