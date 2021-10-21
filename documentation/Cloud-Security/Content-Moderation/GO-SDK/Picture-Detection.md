# 		图片检测

使用图片审核Go SDK检测图片中是否含有风险内容。

## 背景信息

图片审核支持同步检测和异步检测两种方式。

| 检测方式                            | 支持的检测对象          | 获取检测结果                                                 |
| :---------------------------------- | :---------------------- | :----------------------------------------------------------- |
| （推荐）同步检测NewImageScanRequest | 支持传入互联网图片URL。 | 同步返回检测结果。                                           |
| 异步检测NewAsyncImageScanRequest    | 支持传入互联网图片URL。 | 支持通过以下方式获取检测结果：提交异步检测任务后，调用异步检测结果查询接口（NewImageResultsRequest），轮询检测结果。 |

相关API文档：

- [同步检测](https://docs.jdcloud.com/cn/content-moderation/image-synchronous-detection-api)
- [异步检测](https://docs.jdcloud.com/cn/content-moderation/image-asynchronous-detection-api)

## 准备工作

在进行具体的服务调用之前，请完成以下准备工作：

- 创建京东云AccessKey。具体操作请参见[创建AccessKey](https://uc.jdcloud.com/account/accesskey)。
- 安装Go依赖。具体操作请参见[安装Go依赖](Install-And-Initialization.md)。

## （推荐）提交图片同步检测任务

| 接口                 | 描述                                                         |
| :------------------- | :----------------------------------------------------------- |
| ImageSyncScanRequest | 提交图片同步检测任务，对图片进行多个风险场景的识别，包括色情（传递scenes=porn）、暴恐涉政（传递scenes=terrorism）、图文违规识别（传递scenes=ad）。 |

### 同步图片审核调用

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

	/** 创建图片审核请求 **/
	req := censor.NewImageScanRequest()
	task := models.ImageTask{
		DataId: fmt.Sprintf("%d", rand.Intn(100)),
		Url:    "yourURL",
	}
	req.SetTasks([]models.ImageTask{task})
	req.SetScenes([]string{"porn", "terrorism"})

	/** 发送图片审核请求 **/
	resp, err := client.ImageScan(req)
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

### 异步图片审核调用

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

	/** 创建异步图片审核请求 **/
	req := censor.NewAsyncImageScanRequest()
	task := models.ImageTask{
		DataId: fmt.Sprintf("%d", rand.Intn(100)),
		Url:    "yourImageURL",
	}
	req.SetTasks([]models.ImageTask{task})
	req.SetScenes([]string{"porn", "terrorism"})

	/** 发送图片审核请求 **/
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



### 查询图片检测结果

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

	/** 创建查询图片审核结果请求 **/
	taskids := []string{"taskid"}
	req := censor.NewImageResultsRequest(taskids)

	/** 发送查询图片审核结果请求 **/
	resp, err := client.ImageResults(req)
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
