# describeImportFiles


## 描述
获取用户通过单库上云工具上传到该实例上的文件列表<br>- 仅支持SQL Server

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/importFiles

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeimportfiles#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**importFiles**|[ImportFile[]](describeimportfiles#importfile)|导入文件的集合|
### <div id="importfile">ImportFile</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|文件名称|
|**sharedFileGid**|String|如果该文件是共享文件，则有全局ID，如不是共享文件，则为空。该全局ID在文件删除时，需要用到|
|**sizeByte**|Integer|文件大小，单位Byte|
|**uploadTime**|String|文件上传完成时间，格式为：YYYY-MM-DD HH:mm:ss|
|**isLocal**|String|是否所属当前实例.<br> 1：当前实例；<br>0：不是当前实例，为共享文件|
|**status**|String|文件状态<br>- 仅支持SQL Server|
|**importTime**|String|导入完成时间,格式为：YYYY-MM-DD HH:mm:ss<br>- 仅支持SQL Server|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void  testDescribeImportFiles(){
    DescribeImportFilesRequest describeImportFilesRequest = new DescribeImportFilesRequest();
    describeImportFilesRequest.setInstanceId("sqlserver-83uqv7avy4");
    describeImportFilesRequest.setRegionId("cn-north-1");
    DescribeImportFilesResponse response = rdsClient.describeImportFiles(describeImportFilesRequest);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa4kdtfsgq7t2406a0swem2010wkhd9", 
    "result": {
        "importFiles": [
            {
                "importTime": "2019-12-31 14:11:06", 
                "isLocal": "false", 
                "name": "db1.bak", 
                "sharedFileGid": "b9c74930-142b-4859-be26-cc4e0c0743a8", 
                "sizeByte": 244736, 
                "status": "ACTIVE", 
                "uploadTime": "2019-08-20 22:49:18"
            }, 
            {
                "importTime": "2020-01-07 16:22:12", 
                "isLocal": "false", 
                "name": "db1_1.bak", 
                "sharedFileGid": "fcbb66c6-e7f0-4228-b4c0-b3e5a0d452c8", 
                "sizeByte": 1593856, 
                "status": "ACTIVE", 
                "uploadTime": "2019-12-09 11:40:00"
            }
        ]
    }
}
```
