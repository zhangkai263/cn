# queryStatisticsData


## 描述
查询统计数据

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/vodStatistics

### 请求参数 

| 参数名    | 类型   | 是否必须 | 示例                 | 描述                                                         |
| --------- | ------ | -------- | -------------------- | ------------------------------------------------------------ |
| domain    | String | 否       | www.example.com      | 域名多个用逗号隔开，如果不传，则为该pin所有的点播域名        |
| subDomain | String | 否       | sub.example.com      | 子域名                                                       |
| startTime | String   | 是       | 2018-11-16T16:01:00Z | 查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z |
| endTime   | String   | 是       | 2018-11-17T02:00:00Z | 查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z |
| fields    | String | 否       |                      | 查询的字段，决定了查询结果中出现哪些字段，取值范围见“查询统计字段说明”。多个用逗号分隔。默认为空，表示查询所有字段 |
| area      | String | 否       |                      | 查询的区域，如beijing,shanghai。多个用逗号分隔               |
| isp       | String | 否       |                      |                                                              |
| origin    | String | 否       |                      |                                                              |
| period    | String | 否       |                      | 查询周期，当前取值范围：“oneMin,fiveMin,halfHour,hour,twoHour,sixHour,day,followTime”，分别表示1min，5min，半小时，1小时，2小时，6小时，1天，跟随时间。默认为空，表示fiveMin。当传入followTime时，表示按Endtime-StartTime的周期，只返回一个点 |

### 响应参数

| 名称      | 类型   | 描述         |
| --------- | ------ | ------------ |
| requestId | String | 请求的唯一ID |
| result    | Object |              |

#### 数据类型Result

| 名称         | 类型   | 描述                   |
| ------------ | ------ | ---------------------- |
| startTime | String   | 是       | 2018-11-16T16:01:00Z | 查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z |
| endTime   | String   | 是       | 2018-11-17T02:00:00Z | 查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z |
| domain       | String | 查询的域名，以逗号分隔 |
| dataItemList | Array  | 查询结果               |

### 数据类型 statistics

| 名称      | 类型 | 描述                                           |
| --------- | ---- | ---------------------------------------------- |
| startTime | Long | 起始时间的时间戳                               |
| endTime   | Long | 结束时间的时间戳                               |
| data      | Map  | 查询的字段名称及值，可查询字段请参见上面的字段 |
