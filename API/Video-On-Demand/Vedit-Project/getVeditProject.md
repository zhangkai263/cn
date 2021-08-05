# getVeditProject


## 描述
查询视频剪辑工程详情

## 请求方式
GET

## 请求地址
https://vod.jdcloud-api.com/v1/veditProjects/{projectId}


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**projectId**|Long|True| |视频剪辑工程ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getveditproject#result)|查询操作结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**projectId**|Long|工程ID|
|**projectName**|String|工程名称|
|**description**|String|工程描述|
|**timeline**|[Timeline](getveditproject#timeline)|时间线信息|
|**createTime**|String|创建时间|
|**updateTime**|String|修改时间|
### <div id="timeline">Timeline</div>
|名称|类型|描述|
|---|---|---|
|**trackList**|[MediaTrack[]](getveditproject#mediatrack)|媒体轨列表，有序，若有重合时间段，则排在后面的媒体轨上的重叠部分将被忽略|
### <div id="mediatrack">MediaTrack</div>
|名称|类型|描述|
|---|---|---|
|**trackType**|String|轨类型。当前只支持 video|
|**clips**|[MediaClip[]](getveditproject#mediaclip)| |
### <div id="mediaclip">MediaClip</div>
|名称|类型|描述|
|---|---|---|
|**mediaId**|String|素材ID，此处，必须为视频点播媒资的视频ID。<br>一个Timeline中的所有MediaClip中，若有2个或以上的不同MediaId，即素材片段来源于2个或以上不同视频，则在提交剪辑作业时，必须在UserData中指明合并后的视频画面的宽高。<br>如 {\"extendData\": {\"width\": 720, \"height\": 500}}，其中width和height必须为[16, 4096]之间的偶数<br>|
|**mediaIn**|Integer|素材片段在媒资中的入点|
|**mediaOut**|Integer|素材片段在媒资中的出点|
|**timelineIn**|Integer|素材片段在合成时间线中的入点|
|**timelineOut**|Integer|素材片段在合成时间线中的出点|
|**operations**|[ClipOperation[]](getveditproject#clipoperation)| |
### <div id="clipoperation">ClipOperation</div>
|名称|类型|描述|
|---|---|---|
|**opType**|String|操作类型，当前支持 crop,transparent,volume|
|**params**|Object|操作参数，JSON对象，如 CropParams, TransparentParams, AudioVolumeParams|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
