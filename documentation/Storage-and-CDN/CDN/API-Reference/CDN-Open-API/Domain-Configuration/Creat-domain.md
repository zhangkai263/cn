# **创建加速域名**

## **1. 描述**

开通加速域名(createDomain)

## **2. 请求参数**

| **名称**      | **类型** | **是否必填**| **描述**                          |
| ----------- | ------ | --------- | ------------------------------- |
| username      | String | 是        | 京东用户名pin                          |
| signature  | String | 是        | 用户签名    Signature签名：用于认证的签名信息,签名算法: 日期(格式为 yyyymmdd)，username和用户名秘钥相加的字符串的md5值。签名示例：比如当前日期2016-10-23，用户pin: jcloud_00 ,用户秘钥SecretKey ：e7a31b1c5ea0efa9aa2f29c6559f7d61那签名为MD5(20161023jcloud_00e7a31b1c5ea0efa9aa2f29c6559f7d61)                |
| domain      | String | 是        | 加速域名 |
| type | String | 是        | 域名服务资源类型，目前只支持web表示 静态小文件，download表示大文件加速，vod表示视频加速 （其他类型暂不支持，dynamic表示动态加速，live表示直播加速，直播域名的创建参考直播OPEN API）                   |
| sourceType   | String | 是        | ips：IP列表，domain：域名，oss：oss回源                             |
| source   | String | 是        | 1. 根据sourceType确定源站IP列表或者域名。</br>2. IP和domain回源必须是json,ip回源示例："[{'ip':'1.1.1.1','priority':'master','ratio':0.4},{'ip':'2.2.2.2','priority':'master','ratio':0.6},{'ip':'3.3.3.3','priority':'slave','ratio':1}]"ip回源时，priority表示主备IP，master表示主，slave表示备；domain回源示例："[{'domain':'source1.dev.opencdn.jcloud.com','priority':'1'},{'domain':'source2.dev.opencdn.jcloud.com','priority':'2'}]"domain回源时，priority代表的是域名优先级，1-5代表优先级从高到底；OSS回源"oss.jcloud.com"。</br>3. IP/域名回源时可设置自定义端口，如："[{'ip':'1.1.1.1:8080','priority': 'master'}]"|
| httpType   | String | 是        | http类型，只能为http或者https，默认为http。当设为https时，需要调用“设置通讯协议”接口上传证书和私钥 |
| backSourceType   | String | 是        | 回源类型，只能为http（80端口回源）或者https（443端口回源），默认为http |
| dailyBandWidth   | String | 是        | 日均值带宽 |
| accelerateRegion   | String | 否        | 加速区域[mainland,nonMainland,all]，mainland为中国境内，nonMainland为中国境外，all为全球，默认mainland|

## **3. 返回参数**

| **名称** | **描述**                                                  |
| -------- | --------------------------------------------------------- |
| status   | 结果状态, 表示接口请求成功与否，成功用0表示，其他表示失败 |
| msg      | 提示信息                                                  |
| data     | 域名                                                      |

## **4. 调用示例**

- ### **请求地址**

https://opencdn.jcloud.com/api/createDomain

- ### **请求示例**

curl请求示例：
```
curl -H "Content-type: application/json" -X POST -d '{"username":" testuser ","signature":"914a3f412fd9bc1eec14bb5eb104d253","domain" :"www.a.com","type" :"web","sourceType" :"ips","source" :"[{'ip':'1.1.1.1','priority':'master'},{'ip':'2.2.2.2','priority':'master'},{'ip':'3.3.3.3','priority':'slave'}]","backSourceType" :"http","dailyBandWidth" :200}' https://opencdn.jcloud.com/api/createDomain
```
* json格式
```
{
    "username" :"testuser",
    "signature" :"914a3f412fd9bc1eec14bb5eb104d253",
    "domain" :"www.a.com",
    "type" :"web",
    "sourceType" :"ips",
    "source" :"[{'ip':'1.1.1.1','priority':'master'},{'ip':'2.2.2.2','priority':'master'},{'ip':'3.3.3.3','priority':'slave'}]",
    "backSourceType" :"http",
    "dailyBandWidth" :200
 }
```
- ### **返回示例**

* json格式

```
{
  "status": 0,
  "msg": "成功",
  "data": "www.a.com "
}
```

 
