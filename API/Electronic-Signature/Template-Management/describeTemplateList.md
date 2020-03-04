# describeTemplateList


## 描述
获取合同模板列表

## 请求方式
GET

## 请求地址
https://cloudsign.jdcloud-api.com/v1/template


## 请求参数
| 名称                    | 类型    | 是否必需 | 默认值 | 描述                                  |
| ----------------------- | ------- | -------- | ------ | ------------------------------------- |
| **pageNumber**          | Integer | False    | 1      | 页码, 默认为1                         |
| **pageSize**            | Integer | False    | 10     | 分页大小, 默认为10, 取值范围[10, 100] |
| **templateNameOrTitle** | String  | False    |        | 合同模板名称或者标题                  |


## 返回参数
| 名称          | 类型              | 描述   |
| ------------- | ----------------- | ------ |
| **result**    | Result |        |
| **requestId** | String            | 请求ID |

### <div id="result">Result</div>
| 名称             | 类型                            | 描述         |
| ---------------- | ------------------------------- | ------------ |
| **templateList** | TemplateInfo| 合同模板列表 |
| **totalCount**   | Integer                         | 合同模板数量 |
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
	// 获取合同模板列表
	{
		req := cloudsign.NewDescribeTemplateListRequest()
		req.SetPageNumber(2)
		req.SetPageSize(10)
		if resp, err := client.DescribeTemplateList(req); err != nil {
			fmt.Println("error : ", err)
		} else {
			fmt.Println("resp : ", resp)
		}
	}
}
```

