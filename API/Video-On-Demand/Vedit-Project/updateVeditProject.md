# updateVeditProject


## 描述
修改视频剪辑工程信息

## 请求方式
PUT

## 请求地址
https://vod.jdcloud-api.com/v1/veditProjects/{projectId}


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**projectId**|Long|True| |视频剪辑工程ID|
|**projectName**|String|False| |工程名称|
|**description**|String|False| |工程描述|
|**timeline**|[Timeline](updateveditproject#timeline)|False| |时间线信息|

### <div id="timeline">Timeline</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**trackList**|[MediaTrack[]](updateveditproject#mediatrack)|True| |媒体轨列表，有序，若有重合时间段，则排在后面的媒体轨上的重叠部分将被忽略|
### <div id="mediatrack">MediaTrack</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**trackType**|String|True| |轨类型。当前只支持 video|
|**clips**|[MediaClip[]](updateveditproject#mediaclip)|True| |视频剪辑片段。一个Timeline中的所有MediaClip，总共不能超过20个。 |
### <div id="mediaclip">MediaClip</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**mediaId**|String|False| |素材ID，此处，必须为视频点播媒资的视频ID|
|**mediaIn**|Integer|False| |素材片段在媒资中的入点|
|**mediaOut**|Integer|False| |素材片段在媒资中的出点|
|**timelineIn**|Integer|False| |素材片段在合成时间线中的入点|
|**timelineOut**|Integer|False| |素材片段在合成时间线中的出点|
|**operations**|[ClipOperation[]](updateveditproject#clipoperation)|False| | |
### <div id="clipoperation">ClipOperation</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**opType**|String|False| |操作类型，当前支持 crop,transparent,volume|
|**params**|Object|False| |操作参数，JSON对象，如 CropParams, TransparentParams, AudioVolumeParams|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](updateveditproject#result)|修改操作结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**projectId**|Long|工程ID|
|**projectName**|String|工程名称|
|**description**|String|工程描述|
|**timeline**|[Timeline](updateveditproject#timeline)|时间线信息|
|**createTime**|String|创建时间|
|**updateTime**|String|修改时间|
### <div id="timeline">Timeline</div>
|名称|类型|描述|
|---|---|---|
|**trackList**|[MediaTrack[]](updateveditproject#mediatrack)|媒体轨列表，有序，若有重合时间段，则排在后面的媒体轨上的重叠部分将被忽略|
### <div id="mediatrack">MediaTrack</div>
|名称|类型|描述|
|---|---|---|
|**trackType**|String|轨类型。当前只支持 video|
|**clips**|[MediaClip[]](updateveditproject#mediaclip)| |
### <div id="mediaclip">MediaClip</div>
|名称|类型|描述|
|---|---|---|
|**mediaId**|String|素材ID，此处，必须为视频点播媒资的视频ID|
|**mediaIn**|Integer|素材片段在媒资中的入点|
|**mediaOut**|Integer|素材片段在媒资中的出点|
|**timelineIn**|Integer|素材片段在合成时间线中的入点|
|**timelineOut**|Integer|素材片段在合成时间线中的出点|
|**operations**|[ClipOperation[]](updateveditproject#clipoperation)| |
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
