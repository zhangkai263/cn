# submitVeditJob


## 描述
提交视频剪辑作业

## 请求方式
POST

## 请求地址
https://vod.jdcloud-api.com/v1/veditJobs:submit


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**projectId**|Long|True| |工程ID|
|**mediaMetadata**|[MediaMetadata](submitveditjob#mediametadata)|False| |合成媒资元数据|
|**userData**|String|False| |用户数据，JSON格式的字符串。<br>在Timeline中的所有MediaClip中，若有2个或以上的不同MediaId，即素材片段来源于2个或以上不同视频，则在提交剪辑作业时，必须在UserData中指明合并后的视频画面的宽高。<br>如 {\"extendData\": {\"width\": 720, \"height\": 500}}，其中width和height必须为[16, 4096]之间的偶数<br>|

### <div id="mediametadata">MediaMetadata</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**title**|String|False| | |

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](submitveditjob#result)|查询操作结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**jobId**|Long|作业ID|
|**projectId**|Long|工程ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
