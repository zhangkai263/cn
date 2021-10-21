# 		视频检测

使用视频审核Go SDK检测视频中是否含有风险内容，支持同时检测视频中的图像和语音内容。

## 准备工作

在进行具体的服务调用之前，请完成以下准备工作：

- 创建京东智联云AccessKey。具体操作请参见[创建AccessKey](https://uc.jdcloud.com/account/accesskey)。
- 安装Go依赖。具体操作请参见[安装Go依赖](Install-And-Initialization.md)。

## 提交视频异步检测任务

| 接口                     | 描述                                                         |
| :----------------------- | :----------------------------------------------------------- |
| NewAsyncVideoScanRequest | 提交视频异步检测任务，对视频进行多个风险场景的识别，包括色情、暴恐涉政、图文违规。 |

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
