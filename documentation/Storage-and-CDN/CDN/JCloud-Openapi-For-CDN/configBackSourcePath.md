## 多path回源配置（configBackSourcePath）

中国境外/全球加速时暂不支持该配置

### 请求方式
POST

### 请求地址
/v1/domain/{domain}/configBackSourcePath

### 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|是| |用户域名|
|**configs**|List<ConfigBackSourcePathItems>|是| | 配置信息|

### ConfigBackSourcePathItems
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**path**|String|是| |必须以'/'开头|
|**origHost**|String|否| |回源host |
|**urlHost**|String|否| |url回源host |

### 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Object| |
|**requestId**|String| |
