# 空气质量预测

## 接口描述
空气质量预测服务是对空气污染物指标进行预测的智能服务。基于大数据、深度学习技术，可精准的对空气质量进行预测。按要求输入需要进行预测地区的经纬度坐标，以及需要预测的空气质量指标，来对空气质量指标进行预测。

## 请求说明

### 1.请求地址
http://wgawscqq45tj.cn-north-1.jdcloud-api.net/group1/ai_platform/v1_0/jdcloud/deep_air_pred

### 2.请求方式
POST

### 3. 请求参数

####  body请求参数
|名称|类型|必填|示例值|描述|
|---|---|---|---|---|
|**latitude**|float| 是 | 无 | 当前位置的纬度|
|**longitude**|float| 是 | 无 | 当前位置的经度|
|**Pollutant**|string| 是 | 无 | 需要预测的空气质量指标，可选的有PM25，PM10，CO，NO2, SO2, O3|


### 4. 请求代码示例
建议您使用我们提供的SDK进行调用，SDK获取及调用方式详见sdk的使用方法

## 返回说明

### 1. 返回参数

####  业务返回参数
参数信息

|名称|类型|示例值|描述|
|---|---|---|---|
|code|string | 200 | 返回结果，200表示成功|
|message|string | success | 结果状态，成功为 success |
|data| array | [ ... ] | 预测结果，包括目的预测位置的空气质量现状以及与目的预测位置距离最近的空气质量监测站点未来48小时的空气质量指标预测 |

### 2. 返回示例
```js
{
  "code": 200,
  "message": "sucess",
  "data": {
    "the current AQI of this point is:": {
      "AQI": 108,
      "NO2": 75,
      "PM25": 108,
      "PM10": 89,
      "CO": 27,
      "O3": 14,
      "SO2": 13,
      "UpdateTime": "11:20",
      "Wind": null,
      "Pressure": null,
      "Temperature": null,
      "Humidity": null,
      "Name": ""
    },
    "the predict AQI of this point is:": {
      "Name": "迈皋桥",
      "Data": [
        15,
        19,
        21,
        23,
        26,
        28,
        30,
        25,
        22,
        20,
        18,
        15,
        15,
        13,
        11,
        10,
        9,
        8,
        7,
        7,
        7,
        8,
        8,
        9,
        11,
        11,
        13,
        15,
        18,
        19,
        21,
        23,
        22,
        21,
        20,
        18,
        17,
        16,
        14,
        12,
        11,
        10,
        10,
        10,
        9,
        9,
        9,
        10,
        12
      ],
      "Precission": [
        null,
        null,
        null,
        null
      ],
      "PredictionTime": "11:20",
      "ColligatePrecission": 0
    }
  }
}
```