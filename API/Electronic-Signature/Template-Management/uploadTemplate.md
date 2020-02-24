# uploadTemplate


## 描述
上传合同模板

## 请求方式
POST

## 请求地址
https://cloudsign.jdcloud-api.com/v1/template


## 请求参数
| 名称             | 类型                          | 是否必需 | 默认值 | 描述 |
| ---------------- | ----------------------------- | -------- | ------ | ---- |
| **templateSpec** | [TemplateSpec](#templatespec) | True     |        |      |

### <div id="templatespec">TemplateSpec</div>
| 名称                | 类型   | 是否必需 | 默认值 | 描述                   |
| ------------------- | ------ | -------- | ------ | ---------------------- |
| **templateContent** | String | False    |        | 合同模板文件（base64） |
| **templateName**    | String | False    |        | 合同模板名称           |
| **templateTitle**   | String | False    |        | 合同模板标题           |

## 返回参数
| 名称          | 类型              | 描述   |
| ------------- | ----------------- | ------ |
| **result**    | [Result](#result) |        |
| **requestId** | String            | 请求ID |

### <div id="result">Result</div>
| 名称           | 类型   | 描述       |
| -------------- | ------ | ---------- |
| **templateId** | String | 合同模板ID |

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
	// 上传合同模板
	{
		template:= models.TemplateSpec{
			TemplateName:"模板名称",//
			TemplateTitle:"模板标题",
			TemplateContent :"SDFFERFGSXVVL==", // 模板文件的Base64编码，模板类型只支持pdf格式
		}
		req := cloudsign.NewUploadTemplateRequest(template)
		if resp, err := client.UploadTemplate(req); err != nil {
			fmt.Println("error : ", err)
		} else {
			fmt.Println("resp : ", resp)
		}
	}
}
```

