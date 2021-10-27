# 		音频检测

使用语音反垃圾Go SDK接口检测实时语音流或语音文件中的垃圾内容。

## 背景信息

语音流检测和语音文件检测均为异步检测，检测结果需要您以轮询或者回调的方式获取。

语音检测按照检测的语音文件或语音流的时间长度进行计费。时间单位为分钟，以每天累计检测总时长进行计量统计，每天检测总时长不足一分钟的按照一分钟进行计费。

相关API接口文档，请参见[语音异步检测](https://docs.jdcloud.com/cn/content-moderation/audio-asynchronous-detection-api)。

## 准备工作

在进行具体的服务调用之前，请完成以下准备工作：

- 创建京东智联云AccessKey。具体请参见[创建AccessKey](https://uc.jdcloud.com/account/accesskey)。
- 安装Go依赖。具体请参见[安装Go依赖](Install-And-Initialization.md)。

## 提交语音异步检测任务

| 接口                     | 描述                                         |
| :----------------------- | :------------------------------------------- |
| NewAsyncAudioScanRequest | 异步检测语音流或语音文件中是否包含违规内容。 |

### 提交音频审核请求

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

	/** 创建异步音频审核请求 **/
	req := censor.NewAsyncAudioScanRequest()
	task := models.AudioTask{
		DataId: fmt.Sprintf("%d", rand.Intn(100)),
		Url:    "yourAudioURL",
	}
	req.SetTasks([]models.ImageTask{task})
	req.SetScenes([]string{"antispam"})

	/** 发送异步音频审核请求 **/
	resp, err := client.AsyncImageScan(req)
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



### 查看音频检测结果

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

	/** 创建查询音频审核结果请求 **/
	taskids := []string{"taskid"}
	req := censor.NewAudioResultsRequest(taskids)

	/** 发送查询音频审核结果请求 **/
	resp, err := client.AudioResults(req)
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
