# deleteContract


## 描述
删除已签章的合同<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>

## 请求方式
DELETE

## 请求地址
https://cloudsign.jdcloud-api.com/v1/contract/{contractId}

| 名称           | 类型   | 是否必需 | 默认值 | 描述   |
| -------------- | ------ | -------- | ------ | ------ |
| **contractId** | String | True     |        | 合同ID |

## 请求参数
无


## 返回参数
| 名称          | 类型   | 描述   |
| ------------- | ------ | ------ |
| **requestId** | String | 请求ID |


## 返回码
| 返回码  | 描述      |
| ------- | --------- |
| **200** | OK        |
| **404** | NOT FOUND |

## 示例代码

```
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
	// 删除合同
	{
		req := cloudsign.NewDeleteContractRequest("contract-xxxxxxxxxxxxxxxx")
		if resp, err := client.DeleteContract(req); err != nil {
			fmt.Println("error : ", err)
		} else {
			fmt.Println("resp : ", resp)
		}
	}	
}
```

