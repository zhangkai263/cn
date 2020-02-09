# 路径通行时间预测

## 接口描述
城市路径通行时间预测是基于现实生活场景中的出行数据并结合深度学习算法，来精准的对某段行程时间进行预测的服务。按要求输入起始位置、中间各个节点位置的经纬度坐标，以及相关时间信息，来对城市路径通行时间进行预测。
## 请求说明

### 1.请求地址
http://wgawscqq45tj.cn-north-1.jdcloud-api.net/group1/ai_platform/v1_0/jdcloud/tte_pred

### 2.请求方式
POST

### 3. 请求参数

####  body请求参数
|名称|类型|必填|示例值|描述|
|---|---|---|---|---|
|**data**|dict| 是 | 无 | 路径通行时间的相关参数，data对应的是一个字典，其需要包括dateID（时间编码），dist（路径总距离），dist_gap（分段路径的长度），lats（dist_gap对应各点的经度），lngs（dist_gap对应各点的纬度），states（dist_gap对应各点的状态），timeID（时间ID编号），weekID（周ID编号）|

### 4. 请求代码示例
建议您使用我们提供的SDK进行调用，SDK获取及调用方式详见sdk的使用方法

## 返回说明

### 1. 返回参数

#### 业务返回参数
参数信息

|名称|类型|示例值|描述|
|---|---|---|---|
|status|string | 200 | 返回结果，200表示成功|
|message|string | success | 结果状态，成功为 success |
|data| array | [ ... ] | 预测结果 |

### 2. 返回示例
```js
{
    "status": 0,
    "message": "success",
    "data": "{'result': 760.1220092773438}"

}
```