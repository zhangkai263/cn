# describeDownloadUrl


## 描述
获取缓存Redis实例的备份文件临时下载地址（1个小时有效期）

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/backup:describeDownloadUrl

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**baseId**|String|True| |备份任务ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describedownloadurl#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**downloadUrls**|[DownloadUrl[]](describedownloadurl#downloadurl)|备份文件下载信息列表|
### <div id="downloadurl">DownloadUrl</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|名称|
|**link**|String|下载链接|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|

## 请求示例
GET
```
@Test
public void testGetBackupDownloadUrl() {
  // 1. 设置请求参数
  DescribeDownloadUrlRequest request = new DescribeDownloadUrlRequest();
  request.regionId("cn-north-1").cacheInstanceId("redis-1234").baseId("1234");

  // 2. 发起请求
  DescribeDownloadUrlResponse response = redisClient.describeDownloadUrl(request);

  // 3. 处理响应结果
  System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "c3o9fibpqgf1p17a6pbo13f5e1oc8791", 
    "result": {
        "downloadUrls": [
            {
                "internalLink": "http://jmiss-redis-backup-hb.s3-internal.cn-north-1.jdcloud-oss.com/redis-1234/20210714153657-backup1-0?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=4034CAC03D9B83501CDACA21E939B07F%2F20210714%2Fcn-north-1%2Fs3%2Faws4_request&X-Amz-Date=20210714T075241Z&X-Amz-Expires=3600&X-Amz-SignedHeaders=host&X-Amz-Signature=216c79b2eda15af43e12d97e191c8766f22fa0b3c371612deb2dc82e1037481c", 
                "link": "http://jmiss-redis-backup-hb.s3.cn-north-1.jdcloud-oss.com/redis-1234/20210714153657-backup1-0?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=4034CAC03D9B83501CDACA21E939B07F%2F20210714%2Fcn-north-1%2Fs3%2Faws4_request&X-Amz-Date=20210714T075241Z&X-Amz-Expires=3600&X-Amz-SignedHeaders=host&X-Amz-Signature=33d74059436e9a808d5c97569bcde885ff106f9daca7824b7973eed1f807a5c2", 
                "name": "node 0"
            }
        ]
    }
}
```
