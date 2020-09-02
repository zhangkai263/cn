# addDatabase


## 描述
新建数据库配置

## 请求方式
POST

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances/{insId}/databases

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**insId**|String|True| |审计实例ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**databaseSpec**|[DatabaseSpec](adddatabase#databasespec)|True| |数据库配置|

### <div id="databasespec">DatabaseSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dbName**|String|False| |数据库名称，库名,长度限制32字节,允许英文字母,数字,下划线,中划线和中文|
|**dbAddr**|String|False| |数据库地址, 可以是IP或域名，支持IPv6|
|**dbPort**|Integer|False| |数据库端口|
|**dbType**|Integer|False| |数据库类型: <br>0->Oracle<br>1->SQLServer<br>2->DB2<br>3->MySQL<br>4->Cache<br>5->Sybase<br>6->DM7<br>7->Informix<br>9->人大金仓<br>10->Teradata<br>11->Postgresql<br>12->Gbase<br>16->Hive<br>17->MongoDB<br>|
|**dbVersion**|String|False| |数据库版本|
|**username**|String|False| |用户名，SQLServer获取登录信息使用|
|**password**|String|False| |密码，SQLServer获取登录信息使用|
|**dbDesc**|String|False| |数据库的描述|
|**dataMask**|Boolean|False| |是否对数据进行掩码|
|**auditResponse**|Boolean|False| |是否对响应进行审计|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
