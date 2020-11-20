# exportImage


## 描述
导出镜像，将京东云私有镜像导出至京东云以外环境


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images/{imageId}:exportImage

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**imageId**|String|True| |镜像ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**roleName**|String|True| |用户创建的服务角色名称|
|**ossUrl**|String|True| |存储导出镜像文件的oss bucket的域名，请填写以 https:// 开头的完整url|
|**ossPrefix**|String|False| |导出镜像文件名前缀，仅支持英文字母和数字，不能超过32个字符|
|**clientToken**|String|False| |用户导出镜像的幂等性保证。每次导出请传入不同的值，如果传值与某次的clientToken相同，则返还同一个请求结果，不能超过64个字符|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](exportimage#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**exportTaskId**|Integer|导出任务id|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
