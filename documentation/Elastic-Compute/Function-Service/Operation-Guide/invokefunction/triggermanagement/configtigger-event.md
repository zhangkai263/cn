# 事件格式

触发器在触发函数时会将事件传递给Function，事件在传递时以一个特定的数据结构以JSON 格式传递。对于不同的触发器参数设定的配置文件的内容格式不同，本文列举了配置文件的格式样板，并说明了支持的属性。另外，由不同触发器触发的事件，传递到函数接口的事件（event）对象的格式有所不同。

## OSS触发器

当以函数服务作为OSS的事件通知类型时，OSS会把请求参数通过一个固定的Mapping结构传给Function的请求参数 `event`。

### 事件格式


```
{
     "Records": [
        {
            "version": "0", 
            "id": "6a7e8feb-b491-4cf7-a9f1-bf3703467718",
            "time": "2006-01-02T15:04:05.999999999Z",
            "source": "oss",
            "base64OwnerPin": "NTk0MDM1MjYzMDE5",
            "resources": [
                "jrn:oss:cn-north-1:accountID:bucketname/objectname"
            ],
            "region": "cn-north-1",
            "detailType": "MessageReceived",
            "detail": { 
                "eventName":"event-type",  //事件类型
                "responseElements":{  
                    "x-amz-request-id":"OSS generated request ID"  //发起事件的请求ID
                },
                "s3":{  
                    "s3SchemaVersion":"1.0",  //通知内容版本号，目前为"1.0"
                    "configurationId":"ID found in the bucket notification configuration",  //事件通知配置中ConfigurationId
                    "bucket":{  
                        "name":"bucket-name",  //Bucket名称
                        "ownerIdentity":{  
                            "principalId":"userId-of-the-bucket-owner"  //Bucket owner用户ID
                        }
                     },
                    "object":{  
                        "key":"object-key",  //Object名称
                        "eTag":"object eTag",  //Object的etag，与GetObject请求返回的ETag头的内容相同
                        "size":"object size",  //Object的size
                        "type":"object type"  //Object的type 
                    }
                },
                "callBackVar": {  //回调通知配置中的自定义参数
                    "callBackVars": {                 
                        "var1":["value1","value3"],
                        "var2":["value2"]
                    }
                }
            }       
        }
    ]
}
```

OSS触发器配置详清参见[OSS触发器](../triggermanagement/eventsourceservice/oss-tirgger.md)。 

 

## API网关触发器


### 事件格式

#### 输入格式

当以函数服务作为API网关的后端服务时，API网关会把请求参数通过一个固定的Mapping结构传给Function的请求参数 `event`，Function通过如下结构去获取和处理需要的参数。

```
{
    "version":"0",
    "id":"6a7e8feb-b491-4cf7-a9f1-bf3703467718",
    "time":"2006-01-02T15:04:05.999999999Z",
    "source":"apigateway",
    "base64OwnerPin":"NTk0MDM1MjYzMDE5",
    "resources":[    
    ],
    "region":"cn-north-1",
    "detailType":"ApiGatewayReceived",
    "detail":{
        "path":"api request path",        //请求路径
        "httpMethod":"GET/POST/DELETE/PUT/PATCH",  
        "headers":{                 //请求头
            "header":"headerValue"
        },
        "pathParameters":{      //路径参数
            "pathParam":"pathValue"
        },
        "queryParameters":{            //查询参数
            "queryParam":"queryValue"
        },
        "body":"string of request payload",
        "requestContext":{
            "stage": "test",             //环境别名 
            "apiId":"testsvc",
            "identity": {
                "accountId": "",        //userid
                "apiKey": "",           //ak
                "user": "",          //pin
                "authType": ""       //身份认证的类型 公测免鉴权/jdcloud鉴权
            },
            "requestId":"c6af9ac6-7b61-11e6-9a41-93e8deadbeef",
            "sourceIp":"10.0.2.14"
        }
    }
} 

```
API网关触发器配置详清参见[API网关触发器](../triggermanagement/eventsourceservice/apig-tigger.md)。 

**参数说明**：网关与Function间的body内容不经过Base64编码。


#### 输出格式

Function将输出内容通过规范化，以如下JSON格式返回API网关：

```
{     
   "statusCode":httpStatusCode,
   "headers":{"headerName":"headerValue", ...}, 
   "body":"..."
 } 
```

## 队列服务JQS触发器

### 事件格式

当函数服务消费队列服务消息队列中的消息时，会轮询指定队列，通过一个包含队列消息的event异步调用函数。

```
{
     "Records": [
        {
            "version": "0", 
            "id": "6a7e8feb-b491-4cf7-a9f1-bf3703467718",
            "time": "2006-01-02T15:04:05.999999999Z",
            "source": "jqs",
            "base64OwnerPin": "NTk0MDM1MjYzMDE5",
            "resources": [
                "jrn:jqs:cn-north-1:accountID:qname"
            ],
            "region": "cn-north-1",
            "detailType": "jqspullReceived",
            "detail": { 
                "messageId": "059f36b4-87a3-44ab-83d2-661975830a7d",
                "receiptHandle": "AQEBwJnKyrHigUMZj6rYigCgxlaS3SLy0a...",
                "body": "test",
                "attributes": {
                    "ApproximateReceiveCount": "1",
                    "SentTimestamp": "1545082649183",
                    "SenderId": "AIDAIENQZJOLO23YVJ4VO",
                    "ApproximateFirstReceiveTimestamp": "1545082649185"
                  },
                "messageAttributes": {},
                "md5OfBody": "098f6bcd4621d373cade4e832627b4f6",
             }
      ]
}

```
