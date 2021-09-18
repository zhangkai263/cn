# bindVpc


## 描述
绑定vpc
- vpc信息为空时，会将之前的绑定关系全部解除
- 该接口为覆盖类的接口，请将需要的vpc全部进行绑定


## 请求方式
PUT

## 请求地址
https://privatezone.jdcloud-api.com/v1/regions/{regionId}/zone/{zoneId}/vpc:bind

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**zoneId**|String|True| |zone id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**bindVpc**|[BindVpcReq[]](#bindvpcreq)|False| |绑定的vpc信息|

### <div id="BindVpcReq">BindVpcReq</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |vpc所在区域id|
|**vpcId**|String|True| |vpc id|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|此次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
