# listTranscodeTemplateGroups


## 描述
查询转码模板组列表。


## 请求方式
GET

## 请求地址
https://vod.jdcloud-api.com/v1/transcodeTemplateGroups


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认值为 1|
|**pageSize**|Integer|False|10|分页大小；默认值为 10；取值范围 [10, 100]|
|**filters**|[Filter[]](listtranscodetemplategroups#filter)|False| | |

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤器属性名|
|**operator**|String|False| |过滤器操作符，默认值为 eq|
|**values**|String[]|True| |过滤器属性值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listtranscodetemplategroups#result)|分页查询操作结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pageNumber**|Integer|当前页码|
|**pageSize**|Integer|每页数量|
|**totalElements**|Integer|查询总数|
|**totalPages**|Integer|总页数|
|**content**|[TranscodeTemplateGroupData[]](listtranscodetemplategroups#transcodetemplategroupdata)|分页内容|
### <div id="transcodetemplategroupdata">TranscodeTemplateGroupData</div>
|名称|类型|描述|
|---|---|---|
|**groupId**|String|转码模板组ID|
|**groupName**|String|转码模板组名称|
|**templates**|[GroupedTranscodeTemplateData[]](listtranscodetemplategroups#groupedtranscodetemplatedata)| |
|**createTime**|String|创建时间|
|**updateTime**|String|修改时间|
### <div id="groupedtranscodetemplatedata">GroupedTranscodeTemplateData</div>
|名称|类型|描述|
|---|---|---|
|**templateId**|Long|模板ID|
|**templateName**|String|模板名称|
|**video**|[Video](listtranscodetemplategroups#video)|视频参数配置|
|**audio**|[Audio](listtranscodetemplategroups#audio)|音频参数配置|
|**container**|[Container](listtranscodetemplategroups#container)|封装配置|
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
|**500**|Internal server error|
|**503**|Service unavailable|
