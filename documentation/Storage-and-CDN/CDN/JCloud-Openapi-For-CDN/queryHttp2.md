## 查询http2配置（queryHttp2）

### 请求方式
GET

### 请求地址
/v1/domain/{domain}/queryHttp2

### 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|是| |用户域名|

### 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[QueryHttp2Resp](queryhttp2#result)| |
|**requestId**|String| |

### <div id="QueryHttp2Resp">QueryHttp2Resp</div>
|名称|类型|描述|
|---|---|---|
|**domain**|String|加速域名|
|**status**|String|HTTP2功能开关，取值on/off|
