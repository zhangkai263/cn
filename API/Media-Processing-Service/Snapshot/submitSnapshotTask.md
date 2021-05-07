# submitSnapshotTask


## 描述
提交视频截图任务

## 请求方式
POST

## 请求地址
https://mps.jdcloud-api.com/v1/snapshotTasks:submit


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**templateId**|String|True| |截图模板ID|
|**input**|[Input](user-content-submitsnapshottask#input)|True| | |
|**output**|[Output](user-content-submitsnapshottask#output)|True| | |
|**spriteOutput**|[Output](user-content-submitsnapshottask#output)|False| | |

### <div id="output">Output</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**region**|String|False| |输出对象存储区域|
|**bucket**|String|False| |输出对象存储空间|
|**objectPath**|String|False| |截图输出路径，包含占位符的截图输出路径。当前支持的占位符包括：<br>  {FILENAME} - 输入视频的简单文件名，如 "我和我的祖国"<br>  {TASKID} - 该截图任务的ID，如 "7234584d911b4e0db2fa13545c764898"<br>  {YEAR} - 四位数字年份，如 "2020"<br>  {MONTH} - 两位数字月份，如 "04"<br>  {DAY} - 两位数字日期，如 "15"<br>若未设置，则使用默认的输出路径：mps/{YEAR}/{MONTH}/{DAY}/{FILENAME}/ ，最终解析出的路径如 mps/2020/04/15/我和我的祖国/<br>为保证输出文件的唯一性，避免覆盖，系统会按照一定规则生成文件名，规则如下：<br>对于普通截图，生成 {TASKID}.{SEQUENCEID}.{EXTNAME} 规则的文件名；<br>对于雪碧图，生成 {TASKID}-sprite.{EXTNAME} 规则的文件名；<br>其中 SEQUENCEID 为左补0的6位数字截图序号，EXTNAME 为截图模板中截图格式 format 字段对应的文件扩展名<br>综述，若未设置此字段，则最终输出的普通截图形如：mps/2020/04/15/我和我的祖国/7234584d911b4e0db2fa13545c764898.000001.jpg ; 雪碧图形如：mps/2020/04/15/我和我的祖国/7234584d911b4e0db2fa13545c764898-sprite.jpg<br>|
### <div id="input">Input</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**region**|String|False| |输入对象存储区域|
|**bucket**|String|False| |输入对象存储空间|
|**objectKey**|String|False| |输入对象|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](user-content-submitsnapshottask#result)|提交视频截图任务结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**submitResult**|[SnapshotTaskObject[]](user-content-submitsnapshottask#snapshottaskobject)| |
### <div id="snapshottaskobject">SnapshotTaskObject</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|String|任务ID|
|**startTime**|Integer|截图起始时间|
|**frameType**|String|截图帧类型。|
|**format**|String|截图格式。取值范围：jpg、png|
|**number**|Integer|截图数量|
|**interval**|Integer|截图间隔|
|**width**|Integer|截图宽度|
|**height**|Integer|截图高度|
|**fillType**|String|填充方式|
|**input**|[Input](user-content-submitsnapshottask#input)|输入配置|
|**output**|[Output](user-content-submitsnapshottask#output)|输出配置|
|**spriteConfig**|[SpriteConfig](user-content-submitsnapshottask#spriteconfig)|雪碧图参数配置|
|**spriteOutput**|[Output](user-content-submitsnapshottask#output)|雪碧图输出配置|
|**status**|String|任务状态。<br>- submitted<br>- cancelled<br>- running<br>- finished_success<br>- finished_failure<br>|
|**createTime**|String|创建时间|
|**finishTime**|String|完成时间|
### <div id="output">Output</div>
|名称|类型|描述|
|---|---|---|
|**region**|String|输出对象存储区域|
|**bucket**|String|输出对象存储空间|
|**objectPath**|String|截图输出路径，包含占位符的截图输出路径。当前支持的占位符包括：<br>  {FILENAME} - 输入视频的简单文件名，如 "我和我的祖国"<br>  {TASKID} - 该截图任务的ID，如 "7234584d911b4e0db2fa13545c764898"<br>  {YEAR} - 四位数字年份，如 "2020"<br>  {MONTH} - 两位数字月份，如 "04"<br>  {DAY} - 两位数字日期，如 "15"<br>若未设置，则使用默认的输出路径：mps/{YEAR}/{MONTH}/{DAY}/{FILENAME}/ ，最终解析出的路径如 mps/2020/04/15/我和我的祖国/<br>为保证输出文件的唯一性，避免覆盖，系统会按照一定规则生成文件名，规则如下：<br>对于普通截图，生成 {TASKID}.{SEQUENCEID}.{EXTNAME} 规则的文件名；<br>对于雪碧图，生成 {TASKID}-sprite.{EXTNAME} 规则的文件名；<br>其中 SEQUENCEID 为左补0的6位数字截图序号，EXTNAME 为截图模板中截图格式 format 字段对应的文件扩展名<br>综述，若未设置此字段，则最终输出的普通截图形如：mps/2020/04/15/我和我的祖国/7234584d911b4e0db2fa13545c764898.000001.jpg ; 雪碧图形如：mps/2020/04/15/我和我的祖国/7234584d911b4e0db2fa13545c764898-sprite.jpg<br>|
### <div id="spriteconfig">SpriteConfig</div>
|名称|类型|描述|
|---|---|---|
|**rows**|Integer|雪碧图小图行数。雪碧图行列积必须不大于100<br>|
|**columns**|Integer|雪碧图小图列数。雪碧图行列积必须不大于100<br>|
|**cellWidth**|Integer|雪碧图单元格宽度<br>取值范围：[8, 4096]，不能为奇数<br>未设置时，回退为截图宽度 width<br>|
|**cellHeight**|Integer|雪碧图单元格高度，<br>取值范围：[8, 4096]，不能为奇数<br>未设置时，系统自动会自动设置为截图高度 height<br>|
|**doKeepShots**|Boolean|是否保留截图<br>雪碧图的截图方式是先截取普通图，然后合成雪碧图。此字段控制是否保留截图。<br>|
### <div id="input">Input</div>
|名称|类型|描述|
|---|---|---|
|**region**|String|输入对象存储区域|
|**bucket**|String|输入对象存储空间|
|**objectKey**|String|输入对象|

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
https://mps.jdcloud-api.com/v1/snapshotTasks:submit

```

```
{
    "input": {
        "bucket": "mps-snapshot-input", 
        "objectKey": "", 
        "region": "cn-north-1"
    }, 
    "output": {
        "bucket": "", 
        "objectPath": "", 
        "region": ""
    }, 
    "spriteOutput": {
        "bucket": "", 
        "objectPath": "", 
        "region": ""
    }, 
    "templateId": "c35a7f843a6e49a4a32b1f8fab99fbd8"
}
```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "taskId": "10000"
    }
}
```
