# 物模型介绍
物模型（Thing Model）是真实世界的物体在数字世界里的数据模型，物模型描述了归属于同一个物类型下的物所具备的通用功能。通过定义物模型，真实世界的物理设备、传感器可以更方便的被物联网平台进行管理

物模型由一个或多个模型组成。每个模型定义了该类型设备所支持的一组功能，这些功能通过属性、事件和方法三个方面进行描述，最终形成了应用与平台、平台与设备之间通讯的基础数据规范。模型分为两类，实体模型和服务模型

| 物模型概念  | 说明 |
| :-----| :----- |
|属性(properity) | 描述设备状态、属性的独立参数，分为只读，只写和读写类型。例如时间，名称，温度，开关等基础属性 |
|事件(event)  | 一些由条件触发的消息，由设备主动上报。事件体里可携带事件参数，传输更多信息 |
|模型(model) | 由属性、事件和方法构成的集合，代表了设备的一组功能特性 |
|实体模型(entity model)|表示设备实体物理特性、感知的功能集合，例如一个灯的模型|
|服务模型(service model)|由设备应用支持的服务类型的功能集合，例如 连接代理服务模型，OTA 服务模型|

#### 物模型构成

![物模型结构](../../../../../image/IoT/IoT-Core/Device-Manager/Create-Thing-Model/Thing-model-structure.png)

#### 物模型元素标识

物模型规范通过 id 来标识属性，事件，方法 ，模型，物模型，id 的值采用urn（uniform resource name）的格式来组织，形式如下：

id = 1[编号颁发机构].2[主体类型].156[国家编号].{京东物联平台编号}.{部署环境编号}.{设备
制造商编号}.{设备编号}


各字段说明：

| 字段           | 说明                                                         |
| :------------- | :----------------------------------------------------------- |
| 颁发机构编号 | 编号颁发机构，代表ISO组织 |
| 主体类型 | 主体类型，2代表国家 |
| 国家编号    | 国家编号，156代表国家 |
| 物联平台编号    | 京东物联平台编号 |
| 部署环境编号    | 京东预定义 |
| 设备制造商编号    | 设备制造商标识编号，京东预定义 |
| 设备编号    | 设备制造商定义，设备唯一标识 |

#### 物模型范例

```
{
	"modelName": "model1",
	"modelId": "modelid1323423",
	"version": "1.02",
	"properties": [{
		"name": "property1",
		//"属性名称",
		"type": "i",
		//"属性取值类型：使用 d-bus 类型描述规范 i-INT32, u-UINT32, n-INT16, q-UINT16, dDOUBLE, b-BOOLEAN, s-STRING, y-BYTE 详情见注释 1
"unit": "ms", //"属性单位",
"range": [
0,
100,
1
], //"取值范围参见注释2,
		"permission": "RW"//"操作权限： R、 W、 RW",
		
	},
	{
		"name": "property2",
		"type": "s",
		"unit": "",
		"list": ["basic",
		"detail"],
		"permission": "R"
	}],
	"events": [{
		"name": "event1",
		"parameters": [//"事件参数列表，格式： [{\"pn(参数名)\":\"pt(参数类型)\"}]",
		{
			"name": "count",
			"type": "i",
			"range": [0,
			100,
			1]
		},
		{
			"name": "threshold",
			"type": "s",
			"list": ["QUARTER",
			"HALF"]
		},
		...]
	},
	{
		"name": "event2",
		"parameters": [//参数取值范围range字段详见附录2{
			"name": "count",
			"type": "i",
			"range": [0,
			100,
			1]
		},
		{
			"name": "threshold",
			"type": "s",
			"list": ["QUARTER",
			"HALF"]
		},
		...
	},
	...],
	"services": [{
		"name": "service1",
		//"服务名称",
		"inParam": [//入参：参数名、类型、取值范围，range详见注释2{
			"name": "inCount",
			"type": "i",
			"range": [0,
			//max100,
			//min2//step]
		},
		...],
		"outParam": [//出参：参数名、类型、取值范围，range详见注释2{
			"name": "outThreshold",
			"type": "s",
			"list": ["QUARTER",
			"HALF"]
		}],
		
	},
	...]
}
```
