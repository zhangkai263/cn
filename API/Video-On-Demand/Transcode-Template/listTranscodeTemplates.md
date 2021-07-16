# listTranscodeTemplates


## 描述
查询转码模板列表。
允许通过条件过滤查询，支持的过滤字段如下：
  - source[eq] 按模板来源精确查询
  - templateType[eq] 按模板类型精确查询


## 请求方式
GET

## 请求地址
https://vod.jdcloud-api.com/v1/transcodeTemplates


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认值为 1|
|**pageSize**|Integer|False|10|分页大小；默认值为 10；取值范围 [10, 100]|
|**filters**|[Filter[]](listtranscodetemplates#filter)|False| | |

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤器属性名|
|**operator**|String|False| |过滤器操作符，默认值为 eq|
|**values**|String[]|True| |过滤器属性值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listtranscodetemplates#result)|查询转码模板列表信息结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pageNumber**|Integer|当前页码|
|**pageSize**|Integer|每页数量|
|**totalElements**|Integer|查询总数|
|**totalPages**|Integer|总页数|
|**content**|[TranscodeTemplateObject[]](listtranscodetemplates#transcodetemplateobject)|分页内容|
### <div id="transcodetemplateobject">TranscodeTemplateObject</div>
|名称|类型|描述|
|---|---|---|
|**id**|Long|模板ID|
|**name**|String|模板名称。长度不超过128个字符。UTF-8编码。<br>|
|**video**|[Video](listtranscodetemplates#video)|视频参数配置|
|**audio**|[Audio](listtranscodetemplates#audio)|音频参数配置|
|**encapsulation**|[Encapsulation](listtranscodetemplates#encapsulation)|封装配置|
|**outFile**|[OutFile](listtranscodetemplates#outfile)|输出文件配置|
|**definition**|String|清晰度规格标记。取值范围：<br>  SD - 标清<br>  HD - 高清<br>  FHD - 超清<br>  2K<br>  4K<br>|
|**source**|String|模板来源。取值范围：<br>  system - 系统预置<br>  custom - 用户自建<br>|
|**templateType**|String|模板类型。取值范围：<br>  jdchd - 京享超清<br>  jdchs - 极速转码<br>|
|**createTime**|String|创建时间|
|**updateTime**|String|修改时间|
### <div id="outfile">OutFile</div>
|名称|类型|描述|
|---|---|---|
|**filePath**|String|输出文件路径。<br>路径支持占位符 YEAR、MONTH、DAY、JOBID、TASKID、TEMPLATEID, VIDEOID，但对于转码输出路径，必须以 vod/product 为路径前缀。<br>最终生成的转码输出文件，将会是此路径和一个随机文件名共同构成。<br>若转码模板中该字段配置为：vod/product/{YEAR}{MONTH}{DAY}/{JOBID}/{TEMPLATEID}/{TASKID}<br>则最终生成的输出文件可能为：vod/product/20200921/8238/2243310/2378041/6b91f559d51b4b62ac60b98c318e9ae9.mp4<br>|
### <div id="encapsulation">Encapsulation</div>
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

## 请求示例
GET
```
https://vod.jdcloud-api.com/v1/transcodeTemplates?pageNumber=1&pageSize=10&filters.1.name=source&filters.1.values.1=custom&filters.1.operator=eq&filters.2.name=templateType&filters.2.values.1=jdchd&filters2.operator=eq

```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "content": [
            {
                "audio": {
                    "bitrate": 200, 
                    "channels": 2, 
                    "codec": "ACC", 
                    "comfortable": true, 
                    "sampleRate": 44100
                }, 
                "createTime": "2019-04-16T15:51:32Z", 
                "definition": "HD", 
                "encapsulation": {
                    "format": "FLV"
                }, 
                "id": 10001, 
                "name": "我的转码模板", 
                "outFile": {
                    "filePath": "/vod/product/{YEAR}{MONTH}{DAY}/{TASKID}"
                }, 
                "source": "custom", 
                "templateType": "jdchd", 
                "updateTime": "2019-04-16T15:51:32Z", 
                "video": {
                    "bitrate": 1080, 
                    "codec": "H.264", 
                    "fps": 20, 
                    "height": 240, 
                    "width": 320
                }
            }
        ], 
        "pageNumber": 1, 
        "pageSize": 10, 
        "totalElements": 100, 
        "totalPages": 10
    }
}
```
