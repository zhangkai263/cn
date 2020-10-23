# downloadTemplate


## 描述
下载合同模板

## 请求方式
GET

## 请求地址
https://cloudsign.jdcloud-api.com/v1/template/{templateId}

| 名称           | 类型   | 是否必需 | 默认值 | 描述       |
| -------------- | ------ | -------- | ------ | ---------- |
| **templateId** | String | True     |        | 合同模板ID |

## 请求参数
无


## 返回参数
| 名称          | 类型              | 描述   |
| ------------- | ----------------- | ------ |
| **result**    | Result|        |
| **requestId** | String            | 请求ID |

### <div id="result">Result</div>
| 名称             | 类型                          | 描述 |
| ---------------- | ----------------------------- | ---- |
| **templateInfo** | TemplateInfo |      |
### <div id="templateinfo">TemplateInfo</div>
| 名称                 | 类型   | 描述                   |
| -------------------- | ------ | ---------------------- |
| **templateId**       | String | 合同模板ID             |
| **templateName**     | String | 合同模板名称           |
| **templateTitle**    | String | 合同模板标题           |
| **templateFileName** | String | 合同模板文件名称       |
| **templateContent**  | String | 合同模板文件（base64） |
| **templateDigest**   | String | 合同模板文件摘要       |
| **createTime**       | String | 创建时间               |

## 返回码
| 返回码  | 描述      |
| ------- | --------- |
| **200** | OK        |
| **404** | NOT FOUND |

## 示例代码

```
package main

import (
	"fmt"
	core "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/core"
	cloudsign "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/cloudsign/apis"
	client "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/cloudsign/client"
	models "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/cloudsign/modles"
)
	
func main() {
	accessKey := "C16D2F049162BBE5AA604B3E63D246FC"
	secretKey := "E6F88C0C6C21AAF36FBC38CCE7093D03"
	credentials := core.NewCredentials(accessKey, secretKey)
	config := core.NewConfig()
	config.SetEndpoint("10.226.148.63:8000")
	config.SetScheme("http")

	client := client.NewCloudsignClient(credentials)
	client.SetConfig(config)
	// 下载合同模板
	{
		req := cloudsign.NewDownloadTemplatesRequest("template-xxxxxxxxxxxxxxxx")
		if resp, err := client.DownloadTemplates(req); err != nil {
			fmt.Println("error : ", err)
		} else {
			fmt.Println("resp : ", resp)
		}
	}
}
```

