# describeBinlogDownloadURL


## 描述
获取MySQL实例的binlog的下载链接<br>- 仅支持 MySQL, Percona, MariaDB

## 请求方式
GET

## 请求地址
https://rds.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/binlogs/{binlogBackupId}:describeBinlogDownloadURL

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域代码，取值范围参见[《各地域及可用区对照表》](../Enum-Definitions/Regions-AZ.md)|
|**instanceId**|String|True| |RDS 实例ID，唯一标识一个RDS实例|
|**binlogBackupId**|String|True| |binlog的备份ID，可以通过describeBinlogs获得|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**seconds**|Integer|False| |设置链接地址的过期时间，单位是秒，默认值是 300 秒，最长不能超过取值范围为 1 ~ 86400 秒|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describebinlogdownloadurl#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**publicURL**|String|公网下载链接|
|**internalURL**|String|内网下载链接|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
GET
```
public void testDescribeBinlogDownloadURL() {
    DescribeBinlogDownloadURLRequest request = new DescribeBinlogDownloadURLRequest();
    request.setInstanceId("mysql-wp4e9ztap2");
    request.setRegionId("cn-north-1");
    request.setBinlogBackupId("bceed098-0c5d-48a1-9625-4126e32bed29");
    DescribeBinlogDownloadURLResponse response = rdsClient.describeBinlogDownloadURL(request);
    System.out.println(new Gson().toJson(response));
}

```

## 返回示例
```
{
    "requestId": "bpa3akbft13hi67hperu73atrj3smqun", 
    "result": {
        "internalURL": "http://oss-internal.cn-north-1.jcloudcs.com/trove-online-hb/233f1965-3a30-4d8c-a618-25c6f286a96e/binlog/mysql-bin.002009.gz.enc_time_20200107141350?Expires=1578382973&AccessKey=872DED479C1C41757FDCC3A7542BE694&Signature=B6t66Cz5v+XsVUNdRRkXJGBfZ1w=", 
        "publicURL": "http://oss.cn-north-1.jcloudcs.com/trove-online-hb/233f1965-3a30-4d8c-a618-25c6f286a96e/binlog/mysql-bin.002009.gz.enc_time_20200107141350?Expires=1578382973&AccessKey=872DED479C1C41757FDCC3A7542BE694&Signature=B6t66Cz5v+XsVUNdRRkXJGBfZ1w="
    }
}
```
