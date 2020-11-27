# 		文本检测

- 使用Go SDK文本反垃圾接口对文本内容进行色情、暴恐、涉政等反垃圾风险识别。

  ## 背景信息

  文本反垃圾目前仅支持同步检测。

  一次请求可以检测多条文本，也可以检测单条文本。按实际检测的文本条数进行计费。

  相关API接口文档，请参见[文本检测](https://docs.jdcloud.com/cn/content-moderation/text-synchronous-detection-api)。

  ## 准备工作

  在进行具体的服务调用之前，请完成以下准备工作：
  
- 创建京东智联云AccessKeyId和AccessKeySecret。具体请参见[创建AccessKey](https://uc.jdcloud.com/account/accesskey)。

- 安装Go依赖。具体请参见[安装Go依赖](Install-And-Initialization.md)。

  ## 文本内容检测

  文本垃圾检测支持自定义关键词，例如添加一些竞品关键词等。如果被检测的文本中包含您添加的关键词，算法会返回您suggestion=block。

  | 接口               | 描述                                                         |
  | :----------------- | :----------------------------------------------------------- |
  | NewTextScanRequest | 提交文本反垃圾检测任务，检测场景参数请传递antispam（scenes=antispam） |

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
	secretKey := "yourSecretKeyID"
	credentials := core.NewCredentials(accessKey, secretKey)

	/** 设置Config对象 **/
	endPoint := "censor.jdcloud-api.com"
	config := core.NewConfig()
	config.SetTimeout(30 * time.Second)
	config.SetEndpoint(endPoint)

	/** 设置Client对象 **/
	client := client.NewCensorClient(credentials)
	client.SetConfig(config)

	/** 创建文本审核请求 **/
	req := censor.NewTextScanRequest()
	task := models.TextTask{
		DataId:  fmt.Sprintf("%d", rand.Intn(100)),
		Content: "测试文本审核",
	}
	req.SetTasks([]models.TextTask{task})
	req.SetScenes([]string{"antispam"})

	/** 发送文本审核请求 **/
	resp, err := client.TextScan(req)
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

