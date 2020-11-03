# 		视频检测

本文介绍了如何使用京东智联云内容安全服务提供的内容检测API SDK。 

## SDK使用说明

在使用SDK前，您需要阅读[内容检测API文档](https://docs.jdcloud.com/cn/content-moderation/api-overview)，了解各个接口的具体功能。

- 我们将图像检测相关的功能封装成一个接口（例如图片鉴黄、图片涉政暴恐检测），并提供以下两种调用方式：
  - 图片同步检测接口：支持对多张图片进行检测，同步返回所有检测结果，建议一次检测一张图片。
  - 图片异步检测接口：支持对批量图片进行检测，接口将针对每一张图片返回一个taskId，您需要在提交检测任务后，通过taskId获取检测结果，对于批量图片检测，推荐使用该方式。
- 我们将视频检测相关的功能封装成一个接口（例如视频鉴黄、视频涉政暴恐检测），视频异步检测接口：支持用户传递视频进行检测，您需要在提交检测任务后，通过taskId获取检测结果或者通过传递回调接口接收检测的结果回调通知，推荐您使用该方式进行视频内容检测。
- 语音反垃圾：语音垃圾内容检测SDK支持语音文件的检测，目前只有异步检测接口，您需要在提交检测任务后，通过taskId获取检测结果或者通过传递回调接口接收检测的结果回调通知。
- 文本反垃圾：文本反垃圾只有同步检测接口，您可以在一次请求中检测一条或者多条文本。

## SDK支持类型

- 内容安全SDK支持以下语言或环境：

  - [Go SDK](https://docs.jdcloud.com/cn/sdk/go)
  - [Java SDK](https://docs.jdcloud.com/cn/sdk/java)
  - [Python SDK](https://docs.jdcloud.com/cn/sdk/python)
  
- 下载SDK使用代码示例。

  单击下载censor-sdk-sample_doc。

- 参考第三方SDK。

  如果您使用除Go、Java、Python以外的开发语言，推荐您通过HTTP请求直接调用内容检测API；我们也收集了一些第三方开发者编写的内容安全SDK，供您参考。内容安全第三方SDK包括以下语言：Node.js 、PHP、.Net、C++ 、Android 、Rust、Swift、Objective-C。具体参见[其他语言](https://docs.jdcloud.com/cn/?act=3)



代码示例：

```
package main

import (
	"encoding/json"
	"fmt"
	"math/rand"
	"net/http"
	"time"

	core "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/core"
	censor "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/censor/apis"
	client "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/censor/client"
	models "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/censor/models"
)

func main() {
	/** 设置credentials **/
	accessKey := "yourAccessKeyID"
	secretKey := "yourAccessKeySecret"
	credentials := core.NewCredentials(accessKey, secretKey)

	/** 设置Config对象 **/
	config := core.NewConfig()
	config.SetTimeout(30 * time.Second)

	/** 设置Client对象 **/
	client := client.NewCensorClient(credentials)
	client.SetConfig(config)

	/** 创建异步视频审核请求 **/
	req := censor.NewAsyncVideoScanRequest()
	task := models.VideoTask{
		DataId:    fmt.Sprintf("%d", rand.Intn(100)),
		Url:       "yourVideoURL",
		Interval:  1,
		MaxFrames: 10,
	}
	req.SetTasks([]models.VideoTask{task})
	req.SetScenes([]string{"porn"})
	req.SetLive(false)

	/** 发送异步视频频审核请求 **/
	resp, err := client.AsyncVideoScan(req)
	if err != nil {
		/** TODO: error **/
	} else {
		for k, result := range resp.Result.Data {
			if result.Code != http.StatusOK {
				/** TODO: error **/
			} else {
				fmt.Printf("item: %d:  result: %+v\n", k, result)
			}
		}
	}

	reqBytes, _ := json.MarshalIndent(req, "", "\t")
	respBytes, _ := json.MarshalIndent(resp, "", "\t")
	fmt.Println("req: ", string(reqBytes))
	fmt.Println("resp:", string(respBytes))
}
```



### 查看视频检测结果



代码示例：

```
package main

import (
	"encoding/json"
	"fmt"
	"net/http"
	"time"

	core "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/core"
	censor "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/censor/apis"
	client "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/censor/client"
)

func main() {
	/** 设置credentials **/
	accessKey := "yourAccessKeyID"
	secretKey := "yourAccessKeySecret"
	credentials := core.NewCredentials(accessKey, secretKey)

	/** 设置Config对象 **/
	config := core.NewConfig()
	config.SetTimeout(30 * time.Second)

	/** 设置Client对象 **/
	client := client.NewCensorClient(credentials)
	client.SetConfig(config)

	/** 创建查询视频审核结果请求 **/
	taskids := []string{"taskid"}
	req := censor.NewVideoResultsRequest(taskids)

	/** 发送查询视频审核结果请求 **/
	resp, err := client.VideoResults(req)
	if err != nil {
		/** TODO: error **/
	} else {
		for k, result := range resp.Result.Data {
			if result.Code != http.StatusOK {
				/** TODO: error **/
			} else {
				fmt.Printf("item: %d:  result: %+v\n", k, result)
			}
		}
	}

	reqBytes, _ := json.MarshalIndent(req, "", "\t")
	respBytes, _ := json.MarshalIndent(resp, "", "\t")
	fmt.Println("req: ", string(reqBytes))
	fmt.Println("resp:", string(respBytes))
}
```