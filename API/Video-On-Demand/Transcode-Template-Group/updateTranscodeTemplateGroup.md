# updateTranscodeTemplateGroup


## 描述
修改转码模板组

## 请求方式
PUT

## 请求地址
https://vod.jdcloud-api.com/v1/transcodeTemplateGroups/{groupId}


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**groupId**|String|True| |模板组ID|
|**groupName**|String|False| |转码模板组名称|
|**templates**|[GroupedTranscodeTemplateData[]](updatetranscodetemplategroup#groupedtranscodetemplatedata)|False| | |


### <div id="groupedtranscodetemplatedata">GroupedTranscodeTemplateData</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**templateId**|Long|False| |模板ID|
|**templateName**|String|False| |模板名称|
|**video**|[Video](updatetranscodetemplategroup#video)|False| |视频参数配置|
|**audio**|[Audio](updatetranscodetemplategroup#audio)|False| |音频参数配置|
|**container**|[Container](updatetranscodetemplategroup#container)|False| |封装配置|
|**definition**|String|False| |清晰度规格标记。取值范围：<br>  SD - 标清<br>  HD - 高清<br>  FHD - 超清<br>  2K<br>  4K<br>|
|**templateType**|String|False| |模板类型。取值范围：<br>  jdchd - 京享超清<br>  jdchs - 极速转码<br>|
|**packageType**|String|False| |打包类型。取值范围：None, HLSPackage|
|**createTime**|String|False| |创建时间|
|**updateTime**|String|False| |修改时间|
### <div id="container">Container</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**format**|String|False| |封装格式|
### <div id="audio">Audio</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**codec**|String|False| |音频编码。取值范围：aac|
|**bitrate**|Integer|False| |音频目标码率。取值范围：[8，1000]，单位为 Kbps|
|**sampleRate**|Integer|False| |音频采样率。取值范围：8000、11025、12000、16000、22050、24000、32000、44100、48000、64000、88200、96000|
|**channels**|Integer|False| |音频声道数：1、2|
|**comfortable**|Boolean|False| |是否开启舒适音频：true、false|
### <div id="video">Video</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**codec**|String|False| |视频编码。取值范围：h265、h264|
|**bitrate**|Integer|False| |视频码率。取值范围 [128、10000]，单位为 Kbps|
|**fps**|Integer|False| |视频帧率。取值范围为 [1、60]，单位为 fps|
|**width**|Integer|False| |视频输出宽度。取值范围 [128，4096] 整数。<br>当值为空时，若 height 也为空，则 width 和 height 与原视频保持一致；若 height 不为空，则 width 按照原视频的分辨率等比缩放。<br>|
|**height**|Integer|False| |视频输出高度。取值范围 [128，4096] 整数。<br>当值为空时，若 width 也为空，则 width 和 height 与原视频保持一致；若 width 不为空，则 height 按照原视频的分辨率等比缩放。<br>|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](updatetranscodetemplategroup#result)|修改操作结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**groupId**|String|转码模板组ID|
|**groupName**|String|转码模板组名称|
|**templates**|[GroupedTranscodeTemplateData[]](updatetranscodetemplategroup#groupedtranscodetemplatedata)| |
|**createTime**|String|创建时间|
|**updateTime**|String|修改时间|
### <div id="groupedtranscodetemplatedata">GroupedTranscodeTemplateData</div>
|名称|类型|描述|
|---|---|---|
|**templateId**|Long|模板ID|
|**templateName**|String|模板名称|
|**video**|[Video](updatetranscodetemplategroup#video)|视频参数配置|
|**audio**|[Audio](updatetranscodetemplategroup#audio)|音频参数配置|
|**container**|[Container](updatetranscodetemplategroup#container)|封装配置|
|**definition**|String|清晰度规格标记。取值范围：<br>  SD - 标清<br>  HD - 高清<br>  FHD - 超清<br>  2K<br>  4K<br>|
|**templateType**|String|模板类型。取值范围：<br>  jdchd - 京享超清<br>  jdchs - 极速转码<br>|
|**packageType**|String|打包类型。取值范围：None, HLSPackage|
|**createTime**|String|创建时间|
|**updateTime**|String|修改时间|
### <div id="container">Container</div>
|名称|类型|描述|
|---|---|---|
|**format**|String|封装格式|
### <div id="audio">Audio</div>
|名称|类型|描述|
|---|---|---|
|**codec**|String|音频编码。取值范围：aac|
|**bitrate**|Integer|音频目标码率。取值范围：[8，1000]，单位为 Kbps|
|**sampleRate**|Integer|音频采样率。取值范围：8000、11025、12000、16000、22050、24000、32000、44100、48000、64000、88200、96000|
|**channels**|Integer|音频声道数：1、2|
|**comfortable**|Boolean|是否开启舒适音频：true、false|
### <div id="video">Video</div>
|名称|类型|描述|
|---|---|---|
|**codec**|String|视频编码。取值范围：h265、h264|
|**bitrate**|Integer|视频码率。取值范围 [128、10000]，单位为 Kbps|
|**fps**|Integer|视频帧率。取值范围为 [1、60]，单位为 fps|
|**width**|Integer|视频输出宽度。取值范围 [128，4096] 整数。<br>当值为空时，若 height 也为空，则 width 和 height 与原视频保持一致；若 height 不为空，则 width 按照原视频的分辨率等比缩放。<br>|
|**height**|Integer|视频输出高度。取值范围 [128，4096] 整数。<br>当值为空时，若 width 也为空，则 width 和 height 与原视频保持一致；若 width 不为空，则 height 按照原视频的分辨率等比缩放。<br>|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
