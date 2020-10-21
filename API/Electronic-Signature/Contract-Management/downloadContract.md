# downloadContract

## 描述

下载已签章的合同

## 请求方式

GET

## 请求地址

https://cloudsign.jdcloud-api.com/v1/contract/{contractId}

| 名称           | 类型   | 是否必需 | 默认值 | 描述   |
| -------------- | ------ | -------- | ------ | ------ |
| **contractId** | String | True     |        | 合同ID |

## 请求参数

无

## 返回参数

| 名称          | 类型                                                         | 描述   |
| ------------- | ------------------------------------------------------------ | ------ |
| **result**    | [Result](https://github.com/liangzy3/cn/blob/Electronic-Signature-1/API/Electronic-Signature/Contract-Management/downloadContract.md#result) |        |
| **requestId** | String                                                       | 请求ID |

### Result

| 名称             | 类型                                                         | 描述 |
| ---------------- | ------------------------------------------------------------ | ---- |
| **contractInfo** | [ContractInfo](https://github.com/liangzy3/cn/blob/Electronic-Signature-1/API/Electronic-Signature/Contract-Management/downloadContract.md#contractinfo) |      |

### ContractInfo

| 名称                | 类型     | 描述                     |
| ------------------- | -------- | ------------------------ |
| **contractId**      | String   | 合同ID                   |
| **contractTitle**   | String   | 合同标题                 |
| **stampNames**      | String[] | 印章名称(可能有多个印章) |
| **contractContent** | String   | 合同文件（base64）       |
| **contractDigest**  | String   | 合同文件摘要             |
| **createTime**      | String   | 合同签章时间             |

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
	// 下载合同
	{
		req := cloudsign.NewDownloadContractsRequest("contract-xxxxxxxxxxxxxxxx")
		if resp, err := client.DownloadContracts(req); err != nil {
			fmt.Println("error : ", err)
		} else {
			fmt.Println("resp : ", resp)
		}
	}
}	
```

