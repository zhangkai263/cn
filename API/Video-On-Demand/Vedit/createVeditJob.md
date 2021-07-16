# createVeditJob


## 描述
创建视频剪辑作业


## 请求方式
POST

## 请求地址
https://vod.jdcloud-api.com/v1/veditJobs


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**projectName**|String|False| |工程名称|
|**description**|String|False| |工程描述|
|**timeline**|[Timeline](createveditjob#timeline)|False| |时间线信息|
|**mediaMetadata**|[MediaMetadata](createveditjob#mediametadata)|False| |剪辑合成媒资元数据|
|**userData**|String|False| |用户数据，JSON格式的字符串|

### <div id="mediametadata">MediaMetadata</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**title**|String|False| | |
### <div id="timeline">Timeline</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**trackList**|[MediaTrack[]](createveditjob#mediatrack)|False| |媒体轨列表，有序，若有重合时间段，则排在后面的媒体轨上的重叠部分将被忽略|
### <div id="mediatrack">MediaTrack</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**trackType**|String|False| |轨类型。当前只支持 video|
|**clips**|[MediaClip[]](createveditjob#mediaclip)|False| | |
### <div id="mediaclip">MediaClip</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**mediaId**|String|False| |素材ID，此处，必须为视频点播媒资的视频ID|
|**mediaIn**|Integer|False| |素材片段在媒资中的入点|
|**mediaOut**|Integer|False| |素材片段在媒资中的出点|
|**timelineIn**|Integer|False| |素材片段在合成时间线中的入点|
|**timelineOut**|Integer|False| |素材片段在合成时间线中的出点|
|**operations**|[ClipOperation[]](createveditjob#clipoperation)|False| | |
### <div id="clipoperation">ClipOperation</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**opType**|String|False| |操作类型，当前支持 crop,transparent,volume|
|**params**|Object|False| |操作参数，JSON对象，如 CropParams, TransparentParams, AudioVolumeParams|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createveditjob#result)|创建操作结果|
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
|**500**|Internal server error|
|**503**|Service unavailable|
