# describeFlavors


## 描述
获取规格

## 请求方式
GET

## 请求地址
https://mongodb.jdcloud-api.com/v1/regions/{regionId}/flavors

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeflavors#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**flavors**|[Flavor[]](describeflavors#flavor)| |
### <div id="flavor">Flavor</div>
|名称|类型|描述|
|---|---|---|
|**instanceType**|String|实例类型，副本集：Replication；分片集群：Sharding|
|**instanceClass**|String|副本集规格代码|
|**nodeRole**|String|分片集群节点角色，mongos、configserver、shard|
|**nodeType**|String|分片集群节点规格代码|
|**cpu**|Integer|CPU核数|
|**memory**|Integer|内存 ,单位GB|
|**iops**|Integer|iops|
|**maxLink**|Integer|最大连接数|
|**maxDisk**|Integer|最大磁盘数,单位GB|
|**minDisk**|Integer|最下磁盘数,单位GB|
|**diskStep**|Integer|磁盘步长|
|**instanceStorageType**|String|存储类型。LOCAL_SSD -本地盘SSD、LOCAL_NVMe -本地盘NVMe、EBS_SSD-SSD云盘。|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
