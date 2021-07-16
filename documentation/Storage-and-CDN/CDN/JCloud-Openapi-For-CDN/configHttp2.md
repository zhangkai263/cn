## http2配置（configHttp2）

### 接口描述
中国境外/全球加速域名暂不支持该配置

### 请求方式
POST

### 请求地址
/v1/domain/{domain}/configHttp2

### 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|是| |用户域名|
|**status**|String|是| |HTTP2功能开关，取值on/off|

### 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Object| |
|**requestId**|String| |
