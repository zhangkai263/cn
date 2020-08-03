## 查询回源path（queryBackSourcePath）


### 请求方式
GET

### 请求地址
/v1/domain/{domain}/queryBackSourcePath

### 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|是| |用户域名|


### 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[QueryBackSourcePathResp](querybacksourcepath#result)| |
|**requestId**|String| |

### <div id="QueryBackSourcePathResp">QueryBackSourcePathResp</div>
|名称|类型|描述|
|---|---|---|
|**domain**|String|加速域名|
|**configs**|List<ConfigBackSourcePathItems>|是| | 配置信息|

### ConfigBackSourcePathItems
|名称|类型|描述|
|---|---|---|
|**path**|String|路径|
|**origHost**|String|回源host |
|**urlHost**|String|url回源host |
