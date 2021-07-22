# createBackup


## 描述
创建并执行缓存Redis实例的备份任务，只能为手动备份，可设置备份文件名称

## 请求方式
POST

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/backup

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**fileName**|String|True| |备份文件名称，只支持英文数字和下划线的组合，长度不超过32个字符|
|**backupType**|Integer|True| |备份类型：手动备份为1，只能为手动备份|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createbackup#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**baseId**|String|本次备份任务ID，可用于查询本次备份任务的结果|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
@Test
public void testCreateBackup() {
  // 1. 设置请求参数
  CreateBackupRequest request = new CreateBackupRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234").fileName("backup1").backupType(1);

  // 2. 发起请求
  CreateBackupResponse response = redisClient.createBackup(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o986hq3n514145svdkk3hcdrv2on13", 
    "result": {
        "baseId": "a607efba-ff06-4d78-ba3c-b3119fce27fd"
    }
}
```
