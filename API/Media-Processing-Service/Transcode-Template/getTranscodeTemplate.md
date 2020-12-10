# getTranscodeTemplate


## 描述
查询转码模板

## 请求方式
GET

## 请求地址
https://mps.jdcloud-api.com/v1/transcodeTemplates/{templateId}


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**templateId**|Long|True| |模板ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](user-content-gettranscodetemplate#result)|查询转码模板信息结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**templateId**|String|模板ID|
|**title**|String|模板标题。长度不超过 128 个字符，最少 2 个字符。UTF-8 编码。<br>|
|**video**|[VideoStreamSettings](user-content-gettranscodetemplate#videostreamsettings)|视频参数配置|
|**audio**|[AudioStreamSettings](user-content-gettranscodetemplate#audiostreamsettings)|音频参数配置|
|**container**|[ContainerSettings](user-content-gettranscodetemplate#containersettings)|容器设置|
|**encryption**|[EncryptionSettings](user-content-gettranscodetemplate#encryptionsettings)|加密配置|
|**definition**|String|清晰度规格标记。取值范围：<br>  SD - 标清<br>  HD - 高清<br>  FHD - 超清<br>  2K<br>  4K<br>|
|**transcodeType**|String|转码方式。取值范围：<br>  normal - 普通转码<br>  jdchd - 京享超清<br>  jdchs - 极速转码<br>|
|**createTime**|String|创建时间|
|**updateTime**|String|修改时间|
### <div id="encryptionsettings">EncryptionSettings</div>
|名称|类型|描述|
|---|---|---|
|**hlsKey**|String|HLS加密公钥，按指定编码方式编码<br>必须为 16 字节值，按照 hlsKeyEncodeType 所指定的编码方式进行编码后的字符串<br>|
|**hlsKeyUrl**|String|HLS加密公钥地址，仅支持HTTP(s)地址<br>若 hlsKey 已设置，则表示开启 HLS 加密，此时为必须参数<br>|
|**hlsKeyEncodeType**|String|HLS加密公钥编码方式。取值范围：base16, base32, base64<br>若 hlsKey 已设置，则表示开启 HLS 加密，此时为必须参数<br>|
### <div id="containersettings">ContainerSettings</div>
|名称|类型|描述|
|---|---|---|
|**format**|String|输出的音视频文件封装格式。取值范围：mp4、hls、flv<br>|
### <div id="audiostreamsettings">AudioStreamSettings</div>
|名称|类型|描述|
|---|---|---|
|**codec**|String|音频编码。取值范围：aac 。目前仅支持 acc|
|**bitrate**|Integer|音频目标码率。取值范围：[8, 1000]，单位为 Kbps|
|**sampleRate**|Integer|音频采样率。<br>若容器封装格式为 flv ，该字段为必须参数，其取值范围：22050、44100<br>若容器封装格式不为 flv ，则此字段为非必须参数，未设置时，与源文件音频采样率保持一致，若设置值，其取值范围：22050、24000、32000、44100、48000、64000、88200、96000<br>|
|**channels**|Integer|音频声道数。取值范围：1、2 。默认值为 2|
|**comfortable**|Boolean|是否开启舒适音频。取值范围：true、false，默认值为 true|
### <div id="videostreamsettings">VideoStreamSettings</div>
|名称|类型|描述|
|---|---|---|
|**codec**|String|视频编码。取值范围：h264、h265|
|**rcmode**|String|码率控制模式。取值范围：<br>  crf - 恒定码率系数模式。设置此模式时，rateFactor 生效，bitrate 会被忽略<br>  abr - 平均码率模式。设置此模式时，bitrate 生效，rateFactor 会被忽略<br>默认值为 abr<br>|
|**rateFactor**|String|码率控制因子。取值范围：[0, 51]，支持2位小数的浮点数<br>当 codec 为 h264 时，默认值为 23；当 codec 为 h265 时，默认值为 28<br>|
|**bitrate**|Integer|视频码率。取值范围：[128, 10000]，单位为 Kbps<br>|
|**frameRate**|Integer|视频帧率。取值范围：[1, 60]，单位为 fps<br>未设置时，与源文件视频帧率保持一致<br>|
|**width**|Integer|视频输出宽度。取值范围：[128, 4096] 整数。单位为 px<br>未设置时，若 height 也未设置值，则 width 和 height 与原视频保持一致；若 height 设置值，则 width 按照原视频的分辨率等比缩放<br>|
|**height**|Integer|视频输出高度。取值范围：[128, 4096] 整数。单位为 px<br>未设置时，若 width 也未设置值，则 width 和 height 与原视频保持一致；若 width 设置值，则 height 按照原视频的分辨率等比缩放<br>|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
GET
```
https://mps.jdcloud-api.com/v1/transcodeTemplates/10001

```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "audio": {
            "bitrate": 256, 
            "channels": 2, 
            "codec": "aac", 
            "comfortable": true, 
            "sampleRate": 44100
        }, 
        "container": {
            "format": "mp4"
        }, 
        "createTime": "2019-04-16T15:51:32Z", 
        "definition": "HD", 
        "encryption": {
            "hlsKey": "5ZSv5pyJ5YyX6bG877yM5Q==", 
            "hlsKeyEncodeType": "base64", 
            "hlsKeyUrl": "https://example.com/hlsenc.key"
        }, 
        "templateId": 10001, 
        "title": "我的转码模板", 
        "transcodeType": "jdchd", 
        "updateTime": "2019-04-16T15:51:32Z", 
        "video": {
            "bitrate": 1024, 
            "codec": "h264", 
            "frameRate": "25", 
            "height": 240, 
            "rateFactor": "23", 
            "width": 320
        }
    }
}
```
