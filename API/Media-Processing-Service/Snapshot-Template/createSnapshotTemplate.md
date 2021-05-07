# createSnapshotTemplate


## 描述
创建截图模板

## 请求方式
POST

## 请求地址
https://mps.jdcloud-api.com/v1/snapshotTemplates


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**title**|String|True| |模板标题。长度不超过 128 个字节。UTF-8 编码。|
|**startTime**|Integer|False| |截图起始时间，取值范围单位为秒，缺省值为 0<br>|
|**frameType**|String|False| |截图帧类型。取值范围：<br>  any - 任意帧<br>  intra - 关键帧<br>缺省值为 any<br>|
|**format**|String|False| |截图格式。取值范围：<br>  jpg - 对应的截图或雪碧图输出文件扩展名为 jpg<br>  png - 对应的截图或雪碧图输出文件扩展名为 png<br>缺省值为 jpg<br>|
|**number**|Integer|False| |截图数量。取值范围：[1, 3600]<br>缺省值为 10<br>若雪碧图配置不为空，则生成雪碧图，提交的截图任务中，此字段会被雪碧图的行列积所覆盖。<br>|
|**interval**|Integer|False| |截图时间间隔。取值范围：[1, 100]，单位为秒<br>若未设置，则对于普通截图，按照截图张数做平均截图；对于雪碧图，则按照行列数乘积做平均截图<br>|
|**width**|Integer|False| |截图宽度，取值范围：[8, 4096]<br>若宽度和高度同时设置，则按照设置的宽高截图；<br>若宽度和高度均未设置，则截图保持与源视频相同的宽高值；<br>若宽度和高度其中一项未设置，则截图保持与源视频相同的宽高比；<br>|
|**height**|Integer|False| |截图高度，取值范围：[8, 4096]<br>若宽度和高度同时设置，则按照设置的宽高截图；<br>若宽度和高度均未设置，则截图保持与源视频相同的宽高值；<br>若宽度和高度其中一项未设置，则截图保持与源视频相同的宽高比；<br>|
|**fillType**|String|False| |填充方式，当视频宽高与截图宽高指定值不能匹配时的填充处理方式。取值范围：<br>  stretch - 伸缩<br>  black - 留黑<br>  white - 留白<br>  gauss - 高斯模糊<br>缺省值为 black<br>|
|**spriteConfig**|[SpriteConfig](user-content-createsnapshottemplate#spriteconfig)|False| |雪碧图配置。若此字段有值，则生成雪碧图。<br>|

### <div id="spriteconfig">SpriteConfig</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**rows**|Integer|True| |雪碧图小图行数。雪碧图行列积必须不大于100<br>|
|**columns**|Integer|True| |雪碧图小图列数。雪碧图行列积必须不大于100<br>|
|**cellWidth**|Integer|False| |雪碧图单元格宽度<br>取值范围：[8, 4096]，不能为奇数<br>未设置时，回退为截图宽度 width<br>|
|**cellHeight**|Integer|False| |雪碧图单元格高度，<br>取值范围：[8, 4096]，不能为奇数<br>未设置时，系统自动会自动设置为截图高度 height<br>|
|**doKeepShots**|Boolean|False| |是否保留截图<br>雪碧图的截图方式是先截取普通图，然后合成雪碧图。此字段控制是否保留截图。<br>|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](user-content-createsnapshottemplate#result)|创建截图模板结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**templateId**|String|模板ID|
|**title**|String|模板标题。长度不超过 128 个字节。UTF-8 编码。|
|**startTime**|Integer|截图起始时间，单位：秒|
|**frameType**|String|截图帧类型。|
|**format**|String|截图格式。取值范围：jpg、png|
|**number**|Integer|截图数量|
|**interval**|Integer|截图间隔|
|**width**|Integer|截图宽度|
|**height**|Integer|截图高度|
|**fillType**|String|填充方式|
|**spriteConfig**|[SpriteConfig](user-content-createsnapshottemplate#spriteconfig)|雪碧图配置|
|**createTime**|String|创建时间|
|**updateTime**|String|修改时间|
### <div id="spriteconfig">SpriteConfig</div>
|名称|类型|描述|
|---|---|---|
|**rows**|Integer|雪碧图小图行数。雪碧图行列积必须不大于100<br>|
|**columns**|Integer|雪碧图小图列数。雪碧图行列积必须不大于100<br>|
|**cellWidth**|Integer|雪碧图单元格宽度<br>取值范围：[8, 4096]，不能为奇数<br>未设置时，回退为截图宽度 width<br>|
|**cellHeight**|Integer|雪碧图单元格高度，<br>取值范围：[8, 4096]，不能为奇数<br>未设置时，系统自动会自动设置为截图高度 height<br>|
|**doKeepShots**|Boolean|是否保留截图<br>雪碧图的截图方式是先截取普通图，然后合成雪碧图。此字段控制是否保留截图。<br>|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
POST
```
https://mps.jdcloud-api.com/v1/snapshotTemplates

```

```
{
    "fillType": "stretch", 
    "format": "jpg", 
    "frameType": "any", 
    "height": 480, 
    "interval": 10, 
    "number": 10, 
    "spriteConfig": {
        "cellHeight": 48, 
        "cellWidth": 48, 
        "columns": 10, 
        "doKeepShots": true, 
        "rows": 10
    }, 
    "startTime": 0, 
    "title": "我的截图模板", 
    "width": 720
}
```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "createTime": "2019-04-16T15:51:32Z", 
        "fillType": "stretch", 
        "format": "jpg", 
        "frameType": "any", 
        "height": 480, 
        "interval": 10, 
        "number": 10, 
        "spriteConfig": {
            "cellHeight": 48, 
            "cellWidth": 48, 
            "columns": 10, 
            "doKeepShots": true, 
            "rows": 10
        }, 
        "startTime": 0, 
        "templateId": "c35a7f843a6e49a4a32b1f8fab99fbd8", 
        "title": "我的截图模板", 
        "updateTime": "2019-04-16T15:51:32Z", 
        "width": 720
    }
}
```
