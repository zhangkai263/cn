# modifyInstanceAz


## 描述
修改实例的可用区，例如将实例的可用区从单可用区调整为多可用区

## 请求方式
POST

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:modifyInstanceAz

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**newAzId**|String[]|True| |新可用区ID。 如果是单机实例，只需输入一个可用区；如果是主备实例，则必须输入两个可用区ID：第一个为主节点所在可用区，第二个为备节点所在可用区。主备两个可用区可以相同，也可以不同|


## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
public void testModifyInstanceAz() {
    ModifyInstanceAzRequest request = new ModifyInstanceAzRequest();
    request.setInstanceId("sqlserver-83uqv7avy4");
    request.addNewAzId("cn-north-1c");
    request.setRegionId("cn-north-1");
    ModifyInstanceAzResponse response = rdsClient.modifyInstanceAz(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa64i0ghn4iucr83987ud3nhwdu7c7e"
}
```
